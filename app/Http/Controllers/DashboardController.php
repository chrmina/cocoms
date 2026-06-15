<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Models\WorkPackage;
use App\Models\Company;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        /** @var User|null $user */
        $user = Auth::user();

        // Base KPIs
        $totalLetters = Letter::count();
        $lettersNeedingResponse = Letter::where('replyreq', true)->count();
        $confidentialLetters = Letter::where('confidential', true)->count();
        $recentLetters = Letter::with('senderCompany', 'recipientCompany', 'workPackage')
            ->orderBy('docdate', 'desc')
            ->limit(5)
            ->get();

        // Admin-specific metrics
        $adminMetrics = null;
        $systemStats = null;

        if ($user->isAdmin()) {
            $adminMetrics = [
                'total_users' => User::count(),
                'active_users' => User::where('active', true)->count(),
                'total_work_packages' => WorkPackage::count(),
                'total_companies' => Company::count(),
                'total_tags' => Tag::count(),
            ];

            $systemStats = [
                'letters_this_month' => Letter::where('created_at', '>=', now()->startOfMonth())->count(),
                'letters_this_week' => Letter::where('created_at', '>=', now()->startOfWeek())->count(),
                'avg_response_time' => $this->calculateAverageResponseTime(),
            ];
        }

        // Editor metrics
        $editorMetrics = null;
        if ($user->isEditor() || $user->isAdmin()) {
            $editorMetrics = [
                'pending_responses' => Letter::where('replyreq', true)->count(),
                'created_this_month' => Letter::where('created_at', '>=', now()->startOfMonth())->count(),
            ];
        }

        // Statistics for charts/overview
        $lettersByWorkPackage = WorkPackage::withCount('letters')
            ->orderBy('letters_count', 'desc')
            ->limit(5)
            ->get();

        $lettersByCompany = Company::withCount('sentLetters')
            ->orderBy('sent_letters_count', 'desc')
            ->limit(5)
            ->get();

        return view('dashboard', [
            'user' => $user,
            'totalLetters' => $totalLetters,
            'lettersNeedingResponse' => $lettersNeedingResponse,
            'confidentialLetters' => $confidentialLetters,
            'recentLetters' => $recentLetters,
            'adminMetrics' => $adminMetrics,
            'systemStats' => $systemStats,
            'editorMetrics' => $editorMetrics,
            'lettersByWorkPackage' => $lettersByWorkPackage,
            'lettersByCompany' => $lettersByCompany,
        ]);
    }

    private function calculateAverageResponseTime(): string
    {
        // Get all letters that required a reply and have been responded to
        $repliedLetters = Letter::where('replyreq', true)
            ->has('referencingLetters')
            ->with('referencingLetters')
            ->get();

        if ($repliedLetters->isEmpty()) {
            return 'N/A';
        }

        $totalDays = 0;
        $count = 0;

        foreach ($repliedLetters as $letter) {
            foreach ($letter->referencingLetters as $response) {
                $days = $letter->docdate->diffInDays($response->docdate);
                $totalDays += $days;
                $count++;
            }
        }

        if ($count === 0) {
            return 'N/A';
        }

        $averageDays = round($totalDays / $count, 1);
        return "{$averageDays} days";
    }
}
