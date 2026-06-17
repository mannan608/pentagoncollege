<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Resources\CourseResource;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function __construct(
        protected CourseRepositoryInterface $courseRepository
    ) {}

    public function index(Request $request)
    {
         $request->user()->can('course.list') || abort(403);

        $courses = $this->courseRepository->paginate();

        return CourseResource::collection($courses);
    }

    public function store(StoreCourseRequest $request)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['title']);
        $data['created_by'] = auth()->id();

        $course = $this->courseRepository->create($data);

        return new CourseResource($course);
    }

    public function show(int $id)
    {
        return new CourseResource(
            $this->courseRepository->find($id)
        );
    }

    public function update(
        UpdateCourseRequest $request,
        int $id
    ) {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['title']);
        $data['updated_by'] = auth()->id();

        $course = $this->courseRepository->update($id, $data);

        return new CourseResource($course);
    }

    public function destroy(int $id)
    {
        $this->courseRepository->delete($id);

        return response()->json([
            'message' => 'Course deleted successfully'
        ]);
    }
}