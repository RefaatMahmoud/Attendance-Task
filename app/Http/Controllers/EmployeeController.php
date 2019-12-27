<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Services\EmployeeService;
use Illuminate\Http\Request;
use DB;

class EmployeeController extends Controller
{
    private $employee_service;

    public function __construct(EmployeeService $employee_service)
    {
        $this->employee_service = $employee_service;
    }

    public function index(Request $request)
    {
        return view('employees.index', [
            'is_paginated' => $this->employee_service->all($request)['is_paginated'],
            'employees'    => $this->employee_service->all($request)['data']
        ]);
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(EmployeeRequest $request)
    {
        return $this->employee_service->store($request);
    }
}
