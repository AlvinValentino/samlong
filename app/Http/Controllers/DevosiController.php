<?php

namespace App\Http\Controllers;

use App\Models\Devosi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DevosiController extends Controller
{
    public function index() {
        $today = Carbon::now()->isoFormat('YYYY-MM-DD');
        $dataDevosi = Devosi::where('tanggal', $today)->first();

        $teksDevosi = str_replace('\n', ' ', $dataDevosi->teks);


        return view('devosi.index', ['title' => 'Halaman Devosi', 'dataDevosi' => $dataDevosi, 'teksDevosi' => $teksDevosi]);
    }

    public function showDevosiDate(Request $request) {
        if($request->status === 'previous') {
            $cparse = Carbon::parse($request->tanggal);
            $tanggal = $cparse->subDay()->isoFormat('YYYY-MM-DD');
        }else if($request->status === 'next') {
            $cparse = Carbon::parse($request->tanggal);
            $tanggal = $cparse->addDay()->isoFormat('YYYY-MM-DD');
        }else {
            $tanggal = $request->tanggal;
        }
        
        $dataDevosi = Devosi::where('tanggal', $tanggal)->first();
        $teksDevosi = str_replace('\n', ' ', $dataDevosi->teks);

        return response()->json(['dataDevosi' => $dataDevosi, 'teksDevosi' => $teksDevosi]);
    }

    public function create() {
        $dataDevosi = Devosi::all();
        return view('devosi.create', ['title' => 'Halaman Devosi', 'dataDevosi' => $dataDevosi]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'judul' => 'required',
            'ayat' => 'required',
            'teks' => 'required',
            'sumber' => '',
            'kodeguru' => 'required',
            'tanggal' => 'required',
        ]);

        $devosi = Devosi::create($validatedData);

        if($devosi) {
            return response()->json(['success' => 'Devosi berhasil dimasukkan!'], 200);
        }

        return response()->json(['error' => 'Devosi gagal dimasukkan!']);
    }

    public function destroy($id) {
        $destroyData = Devosi::findOrFail($id)->delete();

        if($destroyData) {
            return redirect()->back();
        }
    }

    public function edit($id) {
        $dataDevosi = Devosi::where('id', $id)->get();

        return response()->json(['dataDevosi' => $dataDevosi]);
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'judul' => 'required',
            'ayat' => 'required',   
            'teks' => 'required',
            'kodeguru' => 'required',
            'tanggal' => 'required',
        ]);

        $dataDevosi = Devosi::where('id', $id)->update($validatedData);

        return response()->json(['success' => 'Data devosi berhasil diubah!'], 200);
    }
}
