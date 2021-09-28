@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper" style="min-height: 267px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1 class="m-0 text-dark">Add New User</h1> -->
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admindashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Add New User</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row justify-content-center">
                <div class="col-6">
                <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="{{route('adminstore.user')}}">
                  @csrf
                <div class="card-body">
                    <div class="col-md-12">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="username" placeholder="Fullname"/>
                    @error('name')
                        <span class="text-danger d-block" role="alert">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" value="{{old('email')}}" class="form-control" id="email" placeholder="Enter email"/>
                    @error('email')
                        <span class="text-danger d-block" role="alert">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" value="{{old('password')}}" class="form-control" id="password" placeholder="Password"/>
                    @error('password')
                        <span class="text-danger d-block" role="alert">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" value="{{old('password_confirm')}}" class="form-control" id="password_confirmation" placeholder="Confirm Password"/>
                    @error('password_confirm')
                        <span class="text-danger d-block" role="alert">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                        <label>Role</label>
                        <select name="role_id" class="form-control">
                          <option hidden>Select a Role</option>
                          @foreach ($roles as $role)
                          <option value="{{$role->role_id}}">{{$role->role_slug}}</option>
                          @endforeach
                        </select>
                      </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection