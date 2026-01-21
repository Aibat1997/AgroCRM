<?php

namespace App\FileSystem;

use Illuminate\Http\UploadedFile;

class UploadAudio extends Uploader
{
    public function __construct(UploadedFile $file)
    {
        parent::__construct($file);
    }
}
