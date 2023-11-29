@extends('layouts.main_layout')
@section('title')
Nodal Officer Details
@endsection

@section('content_title')
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
                    <th scope="col">Attributes</th>
                    <th>Values</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td>Nodal Officer Name</td>
                    <td>{{ $nodal_officer->officer_name}}</td>
                </tr>
                <tr>
                    <td>Officer Designation</td>
                    <td>{{ $nodal_officer->officer_designation}}</td>
                </tr>
                <tr>
                    <td>Contact Number</td>
                    <td>{{ $nodal_officer->officer_contact}}</td>
                </tr>
                <tr>
                  <td>Assigned Relief Camp</td>
                  <td>
                  @foreach ($nodal_officer->reliefCamps as $relief_camp)
                      <span>{{$relief_camp->relief_camp_name}} </span>
                  @endforeach
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
@endsection