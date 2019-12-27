@extends('layouts.main')
@section('title','Admin')
@section('styles')

@endsection
@section('content')
    @include('layouts.navbar')
    <div class="container mt-5">
        <h3>Attendance System Sample</h3>
        <ul>
            <li>List All employees</li>
            <li>Filter employees</li>
            <li>Add New Employee</li>
        </ul>
    </div>
@endsection
