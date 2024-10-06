<?php

namespace App\Http\Controllers\Backsite;

use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Prodi\StoreProdiRequest;
use App\Http\Requests\Prodi\UpdateProdiRequest;

class ProdiController extends Controller
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

        $prodi = Prodi::orderBy('created_at', 'desc')->get();

        // Menampilkan halaman index data prodi
        return view('pages.backsite.data-pendukung.prodi.index', compact('prodi'));
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
    public function store(StoreProdiRequest $request)
    {
        $data = $request->all();

        $prodi = Prodi::create($data);

        alert()->success('Success Message', 'Berhasil menambahkan data prodi');
        return redirect()->route('backsite.prodi.index');
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
    public function edit(Prodi $prodi)
    {
        return view('pages.backsite.data-pendukung.prodi.edit', compact('prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdiRequest $request, Prodi $prodi)
    {
        // get all request from frontsite
        $data = $request->all();

        // update to database
        $prodi->update($data);

        alert()->success('Success Message', 'Berhasil mengubah data prodi');
        return redirect()->route('backsite.prodi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodi $prodi)
    {
        $prodi->forceDelete();

        alert()->success('Success Message', 'Berhasil menghapus data prodi');
        return back();
    }
}
