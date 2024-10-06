<?php

namespace App\Http\Controllers\Backsite;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;

class RoleController extends Controller
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
        $role = Role::orderBy('created_at', 'desc')->get();

        return view('pages.backsite.management-access.role.index', compact('role'));
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
    public function store(StoreRoleRequest $request)
    {
        $data = $request->all();

        $role = Role::create($data);

        alert()->success('Success Message', 'Berhasil menambahkan data prodi');
        return redirect()->route('backsite.role.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        // need more notes here
        $role->load('permission');

        return view('pages.backsite.management-access.role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        // need more notes here
        $permission = Permission::all();
        $role->load('permission');

        return view('pages.backsite.management-access.role.edit', compact('permission', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->all());
        $role->permission()->sync($request->input('permission', []));

        alert()->success('Success Message', 'Berhasil mengubah data role');
        return redirect()->route('backsite.role.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        // need more notes here
        $role->forceDelete();

        alert()->success('Success Message','Berhasil menghapus data role');
        return back();
    }
}
