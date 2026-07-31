<?php

namespace App\Http\Controllers;

use App\Exports\TableC\TableCExport;
use App\Exports\TableC\TableCTemplateExport;
use App\Http\Requests\TableC\StoreTableCRequest;
use App\Http\Requests\TableC\UpdateTableCRequest;
use App\Imports\TableC\TableCImport;
use App\Models\TableC;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TableCController extends Controller
{
    //
    public function index(){
        $tablec = TableC::all();
        return view('table_c.index',compact('tablec'));
    }
    public function create(){
        return view('table_c.create');
    }

    public function store(StoreTableCRequest $request){
        TableC::create($request->validated());

        return redirect()->route('table_c.index')->with('success-create','Data created successfully');
    }

    public function edit($tablecId){
        $tablec = TableC::findOrFail($tablecId);
        return view('table_c.edit',compact('tablec'));
    }
    public function update(UpdateTableCRequest $request,$tablecId){
        $tablec = TableC::findOrFail($tablecId);

        $tablec->update($request->validated());

        return redirect()->route('table_c.index')->with('success-update','Data updated successfully');
    }
    public function destroy($tablecId){
        $tablec=TableC::findOrFail($tablecId);
        $tablec->delete();
        return redirect()->route('table_c.index')->with('success-delete','Deleted successfully');
    }

    public function export(){
        return Excel::download(new TableCExport, 'table_c.xlsx');
    }

    public function exportTemplate(){
        return Excel::download(new TableCTemplateExport, 'table_c_template.xlsx');
    }

    public function import(Request $request){
        $request->validate([
            'file'=>'required|mimes:xlsx,xls'
        ]);
        try{
            Excel::import(
                new TableCImport,
                $request->file('file')
            );
            return back()->with('success-import',"Import berhasil");
        }catch (\Exception $e) {
            return back()->with('error-import',"Import gagal");
        }
    }

    public function exportPdf(){
        $data = TableC::all();
        $pdf = Pdf::loadView('table_c.pdf',compact('data'));
        return $pdf->download('table_c.pdf');
    }
}
