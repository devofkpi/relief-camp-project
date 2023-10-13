@extends('layouts.main_layout')

@section('content1')

<div class="col-12">
    <div class="card">
      {{-- <div class="card-header">
        <h3 class="card-title">Responsive Hover Table</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div> --}}
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
        <tr>
            <th scope="col">Sr. No.</th>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">Gender</th>
            <th scope="col">Family Head</th>
            <th scope="col">Relation</th>
            <th scope="col">Any Special Condition</th>
            <th scope="col">Address</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($demography_data as $count=>$demography )
        <tr>
            <th scope="row">{{++$count}}</th>
            <td>{{$demography->person_name}}</td>
            <td>{{$demography->age}}</td>
            <td>{{$demography->gender}}</td>
            @if ($demography->orphan)
                <td></td>
                <td></td>
            @else
                <td>{{$demography->familyHead->family_head_name}}</td>
                <td>{{$demography->familyHeadRelation->family_head_relation}}</td>
            @endif
            @if ($demography->orphan && $demography->physically_disabled)
                <td><span> Orphan and Physically Disabled</span></td>
            @elseif ($demography->lactating && $demography->gender=='female')
                <td><span>Lactating Mother</span></td>
            @elseif ($demography->physically_disabled)
                <td><span>Physically Disabled</span></td>
            @elseif($demography->orphan)
                <td><span>Orphan</span></td>
            @else
            <td></td>
            @endif
            <td>{{ucfirst($demography->address->address)}}</br>{{ucfirst($demography->address->city)}}, {{ucfirst($demography->address->state)}}</td>
        </tr> 
        @endforeach  
        </tbody>
    </table>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
@endsection