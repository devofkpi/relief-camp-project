
@extends('layouts.main_layout')
@section('title')
Inmate Details
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
                    <td> Name</td>
                    <td>{{ucfirst($inmate->person_name) }}</td>
                </tr>
                <tr>
                    <td>Age</td>
                    <td>{{$inmate->age}}</td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>{{$inmate->gender}}</td>
                </tr>
                <tr>
                  <td>Family Head Name</td>
                  @if ($inmate->familyHead)
                    <td>{{$inmate->familyHead->family_head_name }}</td>
                  @else
                    <td>N.A.</td>
                  @endif
                </tr>
                <tr>
                    <td>Relation</td>
                    @if ($inmate->familyHeadRelation)
                      <td>{{$inmate->familyHeadRelation->family_head_relation}}</td>
                    @else
                      <td>N.A.</td>
                    @endif
                </tr>
                <tr>
                    <td>Any Special Condition</td>
                    @if($inmate->physically_disabled==true)
                      <td>Physically Disabled</td>
                    @elseif($inmate->orphan==true)
                      <td>Orphan</td>
                    @elseif($inmate->lactating==true)
                      <td>Lactating Mother</td>
                    @else
                      <td>None</td>
                    @endif
                </tr>
                <tr>
                    <td>Profession</td>
                    <td>{{$inmate->profession}}</td>
                </tr>
                <tr>
                    <td>Willing to go back to village</td>
                    <td>{{$inmate->willing_to_goback==true?'Yes':'No'}}</td>
                </tr>
                <tr>
                    <td>Contact Number</td>
                    <td>{{$inmate->contact_number}}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>{{$inmate->address->address}}</td>
                </tr>
                <tr>
                  <td>Remark</td>
                  <td>{{$inmate->remark}}</td>
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