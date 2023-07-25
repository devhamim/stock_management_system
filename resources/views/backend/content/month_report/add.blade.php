@extends('backend.layouts.app')

@section('content')
    <div class="content-page">
     <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add Seller</h4>
                        </div>
                        <a href="{{ route('seller.index') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Seller List</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('seller.store') }}" method="POST" >
                            @csrf
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Customer Name *</label>
                                        <input type="text" class="form-control" name="customer_name" placeholder="Enter Customer Name" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Product *</label>
                                        <input type="text" class="form-control" name="product" placeholder="Enter Product" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Item *</label>
                                        <input type="number" class="form-control" name="item" placeholder="Item" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="selectpicker form-control" data-style="py-0">
                                            <option value="1">Active</option>
                                            <option value="0">Deactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Add Seller</button>
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
