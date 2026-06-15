<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreLetterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->isEditor();
    }

    public function rules(): array
    {
        return [
            'sender_id' => ['required', 'string', 'exists:companies,id'],
            'recipient_id' => ['required', 'string', 'exists:companies,id'],
            'work_package_id' => ['required', 'string', 'exists:work_packages,id'],
            'subject' => ['required', 'string', 'max:500'],
            'contents' => ['nullable', 'string'],
            'docref' => ['nullable', 'string', 'max:255'],
            'docdate' => ['nullable', 'date'],
            'confidential' => ['boolean'],
            'replyreq' => ['boolean'],
            'file' => ['nullable', 'file', 'max:51200', 'mimes:pdf,doc,docx,xls,xlsx,txt,jpg,jpeg,png'],
            'letter_references' => ['nullable', 'array'],
            'letter_references.*' => ['string', 'exists:letters,id'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['string', 'exists:tags_tags,id'],
        ];
    }
}
