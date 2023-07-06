@extends('dashboard')
@section('title', 'Warehouse | Create')

@section('right')
    <div class="container-fluid">
        <br>
        <div class="card p-4">
            <form action="/warehouses" method="POST">
                @csrf
                {{ method_field('post') }}

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Warehouse name</label>
                    <input type="text" class="form-control" name="warehouse_name" id="exampleFormControlInput1"
                        placeholder="Warehouse name" value="{{ old('warehouse_name') }}">
                    @error('warehouse_name')
                        <p style="color: red; font-size:14px;"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" id="exampleFormControlInput1"
                        placeholder="Address" value="{{ old('address') }}" />

                    @error('address')
                        <p style="color: red; font-size:14px;"> {{ $message }}</p>
                    @enderror

                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Capacity</label>
                    <input type="text" class="form-control" name="capacity" id="exampleFormControlInput1"
                        placeholder="Capacity eg: how much this warehoue could store." value="{{ old('capacity') }}">
                    @error('capacity')
                        <p style="color: red; font-size:14px;"> {{ $message }}</p>
                    @enderror
                </div>

                <input type="submit" value="Create" class="btn btn-primary mb-4 btn-sm">

            </form>
        </div>
    </div>
@endsection
