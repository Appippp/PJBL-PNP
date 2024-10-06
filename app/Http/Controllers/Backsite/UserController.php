<?php

namespace App\Http\Controllers\Backsite;

use App\Models\Role;
use App\Models\User;
use App\Models\TypeUser;
use App\Models\DetailUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\StoreUserRequest;

class UserController extends Controller
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
        $user = User::orderBy('created_at', 'desc')->get();
        $type_user = TypeUser::orderBy('name', 'asc')->get();
        $roles = Role::all()->pluck('title', 'id');

        return view('pages.backsite.management-access.user.index', compact('user', 'roles', 'type_user'));
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
    public function store(StoreUserRequest $request)
    {
        // get all request from frontsite
        $data = $request->all();

        // hash password
        $data['password'] = Hash::make('123456');

        // store to database
        $user = User::create($data);

        // sync role by users select
        $user->role()->sync($request->input('role', []));

        // save to detail user , to set type user
        $detail_user = new DetailUser;
        $detail_user->user_id = $user['id'];
        $detail_user->type_user_id = $request['type_user_id'];
        $detail_user->save();

        alert()->success('Success Message', 'Successfully added new user');
        return redirect()->route('backsite.user.index');
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
    public function edit(string $id)
    {
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return abort(404);
    }
}
