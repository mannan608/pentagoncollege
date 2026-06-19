@extends('backend.layouts.app')

@section('content')
    <div class="space-y-6">
        @if (session('success'))
            <x-ui.alert variant="success" title="" message="{{ session('success') }}" />
        @endif

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Permissions</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Create & manage permissions.</p>
            </div>

            @can('permission.create')
                <button type="button" data-modal-target="default-modal" data-modal-toggle="default-modal"
                    class="inline-flex items-center rounded-lg bg-brand-600 px-4 py-2 text-sm font-medium text-white hover:bg-brand-600">
                    Add Permission
                </button>
            @endcan
        </div>

        <div class="flex flex-col gap-4">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
                <h4 class="text-sm font-semibold text-gray-800 dark:text-white/90">All Permissions</h4>
                <x-form.input type="search" name="search" wire:model="search" placeholder="Search..." />
            </div>
            <div class="space-y-4">
                @foreach ($permissions as $feature => $featurePermissions)
                    <div class="rounded-lg border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900">
                        <h4 class="mb-4 text-sm font-semibold uppercase text-gray-700 dark:text-gray-300">
                            {{ $feature }}
                        </h4>
                        <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
                            @foreach ($featurePermissions as $permission)
                                <label class="flex items-center gap-2 text-sm text-gray-700 dark:text-gray-300">
                                    <span>{{ $permission->name }}</span> <span data-modal-target="default-modal"
                                        data-modal-toggle="default-modal">Edit</span> <span>Delete</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

    <!-- Main modal -->
    <div id="default-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
                <!-- Modal header -->
                <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                    <h3 class="text-lg font-medium text-heading">
                        Add Permission
                    </h3>
                    <button type="button"
                        class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="default-modal">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="space-y-4 md:space-y-6 py-4 md:py-6">
                    <div class="space-y-4">
                        <x-form.input type="text" name="name" label="Permission Name" placeholder="Name" />
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center border-t border-default space-x-4 pt-4 md:pt-5">
                    <button data-modal-hide="default-modal" type="button"
                        class="inline-flex items-center rounded-lg bg-brand-600 px-4 py-2 text-sm font-medium text-white hover:bg-brand-600">Create</button>
                    <button data-modal-hide="default-modal" type="button"
                        class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Decline</button>
                </div>
            </div>
        </div>
    </div>
@endsection
