@extends('backend.layouts.app')

@section('content')
    <div class="content-page">
     <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Edit Product</h4>
                        </div>
                        <div>
                            <a href="{{ route('product.index') }}" class="btn btn-primary add-list">Product List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.update',  $products->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <input type="hidden" name="product_id" value="{{ $products->id }}">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Name *</label>
                                        <select name="paka_id" class="selectpicker form-control" data-style="py-0">
                                            <option value="">-- Select Option --</option>
                                            @foreach ($product_id as $product)
                                                <option value="{{ $product->id }}"{{ $product->id == $products->paka_id?'selected':'' }}>{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>B.F. *</label>
                                        <input type="number" class="form-control" name="bf" placeholder="Enter B.F." value="{{ $products->bf }}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Production *</label>
                                        <input type="number" class="form-control" name="production" placeholder="Enter Production" value="{{ $products->production }}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Sell *</label>
                                        <input type="number" class="form-control" name="sell" placeholder="Enter Sell" value="{{ $products->sell }}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="selectpicker form-control" data-style="py-0">
                                            <option value="1"{{ $products->status==1?'selected':'' }}>Active</option>
                                            <option value="0"{{ $products->status==0?'selected':'' }}>Deactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Edit Product</button>
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
