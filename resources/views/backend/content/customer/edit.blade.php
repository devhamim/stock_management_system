@extends('backend.layouts.app')

@section('content')
    <div class="content-page">
     <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Edit Customer</h4>
                        </div>
                        <a href="{{ route('customer.index') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Customer List</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('customer.update',  $customers->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="row">
                                <input type="hidden" name="customer_id" value="{{ $customers->id }}">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Customer Name *</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter Customer Name" value="{{ $customers->name }}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Customer Number *</label>
                                        <input type="text" class="form-control" name="number" placeholder="Enter Customer Number" value="{{ $customers->number }}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="selectpicker form-control" data-style="py-0">
                                            <option value="1"{{ $customers->status==1?'selected':'' }}>Active</option>
                                            <option value="0"{{ $customers->status==0?'selected':'' }}>Deactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Edit Customer</button>
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
