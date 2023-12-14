<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;

class Home extends Component
{
    public $products;
    public $categories;
    public $selectedCategory;
    public $selectedPriceRange = 'all';

    public function filterProducts()
    {
        $query = Product::with('category');

        if ($this->selectedCategory) {
            $query->whereHas('category', fn ($q) => $q->where('id', $this->selectedCategory));
        }

        $this->applyPriceRangeFilter($query);

        $this->products = $query->get();
    }

    protected function applyPriceRangeFilter($query)
    {
        if ($this->selectedPriceRange === 'low') {
            $query->orderBy('price', 'asc');
        } elseif ($this->selectedPriceRange === 'high') {
            $query->orderBy('price', 'desc');
        }
    }

    public function render()
    {
        $query = Product::with('category');

        if ($this->selectedCategory) {
            $query->whereHas('category', fn ($q) => $q->where('id', $this->selectedCategory));
        }

        $this->applyPriceRangeFilter($query);

        $this->products = $query->get();
        $this->categories = Category::all();

        return view('livewire.home');
    }
}
