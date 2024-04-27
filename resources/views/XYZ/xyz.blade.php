@extends('layouts.admin')
@section('content')
<div class="col-lg-7 mx-auto">
    <div class="card">
        <div class="card-header">
            <h5> Add Xyz</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('transaction.action') }}" method="Get">
                @csrf
                @if (session('transaction'))
                <div class="alert alert-danger">{{ session('transaction') }}</div>

                @endif
                <div class="mb-3">
                    <label for="name">Select Customer Name:</label>
                    <select name="customer_name" id="" class="form-control">
                        @foreach (App\Models\CustomUser::all() as $user)
                        <option value="">{{ $user->customer_name }}</option>

                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">
                        Invoice:
                    </label>
                    <input type="text" class="form-control" name="invoice_no" id="" placeholder="Enter Your invoice">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">
                        Total Amount:
                    </label>
                    <input type="number" class="form-control" name="total_amount" id="" placeholder="Enter Your Amount">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">
                        Point:
                    </label>
                    <input type="text" class="form-control" name="total_point" id="" placeholder="Enter Your point">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
