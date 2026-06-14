<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSenderRequest;
use App\Http\Requests\UpdateSenderRequest;
use App\Models\Sender;
use App\Services\SenderService;
use App\Services\ExcelExportService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class SenderController extends Controller
{
    public function __construct(private SenderService $senderService)
    {
    }

    public function index(): View
    {
        $this->authorize('viewAny', Sender::class);

        $senders = $this->senderService->getAllSenders();

        return view('senders.index', ['senders' => $senders]);
    }

    public function create(): View
    {
        $this->authorize('create', Sender::class);

        return view('senders.create');
    }

    public function store(StoreSenderRequest $request): RedirectResponse
    {
        $this->authorize('create', Sender::class);

        $this->senderService->createSender($request->validated());

        return redirect()->route('senders.index')->with('success', 'Sender created successfully.');
    }

    public function show(Sender $sender): View
    {
        $this->authorize('view', $sender);

        $sender = $this->senderService->getSenderById($sender->id);

        return view('senders.show', ['sender' => $sender]);
    }

    public function edit(Sender $sender): View
    {
        $this->authorize('update', $sender);

        $sender = $this->senderService->getSenderById($sender->id);

        return view('senders.edit', ['sender' => $sender]);
    }

    public function update(UpdateSenderRequest $request, Sender $sender): RedirectResponse
    {
        $this->authorize('update', $sender);

        $this->senderService->updateSender($sender, $request->validated());

        return redirect()->route('senders.show', $sender)->with('success', 'Sender updated successfully.');
    }

    public function destroy(Sender $sender): RedirectResponse
    {
        $this->authorize('delete', $sender);

        $this->senderService->deleteSender($sender);

        return redirect()->route('senders.index')->with('success', 'Sender deleted successfully.');
    }

    public function exportExcel(ExcelExportService $exportService)
    {
        $this->authorize('viewAny', Sender::class);

        $senders = Sender::withCount('letters')->get();

        return $exportService->exportSenders($senders);
    }

    public function search(Request $request): View
    {
        $this->authorize('viewAny', Sender::class);

        $query = $request->get('q', '');
        $senders = $query
            ? $this->senderService->searchSenders($query)
            : collect();

        return view('senders.search', [
            'senders' => $senders,
            'query' => $query,
        ]);
    }
}
