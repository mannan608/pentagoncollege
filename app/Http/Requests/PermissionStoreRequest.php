<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PermissionStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('permission.create') === true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:125',
                Rule::unique('permissions', 'name')
                    ->where('guard_name', config('rbac.default_guard', 'web')),
            ],
        ];
    }
}
