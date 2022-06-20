<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MhsModel;

class MhsController extends Controller
{
    public function mahasiswa(){
        $mahasiswa = MhsModel::query()
        ->orderBy('id','desc')
        ->paginate(10);

        return view ('mahasiswa', ['mahasiswa' => $mahasiswa]);
    }

    public function search(Request $request){
        $cari = $request->cari;
        $mahasiswa = MhsModel::where('nama','like','%'.$cari.'%')
        ->orwhere('nim','like','%'.$cari.'%')->paginate();
        
        return view('mahasiswa',['mahasiswa'=> $mahasiswa]);
    }

    public function formulirMhs(){
        return view('formulirMhs');
    }

    public function simpanMhs(Request $req){
        $bidang_minat = implode(",", $req->get('bidang_minat'));
        MhsModel::create([
            'Nim' => $req->nim,
            'Nama' => $req->nama,
            'Gender' => $req->gender,
            'Jurusan' => $req->jurusan,
            'Bidang_Minat' => $bidang_minat,
        ]);
        return redirect('/mahasiswa')->with('alertCreate', 'Data Berhasil Disimpan');
    }

    public function editMhs($id){
        $mahasiswa = MhsModel::find($id);
        return view('editMhs',['mahasiswa' => $mahasiswa]);
    }

    public function updateMhs($id, Request $request)
    {
        $bidang_minat = implode(',',$request->bidang_minat);
        $mahasiswa = MhsModel::find($id);
        $mahasiswa->Nim = $request->nim;
        $mahasiswa->Nama = $request->nama;
        $mahasiswa->Gender = $request->gender;
        $mahasiswa->Jurusan = $request->jurusan;
        $mahasiswa->Bidang_Minat = $bidang_minat;
        $mahasiswa->save();
        return redirect('/mahasiswa')->with('alertUpdate', 'Data Berhasil Terupdate');
    }

    public function deleteMhs($id){
        $mahasiswa = MhsModel::find($id);
        $mahasiswa->delete();
        return redirect('/mahasiswa')->with('alertDelete', 'Data Berhasil Dihapus');
    }
}
