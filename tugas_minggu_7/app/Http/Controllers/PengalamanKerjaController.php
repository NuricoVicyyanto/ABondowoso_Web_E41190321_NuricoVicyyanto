<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB,
    App\Http\Controllers\Controller;

class PengalamanKerjaController extends Controller
{
    public function index()
    {
        $pengalaman_kerja = DB::table('pengalaman_kerja')->get();
        return view('backend.pengalaman_kerja.index', compact('pengalaman_kerja'));
    }
    public function create()
    {
        $pengalaman_kerja=null;
        return view('backend.pengalaman_kerja.create', compact('pengalaman_kerja'));
    }
    public function store(Request $request)
    {
        DB::table('pengalaman_kerja')->insert([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'tahun_masuk'=>$request->tahun_masuk,
            'tahun_keluar'=>$request->tahun_keluar
        ]);

        return redirect()->route('pengalaman_kerja.index')
        ->with('success', 'Data pengalaman kerja baru telah berhasil di simpan.');
    }

    public function edit($id)
    {
        $pengalaman_kerja = DB::table('pengalaman_kerja')->where('id', $id)->first();
        return view('backend.pengalaman_kerja.create', compact('pengalaman_kerja'));
    }

    public function update(Request $request)
    {
        DB::table('pengalaman_kerja')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'tahun_masuk'=>$request->tahun_masuk,
            'tahun_keluar'=>$request->tahun_keluar
        ]);

        return redirect()->route('pengalaman_kerja.index')
        ->with('success', 'Data pengalaman kerja berhasil di perbarui.');
    }

    public function destroy($id)
    {
        DB::table('pengalaman_kerja')->where('id', $id)->delete();
        return redirect()->route('pengalaman_kerja.index')
                        ->with('success', 'Data pengalaman kerja berhasil dihapus');
    }
}
