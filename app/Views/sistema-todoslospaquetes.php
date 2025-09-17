<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Sistema Delivery" />
    <meta name="author" content="Jorck Berrocal Calderón" />
    <title>Sistema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/template.css') ?>">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

</head>

<body class="sb-nav-fixed">

    <!-- Navigation Header-->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{route('panel')}}">Inventario Transportes</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Buscar..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Configuraciones</a></li>
                    <li><a class="dropdown-item" href="#!">Registro de Actividad</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <form action="<?= base_url('logout') ?>" method="POST" style="margin: 0; padding: 0;">
                            <button type="submit" class="dropdown-item">Cerrar Sesión</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">

        <!-- Navigation-menu-->
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <div class="sb-sidenav-menu-heading">Inicio</div>
                        <a class="nav-link" href="{{route('panel')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Panel
                        </a>


                        <div class="sb-sidenav-menu-heading">Modulos</div>



                        <a class="nav-link" href="{{route('paquetes.index')}}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-box-open"></i></div>
                            Todos los Paquetes
                        </a>

                        <a class="nav-link" href="{{route('paquetes.create')}}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-box-open"></i></div>
                            Nuevo Paquete
                        </a>


                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Bienvenido:
                        <?= esc(session()->get('nombre')) ?>
                    </div>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>

                <!-- CONTENIDO-->

                <div class="container-fluid px-4">
                    <h1 class="mt-4 text-center">Paquetes</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{ route('panel') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Paquetes</li>
                    </ol>

                    {{--COMENTARIO<div class="mb-4">
    <a href="{{route('paquetes.create')}}" >
                    <button type="button" class="btn btn-primary">Añadir Nuevo Paquete</button>
                    </a>
                </div>--}}
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Tabla Paquetes
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Distrito</th>
                                    <th>Cobrar</th>
                                    <th>Direccion</th>
                                    <th>Celular</th>
                                    <th>Nota</th>
                                    <th>Fecha</th>
                                    <th>Link Direccion</th>
                                    <th>Estado</th>
                                    <th>Foto Entrega</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>

                            <tfoot>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Distrito</th>
                                    <th>Cobrar</th>
                                    <th>Direccion</th>
                                    <th>Celular</th>
                                    <th>Nota</th>
                                    <th>Fecha</th>
                                    <th>Link Direccion</th>
                                    <th>Estado</th>
                                    <th>Foto Entrega</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>

                            <tbody>
                                @foreach($paquetes as $pivotrep_paquete)
                                <tr>
                                    <td>{{-- Esto es un comentario: Nombre --}}
                                        {{$pivotrep_paquete->paquete->nombre_cliente}}
                                    </td>

                                    <td>{{-- Esto es un comentario: Distrito --}}
                                        {{$pivotrep_paquete->paquete->distrito->nombre}}
                                    </td>

                                    <td>{{-- Esto es un comentario: Cobrar--}}
                                        {{$pivotrep_paquete->paquete->cobrar}}
                                    </td>


                                    <td>{{-- Esto es un comentario: Direccion--}}
                                        {{$pivotrep_paquete->paquete->direccion}}
                                    </td>


                                    <td>{{-- Esto es un comentario:Celular --}}
                                        {{$pivotrep_paquete->paquete->celular}}
                                    </td>

                                    <td>{{-- Esto es un comentario: Nota--}}
                                        {{$pivotrep_paquete->paquete->nota}}
                                    </td>

                                    <td>{{-- Esto es un comentario:Fecha --}}
                                        {{$pivotrep_paquete->paquete->fecha}}
                                    </td>

                                    <td>{{-- Esto es un comentario:Link Direccion --}}
                                        @if($pivotrep_paquete->paquete->link_direc !== null)
                                        <a href="{{$pivotrep_paquete->paquete->link_direc}}" target="_blank" rel="noopener noreferrer">Toca Aquí</a>
                                        @else

                                        @endif
                                    </td>

                                    <td>
                                        @if($pivotrep_paquete->estado === 'entregado')
                                        <span class="fw-bolder rounded p-1 bg-success text-white">entregado</span>
                                        @elseif($pivotrep_paquete->estado === 'fallo')
                                        <span class="fw-bolder rounded p-1 bg-danger text-white">fallo</span>
                                        @elseif($pivotrep_paquete->estado === 'reprogramado')
                                        <span class="fw-bolder rounded p-1 bg-warning text-dark">reprogramado</span>
                                        @else
                                        <span class="fw-bolder rounded p-1 bg-secondary text-white">En espera</span>
                                        @endif

                                    </td>

                                    <td>
                                        @if($pivotrep_paquete->foto_entrega !== null)
                                        <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fotoModal-{{$pivotrep_paquete->id}}">Ver</button>
                                        @endif

                                    </td>

                                    <td>
                                        @if($pivotrep_paquete->estado === null)
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <form action="{{route('paquetes.edit',['paquete'=>$pivotrep_paquete->paquete])}}" method="get">

                                                <button type="submit" class="btn btn-warning">Editar</button>
                                            </form>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal-{{$pivotrep_paquete->id}}">Eliminar</button>
                                        </div>
                                        @else
                                        <label class="fst-italic">No Disponible</label>
                                        @endif
                                    </td>

                                </tr>
                                {{-- Esto es un comentario:FIN DE LA TABLA --}}

                                <!-- Modal -->
                                <div class="modal fade" id="confirmModal-{{$pivotrep_paquete->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Mensaje de Confirmación</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Seguro quieres Eliminar este Paquete? {{$pivotrep_paquete->id}}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                <form action="{{route('paquetes.destroy',['paquete'=> $pivotrep_paquete->id])}}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Confirmar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Ver foto-->
                                <div class="modal fade" id="fotoModal-{{$pivotrep_paquete->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Detalle de Entrega</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @if($pivotrep_paquete->monto_cobrado !== null)
                                                <div class="row mb-3">
                                                    <label><span class="fw-bolder">Monto Cobrado: </span>{{$pivotrep_paquete->monto_cobrado}}
                                                </div>
                                                @endif

                                                @if($pivotrep_paquete->comentario !== null)
                                                <div class="row mb-3">
                                                    <label><span class="fw-bolder">Comentario: </span>{{$pivotrep_paquete->comentario}}
                                                </div>
                                                @endif

                                                @if($pivotrep_paquete->foto_entrega !== null)
                                                <div class="row mb-3">
                                                    <label class="fw-bolder">Imagen:</label>
                                                    <div>
                                                        <img src="{{Storage::url('public/entregas/'.$pivotrep_paquete->foto_entrega)}}" class="img-fluid img-thumbnail border border-4 rounded">
                                                    </div>

                                                </div>
                                                @endif

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>


        <!-- FIN CONTENIDO-->


        </main>

        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2023</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/js/scripts.js') ?>"></script>


</body>
{{-- <!--@endauth

    @guest
        @include('pages.401')
    @endguest-->--}}

</html>