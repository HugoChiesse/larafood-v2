<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use TenantTrait;
    
    protected $fillable = ['title', 'flag', 'price', 'description', 'image', 'tenant_id'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function search($filter)
    {
        return $this->where('title', 'like', "%{$filter}%")
            ->orWhere('description', 'like', "%{$filter}%")
            ->latest()
            ->paginate();
    }

    public function categoriesAvailable($filter = null)
    {
        $categories = Category::whereNotIn('categories.id', function ($query) {
            $query->select('category_product.category_id')
                ->from('category_product')
                ->whereRaw("category_product.product_id={$this->id}");
        })
            ->where(function ($queryFilter) use ($filter) {
                $queryFilter->where('categories.name', 'like', "%{$filter}%");
            })
            ->orderBy('name')
            ->paginate();
        return $categories;
    }
}
