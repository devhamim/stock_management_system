@extends('backend.layouts.app')

@section('content')
    <div class="content-page">
     <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Product Stock List</h4>

                    </div>
                    <a href="{{ route('godaun_stock.create') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Product Stock</a>
                </div>
            </div>
        <div class="col-lg-6">
            <h5 class="py-3 ">Kacha Mal</h5>
            <div class="table-responsive rounded mb-3">
                <table class="data-table mb-0 tbl-server-info">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @foreach ($kachamal as $kacha)
                        <tr>
                            <td>{{ $kacha->name }}</td>
                            <td>
                                @if($kacha->status == 1)
                                    Active
                                @else
                                    Deactive
                                @endif
                            </td>
                            <td>
                                <div class="d-flex align-items-center list-action">

                                    {{-- <a class="badge bg-blue mr-2" href="{{route('godaun_stock.edit',$kacha->id)}}"><i class="ri-pencil-line mr-0"></i></a> --}}

                                    <form action="{{ route('godaun_stock.destroy', $kacha->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <input type="hidden" name="kacha_id" value="{{ $kacha->id }}">
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
        <div class="col-lg-6">
            <h5 class="py-3 ">Paka Mal</h5>
            <div class="table-responsive rounded mb-3">
                <table class="data-table mb-0 tbl-server-info">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @foreach ($pakamal as $paka)
                        <tr>
                            <td>{{ $paka->name }}</td>
                            <td>
                                @if($paka->status == 1)
                                    Active
                                @else
                                    Deactive
                                @endif
                            </td>
                            <td>
                                <div class="d-flex align-items-center list-action">

                                    {{-- <a class="badge bg-blue mr-2" href="{{route('godaun_stock.edit',$paka->id)}}"><i class="ri-pencil-line mr-0"></i></a> --}}

                                    <form action="{{ route('godaun_stock.destroy', $paka->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <input type="hidden" name="paka_id" value="{{ $paka->id }}">
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

