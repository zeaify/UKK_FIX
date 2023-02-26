<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\Spp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function adminHome()
    {
        $i = 1;
        $users = Siswa::all();
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('admin.index', compact(['i', 'users', 'kelas', 'spp']));
    }

    public function petugas_store(Request $request)
    {
        $request['password'] = bcrypt($request['password']);
        User::create($request->except('_token', 'submit'));
        return redirect('/admin/petugas');
    }

    public function petugas_destroy($id)
    {
        $petugas = User::find($id);
        $petugas->delete();
        return redirect('/admin/petugas');
    }

    public function petugas_edit($id)
    {
        $petugas = User::find($id);
        return view('admin.petugasEdit',  compact(['petugas']));
    }

    public function petugas_update($id, Request $request)
    {
        $petugas = User::find($id);
        $request['password'] = bcrypt($request['password']);
        $petugas->update($request->except('_token', 'submit', '_method'));
        return redirect('/admin/petugas');
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        Siswa::create($request->except('_token', 'submit'));
        return redirect('/admin/home');
    }

    public function edit($id)
    {
        $spp = Spp::all();
        $kelas_edit = Kelas::all();
        $siswa = Siswa::find($id);
        return view('admin.edit', compact(['siswa', 'spp', 'kelas_edit']));
    }

    public function update($id, Request $request)
    {
        $siswa = Siswa::find($id);
        $siswa->update($request->except('_token', 'submit'));
        return redirect('/admin/home');
    }

    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect('/admin/home');
    }

    public function dtpetugas()
    {
        $i = 1;
        $users = User::all();
        return view('admin.dtpetugas', compact(['users', 'i']));
    }

    public function print()
    {
        $j=1;
        $pembayaran = Pembayaran::all();
        return view('admin.cetak', compact(['pembayaran', 'j']));
    }


}
