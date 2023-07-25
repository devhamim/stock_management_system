@extends('backend.layouts.app')

@section('content')
    <div class="content-page">
     <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add Product</h4>
                        </div>
                        <a href="{{ route('kacha_product.index') }}" class="btn btn-primary add-list">Product List</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kacha_product.store') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Product Name *</label>
                                        <select name="kacha_id" class="selectpicker form-control" data-style="py-0">
                                            <option value="">-- Select Option --</option>
                                            @foreach ($kachaproduct as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Seller Name *</label>
                                        <select name="seller_id" class="selectpicker form-control" data-style="py-0">
                                            <option value="">-- Select Option --</option>
                                            @foreach ($sellers as $seller)
                                                <option value="{{ $seller->id }}">{{ $seller->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>B.F. *</label>
                                        <input type="number" class="form-control" name="bf" placeholder="Enter B.F.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Weight *</label>
                                        <input type="number" class="form-control" name="weight" placeholder="Enter Weight" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Use *</label>
                                        <input type="number" class="form-control" name="use" placeholder="Enter Use">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Add Product</button>
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

