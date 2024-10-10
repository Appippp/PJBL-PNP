<?php

namespace App\Http\Controllers\Backsite;

use App\Models\Mitra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mitra\StoreMitraRequest;
use App\Http\Requests\Mitra\UpdateMitraRequest;

class MitraController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mitra = Mitra::orderBy('nama_mitra', 'asc')->get();

        // Load the data from the database
        return view('pages.backsite.data-pendukung.mitra.index', compact('mitra'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMitraRequest $request)
    {
        $data = $request->all();

        $mitra = Mitra::create($data);

        alert()->success('Sukses', 'Berhasil menambahkan data mitra');
        return redirect()->route('backsite.mitra.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mitra $mitra)
    {
        return view('pages.backsite.data-pendukung.mitra.edit', compact('mitra'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMitraRequest $request, Mitra $mitra)
    {
        $data = $request->all();

        $mitra->update($data);

        alert()->success('Sukses', 'Berhasil mengubah data mitra');
        return redirect()->route('backsite.mitra.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mitra $mitra)
    {
        $mitra->forceDelete();

        alert()->success('Sukses', 'Berhasil menghapus data mitra');
        return redirect()->route('backsite.mitra.index');
    }
}
