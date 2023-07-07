@extends('dashboard')
@section('title', 'Order | Edit')

@section('right')
    <div class="container-fluid">
        <br>
        <div class="card p-4">
            <form action="/orders/{{ $order->id }}" method="POST">
                @csrf
                {{ method_field('put') }}

                <div class="mb-3">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Select Product</label>
                        <select class="form-select form-control" name="product_id" aria-label="Default select example">
                            @foreach ($products as $product)
                                @if ($product->id == $order->product_id)
                                    <option value="{{ $product->id }}" selected>{{ $product->pname }}</option>
                                @else
                                    <option value="{{ $product->id }}">{{ $product->pname }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Quantity</label>
                    <input type="number" class="form-control" name="qty" id="exampleFormControlInput1"
                        placeholder="quantity" value="{{ $order->qty }}">
                    @error('qty')
                        <p style="color: red; font-size:14px;"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Order date</label>
                    <input type="datetime-local" class="form-control" name="order_date" id="exampleFormControlInput1"
                        placeholder="quantity" value="{{ $order->order_date }}">
                    @error('order_date')
                        <p style="color: red; font-size:14px;"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Delivery date</label>
                    <input type="datetime-local" class="form-control" name="delivery_date" id="exampleFormControlInput1"
                        placeholder="quantity" value="{{ $order->delivery_date }}">
                    @error('delivery_date')
                        <p style="color: red; font-size:14px;"> {{ $message }}</p>
                    @enderror
                </div>

                <input type="submit" value="Update an order" class="btn btn-warning mb-4 btn-sm" style="float: right;">

            </form>
        </div>
    </div>
@endsection
