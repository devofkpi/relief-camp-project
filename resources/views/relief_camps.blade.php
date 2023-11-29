@extends("layouts.main_layout")
@section('title')
    Details
@endsection

@section('content_title')
Available Relief Camps
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
                <th>Relief Camp Name</th>
                <th>Relief Camp Code</th>
                <th>Relief Camp Address</th>
                <th>Nodal Officer</th>
                <th>Demography</th>
                <th>CRUD</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($relief_camp_data as $count=>$relief_camp )
            <tr>
                <th scope="row">{{++$count}}</th>
                <td><a href="{{ route('camp_facilities')}}/{{$relief_camp->id}}"> {{$relief_camp->relief_camp_name}}</a></td>
                <td>{{ $relief_camp->camp_code}}</td>
                <td>{{ ucfirst($relief_camp->address->address)}}<br>{{ ucfirst($relief_camp->address->city) }}, {{ ucfirst($relief_camp->address->state)}}</td>
                <td>{{ $relief_camp->nodalOfficer->officer_name}}</td>
                <td><a href="{{route('demo_by_camp',$relief_camp->id)}}">View</a></td>
                <td>
                  <a href="{{ route('show_camp_by_id',$relief_camp->id)}}" class="mr-3 text-info"><i class="nav-icon fas fa-eye"></i></a>
                  <a href="{{ route('update_relief_camp',$relief_camp->id  )}}" class="mr-3 text-primary"><i class="nav-icon fas fa-edit"></i></a>
                  <a href="" class="mr-3 text-danger"><i class="nav-icon fas fa-trash"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        {{$relief_camp_data->links()}}
      </div>
    </div>
    <!-- /.card -->
  </div>
</div>
@endsection