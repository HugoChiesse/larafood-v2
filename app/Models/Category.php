<?php

namespace App\Models;

use App\Tenant\Observers\TenantObserver;
use Illuminate\Database\Eloquent\Model;
use App\Tenant\Traits\TenantTrait;

class Category extends Model
{
    use TenantTrait;

    protected $fillable = ['tenant_id', 'name', 'url', 'description'];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function search($filter)
    {
        return $this->where('name', 'like', "%{$filter}%")
            ->orWhere('description', 'like', "%{$filter}%")
            ->latest()
            ->paginate();
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
