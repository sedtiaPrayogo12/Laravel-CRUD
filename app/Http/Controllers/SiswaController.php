<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        if($request->has('cari')){
            $data_siswa = \App\Siswa::where('nama_depan','LIKE','%' .$request->cari. '%')->get();
        }else{
            $data_siswa = \App\Siswa::all();
        }
        return view('siswa.index', compact('data_siswa', $data_siswa));
        // return response()->json($data_siswa);
    }

    public function create(Request $request){
        \App\Siswa::create($request->all());
        return redirect('/siswa')->with('sukses','Data berhasil diinput');
    }

    public function edit($id)
    {
        $siswa = \App\Siswa::find($id);
        return view('siswa/edit', ['siswa' => $siswa]);
    }

    public function update(Request $request, $id)
    {
        $siswa = \App\Siswa::find($id);
        $siswa->update($request->all());
        return redirect('/siswa')->with('sukses','Data berhasil diupdate');
    }

    public function delete($id)
    {
        $siswa = \App\Siswa::find($id);
        $siswa->delete();
        return redirect('/siswa')->with('sukses','Data berhasil dihapus');
    }
}
