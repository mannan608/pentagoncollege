<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait HandlesFiles
{
    public function uploadFile(
        UploadedFile $file,
        string $directory,
        string $disk = 'public',
        ?string $filename = null
    ): string {

        $name = $filename
            ? $filename.'.'.$file->extension()
            : Str::ulid().'.'.$file->extension();

        return $file->storeAs(
            $directory,
            $name,
            $disk
        );
    }

    public function uploadFiles(
        array $files,
        string $directory,
        string $disk = 'public'
    ): array {

        $paths = [];

        foreach ($files as $file) {

            if (!$file instanceof UploadedFile) {
                continue;
            }

            $paths[] = $this->uploadFile(
                $file,
                $directory,
                $disk
            );
        }

        return $paths;
    }

    public function deleteFile(
        ?string $path,
        string $disk = 'public'
    ): bool {

        return $path
            ? Storage::disk($disk)->delete($path)
            : false;
    }

    public function deleteFiles(
        array $paths,
        string $disk = 'public'
    ): void {

        foreach ($paths as $path) {
            $this->deleteFile($path, $disk);
        }
    }

    public function replaceFile(
        ?UploadedFile $newFile,
        ?string $oldPath,
        string $directory,
        string $disk = 'public'
    ): ?string {

        if (!$newFile) {
            return $oldPath;
        }

        $this->deleteFile($oldPath, $disk);

        return $this->uploadFile(
            $newFile,
            $directory,
            $disk
        );
    }

    public function fileUrl(
        ?string $path,
        string $disk = 'public',
        ?string $fallback = null
    ): ?string {

        return $path
            ? Storage::disk($disk)->url($path)
            : $fallback;
    }
}