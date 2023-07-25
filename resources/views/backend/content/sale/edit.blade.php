@extends('backend.layouts.app')

@section('content')
    <div class="content-page">
     <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Edit Sale</h4>
                        </div>
                        <div>
                            <a href="{{ route('sale.details', $sales->customer_id) }}" class="btn btn-primary add-list">Back</a>
                            <a href="{{ route('sale.index') }}" class="btn btn-primary add-list">Sale List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('sale.update',  $sales->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="row">
                                <input type="hidden" name="sale_id" value="{{ $sales->id }}">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Customer Name</label>
                                        <select name="customer_id" class="selectpicker form-control" data-style="py-0">
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}"{{ $customer->id == $sales->customer_id?'selected':'' }}>{{ $customer->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <select name="product_id" class="selectpicker form-control" data-style="py-0">
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}"{{ $product->id == $sales->product_id?'selected':'' }}>{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Sale Date</label>
                                        <input type="date" class="form-control" name="sale_date" placeholder="Sale Date" value="{{ $sales->sale_date }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Item</label>
                                        <input type="number" class="form-control" name="item" placeholder="Item" value="{{ $sales->item }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Rate</label>
                                        <input type="number" class="form-control" name="rate" placeholder="Rate" value="{{ $sales->rate }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Paid</label>
                                        <input type="number" class="form-control" name="paid" placeholder="Paid" value="{{ $sales->paid }}">
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Edit Sale</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
      </div>
    {{-- </div> --}}
    <!-- Wrapper End-->

@endsection
