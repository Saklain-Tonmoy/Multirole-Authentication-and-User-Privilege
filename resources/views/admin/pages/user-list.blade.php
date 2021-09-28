@extends('admin.layouts.master')

@push('scripts')
<script src="{{asset('js/jquery-for-dataTables-error-solution.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#example1').DataTable();
});
</script>
@endpush

@section('content')
<div class="content-wrapper" style="min-height: 267px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1 class="m-0 text-dark">User List</h1> -->
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admindashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Add New User</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">User DataTable</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="S. No: activate to sort column descending" style="width: 169.344px;">S. NO</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 169.344px;">Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 219.531px;">Email</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 194.219px;">Role</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 194.219px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr role="row">
                                            <!-- <td class="d-none">{{$user->id}}</td> -->
                                            <td>{{$loop->iteration}}</td>
                                            <td class="sorting_1">{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->role_id}}</td>
                                            <td>
                                                <a href="{{route('adminedit.user', $user->id)}}" class="float-left m-2 btn btn-sm btn-outline-success" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                                                <form class="float-left" action="{{route('admindelete.user', $user->id)}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button href="{{route('admindelete.user', $user->id)}}" class="dltBtn m-2 btn btn-sm btn-outline-danger" data-toggle="tooltip" data-id="{{$user->id}}" title="delete" data-placement="bottom"><i class="fas fa-trash-alt"></i></button>
                                                </form>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">S. NO</th>
                                            <th rowspan="1" colspan="1">Name</th>
                                            <th rowspan="1" colspan="1">Email</th>
                                            <th rowspan="1" colspan="1">Role</th>
                                            <th rowspan="1" colspan="1">Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
@endsection


