@extends('dashboard')
@section('title', 'Sale | Create')

@section('right')
    <div class="container-fluid">
        <br>
        <div class="card p-4">
            <form action="/sales" method="POST">
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
                    <input type="number" placeholder="Quantity of sale" class="form-control" name="qty"
                        id="exampleFormControlInput1" value="{{ old('qty') }}">
                    @error('qty')
                        <p style="color: red; font-size:14px;"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Sale date</label>
                    <input type="datetime-local" class="form-control" name="sale_date" id="exampleFormControlInput1"
                        value="{{ old('sale_date') }}">
                    @error('sale_date')
                        <p style="color: red; font-size:14px;"> {{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Select Cusomter</label>
                        <select class="form-select form-control" name="customer_id" aria-label="Default select example">
                            {{-- <option selected>Choose Product</option> --}}
                            @foreach ($customers as $cus)
                                <option value="{{ $cus->id }}">{{ $cus->cname }}</option>
                            @endforeach

                        </select>

                    </div>
                </div>
                <input type="submit" value="Create sale" class="btn btn-primary mb-4 btn-sm" style="float: right;">

            </form>
        </div>
    </div>
@endsection
