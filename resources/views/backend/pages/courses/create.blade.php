@extends('backend.layouts.app')

@section('content')
    <form action="{{ role_route('role.universities.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">

            <div class="lg:col-span-8 space-y-6">

                {{-- Course Information --}}
                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">

                    <div class="border-b border-gray-100 p-5 dark:border-gray-800">

                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                            Course Information
                        </h2>

                    </div>

                    <div class="p-5 space-y-5">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            {{-- Name --}}
                            <x-form.input-text name="name" label="Course Name" value="" placeholder="Enter Course Name..." />

                            {{-- Code --}}
                            <x-form.input-text name="code" label="Course Code" value=""  placeholder="Enter Course Code..." />

                            {{-- Cricos --}}
                            <x-form.input-text name="cricos" label="Cricos No" value=""  placeholder="Enter Cricos No..." />

                            {{-- Price --}}
                            <x-form.input-text name="price" label="Price" value=""  placeholder="Enter Price..." />
                            <x-form.input-text name="discount_percentage" label="Discount Price" value=""  placeholder="Enter Discount Price..." />
                            <x-form.select-input name="status" label="Status" :options="[
                                'category1' => 'Category1',
                                'category2' => 'category2',
                                'category3' => 'Suspended3',
                            ]" />
                            <x-form.file-uploader name="thumbnail" label="Image" value="" accept="image/*" />
                            <x-form.file-uploader name="course_material" label="Course Material" value="" />

                             <x-form.textarea-input name="overview" label="Overview" rows="5"
                            placeholder="Enter Course overview..." />

                                <x-form.textarea-input name="entry_requirements" label="Entry Requirements" rows="5"
                            placeholder="Enter Entry Requirements..." />
                                <x-form.textarea-input name="description" label="Description" rows="5"
                            placeholder="Enter Course description..." />
                        </div>
                    </div>

                </div>
            </div>

            <div class="lg:col-span-4">             

                <div class="mt-5">
                    <button type="submit"
                        class=" w-full rounded-lg bg-brand-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-brand-500">
                        Create Course
                    </button>
                </div>
            </div>
        </div>
    </form>
   
@endsection
