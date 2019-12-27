@extends('layouts.main')
@section('title','Admin')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection
@section('content')
    <div class="wrapper fadeInDown">
        <div id="formContent">

            <!-- Tabs Titles -->

            <div class="fadeIn first">
                <h3 class="p-3">Admin Portal</h3>
            </div>

            <!-- Login Form -->
            <form method="post" action="{{route('admin.store')}}">
                @csrf
                <input type="email" id="login" class="fadeIn second" name="email" placeholder="login" required autocomplete="on">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required autocomplete="off">
                @if($errors->has('message'))
                    <div class="text-danger mb-1 mt-3" style="margin-top:-16px"><i class="fa fa-times mr-2"></i>
                        {{$errors->first('message')}}
                    </div>
                @endif
                <input type="submit" class="fadeIn fourth" value="Log In">
            </form>
        </div>
    </div>
@endsection
