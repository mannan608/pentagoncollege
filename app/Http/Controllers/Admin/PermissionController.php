<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\PermissionRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PermissionController extends Controller
{
    public function __construct(
        private readonly PermissionRepositoryInterface $permissions,
    ) {}

    public function index(Request $request): View
    {
        $request->user()->can('permission.list') || abort(403);

        return view('backend.pages.permissions.index', [
            'permissions' => $this->permissions->allGroupedByFeature(),
            'title' => 'Permissions',
        ]);
    }

 

    public function store(Request $request): RedirectResponse
    {
        $request->user()->can('permission.create') || abort(403);

        return redirect()
            ->route('role.permissions.index')
            ->with('success', 'Permission created successfully.');
    }
 

    public function update(Request $request): RedirectResponse
    {      

        return redirect()
            ->route('role.permissions.index')
            ->with('success', 'Role updated successfully.');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->user()->can('permission.delete') || abort(403);
        return redirect()
            ->route('role.permissions.index')
            ->with('success', 'Permission deleted successfully.');
    }
}
