<?php

namespace App\Http\Controllers;

use App\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
// use illuminate\Support\
use File;

class TamuController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1()
    {
        $no = 0;
        $berita = Berita::all()->sortByDesc('tanggal');
        return view('admin.index', compact('berita', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'foto'=>'required|image|mimes:png,jpg,jpeg'
        ]);
        
        $berita = new Berita;
        $berita->judul = $request->judul;
        $berita->tanggal = $request->tanggal;
        $berita->author = $request->author;
        $berita->sumber = $request->sumber;
        $berita->status = $request->status;

        $foto = $request->foto;
        $namafile = md5($foto) . '.' . $foto->getClientOriginalExtension();
        $foto->move('images/', $namafile);
        $berita->foto = $namafile;

        $berita->berita = $request->isi;

        $berita->save();
        return redirect('admin');
    }

    /**
     * Display the specified resource.
     *
    //  * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berita)
    {
        $batas = 3;
        $jumlah = Berita::count();
        $data = Berita::all()->random(4);
        $datas = Berita::all()->random(3);
        $collection = Berita::whereStatus('Publish')
            ->orderBy('tanggal', 'desc')
            ->paginate($batas);
        $no = $batas * ($collection->currentPage() - 1);
        return view('index', compact('collection', 'jumlah', 'data', 'datas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = Berita::find($id);
        return view('admin.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $berita = Berita::find($id);
        $berita->judul = $request->judul;
        $berita->tanggal = $request->tanggal;
        $berita->author = $request->author;
        $berita->sumber = $request->sumber;
        $berita->status = $request->status;

        $foto = $request->foto;
        $namafile = md5($foto) . '.' . $foto->getClientOriginalExtension();
        $foto->move('images/', $namafile);
        $berita->foto = $namafile;

        $berita->berita = $request->isi;

        $berita->update();
        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::find($id);
        $namafile = $berita->gambar;
        File::delete('images/'.$namafile);
        $berita->delete();
        return redirect('admin');
    }

    /**
     * Detail the specified resource from storage.
     *
     * @param  \App\Berita  $berita
     */
    public function detail($id)
    {
        $berita = Berita::whereStatus('Publish')->find($id);
        return view('detail', compact('berita'));
    }

    public function search(Request $request){
        $cari = $request->kata;
        $jumlah = Berita::count();
        $batas = 2;
        $data = Berita::whereStatus('Publish')->where('judul','like',"%".$cari."%")->orwhere('berita','like',"%".$cari."%")->paginate($batas);
        $no = $batas * ($data->currentPage() - 1);
        return view('search', compact('data', 'cari', 'jumlah'));    
    }

    public function searchmin(Request $request){
        $cari = $request->kata;
        $jumlah = Berita::count();
        $batas = 2;
        $data = Berita::where('judul','like',"%".$cari."%")->orwhere('berita','like',"%".$cari."%")->paginate($batas);
        $no = $batas * ($data->currentPage() - 1);
        return view('admin.search', compact('data', 'cari', 'jumlah', 'no'));    
    }
}
