@extends('admin.master')

@section('content')
<div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                <!-- Search form -->
                <form action="{{ route('admin.search') }}" method="get" class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                    @csrf
                    <div class="form-group mb-0">
                        <div class="input-group input-group-alternative input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input class="form-control" placeholder="Search" type="text" name="kata">
                        </div>
                    </div>
                    <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main"
                        aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </form>
                <!-- Navbar links -->
                <ul class="navbar-nav align-items-center  ml-md-auto ">
                    <li class="nav-item d-sm-none">
                        <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                            <i class="ni ni-zoom-split-in"></i>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                                </span>
                                <div class="media-body  ml-2  d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold">John Snow</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu  dropdown-menu-right ">
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome!</h6>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a href="#!" class="dropdown-item">
                                <i class="ni ni-user-run"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-10 ">
                        <a href="{{ route('admin') }}"><h6 class="h2 text-white d-inline-block">Data Berita</h6></a>
                    </div>
                    <div class="col-lg-2">
                        <a href="{{ route('admin.create') }}"><button type="button" class="btn btn-success">
                          Tambah Data
                        </button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="no">No</th>
                                    <th scope="col" class="sort" data-sort="title">Judul</th>
                                    <th scope="col" class="sort" data-sort="date">Tanggal</th>
                                    <th scope="col" class="sort" data-sort="author">Author</th>
                                    <th scope="col" class="sort" data-sort="sumber">Sumber</th>
                                    <th scope="col" class="sort" data-sort="status">Status</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach ($berita as $item)
                                <tr>
                                    <th scope="row">{{ ++$no }}</th>
                                    <td>{{ Str::limit($item->judul, 40, ' . . .') }}</td>
                                    <td>{{ $item->tanggal->format('d/m/Y') }}</td>
                                    <td>{{ $item->author }}</td>
                                    <td>{{ Str::limit($item->sumber, 25, ' . . .') }}</td>
                                    <td>@if ($item->status  == "Publish")
                                            <span class="badge badge-pill badge-success">
                                        @else
                                            <span class="badge badge-pill badge-danger">
                                        @endif
                                        {{ $item->status }}
                                    </td>
                                    {{-- <td>{{ $item->foto }}</td> --}}
                                    <td>
                                        <form action="{{ route('admin.destroy', $item->id) }}" method="post">
                                        @csrf
                                          <a href="{{ route('admin.edit', $item->id) }}" class="btn btn-sm btn-info">Edit</a>
                                          <button type="submit" class="btn btn-sm btn-danger" onClick="return confirm('Yakin mau dihapus?')">Hapus</button>
                                         </td>
                                        </form>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.footer')

    </div>
</div>
<!-- Argon Scripts -->
@endsection
