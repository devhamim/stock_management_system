@extends('backend.layouts.app')

@section('content')
    <div class="content-page">
     <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">

                    <div>
                        <h4 class="mb-3">Seller Name : {{ $purchases->first()->rel_to_seller->name }}</h4>
                        <p class="mb-0">Seller Number : {{ $purchases->first()->rel_to_seller->number }}</p>
                    </div>

                    <div>
                        <a href="{{ route('purchase.index') }}" class="btn btn-primary add-list">Back</a>
                        <a href="{{ route('purchase.create') }}" class="btn btn-primary add-list">Add Purchase</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                <table class="data-table table-hover mb-0 tbl-server-info">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">

                            <th>Id</th>
                            <th>Purchase Id</th>
                            <th>Product Name</th>
                            <th>Purchase Date</th>
                            <th>Weight</th>
                            <th>Rate</th>
                            <th>Total</th>
                            <th>Paid</th>
                            <th>Due</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @php
                            $total_sum = 0;
                            $paid_sum = 0;
                        @endphp
                        @foreach ($purchases as $sl=>$purchase)
                        <tr>

                            <td>{{ $sl+1 }}</td>
                            <td>{{ $purchase->purchase_id }}</td>

                            <td>{{ $purchase->rel_to_kacha->name }}</td>
                            <td>{{ date('d-m-Y', strtotime($purchase->purchase_date)); }}</td>
                                @php
                                    //total price sum
                                    $totals = $purchase->weight*$purchase->rate;
                                    $total_sum += $totals;

                                    //paid sum
                                    $paids = $purchase->paid;
                                    $paid_sum += $paids;

                                    $due = $totals-$paids;
                                    $due = $total_sum-$paid_sum;
                                @endphp
                            <td>{{ $purchase->weight }}</td>
                            <td>{{ number_format($purchase->rate) }}TK</td>
                            <td>{{ number_format($totals) }}TK</td>
                            <td>{{ number_format($paids) }}TK</td>
                                @if ($due == 0)
                                    <td class="badge badge-success mx-4 mt-3">Paid</td>
                                @else
                                    <td>{{ number_format($due) }}TK</td>
                                @endif
                            <td>
                                <div class="d-flex align-items-center list-action">

                                    <a class="badge bg-blue mr-2" href="{{route('purchase.edit',$purchase->id)}}"><i class="ri-pencil-line mr-0"></i></a>
                                    <form action="{{ route('purchase.destroy', $purchase->id)}}" method="POST">
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
                            <td>{{ number_format($total_sum) }}TK</td>
                            <td>{{ number_format($paid_sum) }}TK</td>
                            <td>{{ number_format($due) }}TK</td>
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

