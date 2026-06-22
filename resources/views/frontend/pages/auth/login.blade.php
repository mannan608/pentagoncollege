@extends('frontend.layouts.app')

@section('content')
    <section class="max-w-7xl mx-auto">
          @if (session('success'))
            <x-ui.alert variant="success" title="" message="{{ session('success') }}" />
        @endif
        <form action="{{ route('student.login.submit') }}" method="POST">
            @csrf
        <div class="">
            <div
                class="grid gap-5 rounded-lg border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900 md:grid-cols-2">
               
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300"
                        for="email">Email</label>
                    <input id="email" type="email" name="email" required
                        class="h-11 w-full rounded-lg border border-gray-300 px-4 text-sm text-gray-800 focus:border-brand-500 focus:outline-none dark:border-gray-700 dark:bg-gray-900 dark:text-white">
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300"
                        for="password">Password</label>
                    <input id="password" type="password" name="password"
                        class="h-11 w-full rounded-lg border border-gray-300 px-4 text-sm text-gray-800 focus:border-brand-500 focus:outline-none dark:border-gray-700 dark:bg-gray-900 dark:text-white">
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <button type="submit"
                class="rounded-lg bg-brand-600 px-4 py-2 text-sm font-medium text-white hover:bg-brand-600">
                Login
            </button>
        </div>
        </form>
    </section>
@endsection
