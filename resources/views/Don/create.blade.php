@extends('layouts.app')
@section('content')
<div class="main-content right-chat-active">
    <div class="middle-sidebar-bottom ">
        <div class="middle-sidebar-left pe-0">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card shadow-xss w-100 d-block d-flex border-0 p-4 mb-3">
                        <h2 class="fw-700 mb-0 mt-0 font-md text-grey-900">Donate for an objectif</h2>
                    </div>
                </div>
                <div class="col-xl-12">
                    <form action="{{ route('dons.store') }}" method="post">
                        @csrf

                        {{-- <!-- objectif Selection -->
                        <div class="form-group mb-3">
                            <label class="text-grey-900">Choose an objectif to Donate:</label>
                        </div> --}}
                    
                        <input type="hidden" name="objectif_id" value="{{ $objectifId }}">
                        <!-- Donation Amount -->
                        <div class="form-group mb-3">
                            <label class="text-grey-900">Donation Amount:</label>
                            <input type="number" class="form-control" name="amount" placeholder="Enter amount to donate" required>
                        </div>
                        @error('amount')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <!-- Payment Details (for simplicity, this is just a placeholder. Implementing real payments requires more details and security measures.) -->
                        <div class="form-group mb-3">
                            <label class="text-grey-900">Card Number:</label>
                            <input type="text" class="form-control" name="card_number" placeholder="Enter card number" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-grey-900">Expiry Date:</label>
                            <input type="text" class="form-control" name="expiry_date" placeholder="MM/YY" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-grey-900">CVV:</label>
                            <input type="text" class="form-control" name="cvv" placeholder="CVV" required>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Donate Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection