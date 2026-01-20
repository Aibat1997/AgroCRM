<?php

namespace App\FileSystem;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

abstract class Uploader
{
    protected UploadedFile $file;
    protected string $path;
    protected string $originalName;
    protected ?string $newFileName;
    protected string $extension;
    protected int $size;
    protected string $disk;

    public function __construct(
        UploadedFile $file,
        string $path,
        ?string $newFileName = null,
        string $disk = 'public'
    ) {
        $this->file = $file;
        $this->path = trim($path, '/\\');
        $this->originalName = $file->getClientOriginalName();
        $this->extension = $file->extension();
        $this->size = $file->getSize();
        $this->newFileName = $this->normalizeFileName($newFileName);
        $this->disk = $disk;
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

    public function upload(): string
    {
        $storedPath = $this->newFileName
            ? $this->file->storeAs($this->path, $this->newFileName, $this->disk)
            : $this->file->store($this->path, $this->disk);

        return Storage::url($storedPath);
    }

    private function normalizeFileName(?string $newFileName): ?string
    {
        if (!$newFileName) {
            return null;
        }

        $pathInfo = pathinfo($newFileName);

        return isset($pathInfo['extension'])
            ? $newFileName
            : "{$newFileName}.{$this->extension}";
    }
}
