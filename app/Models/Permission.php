<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'description'];

    public function search($filter = null)
    {
        $results = $this
            ->where('name', 'like', "%{$filter}%")
            ->orWhere('description', 'like', "%{$filter}%")
            ->latest()
            ->paginate();

        return $results;
    }

    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
