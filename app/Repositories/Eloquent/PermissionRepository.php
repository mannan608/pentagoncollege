<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\PermissionRepositoryInterface;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Permission;

class PermissionRepository implements PermissionRepositoryInterface
{
    public function allGroupedByFeature(?string $search = null): Collection
    {
        return Permission::query()
            ->when($search, fn ($query) => $query->where('name', 'like', "%{$search}%"))
            ->orderBy('name')
            ->get()
            ->groupBy(fn (Permission $permission): string => str($permission->name)->before('.')->toString());
    }

    public function findByNames(array $names): Collection
    {
        return Permission::query()
            ->whereIn('name', $names)
            ->pluck('name');
    }

    public function firstOrCreate(string $name, ?string $guardName = null): Permission
    {
        return Permission::firstOrCreate([
            'name' => $name,
            'guard_name' => $guardName ?? config('rbac.default_guard', 'web'),
        ]);
    }

    public function create(array $data): Permission
    {
        return Permission::create([
            'name' => $data['name'],
            'guard_name' => config('rbac.default_guard', 'web'),
        ]);
    }

    public function update(Permission $permission, array $data): Permission
    {
        $permission->update([
            'name' => $data['name'] ?? $permission->name,
            'guard_name' => config('rbac.default_guard', 'web'),
        ]);

        return $permission->refresh();
    }

    public function delete(Permission $permission): bool
    {
        return (bool) $permission->delete();
    }
}
