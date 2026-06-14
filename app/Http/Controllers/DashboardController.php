<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Models\WorkPackage;
use App\Models\Sender;
use App\Models\Recipient;
use App\Models\Tag;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();
        
        // Base KPIs
        $totalLetters = Letter::count();
        $lettersNeedingResponse = Letter::where('replyreq', true)->count();
        $confidentialLetters = Letter::where('confidential', true)->count();
        $recentLetters = Letter::with('sender', 'recipient', 'workPackage')
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
                'total_senders' => Sender::count(),
                'total_recipients' => Recipient::count(),
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

        $lettersBySender = Sender::withCount('letters')
            ->orderBy('letters_count', 'desc')
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
            'lettersBySender' => $lettersBySender,
        ]);
    }

    private function calculateAverageResponseTime(): string
    {
        // Placeholder for average response time calculation
        // This would require tracking response dates
        return 'N/A';
    }
}
