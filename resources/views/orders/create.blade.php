@extends('dashboard')
@section('title', 'Order | Create')

@section('right')
    <div class="container-fluid">
        <br>
        <div class="card p-4">
            <form action="/orders" method="POST">
                @csrf
                {{ method_field('post') }}

                <div class="mb-3">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Select Product</label>
                        <select class="form-select form-control" name="product_id" aria-label="Default select example">
                            {{-- <option selected>Choose Product</option> --}}
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->pname }}</option>
                            @endforeach

                        </select>

                    </div>
                </div>


                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Quantity</label>
                    <input type="number" class="form-control" name="qty" id="exampleFormControlInput1"
                        placeholder="quantity" value="{{ old('qty') }}">
                    @error('qty')
                        <p style="color: red; font-size:14px;"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Order date</label>
                    <input type="datetime-local" class="form-control" name="order_date" id="exampleFormControlInput1"
                        placeholder="quantity" value="{{ old('order_date') }}">
                    @error('order_date')
                        <p style="color: red; font-size:14px;"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Delivery date</label>
                    <input type="datetime-local" class="form-control" name="delivery_date" id="exampleFormControlInput1"
                        placeholder="quantity" value="{{ old('delivery_date') }}">
                    @error('delivery_date')
                        <p style="color: red; font-size:14px;"> {{ $message }}</p>
                    @enderror
                </div>

                <input type="submit" value="Create an order" class="btn btn-primary mb-4 btn-sm" style="float: right;">

            </form>
        </div>
    </div>
@endsection
