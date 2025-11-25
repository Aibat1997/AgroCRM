<?php

namespace App\FileSystem;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

abstract class Uploader
{
    protected $file;
    private $path;
    private $original_name;
    protected $new_file_name;
    private $extension;
    private $size;
    private $disk;

    public function __construct(UploadedFile $file, string $path, ?string $new_file_name = null, ?string $disk = 'public')
    {
        $this->file = $file;
        $this->path = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $path);
        $this->original_name = $file->getClientOriginalName();
        $this->extension = $file->extension();
        $this->size = $file->getSize();
        $this->new_file_name = $this->normalizeFileName($new_file_name);
        $this->disk = $disk;
    }

    public function getFileName(): string
    {
        return $this->original_name;
    }

    public function getExtension(): string
    {
        return $this->extension;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function getFormattedSize(int $precision = 2): string
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        $bytes = max($this->size, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow];
    }

    public function upload(): string
    {
        if ($this->new_file_name) {
            $stored_path = $this->file->storeAs($this->path, $this->new_file_name, $this->disk);
        } else {
            $stored_path = $this->file->store($this->path, $this->disk);
        }

        return Storage::url(str_replace('\\', '/', $stored_path));
    }

    private function normalizeFileName(?string $new_file_name): ?string
    {
        if ($new_file_name) {
            $info = pathinfo($new_file_name);
            if (isset($info['extension'])) {
                return $new_file_name;
            } else {
                return "{$new_file_name}.{$this->extension}";
            }
        } else {
            return null;
        }
    }
}
