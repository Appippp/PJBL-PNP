<?php

namespace App\Http\Controllers\Backsite;

use App\Models\User;
use App\Models\Prodi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mahasiswa\StoreMahasiswaRequest;
use App\Http\Requests\Mahasiswa\UpdateMahasiswaRequest;

class MahasiswaController extends Controller
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
        // Load the data from the database
        $mahasiswa = Mahasiswa::orderBy('created_at', 'asc')->get();

        //menampilkan data dari a-z
        $prodi = Prodi::orderBy('nama_prodi', 'asc')->get();

        //menampilkan data type user yang user id 2 berupa mahasiswa
        $user = User::whereHas('detail_user', function ($query) {
            $query->where('type_user_id', 2);
        })->get();



        // Pass the data to the view for rendering
        return view('pages.backsite.data-pendukung.mahasiswa.index', compact('mahasiswa', 'user', 'prodi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //menampilkan data dari a-z
        $prodi = Prodi::orderBy('nama_prodi', 'asc')->get();

        //menampilkan data type user yang user id 2 berupa mahasiswa
        $user = User::whereHas('detail_user', function ($query) {
            $query->where('type_user_id', 2);
        })->get();

        return view('pages.backsite.data-pendukung.mahasiswa.create', compact('prodi', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMahasiswaRequest $request)
    {
        $data = $request->all();


        $mahasiswa = Mahasiswa::create($data);

        alert()->success('Sukses', 'Berhasil menambahkan data mahasiswa');
        return redirect()->route('backsite.mahasiswa.index');
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
    public function edit(Mahasiswa $mahasiswa)
    {
        //menampilkan data dari a-z
        $prodi = Prodi::orderBy('nama_prodi', 'asc')->get();

        //menampilkan data type user yang user id 2 berupa mahasiswa
        $user = User::whereHas('detail_user', function ($query) {
            $query->where('type_user_id', 2);
        })->get();

        return view('pages.backsite.data-pendukung.mahasiswa.edit', compact('mahasiswa', 'user', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa)
    {
        $data = $request->all();

        $mahasiswa->update($data);

        alert()->success('Sukses', 'Berhasil mengubah data mahasiswa');
        return redirect()->route('backsite.mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->forceDelete();

        alert()->success('Sukses', 'Berhasil menghapus data mahasiswa');
        return back();
    }
}
