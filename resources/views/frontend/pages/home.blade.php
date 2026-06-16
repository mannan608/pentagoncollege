@extends('frontend.layouts.app')

@section('content')
    {{-- background-image: linear-gradient(45deg, #182f59, #00c8f3); --}}
    <section class="bg-secondary-500 -mt-22 pt-22 ">
        <x-frontend.hero />
    </section>
    <section class="bg-white dark:bg-gray-900 py-16">
        <x-frontend.about />
    </section>
    <section class=" py-16">
        <div class="max-w-7xl mx-auto px-5 lg:px-8">
            <div class="">
                <div class="flex flex-col items-center justify-center">
                    <div class="h-1.5 w-14 bg-brand-500 rounded-full mb-3"></div>
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 tracking-tight">Our Courses</h1>
                    <p class="text-sm lg:text-base text-gray-600 text-center mt-3">We offer a range of industry-relevant
                        courses which includes Advanced Diploma of Information Technology, Advanced Diploma of Leadership
                        and Management, Diploma of Information Technology, Diploma of Leadership and Management, and
                        Graduate Diploma of Management(Learning).</p>
                </div>
                <div class=" mt-8 md:mt-12">
                    <x-frontend.courses />
                </div>
                <div class="">
                    <a href="#"
                        class="inline-flex items-center justify-center bg-brand-600 text-white  px-5 py-3 lg:px-6 lg:py-3  rounded-lg
                        hover:bg-brand-500
                        transition duration-300">
                       VIEW ALL COURSES
                    </a>
                </div>
            </div>

        </div>
    </section>
@endsection
