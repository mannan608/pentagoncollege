<div class="max-w-7xl mx-auto px-5 lg:px-8">

    <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">

        <!-- Left Content -->
        <div class="flex flex-col items-center justify-center md:block">
            <div>
                <div class="h-1.5 w-14 bg-brand-500 rounded-full mb-3"></div>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 tracking-tight">About Us</h1>
            </div>

            <div class="text-sm lg:text-base text-gray-600 leading-relaxed mt-3 md:mt-5 text-center md:text-left">
                <p class="">Pentagon College is an Australia based, cutting – edge, accredited vocational education
                    provider. We offer courses in Leadership, Business and Information Technology with all our
                    qualifications focusing on workplace knowledge and practical skills that increase employability.
                    This work inspires the public to pay attention to social issues.Our students come from a diverse
                    background. Pentagon offers our students an opportunity to make great friends and learn from our
                    industry – expert trainers in an engaging classroom environment.</p>
            </div>

            <!-- Icons Section -->
            <div class="grid md:grid-cols-2 gap-4 md:gap-8 mt-6 md:mt-10">
                <!-- Qualified Trainers -->
                <div class="flex flex-col items-center md:items-start justify-center md:justify-items-start">

                    <div class="flex gap-3 items-center mb-3">
                        <div
                            class="shrink-0 md:w-12 md:h-12 w-8 h-8 bg-brand-500 rounded-2xl flex items-center justify-center text-brand-500">
                            👨‍🏫
                        </div>
                        <h3 class="font-semibold text-base lg:text-lg text-gray-900">Qualified Trainers</h3>
                    </div>
                    <div>
                        <p class="text-sm lg:text-base text-gray-600 text-center md:text-left">Pentagon work with world class trainers to help
                            students with their career aspirations & provide excellent environment to learn.</p>
                    </div>
                </div>

                <!-- CRICOS Registered -->
                <div class="flex flex-col items-center md:items-start justify-center md:justify-items-start">

                    <div class="flex gap-3 items-center mb-3">
                        <div
                            class="shrink-0 md:w-12 md:h-12 w-8 h-8 bg-brand-500 rounded-2xl flex items-center justify-center text-brand-500">
                            👨‍🏫
                        </div>
                        <h3 class="font-semibold text-base lg:text-lg text-gray-900">CRICOS Registered</h3>
                    </div>
                    <div>
                        <p class="text-sm lg:text-base text-gray-600 text-center md:text-left">Pentagon College is registered on the Commonwealth
                            Register of Institutions and Courses for Overseas Students (CRICOS).</p>
                    </div>
                </div>
            </div>

            <a href="{{ route('about') }}"
                class=" mt-8 lg:mt-10 inline-flex items-center justify-center bg-brand-600 text-white px-5 py-3 lg:px-6 lg:py-3
                        rounded-lg  hover:bg-brand-500
                        transition duration-300">
                About Pentagon
            </a>
        </div>

        <!-- Right Image -->
        <div class="relative">
            <div class="rounded-3xl overflow-hidden shadow-2xl">
                <img src="{{ asset('penta-img/about.jpg') }}" alt="Pentagon College students collaborating"
                    class="w-full h-full object-cover">
            </div>
        </div>
    </div>

</div>
