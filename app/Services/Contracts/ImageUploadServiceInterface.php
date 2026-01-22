<?php

namespace App\Services\Contracts;

use Illuminate\Http\UploadedFile;

interface ImageUploadServiceInterface
{
    public function upload(UploadedFile $file, string $directory): string;
}
