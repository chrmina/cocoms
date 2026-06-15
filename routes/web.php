<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\WorkPackageController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

// Info pages
Route::get('/pages/{page}', [PageController::class, 'show'])->name('page');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Search routes (must come before resource routes)
    Route::get('letters/search', [LetterController::class, 'search'])->name('letters.search');
    Route::get('work-packages/search', [WorkPackageController::class, 'search'])->name('work-packages.search');
    Route::get('companies/search', [CompanyController::class, 'search'])->name('companies.search');
    Route::get('tags/search', [TagController::class, 'search'])->name('tags.search');
    Route::get('users/search', [UserController::class, 'search'])->name('users.search');

    // Export routes (must come before resource routes)
    Route::get('letters/export/excel', [LetterController::class, 'exportExcel'])->name('letters.export.excel');
    Route::get('work-packages/export/excel', [WorkPackageController::class, 'exportExcel'])->name('work-packages.export.excel');
    Route::get('companies/export/excel', [CompanyController::class, 'exportExcel'])->name('companies.export.excel');

    // Resource routes - accessible to authenticated users
    Route::resource('letters', LetterController::class);
    Route::resource('work-packages', WorkPackageController::class);
    Route::resource('companies', CompanyController::class);
    Route::resource('tags', TagController::class);

    // Tagging routes
    Route::post('letters/{letter}/tags', [LetterController::class, 'attachTag'])->name('letters.tags.attach');
    Route::delete('letters/{letter}/tags/{tag}', [LetterController::class, 'detachTag'])->name('letters.tags.detach');

    // Letter reference routes
    Route::post('letters/{letter}/references', [LetterController::class, 'attachReference'])->name('letters.references.attach');
    Route::delete('letters/{letter}/references/{referencedLetter}', [LetterController::class, 'detachReference'])->name('letters.references.detach');

    // Admin-only routes for user management
    Route::resource('users', UserController::class);
});

require __DIR__.'/auth.php';
