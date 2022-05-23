<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
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
        $permissions = Permission::all(); //Get all permissions

        return view('admin.permissions.index')->with('permissions', $permissions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\PermissionRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        $permission = new Permission();
        $permission->name = $request->input('name');

        $check = Permission::where('name', $permission->name)->get(); //Verifier si permission existe deja

        if (count($check) > 0) {

            return back()->with('error', trans('success.permisalre'));
        } else {

            $permission->save();

            return redirect()->route('admin.permissions.index')->with('success', trans('success.permissadd'));
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
        return redirect('admin.permissions');
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
        $permission = Permission::findOrFail($id);

        return view('admin.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\PermissionRequest $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $permission->name = $request->input('name');

        $check = Permission::where('name', $permission->name)->get(); //Verifier si permission existe deja

        if (count($check) > 1) {

            return back()->with('error', trans('success.permisalre'));
        } else {

            $permission->save(); //insert in database

            return redirect()->route('admin.permissions.index')->with('success', trans('success.permiupda'));
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
        $permission = Permission::findOrFail($id);

        if ($permission->name == 'Roles Administration & Permissions') { //Make it impossible to delete this specific permission

            return redirect()->route('permissions.index')->with('error', trans('success.permisdel'));
        }

        $permission->delete();

        return redirect()->route('admin.permissions.index')->with('success', trans('success.permissde'));
    }
}
