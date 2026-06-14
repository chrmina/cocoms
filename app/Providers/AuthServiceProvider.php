<?php

namespace App\Providers;

use App\Models\Letter;
use App\Models\Sender;
use App\Models\Recipient;
use App\Models\WorkPackage;
use App\Models\Tag;
use App\Models\User;
use App\Policies\LetterPolicy;
use App\Policies\SenderPolicy;
use App\Policies\RecipientPolicy;
use App\Policies\WorkPackagePolicy;
use App\Policies\TagPolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     */
    protected $policies = [
        Letter::class => LetterPolicy::class,
        Sender::class => SenderPolicy::class,
        Recipient::class => RecipientPolicy::class,
        WorkPackage::class => WorkPackagePolicy::class,
        Tag::class => TagPolicy::class,
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
