<?php

namespace App\Http\Controllers\Admin;

use App\Models\KabKota;
use App\Models\Provinsi;
use App\Models\BiayaKirim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class BiayaController extends Controller
{
    public function index()
    {
        $biayaKirim = BiayaKirim::select('biaya_kirims.id as biaya_id', 'biaya_kirims.biaya', 'provinsis.nama_provinsi', 'kab_kotas.nama_kabkota')
    ->join('provinsis', 'biaya_kirims.provinsi', '=', 'provinsis.id')
    ->join('kab_kotas', 'biaya_kirims.kabkota', '=', 'kab_kotas.id')
    ->orderBy('biaya_kirims.id', 'DESC')
    ->get();
    // dd($biayaKirim);

        return view('admin.biayakirim.biaya_pengiriman', compact('biayaKirim'));
    }

    public function create()
    {
        $provinsiData = Provinsi::orderBy('nama_provinsi', 'ASC')->get();
        $kabkotaData = KabKota::orderBy('nama_kabkota', 'ASC')->get();

        return view('admin.biayakirim.create', compact('provinsiData', 'kabkotaData'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'provinsi' => 'required',
            'kabkota' => 'required',
            'biaya' => 'required|numeric',
        ]);

        $provinsi = $request->input('provinsi');
        $kabkota = $request->input('kabkota');
        $biaya = $request->input('biaya');

        $biayaKirim = new BiayaKirim();
        $biayaKirim->provinsi = $provinsi;
        $biayaKirim->kabkota = $kabkota;
        $biayaKirim->biaya = $biaya;
        $biayaKirim->save();

        return redirect()->route('admin.biaya.index')->with('success', 'Biaya pengiriman berhasil disimpan.');
    }

    public function edit($id)
    {
        // Fetch data from database to populate the dropdowns
        $data = BiayaKirim::with(['provinsis', 'kabKota'])->find($id);
        $provinsiList = Provinsi::orderBy('nama_provinsi', 'ASC')->get();
        $kabkotaList = Kabkota::orderBy('nama_kabkota', 'ASC')->get();

        return view('admin.biayakirim.edit', compact('data','provinsiList','kabkotaList'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'provinsi' => 'required|string',
                'kabkota' => 'required|string',
                'biaya' => 'required|numeric',
            ]);
            
            $provinsi = $request->input('provinsi');
            $kabkota = $request->input('kabkota');
            $biaya = $request->input('biaya');

            // Update data in the database
            DB::table('biaya_kirims')
                ->where('id', $id)
                ->update([
                    'provinsi' => $provinsi,
                    'kabkota' => $kabkota,
                    'biaya' => $biaya,
                ]);

            // Redirect with success message
            return redirect()->route('admin.biaya.index')->with('success', 'Data successfully updated.');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while updating data: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            // Find the record in the database
            $biaya = DB::table('biaya_kirims')->where('id', $id)->first();

            // Check if the record exists
            if ($biaya) {
                // Delete the record from the database
                DB::table('biaya_kirims')->where('id', $id)->delete();
                return redirect()->route('admin.biaya.index')->with('success', 'Data successfully deleted.');
            } else {
                return back()->with('error', 'Data not found.');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while deleting data: ' . $e->getMessage());
        }
    }
}
