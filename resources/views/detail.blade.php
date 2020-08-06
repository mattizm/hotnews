@extends('layouts.master')

@section('content')
<div class="container main-content">
    <form method="post" action="{{ route('detail', $berita->id) }}"">
        @csrf
        <div class=" col-md-8">
            <div class="row mt-5">
                <h2>{{ $berita->judul }}</h2>
            </div>
            <div class="row">
                <p class="text-muted">
                    {{ $berita->tanggal->format('d/m/Y') }}
                </p>
            </div>
            <div class="row">
                <img src="{{ ('../images/'.$berita->foto) }}" style="max-width: 720px;" alt="">
            </div>
            <div class="row mt-2">
                <p>
                    {{ $berita->berita }}
                </p>
            </div>
            <div class="row">
                <strong>{{ $berita->author }}</strong>
            </div>
            <div class="row">
                <strong>{{ $berita->sumber }}</strong>
            </div>
        </div>
    </form>
</div>
@endsection
