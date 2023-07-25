@extends('backend.layouts.app')

@section('content')
    <div class="content-page">
     <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Edit Purchase</h4>
                        </div>
                        <div>
                            <a href="{{ route('purchase.details',$purchases->seller_id) }}" class="btn btn-primary add-list">Back</a>
                            <a href="{{ route('purchase.index') }}" class="btn btn-primary add-list">Purchase List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('purchase.update',  $purchases->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="row">
                                <input type="hidden" name="purchase_id" value="{{ $purchases->id }}">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Product Name" value="{{ $purchases->name }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Seller Name</label>
                                        <select name="seller_id" class="selectpicker form-control" data-style="py-0">
                                            @foreach ($sellers as $seller)
                                                <option value="{{ $seller->id }}"{{ $seller->id == $purchases->seller_id?'selected':'' }}>{{ $seller->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Purchase Date</label>
                                        <input type="date" class="form-control" name="purchase_date" placeholder="Purchase Date" value="{{ $purchases->purchase_date }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Weight</label>
                                        <input type="number" class="form-control" name="weight" placeholder="Weight" value="{{ $purchases->weight }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Rate</label>
                                        <input type="number" class="form-control" name="rate" placeholder="Rate" value="{{ $purchases->rate }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Paid</label>
                                        <input type="number" class="form-control" name="paid" placeholder="Paid" value="{{ $purchases->paid }}">
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
