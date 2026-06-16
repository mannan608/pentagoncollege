@extends('frontend.layouts.app')

@section('content')
{{-- background-image: linear-gradient(45deg, #182f59, #00c8f3); --}}
    <section class="bg-secondary-500 -mt-22 pt-22 ">
        <x-frontend.hero />        
    </section>
    <section class="bg-white dark:bg-gray-900 py-16">
        <x-frontend.about />
    </section>
@endsection
