<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Profile;
use Illuminate\Http\Request;

class PermissionProfileController extends Controller
{
    protected $profile, $permission;

    public function __construct(Profile $profile, Permission $permission)
    {
        $this->profile = $profile;
        $this->permission = $permission;
    }

    public function permissions($idProfile)
    {
        $profile = $this->profile->find($idProfile);
        if (!$profile) {
            return redirect()->back();
        }
        $permissions = $profile->permissions()->orderBy('name')->paginate();
        return view('admin.pages.profiles.permissions.permissions', compact('profile', 'permissions'));
    }

    public function create(Request $request, $idProfile)
    {
        $profile = $this->profile->find($idProfile);
        if (!$profile) {
            return redirect()->back();
        }
        $filters = $request->except('_token');
        $permissions = $profile->permissionsAvailable($request->filter);
        return view('admin.pages.profiles.permissions.create', compact('profile', 'permissions', 'filters'));
    }

    public function store(Request $request, $idProfile)
    {
        $profile = $this->profile->find($idProfile);
        if (!$profile) {
            return redirect()->back();
        }
        if (!$request->permissions || count($request->permissions) == 0) {
            return redirect()->back()->with('info', 'É necessário escolher pelo menos uma permissão!');
        }
        $profile->permissions()->attach($request->permissions);
        return redirect()->route('profiles.permissions', $profile);
    }

    public function delete($idProfile, $idPermission)
    {
        $profile = $this->profile->find($idProfile);
        $permission = $this->permission->find($idPermission);
        if (!$profile || !$permission) {
            return redirect()->back();
        }
        $profile->permissions()->detach($permission);
        return redirect()->back();
    }

    public function profiles($idPermission)
    {
        $permission = $this->permission->find($idPermission);
        if (!$permission) {
            return redirect()->back();
        }
        $profiles = $permission->profiles()->orderBy('name')->paginate();
        return view('admin.pages.permissions.profiles.profiles', compact('permission', 'profiles'));
    }
    
}
