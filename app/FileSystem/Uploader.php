<?php

namespace App\FileSystem;

use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

abstract class Uploader
{
    protected UploadedFile $file;
    protected string $originalName;
    protected string $extension;
    protected int $size;
    protected ?string $newFileName = null;
    protected string $disk = 'public';

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

    public function rename(string $newFileName): static
    {
        $this->newFileName = $this->normalizeFileName($newFileName);
        return $this;
    }

    public function disk(string $disk): static
    {
        $this->disk = $disk;
        return $this;
    }

    public function save(string $path): string
    {
        $path = trim($path, '/');

        if (!is_null($this->newFileName)) {
            $newFileName = $this->normalizeFileName($this->newFileName);
            $storedPath = $this->file->storeAs($path, $newFileName, $this->disk);
        } else {
            $storedPath = $this->file->store($path, $this->disk);
        }

        return $this->storageUrl($this->disk, $storedPath);
    }

    protected function normalizeFileName(string $newFileName): string
    {
        $pathInfo = pathinfo($newFileName);
        return isset($pathInfo['extension']) ? $newFileName : "{$newFileName}.{$this->extension}";
    }

    protected function storageUrl(string $disk, string $path): string
    {
        /** @var FilesystemAdapter $fs */
        $fs = Storage::disk($disk);

        return $fs->url($path);
    }
}
