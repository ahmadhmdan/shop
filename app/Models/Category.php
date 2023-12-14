<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'parent_id'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function scopeWithoutProducts($query)
    {
        return $query->whereDoesntHave('products');
    }

    public function scopeWithoutSubcategories($query)
    {
        return $query->whereDoesntHave('children');
    }

    public function canHaveChildren()
    {
        return !$this->products->isEmpty() && !$this->children->isEmpty();
    }
}
