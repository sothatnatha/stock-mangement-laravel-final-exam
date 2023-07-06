@extends('dashboard')
@section('title', 'Warehouse | Edit')

@section('right')
    <div class="container-fluid">
        <br>
        <div class="card p-4">
            <form action="/warehouses/{{ $warehouse->id }}" method="POST">
                @csrf
                {{ method_field('put') }}
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Warehouse name</label>
                    <input type="text" class="form-control" name="warehouse_name" id="exampleFormControlInput1"
                        placeholder="Warehouse name" value="{{ $warehouse->warehouse_name }}">

                    @error('warehouse_name')
                        <p style="color: red; font-size:14px;"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" id="exampleFormControlInput1"
                        placeholder="Address" value="{{ $warehouse->address }}" />

                    @error('address')
                        <p style="color: red; font-size:14px;"> {{ $message }}</p>
                    @enderror

                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Capacity</label>
                    <input type="text" class="form-control" name="capacity" id="exampleFormControlInput1"
                        placeholder="Capacity eg: how much this warehoue could store." value="{{ $warehouse->capacity }}">

                    @error('capacity')
                        <p style="color: red; font-size:14px;"> {{ $message }}</p>
                    @enderror
                </div>

                <input type="submit" value="Update" class="btn btn-warning mb-4 btn-sm" style="float: right">


            </form>
        </div>
    </div>
@endsection
