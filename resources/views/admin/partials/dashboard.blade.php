@extends('admin.master.master')
@section('content')
<div class="row row-cols-4">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total cars</h5>
                <p class="card-text">{{ $totalCars }}</p>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Rentals</h5>
                <p class="card-text">{{ $totalRentals }}</p>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Users</h5>
                <p class="card-text">{{ $totalUsers }}</p>
            </div>
        </div>
    </div>


</div>


@endsection
