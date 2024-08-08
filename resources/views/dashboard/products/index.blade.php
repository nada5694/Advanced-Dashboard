@extends('layouts.dashboard.master')

@section('title')
All Products ({{ \App\Models\Product::count() }})
@endsection

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12">
        <div class="d-flex justify-content-end my-1">
            <a href="{{ route('products.create') }}" class="btn btn-outline-success">Add New Product</a>
        </div>
        <div class="x_panel">
            <div class="x_title">
                <h2>All Products ({{ \App\Models\Product::count() }})</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            @include('layouts.dashboard.partials.alerts')
                            <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Discount (%)</th>
                                        <th class="text-center">Original Price</th>
                                        <th class="text-center">Price After Discount</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Category</th>
                                        <th class="text-center">Created By</th>
                                        <th class="text-center">Updated By</th>
                                        @if(auth()->user()->user_type == "admin")
                                            <th class="text-center">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td class="text-center">
                                                @if ($product->discount != null || $product->discount != 0)
                                                    <span class="badge badge-dark p-2">{{ $product->discount }}%</span>
                                                @else($product->discount == 0)
                                                    -
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($product->discount > 0)
                                                    <del class="text-danger">{{ $product->price }}</del>
                                                @else
                                                    {{ $product->price }}
                                                @endif
                                            </td>
                                            <th class="text-center">
                                                @if ($product->discount > 0)
                                                    <span class="badge badge-success p-2">{{ $product->price - ($product->price * ($product->discount / 100)) }}</span>
                                                @else
                                                    {{ $product->price - ($product->price * ($product->discount / 100)) }}
                                                @endif
                                            </th>
                                            @if ($product->quantity > 0)
                                                <td>{{ $product->quantity }}</td>
                                            @else
                                                <td class="text-danger"> Out Of Stock </td>
                                            @endif

                                            <td>{{ $product->description ?? '-' }}</td>
                                            <td>{{ $product->category->name ?? '-' }}</td>
                                            <td>{{ $product->create_user->name }}</td>
                                            <td>{{ $product->update_user->name ?? '-' }}</td>
                                            @if(auth()->user()->user_type == "admin")
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a class="btn btn-primary btn-md m-1 px-3" href="{{ route('products.edit', $product->id) }}" title="Edit ({{ $product->name }})">
                                                            <i class="fa fa-edit f-18"></i>
                                                        </a>
                                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" onclick="return confirm('Are you sure that you want to delete ({{ $product->name }}) Product?');" title="Delete ({{ $product->name }})" class="btn btn-danger btn-md m-1 px-3">
                                                                <i class="fa fa-trash-o f-18"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            @endif
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">There are no products yet.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<!-- Datatables -->
<script src="/assets/dashboard/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/assets/dashboard/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="/assets/dashboard/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="/assets/dashboard/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="/assets/dashboard/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="/assets/dashboard/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="/assets/dashboard/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="/assets/dashboard/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="/assets/dashboard/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="/assets/dashboard/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/dashboard/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="/assets/dashboard/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="/assets/dashboard/vendors/jszip/dist/jszip.min.js"></script>
<script src="/assets/dashboard/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="/assets/dashboard/vendors/pdfmake/build/vfs_fonts.js"></script>
@endpush
