@extends('layouts.main_layout')

@section('title')
Nodal Officers
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
                    <th>Officer Name</th>
                    <th>Officer Designation</th>
                    <th>Contact Number</th>
                    <th>Assigned Relief Camp</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @php $count= ($nodal_officers_data->perPage()*($nodal_officers_data->currentPage()-1))+1; @endphp
                @foreach ($nodal_officers_data as $nodal_officer )
                <tr>
                    <th scope="row">{{$count}}</th>
                    <td> <a href="{{route('demo_by_nodal',$nodal_officer->id)}}" class="text-info"> {{$nodal_officer->officer_name}}</a></td>
                    <td>{{ $nodal_officer->officer_designation}}</td>
                    <td>{{ $nodal_officer->officer_contact}}</td>
                    <td>
                    @foreach ($nodal_officer->reliefCamps as $nodal_relief_camp )
                    {{$nodal_relief_camp->relief_camp_name}}
                    @endforeach
                    </td>
                    <td>
                      <a href="{{ route('show_nodal_officer_by_id',$nodal_officer->id)}}" class="mr-3 text-info"><i class="nav-icon fas fa-eye"></i></a>
                      <a href="{{ route('update_nodal_officer',$nodal_officer->id)}}" class="mr-3 text-primary"><i class="nav-icon fas fa-edit"></i></a>
                      <a href="{{ route('delete_nodal_officer',$nodal_officer->id)}}" class="mr-3 text-danger" data-toggle="modal" data-target="#modal-danger" id="delete_nodal_officer{{$count}}"><i class="nav-icon fas fa-trash"></i></a>
                  </td>
                </tr>
                @php ++$count;@endphp
                @endforeach
              </tbody>
            </table>
            @if(session()->has('success'))
                <p style="display: none" id="edit_msg">{{session()->get('success')}}</p>
            @endif
            <div class="modal fade" id="modal-danger">
              <div class="modal-dialog">
                <div class="modal-content bg-danger">
                  <div class="modal-header">
                    <h4 class="modal-title">Delete Nodal Officer</h4>
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
            {{$nodal_officers_data->links()}}
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
@endsection

@section('custom_script')
<script>
  $('a[id^=delete_nodal_officer]').on('click',function(e){
    var url=$(this).attr('href');
    console.log(url);
    $('#delete_modal').attr('href',url);
  });
</script>
<script>
  $(window).on('load',function(e) {
        var toastr_msg=$('#edit_msg').text();
        if(toastr_msg){
          toastr.success(toastr_msg);
        }
  });
  </script>
@endsection