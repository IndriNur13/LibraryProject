<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class PenerbitController extends Controller
{

    public function ubah(Request $request, $id)
    {
        $request->validate([
            'nama_penerbit' => 'required',
            'keterangan' => 'required'

        ]);
        $dataStor = [
            'nama_penerbit' => $request->nama_penerbit,
            'keterangan' => $request->keterangan,
            'status' => 'aktif'
        ];
        Penerbit::where('id', $id)->update($dataStor);
        return redirect('/lihatpenerbit');
    }

    public function edit(Request $request, $id)
    {
        $data = [
            'datapenerbit'      => Penerbit::where('id', $id)->first()
        ];
        return view('page.penerbit.edit', $data);
    }

    public function lihatdatapenerbit(Request $request)
    {
        $data = [
            'datapenerbit'      => Penerbit::all()
        ];
        return view('page.penerbit.index', $data);
    }


    public function halpenerbit(Request $request)
    {
        return view('page.penerbit.tambah');
    }

    public function penerbit(Request $request)
    {
        $request->validate([
            'nama_penerbit' => 'required',
            'keterangan'    => 'required'

        ]);
        $dataStor = [
            'nama_penerbit' => $request->nama_penerbit,
            'keterangan'    => $request->keterangan,
            'status'        => 'aktif'
        ];
        Penerbit::create($dataStor);
        return redirect('/indexpenerbit');
    }

    public function hapus(Request $request, $id)
    {
        Penerbit::where('id', $id)->delete();
        return redirect('/indexpenerbit');
    }
}
