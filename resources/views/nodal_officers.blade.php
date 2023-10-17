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
                </tr>
              </thead>
              <tbody>
                @foreach ($nodal_officers_data as $count=>$nodal_officers )
                <tr>
                    <th scope="row">{{++$count}}</th>
                    <td><a href=""> {{$nodal_officers->officer_name}}</a></td>
                    <td>{{ $nodal_officers->officer_designation}}</td>
                    <td>{{ $nodal_officers->officer_contact}}</td>
                    <td></td>
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