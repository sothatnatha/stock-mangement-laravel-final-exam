@extends('dashboard')
@section('title', 'Stock | Create')

@section('right')
    <div class="container-fluid">
        <br>
        <div class="card p-4">
            <form action="/stocks" method="POST">
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
                        {{-- @if ($errors->has('select_field'))
                            <span class="text-danger">
                                {{ $errors->first('select_field') }}
                            </span>
                        @endif --}}
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
                    <label for="exampleFormControlTextarea1" class="form-label">Location</label>
                    <input type="text" class="form-control" name="location" id="exampleFormControlInput1"
                        placeholder="Location" value="{{ old('location') }}" />

                    @error('location')
                        <p style="color: red; font-size:14px;"> {{ $message }}</p>
                    @enderror

                </div>

                <input type="submit" value="Create stock" class="btn btn-primary mb-4 btn-sm">

            </form>
        </div>
    </div>
@endsection
