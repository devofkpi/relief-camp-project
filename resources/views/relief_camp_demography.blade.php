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