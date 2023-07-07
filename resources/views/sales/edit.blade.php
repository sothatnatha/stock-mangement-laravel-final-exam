@extends('dashboard')
@section('title', 'Customer | Edit')

@section('right')
    <div class="container-fluid">
        <br>
        <div class="card p-4">
            <form action="/customers/{{ $customer->id }}" method="POST">
                @csrf
                {{ method_field('put') }}

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Customer name</label>
                    <input type="text" class="form-control" name="cname" id="exampleFormControlInput1"
                        placeholder="Customer name" value="{{ $customer->cname }}">
                    @error('cname')
                        <p style="color: red; font-size:14px;"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Phone number</label>
                    <input type="text" class="form-control" name="phone_number" id="exampleFormControlInput1"
                        placeholder="phone number" value="{{ $customer->phone_number }}" />

                    @error('phone_number')
                        <p style="color: red; font-size:14px;"> {{ $message }}</p>
                    @enderror

                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Shipping address</label>
                    <input type="text" class="form-control" name="shipping_address" id="exampleFormControlInput1"
                        placeholder="Shipping address eg: Kampong chhnang" value="{{ $customer->shipping_address }}">
                    @error('shipping_address')
                        <p style="color: red; font-size:14px;"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Payment info</label>
                    <input type="text" class="form-control" name="payment_method" id="exampleFormControlInput1"
                        placeholder="Payment info..." value="{{ $customer->payment_method }}">
                    @error('payment_method')
                        <p style="color: red; font-size:14px;"> {{ $message }}</p>
                    @enderror
                </div>

                <input type="submit" value="Update customer" class="btn btn-warning mb-4 btn-sm" style="float: right;">

            </form>
        </div>
    </div>
@endsection
