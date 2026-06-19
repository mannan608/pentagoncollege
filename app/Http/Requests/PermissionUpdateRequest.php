<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;

class PermissionUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('permission.edit') === true;
    }

    public function rules(): array
    {
        $permission = $this->route('permission');
        $permissionId = $permission instanceof Permission ? $permission->id : $permission;

        return [
            'name' => [
                'required',
                'string',
                'max:125',
                Rule::unique('permissions', 'name')
                    ->where('guard_name', config('rbac.default_guard', 'web'))
                    ->ignore($permissionId),
            ],
        ];
    }
}
