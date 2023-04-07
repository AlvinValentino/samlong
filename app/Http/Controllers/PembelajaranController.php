<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Pelajaran;
use App\Models\Pembelajaran;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PembelajaranController extends Controller
{
    public function index() {
        if(Auth::check()) {
            $pelajaran = Pelajaran::where('jurusan', Auth::user()->siswa->jurusan)->orWhere('jurusan', 'Umum')->get('nama');
        } else if(Auth::guard('guru')->check()) {
            $pelajaran = Pelajaran::where('jurusan', Auth::guard('guru')->user()->guru->jurusan)->orWhere('jurusan', 'Umum')->get('nama');
        }
        return view('pembelajaran.index', ['title' => 'Halaman Pembelajaran', 'pelajaran' => $pelajaran]);
    }

    public function create() {
        $dataPembelajaran = Pembelajaran::with('guru')->where('kodeguru', Auth::guard('guru')->id())->get();

        return view('pembelajaran.create', ['title' => 'Halaman Pembelajaran', 'dataPembelajaran' => $dataPembelajaran]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'materi' => 'required',
            'isi' => 'required',
            'kodeguru' => 'required',
            'idPelajaran' => ''
        ]);

        $guru = Guru::findOrFail($request->kodeguru);
        $pelajaran = Pelajaran::where('nama', $guru->mapel)->get('id');

        $validatedData['idPelajaran'] = $pelajaran[0]->id;

        $pembelajaran = Pembelajaran::create($validatedData);

        if($pembelajaran) {
            return response()->json(['success' => 'Pembelajaran berhasil dimasukkan!'], 200);
        }

        return response()->json(['error' => 'Pembelajaran gagal dimasukkan!']);
    }

    public function edit($id) {
        $dataPembelajaran = Pembelajaran::where('id', $id)->get();

        return response()->json(['dataPembelajaran' => $dataPembelajaran]);
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'materi' => 'required',
            'isi' => 'required'
        ]);

        Pembelajaran::find($id)->update($validatedData);

        return response()->json(['success' => 'Data pembelajaran berhasil diubah!'], 200);
    }

    public function destroy($id) {
        $destroyPembelajaran = Pembelajaran::findOrFail($id)->delete();

        if($destroyPembelajaran) {
            return redirect()->back();
        }
    }

    public function showMateri(Request $request) {
        if(Auth::check()) {
            $findGuru = Guru::where('jurusan', Auth::user()->siswa->jurusan)->where('mapel', $request->pelajaran)->first();
            $materi = Pembelajaran::where('kodeguru', $findGuru->kode)->get('materi');
        } else if(Auth::guard('guru')->check()) {
            $findGuru = Guru::where('jurusan', Auth::guard('guru')->user()->guru->jurusan)->where('mapel', $request->pelajaran)->first();
            $materi = Pembelajaran::where('kodeguru', $findGuru->kode)->get('materi');
        }
        
        return response()->json(['materi' => $materi], 200);
    }

    public function showIsiMateri(Request $request, $materi) {
        if(Auth::check()) {
            $findGuru = Guru::where('jurusan', Auth::user()->siswa->jurusan)->where('mapel', $request->pelajaran)->first();
            $isiMateri = Pembelajaran::where('kodeguru', $findGuru->kode)->where('materi', $materi)->first();
        } else if(Auth::guard('guru')->check()) {
            $findGuruMapel = Guru::where('jurusan', Auth::guard('guru')->user()->guru->jurusan)->where('mapel', $request->pelajaran)->first();
            $isiMateri = Pembelajaran::where('kodeguru', $findGuruMapel->kode)->where('materi', $materi)->first();
        }

        return response()->json(['isi' => $isiMateri]);
    }

    
}
