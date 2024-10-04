@extends('frontend.master.master')
@section('front_content')
<div class="container">

    <div class="row row-cols-2 mt-4">
        <div class="col">
            <img class="img-fluid rounded" src="https://th.bing.com/th/id/OIP.9AA9ELQUr6WsoCJ2WcVcEwHaEK?rs=1&pid=ImgDetMain" class="card-img-top" alt="Transport Car">
        </div>
        <div class="col">
            <h3>Name: {{ $car->name ?? '' }}</h3>
            <h4>Rent Price: ${{ $car->rent_price }} per day</h4>
            <h4>Brand: {{ $car->brand ?? '' }}</h4>
            <h4>Type: {{ $car->car_type ?? '' }}</h4>
            <div>

                <form action="{{ route('car.book') }}" method="POST" class="p-4 col-6 card">
                    @csrf
                    <input type="hidden" name="car_id" value="{{ $car->id }}">
                    <input type="hidden" name="total_amount" id="total_amount" value="0">
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date:</label>
                        <input type="date" id="start_date" name="start_date" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date:</label>
                        <input type="date" id="end_date" name="end_date" class="form-control" required>
                    </div>

                    <h5>Total Amount: $<span id="display_total_amount">0</span></h5>

                    <button type="submit" class="btn btn-primary"  {{ $car->status == 1 ? 'disabled' : '' }}>{{ $car->status == 0 ? 'Book Now' : 'Not Available' }}</button>
                </form>


            </div>
        </div>
    </div>
</div>
<script>
    const rentPricePerDay = {{ $car->rent_price }};
    const startDateInput = document.getElementById('start_date');
    const endDateInput = document.getElementById('end_date');
    const totalAmountDisplay = document.getElementById('display_total_amount');
    const totalAmountInput = document.getElementById('total_amount');

    function calculateTotalAmount() {
        const startDate = new Date(startDateInput.value);
        const endDate = new Date(endDateInput.value);

        if (startDate && endDate && endDate > startDate) {
            // Calculate difference in days
            const timeDifference = endDate - startDate;
            const days = timeDifference / (1000 * 3600 * 24);

            const totalAmount = days * rentPricePerDay;
            totalAmountDisplay.textContent = totalAmount.toFixed(2);
            totalAmountInput.value = totalAmount.toFixed(2);
        } else {
            totalAmountDisplay.textContent = '0';
            totalAmountInput.value = '0';
        }
    }

    startDateInput.addEventListener('change', calculateTotalAmount);
    endDateInput.addEventListener('change', calculateTotalAmount);
</script>

@endsection
