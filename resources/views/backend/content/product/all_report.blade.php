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
                        <form action="{{ route('product.all.reports') }}" method="post">
                            @csrf
                            <div class="my-3 d-flex">
                                <input type="date" id="month_year" name="report_date" class="form-control">
                                <button type="submit" class="btn btn-primary">Sub</button>
                            </div>
                        </form>
                    </div>
                    <a href="{{ route('product.create') }}" class="btn btn-primary add-list">Add Product</a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                <table class="data-table table mb-0 tbl-server-info">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">

                            <th>Name</th>
                            <th>B.F.</th>
                            <th>production</th>
                            <th>Total Stock</th>
                            <th>sell</th>
                            <th>Balance</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @php
                        $bf_sum = 0;
                        $production_sum = 0;
                        $total_stock_sum = 0;
                        $balance_sum = 0;
                        $sell_sum = 0;
                    @endphp
                    <tbody class="ligth-body">
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->rel_to_paka->name }}</td>
                            <td>
                                @php
                                    $total_stock = $product->bf+$product->production;
                                    $total_stock_sum += $total_stock;

                                    $balance = $total_stock-$product->sell;
                                    $balance_sum += $balance;

                                    $bf_sum += $product->bf;
                                    $production_sum += $product->production;
                                    $sell_sum += $product->sell;
                                @endphp
                                {{ $product->bf }} Roll
                            </td>
                            <td>{{ $product->production }}</td>
                            <td>{{ $total_stock }}</td>
                            <td>{{ $product->sell }}</td>
                            <td>{{ $total_stock-$product->sell }}</td>
                            <td>
                                @if($product->status == 1)
                                    Active
                                @else
                                    Deactive
                                @endif
                            </td>
                            <td>
                                <div class="d-flex align-items-center list-action">

                                    <a class="badge bg-blue mr-2" href="{{route('product.edit',$product->id)}}"><i class="ri-pencil-line mr-0"></i></a>
                                    <form action="{{ route('product.destroy', $product->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <button class="badge bg-danger mr-2" style="border: none"><i class="ri-delete-bin-line mr-0"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td>{{ $bf_sum }}</td>
                            <td>{{ $production_sum }}</td>
                            <td>{{ $total_stock_sum }}</td>
                            <td>{{ $sell_sum }}</td>
                            <td>{{ $balance_sum }}</td>
                            <td></td>
                        </tr>
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

