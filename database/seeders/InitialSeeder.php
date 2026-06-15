<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use App\Models\WorkPackage;
use App\Models\Letter;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class InitialSeeder extends Seeder
{
    /**
     * Seed the application's database with initial data.
     */
    public function run(): void
    {
        // Create default users
        User::create([
            'id' => Str::uuid(),
            'username' => 'admin',
            'email' => 'admin@cocoms.local',
            'password' => bcrypt('password'),
            'first_name' => 'Admin',
            'last_name' => 'User',
            'role' => 'admin',
            'active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'id' => Str::uuid(),
            'username' => 'editor',
            'email' => 'editor@cocoms.local',
            'password' => bcrypt('password'),
            'first_name' => 'Editor',
            'last_name' => 'User',
            'role' => 'editor',
            'active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'id' => Str::uuid(),
            'username' => 'viewer',
            'email' => 'viewer@cocoms.local',
            'password' => bcrypt('password'),
            'first_name' => 'Viewer',
            'last_name' => 'User',
            'role' => 'viewer',
            'active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create sample companies (formerly senders and recipients)
        $companies = [
            ['name' => 'Cool Employer Corporation (CEC)', 'email' => 'homer.simpson@example.com', 'representative' => 'Homer Simpson'],
            ['name' => 'Excellent International Contractor (EIC)', 'email' => 'john.smith@example.com', 'representative' => 'John Smith'],
            ['name' => 'Great International Consultants (GIC)', 'email' => 'peter.smith@example.com', 'representative' => 'Peter Smith'],
            ['name' => 'Knowledgeable International Subcontractor (KIS)', 'email' => 'montgomery.burns@example.com', 'representative' => 'Montgomery Burns'],
        ];

        foreach ($companies as $companyData) {
            Company::create([
                'id' => Str::uuid(),
                'name' => $companyData['name'],
                'email' => $companyData['email'],
                'address' => '123 Main St, City, State',
                'representative' => $companyData['representative'],
                'contact' => $companyData['representative'],
                'telephone' => '(555) 123-4567',
                'mobile' => '(555) 987-6543',
            ]);
        }

        // Create sample work packages
        $workPackages = [
            ['number' => 'WP00000', 'name' => 'None', 'coordinator' => 'N/A', 'qs' => 'N/A'],
            ['number' => 'WP20000', 'name' => 'Civil Works', 'coordinator' => 'John Smith', 'qs' => 'Jane Doe'],
        ];

        foreach ($workPackages as $wpData) {
            WorkPackage::create([
                'id' => Str::uuid(),
                'number' => $wpData['number'],
                'name' => $wpData['name'],
                'wp_coordinator' => $wpData['coordinator'],
                'wp_qs' => $wpData['qs'],
            ]);
        }

        // Create sample tags
        $tags = [
            ['label' => 'Urgent', 'slug' => 'urgent'],
            ['label' => 'Review Required', 'slug' => 'review-required'],
            ['label' => 'Approved', 'slug' => 'approved'],
            ['label' => 'Pending', 'slug' => 'pending'],
            ['label' => 'Archive', 'slug' => 'archive'],
            ['label' => 'Confidential', 'slug' => 'confidential'],
        ];

        foreach ($tags as $tagData) {
            Tag::create([
                'id' => Str::uuid(),
                'namespace' => 'default',
                'slug' => $tagData['slug'],
                'label' => $tagData['label'],
                'tag_key' => $tagData['slug'],
                'counter' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Create sample letters
        $companies = Company::all();
        $workPackages = WorkPackage::all();

        if ($companies->count() > 1 && $workPackages->count() > 0) {
            for ($i = 1; $i <= 5; $i++) {
                Letter::create([
                    'id' => Str::uuid(),
                    'sender_id' => $companies->random()->id,
                    'recipient_id' => $companies->random()->id,
                    'work_package_id' => $workPackages->random()->id,
                    'docref' => 'DOC-' . str_pad($i, 4, '0', STR_PAD_LEFT),
                    'subject' => 'Sample Letter ' . $i,
                    'contents' => 'This is a sample correspondence letter for the ' . $this->getSampleSubject($i),
                    'docdate' => now()->subDays(rand(1, 30)),
                    'confidential' => $i % 3 == 0,
                    'replyreq' => $i % 2 == 0,
                    'tag_count' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        $this->command->info('Initial database seeding completed!');
        $this->command->info('Created:');
        $this->command->info('  - 3 users (admin, editor, viewer with password "password")');
        $this->command->info('  - 4 companies');
        $this->command->info('  - 2 work packages');
        $this->command->info('  - 6 tags');
        $this->command->info('  - 5 sample letters');
    }

    private function getSampleSubject(int $index): string
    {
        $subjects = [
            'Project Status Update',
            'Weekly Progress Report',
            'Site Safety Inspection',
            'Change Order Request',
            'Budget Adjustment',
        ];

        return $subjects[$index - 1] ?? 'Sample Communication';
    }
}
