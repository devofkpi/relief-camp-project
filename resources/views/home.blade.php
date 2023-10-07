@extends("layouts.main_layout")
@section('title')
    Home
@endsection

@section('content1')
<div id="fh5co-counter" class="fh5co-counters fh5co-bg-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center animate-box">
                <span class="icon"><i class="icon-user"></i></span>
                <span class="fh5co-counter js-counter" data-from="0" data-to="{{ $total_inmates}}" data-speed="5000" data-refresh-interval="50"></span>
                <span class="fh5co-counter-label">Number of Inmates</span>
            </div>
            <div class="col-md-4 text-center animate-box">
                <span class="icon"><i class="icon-home"></i></span>
                <span class="fh5co-counter js-counter" data-from="0" data-to="{{$total_camps}}" data-speed="5000" data-refresh-interval="50"></span>
                <span class="fh5co-counter-label">Number of Relief Camps</span>
            </div>
            <div class="col-md-4 text-center animate-box">
                <span class="icon"><i class="icon-user"></i></span>
                <span class="fh5co-counter js-counter" data-from="0" data-to="{{$total_nodal_officer}}" data-speed="5000" data-refresh-interval="50"></span>
                <span class="fh5co-counter-label">Number of Nodal Officer</span>
            </div>
            {{-- <div class="col-md-3 text-center animate-box">
                <span class="icon"><i class="icon-users"></i></span>
                <span class="fh5co-counter js-counter" data-from="0" data-to="2587" data-speed="5000" data-refresh-interval="50"></span>
                <span class="fh5co-counter-label">Lawyers</span>
            </div> --}}
        </div>
    </div>
</div>
@endsection

@section('content2')
<div id="fh5co-practice" class="fh5co-bg-section">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <h2>Emergency Support Available</h2>
                <p>You can find emergency service availabel for relief camp by clicking on the below links</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 text-center animate-box">
                <div class="services">
                    <span class="icon">
                        <i class="icon-heart"></i>
                    </span>
                    <div class="desc">
                        <h3><a href="#">Public Health Centre</a></h3>
                        <p>Check the public health centre available for relief camp</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center animate-box">
                <div class="services">
                    <span class="icon">
                        <i class="icon-eye"></i>
                    </span>
                    <div class="desc">
                        <h3><a href="#">Police Station</a></h3>
                        <p>Report any untowards incedent by finding the list of police stations</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center animate-box">
                <div class="services">
                    <span class="icon">
                        <i class="icon-shopping-cart"></i>
                    </span>
                    <div class="desc">
                        <h3><a href="#">Anganwadi Centre</a></h3>
                        <p>Anganwadi centre available to support care for child at relief camps</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center animate-box">
                <div class="services">
                    <span class="icon">
                        <i class="icon-phone"></i>
                    </span>
                    <div class="desc">
                        <h3><a href="#">Helpline Numbers</a></h3>
                        <p>Check Helpline Numbers available to contact District Administration for any emergency</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center animate-box">
                <div class="services">
                    <span class="icon">
                        <i class="icon-user"></i>
                    </span>
                    <div class="desc">
                        <h3><a href="#">Nodal Officers</a></h3>
                        <p>All the Nodal officer list assigned for relief camps to provide the basic amenities</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center animate-box">
                <div class="services">
                    <span class="icon">
                        <i class="icon-book"></i>
                    </span>
                    <div class="desc">
                        <h3><a href="#">Announcements</a></h3>
                        <p>All the announcments releted to relief camps, you can find here</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center animate-box">
                <p><a class="btn btn-primary btn-lg btn-learn" href="#">View More</a></p>
            </div>
        </div>
    </div>
</div>
@endsection