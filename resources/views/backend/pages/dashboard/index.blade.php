@extends('backend.layouts.app')

@section('content')
    <h1>Pentagon College</h1>

    <div class="w-[480px]">
        <form action="">
            <x-form.file-uploader name="image" label="Image" value="" multiple=true 
                placeholder="Upload featured image..." />
        </form>
    </div>
@endsection
