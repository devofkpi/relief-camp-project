@extends('layouts.main_layout')
@section('title')
Relief Camp Details
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
                    <td>Relief Camp Name</td>
                    <td>{{ $relief_camp->relief_camp_name}}</td>
                </tr>
                <tr>
                    <td>Camp Code</td>
                    <td>{{ $relief_camp->camp_code}}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>{{ $relief_camp->address->address}}</td>
                </tr>
                <tr>
                    <td>Sub Division</td>
                    <td>{{ $relief_camp->subDivision->sub_division_name}}</td>
                </tr>
                <tr>
                    <td>Nodal Officer Name</td>
                    <td>{{ $relief_camp->nodalOfficer->officer_name}}</td>
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