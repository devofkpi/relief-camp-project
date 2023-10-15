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
                <th>Relief Camp Name</th>
                <th>Relief Camp Code</th>
                <th>Relief Camp Address</th>
                <th>Nodal Officer</th>
                <th>Demography</th>
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
                <td><a href="{{route('demo_by_camp')}}/{{$relief_camp->id}}">View</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
@endsection