<?php

namespace App\Http\Controllers;

use App\Exports\TableB\TableBExport;
use App\Exports\TableB\TableBTemplateExport;
use App\Http\Requests\TableB\StoreTableBRequest;
use App\Http\Requests\TableB\UpdateTableBRequest;
use App\Imports\TableB\TableBImport;
use App\Models\TableB;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class TableBController extends Controller
{
    //
    public function index(){
        $tableb = TableB::all();
        return view('table_b.index',compact('tableb'));
    }
    public function create(){
        return view('table_b.create');
    }

    public function store(StoreTableBRequest $request){
        TableB::create($request->validated());

        return redirect()->route('table_b.index')->with('success-create','Data created successfully');
    }

    public function edit($tablebId){
        $tableb = TableB::findOrFail($tablebId);
        return view('table_b.edit',compact('tableb'));
    }
    public function update(UpdateTableBRequest $request,$tablebId){
        $tableb = TableB::findOrFail($tablebId);

        $tableb->update($request->validated());

        return redirect()->route('table_b.index')->with('success-update','Data updated successfully');
    }
    public function destroy($tablebId){
        $tableb=TableB::findOrFail($tablebId);
        $tableb->delete();
        return redirect()->route('table_b.index')->with('success-delete','Deleted successfully');
    }

    public function export(){
        return Excel::download(new TableBExport, 'table_b.xlsx');
    }

    public function exportTemplate(){
        return Excel::download(new TableBTemplateExport, 'table_b_template.xlsx');
    }

    public function import(Request $request){
        $request->validate([
            'file'=>'required|mimes:xlsx,xls'
        ]);
        try{
            Excel::import(
                new TableBImport(),
                $request->file('file')
            );
            return back()->with('success-import',"Import berhasil");
        }catch (\Exception $e) {
            return back()->with('error-import',"Import gagal");
        }
    }

    public function exportPdf(){
        $data = TableB::all();
        $pdf = Pdf::loadView('table_b.pdf',compact('data'));
        return $pdf->download('table_b.pdf');
    }
}
