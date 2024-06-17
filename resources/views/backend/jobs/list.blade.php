@extends('layouts.master')
@section('title', 'Employee')
@section('content')

<a class="btn btn-danger" href="{{ url('admin/employees/add') }}">Add Employee</a>

<h1>hi welcome employe</h1>
<p>name: {{ auth()->user()->name }}</p>

@include('_message')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <section class="col-md-12">
                <div class="row">
                    <section class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    search employees
                                </h3>
                            </div>
                            <form action="" method="get">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group col-md-3">
                                            <label for="">ID</label>
                                        <input type="text" name="id" class="form-control" value="{{ Request()->job_title }}" placeholder="ID">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">first name</label>
                                        <input type="text" name="min_salary" class="form-control" value="{{ Request()->min_salary }}" placeholder="first name">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Max Salary</label>
                                        <input type="text" name="max_salary" class="form-control" value="{{ Request()->max_salary }}" placeholder="first name">
                                        </div>

                                       
                                        
                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" type="submit">search</button>
                                            <a href="{{ url('admin/employees') }}" class="btn btn-success" style="margin-top:30">Reset</a>
                                        <input type="text" name="name" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('_message')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">employees list</h3>

                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>first name</th>
                                            <th>last name</th>
                                            <th>email</th>
                                            <th>Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($fetchData as $value)
                                            
                                        
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->last_name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ !empty($value->is_role) ? 'HR' : 'Employees' }}</td>
                                            <td>
                                                <a href="{{ url('admin/employees/view/' .$value->id) }}" class="btn btn-info">view</a>
                                                <a href="{{ url('admin/employees/edit/' .$value->id) }}" class="btn btn-primary">edit</a>
                                                <a href="{{ url('admin/employees/delete/' .$value->id) }}" onClick="return confirm('Are you sure you want to delete')" class="btn btn-danger">Delete</a>
                                            </td>

                                        </tr>
                                        @empty
                                        <td>
                                            <td colspan="100%">No Record Found</td>
                                        </td>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div style="padding: 10px;float:right;">
                                    {!! $fetchData->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </div>
    </div>
</section>
@endsection