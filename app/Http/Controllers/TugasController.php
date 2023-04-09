<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Pelajaran;
use App\Models\Pembelajaran;
use App\Models\PengumpulanTugas;
use App\Models\Siswa;
use App\Models\Tugas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TugasController extends Controller
{
    public function index($id) {
        if(Auth::check() || Auth::guard('guru')->check()) {
        if($id) {
            if(Auth::check()) {
                $userData = Siswa::findOrFail(Auth::id());
                $pelajaran = Pelajaran::where('jurusan', $userData->jurusan)->orWhere('jurusan', 'Umum')->get('nama');
            } else if(Auth::guard('guru')->check()) {
                $userGuru = Guru::findOrFail(Auth::guard('guru')->id());
                $pelajaran = Pelajaran::where('jurusan', $userGuru->jurusan)->orWhere('jurusan', 'Umum')->get('nama');
            }

            $pembelajaran = Pembelajaran::with('pelajaran')->find($id);
            $dataTugas = Tugas::where('idPelajaran', $pembelajaran->idPelajaran)->where('kodeguru', $pembelajaran->kodeguru)->get();

            return view('tugas.index', ['title' => 'Halaman Tugas', 'pelajaran' => $pelajaran, 'pembelajaran' => $pembelajaran, 'dataTugas' => $dataTugas]);
        }
        }

        return redirect()->back();
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'kodeguru' => '',
            'judul' => 'required',
            'deskripsi' => '',
            'deadline' => 'required',
            'idPelajaran' => 'required'
        ]);

        $validatedData['kodeguru'] = Auth::guard('guru')->id();

        $tugas = Tugas::create($validatedData);

        if($tugas) {
            return response()->json(['success' => 'Data tugas berhasil dimasukkan'], 200);
        }
    }

    public function detailTugas(Request $request) {
        if(Auth::check() || Auth::guard('guru')->check()) {
        if(Auth::check()) {
            $dataTugas = Tugas::find($request->id);
            $pengumpulan = PengumpulanTugas::where('nisSiswa', Auth::id())->where('idTugas', $dataTugas->id)->first();
    
            return view('tugas.detail', ['title' => 'Halaman Tugas', 'dataTugas' => $dataTugas, 'pengumpulan' => $pengumpulan]);
        }else if(Auth::guard('guru')->check()) {
            $tugas = Tugas::find($request->id);
            $dataPengumpulan = PengumpulanTugas::with('tugas')->where('idTugas', $request->id)->get();
            
            return view('tugas.detail', ['title' => 'Halaman Tugas', 'dataPengumpulan' => $dataPengumpulan, 'tugas' => $tugas]);
        }
        }

        return redirect()->back();
    }

    public function submitTugas(Request $request) {
        $today = Carbon::now();
        $validatedData = $request->validate([
            'nisSiswa' => '',
            'idTugas' => 'required',
            'fileTugas' => 'required',
            'tanggal_pengumpulan' => '',
        ]);

        $validatedData['nisSiswa'] = Auth::id();
        $validatedData['tanggal_pengumpulan'] = Carbon::now();

        if($request->hasFile('fileTugas')) {
            $storage_file = Storage::disk('tugas');
            $fname = $today->format('Ymd_Hms') . '_' . Str::random(5) . '_' . Str::slug(Auth::user()->siswa->nama, '_', 'end') . '.' . $request->file('fileTugas')->getClientOriginalExtension();
            $storage_file->putFileAs(null, $request->file('fileTugas'), $fname, []);
        }

        $validatedData['fileTugas'] = $fname;

        $submitTugas = PengumpulanTugas::create($validatedData);

        if($submitTugas) {
            return redirect()->back();
        }
    }

    public function penilaian(Request $request, $id) {
        $validatedData = $request->validate([
            'nilai' => 'required|numeric|max:100',
            'catatan' => ''
        ]);

        PengumpulanTugas::find($id)->update($validatedData);

        return redirect()->back();
    }
}
