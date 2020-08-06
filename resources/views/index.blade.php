@extends('layouts.master')

@section('content')
<!-- Main content -->
<div class="main-content">
    {{-- Carousel & Kanannya --}}
    <section class="py-1 pb-3 bg-default rounded-bottom">
        <div class="row m-2">
            <div class="col-12 col-md-8">

                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($collection->take(3) as $item)
                        <div class="carousel-item @if($loop->first) active @endif">
                            <a href="{{ route('detail', $item->id) }}">
                                <img class="d-block w-100" src="{{ ('images/'.$item->foto) }}" alt="{{ $item->id }}">
                                <div class="breadcrumb carousel-caption d-none d-md-block">
                                    <h5 class="text-black-100">{{ $item->judul }}</h5>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <div class="col-12 col-md-3 text-white">
                @foreach ($data->take(2) as $item)
                <div class="row">
                    <div class="col">
                        <figure class="card card-lift--hover shadow border-0">
                            <a href="{{ route('detail', $item->id) }}">
                                <img src="{{ ('images/'.$item->foto) }}" class="figure-img img-fluid rounded" alt="...">
                                <figcaption class="figure-caption text-left my--2 mb-2">{{ $item->judul }}</figcaption>
                            </a>
                        </figure>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- Hot News --}}
    <section class="section section-lg pt-lg-0 px-4 py-1 bg-lighter">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="row pt-4">
                        @foreach ($datas->take(3) as $item)
                        <div class="col-lg-4">
                            <div class="card card-lift--hover shadow border-0">
                                <div class="card-body py-5">
                                    <a href="{{ route('detail', $item->id) }}">
                                        <div>
                                            <img class="d-block w-100" src="{{ ('images/'.$item->foto) }}" alt="">
                                        </div>
                                        <h4 class="h3 text-primary text-uppercase">{{ $item->judul }}</h4>
                                        <p class="description mt-3">{{ Str::limit($item->berita, 50, ' (. . .)') }}.</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{-- <div class="col-lg-4">
                            <div class="card card-lift--hover shadow border-0">
                                <div class="card-body py-5">
                                    <div>
                                        <img class="d-block w-100" src="../images/pubg.jpeg" alt="">
                                    </div>
                                    <h4 class="h3 text-success text-uppercase">Integrated build tools</h4>
                                    <p class="description mt-3">Use Argons's included npm and gulp scripts to compile
                                        source code, run tests, and more with just a few simple commands.</p>
                                    <div>
                                        <span class="badge badge-pill badge-primary">npm</span>
                                        <span class="badge badge-pill badge-success">gulp</span>
                                        <span class="badge badge-pill badge-warning">build tools</span>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Semua Berita --}}
    <section>
        <div class="m-3">
            {{-- @if ( Berita::table('status') === "Publish") --}}
                @foreach ($collection as $item)
                    <div class="row">
                        <tr>
                        <div class="media bg-light position-relative p-3 m-2">
                            <img src="{{ ('images/'.$item->foto) }}" class="mr-3 w-25" alt="...">
                            <div class="media-body">
                                <h5 class="mt-0">{{ $item->judul }}</h5>
                                <p>{{ Str::limit($item->berita, 200, ' (. . .)') }}</p>
                                <a href="{{ route('detail', $item->id) }}" class="stretched-link">Read More</a>
                            </div>
                        </div>
                        </tr>
                    </div>
                @endforeach
            {{-- @endif --}}
        </div>
        <div class="area">
            <div class="kanan">{{ $collection->onEachSide(3)->links() }}</div>
            <div class="kiri"><strong>Jumlah Berita: {{ $jumlah }}</strong></div>
        </div>
    </section>
</div>
@endsection
