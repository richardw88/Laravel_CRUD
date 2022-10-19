<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index (){
        $data = Employee::all();
        // dd($data);
        return view('dataPegawai', compact('data'));
    }

    public function tambahPegawai (){
        return view('tambahData');
    }

    public function tambahDataPegawai(Request $request){
        // dd($request->all());
        $data = Employee::create($request->all());
        // jika ada request file FOTO
        if($request->hasFile('foto')){
            //redirect data ke folder foto
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pegawai')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function editDataPegawai($id){
        $data = Employee::find($id);
        // dd($data);
        return view('editDataPegawai', compact('data'));
    }

    public function updateDataPegawai(Request $request, $id){
        $data = Employee::find($id);
        $data->update($request->all());
        if($request->hasFile('foto')){
            //redirect data ke folder foto
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pegawai')->with('success', 'Data Berhasil di Update');
    }

    public function deleteDataPegawai($id){
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('pegawai')->with('success', 'Data Berhasil di Hapus');
    }
}
