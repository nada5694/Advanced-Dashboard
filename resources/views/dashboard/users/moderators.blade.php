
@extends('layouts.dashboard.master')

@section('title', 'All Moderators')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12">
        <div class="d-flex justify-content-end my-1">
            <a href="{{ route('users.create') }}" class="btn btn-outline-success">Add New User</a>
        </div>
        <div class="x_panel">
            <div class="x_title">
                <h2>All Moderators ({{ $moderators->count() }})</h2>
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
                                        <th class="text-center">User Type</th>
                                        <th class="text-center">Created By</th>
                                        <th class="text-center">Updated By</th>
                                        @if(auth()->user()->user_type == "admin")
                                            <th class="text-center">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($moderators as $moderator)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $moderator->name }}</td>
                                            <td>{{ $moderator->user_type }}</td>
                                            <td>{{ $moderator->create_user->name ?? '-' }}</td>
                                            <td>{{ $moderator->update_user->name ?? '-' }}</td>
                                            @if(auth()->user()->user_type == "admin")
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a class="btn btn-primary btn-md m-1 px-3" href="{{ route('users.edit', $moderator->id) }}" title="Edit ({{ $moderator->name }})">
                                                            <i class="fa fa-edit f-18"></i>
                                                        </a>
                                                        <form action="{{ route('users.destroy', $moderator->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" onclick="return confirm('Are you sure that you want to delete ({{ $moderator->name }})?');" title="Delete ({{ $moderator->name }})" class="btn btn-danger btn-md m-1 px-3">
                                                                <i class="fa fa-trash-o f-18"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            @endif
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">There are no Moderators yet.</td>
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
