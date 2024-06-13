@extends('layouts.master')
@section('title', 'Login')
@section('content')
@include('_message')
<form action="{{ url('login_post') }}" method="post">
  @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <span style="rcolor:red">{{ $errors->first('email') }}</span>

<span style="color:red">{{ $errors->first('email') }}</span>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input name="password" type="password" class="form-control" id="exampleInputPassword1">
    </div>
   <span style="rcolor:red">{{ $errors->first('password') }}</span>
    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <p>
        <a class="btn btn-danger" href="{{ url('forget-password') }}">Forget password</a>
        <a class="btn btn-success" href="{{ url('register') }}">Register</a>
    </p>
  </form>
  @endsection