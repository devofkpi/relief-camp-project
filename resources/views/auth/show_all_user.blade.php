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
                    <td>{{ str_replace(".","[dot]",str_replace("@","[at]",$user->email))}}</td>
                    <td>{{ $role[$user->role]}}</td>
                    <td>{{ $user->active==1?'Active':'Inactive'}}</td>
                    <td>
                        <a href="{{ route('edit_profile',Crypt::encrypt($user->id))}}" class="mr-3 text-primary"><i class="nav-icon fas fa-edit"></i></a>
                        <a href="{{ route('delete_user',Crypt::encrypt($user->id))}}" class="mr-3 text-danger" data-toggle="modal" data-target="#modal-danger" id="delete_user{{$count}}"><i class="nav-icon fas fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="modal fade" id="modal-danger">
              <div class="modal-dialog">
                <div class="modal-content bg-danger">
                  <div class="modal-header">
                    <h4 class="modal-title">Delete Nodal Officer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to delete it ?&hellip;</p>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <a href="" class="btn btn-outline-light" id="delete_modal">Confirm</a>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>

@endsection
