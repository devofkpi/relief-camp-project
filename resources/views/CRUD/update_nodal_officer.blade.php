@extends('layouts.main_layout')
@section('title')
Update Nodal Officer Details
@endsection

@section('content1')
<div class="row justify-content-center">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-body">
          <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
              <form action="{{ route('update_nodal_officer')}}" method="post">
                @csrf
                <div class="row justify-content-center">
                  <div class="col-8">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" value="{{ $nodal_officer->officer_name }}" name="officer_name">
                    </div>
                  </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-8">
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{ $nodal_officer->officer_desigantion }}" name="officer_designation">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-8">
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{ $nodal_officer->officer_contact }}" name="officer_contact" required>
                      </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-8">
                    <select multiple class="custom-select form-control-border mt-4" name="nodal_officer_id" id="nodal_officer">
                      @foreach ($nodal_officer->reliefCamps() as $assigned_relief_camp)
                      <option selected value="{{$assigned_relief_camp->id}}">{{$assigned_relief_camp->relief_camp_name}}</option>
                      @endforeach
                      @php $assigned_relief_camp=$nodal_officer->reliefCamps();@endphp
                      @dd($assigned_relief_camp)
                      @foreach ($relief_camps as $relief_camp)
                        @if()
                        <option value="{{$relief_camp->id}}">{{$relief_camp->relief_camp_name}}</option>                            
                      @endforeach
                    </select>
                  </div>
                </div>                
                <div class="row justify-content-center">
                  <div class="col-8">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </div>
                <input type="hidden" value="{{ $nodal_officer->id}}" name="nodal_officer_id">
              </form>
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
@endsection