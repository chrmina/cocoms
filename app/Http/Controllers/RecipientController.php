<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecipientRequest;
use App\Http\Requests\UpdateRecipientRequest;
use App\Models\Recipient;
use App\Services\RecipientService;
use App\Services\ExcelExportService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class RecipientController extends Controller
{
    public function __construct(private RecipientService $recipientService)
    {
    }

    public function index(): View
    {
        $this->authorize('viewAny', Recipient::class);

        $recipients = $this->recipientService->getAllRecipients();

        return view('recipients.index', ['recipients' => $recipients]);
    }

    public function create(): View
    {
        $this->authorize('create', Recipient::class);

        return view('recipients.create');
    }

    public function store(StoreRecipientRequest $request): RedirectResponse
    {
        $this->authorize('create', Recipient::class);

        $this->recipientService->createRecipient($request->validated());

        return redirect()->route('recipients.index')->with('success', 'Recipient created successfully.');
    }

    public function show(Recipient $recipient): View
    {
        $this->authorize('view', $recipient);

        $recipient = $this->recipientService->getRecipientById($recipient->id);

        return view('recipients.show', ['recipient' => $recipient]);
    }

    public function edit(Recipient $recipient): View
    {
        $this->authorize('update', $recipient);

        $recipient = $this->recipientService->getRecipientById($recipient->id);

        return view('recipients.edit', ['recipient' => $recipient]);
    }

    public function update(UpdateRecipientRequest $request, Recipient $recipient): RedirectResponse
    {
        $this->authorize('update', $recipient);

        $this->recipientService->updateRecipient($recipient, $request->validated());

        return redirect()->route('recipients.show', $recipient)->with('success', 'Recipient updated successfully.');
    }

    public function destroy(Recipient $recipient): RedirectResponse
    {
        $this->authorize('delete', $recipient);

        $this->recipientService->deleteRecipient($recipient);

        return redirect()->route('recipients.index')->with('success', 'Recipient deleted successfully.');
    }

    public function exportExcel(ExcelExportService $exportService)
    {
        $this->authorize('viewAny', Recipient::class);

        $recipients = Recipient::withCount('letters')->get();

        return $exportService->exportRecipients($recipients);
    }

    public function search(Request $request): View
    {
        $this->authorize('viewAny', Recipient::class);

        $query = $request->get('q', '');
        $recipients = $query
            ? $this->recipientService->searchRecipients($query)
            : collect();

        return view('recipients.search', [
            'recipients' => $recipients,
            'query' => $query,
        ]);
    }
}
