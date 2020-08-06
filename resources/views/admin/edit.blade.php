@extends('admin.master')

@section('content')
<div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Search form -->
                <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                    <div class="form-group mb-0">
                        <div class="input-group input-group-alternative input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input class="form-control" placeholder="Search" type="text">
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
                        <h6 class="h2 text-white d-inline-block pl-5">Edit Berita</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="container bg-white">
            <form class="p-5" method="POST" action="{{ route('admin.update', $berita->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="judul" class="form-control" name="judul" placeholder="Judul Berita" value="{{ $berita->judul }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="text" name="tanggal" class="date form-control" placeholder="yyyy/mm/dd" value="{{ $berita->tanggal }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="author" class="col-sm-2 col-form-label">Author</label>
                    <div class="col-sm-10">
                        <input type="author" class="form-control" name="author" placeholder="Penulis" value="{{ $berita->author }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sumber" class="col-sm-2 col-form-label">Sumber</label>
                    <div class="col-sm-10">
                        <input type="url" class="form-control" name="sumber" placeholder="Sumber" value="{{ $berita->sumber }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="status" id="exampleFormControlSelect1" value="{{ $berita->status }}">
                            <option value="Publish">Publish</option>
                            <option value="Draft">Draft</option>
                        </select>
                        {{-- <input type="status" class="form-control"  placeholder="Status Berita"> --}}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="foto" class="col-sm-2 col-form-label">Foto Sebelumnya</label>
                    <div class="col-sm-10"><img src="{{ asset('images/'.$berita->foto) }}" alt="">
                        <input type="file" class="form-control" name="foto" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="isi">Isi Berita</label>
                    <textarea type="text" class="form-control" name="isi" rows="3">{{ $berita->berita }}</textarea>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin') }}"><button type="button" class="btn btn-danger">Batal</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">


        @include('admin.footer')

    </div>
</div>
<!-- Argon Scripts -->

@endsection