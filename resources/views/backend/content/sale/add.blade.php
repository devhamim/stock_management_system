@extends('backend.layouts.app')

@section('content')
    <div class="content-page">
     <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Sale</h4>
                        </div>
                        <a href="{{ route('sale.index') }}" class="btn btn-primary add-list">Sale List</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('sale.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Customer Name *</label>
                                        <select name="customer_id" class="selectpicker form-control" data-style="py-0">
                                                <option value="">-- Select Product --</option>
                                            @foreach ($customes as $custome)
                                                <option value="{{ $custome->id }}">{{ $custome->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Product Name *</label>
                                        <select name="product_id" class="selectpicker form-control" data-style="py-0">
                                                <option value="">-- Select Product --</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Sale Date *</label>
                                        <input type="date" class="form-control" name="sale_date" placeholder="Sale Date" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Total item *</label>
                                        <input type="number" class="form-control" name="item" placeholder="Total item" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Rate *</label>
                                        <input type="number" class="form-control" name="rate" placeholder="Rate" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Paid *</label>
                                        <input type="number" class="form-control" name="paid" placeholder="Paid" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                {{-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="selectpicker form-control" data-style="py-0">
                                            <option value="1">Active</option>
                                            <option value="0">Deactive</option>
                                        </select>
                                    </div>
                                </div> --}}
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Add Sale</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
      </div>
    </div>
    <!-- Wrapper End-->

@endsection

