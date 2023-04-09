<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use App\Models\Siswa;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MagangController extends Controller
{
    public function index() {
        if(Auth::check()) {
            $todaywiso = Carbon::now()->isoFormat('dddd, D MMMM YYYY');
            $todayf = Carbon::now()->isoFormat('YYYY-MM-DD');
            $today = Carbon::now();
            $tparse = Carbon::parse($today);
            $tanggal = $tparse->addDay(30);
            $period = CarbonPeriod::create($todayf, $tanggal);
            $absen = Kehadiran::where('tanggal', $todayf)->where('nisSiswa', Auth::id())->first();
            
            $dates = [];
    
            foreach($period as $date) {
                $dates[] = $date->isoFormat('dddd, D MMMM YYYY');
            }
    
            return view('magang.index', ['title' => 'Halaman Magang', 'dates' => $dates, 'today' => $todaywiso, 'absen' =>   $absen]);
        }

        return redirect()->back();
    }

    public function showDaftarMagang() {
        $siswa = Siswa::where('idBos', Auth::guard('bos')->id())->first();
        $daftarMagang = Kehadiran::with('siswa')->where('nisSiswa', $siswa->nis)->where('idBos', Auth::guard('bos')->id())->orderBy('tanggal')->get();
        $daftarSiswa = Siswa::where('idBos', Auth::guard('bos')->id())->get();

        return view('magang.bos', ['title' => 'Halaman Magang', 'daftarMagang' => $daftarMagang, 'siswa' => $siswa, 'daftarSiswa' => $daftarSiswa]);
    }

    public function dataMagang($nis) {
        $kehadiran = Kehadiran::with('siswa')->where('nisSiswa', $nis)->where('idBos', Auth::guard('bos')->id())->get();

        return response()->json($kehadiran);
    }

    public function detailPekerjaan() {
        if(Auth::check()) {
            $today = Carbon::now()->isoFormat('dddd, D MMMM YYYY');
    
            return view('magang.detail', ['title' => 'Halaman Magang', 'today' => $today]);
        }
    }

    public function persetujuan(Request $request, $id) {
        $persetujuan = Kehadiran::find($id)->update(['persetujuan' => $request->persetujuan]);

        return redirect()->back()->with(['persetujuan' => $persetujuan]);
    }

    public function absenMagang(Request $request) {
        $today = Carbon::now();

        $validatedData = $request->validate([
            'status' => 'required',
            'deskripsi' => '',
            'nisSiswa' => '',
            'idBos' => '',
            'tanggal' => ''
        ]);

        $validatedData['tanggal'] = $today;
        $validatedData['nisSiswa'] = Auth::id();
        $validatedData['idBos'] = Auth::user()->siswa->idBos;

        if($validatedData['status'] == 'Hadir' && $validatedData['deskripsi'] == NULL) {
            return response()->json(['message' => 'Deskripsi tidak boleh kosong']);
        }
        $kehadiran = Kehadiran::create($validatedData);

        if($kehadiran) {
            return response()->json(['success' => 'Absen kehadiran berhasil!'], 200);
        }
    }
}
