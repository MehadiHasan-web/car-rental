@extends('frontend.master.master')



@section('front_content')
<div class="container">
    <h1>Your Rentals</h1>

    @if($rentals->isEmpty())
        <p>You have no rentals.</p>
    @else
        <div class="card p-2">
            <table  id="dataTable" class="display table table-hover border" >
                <thead>
                    <tr>
                        <th>Car Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Total Cost</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rentals as $rental)
                        <tr class="">
                            <td>{{ $rental->car->name }}</td>
                            <td>{{ $rental->start_date->format('Y-m-d') }}</td>
                            <td>{{ $rental->end_date->format('Y-m-d') }}</td>
                            <td>${{ $rental->total_cost }}</td>
                            <td >


                                @if(\Carbon\Carbon::now()->greaterThan($rental->end_date))
                                    <span class="badge text-bg-success">Completed</span>
                                @else

                                {{-- Check if rental is ongoing --}}
                                @if($rental->status == 0 && \Carbon\Carbon::now()->between($rental->start_date, $rental->end_date))
                                    <span class="badge text-bg-warning">Ongoing</span>

                                @else
                                    @if( $rental->status == 0 &&  \Carbon\Carbon::now()->lessThanOrEqualTo($rental->start_date))
                                        <form action="{{ route('rental.cancel', $rental->id) }}"  method="POST" style="display:inline;">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                                        </form>
                                    @else
                                        <span class="badge text-bg-danger">Cancelled</span>
                                    @endif

                                @endif
                            @endif



                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
