<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class Categories extends Component
{
    use WithFileUploads;

    public $categories;
    public $name;
    public $image;
    public $parentCategory;
    public $editingCategoryId;

    public function render()
    {
        $this->categories = Category::all();
        return view('livewire.categories');
    }

    public function createCategory()
    {
        $this->validate([
            'name' => 'required',
        ]);

        $uploadedImage = null;

        if ($this->image instanceof \Illuminate\Http\UploadedFile) {
            $uploadedImage = $this->image->store('images', 'public');
        }

        if (!$this->canHaveChildren()) {
            $this->addError('parentCategory', 'A category cannot have both subcategories and products simultaneously.');
            return;
        }

        if ($this->editingCategoryId) {
            $category = Category::find($this->editingCategoryId);

            if ($uploadedImage) {
                $category->update(['image' => $uploadedImage]);
            }

            $category->update([
                'name' => $this->name,
                'parent_id' => $this->parentCategory,
            ]);

            $this->editingCategoryId = null;
        } else {
            Category::create([
                'name' => $this->name,
                'image' => $uploadedImage,
                'parent_id' => $this->parentCategory,
            ]);
        }

        $this->resetFields();
    }

    public function editCategory($categoryId)
    {
        $category = Category::find($categoryId);

        $this->name = $category->name;
        $this->parentCategory = $category->parent_id;
        $this->editingCategoryId = $categoryId;

        if ($category->image) {
            $this->image = asset('storage/' . $category->image);
        }
    }

    public function deleteCategory($categoryId)
    {
        Category::find($categoryId)->delete();
    }

    private function resetFields()
    {
        $this->name = '';
        $this->image = '';
        $this->parentCategory = null;
        $this->editingCategoryId = null;
    }


    private function canHaveChildren()
    {
        $category = Category::find($this->parentCategory);

        return $category ? !$category->canHaveChildren() : true;
    }
}
