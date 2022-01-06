<?php
 
namespace App\Http\Controllers;

use App\Models\Pengukuran;
use App\Models\Balita;
use App\Models\Jadwal;
use App\Exports\PengukuranExport;
use Excel;
use PDF;
use Illuminate\Http\Request;

class PengukuranController extends Controller
{
    public function index()
    {
        $pengukuran = Pengukuran::orderBy('jadwal_id','ASC')->simplePaginate(5);
        $jadwal = Jadwal::all();
        $balita = Balita::all();
        return view('pengukuran.index', compact('pengukuran', 'jadwal', 'balita'));
    }
 
 //    public function search(Request $request)
	// {
	// 	// menangkap data pencarian
	// 	$keyword = $request->search;
 //        $jadwal = Jadwal::all();
 //        $balita = Balita::all();
	// 	$pengukuran = Pengukuran::where('balita_id', 'like', "%" . $keyword . "%")->simplePaginate(5);
		
	// 	return view('pengukuran.index', compact('pengukuran', 'jadwal', 'balita')) ->with('i', (request()->input('page', 1) -1) *5);
 
	// }

    public function store(Request $request)
    {
        $request->validate([
            'jadwal_id' => 'required',
            'balita_id'=>'required',
            'usia'=>'required',
            'bb'=>'required',
            'tb'=>'required',
            'cara_ukur'=>'required',
            'vitamin_a'=>'required',
            'asi'=>'required',
            'pmt_ke'=>'required',
            'sumber_pmt'=>'required',
            'tgl_pemberian'=>'required'
        ]);

        Pengukuran::create($request->all());
        return redirect()->route('pengukuran.index')->with('success', 'Data Pengukuran Berhasil Ditambahkan!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        $balita = Balita::all();
        $jadwal = Jadwal::all();
        $pengukuran = Pengukuran::where('id', $id)->first();

        //mengambil value input select Tgl Pelayanan
        $jadwal_id = $pengukuran->jadwal_id;
        $output_tgl_pelayanan = '';
        foreach ($jadwal as $key => $value) {
            $output_tgl_pelayanan .= '
                <option ' . (old("jadwal_id", $jadwal_id) == $value->id ? "selected" : "") . ' value=" ' . $value->id . ' " > ' . $value->tgl_pelayanan . ' </option>
            ';
        }

        //mengambil value input select Nama Balita
        $balita_id = $pengukuran->balita_id;
        $output_nama_balita = '';
        foreach ($balita as $key => $value) {
            $output_nama_balita .= '
                 <option ' . (old("balita_id", $balita_id) == $value->id ? "selected" : "") . ' value="' . $value->id . '">' . $value->nama_balita . '</option>
            ';

        }

        //mengambil value input select Sumber PMT
        $sumber_pmt = $pengukuran->sumber_pmt;
        $nilai_sumber_pmt = [
            '-',
            'Swadaya',
            'Daerah',
            'Pusat'
        ];
        $output_sumber_pmt = '';
        foreach ($nilai_sumber_pmt as $key => $value) {
            $output_sumber_pmt .= '
                <option ' . (old("sumber_pmt", $sumber_pmt) == $value ? "selected" : "") . ' value="' . $value . '">' . $value . '</option>
                ';
        }

        //mengambil value input radio asi
        $asi = $pengukuran->asi;
        $output_asi = '';
        if ($asi === "Ya") {
            $output_asi .= '
                <div class="form-check form-check-inline">
                    <input class="form-check-input"type="radio" name="asi" value="Ya" id="e_asi1" checked>
                    <label class="form-check-label" for="e_asi1">Ya</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input"type="radio" name="asi" value="Tidak" id="e_asi2">
                    <label class="form-check-label" for="e_asi2">Tidak</label>
                </div>
            ';
        } else if($asi === "Tidak") {
            $output_asi .= '
                <div class="form-check form-check-inline">
                    <input class="form-check-input"type="radio" name="asi" value="Ya" id="e_asi1">
                    <label class="form-check-label" for="e_asi1">Ya</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input"type="radio" name="asi" value="Tidak" id="e_asi2" checked>
                    <label class="form-check-label" for="e_asi2">Tidak</label>
                </div>
            ';
        }

        //mengambil value input radio vitamin
        $vitamin = $pengukuran->vitamin_a;
        $output_vitamin = '';
        if ($vitamin === 'Ya') {
            $output_vitamin .= '
                <div class="form-check form-check-inline">
                    <input class="form-check-input"type="radio" name="vitamin_a" value="Ya" id="e_vitamin_a_1" checked>
                    <label class="form-check-label" for="e_vitamin_a_1">Ya</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input"type="radio" name="vitamin_a" value="Tidak" id="e_vitamin_a_2">
                    <label class="form-check-label" for="e_vitamin_a_2">Tidak</label>
                </div>
            ';
        } else {
            $output_vitamin .= '
                <div class="form-check form-check-inline">
                    <input class="form-check-input"type="radio" name="vitamin_a" value="Ya" id="e_vitamin_a_1">
                    <label class="form-check-label" for="e_vitamin_a_1">Ya</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input"type="radio" name="vitamin_a" value="Tidak" id="e_vitamin_a_2" checked>
                    <label class="form-check-label" for="e_vitamin_a_2">Tidak</label>
                </div>
            ';
        }

        //mengambil value input radio cara_ukur
        $cara_ukur = $pengukuran->cara_ukur;
        $output_cara_ukur = '';
        if ($cara_ukur == 'Berdiri') {
            $output_cara_ukur .= '
                <div class="form-check form-check-inline">
                    <input class="form-check-input"type="radio" name="cara_ukur" value="Berdiri" id="e_berdiri" checked>
                    <label class="form-check-label" for="e_berdiri">Berdiri</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input"type="radio" name="cara_ukur" value="Terlentang" id="e_terlentang">
                    <label class="form-check-label" for="e_terlentang">Terlentang</label>
                </div>
            ';
        } else if ($cara_ukur == 'Terlentang') {
            $output_cara_ukur .= '
                <div class="form-check form-check-inline">
                    <input class="form-check-input"type="radio" name="cara_ukur" value="Berdiri" id="e_berdiri">
                    <label class="form-check-label" for="e_berdiri">Berdiri</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input"type="radio" name="cara_ukur" value="Terlentang" id="e_terlentang" checked>
                    <label class="form-check-label" for="e_terlentang">Terlentang</label>
                </div>
            ';
        }
 
        return response()->json([
            'data' => $pengukuran,
            'output_nama_balita' => $output_nama_balita,
            'output_sumber_pmt' => $output_sumber_pmt,
            'output_asi' => $output_asi,
            'output_vitamin' => $output_vitamin,
            'output_cara_ukur' => $output_cara_ukur,
            'output_tgl_pelayanan' => $output_tgl_pelayanan,
        ]);
    }

    public function update(Request $request)
    {
        $validasi = $request->validate([
            'jadwal_id' => 'required',
            'balita_id'=>'required',
            'usia'=>'required',
            'bb'=>'required',
            'tb'=>'required',
            'cara_ukur'=>'required',
            'vitamin_a'=>'required',
            'asi'=>'required',
            'pmt_ke'=>'required',
            'sumber_pmt'=>'required',
            'tgl_pemberian'=>'required'
        ]);
        Pengukuran::where('id', $request->id)
        ->update($validasi);
        // Pengukuran::where('id',$request->id)
        // ->update([
        //     'jadwal_id'=>$request->jadwal_id,
        //     'balita_id'=>$request->balita_id,
        //     'usia'=>$request->usia,
        //     'bb'=>$request->bb,
        //     'tb'=>$request->tb,
        //     'cara_ukur'=>$request->cara_ukur,
        //     'vitamin_a'=>$request->vitamin_a,
        //     'asi'=>$request->asi,
        //     'pmt_ke'=>$request->pmt_ke,
        //     'sumber_pmt'=>$request->sumber_pmt,
        //     'tgl_pemberian'=>$request->tgl_pemberian,
        //     'catatan'=>$request->catatan,

        // ]);
        return redirect()->route('pengukuran.index')->with('success', 'Data Pengukuran Berhasil Diupdate!');

    }

    public function destroy($id)
    {
        Pengukuran::destroy($id);
        return redirect('/pengukuran')->with('success','Data Pengukuran berhasil dihapus!');
    }

    public function exportpdf()
    {
        $pengukuran = Pengukuran::all();
        // $jadwal = Jadwal::all();
        // $balita = Balita::all();

        view()->share('pengukuran', $pengukuran);
        $pdf = PDF::loadview('pengukuran.pengukuran-pdf')->setPaper('a3','landscape');
        return $pdf->stream('pengukuran.pdf');
    }

    public function exportIntoExcel()
    {
        return Excel::download(new PengukuranExport, 'pengukuranlist.xlsx');
    }

    public function exportIntoCSV()
    {
        return Excel::download(new PengukuranExport, 'pengukuranlist.csv');
    }

}