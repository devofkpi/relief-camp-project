@extends('layouts.main_layout')

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
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Family Head</th>
            <th>Relation</th>
            <th>Any Special Condition</th>
            <th>Address</th>
            <th>CRUD</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($demography_data as $count=>$demography )
        <tr>
            <th scope="row">{{++$count}}</th>
            <td>{{ucfirst($demography->person_name)}}</td>
            <td>{{$demography->age}}</td>
            <td>{{ucfirst($demography->gender)}}</td>
            @if ($demography->orphan)
                <td></td>
                <td></td>
            @else
                @if($demography->familyHead)
                    <td>{{$demography->familyHead->family_head_name}}</td>
                    <td>{{$demography->familyHeadRelation->family_head_relation}}</td>
                @else
                    <td></td>
                    <td></td>
                @endif
            
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
            <td>
                <a href="{{ route('inmate_by_id',$demography->id)}}" class="mr-3 text-info"><i class="nav-icon fas fa-eye"></i></a>
                <a href="{{route('update_inmates',$demography->id)}}" class="mr-3 text-primary"><i class="nav-icon fas fa-edit"></i></a>
                <a href="" class="mr-3 text-danger"><i class="nav-icon fas fa-trash"></i></a>
            </td>
        </tr> 
        @endforeach  
        </tbody>
    </table>
</div>
<!-- /.card-body -->
<div class="card-footer">
    {{$demography_data->links()}}
</div>
</div>
<!-- /.card -->
</div>
</div>
@endsection