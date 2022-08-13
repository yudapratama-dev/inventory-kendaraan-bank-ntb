@extends('layouts.master') 

@section('top')
@endsection

@section('content')
<!-- Small boxes (Stat box) -->

<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-suitcase"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Divisi</span>
                <span class="info-box-number">{{ \App\Models\Divisi::count() }}</span>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-user"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Driver</span>
                <span class="info-box-number">{{ \App\Models\Driver::count() }}</span>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-car"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Kendaraan</span>
                <span class="info-box-number">{{ \App\Models\Kendaraan::count() }}</span>
                
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-exchange"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Activity</span>
                <span class="info-box-number">{{ \App\Models\ActivityKendaraan::count() }}</span>
            </div>
        </div>
    </div>

{{--  <div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{ \App\User::count() }}</h3>

                <p>Users</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-people"></i>
            </div>
            <a href="/user" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>  --}}

    {{--  <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{ \App\Category::count() }}<sup style="font-size: 20px"></sup></h3>

                <p>Category</p>
            </div>
            <div class="icon">
                <i class="fa fa-list"></i>
            </div>
            <a href="{{ route('categories.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>  --}}

    {{--  <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{ \App\Transport::count() }}</h3>
                <p>Kendaraan</p>
            </div>
            <div class="icon">
                <i class="fa fa-car"></i>
            </div>
            <a href="{{ route('transports.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->  --}}

    {{--  <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{ \App\Employee::count() }}</h3>

                <p>Karyawan</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="{{ route('employees.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->  --}}

</div>

@endsection
@section('top')
@endsection
