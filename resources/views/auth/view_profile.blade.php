@extends('layouts.main_layout')
@section('title')
View Profile
@endsection
@section('content_title')
View Profile
@endsection
@section('content1')
<div class="row">
    <div class="col-md-6">
        <div class="card">
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                    <th scope="col">Attributes</th>
                    <th>Values</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td>Name</td>
                    <td>{{ $user->name}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $user->email}}</td>
                </tr>
                    @if($user->role==0)
                    <tr>
                        <td>Account Type</td>
                        <td>Super User</td>
                    </tr>
                    @elseif($user->role==1)
                    <tr>
                        <td>Account Type</td>
                        <td>Deputy Commissioner</td>
                    </tr>
                    @elseif($user->role==2)
                    <tr>
                        <td>Account Type</td>
                        <td>Sub Divisional Officer</td>
                    </tr>
                    @elseif($user->role==3)
                    <tr>
                        <td>Contact Number</td>
                        <td>+91{{ $nodal_officer->officer_contact}}</td>
                    </tr>
                    <tr>
                        <td>Designation</td>
                        <td>{{ $nodal_officer->officer_designation}}</td>
                    </tr>
                    <tr>
                        <td>Account Type</td>
                        <td>Nodal Officer</td>
                    </tr>
                    @endif
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
@endsection