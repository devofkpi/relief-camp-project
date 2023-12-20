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
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php $count= ($demography_data->perPage()*($demography_data->currentPage()-1))+1; @endphp
        @foreach ($demography_data as $demography )
        <tr>
            <th scope="row">{{$count}}</th>
            <td>{{ucfirst($demography->person_name)}}</td>
            @php $age_in_year=(int)$demography->age;
                 $age_in_month=$demography->age-$age_in_year;
            @endphp
            @if($age_in_year!=0 && $age_in_month!=0)
            <td>{{$age_in_year.' Year '.$age_in_month.' Months '}}</td>
            @elseif($age_in_year!=0 && $age_in_month==0)
            <td>{{$age_in_year.' Year '}}
            @elseif($age_in_year==0 && $age_in_month!=0)
            <td>{{$age_in_month.' Months '}}
            @endif
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
            @elseif($demography->any_special_condition)
                <td><span>{{$demography->any_special_condition}}</span></td>
            @else
            <td></td>
            @endif
            <td>{{ucfirst($demography->address->address)}}</br>{{ucfirst($demography->address->city)}}, {{ucfirst($demography->address->state)}}</td>
            @if(auth()->user()->role!=3)
                <td>
                    <a href="{{ route('inmate_by_id',$demography->id)}}" class="mr-3 text-info"><i class="nav-icon fas fa-eye"></i></a>
                    <a href="{{route('update_inmates',$demography->id)}}" class="mr-3 text-primary"><i class="nav-icon fas fa-edit"></i></a>
                    <a href="{{ route('delete_inmate',$demography->id)}}" class="mr-3 text-danger" data-toggle="modal" data-target="#modal-danger" id="delete_inmate{{$count}}"><i class="nav-icon fas fa-trash"></i></a>
                </td>
            @else
                <td>
                    <a href="{{ route('inmate_by_id',$demography->id)}}" class="mr-3 text-info"><i class="nav-icon fas fa-eye"></i></a>
                    <a href="{{route('update_inmates',$demography->id)}}" class="mr-3 text-primary"><i class="nav-icon fas fa-edit"></i></a>
                </td>
            @endif
        </tr> 
        @php ++$count;@endphp
        @endforeach  
        </tbody>
    </table>
    <div class="modal fade" id="modal-danger">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Delete Inmate</h4>
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
<div class="card-footer">
    {{$demography_data->links()}}
</div>
</div>
<!-- /.card -->
</div>
</div>
@endsection
@section('custom_script')
<script>
  $('a[id^=delete_inmate]').on('click',function(e){
    var url=$(this).attr('href');
    console.log(url);
    $('#delete_modal').attr('href',url);
  });
</script>
@endsection