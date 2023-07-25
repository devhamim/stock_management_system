@extends('backend.layouts.app')

@section('content')
    <div class="content-page">
     <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Monthly Sell List</h4>
                        <p class="mb-0">All Monthly Sell List</p>
                    </div>
                    <div>
                        <form action="{{ route('all.reports') }}" method="post">
                            @csrf
                            <div class="my-3 d-flex">

                                <input type="date" id="month_year" name="report_date" class="form-control">
                                <button type="submit" class="btn btn-primary">Sub</button>
                            </div>
                        </form>
                    </div>
                    <a href="{{ route('seller.create') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Seller</a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                <table class="data-table table mb-0 tbl-server-info">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>Sl</th>
                            <th>Customer Name</th>
                            <th>Product</th>
                            <th>Date</th>
                            <th>Item</th>
                            <th>Rate</th>
                            <th>Total</th>
                            <th>Paid</th>
                            <th>Due</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @php
                            $totals_sum = 0;
                            $due_sum = 0;
                            $paid_sum = 0;
                        @endphp
                        @foreach ($sales as $sl=>$sele)
                            <tr>
                                <td>{{ $sl+1 }}</td>
                                <td>{{ $sele->rel_to_customer->name }}</td>
                                <td>{{ $sele->rel_to_pro->name }}</td>
                                <td>{{ $sele->sale_date }}</td>
                                <td>{{ $sele->item }}</td>
                                <td>{{ $sele->rate }}</td>
                                <td>
                                    @php
                                        $total = $sele->item*$sele->rate;
                                        $totals_sum += $total;

                                        $due = $total-$sele->paid;
                                        $due_sum += $due;

                                        $paid_sum += $sele->paid;
                                    @endphp
                                    {{ $total }}
                                </td>
                                <td>{{ $sele->paid }}</td>
                                <td>{{ $due }}</td>

                                <td>
                                    <div class="d-flex align-items-center list-action">

                                        <a class="badge bg-blue mr-2" href="{{route('seller.edit',$sele->id)}}"><i class="ri-pencil-line mr-0"></i></a>

                                        <form action="{{ route('seller.destroy', $sele->id) }}" method="POST">
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
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>{{ $totals_sum }}</td>
                                <td>{{ $due_sum }}</td>
                                <td>{{ $paid_sum }}</td>
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
