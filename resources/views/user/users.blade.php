@extends('layouts.app')

@section('content')
<div class="container">



    {{-- modal Agregar usuario --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header p-3 mb-2 bg-success text-white">
                    <h5 style="color:#fff" class="modal-title text-while" id="exampleModalLabel">Agregar Imagen:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('usuarios.create') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" class="form-control" value="Pepito">
                            @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email </label>
                            <input type="email" class="form-control" name="email" value="Pepito@gmail.com">
                            @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group row">
                            <label for="email">Contraseña </label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password" value="Pepito@gmail.com">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-group row">
                            <label for="email">Confirmar contraseña </label>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password"
                                value="Pepito@gmail.com">
                        </div>
                        <div class="modal-footer">
                            <button type="button" style="background: #ffffff;color:#1a2942;" class="btn btn-secondary"
                                data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Usuarios</h1>

                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <h2>
                                <button type="button" class="btn btn-success float-right" data-toggle="modal"
                                    data-target="#exampleModal" data-whatever="@mdo">Agregar Usuario</button>
                            </h2>

                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                @if(session('data'))
                <div class="alert alert-success" role="alert">

                    <strong>{{(session('data'))}}</strong> {{-- You should check in on some of those fields below. --}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>
            <div class="container-fluid">

                @if ($consultas->isNotEmpty())


                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($consultas as $consulta)
                        <tr>
                            <th scope="row">{{$consulta->id}}</th>
                            <td>{{$consulta->name}}</td>
                            <td>{{$consulta->email}}</td>
                            <td>
                                <div class="card-footer">
                                    <button type="button" class=" btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#editUser{{$consulta->id}}" data-whatever="@mdo"><i
                                            class="fas fa-edit"></i></button>

                                    <form action="{{route('usuarios.destroy', $consulta->id)}}"
                                        class="d-inline formulario-eliminar" method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button class=" btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt "></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        {{-- modal para editar cada tarjeta--}}
                        <div class="modal fade" id="editUser{{$consulta->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">

                                    <div class="modal-header p-3 mb-2 bg-primary text-white">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>


                                    <form action="{{ route('usuarios.update', $consulta->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label for="name">Nombre</label>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{$consulta->name}}">
                                                @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="email">Email </label>
                                                <input type="email" class="form-control" name="email"
                                                    value="{{$consulta->email}}">
                                                @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                                            </div>
                                            <div class="form-group row">
                                                <label for="email">Contraseña </label>
                                                <input id="password" type="password"
                                                    class="form-control @error('password')  @enderror" name="password"
                                                    required autocomplete="new-password"
                                                    value="{{$consulta->password}}">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" style="background: #ffffff;color:#1a2942;"
                                                class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </tbody>
                </table>
                @else
                <br><br>
                <div class="container m-5">
                    <div class="alert alert-primary" role="alert">
                        <p class="text-center m-3"> Ups! no hay registros 😥</p>
                    </div>
                </div>

                @endif

            </div>
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $('.formulario-eliminar').submit(function (e) {
        e.preventDefault();


        Swal.fire({
            title: 'Esta seguro de eliminar este registro?',
            text: "¡¡Una vez eliminado no se puede deshacer cambios! ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Continuar'

        }).then((result) => {
            if (result.isConfirmed) {

                this.submit();
            }
        })


    });

</script>
@endsection
