<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contacts;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function __construct(
        private readonly CourseRepositoryInterface $courses
    ) {}

    public function create()
    {

        $courses = $this->courses->getAll();

        // dd($courses);

        return view('components.frontend.consultation-form', compact('courses'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'message' => ['required', 'string'],
            'course_id' => ['required', 'exists:courses,id'],
        ]);

        Contacts::create($data);

        return redirect()
            ->back()
            ->with('success', 'Your inquiry has been submitted successfully.');
    }
}
