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
            @php $count= ($relief_camp_data->perPage()*($relief_camp_data->currentPage()-1))+1; @endphp
            @if(auth()->user()->role!=3 )
            @foreach ($relief_camp_data as $relief_camp )
                <tr>
                    <th scope="row">{{$count++}}</th>
                    <td><a href="{{ route('camp_facilities')}}/{{$relief_camp->id}}"> {{$relief_camp->relief_camp_name}}</a></td>
                    <td>{{ $relief_camp->camp_code}}</td>
                    <td>{{ ucfirst($relief_camp->address->address)}}<br>{{ ucfirst($relief_camp->address->city) }}, {{ ucfirst($relief_camp->address->state)}}</td>
                    <td>{{ $relief_camp->nodalOfficer->officer_name}}</td>
                    <td><a href="{{route('demo_by_camp',$relief_camp->id)}}">View</a></td>
                    <td>
                      <a href="{{ route('show_camp_by_id',$relief_camp->id)}}" class="mr-3 text-info"><i class="nav-icon fas fa-eye"></i></a>
                      <a href="{{ route('update_relief_camp',$relief_camp->id  )}}" class="mr-3 text-primary"><i class="nav-icon fas fa-edit"></i></a>
                      <a href="{{ route('delete_relief_camp',$relief_camp->id )}}" class="mr-3 text-danger"><i class="nav-icon fas fa-trash"></i></a>
                  </td>
                </tr>
                @endforeach
              @else
                <tr>
                  <th scope="row">1.</th>
                  <td><a href="{{ route('camp_facilities')}}/{{$relief_camp_data->id}}"> {{$relief_camp_data->relief_camp_name}}</a></td>
                  <td>{{ $relief_camp_data->camp_code}}</td>
                  <td>{{ ucfirst($relief_camp_data->address->address)}}<br>{{ ucfirst($relief_camp_data->address->city) }}, {{ ucfirst($relief_camp_data->address->state)}}</td>
                  <td>{{ $relief_camp_data->nodalOfficer->officer_name}}</td>
                  <td><a href="{{route('demo_by_camp',$relief_camp_data->id)}}">View</a></td>
                  <td>
                    <a href="{{ route('show_camp_by_id',$relief_camp_data->id)}}" class="mr-3 text-info"><i class="nav-icon fas fa-eye"></i></a>
                    <a href="{{ route('update_relief_camp',$relief_camp_data->id  )}}" class="mr-3 text-primary"><i class="nav-icon fas fa-edit"></i></a>
                    <a href="{{ route('delete_relief_camp',$relief_camp->id )}}" class="mr-3 text-danger"><i class="nav-icon fas fa-trash"></i></a>
                </td>
              </tr>
              @endif
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        @if(auth()->user()->role!=3 )
        {{$relief_camp_data->links()}}
        @endif
      </div>
    </div>
    <!-- /.card -->
  </div>
</div>
@endsection