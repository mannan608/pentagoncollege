<?php

namespace App\Repositories\Interfaces;

use App\Models\UniversityProvider;

interface ProviderRepositoryInterface
{
    public function paginate(int $perPage = 15);

    public function universities();
    public function campuses();

    public function findById(int $id): UniversityProvider;

    public function create(array $data): UniversityProvider;

    public function update(UniversityProvider $provider, array $data): UniversityProvider;

    public function delete(UniversityProvider $provider): bool;
}