<?php

namespace App\Http\Controllers;

use App\Models\Pemain;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PemainController extends Controller
{
    public function basket()
    {
        $pemain = Pemain::all();
        return view('info_pemain.basket', compact('pemain'));
    }

    public function create()
    {
        return view('info_pemain.daftar-entry');
    }

    public function store(Request $request)
    {
       $request->validate([
            'nama_pemain' => 'required',
            'posisi' => 'required',
            'tim' => 'required',
        ]);

        Pemain::create([
            'nama_pemain' => $request->nama_pemain,
            'posisi' => $request->posisi,
            'tim' => $request->tim,
        ]);

        return redirect()->route('basket');
    }

    public function edit($id_pemain)
    {
        // Temukan data berdasarkan ID
        $pemain = Pemain::findOrFail($id_pemain);

        // Kirimkan data ke tampilan
        return view('info_pemain.daftar-edit', compact('pemain'));
    }
    

    public function update(Request $request, $id_pemain)
    {
        $request->validate([
            'nama_pemain' => 'required',
            'posisi' => 'required',
            'tim' => 'required',
        ]);
        $pemain = Pemain::findOrFail($id_pemain);

        $pemain->update([
            'nama_pemain' => $request->nama_pemain,
            'posisi' => $request->posisi,
            'tim' => $request->tim,
        ]);

        return redirect()->route('basket');
    }

    public function delete($id_pemain)
    {
        $pemain = Pemain::find($id_pemain);
        if (!$pemain){
            return redirect()->route('basket')->with('error', 'informasi tidak ditemukan');
        }
        return view('info_pemain.daftar-hapus', compact('pemain'));
    }

    public function destroy($id_pemain)
    {
        $pemain = Pemain::findOrFail($id_pemain);
        $pemain->delete();
        return redirect()->route('basket')->with('success', 'Data berhasil dihapus!');
    }
    public function cetak()
    {
        $pemain = Pemain::all();
        $pdf = Pdf::loadview('info_pemain.daftar-cetak', compact('pemain'));
        return $pdf->download('laporan-pemain.pdf');
    }


}