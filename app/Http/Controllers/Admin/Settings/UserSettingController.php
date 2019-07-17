<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Helpers\Helper;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserPasswordRequest;
use App\Models\System\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSettingController extends Controller
{
//    public function __construct()
//    {
////        $this->middleware('role:writer')->only('create');
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
//        $user = User::find(6);
//        dd($user->assignRole('editor'));
//        $users = User::role('writer')->orderBy('id', 'DESC')->get();
//        $users = User::permission('write post')->orderBy('id', 'DESC')->get();
        return view('admin.pages.settings.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('admin.pages.settings.user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $inputs = $request->except('_token', 'password_confirmation', 'photo','role_id');
        $inputs['name'] = $request->name;
        $inputs['email'] = $request->email;
        $inputs['password'] = bcrypt($request->password);
        $inputs['phone'] = $request->phone;
        $user = User::create($inputs);

        if ($request->hasFile('photo')) {
            $path = $user->path . "/" . $user->id;
            $photo = Helper::custom_upload_single_image($request->file('photo'), $path);
            $user->photo = $photo;
            $user->save();
        }

        $user->syncRoles($request->role_id);

        Helper::custom_session_flash('success', 'store');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $names['user_name'] = $user->name;
        $roles = Role::get();
        $role_ids = $user->roles()->pluck('id')->toArray();
        return view('admin.pages.settings.user.edit', compact('user', 'names','roles','role_ids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $inputs = $request->except('_token', '_method', 'user_id','photo','password_confirmation','role_id');
        $inputs['password'] = bcrypt($request->password);
        $inputs['name'] = $request->name;
        $inputs['email'] = $request->email;
        $inputs['phone'] = $request->phone;
        $user->update($inputs);

        if ($request->hasFile('photo')) {
            if (Helper::custom_check_empty($user->photo) !== false) {
                if (Helper::custom_delete_single_file($user->file) === false) {
                    Helper::custom_session_flash("error", "file_delete");
                    return redirect()->back();
                }
            }
            $path = $user->path . "/" . $user->id;
            $photo = Helper::custom_upload_single_image($request->file('photo'), $path);
            $user->photo = $photo;
            $user->save();
        }

        $user->syncRoles($request->role_id);

        Helper::custom_session_flash("success", "update");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if (Helper::custom_check_empty($user->photo) !== false) {
            if (Helper::custom_recursive_remove_directory($user->file_directory) === false) {
                Helper::custom_session_flash("error", "file_delete");
                return redirect()->back();
            }
        }
        $user->delete();
        Helper::custom_session_flash("success", "destroy");
        return redirect()->back();
    }

    public function password($user_id)
    {
        $user = User::findOrFail($user_id);
        $names['user_name'] = $user->name;
        return view('admin.pages.settings.user.password', compact('user', 'names'));

    }

    public function save_password(UpdateUserPasswordRequest $request, $user_id)
    {
        $user = User::find($user_id);
        $user->password = bcrypt($request->password);
        $user->save();
        Helper::custom_session_flash("success", "update");
        return redirect()->back();

    }
}
