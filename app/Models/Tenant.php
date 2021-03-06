<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = [
        'plan_id', 'cnpj', 'name', 'url', 'email', 'logo', 'active', 'subscription', 'expires_at', 'subscription_id', 'subscription_active', 'subscription_suspended'
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function search($filter)
    {
        return $this->where('name', 'like', "%{$filter}%")
            ->latest()
            ->paginate();
    }
}
