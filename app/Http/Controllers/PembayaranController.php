<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\Spp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function pembayaran()
    {
        $i = 1;
        $j = 1;
        $spp = Spp::all();
        $users = Siswa::all();
        $pembayaran = Pembayaran::all();
        return view('admin.pembayaran', compact(['users', 'i', 'j', 'spp','pembayaran']));
    }

    public function storePembayaran(Request $request)
    {
        // dd($request);
        $siswa = Siswa::find($request);
        $nominal =  Spp::find($request['spp_id']);
        $siswa_nisn = $siswa[0]->nisn;
        $nominal_spp = $nominal->nominal;
        Pembayaran::create([
            'petugas_id' => Auth::user()->id,
            'nama_petugas' => Auth::user()->nama_petugas,
            'nisn_id' => $request['nisn_id'],
            'nisn' => $siswa_nisn,
            'bulan_dibayar' => $request['bulan_dibayar'],
            'tahun_dibayar' => $request['tahun_dibayar'],
            'spp_id' => $request['spp_id'],
            'nominal_spp' => $nominal_spp,
            'jumlah_bayar' => $request['jumlah_bayar']
        ]);
        return redirect('/admin/pembayaran');
    }

    public function editPembayaran($id)
    {
        $p = Pembayaran::find($id);
        // dd($p);
        $petugas = User::all();
        // dd($pembayaran[0]);
        return view('admin.pembayaranEdit', compact(['p', 'petugas']));
    }

    public function updatePembayaran($id, Request $request)
    {
        $pembayaran = Pembayaran::find($id);
        // dd($request);
        $pembayaran->update($request->except('_token', '_method', 'submit'));
        return redirect('/admin/pembayaran');
    }

    public function deletePembayaran($id)
    {
        $pembayaran = Pembayaran::find($id);
        $pembayaran->delete();
        return redirect('/admin/pembayaran');
    }
}
