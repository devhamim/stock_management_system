@extends('backend.layouts.app')

@section('content')
    <div class="content-page">
     <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Customer List</h4>
                        <p class="mb-0">All Customer List</p>
                    </div>
                    <a href="{{ route('customer.create') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Customer</a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                <table class="data-table table mb-0 tbl-server-info">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            {{-- <th>
                                <div class="checkbox d-inline-block">
                                    <input type="checkbox" class="checkbox-input" id="checkbox1">
                                    <label for="checkbox1" class="mb-0"></label>
                                </div>
                            </th> --}}
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Number</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @foreach ($customers as $sl=>$customer)
                        <tr>
                            {{-- <td>
                                <div class="checkbox d-inline-block">
                                    <input type="checkbox" class="checkbox-input" id="checkbox2">
                                    <label for="checkbox2" class="mb-0"></label>
                                </div>
                            </td> --}}

                            <td>{{ $sl+1 }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->number }}</td>
                            <td>
                                @if($customer->status == 1)
                                    Active
                                @else
                                    Deactive
                                @endif
                            </td>
                            <td>
                                <div class="d-flex align-items-center list-action">

                                    <a class="badge bg-blue mr-2" href="{{route('customer.edit',$customer->id)}}"><i class="ri-pencil-line mr-0"></i></a>

                                    <form action="{{ route('customer.destroy', $customer->id) }}" method="POST">
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

