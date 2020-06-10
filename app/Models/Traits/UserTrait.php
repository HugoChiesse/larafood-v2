<?php

namespace App\Models\Traits;

use App\Models\Tenant;

trait UserTrait
{
    public function  permissions():array
    {
        $permissionsPlan = $this->permissionsPlan();
        $permissionsRole = $this->permissionsRole();

        $permissions = [];

        foreach ($permissionsRole as $key => $permission) {
            if (in_array($permission, $permissionsPlan)) {
                array_push($permissions, $permission);
            }
        }
        return $permissions;
    }

    public function permissionsPlan():array
    {
        $tenant = Tenant::with('plan.profiles.permissions')->where('id', $this->tenant_id)->first();
        $plan = $tenant->plan;
        $permissions = [];
        foreach ($plan->profiles as $key => $profile) {
            foreach ($profile->permissions as $key => $permission) {
                array_push($permissions, $permission->name);
            }
        }
        return $permissions;
    }

    public function permissionsRole():array
    {
        $roles = $this->roles()->with('permissions')->get();
        $permissions = [];
        foreach ($roles as $key => $role) {
            foreach ($role->permissions as $key => $permission) {
                array_push($permissions, $permission->name);
            }
        }
        return $permissions;
    }
    // public function permissions()
    // {
    //     $tenant = $this->tenant()->first();
    //     $plan = $tenant->plan;
    //     $permissions = [];
    //     foreach ($plan->profiles as $key => $profile) {
    //         foreach ($profile->permissions as $permission) {
    //             array_push($permissions, $permission->name);
    //         }
    //     }
    //     return $permissions;
    // }

    public function hasPermission(string $permissionName): bool
    {
        return in_array($permissionName, $this->permissions());
    }

    public function isAdmin(): bool
    {
        return in_array($this->email, config('acl.admins'));
    }

    public function isTenant(): bool // para saber se o usuário é admin ou não... [opcional]
    {
        return !in_array($this->email, config('acl.admins'));
    }
}
