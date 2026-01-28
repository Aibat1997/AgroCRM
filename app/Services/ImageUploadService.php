<?php

namespace App\Services;

use App\FileSystem\UploadImage;
use App\Contracts\ImageUploadServiceInterface;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;

class ImageUploadService implements ImageUploadServiceInterface
{
    public function upload(UploadedFile $file, string $directory): string
    {
        try {
            $uploader = new UploadImage($file);

            return $uploader->save($directory);
        } catch (Exception $e) {
            Log::error('Image upload failed', [
                'error' => $e->getMessage(),
                'directory' => $directory,
                'file_name' => $file->getClientOriginalName(),
            ]);
            throw new Exception('Failed to upload image: ' . $e->getMessage());
        }
    }
}
