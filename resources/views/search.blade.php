@extends('layouts.master')

@section('content')
<section>
    @if (count($data))
    <div class="alert alert-success">Ditemukan <strong>{{count($data)}}</strong> data dengan kata:
        <strong>{{ $cari }}</strong></div>
    @foreach ($data as $item)
    <div class="row">
        <tr>
            <div class="media bg-light position-relative p-3 m-2">
                <img src="{{ ('images/'.$item->foto) }}" class="mr-3 w-25" alt="...">
                <div class="media-body">
                    <h5 class="mt-0">{{ $item->judul }}</h5>
                    <p>{{ Str::limit($item->berita, 200, ' . . .') }}</p>
                    <a href="{{ route('detail', $item->id) }}" class="stretched-link">Baca Selengkapnya</a>
                </div>
            </div>
        </tr>
    </div>
    @endforeach
    <div class="area">
        <div class="kanan">{{ $data->onEachSide(3)->links() }}</div>
        <div class="kiri"><strong>Jumlah Berita: {{ $jumlah }}</strong></div>
    </div>
    @endif
</section>
@endsection
