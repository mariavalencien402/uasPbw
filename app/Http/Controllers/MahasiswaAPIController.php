<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MhsModel;

class MahasiswaAPIController extends Controller
{
    public function all(){
        $mhs = MhsModel::all();
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Ditampilkan',
            'data' => $mhs
        ], 200);
    }

    public function create(Request $req){
        $mhs = MhsModel::create([
            'Nim' => $req->nim,
            'Nama' => $req->nama,
            'Gender' => $req->gender,
            'Jurusan' => $req->jurusan,
            'Bidang_Minat' => $req->bidang_minat,
        ]);

        if ($mhs){
            return response()->json([
                'success' => true,
                'message' => 'Data Baru Berhasil Disimpan'
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data Baru Gagal Ditampilkan'
            ], 401);
        }
    }

    public function update1(Request $req){
        $mhs = MhsModel::whereId($req->id)->update([
            'Nim' => $req->nim,
            'Nama' => $req->nama,
            'Gender' => $req->gender,
            'Jurusan' => $req->jurusan,
            'Bidang_Minat' => $req->bidang_minat,
        ]);

        if ($mhs){
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Diupdate'
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data Gagal Diupdate'
            ], 400);
        }
    }

    public function update2($id, Request $req){
        $mhs = MhsModel::whereId($id)->update([
            'Nim' => $req->nim,
            'Nama' => $req->nama,
            'Gender' => $req->gender,
            'Jurusan' => $req->jurusan,
            'Bidang_Minat' => $req->bidang_minat,
        ]);

        if ($mhs){
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Diupdate'
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data Gagal Diupdate'
            ], 400);
        }
    }

    public function delete($id){
        $mhs = MhsModel::find($id);
        $mhs->delete();

        if ($mhs){
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Dihapus'
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data Gagal Dihapus'
            ], 400);
        }
    }
}
