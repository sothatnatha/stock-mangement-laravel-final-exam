@extends('dashboard')
@section('title', 'Customer | Create')

@section('right')
    <div class="container-fluid">
        <br>
        <div class="card p-4">
            <form action="/customers" method="POST">
                @csrf
                {{ method_field('post') }}

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Customer name</label>
                    <input type="text" class="form-control" name="cname" id="exampleFormControlInput1"
                        placeholder="Customer name" value="{{ old('cname') }}">
                    @error('cname')
                        <p style="color: red; font-size:14px;"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Phone number</label>
                    <input type="text" class="form-control" name="phone_number" id="exampleFormControlInput1"
                        placeholder="phone number" value="{{ old('phone_number') }}" />

                    @error('phone_number')
                        <p style="color: red; font-size:14px;"> {{ $message }}</p>
                    @enderror

                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Shipping address</label>
                    <input type="text" class="form-control" name="shipping_address" id="exampleFormControlInput1"
                        placeholder="Shipping address eg: Kampong chhnang" value="{{ old('shipping_address') }}">
                    @error('shipping_address')
                        <p style="color: red; font-size:14px;"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Payment info</label>
                    <input type="text" class="form-control" name="payment_method" id="exampleFormControlInput1"
                        placeholder="Payment info..." value="{{ old('payment_method') }}">
                    @error('payment_method')
                        <p style="color: red; font-size:14px;"> {{ $message }}</p>
                    @enderror
                </div>

                <input type="submit" value="Add customer" class="btn btn-primary mb-4 btn-sm" style="float: right;">

            </form>
        </div>
    </div>
@endsection
