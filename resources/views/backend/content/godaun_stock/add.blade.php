@extends('backend.layouts.app')

@section('content')
    <div class="content-page">
     <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add Stock</h4>
                        </div>
                        <a href="{{ route('godaun_stock.index') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Stock List</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('godaun_stock.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name *</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter Category Name" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Product Category</label>
                                        <select name="category" class="selectpicker form-control" data-style="py-0">
                                            <option value="1">Kacha mal</option>
                                            <option value="0">Paka mal</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Add</button>
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
