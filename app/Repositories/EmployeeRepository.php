<?php

namespace App\Repositories;

use App\models\Employee;

class EmployeeRepository implements RepositoryInterface
{
    private $user_repository;

    public function __construct(UserRepository $user_repository)
    {
        $this->user_repository = $user_repository;
    }

    public function all($data)
    {
        $employees = Employee::query();
        $this->filter($data, $employees);
        $is_paginated = Employee::count() > config('app.pagination_limit');
        if ($is_paginated) {
            return [
                'is_paginated' => $is_paginated,
                'data'         => $employees->paginate(config('app.pagination_per_page'))
            ];
        } else {
            return [
                'is_paginated' => $is_paginated,
                'data'         => $employees->get()
            ];
        }
    }

    public function store($data)
    {
        return Employee::create([
            'user_id'  => $data['user_id'],
            'name'     => $data['name'],
            'pin_code' => $data['pin_code'],
        ]);
    }

    private function filter($data, $employees): void
    {
        if ($data['id']) {
            $employees->where('id', $data['id']);
        }
        if ($data['name']) {
            $employees->where('name', $data['name']);
        }
        if ($data['email']) {
            $user = $this->user_repository->findByEmail($data['email']);
            if($user){
                $employees->where('user_id', $user->id);
            } else{
                $employees->where('user_id', null);
            }
        }
    }

}
