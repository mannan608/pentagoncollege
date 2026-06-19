@extends('backend.layouts.app')

@push('styles')
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
@endpush

@section('content')
    <div class="space-y-6" x-data="{
        isOpen: @js($errors->any()),
        mode: @js(old('_method') === 'PATCH' ? 'edit' : 'create'),
        permissionId: @js(old('permission_id', '')),
        name: @js(old('name', '')),
        createUrl: @js(role_route('role.permissions.store')),
        updateUrlTemplate: @js(role_route('role.permissions.update', ['permission' => '__PERMISSION__'])),
        get modalTitle() {
            return this.mode === 'edit' ? 'Edit Permission' : 'Add Permission';
        },
        get submitLabel() {
            return this.mode === 'edit' ? 'Update' : 'Create';
        },
        get actionUrl() {
            return this.mode === 'edit'
                ? this.updateUrlTemplate.replace('__PERMISSION__', this.permissionId)
                : this.createUrl;
        },
        openCreate() {
            this.mode = 'create';
            this.permissionId = '';
            this.name = '';
            this.isOpen = true;
        },
        openEdit(permission) {
            this.mode = 'edit';
            this.permissionId = permission.id;
            this.name = permission.name;
            this.isOpen = true;
        },
        closeModal() {
            this.isOpen = false;
        }
    }" @keydown.escape.window="closeModal()">
        @if (session('success'))
            <x-ui.alert variant="success" title="" message="{{ session('success') }}" />
        @endif

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Permissions</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Create & manage permissions.</p>
            </div>

            @can('permission.create')
                <button type="button" @click="openCreate()"
                    class="inline-flex items-center rounded-lg bg-brand-600 px-4 py-2 text-sm font-medium text-white hover:bg-brand-600">
                    Add Permission
                </button>
            @endcan
        </div>

        <div class="flex flex-col gap-4">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
                <h4 class="text-sm font-semibold text-gray-800 dark:text-white/90">All Permissions</h4>
                <form method="GET" action="{{ role_route('role.permissions.index') }}" class="w-full sm:w-72">
                    <input type="search" name="search" value="{{ request('search') }}" placeholder="Search..."
                        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                </form>
            </div>
            <div class="space-y-4">
                @forelse ($permissions as $feature => $featurePermissions)
                    <div class="rounded-lg border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900">
                        <h4 class="mb-4 text-sm font-semibold uppercase text-gray-700 dark:text-gray-300">
                            {{ $feature }}
                        </h4>
                        <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
                            @foreach ($featurePermissions as $permission)
                                <div
                                    class="flex items-center justify-between gap-3 rounded-lg border border-gray-100 px-3 py-2 text-sm text-gray-700 dark:border-gray-800 dark:text-gray-300">
                                    <span class="break-all">{{ $permission->name }}</span>
                                    <div class="flex shrink-0 items-center gap-2">
                                        @can('permission.edit')
                                            <button type="button"
                                                @click="openEdit({ id: {{ $permission->id }}, name: @js($permission->name) })"
                                                class="text-brand-600 hover:text-brand-700">
                                                Edit
                                            </button>
                                        @endcan

                                        @can('permission.delete')
                                            <form method="POST"
                                                action="{{ role_route('role.permissions.destroy', ['permission' => $permission]) }}"
                                                onsubmit="return confirm('Delete this permission?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-700">
                                                    Delete
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <div class="rounded-lg border border-gray-200 bg-white p-5 text-sm text-gray-500 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-400">
                        No permissions found.
                    </div>
                @endforelse
            </div>
        </div>

        <div x-cloak x-show="isOpen"
            class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto overflow-x-hidden bg-gray-900/50 p-4"
            role="dialog" aria-modal="true">
            <div class="relative w-full max-w-2xl" @click.outside="closeModal()">
                <form method="POST" :action="actionUrl"
                    class="relative rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-800 dark:bg-gray-900 md:p-6">
                    @csrf
                    <template x-if="mode === 'edit'">
                        <input type="hidden" name="_method" value="PATCH">
                    </template>
                    <input type="hidden" name="permission_id" :value="permissionId">

                    <div class="flex items-center justify-between border-b border-gray-200 pb-4 dark:border-gray-800 md:pb-5">
                        <h3 class="text-lg font-medium text-gray-800 dark:text-white/90" x-text="modalTitle"></h3>
                        <button type="button"
                            class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-transparent text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-white"
                            @click="closeModal()">
                            <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18 17.94 6M18 18 6.06 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    <div class="space-y-4 py-4 md:py-6">
                        <div>
                            <label for="permission-name" class="mb-1 block text-sm font-medium text-slate-700 dark:text-gray-300">
                                Permission Name
                            </label>
                            <input id="permission-name" type="text" name="name" x-model="name" placeholder="permission.action"
                                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                            @error('name')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Guard will be saved as web.</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 border-t border-gray-200 pt-4 dark:border-gray-800 md:pt-5">
                        <button type="submit"
                            class="inline-flex items-center rounded-lg bg-brand-600 px-4 py-2 text-sm font-medium text-white hover:bg-brand-600"
                            x-text="submitLabel"></button>
                        <button type="button" @click="closeModal()"
                            class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
