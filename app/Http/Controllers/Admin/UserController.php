<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Admin;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Admin::all(); //Get all users and pass it to the view

        return view('admin.admins.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all(); //Get all roles and pass it to the view

        return view('admin.admins.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\StoreUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        if ($request->hasfile('profile_picture')) {

            $fileUrl = $request->file('profile_picture');
            $fileNameToStore = uniqid() . '_' . time() . '.' . $fileUrl->getClientOriginalExtension();
            $destinationPath = public_path('/profil');
            $fileUrl->move($destinationPath, $fileNameToStore); //Ajouter photo

        }

        $user = new Admin();
        $user->last_name = $request->input('last_name');
        $user->first_name = $request->input('first_name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        if ($request->hasFile('profile_picture')) {
            $user->profile_picture = $fileNameToStore; //Ajouter photo
        }

        $user->phone_number = $request->input('phone_number');
        $user->address = $request->input('address');

        $roles = $request['roles']; //Retrieving the roles field

        if (isset($roles)) { //Checking if a role was selected

            foreach ($roles as $role) {

                $role_r = Role::where('id', '=', $role)->firstOrFail();
                $user->assignRole($role_r); //Assigning role to user
            }
        }

        $checkEmail = Admin::where('email', $user->email)->get(); //Verifier si prestataire existe déjà
        $checkphone = Admin::where('phone_number', $user->phone_number)->get(); //Verifier s

        if (count($checkEmail) > 0) {

            return back()->with('error', trans('success.emailalre'));
        } elseif (count($checkphone) > 0) {

            return back()->with('error', trans(' success.phonealre'));
        } else {

            $user->save();

            return redirect()->route('admin.admins.index')->with('success', trans('success.adminadd'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('admins');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Admin::findOrFail($id); //Get user with specified id
        $roles = Role::all();

        return view('admin.admins.edit', compact('user', 'roles')); //pass user and roles data to view
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\UpdateUserRequest $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        if ($request->hasfile('profile_picture')) {

            $fileUrl = $request->file('profile_picture');
            $fileNameToStore = uniqid() . '_' . time() . '.' . $fileUrl->getClientOriginalExtension();
            $destinationPath = public_path('/profil');
            $fileUrl->move($destinationPath, $fileNameToStore); //
        }

        $user = Admin::findOrFail($id); //Get role specified by id
        $user->last_name = $request->input('last_name');
        $user->first_name = $request->input('first_name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        if ($request->hasFile('profile_picture')) {
            $user->profile_picture = $fileNameToStore; //Ajouter photo
        }

        if ($request->input('phone_number')) {
            $user->phone_number = $request->input('phone_number');
        }

        $user->address = $request->input('address');

        $roles = $request['roles']; //Retreive all roles

        if (isset($roles)) {
            $user->roles()->sync($roles); //If one or more role is selected associate user to roles
        } else {
            $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
        }

        $checkEmail = Admin::where('email', $user->email)->get(); //Verifier si prestataire existe déjà
        $checkphone = Admin::where('phone_number', $user->phone_number)->get(); //Verifier s

        if (count($checkEmail) > 1) {

            return back()->with('error', trans('success.emailalre'));
        } elseif (count($checkphone) > 1) {

            return back()->with('error', trans(' success.phonealre'));
        } else {

            $user->save();

            return redirect()->route('admin.admins.index')->with('success', trans('success.adminupd'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Admin::findOrFail($id); //Find a user with a given id and delete
        $user->delete();

        return redirect()->route('admin.admins.index')->with('success', trans('success.admindelte'));
    }
}
