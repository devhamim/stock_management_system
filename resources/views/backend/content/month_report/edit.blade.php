@extends('backend.layouts.app')

@section('content')
    <div class="content-page">
     <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Edit Seller</h4>
                        </div>
                        <a href="{{ route('seller.index') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Seller List</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('seller.update',  $sellers->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="row">
                                <input type="hidden" name="seller_id" value="{{ $sellers->id }}">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Seller Name *</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter Seller Name" value="{{ $sellers->name }}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Seller Number *</label>
                                        <input type="text" class="form-control" name="number" placeholder="Enter Seller Number" value="{{ $sellers->number }}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="selectpicker form-control" data-style="py-0">
                                            <option value="1"{{ $sellers->status==1?'selected':'' }}>Active</option>
                                            <option value="0"{{ $sellers->status==0?'selected':'' }}>Deactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Edit Seller</button>
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
