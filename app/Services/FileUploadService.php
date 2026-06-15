<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileUploadService
{
    private string $disk = 'public';
    private string $path = 'letters';

    public function upload(UploadedFile $file): array
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = Storage::disk($this->disk)->putFileAs(
            $this->path,
            $file,
            $fileName
        );

        return [
            'path' => $filePath,
            'directory' => $this->path,
            'url' => Storage::url($filePath),
        ];
    }

    public function delete(string $filePath): bool
    {
        if (Storage::disk($this->disk)->exists($filePath)) {
            return Storage::disk($this->disk)->delete($filePath);
        }

        return false;
    }

    public function getUrl(string $filePath): string
    {
        return Storage::url($filePath);
    }

    public function exists(string $filePath): bool
    {
        return Storage::disk($this->disk)->exists($filePath);
    }

    public function move(string $from, string $to): bool
    {
        if (Storage::disk($this->disk)->exists($from)) {
            Storage::disk($this->disk)->move($from, $to);

            return true;
        }

        return false;
    }
}
