@extends('frontend.master.master')
@section('front_content')
<div class="container mt-5"></div>
    <div class="row">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ $profile->name ?? '' }}
                </div>
                <div class="card-body">


                    <h5 class="card-title">Contact Information</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Email: {{ $profile->email ?? '' }}</li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
