<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Sender;
use App\Models\Recipient;
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
            'role' => 'user',
            'active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create sample senders
        $senders = [
            ['name' => 'John Smith', 'email' => 'john.smith@example.com', 'company' => 'ABC Contractors'],
            ['name' => 'Jane Doe', 'email' => 'jane.doe@example.com', 'company' => 'XYZ Engineers'],
            ['name' => 'Mike Johnson', 'email' => 'mike@example.com', 'company' => 'Construction Co'],
        ];

        foreach ($senders as $senderData) {
            Sender::create([
                'id' => Str::uuid(),
                'name' => $senderData['name'],
                'email' => $senderData['email'],
                'address' => '123 Main St, City, State',
                'representative' => $senderData['name'],
                'contact' => $senderData['name'],
                'telephone' => '(555) 123-4567',
                'mobile' => '(555) 987-6543',
            ]);
        }

        // Create sample recipients
        $recipients = [
            ['name' => 'Project Manager', 'email' => 'pm@projects.local'],
            ['name' => 'Site Supervisor', 'email' => 'supervisor@projects.local'],
            ['name' => 'Quality Assurance', 'email' => 'qa@projects.local'],
        ];

        foreach ($recipients as $recipientData) {
            Recipient::create([
                'id' => Str::uuid(),
                'name' => $recipientData['name'],
                'email' => $recipientData['email'],
                'address' => '456 Project Ave, City, State',
                'contact' => $recipientData['name'],
                'telephone' => '(555) 111-2222',
            ]);
        }

        // Create sample work packages
        $workPackages = [
            ['number' => 'WP-001', 'name' => 'Site Preparation', 'coordinator' => 'John Smith'],
            ['number' => 'WP-002', 'name' => 'Foundation Work', 'coordinator' => 'Jane Doe'],
            ['number' => 'WP-003', 'name' => 'Structural Work', 'coordinator' => 'Mike Johnson'],
            ['number' => 'WP-004', 'name' => 'MEP Installation', 'coordinator' => 'Sarah Wilson'],
        ];

        foreach ($workPackages as $wpData) {
            WorkPackage::create([
                'id' => Str::uuid(),
                'number' => $wpData['number'],
                'name' => $wpData['name'],
                'wp_coordinator' => $wpData['coordinator'],
                'wp_qs' => 'Quality Supervisor',
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
        $senders = Sender::all();
        $recipients = Recipient::all();
        $workPackages = WorkPackage::all();

        if ($senders->count() > 0 && $recipients->count() > 0 && $workPackages->count() > 0) {
            for ($i = 1; $i <= 5; $i++) {
                Letter::create([
                    'id' => Str::uuid(),
                    'sender_id' => $senders->random()->id,
                    'recipient_id' => $recipients->random()->id,
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
        $this->command->info('  - 3 senders');
        $this->command->info('  - 3 recipients');
        $this->command->info('  - 4 work packages');
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
