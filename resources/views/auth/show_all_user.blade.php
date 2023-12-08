@extends('layouts.main_layout')
@section('title')
Show All User
@endsection

@section('content1')

<div class="row">
    <div class="col-12">
        <div class="card">
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                    <th scope="col">Sr. No.</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $role=['0'=>'Super User','1'=>'Deputy Commissioner','2'=>'Sub Divisional Officer','3'=>'Normal User'];
                @endphp
                @foreach ($users as $count=>$user )
                <tr>
                    <th scope="row">{{++$count}}</th>
                    <td><a href=""> {{$user->name}}</a></td>
                    <td>{{ $user->email}}</td>
                    <td>{{ $role[$user->role]}}</td>
                    <td>{{ $user->active==1?'Active':'Inactive'}}</td>
                    <td><a href="" class="mr-3 text-info"><i class="nav-icon fas fa-eye"></i></a>
                        <a href="" class="mr-3 text-primary"><i class="nav-icon fas fa-edit"></i></a>
                        <a href="" class="mr-3 text-danger"><i class="nav-icon fas fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>

@endsection