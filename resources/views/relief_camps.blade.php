@extends("layouts.main_layout")
@section('title')
    Relief Camps
@endsection

@section('content2')
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Sr. No.</th>
            <th scope="col">Relief Camp Name</th>
            <th scope="col">Relief Camp Code</th>
            <th scope="col">Relief Camp Address</th>
            <th scope="col">Nodal Officer</th>
            <th scope="col">Demography</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($relief_camp_data as $count=>$relief_camp )
        <tr>
            <th scope="row">{{++$count}}</th>
            <td><a href=""> {{$relief_camp->relief_camp_name}}</a></td>
            <td>{{ $relief_camp->camp_code}}</td>
            <td>{{ ucfirst($relief_camp->address->address)}}<br>{{ ucfirst($relief_camp->address->city) }}, {{ ucfirst($relief_camp->address->state)}}</td>
            <td>{{ $relief_camp->nodalOfficer->officer_name}}</td>
            <td><a href="{{route('relief_camp_demography')}}/{{$relief_camp->id}}">View</a></td>
        </tr>
        @endforeach
    </tbody>
    <td></td>
</table>

@endsection