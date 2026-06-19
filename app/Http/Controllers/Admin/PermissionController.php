<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionStoreRequest;
use App\Http\Requests\PermissionUpdateRequest;
use App\Repositories\Interfaces\PermissionRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct(
        private readonly PermissionRepositoryInterface $permissions,
    ) {}

    public function index(Request $request): View
    {
        $request->user()->can('permission.list') || abort(403);

        return view('backend.pages.permissions.index', [
            'permissions' => $this->permissions->allGroupedByFeature($request->string('search')->toString()),
            'title' => 'Permissions',
        ]);
    }

    public function store(PermissionStoreRequest $request): RedirectResponse
    {
        $request->user()->can('permission.create') || abort(403);

        $this->permissions->create($request->validated());

        return redirect()
            ->route('role.permissions.index', ['role' => $request->route('role')])
            ->with('success', 'Permission created successfully.');
    }

    public function update(PermissionUpdateRequest $request, string $role, Permission $permission): RedirectResponse
    {
        $request->user()->can('permission.edit') || abort(403);

        $this->permissions->update($permission, $request->validated());

        return redirect()
            ->route('role.permissions.index', ['role' => $request->route('role')])
            ->with('success', 'Permission updated successfully.');
    }

    public function destroy(Request $request, string $role, Permission $permission): RedirectResponse
    {
        $request->user()->can('permission.delete') || abort(403);

        $this->permissions->delete($permission);

        return redirect()
            ->route('role.permissions.index', ['role' => $request->route('role')])
            ->with('success', 'Permission deleted successfully.');
    }
}
