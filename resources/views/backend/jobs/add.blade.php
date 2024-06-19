@extends('layouts.master')
@section('title', 'add employeed')
@section('content')


<h1>hi welcome Job Add!</h1>
<p>name: {{ auth()->user()->name }}</p>
<form action="{{ url('admin/jobs/add') }}" method="post" accept="" enctype="">
    @csrf
      <div class="form-group">
        <label for="exampleInputEmail1">Job title</label>
        <input name="job_title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <span style="rcolor:red">{{ $errors->first('job_title') }}</span>
  
  
      <div class="form-group">
        <label for="exampleInputEmail1">min_salary</label>
        <input name="min_salary" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">min_salary.</small>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">max_salary</label>
        <input name="max_salary" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">max_salary</small>
      </div>
      <span style="rcolor:red">{{ $errors->first('max_salary') }}</span>

    
      <button type="submit" class="btn btn-success">Add</button>
    </form>
@endsection