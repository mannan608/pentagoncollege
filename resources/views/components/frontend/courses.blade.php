@php
    $courses = [
    [
        'title' => 'Advanced Diploma of Information Technology ICT60220 | CRICOS 109180H',
        'image' => asset('penta-img/course_1.jpg'),
        'category' => 'IT',
        'university' => 'Pentagon College Australia',
        'location' => 'Sydney, Australia',
        'duration' => '2 Years',
        'students' => '1,200+',
        'rating' => 4.8,
        'reviews' => 324,
        'tuition' => '$15,000',
        'trending' => true,
        'slug' => '#',
    ],
    [
        'title' => 'Advanced Diploma of Leadership and Management BSB60420 | CRICOS 109177C',
        'image' => asset('penta-img/course_2.jpg'),
        'category' => 'Business',
        'university' => 'Pentagon College Australia',
        'location' => 'Melbourne, Australia',
        'duration' => '18 Months',
        'students' => '850+',
        'rating' => 4.9,
        'reviews' => 218,
        'tuition' => '$14,500',
        'trending' => false,
        'slug' => '#',
    ],
    [
        'title' => 'Diploma of Information Technology ICT50220 | CRICOS 109179A',
        'image' => asset('penta-img/course_3.jpg'),
        'category' => 'IT',
        'university' => 'Pentagon College Australia',
        'location' => 'Brisbane, Australia',
        'duration' => '1 Year',
        'students' => '950+',
        'rating' => 4.7,
        'reviews' => 187,
        'tuition' => '$12,000',
        'trending' => true,
        'slug' => '#',
    ],
    [
        'title' => 'Diploma of Leadership and Management BSB50420 | CRICOS 109176D',
        'image' => asset('penta-img/course_4.jpg'),
        'category' => 'Management',
        'university' => 'Pentagon College Australia',
        'location' => 'Perth, Australia',
        'duration' => '1 Year',
        'students' => '700+',
        'rating' => 4.6,
        'reviews' => 145,
        'tuition' => '$11,500',
        'trending' => false,
        'slug' => '#',
    ],
    [
        'title' => 'Graduate Diploma of Management (Learning) BSB80120 | CRICOS 109178B',
        'image' => asset('penta-img/course_5.jpg'),
        'category' => 'Education',
        'university' => 'Pentagon College Australia',
        'location' => 'Adelaide, Australia',
        'duration' => '1.5 Years',
        'students' => '450+',
        'rating' => 4.9,
        'reviews' => 98,
        'tuition' => '$16,000',
        'trending' => true,
        'slug' => '#',
    ]
    
];


@endphp
<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach($courses as $course)
        <div
            class="group bg-white rounded-3xl overflow-hidden border border-gray-100 hover:border-transparent hover:shadow-2xl hover:shadow-blue-500/10 transition-all duration-500 hover:-translate-y-2">

            {{-- Image --}}
            <div class="relative h-56 overflow-hidden bg-gray-100">

                <img
                    src="{{ $course['image'] }}"
                    alt="{{ $course['title'] }}"
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">

                {{-- Overlay --}}
                <div
                    class="absolute inset-0 bg-linear-to-t from-black/60 via-transparent to-transparent">
                </div>

                {{-- Category --}}
                {{-- <div
                    class="absolute top-4 right-4 px-3 py-1.5 bg-blue-100 text-brand-500 rounded-full text-xs font-semibold border border-brand-500 backdrop-blur-sm">
                    {{ $course['category'] }}
                </div> --}}

                {{-- Bookmark --}}
                {{-- <button
                    class="absolute bottom-4 right-4 p-2.5 bg-white/90 backdrop-blur-sm rounded-full hover:bg-white transition-colors shadow-lg">
                    <i class="fa-regular fa-bookmark text-gray-700"></i>
                </button> --}}

                {{-- Rating --}}
                {{-- <div
                    class="absolute bottom-4 left-4 flex items-center gap-2 px-3 py-1.5 bg-white/90 backdrop-blur-sm rounded-full">
                    <i class="fa-solid fa-star text-yellow-500"></i>

                    <span class="text-sm font-bold text-gray-900">
                        {{ $course->rating ?? '4.8' }}
                    </span>

                    <span class="text-xs text-gray-600">
                        ({{ $course->reviews_count ?? 0 }})
                    </span>
                </div> --}}
            </div>

            {{-- Content --}}
            <div class="p-6">

                <h3 class="text-base md:text-lg font-bold text-gray-900 mb-2 line-clamp-2 text-center">
                    {{ $course['title'] }}
                </h3>

                {{-- <p class="text-gray-700 font-medium mb-1">
                    {{ $course->provider->name ?? 'Pentagon College' }}
                </p>

                <div class="flex items-center gap-2 text-gray-500 text-sm mb-6">
                    <i class="fa-solid fa-location-dot"></i>
                    <span>{{ $course->location ?? 'Australia' }}</span>
                </div> --}}

                {{-- Stats --}}
                {{-- <div
                    class="flex items-center gap-4 text-sm text-gray-600 mb-6 pb-6 border-b border-gray-100">

                    <div class="flex items-center gap-1.5">
                        <i class="fa-regular fa-clock text-gray-400"></i>
                        <span>{{ $course->duration ?? '12 Months' }}</span>
                    </div>

                    <div class="flex items-center gap-1.5">
                        <i class="fa-solid fa-users text-gray-400"></i>
                        <span>{{ $course->students ?? '500+' }}</span>
                    </div>
                </div> --}}

                {{-- Footer --}}
                <div class="flex items-center justify-center mt-4">

                    {{-- <div>
                        <p class="text-xs text-gray-500 mb-1">
                            Annual Tuition
                        </p>

                        <p class="text-lg font-bold text-[#1068b2]">
                            {{ $course->price ? '$' . number_format($course->price) : 'Contact Us' }}
                        </p>
                    </div> --}}

                    <a href="#"
                        class="group/btn text-sm flex items-center gap-2 px-5 py-2.5 bg-brand-500/10 hover:bg-brand-500 text-brand-600 hover:text-white rounded-xl font-medium transition-all">

                        <span>ENROLL COURSE</span>
                    </a>

                </div>

            </div>
        </div>
    @endforeach
</div>