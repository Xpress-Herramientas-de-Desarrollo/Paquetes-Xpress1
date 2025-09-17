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
                    <li><a class="dropdown-item" href="{{route('logout')}}">Cerrar Sesion</a></li>
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
                    <h1 class="mt-4 text-center">Añadir Paquete</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{ route('panel') }}">Inicio</a></li>
                        <li class="breadcrumb-item "><a href="{{ route('paquetes.index') }}">Paquetes</a></li>
                        <li class="breadcrumb-item active">Añadir Paquete</li>
                    </ol>
                </div>

                <div class="container w-100 border border-3 border-primary rounded p-4 mt-3">


                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nombre_cliente" class="form-label">Nombre:</label>
                            <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control" value="">

                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="distrito_id" class="form-label">Distrito:</label>
                            <select data-size="4" title="Seleccione un Distrito" data-live-search="true" name="distrito_id" id="distrito_id" class="form-control selectpicker show-tick">

                            </select>

                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <label for="cobrar" class="form-label">Monto a Cobrar:</label>
                        <input type="number" name="cobrar" id="cobrar" class="form-control" step="0.01" value="">

                    </div>

                    <input type="hidden" name="proveedore_id" value="{{ auth('proveedor')->user()->id }}">




                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="direccion" class="form-label">Dirección:</label>
                            <input type="text" name="direccion" id="direccion" class="form-control" value="">

                        </div>
                    </div>


                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="celular" class="form-label">Celular:</label>
                            <input type="text" name="celular" id="celular" class="form-control" value="">

                        </div>
                    </div>


                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nota" class="form-label">Nota:</label>
                            <textarea name="nota" id="nota" class="form-control"></textarea>

                        </div>
                    </div>


                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="fecha" class="form-label">Fecha de Entrega:</label>
                            <input type="date" name="fecha" id="fecha" class="form-control" value="">

                        </div>
                    </div>


                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="link_direc" class="form-label">Link Dirección:</label>
                            <input type="text" name="link_direc" id="link_direc" class="form-control" value="">

                        </div>
                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
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