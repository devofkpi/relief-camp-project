@extends('layouts.main_layout');

@section('content2')
<h3 style="margin-top:50px;margin-bottom:20px">Demography Data of {{$category_name}}</h3>
<table class="table" style="margin-top:30px;margin-bottom:30px">
    <thead class="thead-dark">
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
            <td>{{$demography->person_name}}</td>
            <td>{{$demography->age}}</td>
            <td>{{$demography->gender}}</td>
            @if ($demography->orphan)
                <td></td>
                <td></td>
            @else
                <td>{{$demography->familyHead->family_head_name}}</td>
                <td>{{$demography->familyHeadRelation->family_head_relation}}</td>
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

@endsection