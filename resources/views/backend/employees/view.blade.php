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
                                <h3 class="card-title">employees View</h3>

                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>first name</th>
                                            <th>last name</th>
                                            <th>email</th>
                                            <th>hiry_date</th>
                                            <th>Role</th>
                                            <th>created_at</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                            
                                        
                                        <tr>
                                            <td>{{ $fetchData->id }}</td>
                                            <td>{{ $fetchData->name }}</td>
                                            <td>{{ $fetchData->last_name }}</td>
                                            <td>{{ $fetchData->email }}</td>
                                            <td>{{ !empty($fetchData->is_role) ? 'HR' : 'Employees' }}</td>
                                            
                                            <td>{{ date('d-m-y', strtotime($fetchData->hire_date)) }}</td>
                                         
                                            <td>{{ date('d-m-Y H:i A', strtotime($fetchData->created_at)) }}</td>
                                        </tr>
                                      
                                      
                                        
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </div>
    </div>
</section>
@endsection