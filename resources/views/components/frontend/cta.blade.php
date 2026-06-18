 <div class="bg-secondary-500 rounded-2xl px-5 py-8 md:px-8 md:py-10 lg:px-10 lg:py-12">

                <div class="flex flex-col lg:flex-row items-center justify-between gap-6 lg:gap-10">

                    <!-- Content -->
                    <div class="text-center lg:text-left max-w-2xl">
                        <h4 class="text-white font-semibold leading-snug
                text-lg md:text-xl lg:text-2xl">
                            Stay in the loop and never miss an update.
                        </h4>
                    </div>

                    <!-- Form -->
                    <form class="w-full lg:w-auto"  action="{{ route('subscribe.store') }}" method="POST">
                         @csrf
                        <div class="flex flex-col sm:flex-row gap-3">

                            <input type="email" name="email" placeholder="Enter Email Address..." required
                                class="w-full sm:min-w-[320px] lg:min-w-100
                        px-4 py-3
                        bg-white
                        border border-white/20
                        rounded-lg
                        text-gray-900
                        placeholder:text-gray-500
                        focus:outline-none
                        focus:ring-2
                        focus:ring-brand-500">

                            <button type="submit"
                                class="whitespace-nowrap
                        bg-brand-600
                        hover:bg-brand-600
                        text-white
                        px-6 py-3
                        rounded-lg
                        font-medium
                        transition">
                                SUBSCRIBE
                            </button>

                        </div>
                    </form>

                </div>

            </div>