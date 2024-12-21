<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Barang Masuk</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="/index">
                <img src="{{ asset('images/arbilogistic.png') }}" alt="Logistik Arbi" style="height: 40px;">
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="/index">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseBarangMasuk" aria-expanded="false" aria-controls="collapseBarangMasuk">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Barang Masuk
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseBarangMasuk" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('incoming_goods.list') }}">Daftar Barang Masuk</a>
                                    <a class="nav-link" href="{{ route('incoming_goods.create') }}">Input Barang Masuk</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseBarangKeluar" aria-expanded="false" aria-controls="collapseBarangKeluar">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Barang Keluar
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseBarangKeluar" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('outgoing_goods.list') }}">Daftar Barang Keluar</a>
                                    <a class="nav-link" href="{{ route('outgoing_goods.create') }}">Input Barang Keluar</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="{{ route('stock_items.list') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Stock Barang
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        {{ auth()->user()->name }}
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Barang Masuk</h1>
                        <div class="card mb-4">
                        </div>
                        <div class="card mb-4">
                            <div class="card-header text-white">
                                <i class="fas fa-table me-1"></i>
                                Data Barang Masuk
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No. Barang Masuk</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Quantity</th>
                                            <th>Origin</th>
                                            <th>Tanggal Masuk</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>No. Barang Masuk</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Quantity</th>
                                            <th>Origin</th>
                                            <th>Tanggal Masuk</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($listIncoming as $incoming)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $incoming->no_incoming_goods }}</td>
                                                <td>{{ $incoming->item_code }}</td>
                                                <td>{{ $incoming->item_name }}</td>
                                                <td>{{ $incoming->quantity }}</td>
                                                <td>{{ $incoming->origin }}</td>
                                                <td>{{ $incoming->date_of_entry }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">

                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
    </body>
</html>
