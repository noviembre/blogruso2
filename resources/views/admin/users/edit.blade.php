@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Usuarios
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                     @endif
                </div>

            </div>

        {{Form::open([
            'route'	=>	['users.update', $user->id],
            'method'	=>	'put',
            'files'	=>	true
        ])}}

        <!-- Default box -->
            <div class="box">


                <div class="box-body">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{$user->name}}">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">E-mail</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="email" value="{{$user->email}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input  name="password" type="password" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>


                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">New Password</label>
                                    <input name="new_password"  type="password" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">confirm Password</label>
                                    <input name="new_password_confirmation"  type="password" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>


                        </div>

                        <div class="form-group">
                            <img src="{{$user->getImage()}}" alt="" width="200" class="img-responsive">
                            <label for="exampleInputFile">Avatar</label>
                            <input type="file" name="avatar" id="exampleInputFile">

                            <p class="help-block">Suba una imagen</p>
                        </div>

                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-warning pull-right">Guardar</button>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
            {{Form::close()}}
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection