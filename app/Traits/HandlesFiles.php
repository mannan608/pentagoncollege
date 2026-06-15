<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait HandlesFiles
{
    /**
     * Upload single file
     */
    public function uploadFile(
        UploadedFile $file,
        string $directory,
        string $disk = 'public',
        ?string $filename = null
    ): string {

        $extension = $file->getClientOriginalExtension();

        $name = $filename
            ? "{$filename}.{$extension}"
            : Str::uuid().".{$extension}";

        return $file->storeAs(
            $directory,
            $name,
            $disk
        );
    }

    /**
     * Upload multiple files
     */
    public function uploadFiles(
        array $files,
        string $directory,
        string $disk = 'public'
    ): array {

        $paths = [];

        foreach ($files as $file) {

            $paths[] = $this->uploadFile(
                $file,
                $directory,
                $disk
            );

        }

        return $paths;
    }

    /**
     * Delete file
     */
    public function deleteFile(
        ?string $path,
        string $disk = 'public'
    ): bool {

        if (!$path) {
            return false;
        }

        if (!Storage::disk($disk)->exists($path)) {
            return false;
        }

        return Storage::disk($disk)
            ->delete($path);
    }

    /**
     * Delete multiple files
     */
    public function deleteFiles(
        array $paths,
        string $disk = 'public'
    ): void {

        foreach ($paths as $path) {
            $this->deleteFile($path, $disk);
        }
    }

    /**
     * Replace file
     */
    public function replaceFile(
        ?UploadedFile $newFile,
        ?string $oldPath,
        string $directory,
        string $disk = 'public'
    ): ?string {

        if (!$newFile) {
            return $oldPath;
        }

        $this->deleteFile(
            $oldPath,
            $disk
        );

        return $this->uploadFile(
            $newFile,
            $directory,
            $disk
        );
    }

    /**
     * File URL
     */
    public function fileUrl(
        ?string $path,
        string $disk = 'public',
        ?string $fallback = null
    ): ?string {

        if (!$path) {
            return $fallback;
        }

        if (!Storage::disk($disk)->exists($path)) {
            return $fallback;
        }

        return Storage::disk($disk)
            ->url($path);
    }

    /**
     * Detect file type
     */
    public function getFileType(string $path): string
    {
        $extension = strtolower(
            pathinfo($path, PATHINFO_EXTENSION)
        );

        return match (true) {

            in_array($extension, [
                'jpg',
                'jpeg',
                'png',
                'gif',
                'svg',
                'webp'
            ]) => 'image',

            in_array($extension, [
                'mp4',
                'avi',
                'mov',
                'mkv',
                'webm'
            ]) => 'video',

            in_array($extension, [
                'mp3',
                'wav',
                'ogg',
                'm4a'
            ]) => 'audio',

            default => 'document'
        };
    }
}