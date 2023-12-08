@extends('layouts.main_layout')

@section('title')
Nodal Officers
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
                    <th>Officer Name</th>
                    <th>Officer Designation</th>
                    <th>Contact Number</th>
                    <th>Assigned Relief Camp</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @php $count= ($nodal_officers_data->perPage()*($nodal_officers_data->currentPage()-1))+1; @endphp
                @foreach ($nodal_officers_data as $nodal_officer )
                <tr>
                    <th scope="row">{{$count++}}</th>
                    <td> {{$nodal_officer->officer_name}}</td>
                    <td>{{ $nodal_officer->officer_designation}}</td>
                    <td>{{ $nodal_officer->officer_contact}}</td>
                    <td>
                    @foreach ($nodal_officer->reliefCamps as $nodal_relief_camp )
                    {{$nodal_relief_camp->relief_camp_name}}
                    @endforeach
                    </td>
                    <td>
                      <a href="{{ route('show_nodal_officer_by_id',$nodal_officer->id)}}" class="mr-3 text-info"><i class="nav-icon fas fa-eye"></i></a>
                      <a href="{{ route('update_nodal_officer',$nodal_officer->id)}}" class="mr-3 text-primary"><i class="nav-icon fas fa-edit"></i></a>
                      <a href="{{ route('delete_nodal_officer',$nodal_officer->id)}}" class="mr-3 text-danger"><i class="nav-icon fas fa-trash"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            {{$nodal_officers_data->links()}}
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
@endsection