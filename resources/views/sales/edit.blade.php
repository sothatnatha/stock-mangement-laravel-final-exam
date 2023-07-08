@extends('dashboard')
@section('title', 'Sale | Edit')

@section('right')
    <div class="container-fluid">
        <br>
        <div class="card p-4">
            <form action="/sales/{{ $sale->id }}" method="POST">
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
                            @foreach ($products as $p)
                                @if ($p->id == $sale->product_id)
                                    <option value="{{ $p->id }}" selected>{{ $p->pname }}</option>
                                @else
                                    <option value="{{ $p->id }}">{{ $p->pname }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Quantity</label>
                    <input type="number" placeholder="Quantity of sale" class="form-control" name="qty"
                        id="exampleFormControlInput1" value="{{ $sale->qty }}">
                    @error('qty')
                        <p style="color: red; font-size:14px;"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Sale date</label>
                    <input type="datetime-local" class="form-control" name="sale_date" id="exampleFormControlInput1"
                        value="{{ $sale->sale_date }}">
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
                            @foreach ($customers as $cus)
                                @if ($cus->id == $sale->customer_id)
                                    <option value="{{ $cus->id }}" selected>{{ $cus->cname }}</option>
                                @else
                                    <option value="{{ $cus->id }}">{{ $cus->cname }}</option>
                                @endif
                            @endforeach
                        </select>

                    </div>
                </div>
                <input type="submit" value="Update sale" class="btn btn-primary mb-4 btn-sm" style="float: right;">

            </form>
        </div>
    </div>
@endsection
