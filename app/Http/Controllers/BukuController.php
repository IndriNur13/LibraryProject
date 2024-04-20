<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class BukuController extends Controller
{

    public function lihatdatabuku(Request $request)
    {
        $data = [
            'databuku'      => Buku::all()
        ];
        return view('page.buku.index', $data);
    }

    public function ubah(Request $request, $id)
    {
        $request->validate([
            'judul_buku'            => 'required',
            'penulis'               => 'required',
            'penerbit_id'           => 'required',
            'tahun_terbit'          => 'required',
            'kategori_id'           => 'required',
            'photo'                 => 'required'
        ]);

        $file_foto      = $request->file('photo');
        $extensi_foto   = $file_foto->extension();
        $nama_foto      = 'buku_' . date('dmyhis') . '.' . $extensi_foto;
        $file_foto->move(public_path('/imagebuku'), $nama_foto);

        $dataStore = [
            'judul_buku' => $request->judul_buku,
            'penulis' => $request->penulis,
            'penerbit_id' => $request->penerbit_id,
            'tahun_terbit' => $request->tahun_terbit,
            'status' => 'aktif',
            'pictures' => $nama_foto,
            'kategori_id' => $request->kategori_id
        ];
        Buku::where('id', $id)->update($dataStore);
        return redirect('/lihatdatabuku');
    }

    public function edit(Request $request, $id)
    {
        $databuku = [
            'databuku' => Buku::where('id', $id)->first(),
            'kategori'      => Kategori::all(),
            'penerbit'      => Penerbit::all()
        ];
        return view('page.buku.edit', $databuku);
    }

    public function bukuu(Request $request)
    {
        $data = [
            'kategori'      => Kategori::all(),
            'penerbit'      => Penerbit::all()
        ];

        return view('page.buku.tambah', $data);
    }

    public function buku(Request $request)
    {
        $request->validate([
            'judul_buku'            => 'required',
            'penulis'               => 'required',
            'penerbit_id'           => 'required',
            'tahun_terbit'          => 'required',
            'kategori_id'           => 'required',
            'photo'                 => 'required|max:1024'
        ]);

        //untuk membuat nama foto
        $file_foto      = $request->file('photo');
        $extensi_foto   = $file_foto->extension();
        $nama_foto      = 'buku_' . date('dmyhis') . '.' . $extensi_foto;
        $file_foto->move(public_path('/imagebuku'), $nama_foto);


        $dataStore = [
            'judul_buku' => $request->judul_buku,
            'penulis' => $request->penulis,
            'penerbit_id' => $request->penerbit_id,
            'tahun_terbit' => $request->tahun_terbit,
            'status' => 'aktif',
            'pictures' => $nama_foto,
            'kategori_id' => $request->kategori_id
        ];
        Buku::create($dataStore);
        return redirect('/indexbuku');
    }

    public function hapus(Request $request, $id)
    {
        Buku::where('id', $id)->delete();
        return redirect('/indexbuku');
    }
}
