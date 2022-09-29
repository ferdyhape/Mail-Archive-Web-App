<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\surat;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;

class SuratController extends Controller
{
    public function index()
    {
        $surat = surat::all();
        return view('dashboard.index', compact('surat'));
    }

    public function create()
    {
        return view('dashboard.create', [
            'category' => category::all()
        ]);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'letter_number' => 'required|min:3|max:255',
            'title' => 'required|min:3|max:255',
            'category_id' => 'required|integer',
            'file' => 'required|mimes:pdf'
        ]);
        $validatedData['archive_time'] = Carbon::now();

        if ($validatedData['letter_number']) {
            $cek = str_contains($validatedData['letter_number'], '/');
            if ($cek == true) {
                $filename = str_replace("/", "-", $validatedData['letter_number']);
            }
        }
        $file = $request->file('file');
        $file->move(public_path('/storage/pdf-storage'), $filename . '.pdf');
        $validatedData['file'] = $filename . '.pdf';

        surat::create($validatedData);

        return redirect('/surat')->with('success', 'Data surat berhasil ditambahkan');
    }

    public function show(surat $surat)
    {
        return view('dashboard.show', [
            'surat' => $surat
        ]);
    }

    public function edit(surat $surat)
    {
        return view('dashboard.update', [
            'surat' => $surat,
            'category' => Category::all(),
        ]);
    }

    public function update(Request $request, surat $surat)
    {
        $rules = ([
            'letter_number' => 'required|min:3|max:255',
            'title' => 'required|min:3|max:255',
            'category_id' => 'required|integer',
        ]);

        $validatedData = $request->validate($rules);

        if ($request->input('old_letter_number') != $request->input('letter_number')) {
            $cek1 = str_contains($validatedData['letter_number'], '/');
            if ($cek1 == true) {
                $filename1 = str_replace("/", "-", $validatedData['letter_number']);
                $filename_old = str_replace("/", "-", request()->input('old_letter_number'));
            }
            rename(public_path('/storage/pdf-storage/' . $filename_old . '.pdf'), public_path('/storage/pdf-storage/' . $filename1 . '.pdf'));
            $newfilename = $filename1 . '.pdf';
            $validatedData['file'] = $newfilename;
        }
        $validatedData['archive_time'] = Carbon::now();


        if ($request->file('file')) {
            echo 'ada file baru';
            $cek2 = str_contains($validatedData['letter_number'], '/');
            if ($cek2 == true) {
                $filename = str_replace("/", "-", $validatedData['letter_number']);
            }
            $file = $request->file('file');
            $file->move(public_path('/storage/pdf-storage'), $filename . '.pdf');
            $validatedData['file'] = $filename . '.pdf';
        }

        surat::where('id', $surat->id)->update($validatedData);

        $request->session()->flash('success', 'Data surat berhasil diupdate');

        return redirect('/surat/' . $surat['id']);
    }


    public function destroy(surat $surat)
    {
        surat::destroy($surat->id);
        return redirect('/surat')->with('success', 'Data surat berhasil dihapus');
    }

    public function downloadPDF($id)
    {
        $surat = surat::where('id', $id)->first();
        $file = public_path() . "/storage/pdf-storage/" . $surat->file;

        $headers = array(
            'Content-Type: application/pdf',
        );

        return response()->download($file, $surat->file . "_" . $surat->title . '.pdf', $headers);
    }
}
