@extends('layouts.main_layout')

@section('title')
Basis Necessities
@endsection

@section('content2')

<h3 style="margin-top:50px;margin-bottom:20px">Basis Necessities available at {{$relief_camp_name}}</h3>
<div class="table-responsive">
<table class="table" style="margin-top:30px;margin-bottom:30px">
    <thead class="thead-dark">
        <th scope="col">Different Parameters</th>
        <th scope="col">Their Values</th>
    </thead>
    <tbody>
        <tr>
            <td>Building Type</td>
            <td>{{$facilities_data[0]->building_type}}</td>
        </tr>
        <tr>
            <td>Number of Persons</td>
            <td>{{$facilities_data[0]->number_of_persons}}</td>
        </tr>
        <tr>
            <td>Number of Rooms</td>
            <td>{{$facilities_data[0]->number_of_rooms}}</td>
        </tr>
        <tr>
            <td>Number of Halls</td>
            <td>{{$facilities_data[0]->number_of_halls}}</td>
        </tr>
        <tr>
            <td>Number of Toilets</td>
            <td>{{$facilities_data[0]->number_of_toilets}}</td>
        </tr>
        <tr>
            <td>Number of Persons Utilising Toilets</td>
            <td>{{$facilities_data[0]->number_of_persons_utilising_toilets}}</td>
        </tr>
        <tr>
            <td>Number of Persons Staying at Night</td>
            <td>{{$facilities_data[0]->number_of_persons_staying_at_night}}</td>
        </tr>
        <tr>
            <td>Number of Mattresses</td>
            <td>{{$facilities_data[0]->number_of_mattresses}}</td>
        </tr>
        <tr>
            <td>Number of Badsheets</td>
            <td>{{$facilities_data[0]->number_of_badsheets}}</td>
        </tr>
        <tr>
            <td>Number of Blankets</td>
            <td>{{$facilities_data[0]->number_of_blankets}}</td>
        </tr>
        <tr>
            <td>Number of Mosquito</td>
            <td>{{$facilities_data[0]->number_of_mosquito}}</td>
        </tr>
        <tr>
            <td>Number of Fans</td>
            <td>{{$facilities_data[0]->number_of_fans}}</td>
        </tr>
        <tr>
            <td>Availability of Food Grains in Days</td>
            <td>{{$facilities_data[0]->availability_of_food_grains_in_days}}</td>
        </tr>
        <tr>
            <td>Availability of Veg in Days</td>
            <td>{{$facilities_data[0]->availability_of_veg_in_days}}</td>
        </tr>
        <tr>
            <td>Safe Drinking Water</td>
            <td>{{$drinking_water=$facilities_data[0]->safe_drinking_water?'Yes':'No'}}</td>
        </tr>
        <tr>
            <td>Provisioning of Supplement</td>
            <td>{{$supplement=$facilities_data[0]->provisioning_of_supplement?'Yes':'No'}}</td>
        </tr>
    </tbody>
</table>
</div>
@endsection