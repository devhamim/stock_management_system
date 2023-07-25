@extends('backend.layouts.app')

@section('content')
    <div class="content-page">
     <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Sale List</h4>
                        <p class="mb-0">All Sale list.</p>
                    </div>
                    <a href="{{ route('sale.create') }}" class="btn btn-primary add-list">Add Sale</a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                <table class="data-table table-hover mb-0 tbl-server-info">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            {{-- <th>
                                <div class="checkbox d-inline-block">
                                    <input type="checkbox" class="checkbox-input" id="checkbox1">
                                    <label for="checkbox1" class="mb-0"></label>
                                </div>
                            </th> --}}
                            <th>Id</th>
                            <th>Customer Name</th>
                            <th>Customer Number</th>
                            {{-- <th>Item</th>
                            <th>Paid</th>
                            <th>Due</th>
                            <th>Total</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @php
                            $total_sum = 0;
                        @endphp
                        @foreach ($uniqueSales as $sl=>$sale)
                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>{{ $sale->rel_to_customer->name }}</td>
                            <td>{{ $sale->rel_to_customer->number }}</td>
                            {{-- <td>
                                @php
                                    $total = $sale->customer_id;
                                    $marg_item = App\Models\sale::where('customer_id', $total)->sum('item');
                                    $marg_paid = App\Models\sale::where('customer_id', $total)->sum('paid');
                                @endphp

                                {{ $marg_item }}
                            </td>
                            <td>{{ $marg_paid }}TK</td>
                                @php
                                    $total = $marg_item*$sale->rate;
                                    $due = $total-$marg_paid;
                                @endphp
                                @if ($due == 0)
                                    <td class="badge badge-success mx-4 mt-3">Paid</td>
                                @else
                                    <td>{{ number_format($due) }}TK</td>
                                @endif

                            <td>{{ number_format($total) }}TK</td> --}}

                            <td>
                                <div class="d-flex align-items-center list-action">

                                    <a class="badge bg-blue mr-2" href="{{route('sale.details',$sale->customer_id)}}"><i class="ri-pencil-line mr-0"></i>View</a>

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

