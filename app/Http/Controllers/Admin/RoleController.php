<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
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
        $roles = Role::all(); //Get all roles

        return view('admin.roles.index')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all(); //Get all permissions

        return view('admin.roles.create', ['permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\RoleRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $name = $request['name'];
        $roles = new Role();

        $check = Role::where('name', $name)->get(); //Verifier si le role existe déjà

        if (count($check) > 0) {

            return back()->with('error', trans('success.rolealre'));
        } else {

            $roles->name = $name;
            $permissions = $request['permissions'];

            $roles->save(); //insert in database

            //Looping thru selected permissions
            foreach ($permissions as $permission) {

                $p = Permission::where('id', '=', $permission)->firstOrFail();
                //Fetch the newly created role and assign permission
                $roles = Role::where('name', '=', $name)->first();
                $roles->givePermissionTo($p);
            }
        }

        return redirect()->route('admin.roles.index')->with('success', trans('success.roleadd'));
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
        $roles = Role::find($id);
        $data = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();

        return view('admin.roles.show', compact('roles', 'data'));
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
        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\RoleRequest $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        $roles = Role::findOrFail($id);
        $input = $request->except(['permissions']);
        $permissions = $request['permissions'];
        $roles->fill($input)->save();

        $p_all = Permission::all(); //Get all permissions

        foreach ($p_all as $p) {

            $roles->revokePermissionTo($p_all); //Remove all permissions associated with role
        }

        foreach ($permissions as $permission) {

            $p = Permission::where('id', '=', $permission)->firstOrFail(); //Get corresponding form permission in db
            $roles->givePermissionTo($p); //Assign permission to role
        }

        return redirect()->route('admin.roles.index')->with('success', trans('success.roleupdate'));
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
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('admin.roles.index')->with('success', trans('success.roledel'));
    }
}
