@extends('dashboard')
@section('title', 'Stock | Edit')

@section('right')
    <div class="container-fluid">
        <br>
        <div class="card p-4">
            <form action="/stocks/{{ $stock->id }}" method="POST">
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
                                @if ($product->id == $stock->product_id)
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
                        placeholder="quantity" value="{{ $stock->qty }}">
                    @error('qty')
                        <p style="color: red; font-size:14px;"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Location</label>
                    <input type="text" class="form-control" name="location" id="exampleFormControlInput1"
                        placeholder="Location" value="{{ $stock->location }}" />

                    @error('location')
                        <p style="color: red; font-size:14px;"> {{ $message }}</p>
                    @enderror

                </div>

                <input type="submit" value="Update stock" class="btn btn-warning mb-4 btn-sm">

            </form>
        </div>
    </div>
@endsection
