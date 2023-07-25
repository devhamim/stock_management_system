@extends('backend.layouts.app')

@section('content')
    <div class="content-page">
     <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Purchase</h4>
                        </div>
                        <a href="{{ route('purchase.index') }}" class="btn btn-primary add-list">Purchase List</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('purchase.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Product Name *</label>
                                        {{-- <input type="text" class="form-control" name="name" placeholder="Product Name" required> --}}
                                        <select name="product_id" class="selectpicker form-control" data-style="py-0">
                                                <option value="">-- Select Product --</option>
                                            @foreach ($kachamals as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Seller Name</label>
                                        <select name="seller_id" class="selectpicker form-control" data-style="py-0">
                                            @foreach ($sellers as $seller)
                                                <option value="{{ $seller->id }}">{{ $seller->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Purchase Date *</label>
                                        <input type="date" class="form-control" name="purchase_date" placeholder="Purchase Date" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Total Weight *</label>
                                        <input type="number" class="form-control" name="weight" placeholder="Total Weight" required>
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


                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Add Purchase</button>
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

