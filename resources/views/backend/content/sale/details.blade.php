@extends('backend.layouts.app')

@section('content')

    <div class="content-page">
     <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">{{ $sales->first()->rel_to_customer->name }}</h4>
                        <p class="mb-0">{{ $sales->first()->rel_to_customer->number }}</p>
                    </div>
                    <div>
                        <a href="{{ route('sale.index') }}" class="btn btn-primary add-list">Back</a>
                        <a href="{{ route('sale.create') }}" class="btn btn-primary add-list">Add Sale</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                <table class="data-table table-hover mb-0 tbl-server-info">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">

                            <th>Id</th>
                            <th>Sale Id</th>
                            <th>Product Name</th>
                            <th>Sale Date</th>
                            <th>Total item</th>
                            <th>Rate</th>
                            <th>Total</th>
                            <th>Paid</th>
                            <th>Due</th>
                            <th>Balance</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @php
                            // $total_sum = 0;
                            // $paid_sum = 0;
                            $due_sum = 0;
                        @endphp
                        @foreach ($sales as $sl=>$sale)
                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>{{ $sale->sale_id }}</td>
                            <td>{{ $sale->rel_to_pro->name }}</td>

                            <td>{{ date('d-m-Y', strtotime($sale->sale_date)); }}</td>
                            @php
                            // total price sum
                                $total = $sale->item*$sale->rate;
                                // $total_sum += $total;
                                // paid sum
                                $total_paid = $sale->paid;
                                // $paid_sum += $total_paid;
                                // due
                                $due = $total-$total_paid;
                                $due_sum += $total-$total_paid;
                            @endphp
                            <td>{{ $sale->item }}</td>
                            <td>{{ $sale->rate }}</td>
                            <td>{{ number_format($total) }}TK</td>
                            <td>{{ number_format($total_paid) }}TK</td>
                            <td>{{ number_format($due) }}TK</td>
                            @if ($due_sum == 0)
                                <td class="badge badge-success mx-4 mt-3">Paid</td>
                            @else
                                <td>{{ number_format($due_sum) }}TK</td>
                            @endif

                            <td>
                                <div class="d-flex align-items-center list-action">

                                    <a class="badge bg-blue mr-2" href="{{route('sale.edit',$sale->id)}}"><i class="ri-pencil-line mr-0"></i></a>
                                    <form action="{{ route('sale.destroy', $sale->id)}}" method="POST">
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

