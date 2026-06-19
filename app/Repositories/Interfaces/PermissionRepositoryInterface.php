<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;
use Spatie\Permission\Models\Permission;

interface PermissionRepositoryInterface
{
    public function allGroupedByFeature(?string $search = null): Collection;

    public function findByNames(array $names): Collection;

    public function firstOrCreate(string $name, ?string $guardName = null): Permission;

    public function create(array $data): Permission;

    public function update(Permission $permission, array $data): Permission;

    public function delete(Permission $permission): bool;
}
