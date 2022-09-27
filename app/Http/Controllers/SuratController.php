<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\surat;
use Carbon\Carbon;

class SuratController extends Controller
{
    public function index()
    {
        $surat = surat::all();

        // mengirim data ke view index
        return view('dashboard.index', [
            'surat' => surat::all(),
        ]);
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
        ]);
        $validatedData['archive_time'] = Carbon::now();

        // if ($request->file('gambar')) {
        //     $nama_gambar = $request->file('gambar')->store('product-images');
        // }

        // $validatedData['gambar'] = $nama_gambar;

        // dd($validatedData);
        surat::create($validatedData);

        // $request->session()->flash('success', 'Data surat berhasil ditambahkan');

        return redirect('/surat')->with('success', 'Data surat berhasil ditambahkan');
    }

    public function show(surat $surat)
    {
        // return view('dashboard.surat.detail-surat');
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
            'letter_number' => 'required|integer',
            'title' => 'required|min:3|max:255',
            'category_id' => 'required|integer',
        ]);

        $validatedData = $request->validate($rules);
        $validatedData['archive_time'] = Carbon::now();

        // if ($request->file('gambar')) {
        //     if ($request->gambarLama) {
        //         Storage::delete($request->gambarLama);
        //     }
        //     $nama_gambar = $request->file('gambar')->store('product-images');
        // }
        // $validatedData['gambar'] = $nama_gambar;

        surat::where('id', $surat->id)->update($validatedData);

        $request->session()->flash('success', 'Data surat berhasil diupdate');

        return redirect('/surat');
    }


    public function destroy(surat $surat)
    {
        surat::destroy($surat->id);
        return redirect('/surat')->with('success', 'Data surat berhasil dihapus');
    }
}
