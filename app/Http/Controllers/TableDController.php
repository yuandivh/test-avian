<?php

namespace App\Http\Controllers;

use App\Exports\TableD\TableDExport;
use App\Exports\TableD\TableDTemplateExport;
use App\Http\Requests\TableD\StoreTableDRequest;
use App\Http\Requests\TableD\UpdateTableDRequest;
use App\Imports\TableD\TableDImport;
use App\Models\TableD;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TableDController extends Controller
{
    public function index(){
        $tabled = TableD::all();
        return view('table_d.index',compact('tabled'));
    }
    public function create(){
        return view('table_d.create');
    }

    public function store(StoreTableDRequest $request){
        TableD::create($request->validated());

        return redirect()->route('table_d.index')->with('success-create','Data created successfully');
    }

    public function edit($tabledId){
        $tabled = TableD::findOrFail($tabledId);
        return view('table_d.edit',compact('tabled'));
    }
    public function update(UpdateTableDRequest $request,$tabledId){
        $tabled = TableD::findOrFail($tabledId);

        $tabled->update($request->validated());

        return redirect()->route('table_d.index')->with('success-update','Data updated successfully');
    }
    public function destroy($tabledId){
        $tabled=TableD::findOrFail($tabledId);
        $tabled->delete();
        return redirect()->route('table_d.index')->with('success-delete','Deleted successfully');
    }

    public function export(){
        return Excel::download(new TableDExport, 'table_d.xlsx');
    }

    public function exportTemplate(){
        return Excel::download(new TableDTemplateExport, 'table_d_template.xlsx');
    }

    public function import(Request $request){
        $request->validate([
            'file'=>'required|mimes:xlsx,xls'
        ]);
        try{
            Excel::import(
                new TableDImport,
                $request->file('file')
            );
            return back()->with('success-import',"Import berhasil");
        }catch (\Exception $e) {
            return back()->with('error-import',"Import gagal");
        }
    }

    public function exportPdf(){
        $data = TableD::all();
        $pdf = Pdf::loadView('table_d.pdf',compact('data'));
        return $pdf->download('table_d.pdf');
    }
}
