<?php

namespace App\Contracts;

use Illuminate\Http\UploadedFile;

interface DocumentUploadServiceInterface
{
    public function upload(UploadedFile $file, string $directory): string;
}
