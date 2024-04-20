<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PengelolaController extends Controller
{
    public function indexpengelola(Request $request)
    {
        $data = [
            'datapengelola'      => User::where('role', 'pengelola')->get()
        ];
        return view('page.pengelola.index', $data);
    }

    public function tambah(Request $request)
    {
        return view('page.pengelola.tambah');
    }

    public function pengelola(Request $request)
    {
        $request->validate([
            'name'              => 'required',
            'email'             => 'required',
            'password'          => 'required',
            'jenis_kelamin'     => 'required',
            'photos'            => 'required|max:1024'
        ]);

        $file_foto      = $request->file('photos');
        $extensi_foto   = $file_foto->getClientOriginalExtension();
        $nama_foto      = 'pengelola_' . date('dmyhis') . '.' . $extensi_foto;
        $file_foto->move(public_path('/imagepengelola'), $nama_foto);

        $data = [
            'name'              => $request->name,
            'email'             => $request->email,
            'role'              => 'pengelola',
            'jenis_kelamin'     => $request->jenis_kelamin,
            'pictures'          => $nama_foto,
            'password'          => Hash::make($request->password)

        ];
        User::create($data);
        return redirect('/indexpengelola');
    }

    public function edit(Request $request, $id)
    {
        $data = [
            'datapengelola'      => User::where('id', $id)->first()
        ];
        return view('page.pengelola.edit', $data);
    }

    public function ubah(Request $request, $id)
    {
        $request->validate([
            'name'              => 'required',
            'email'             => 'required',
            'jenis_kelamin'     => 'required',
            'photos'            => 'required'
        ]);

        $file_foto      = $request->file('photos');
        $extensi_foto   = $file_foto->getClientOriginalExtension();
        $nama_foto      = 'pengelola_' . date('dmyhis') . '.' . $extensi_foto;
        $file_foto->move(public_path('/imagepengelola'), $nama_foto);

        $dataStore = [
            'name'              => $request->name,
            'email'             => $request->email,
            'role'              => 'peminjam',
            'jenis_kelamin'     => $request->jenis_kelamin,
            'pictures'          => $nama_foto,
        ];
        User::where('id', $id)->update($dataStore);
        return redirect('/indexpengelola');
    }

    public function hapus(Request $request, $id)
    {
        User::where('id', $id)->delete();
        return redirect('/indexpengelola');
    }
}
