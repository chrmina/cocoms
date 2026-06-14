<?php

namespace Tests\Feature;

use App\Models\Letter;
use App\Models\Sender;
use App\Models\Recipient;
use App\Models\WorkPackage;
use App\Models\User;
use Tests\TestCase;

class FileUploadExportTest extends TestCase
{
    /**
     * Test that export routes exist
     */
    public function test_export_routes_exist(): void
    {
        $routes = app('router')->getRoutes();
        
        $exportRoutes = [
            'letters.export.excel',
            'work-packages.export.excel',
            'senders.export.excel',
            'recipients.export.excel',
        ];
        
        foreach ($exportRoutes as $routeName) {
            $route = $routes->getByName($routeName);
            $this->assertNotNull($route, "Route {$routeName} not found");
        }
    }

    /**
     * Test that letter controller has exportExcel method
     */
    public function test_letter_controller_has_export_method(): void
    {
        $controller = new \App\Http\Controllers\LetterController(
            app(\App\Services\LetterService::class),
            app(\App\Services\TagService::class)
        );
        
        $this->assertTrue(method_exists($controller, 'exportExcel'));
    }

    /**
     * Test that export services are properly bound
     */
    public function test_excel_export_service_is_bound(): void
    {
        $service = app(\App\Services\ExcelExportService::class);
        $this->assertNotNull($service);
    }

    /**
     * Test that file upload service can be instantiated
     */
    public function test_file_upload_service_works(): void
    {
        $service = app(\App\Services\FileUploadService::class);
        $this->assertNotNull($service);
        $this->assertTrue(method_exists($service, 'upload'));
        $this->assertTrue(method_exists($service, 'delete'));
    }

    /**
     * Test export classes can be instantiated
     */
    public function test_export_classes_instantiate(): void
    {
        $emptyCollection = collect([]);
        
        $this->assertNotNull(new \App\Exports\LettersExport($emptyCollection));
        $this->assertNotNull(new \App\Exports\WorkPackagesExport($emptyCollection));
        $this->assertNotNull(new \App\Exports\SendersExport($emptyCollection));
        $this->assertNotNull(new \App\Exports\RecipientsExport($emptyCollection));
    }

    /**
     * Test that store letter request has file validation
     */
    public function test_store_letter_request_validates_file(): void
    {
        $request = new \App\Http\Requests\StoreLetterRequest();
        $rules = $request->rules();
        
        $this->assertArrayHasKey('file', $rules);
        $this->assertContains('nullable', $rules['file']);
        $this->assertContains('file', $rules['file']);
    }

    /**
     * Test that update letter request has file validation
     */
    public function test_update_letter_request_validates_file(): void
    {
        $request = new \App\Http\Requests\UpdateLetterRequest();
        $rules = $request->rules();
        
        $this->assertArrayHasKey('file', $rules);
        $this->assertContains('nullable', $rules['file']);
        $this->assertContains('file', $rules['file']);
    }

    /**
     * Test that letter model has file fields in fillable
     */
    public function test_letter_model_has_file_fields(): void
    {
        $letter = new Letter();
        
        $this->assertContains('filelink', $letter->getFillable());
        $this->assertContains('file_dir', $letter->getFillable());
    }
}
