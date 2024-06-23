@extends('layouts.master')
@section('title', 'add employeed')
@section('content')


<h1>hi welcome Job Add!</h1>
<p>name: {{ auth()->user()->name }}</p>
<form action="{{ url('admin/job_history/add') }}" method="post" accept="" enctype="">
    @csrf
     


<div class="form-group">
  <label for="exampleInputEmail1"> employee Id</label>
<div><select name="employee_id" id="">
<option value="employee_id">Job Id
  @foreach ($getEmployee as $valueEmployee)  
  <option value="{{ $valueEmployee->id }}">{{ $valueEmployee->name }} {{ $valueEmployee->last_name }}</option>
@endforeach
</option>
</select>
</div>
</div>
<span style="rcolor:red">{{ $errors->first('job_id') }}</span>




      <div class="form-group">
        <label for="exampleInputEmail1"> Job Id</label>
<div><select name="job_id" id="">
  <option value="">Job Id
    @foreach ($getJobs as $valueJob)
        
  <option value="{{ $valueJob->id }}">{{ $valueJob->job_title }}</option>
  @endforeach
</option>
</select>
</div>
      </div>
      <span style="rcolor:red">{{ $errors->first('job_id') }}</span>

      <div class="form-group">
        <label for="exampleInputEmail1"> department Id</label>
<div><select name="department_id" id="">
  <option value="">Select employee Id
        
  <option value="1">test</option>
  
</option>
</select>
</div>

      <div class="form-group">
        <label for="exampleInputEmail1">start date</label>
        <input name="start_date" type="date" class="form-control" value="{{ old('start_date') }}" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">end date</label>
        <input name="end_date" type="date" class="form-control" value="{{ old('end_date') }}" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>


     
    
      <button type="submit" class="btn btn-success">Add</button>
    </form>
@endsection