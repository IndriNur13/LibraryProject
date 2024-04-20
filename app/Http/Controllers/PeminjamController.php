<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PeminjamController extends Controller
{
    public function indexpeminjam(Request $request)
    {
        $data = [
            'datapeminjam'      => User::where('role', 'peminjam')->get()
        ];
        return view('page.peminjam.index', $data);
    }

    public function halpeminjam(Request $request)
    {
        return view('page.peminjam.tambah');
    }

    public function peminjam(Request $request)
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
        $nama_foto      = 'peminjam_' . date('dmyhis') . '.' . $extensi_foto;
        $file_foto->move(public_path('/imagepeminjam'), $nama_foto);

        $dataStore = [
            'name'              => $request->name,
            'email'             => $request->email,
            'role'              => 'peminjam',
            'jenis_kelamin'     => $request->jenis_kelamin,
            'pictures'          => $nama_foto,
            'password'          => Hash::make($request->password)

        ];
        User::create($dataStore);
        return redirect('/indexpeminjam');
    }

    public function edit(Request $request, $id)
    {
        $data = [
            'datapeminjam'      => User::where('id', $id)->first()
        ];
        return view('page.peminjam.edit', $data);
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
        $extensi_foto   = $file_foto->extension();
        $nama_foto      = 'peminjam_' . date('dmyhis') . '.' . $extensi_foto;
        $file_foto->move(public_path('/imagepeminjam'), $nama_foto);

        $dataStore = [
            'name'              => $request->name,
            'email'             => $request->email,
            'role'              => 'peminjam',
            'jenis_kelamin'     => $request->jenis_kelamin,
            'pictures'          => $nama_foto
        ];
        User::where('id', $id)->update($dataStore);
        return redirect('/indexpeminjam');
    }

    public function hapus(Request $request, $id)
    {
        User::where('id', $id)->delete();
        return redirect('/indexpeminjam');
    }
}
