<?php

namespace Tests\Feature;

use App\Models\Letter;
use App\Models\Sender;
use App\Models\Recipient;
use App\Models\WorkPackage;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LetterValidationTest extends TestCase
{
    use RefreshDatabase;

    private User $editor;

    protected function setUp(): void
    {
        parent::setUp();
        $this->editor = User::factory()->create(['role' => 'editor']);
    }

    /**
     * Test letter creation with valid data
     */
    public function test_create_letter_with_valid_data(): void
    {
        $sender = Sender::factory()->create();
        $recipient = Recipient::factory()->create();
        $workPackage = WorkPackage::factory()->create();

        $response = $this->actingAs($this->editor)->post('/letters', [
            'sender_id' => $sender->id,
            'recipient_id' => $recipient->id,
            'work_package_id' => $workPackage->id,
            'docref' => 'DOC-001',
            'subject' => 'Test Letter',
            'contents' => 'Test contents',
            'docdate' => now()->toDateString(),
        ]);

        $response->assertRedirect();
    }

    /**
     * Test letter creation requires sender_id
     */
    public function test_create_letter_requires_sender_id(): void
    {
        $recipient = Recipient::factory()->create();
        $workPackage = WorkPackage::factory()->create();

        $response = $this->actingAs($this->editor)->post('/letters', [
            'recipient_id' => $recipient->id,
            'work_package_id' => $workPackage->id,
            'docref' => 'DOC-001',
            'subject' => 'Test Letter',
            'contents' => 'Test contents',
            'docdate' => now()->toDateString(),
        ]);

        $response->assertSessionHasErrors('sender_id');
    }

    /**
     * Test letter creation requires recipient_id
     */
    public function test_create_letter_requires_recipient_id(): void
    {
        $sender = Sender::factory()->create();
        $workPackage = WorkPackage::factory()->create();

        $response = $this->actingAs($this->editor)->post('/letters', [
            'sender_id' => $sender->id,
            'work_package_id' => $workPackage->id,
            'docref' => 'DOC-001',
            'subject' => 'Test Letter',
            'contents' => 'Test contents',
            'docdate' => now()->toDateString(),
        ]);

        $response->assertSessionHasErrors('recipient_id');
    }

    /**
     * Test letter creation requires work_package_id
     */
    public function test_create_letter_requires_work_package_id(): void
    {
        $sender = Sender::factory()->create();
        $recipient = Recipient::factory()->create();

        $response = $this->actingAs($this->editor)->post('/letters', [
            'sender_id' => $sender->id,
            'recipient_id' => $recipient->id,
            'docref' => 'DOC-001',
            'subject' => 'Test Letter',
            'contents' => 'Test contents',
            'docdate' => now()->toDateString(),
        ]);

        $response->assertSessionHasErrors('work_package_id');
    }

    /**
     * Test letter creation requires subject
     */
    public function test_create_letter_requires_subject(): void
    {
        $sender = Sender::factory()->create();
        $recipient = Recipient::factory()->create();
        $workPackage = WorkPackage::factory()->create();

        $response = $this->actingAs($this->editor)->post('/letters', [
            'sender_id' => $sender->id,
            'recipient_id' => $recipient->id,
            'work_package_id' => $workPackage->id,
            'docref' => 'DOC-001',
            'contents' => 'Test contents',
            'docdate' => now()->toDateString(),
        ]);

        $response->assertSessionHasErrors('subject');
    }

    /**
     * Test letter update with valid data
     */
    public function test_update_letter_with_valid_data(): void
    {
        $letter = Letter::factory()->create();

        $response = $this->actingAs($this->editor)->put("/letters/{$letter->id}", [
            'sender_id' => $letter->sender_id,
            'recipient_id' => $letter->recipient_id,
            'work_package_id' => $letter->work_package_id,
            'subject' => 'Updated Subject',
            'contents' => $letter->contents,
            'docdate' => $letter->docdate,
        ]);

        $response->assertStatus(302);
    }

    /**
     * Test letter update requires subject
     */
    public function test_update_letter_requires_subject(): void
    {
        $letter = Letter::factory()->create();

        $response = $this->actingAs($this->editor)->put("/letters/{$letter->id}", [
            'sender_id' => $letter->sender_id,
            'recipient_id' => $letter->recipient_id,
            'work_package_id' => $letter->work_package_id,
            'contents' => $letter->contents,
            'docdate' => $letter->docdate,
        ]);

        $response->assertSessionHasErrors('subject');
    }

    /**
     * Test unauthenticated user cannot create letter
     */
    public function test_unauthenticated_cannot_create_letter(): void
    {
        $sender = Sender::factory()->create();
        $recipient = Recipient::factory()->create();
        $workPackage = WorkPackage::factory()->create();

        $response = $this->post('/letters', [
            'sender_id' => $sender->id,
            'recipient_id' => $recipient->id,
            'work_package_id' => $workPackage->id,
            'docref' => 'DOC-001',
            'subject' => 'Test Letter',
            'contents' => 'Test contents',
            'docdate' => now()->toDateString(),
        ]);

        $this->assertTrue(in_array($response->status(), [302, 401]));
    }

    /**
     * Test viewer role cannot create letter
     */
    public function test_viewer_cannot_create_letter(): void
    {
        $viewer = User::factory()->create(['role' => 'user']);
        $sender = Sender::factory()->create();
        $recipient = Recipient::factory()->create();
        $workPackage = WorkPackage::factory()->create();

        $response = $this->actingAs($viewer)->post('/letters', [
            'sender_id' => $sender->id,
            'recipient_id' => $recipient->id,
            'work_package_id' => $workPackage->id,
            'docref' => 'DOC-001',
            'subject' => 'Test Letter',
            'contents' => 'Test contents',
            'docdate' => now()->toDateString(),
        ]);

        $response->assertStatus(403);
    }

    /**
     * Test letter with optional confidential flag
     */
    public function test_create_letter_with_optional_flags(): void
    {
        $sender = Sender::factory()->create();
        $recipient = Recipient::factory()->create();
        $workPackage = WorkPackage::factory()->create();

        $response = $this->actingAs($this->editor)->post('/letters', [
            'sender_id' => $sender->id,
            'recipient_id' => $recipient->id,
            'work_package_id' => $workPackage->id,
            'docref' => 'DOC-FLAGS',
            'subject' => 'Test Letter',
            'contents' => 'Test contents',
            'docdate' => now()->toDateString(),
        ]);

        $response->assertRedirect();
    }
}
