@extends('backend.layouts.app')

@section('content')
    <div class="content-page">
     <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Edit Stock</h4>
                        </div>
                        <a href="{{ route('godaun_stock.index') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Category List</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('godaun_stock.update',  $categorys->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="category_id" value="{{ $categorys->id }}">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" class="form-control image-file" name="image" accept="image/*" value="{{ $categorys->image }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Category Name *</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter Category Name" value="{{ $categorys->name }}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="selectpicker form-control" data-style="py-0">
                                            <option value="1"{{ $categorys->status==1?'selected':'' }}>Active</option>
                                            <option value="0"{{ $categorys->status==0?'selected':'' }}>Deactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Edit category</button>
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
