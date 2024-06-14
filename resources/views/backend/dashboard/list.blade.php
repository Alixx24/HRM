@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')

<a class="btn btn-danger" href="{{ url('logout') }}">logout</a>
<br>
<a class="btn btn-primary" href="{{ url('admin/employees') }}">Employyes</a>
<a class="btn btn-success" href="{{ url('admin/dashboard') }}">Dashboard</a>
<a class="btn btn-primary" href="{{ url('admin/jobs') }}">Jobs</a>
<a class="btn btn-primary" href="{{ url('admin/job_history') }}">Job History</a>
<a class="btn btn-primary" href="{{ url('admin/job_grades') }}">Job grades</a>
<a class="btn btn-primary" href="{{ url('admin/departments') }}">Departments</a>
<a class="btn btn-primary" href="{{ url('admin/countries') }}">contries</a>
<a class="btn btn-primary" href="{{ url('admin/locations') }}">Locations</a>
<a class="btn btn-primary" href="{{ url('admin/regens') }}">Regens</a>

<h1>hi welcome admin</h1>
<p>name: {{ auth()->user()->name }}</p>
@endsection