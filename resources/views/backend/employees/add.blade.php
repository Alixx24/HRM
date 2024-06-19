@extends('layouts.master')
@section('title', 'add employeed')
@section('content')

<a class="btn btn-danger" href="{{ url('admin/employees/add') }}">Add Employee</a>

<h1>hi welcome employe</h1>
<p>name: {{ auth()->user()->name }}</p>
<form action="{{ url('admin/employees/add') }}" method="post" accept="" enctype="">
    @csrf
      <div class="form-group">
        <label for="exampleInputEmail1">name</label>
        <input name="name" type="text" class="form-control" id="exampleInputEmail1" value="{{ old('name') }}" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <span style="rcolor:red">{{ $errors->first('name') }}</span>
  
  
      <div class="form-group">
        <label for="exampleInputEmail1">last name</label>
        <input name="last_name" type="text" class="form-control" id="exampleInputEmail1" value="{{ old('last_name') }}" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">mail</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" value="{{ old('email') }}" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <span style="rcolor:red">{{ $errors->first('email') }}</span>

      <div class="form-group">
        <label for="exampleInputEmail1">phone</label>
        <input name="phone_number" type="number" class="form-control" id="exampleInputEmail1" value="{{ old('phone') }}" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <span style="rcolor:red">{{ $errors->first('phone') }}</span>

      <div class="form-group">
        <label for="exampleInputEmail1">hiry date</label>
        <input name="hire_date" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <span style="rcolor:red">{{ $errors->first('email') }}</span>

      <div class="form-group row">
        <label for="exampleInputEmail1">job is</label>
<div class="col-sm-10">
   <select class="form-control" name="job_id" id="">
    <option value="">select job</option>
    @foreach ($fetchJobs as $valueJob)
    <option value="{{ $valueJob->id }}">{{ $valueJob->job_title }}</option>
    @endforeach

   </select>
</div>        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">salary</label>
        <input name="salary" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">commision_pct</label>
        <input name="commision_pct" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>

      <div class="form-group row">
        <label for="exampleInputEmail1">manager id</label>
<div class="col-sm-10">
   <select class="form-control" name="manager_id" id="">
    <option value="">select job</option>
    <option value="1">web dec</option>
    <option value="2">pdf dev</option>

   </select>
</div> 

<div class="form-group row">
    <label for="exampleInputEmail1">department_id</label>
<div class="col-sm-10">
<select class="form-control" name="department_id" id="">
<option value="">select job</option>
<option value="1">web dec</option>
<option value="2">pdf dev</option>

</select>
</div> 

      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
      <button type="submit" class="btn btn-primary">Sign in</button>
      <p>
          <a class="btn btn-danger" href="{{ url('forget-password') }}">Forget password</a>
          <a class="btn btn-success" href="{{ url('register') }}">Register</a>
      </p>
      <button type="submit" class="btn btn-success">Add</button>
    </form>
@endsection