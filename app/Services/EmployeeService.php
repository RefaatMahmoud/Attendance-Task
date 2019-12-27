<?php

namespace App\Services;

use App\Repositories\EmployeeRepository;
use App\Repositories\UserRepository;
use DB;

class EmployeeService
{
    private $employee_repository;
    private $user_repository;

    public function __construct(EmployeeRepository $employee_repository, UserRepository $user_repository)
    {
        $this->employee_repository = $employee_repository;
        $this->user_repository = $user_repository;
    }

    public function all($data)
    {
        return $this->employee_repository->all($data);
    }

    public function store($data)
    {
        DB::beginTransaction();
        try {
            $user = $this->user_repository->store($data);
            $data['user_id'] = $user->id;
            $this->employee_repository->store($data);
            DB::commit();
            if (request()->ajax()) {
                session()->flash('insert-success', 'User is Created Succcessfully');
                return response()->json([
                    'requestStatus' => true,
                    'redirectURL'   => route('employees.index')
                ]);
            }
        } catch (\Exception $e) {
            DB::rollback();
            if (app()->environment('local')) {
                $message = $e->getMessage() . ' file : ' . $e->getFile() . ' In Line : ' . $e->getLine();
            } else {
                $message = trans('Something Went Wrong');
            }
            session()->flash('error', $message);
            return redirect()->back()->withInput();
        }
    }
}
