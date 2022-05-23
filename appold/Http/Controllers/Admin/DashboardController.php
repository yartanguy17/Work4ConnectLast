<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Offer;
use App\Models\Contrat;
use App\Models\User;
use App\Models\DemandeAbsence;
use Illuminate\Support\Facades\Hash;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $clients = User::where('type_users', 'client')->count();
        $prestataires = User::where('type_users', 'prestataire')->count();
        $offres = Offer::all()->count();
        $contrats = Contrat::all()->count();

        return view('admin.dashboard', compact('clients', 'prestataires', 'offres', 'contrats'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        $admin = Admin::where('id', auth('admin')->user()->id)->first();

        return view('admin.profile_setting', compact('admin'));
    }


    public function updatePassword(Request $request)
    {
        //Validate password fields
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);

        $admin = Admin::findOrFail(auth('admin')->user()->id);
        $user = User::findOrFail($admin->user_id); //Get user specified by id

        if ((Hash::check(request('old_password'), Auth('admin')->user()->password)) == false) {

            return back()->with('error', trans('success.passwordold'));
        } elseif ((Hash::check(request('new_password'), Auth('admin')->user()->password)) == true) {

            return back()->with('error', trans('success.passwordsimil'));
        } else {
            $user->password = $request->input('new_password');
            $admin->password = $request->input('new_password');

            $admin->save();
            $user->save();

            return back()->with('success', trans('success.passwordupd'));
        }
    }

    public function updateSetting(Request $request, $id)
    {
        $admin = Admin::findOrFail($id); //Get admin with specified id

        $user = User::findOrFail($admin->user_id);

        //Validate name, email and password fields
        $this->validate($request, [
            'name' => 'required|max:120',
            'firstname' => 'required|max:120',
            'email' => 'required|email|unique:users,email,' . $admin->user_id,
            'phone_number' => 'required',
            'address' => 'nullable',
            'profile_picture' => 'image|nullable',
        ]);

        if ($request->hasfile('profile_picture')) {
            $fileUrl = $request->file('profile_picture');
            $fileNameToStore = uniqid() . '_' . time() . '.' . $fileUrl->getClientOriginalExtension();
            $destinationPath = public_path('/profil');
            $fileUrl->move($destinationPath, $fileNameToStore); //Ajouter photo
        } else {
            $fileNameToStore = 'avatar.jpg';
        }

        $user->name = $request->input('name');
        $user->firstname = $request->input('firstname');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->address = $request->input('address');
        if ($request->hasfile('profile_picture')) {
            $user->profile_picture = $fileNameToStore;
        }

        $admin->name = $request->input('name');
        $admin->firstname = $request->input('firstname');
        $admin->email = $request->input('email');

        if ($request->hasfile('profile_picture')) {
            $admin->profile_picture = $fileNameToStore;
        }

        $admin->phone_number = $request->input('phone_number');
        $admin->address = $request->input('address');

        $admin->save();
        $user->save();

        return back()->with('success', trans('success.profileupd'));
    }
}
