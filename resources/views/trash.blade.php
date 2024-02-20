@extends('layouts.main_layout')
@section('title')
Trash
@endsection
@section('content_title')
Items in Trash
@endsection

@section('content1')
<div class="row justify-content-center">
    <div class="col-12">
      <div class="card card-primary card-tabs">
        <div class="card-header p-0 pt-1">
          <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="custom-tabs-relief-camp-tab" data-toggle="pill" href="#custom-tabs-relief-camp" role="tab" aria-controls="custom-tabs-relief-camp" aria-selected="true">Relief Camps</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-nodal-officer-tab" data-toggle="pill" href="#custom-tabs-nodal-officer" role="tab" aria-controls="custom-tabs-nodal-officer" aria-selected="false">Nodal Officers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-tabs-inmates-tab" data-toggle="pill" href="#custom-tabs-inmates" role="tab" aria-controls="custom-tabs-inmates" aria-selected="false">Inmates</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-users-tab" data-toggle="pill" href="#custom-tabs-users" role="tab" aria-controls="custom-tabs-users" aria-selected="false">Users</a>
              </li>
          </ul>
        </div>
        <div class="card-body table-responsive p-0">
          <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-relief-camp" role="tabpanel" aria-labelledby="custom-tabs-relief-camp-tab">
                <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                          <th scope="col">Sr. No.</th>
                          <th>Relief Camp Name</th>
                          <th>Relief Camp Code</th>
                          <th>Relief Camp Address</th>
                          <th>Nodal Officer</th>
                          <th>Restore</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $count= ($relief_camps->perPage()*($relief_camps->currentPage()-1))+1; @endphp
                      @foreach ($relief_camps as $relief_camp )
                          <tr>
                              <th scope="row">{{$count++}}</th>
                              <td>{{$relief_camp->relief_camp_name}}</td>
                              <td>{{ $relief_camp->camp_code}}</td>
                              <td>{{ ucfirst($relief_camp->address->address)}}<br>{{ ucfirst($relief_camp->address->city) }}, {{ ucfirst($relief_camp->address->state)}}</td>
                              <td>{{ $relief_camp->nodalOfficer->officer_name}}</td>
                              <td>
                                <a href="{{ route('restore_item',['table_name'=>Crypt::encrypt('relief_camp'),'id'=>Crypt::encrypt($relief_camp->id)])}}" class="mr-3 text-info"><i class="fas fa-trash-restore-alt"></i></a>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="custom-tabs-nodal-officer" role="tabpanel" aria-labelledby="custom-tabs-nodal-officer">
              <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                        <th scope="col">Sr. No.</th>
                        <th>Nodal Officer Name</th>
                        <th>Nodal Officer Contact</th>
                        <th>Nodal Officer Designation</th>
                        <th>Restore</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $count= ($nodal_officers->perPage()*($nodal_officers->currentPage()-1))+1; @endphp
                    @foreach ( $nodal_officers as $nodal_officer)
                    <tr>
                      <th scope="row">{{$count++}}</th>
                      <td>{{$nodal_officer->officer_name}}</td>
                      <td>{{ $nodal_officer->officer_contact}}</td>
                      <td>{{ $nodal_officer->officer_designation}}</td>
                      <td>
                        <a href="{{ route('restore_item',['table_name'=>Crypt::encrypt('nodal_officer'),'id'=>Crypt::encrypt($nodal_officer->id)])}}" class="mr-3 text-info"><i class="fas fa-trash-restore-alt"></i></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
          <div class="tab-pane fade" id="custom-tabs-inmates" role="tabpanel" aria-labelledby="custom-tabs-inmates-tab">
            <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                      <th scope="col">Sr. No.</th>
                      <th>Name</th>
                      <th>Age</th>
                      <th>Gender</th>
                      <th>Relief Camp</th>
                      <th>Restore</th>
                  </tr>
                </thead>
                <tbody>
                  @php $count= ($inmates->perPage()*($inmates->currentPage()-1))+1; @endphp
                  @foreach ($inmates as $inmate)
                  <tr>
                    <th scope="row">{{$count++}}</th>
                    <td>{{ $inmate->person_name}}</td>
                    <td>{{$inmate->age}}</td>
                    <td>{{ $inmate->gender}}</td>
                    <td></td>
                    <td>
                      <a href="{{ route('restore_item',['table_name'=>Crypt::encrypt('relief_camp_demography'),'id'=>Crypt::encrypt($inmate->id)])}}" class="mr-3 text-info"><i class="fas fa-trash-restore-alt"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
          <div class="tab-pane fade" id="custom-tabs-users" role="tabpanel" aria-labelledby="custom-tabs-users-tab">
            <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                      <th scope="col">Sr. No.</th>
                      <th>Name</th>
                      <th>email id</th>
                      <th>Restore</th>
                  </tr>
                </thead>
                <tbody>
                  @php $count= ($users->perPage()*($users->currentPage()-1))+1; @endphp
                  @foreach ($users as $user)
                    <th scope="row">{{$count++}}</th>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->email}}</td>
                    <td>
                      <a href="{{ route('restore_item',['table_name'=>Crypt::encrypt('user'),'id'=>Crypt::encrypt($user->id)])}}" class="mr-3 text-info"><i class="fas fa-trash-restore-alt"></i></a> 
                    </td>
                  @endforeach
                </tbody>
            </table>
          </div>
          </div>
        </div>
        <div class="card-footer">
          {{ $relief_camps->links()}}
        </div>
      </div>
    </div>
</div>
@endsection