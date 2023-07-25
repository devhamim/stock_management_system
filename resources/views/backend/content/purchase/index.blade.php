@extends('backend.layouts.app')

@section('content')
    <div class="content-page">
     <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Purchase List</h4>
                        <p class="mb-0">All Purchase list.</p>
                    </div>
                    <a href="{{ route('purchase.create') }}" class="btn btn-primary add-list">Add Purchase</a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                <table class="data-table table-hover mb-0 tbl-server-info">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">

                            <th>Id</th>
                            <th>Seller Name</th>
                            <th>Seller Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @foreach ($uniquepurchase as $sl=>$purchase)
                        <tr>

                            <td>{{ $sl+1 }}</td>
                            <td>{{ $purchase->rel_to_seller->name }}</td>
                            <td>{{ $purchase->rel_to_seller->number }}</td>
                            <td>
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge bg-blue mr-2" href="{{route('purchase.details',$purchase->seller_id)}}"><i class="ri-pencil-line mr-0"> View</i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        <!-- Page end  -->
    </div>
    <!-- Modal Edit -->

      </div>
    </div>
    <!-- Wrapper End-->
@endsection

