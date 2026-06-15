<x-app-layout>
    <style>
        #tags {
            color: #374151 !important;
            background-color: white !important;
        }
        #tags option {
            color: #374151 !important;
            background-color: white !important;
        }
        #tags option:checked {
            background: #3b82f6 !important;
            color: white !important;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Letter') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('letters.update', $letter) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="mb-4">
                        <label for="sender_id" class="block text-sm font-medium text-gray-700 mb-2">Sender (Company)</label>
                        <select id="sender_id" name="sender_id" class="w-full px-3 py-2 border {{ $errors->has('sender_id') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @foreach (\App\Models\Company::orderBy('name')->get() as $company)
                                <option value="{{ $company->id }}" {{ $letter->sender_id == $company->id ? 'selected' : '' }}>
                                    {{ $company->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('sender_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="recipient_id" class="block text-sm font-medium text-gray-700 mb-2">Recipient (Company)</label>
                        <select id="recipient_id" name="recipient_id" class="w-full px-3 py-2 border {{ $errors->has('recipient_id') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @foreach (\App\Models\Company::orderBy('name')->get() as $company)
                                <option value="{{ $company->id }}" {{ $letter->recipient_id == $company->id ? 'selected' : '' }}>
                                    {{ $company->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('recipient_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="work_package_id" class="block text-sm font-medium text-gray-700 mb-2">Work Package</label>
                        <select id="work_package_id" name="work_package_id" class="w-full px-3 py-2 border {{ $errors->has('work_package_id') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @foreach (\App\Models\WorkPackage::orderBy('name')->get() as $wp)
                                <option value="{{ $wp->id }}" {{ $letter->work_package_id == $wp->id ? 'selected' : '' }}>
                                    {{ $wp->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('work_package_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                        <input type="text" id="subject" name="subject" value="{{ $letter->subject }}" class="w-full px-3 py-2 border {{ $errors->has('subject') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                        @error('subject') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="docref" class="block text-sm font-medium text-gray-700 mb-2">Document Reference</label>
                        <input type="text" id="docref" name="docref" value="{{ $letter->docref }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('docref') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="docdate" class="block text-sm font-medium text-gray-700 mb-2">Document Date</label>
                        <input type="date" id="docdate" name="docdate" value="{{ $letter->docdate?->format('Y-m-d') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('docdate') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    @if ($letter->filelink)
                        <div class="mb-4 p-3 bg-blue-50 border border-blue-200 rounded">
                            <p class="text-sm text-blue-700">Current file: <strong>{{ basename($letter->filelink) }}</strong></p>
                            <p class="text-xs text-blue-600 mt-1">Upload a new file to replace it</p>
                        </div>
                    @endif

                    <div class="mb-4">
                        <label for="file" class="block text-sm font-medium text-gray-700 mb-2">Upload Document</label>
                        <input type="file" id="file" name="file" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <p class="mt-1 text-xs text-gray-500">Optional: PDF or document file (Max 50MB)</p>
                        @error('file') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="contents" class="block text-sm font-medium text-gray-700 mb-2">Contents</label>
                        <textarea id="contents" name="contents" rows="8" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ $letter->contents }}</textarea>
                        @error('contents') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4 flex items-center space-x-4">
                        <label class="flex items-center">
                            <input type="checkbox" name="confidential" value="1" {{ $letter->confidential ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-offset-0 focus:ring-blue-200">
                            <span class="ms-2 text-sm text-gray-600">Confidential</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="replyreq" value="1" {{ $letter->replyreq ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-offset-0 focus:ring-blue-200">
                            <span class="ms-2 text-sm text-gray-600">Reply Required</span>
                        </label>
                    </div>

                    <div class="mb-4">
                        <label for="tags" class="block text-sm font-medium text-gray-700 mb-2">Tags</label>
                        <div class="flex gap-2 mb-2">
                            <select id="tags" class="flex-1 px-3 py-2 border text-gray-700 border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                <option value="" >Select a tag...</option>
                                @foreach (\App\Models\Tag::orderBy('label')->get() as $tag)
                                    <option value="{{ $tag->id }}:{{ $tag->label }}">{{ $tag->label }}</option>
                                @endforeach
                            </select>
                            <button type="button" onclick="addTag()" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 font-semibold text-sm">
                                Add Tag
                            </button>
                        </div>
                        <div id="selected-tags" class="flex flex-wrap gap-2">
                            @php
                                $letterTags = $letter->taggedItems()->where('fk_table', 'letters')->pluck('tag_id')->toArray();
                            @endphp
                            @foreach (\App\Models\Tag::whereIn('id', $letterTags)->get() as $tag)
                                <div class="tag-item bg-blue-100 text-blue-800 px-3 py-1 rounded-full flex items-center gap-2" data-tag-id="{{ $tag->id }}">
                                    <span>{{ $tag->label }}</span>
                                    <button type="button" onclick="removeTag(this)" class="font-bold text-lg leading-none hover:text-red-600">×</button>
                                    <input type="hidden" name="tags[]" value="{{ $tag->id }}">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="letter_references" class="block text-sm font-medium text-gray-700 mb-2">Reference Other Letters</label>
                        <div class="flex gap-2 mb-2">
                            <select id="letter_references" class="flex-1 px-3 py-1 border text-gray-700 text-sm border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Select a letter...</option>
                                @foreach (\App\Models\Letter::where('id', '!=', $letter->id)->orderBy('docdate', 'desc')->limit(100)->get() as $ref_letter)
                                    <option value="{{ $ref_letter->id }}:{{ $ref_letter->subject }} ({{ $ref_letter->docref ?? 'No Ref' }}) - {{ $ref_letter->docdate?->format('Y-m-d') }}">
                                        {{ substr($ref_letter->subject, 0, 40) }}{{ strlen($ref_letter->subject) > 40 ? '...' : '' }} - {{ $ref_letter->docdate?->format('Y-m-d') }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="button" onclick="addLetterReference()" class="px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700 font-semibold text-sm whitespace-nowrap">
                                Add
                            </button>
                        </div>
                        <div id="selected-references" class="flex flex-wrap gap-2">
                            @foreach ($letter->referencedLetters as $refLetter)
                                <div class="reference-item bg-green-100 text-green-800 px-3 py-1 rounded-full flex items-center gap-2" data-letter-id="{{ $refLetter->id }}">
                                    <span>{{ $refLetter->subject }} ({{ $refLetter->docref ?? 'No Ref' }})</span>
                                    <button type="button" onclick="removeLetterReference(this)" class="font-bold text-lg leading-none hover:text-red-600">×</button>
                                    <input type="hidden" name="letter_references[]" value="{{ $refLetter->id }}">
                                </div>
                            @endforeach
                        </div>
                        @error('letter_references') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-between gap-4 mt-8 pt-6 border-t border-gray-200" style="display: flex !important; visibility: visible !important;">
                        <a href="{{ route('letters.show', $letter) }}" class="inline-flex items-center px-6 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-gray-700" style="display: inline-flex !important; visibility: visible !important; opacity: 1 !important;">
                            {{ __('Cancel') }}
                        </a>
                        <button type="submit" class="inline-flex items-center px-6 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" style="display: inline-flex !important; visibility: visible !important; opacity: 1 !important;">
                            {{ __('Update Letter') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function addTag() {
            const select = document.getElementById('tags');
            const selectedOption = select.options[select.selectedIndex];

            if (!selectedOption.value) {
                alert('Please select a tag');
                return;
            }

            const [tagId, tagName] = selectedOption.value.split(':');

            // Check if tag already added
            if (document.querySelector(`[data-tag-id="${tagId}"]`)) {
                alert('Tag already added');
                return;
            }

            const tagsContainer = document.getElementById('selected-tags');
            const tagElement = document.createElement('div');
            tagElement.className = 'tag-item bg-blue-100 text-blue-800 px-3 py-1 rounded-full flex items-center gap-2';
            tagElement.setAttribute('data-tag-id', tagId);
            tagElement.innerHTML = `
                <span>${tagName}</span>
                <button type="button" onclick="removeTag(this)" class="font-bold text-lg leading-none hover:text-red-600">×</button>
                <input type="hidden" name="tags[]" value="${tagId}">
            `;

            tagsContainer.appendChild(tagElement);
            select.value = '';
        }

        function removeTag(button) {
            button.closest('.tag-item').remove();
        }

        // Allow adding tag by pressing Enter
        document.getElementById('tags').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                addTag();
            }
        });

        function addLetterReference() {
            const select = document.getElementById('letter_references');
            const selectedOption = select.options[select.selectedIndex];

            if (!selectedOption.value) {
                alert('Please select a letter to reference');
                return;
            }

            const [letterId, letterText] = selectedOption.value.split(':');

            // Check if reference already added
            if (document.querySelector(`[data-letter-id="${letterId}"]`)) {
                alert('Letter reference already added');
                return;
            }

            const referencesContainer = document.getElementById('selected-references');
            const referenceElement = document.createElement('div');
            referenceElement.className = 'reference-item bg-green-100 text-green-800 px-3 py-1 rounded-full flex items-center gap-2';
            referenceElement.setAttribute('data-letter-id', letterId);
            referenceElement.innerHTML = `
                <span>${letterText}</span>
                <button type="button" onclick="removeLetterReference(this)" class="font-bold text-lg leading-none hover:text-red-600">×</button>
                <input type="hidden" name="letter_references[]" value="${letterId}">
            `;

            referencesContainer.appendChild(referenceElement);
            select.value = '';
        }

        function removeLetterReference(button) {
            button.closest('.reference-item').remove();
        }

        // Allow adding reference by pressing Enter
        document.getElementById('letter_references').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                addLetterReference();
            }
        });
    </script>
</x-app-layout>
