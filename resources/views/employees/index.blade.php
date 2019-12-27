@extends('layouts.main')
@include('layouts.navbar')
@section('content')
    <div class="employees mt-5">
        <div class="filter">
            <div style="background-color: #efefef;box-shadow: 10px 10px 10px #DDD" class="container p-3">
                <form method="get" action="{{route('employees.index')}}">
                    <div style="display: inline-block" class="col-md-3">
                        <label for="id">ID</label>
                        <input type="text" id="id" name="id" class="form-control form-control-sm" autocomplete="off" value="{{request('id') ? request('id') : '' }}">
                    </div>
                    <div style="display: inline-block" class="col-md-3">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control form-control-sm" autocomplete="off" value="{{request('name') ? request('name') : '' }}">
                    </div>
                    <div style="display: inline-block" class="col-md-3">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control form-control-sm" autocomplete="off" value="{{request('email') ? request('email') : '' }}">
                    </div>
                    <div class="col-md-12 mt-4">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-search"></i> filter</button>
                        <a href="{{route('employees.index')}}" class="btn btn-primary"> <i class="fa fa-magic"></i> reset</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="container mt-4">
            @include('flash')
            <table class="table table-striped mt-4">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Pin-Code</th>
                    <th scope="col">Created at</th>
                </tr>
                </thead>
                <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{$employee->id}}</td>
                        <td>{{$employee->name}}</td>
                        <td>{{$employee->user->email}}</td>
                        <td>{{$employee->pin_code}}</td>
                        <td>{{$employee->user->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @if($is_paginated)
                {{$employees->links()}}
            @endif
        </div>
    </div>
    <div class="action">
        <div class="container">
            <a style="color: #FFF" href="{{route('employees.create')}}" class="btn btn-primary">
                <i class="fa fa-plus"> Add Employee</i>
            </a>
        </div>
    </div>
@endsection

