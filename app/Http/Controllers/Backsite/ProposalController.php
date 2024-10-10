<?php

namespace App\Http\Controllers\Backsite;

use App\Models\Mitra;
use App\Models\Kelompok;
use App\Models\Proposal;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\AnggotaKelompok;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Proposal\StoreProposalRequest;
use App\Models\DetailUser;
use Illuminate\Support\Facades\Auth; // Tambahkan baris ini
use File;
use Illuminate\Support\Facades\Redis;

class ProposalController extends Controller
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
        $detail_proposal = DetailProposal::orderBy('id', 'desc')->get();

        return view('pages.backsite.identitas-pengusul.index', compact('detail_proposal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();

        $mahasiswa = $user->mahasiswa;

        return view('pages.backsite.identitas-pengusul.create', compact('mahasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProposalRequest $request)
    {
        $data = $request->all();

        // upload process here
        $path = public_path('app/public/assets/file-proposal');
        if (!File::isDirectory($path)) {
            $response = Storage::makeDirectory('public/assets/file-proposal');
        }

        // change file locations
        if (isset($data['file_proposal'])) {
            $data['file_proposal'] = $request->file('file_proposal')->store(
                'assets/file-proposal',
                'public'
            );
        } else {
            $data['file_proposal'] = "";
        }

        $proposal = Proposal::create($data);

        // Setelah sukses menyimpan data, set flash message
        session()->flash('success', 'Data usulan berhasil disimpan.');
        return redirect()->route('backsite.proposal.index');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
