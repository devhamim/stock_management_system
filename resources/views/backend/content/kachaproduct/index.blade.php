@extends('backend.layouts.app')

@section('content')
    <div class="content-page">
     <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Product List</h4>
                        <p class="mb-0">All Product list.</p>
                    </div>
                    <div>
                        <form action="{{ route('kacha_product.all.reports') }}" method="post">
                            @csrf
                            <div class="my-3 d-flex">
                                <input type="date" id="month_year" name="report_date" class="form-control">
                                <button type="submit" class="btn btn-primary">Sub</button>
                            </div>
                        </form>
                    </div>
                    <a href="{{ route('kacha_product.create') }}" class="btn btn-primary add-list">Add Product</a>
                </div>
            </div>

        <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                <table class="table  mb-0 tbl-server-info">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>Product name</th>
                            <th>B.F.</th>
                            <th>Weight</th>
                            <th>Total Stock</th>
                            <th>use</th>
                            <th>Balance</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody class="ligth-body">
                        @foreach ($purchases as $purchase)
                            <tr>
                                <td>{{ $purchase->rel_to_kacha->name }}</td>
                                <td>
                                    @php
                                        $total_stock = $purchase->bf+$purchase->weight;
                                    @endphp
                                    {{ $purchase->bf }}
                                </td>
                                <td>{{ $purchase->weight }}</td>
                                <td>{{ $total_stock }}</td>
                                <td>{{ $purchase->use }}</td>
                                <td>
                                    {{ $total_stock-$purchase->use }}
                                </td>
                                <td>
                                    @if($purchase->status == 1)
                                        Active
                                    @else
                                        Deactive
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex align-items-center list-action">

                                        <a class="badge bg-blue mr-2" href="{{route('product.edit',$purchase->id)}}"><i class="ri-pencil-line mr-0"></i></a>
                                        <form action="{{ route('product.destroy', $purchase->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                            <button class="badge bg-danger mr-2" style="border: none"><i class="ri-delete-bin-line mr-0"></i></button>
                                        </form>
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

