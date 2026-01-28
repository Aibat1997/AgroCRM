<?php

namespace App\Services;

use App\FileSystem\UploadDocument;
use App\Contracts\DocumentUploadServiceInterface;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;

class DocumentUploadService implements DocumentUploadServiceInterface
{
    public function upload(UploadedFile $file, string $directory): string
    {
        try {
            $uploader = new UploadDocument($file);

            return $uploader->save($directory);
        } catch (Exception $e) {
            Log::error('Document upload failed', [
                'error' => $e->getMessage(),
                'directory' => $directory,
                'file_name' => $file->getClientOriginalName(),
            ]);
            throw new Exception('Failed to upload document: ' . $e->getMessage());
        }
    }
}
