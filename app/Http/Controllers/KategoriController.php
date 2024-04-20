<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function lihatdata(Request $request)
    {
        $data = [
            'datakategori'      => Kategori::all()
        ];
        return view('page.kategori.index', $data);
    }

    public function edit(Request $request, $id)
    {
        $data = [
            'datakategori'      => Kategori::where('id', $id)->first()
        ];
        return view('page.kategori.edit', $data);
    }

    public function ubah(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'keterangan'    => 'required'

        ]);
        $dataStor = [
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan,
            'status' => 'aktif'
        ];
        Kategori::where('id', $id)->update($dataStor);
        return redirect('/lihatkategori');
    }

    public function hapus(Request $request, $id)
    {
        Kategori::where('id', $id)->delete();
        return redirect('/indexkategori');
    }


    public function kategori(Request $request)
    {
        return view('page.kategori.tambah');
    }

    public function kategorie(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'keterangan' => 'required'

        ]);
        $dataStor = [
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan,
            'status' => 'aktif'
        ];
        Kategori::create($dataStor);
        return redirect('/indexkategori');
    }
}
