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
        Employee::create($request->all());
        return redirect()->route('pegawai')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function tampilDataPegawai($id){
        $data = Employee::find($id);
        // dd($data);
        return view('tampilDataPegawai', compact('data'));
    }

    public function updateDataPegawai(Request $request, $id){
        $data = Employee::find($id);
        $data->update($request->all());
        return redirect()->route('pegawai')->with('success', 'Data Berhasil di Update');
    }
}
