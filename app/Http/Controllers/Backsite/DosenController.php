<?php

namespace App\Http\Controllers\Backsite;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dosen\StoreDosenRequest;
use App\Http\Requests\Dosen\UpdateDosenRequest;

class DosenController extends Controller
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
        $dosen = Dosen::orderBy('created_at', 'desc')->get();

        $prodi = Prodi::orderBy('nama_prodi', 'asc')->get();
        $user = User::whereHas('detail_user', function ($query) {
            $query->where('type_user_id', 3);
        })->get();

        return view('pages.backsite.data-pendukung.dosen.index', compact('dosen', 'user', 'prodi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::orderBy('nama_prodi', 'asc')->get();
        $user = User::whereHas('detail_user', function ($query) {
            $query->where('type_user_id', 3);
        })->get();

        return view('pages.backsite.data-pendukung.dosen.create', compact('user', 'prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDosenRequest $request)
    {
        $data = $request->all();

        $dosen = Dosen::create($data);

        alert()->success('Sukses', 'Berhasil menambah data dosen');
        return redirect()->route('backsite.dosen.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dosen $dosen)
    {
        $prodi = Prodi::orderBy('nama_prodi', 'asc')->get();
        $user = User::whereHas('detail_user', function ($query) {
            $query->where('type_user_id', 3);
        })->get();

        return view('pages.backsite.data-pendukung.dosen.edit', compact('dosen', 'user', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDosenRequest $request, Dosen $dosen)
    {
        $data = $request->all();

        $dosen->update($data);

        alert()->success('Sukses', 'Berhasil mengubah data dosen');
        return redirect()->route('backsite.dosen.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dosen $dosen)
    {
        $dosen->forceDelete();

        alert()->success('Sukses', 'Berhasil menghapus data dosen');
        return back();
    }
}
