<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreWorkPackageRequest extends FormRequest
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
            'number' => ['nullable', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'wp_coordinator' => ['nullable', 'string', 'max:255'],
            'wp_qs' => ['nullable', 'string', 'max:255'],
        ];
    }
}
