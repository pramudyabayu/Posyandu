<?php
 
namespace App\Http\Controllers;

use App\Models\Balita;
use Illuminate\Http\Request;
use App\Exports\BalitaExport;
use Illuminate\Support\Facades\DB;
use Excel;
use PDF;

class BalitaController extends Controller
{
   //Menampilkan View Index
    public function index()
    {
        $balita = Balita::orderBy('nama_balita','ASC')->simplePaginate(5);
        return view('balita.index', compact('balita'));
    }

    public function search(Request $request)
	{
		// menangkap data pencarian
		$keyword = $request->search;
		$balita = Balita::where('nama_balita', 'like', "%" . $keyword . "%")->paginate(5);
		
		return view('balita.index', compact('balita')) ->with('i', (request()->input('page', 1) -1) *5);
 
	}

    //Melakukan Eksekusi Penyimpanan Ke Database
    public function store(Request $request)
    {

        $request->validate([
            'nama_balita'=> 'required',
            'anak_ke'=> 'required',
            'tgl_lahir'=> 'required',
            'jenis_kelamin'=> 'required',
            'no_kk'=> 'required',
            'nik_balita'=> 'required',
            'bb_lahir',
            'tb_lahir'=> 'required',
            'kia'=> 'required',
            'imd'=> 'required',
            'nama_ortu'=> 'required',
            'nik_ortu'=> 'required',
            'no_hp'=> 'required',
            'alamat'=> 'required',
            'rt'=> 'required',
            'rw'=> 'required'
        ]);

        Balita::create($request->all());
        return redirect()->route('balita.index')->with('toast_success', 'Data Balita Berhasil Ditambahkan!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $balita = Balita::where('id', $id)->first();

        //mengambil value input radio jenis_kelamin
        $jenis_kelamin = $balita->jenis_kelamin;
        $output_jenis_kelamin = '';
        if ($jenis_kelamin === "Laki-Laki") {
            $output_jenis_kelamin .= '
                <div class="form-check form-check-inline">
                    <input class="form-check-input"type="radio" name="jenis_kelamin" value="Laki-Laki" id="e_jenis_kelamin_laki" checked>
                    <label class="form-check-label" for="e_jenis_kelamin_laki">Laki-Laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input"type="radio" name="jenis_kelamin" value="perempuan" id="e_jenis_kelamin_perempuan">
                    <label class="form-check-label" for="e_jenis_kelamin_perempuan">Perempuan</label>
                </div>
            ';
        } else if($jenis_kelamin === "Perempuan") {
            $output_jenis_kelamin .= '
                <div class="form-check form-check-inline">
                    <input class="form-check-input"type="radio" name="jenis_kelamin" value="Laki-Laki" id="e_jenis_kelamin_laki">
                    <label class="form-check-label" for="e_jenis_kelamin_laki">Laki-Laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input"type="radio" name="jenis_kelamin" value="Perempuan" id="e_jenis_kelamin_perempuan" checked>
                    <label class="form-check-label" for="e_jenis_kelamin_perempuan">Perempuan</label>
                </div>
            ';
        }

        //mengambil value input radio kia
        $kia = $balita->kia;
        $output_kia = '';
        if ($kia === "Ya") {
            $output_kia .= '
                <div class="form-check form-check-inline">
                    <input class="form-check-input"type="radio" name="kia" value="Ya" id="e_kia1" checked>
                    <label class="form-check-label" for="e_kia1">Ya</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input"type="radio" name="kia" value="Tidak" id="e_kia2">
                    <label class="form-check-label" for="e_kia2">Tidak</label>
                </div>
            ';
        } else if($kia === "Tidak") {
            $output_kia .= '
                <div class="form-check form-check-inline">
                    <input class="form-check-input"type="radio" name="kia" value="Ya" id="e_kia1">
                    <label class="form-check-label" for="e_kia1">Ya</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input"type="radio" name="kia" value="Tidak" id="e_kia2" checked>
                    <label class="form-check-label" for="e_kia2">Tidak</label>
                </div>
            ';
        }

        //mengambil value input radio imd
        $imd = $balita->imd;
        $output_imd = '';
        if ($imd === "Ya") {
            $output_imd .= '
                <div class="form-check form-check-inline">
                    <input class="form-check-input"type="radio" name="imd" value="Ya" id="e_imd1" checked>
                    <label class="form-check-label" for="e_imd1">Ya</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input"type="radio" name="imd" value="Tidak" id="e_imd2">
                    <label class="form-check-label" for="e_imd2">Tidak</label>
                </div>
            ';
        } else if($imd === "Tidak") {
            $output_imd .= '
                <div class="form-check form-check-inline">
                    <input class="form-check-input"type="radio" name="imd" value="Ya" id="e_imd1">
                    <label class="form-check-label" for="e_imd1">Ya</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input"type="radio" name="imd" value="Tidak" id="e_imd2" checked>
                    <label class="form-check-label" for="e_imd2">Tidak</label>
                </div>
            ';
        }

        return response()->json([
            'data' => $balita,
            'output_jenis_kelamin' => $output_jenis_kelamin,
            'output_kia' => $output_kia,
            'output_imd' => $output_imd,
        ]);

    }

    public function update(Request $request)
    {
        $validasi = $request->validate([
            'nama_balita'=> 'required',
            'anak_ke'=> 'required',
            'tgl_lahir'=> 'required',
            'jenis_kelamin'=> 'required',
            'no_kk'=> 'required',
            'nik_balita'=> 'required',
            'bb_lahir'=> 'required',
            'tb_lahir'=> 'required',
            'kia'=> 'required',
            'imd'=> 'required',
            'nama_ortu'=> 'required',
            'nik_ortu'=> 'required',
            'no_hp'=> 'required',
            'alamat'=> 'required',
            'rt'=> 'required',
            'rw'=> 'required'
        ]);
        Balita::where('id', $request->id)
            ->update($validasi);
        return redirect()->route ('balita.index')->with('toast_success', 'Data Balita Berhasil Diupdate!');
    }

    public function destroy($id)
    {
        Balita::destroy($id);
        return redirect('/balita')->with('success', 'Data Balita Berhasil Dihapus!');
    }

    public function exportpdf()
    {
        $balita = Balita::all();

        view()->share('balita', $balita);
        $pdf = PDF::loadview('balita.balita-pdf')->setPaper('a2','landscape');
        return $pdf->stream('balita.pdf');
    }

    public function exportIntoExcel()
    {
        return Excel::download(new BalitaExport, 'balitalist.xlsx');
    }

    public function exportIntoCSV()
    {
        return Excel::download(new BalitaExport, 'balitalist.csv');
    }
}