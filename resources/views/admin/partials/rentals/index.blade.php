@extends('admin.master.master')



@section('content')
<div class="container">

    @if($rentals->isEmpty())
        <p>You have no rentals.</p>
    @else
        <div class="card p-2">
            <table  id="dataTable" class="display table table-hover border" >
                <thead>
                    <tr>
                        <th>Customar Name</th>
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
                            <td>{{ $rental->user->name }}</td>
                            <td>{{ $rental->car->name }}</td>
                            <td>{{ $rental->start_date->format('Y-m-d') }}</td>
                            <td>{{ $rental->end_date->format('Y-m-d') }}</td>
                            <td>${{ $rental->total_cost }}</td>
                            <td >
                                @if(\Carbon\Carbon::now()->greaterThan($rental->end_date))
                                   <span class="badge text-bg-success">Completed</span>
                                @else
                                    @if($rental->status == 0)
                                        <span class="badge text-bg-warning">Ongoing</span>
                                    @else
                                        <span class="badge text-bg-danger">Cancelled</span>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Customar Name</th>
                        <th>Car Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Total Cost</th>
                        <th>Status</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    @endif
</div>
@endsection
