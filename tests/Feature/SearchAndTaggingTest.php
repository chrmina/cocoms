<?php

namespace Tests\Feature;

use Tests\TestCase;

class SearchAndTaggingTest extends TestCase
{
    /**
     * Test search routes exist
     */
    public function test_search_routes_exist(): void
    {
        $routes = app('router')->getRoutes();
        
        $searchRoutes = [
            'letters.search',
            'work-packages.search',
            'senders.search',
            'recipients.search',
            'tags.search',
        ];
        
        foreach ($searchRoutes as $routeName) {
            $route = $routes->getByName($routeName);
            $this->assertNotNull($route, "Route {$routeName} not found");
        }
    }

    /**
     * Test tagging routes exist
     */
    public function test_tagging_routes_exist(): void
    {
        $routes = app('router')->getRoutes();
        
        $tagRoutes = [
            'letters.tags.attach',
            'letters.tags.detach',
        ];
        
        foreach ($tagRoutes as $routeName) {
            $route = $routes->getByName($routeName);
            $this->assertNotNull($route, "Route {$routeName} not found");
        }
    }

    /**
     * Test letter controller has search method
     */
    public function test_letter_controller_has_search_method(): void
    {
        $controller = new \App\Http\Controllers\LetterController(
            app(\App\Services\LetterService::class),
            app(\App\Services\TagService::class)
        );
        
        $this->assertTrue(method_exists($controller, 'search'));
        $this->assertTrue(method_exists($controller, 'attachTag'));
        $this->assertTrue(method_exists($controller, 'detachTag'));
    }

    /**
     * Test work package controller has search method
     */
    public function test_work_package_controller_has_search_method(): void
    {
        $controller = new \App\Http\Controllers\WorkPackageController(
            app(\App\Services\WorkPackageService::class)
        );
        
        $this->assertTrue(method_exists($controller, 'search'));
    }

    /**
     * Test sender controller has search method
     */
    public function test_sender_controller_has_search_method(): void
    {
        $controller = new \App\Http\Controllers\SenderController(
            app(\App\Services\SenderService::class)
        );
        
        $this->assertTrue(method_exists($controller, 'search'));
    }

    /**
     * Test recipient controller has search method
     */
    public function test_recipient_controller_has_search_method(): void
    {
        $controller = new \App\Http\Controllers\RecipientController(
            app(\App\Services\RecipientService::class)
        );
        
        $this->assertTrue(method_exists($controller, 'search'));
    }

    /**
     * Test tag controller has search method
     */
    public function test_tag_controller_has_search_method(): void
    {
        $controller = new \App\Http\Controllers\TagController(
            app(\App\Services\TagService::class)
        );
        
        $this->assertTrue(method_exists($controller, 'search'));
    }

    /**
     * Test that tag service has tagging methods
     */
    public function test_tag_service_has_tagging_methods(): void
    {
        $service = app(\App\Services\TagService::class);
        
        $this->assertTrue(method_exists($service, 'tagItem'));
        $this->assertTrue(method_exists($service, 'untagItem'));
        $this->assertTrue(method_exists($service, 'searchTags'));
    }

    /**
     * Test that search views exist
     */
    public function test_search_views_exist(): void
    {
        $viewPaths = [
            'letters.search',
            'work-packages.search',
            'senders.search',
            'recipients.search',
            'tags.search',
        ];
        
        foreach ($viewPaths as $view) {
            $this->assertTrue(
                view()->exists($view),
                "View {$view} does not exist"
            );
        }
    }

    /**
     * Test that HasRoles trait methods exist
     */
    public function test_has_roles_trait_methods(): void
    {
        $hasRolesMethods = [
            'isAdmin',
            'isEditor',
            'isUser',
            'hasRole',
            'canAccess',
            'cannotAccess',
        ];
        
        foreach ($hasRolesMethods as $method) {
            $this->assertTrue(
                method_exists(\App\Traits\HasRoles::class, $method),
                "HasRoles trait missing method {$method}"
            );
        }
    }
}
