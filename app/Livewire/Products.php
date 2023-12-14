<?php

namespace App\Livewire;

use Illuminate\support\Facades\Storage;
use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class Products extends Component
{
    use WithFileUploads;

    public $products;
    public $categories;
    public $name;
    public $description;
    public $price;
    public $image;
    public $category_id;
    public $editingProductId;

    public function render()
    {
        $this->products = Product::with('category')->get();
        $this->categories = Category::all();
        return view('livewire.products');
    }

    public function createProduct()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $uploadedImage = null;

        if ($this->image instanceof \Illuminate\Http\UploadedFile) {
            $uploadedImage = $this->image->store('images', 'public');
        }

        if ($this->editingProductId) {
            $product = Product::find($this->editingProductId);

            if ($uploadedImage) {
                $product->update(['image' => $uploadedImage]);
            }

            $product->update([
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price,
                'category_id' => $this->category_id,
            ]);

            $this->editingProductId = null;
        } else {
            Product::create([
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price,
                'image' => $uploadedImage,
                'category_id' => $this->category_id,
            ]);
        }

        $this->resetFields();
    }




    public function editProduct($productId)
    {
        $product = Product::find($productId);

        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->category_id = $product->category_id;
        $this->editingProductId = $productId;

        if ($product->image) {
            $this->image = asset('storage/' . $product->image);
        }
    }



    public function deleteProduct($productId)
    {
        Product::find($productId)->delete();
    }

    private function resetFields()
    {
        $this->name = '';
        $this->description = '';
        $this->price = '';
        $this->image = '';
        $this->category_id = null;
    }
}
