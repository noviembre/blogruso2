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

        {{Form::open(['route'	=>	'users.store', 'files'	=>	true])}}

        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">

                    @include('admin.errors')

                </div>

                <div class="box-body">
                    <div class="col-md-6">


                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1"  value="{{old('name')}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail</label>
                            <input type="text" name="email" class="form-control" id="exampleInputEmail1" value="{{old('email')}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputEmail1" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Avatar</label>
                            <input type="file" name="avatar" id="exampleInputFile">

                            <p class="help-block">Sube una foto</p>
                        </div>

                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-success pull-right">Guardar</button>
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