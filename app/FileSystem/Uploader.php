<?php

namespace App\FileSystem;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

abstract class Uploader
{
    protected UploadedFile $file;
    protected string $originalName;
    protected string $extension;
    protected int $size;

    public function __construct(UploadedFile $file)
    {
        $this->file = $file;
        $this->originalName = $file->getClientOriginalName();
        $this->extension = $file->extension();
        $this->size = $file->getSize();
    }

    public function getFileName(): string
    {
        return $this->originalName;
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

        if ($bytes === 0) {
            return '0 B';
        }

        $pow = floor(log($bytes) / log(1024));
        $pow = min($pow, count($units) - 1);

        $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow];
    }

    public function save(string $path, ?string $newFileName = null, string $disk = 'public'): string
    {
        $path = trim($path, '/');

        if (!is_null($newFileName)) {
            $newFileName = $this->normalizeFileName($newFileName);
            $storedPath = $this->file->storeAs($path, $newFileName, $disk);
        } else {
            $storedPath = $this->file->store($path, $disk);
        }

        return Storage::url($storedPath);
    }

    private function normalizeFileName(string $newFileName): string
    {
        $pathInfo = pathinfo($newFileName);
        return isset($pathInfo['extension']) ? $newFileName : "{$newFileName}.{$this->extension}";
    }
}
