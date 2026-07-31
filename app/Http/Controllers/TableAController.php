<?php

namespace App\Http\Controllers;

use App\Exports\TableA\TableAExport;
use App\Exports\TableA\TableATemplateExport;
use App\Http\Requests\TableA\StoreTableARequest;
use App\Http\Requests\TableA\UpdateTableARequest;
use App\Imports\TableA\TableAImport;
use App\Models\TableA;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TableAController extends Controller
{
    //
    public function index(){
        $tablea = TableA::all();
        return view('table_a.index',compact('tablea'));
    }
    public function create(){
        return view('table_a.create');
    }

    public function store(StoreTableARequest $request){
        TableA::create($request->validated());

        return redirect()->route('table_a.index')->with('success-create','Data created successfully');
    }

    public function edit($tableaId){
        $tablea = TableA::findOrFail($tableaId);
        return view('table_a.edit',compact('tablea'));
    }
    public function update(UpdateTableARequest $request,$tableaId){
        $tablea = TableA::findOrFail($tableaId);

        $tablea->update([
            'kode_toko_baru'=>$request->kode_toko_baru,
            'kode_toko_lama'=>$request->kode_toko_lama ?? null
        ]);

        return redirect()->route('table_a.index')->with('success-update','Data updated successfully');
    }
    public function destroy($tableaId){
        $tablea=TableA::findOrFail($tableaId);
        $tablea->delete();
        return redirect()->route('table_a.index')->with('success-delete','Deleted successfully');
    }

    public function export(){
        return Excel::download(new TableAExport, 'table_a.xlsx');
    }

    public function exportTemplate(){
        return Excel::download(new TableATemplateExport, 'table_a_template.xlsx');
    }

    public function import(Request $request){
        $request->validate([
            'file'=>'required|mimes:xlsx,xls'
        ]);
        try{
            Excel::import(
                new TableAImport,
                $request->file('file')
            );
            return back()->with('success-import',"Import berhasil");
        }catch (\Exception $e) {
            return back()->with('error-import',"Import gagal");
        }
    }

    public function exportPdf(){
        $data = TableA::all();
        $pdf = Pdf::loadView('table_a.pdf',compact('data'));
        return $pdf->download('table_a.pdf');
    }
}
