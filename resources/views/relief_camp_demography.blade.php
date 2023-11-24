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

                @if (!empty($demography->familyHead))
                    <td>{{$demography->familyHead->family_head_name}}</td>
                @else
                    <td></td>                    
                @endif
                @if (!empty($demography->familyHeadRelation))
                    <td>{{$demography->familyHeadRelation->family_head_relation}}</td> 
                @else
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
            <td><a href="" class="mr-3 text-info"><i class="nav-icon fas fa-eye"></i></a>
                <a href="" class="mr-3 text-primary"><i class="nav-icon fas fa-edit"></i></a>
                <a href="" class="mr-3 text-danger"><i class="nav-icon fas fa-trash"></i></a>
            </td>
        </tr> 
        @endforeach  
        </tbody>
    </table>
</div>
<!-- /.card-body -->
<div class="card-footer clearfix">
    <ul class="pagination pagination-sm m-0 float-right">
      <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
    </ul>
  </div>
</div>
<!-- /.card -->
</div>
</div>
@endsection