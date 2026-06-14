<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    public function show(string $page): View
    {
        // Map page slugs to view names
        $pages = [
            'what-is-cocoms' => 'pages.what-is-cocoms',
            'user-roles' => 'pages.user-roles',
            'letter-naming' => 'pages.letter-naming',
            'work-breakdown-structure' => 'pages.work-breakdown-structure',
            'history' => 'pages.history',
        ];

        if (!isset($pages[$page])) {
            abort(404, 'Page not found');
        }

        return view($pages[$page]);
    }
}
