<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'description'];

    public function search($filter = null)
    {
        return $this->where('name', 'like', "%{$filter}%")
            ->orWhere('description', 'like', "%{$filter}%")
            ->latest()
            ->paginate();
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function plans()
    {
        return $this->belongsToMany(Plan::class);
    }

    public function permissionsAvailable($filter = null)
    {
        $permissions = Permission::whereNotIn('permissions.id', function ($query) {
            $query->select('permission_profile.permission_id');
            $query->from('permission_profile');
            $query->whereRaw("permission_profile.profile_id={$this->id}");
        })
            ->where(function ($queryFilter) use ($filter) {
                if ($filter) {
                    $queryFilter->where('permissions.name', 'like', "%{$filter}%");
                }
            })
            ->orderBy('name')
            ->paginate();
        return $permissions;
    }

    public function plansAvailable($filter = null)
    {
        $plans = Plan::whereNotIn('plans.id', function ($query) {
            $query->select('plan_profile.plan_id')
                ->from('plan_profile')
                ->whereRaw("plan_profile.profile_id={$this->id}");
        })
            ->where(function ($queryFilter) use ($filter) {
                $queryFilter->where('plans.name', 'like', "%{$filter}%");
            })
            ->orderBy('name')
            ->paginate();
        return $plans;
    }
}
