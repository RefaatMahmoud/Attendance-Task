@extends('layouts.main')
@include('layouts.navbar')
@section('content')
    <div class="create-form mt-5">
        <div class="container">
            <form method="post" action="{{route('employees.store')}}" class="form-ajax-request">
                @csrf
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control form-control-sm" placeholder="Enter name" autocomplete="off">
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control form-control-sm" placeholder="Enter email" autocomplete="off">
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control form-control-sm" placeholder="Enter password" autocomplete="off">
                </div>
                <div class="form-group col-md-6">
                    <label for="pin code">Pin Code</label>
                    <input type="pin code" id="pin code" name="pin_code" class="form-control form-control-sm" placeholder="Enter pin code" autocomplete="off">
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

