<?php

namespace App\FileSystem;

use Illuminate\Http\UploadedFile;

class UploadVideo extends Uploader
{
    public function __construct(UploadedFile $file, string $folder_name = 'videos', ?string $new_file_name = null)
    {
        parent::__construct($file, $folder_name, $new_file_name);
    }
}
