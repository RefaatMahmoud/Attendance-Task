<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function all($data);

    public function store($data);
}
