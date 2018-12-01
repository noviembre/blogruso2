@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blank page
                <small>it all starts here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de todos los posts</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{route('posts.create')}}" class="btn btn-success">Nuevo</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Categoria</th>
                            <th>Etiquetas</th>
                            <th>Imagen</th>
                            <th>Editar / Eliminar</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->getCategoryTitle()}}</td>
                                <td>{{$post->getTagsTitles()}}</td>
                                <td>
                                    <img src="{{$post->getImage()}}" alt="" width="100">
                                </td>

                                <td>
                                    <a href="{{route('posts.edit', $post->id)}}" class="fa fa-pencil"></a>

                                    {{Form::open(['route'=>['posts.destroy', $post->id], 'method'=>'delete'])}}
                                    <button data-toggle="modal" data-target="deletePostmodal-{{$post->id}}" class="delete" type="button">
                                       Delete
                                    </button>

                                    {{Form::close()}}

                                </td>


                            </tr>
                        @endforeach
                        </tbody>


                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



    @foreach($posts as $post)

        <!-- Modal -->
        <div class="modal fade" id="deletePostmodal-{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">
                            Estas Seguro que quieres Eliminar
                            {{ $post->title }}
                        </h4>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            No, Cancelar
                        </button>
                        {{Form::open(['route'=>['posts.destroy', $post->id], 'method'=>'delete'])}}
                        <button type="submit" class="btn btn-primary">
                            Si, Eliminar
                        </button>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection