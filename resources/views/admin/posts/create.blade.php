@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Crear Post</h1>
        </section>

        <!-- Main content -->
        <section class="content">

        {{Form::open([
        'route'	=> 'posts.store',
        'files'	=>	true ])}}

            <!-- Default box -->
            <div class="box">


                <div class="box-header with-border">
                    @include('admin.errors')
                </div>


                <div class="box-body">
                    <div class="col-md-6">


                        <div class="form-group">
                            <label for="exampleInputEmail1">Titulo</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="{{old('title')}}">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputFile">Imagen</label>
                            <input type="file" id="exampleInputFile" name="image">
                            <p class="help-block">sube una imagen (Opcional)</p>
                        </div>


                        <!--

                        fuente:
                        laravelcollective.com/docs/5.4/html#drop-down-lists
                        ejemplo:
                        Generating a Drop-Down List With an Empty Placeholder

                                         -->

                        <div class="form-group">
                            <label>Categoria</label>

                            {{Form::select('category_id',

                                $categories,
                                null,
                                ['class' => 'form-control select2'])
                            }}
                        </div>



                        <div class="form-group">
                            <label>Etiquetas</label>

                            {{Form::select('tags[]',
                                $tags,
                                null,
                                ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Tagss'])

                            }}
                        </div>


                        <div class="form-group">
                            <label>fecha:</label>

                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datepicker" name="date" value="{{old('date')}}">
                            </div>
                            <!-- /.input group -->
                        </div>





                        <!-- checkbox -->

                        <div class="form-group">
                            <label><input type="checkbox" class="minimal" name="is_featured"></label>
                            <label>Visible</label>
                        </div>

                        <div class="form-group">
                            <label>
                                <input type="checkbox" class="minimal" name="status">
                            </label>
                            <label>
                                Activo
                            </label>
                        </div>


                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Contenido</label>
                            <textarea name="contenido" id="" cols="30" rows="10" class="form-control" ></textarea>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control" >{{old('description')}}</textarea>
                        </div>
                    </div>



                </div>




                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-default">Cancelar</button>
                    <button class="btn btn-success pull-right">Guardar</button>
                </div>
                <!-- /.box-footer-->



            </div>
            <!-- /.box -->

        </section>


    {{Form::close()}}



        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
