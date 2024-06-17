@extends('layouts.master')
@section('title', 'Edit Employeed')
@section('content')


<h1>hi welcome employe</h1>
<p>name: {{ auth()->user()->name }}</p>
<form action="{{ url('admin/employees/edit', $fetchData->id) }}" method="post" accept="" enctype="">
    @csrf
      <div class="form-group">
        <label for="exampleInputEmail1">name</label>
        <input name="name" type="text" class="form-control" id="exampleInputEmail1" value="{{ $fetchData->name }}" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <span style="rcolor:red">{{ $errors->first('name') }}</span>
  
  
      <div class="form-group">
        <label for="exampleInputEmail1">last name</label>
        <input name="last_name" type="text" class="form-control" id="exampleInputEmail1" value="{{ $fetchData->last_name }}" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">mail</label>
        <input name="email" type="email" class="form-control" value="{{ $fetchData->email }}" id="exampleInputEmail1" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <span style="rcolor:red">{{ $errors->first('email') }}</span>

      <div class="form-group">
        <label for="exampleInputEmail1">phone</label>
        <input name="phone_number" type="number" class="form-control" id="exampleInputEmail1" value="{{ $fetchData->phone }}" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <span style="rcolor:red">{{ $errors->first('phone') }}</span>

      <div class="form-group">
        <label for="exampleInputEmail1">hiry date</label>
        <input name="hire_date" type="date" class="form-control" value="{{ $fetchData->hire_date }}" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <span style="rcolor:red">{{ $errors->first('email') }}</span>

      <div class="form-group row">
        <label for="exampleInputEmail1">job is</label>
<div class="col-sm-10">
   <select class="form-control" name="job_id" id="">
    <option value="">select job</option>
    <option value="1">web dec</option>
    <option value="2">pdf dev</option>

   </select>
</div>        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">salary</label>
        <input name="salary" type="number" class="form-control" value="{{ $fetchData->salary }}" id="exampleInputEmail1" aria-describedby="emailHelp">
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
   
      <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection