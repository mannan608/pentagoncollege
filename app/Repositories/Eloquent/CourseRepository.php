<?php

namespace App\Repositories\Eloquent;

use App\Models\Course;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourseRepository implements CourseRepositoryInterface
{
    public function paginate(int $perPage = 15)
    {
        return Course::latest()
            ->paginate($perPage);
    }

    public function findById(int $id): Course
    {
        return Course::findOrFail($id);
    }

    public function create(array $data,Request $request ): Course {

        return DB::transaction(function () use ($data, $request) {

            $data['slug'] = $this->generateUniqueSlug(
                $data['name']
            );
            
            $data['created_by'] = auth()->id();

            if ($request->hasFile('thumbnail')) {
                $data['thumbnail'] = $this->uploadFile(
                    $request->file('thumbnail'),
                    'uploads/courses/thumbnails'
                );
            }

            if ($request->hasFile('course_material')) {
                $data['course_material'] = $this->uploadFile(
                    $request->file('course_material'),
                    'uploads/courses/materials'
                );
            }

            return Course::create($data);
        });
    }

    public function update(Course $course,array $data, Request $request ): Course {

        return DB::transaction(function () use (
            $course,
            $data,
            $request
        ) {

            if (
                isset($data['name']) &&
                $course->name !== $data['name']
            ) {
                $data['slug'] = $this->generateUniqueSlug(
                    $data['name'],
                    $course->id
                );
            }
            
            $data['updated_by'] = auth()->id();

            if ($request->hasFile('thumbnail')) {
                $data['thumbnail'] = $this->uploadFile(
                    $request->file('thumbnail'),
                    'uploads/courses/thumbnails'
                );
            }

            if ($request->hasFile('course_material')) {
                $data['course_material'] = $this->uploadFile(
                    $request->file('course_material'),
                    'uploads/courses/materials'
                );
            }

            $course->update($data);

            return $course->fresh();
        });
    }

    public function delete(Course $course): bool {
        return $course->delete();
    }

    private function generateUniqueSlug(
        string $name,
        ?int $ignoreId = null
    ): string {

        $slug = Str::slug($name);

        $query = Course::where(
            'slug',
            'LIKE',
            "{$slug}%"
        );

        if ($ignoreId) {
            $query->where('id', '!=', $ignoreId);
        }

        $count = $query->count();

        return $count
            ? "{$slug}-" . ($count + 1)
            : $slug;
    }

    private function uploadFile(
        $file,
        string $path
    ): string {

        $destinationPath = public_path($path);

        if (! file_exists($destinationPath)) {
            mkdir($destinationPath, 0775, true);
        }

        $fileName = time()
            . '_'
            . uniqid()
            . '.'
            . $file->getClientOriginalExtension();

        $file->move(
            $destinationPath,
            $fileName
        );

        return $path . '/' . $fileName;
    }
}