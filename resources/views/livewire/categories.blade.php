<main>

    <nav class="navbar sidebar navbar-expand-xl navbar-dark bg-dark">

        <!-- Navbar brand for xl START -->
        <div class="d-flex align-items-center">
            <a class="navbar-brand" href="index.html">
                <img class="navbar-brand-item" src="assets/images/logo-light.svg" alt="">
            </a>
        </div>
        <!-- Navbar brand for xl END -->

        <div class="offcanvas offcanvas-start flex-row custom-scrollbar h-100" data-bs-backdrop="true" tabindex="-1" id="offcanvasSidebar">
            <div class="offcanvas-body sidebar-content d-flex flex-column bg-dark">

                <!-- Sidebar menu START -->
                <ul class="navbar-nav flex-column" id="navbar-sidebar">

                    <!-- Menu item 1 -->
                    <li class="nav-item"><a href="{{route('dashboard')}}" class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}"><i class="bi bi-house fa-fw me-2"></i>Dashboard</a></li>

                    <!-- Title -->
                    <li class="nav-item ms-2 my-2">Pages</li>


                    <!-- Menu item 2 -->
                    <li class="nav-item"> <a class="nav-link {{ request()->is('categories*') ? 'active' : '' }}" href="{{route('categories')}}"><i class="fas fa-tags fa-fw me-2"></i>Categories</a></li>
                    <!-- Menu item 3 -->
                    <li class="nav-item"> <a class="nav-link {{ request()->is('products*') ? 'active' : '' }}" href="{{route('products')}}"><i class="fas fa-box-open fa-fw me-2"></i>Products</a></li>
                    <!-- Menu item 4 -->
                    <li class="nav-item"> <a class="nav-link {{ request()->is('add-admin*') ? 'active' : '' }}" href="{{route('add-admin')}}"><i class="fas fa-user-plus fa-fw me-2"></i>Add Admin</a></li>

                </ul>
                <!-- Sidebar menu end -->

                <!-- Sidebar footer START -->
                <div class="px-3 mt-auto pt-3">
                    <div class="d-flex align-items-center justify-content-between text-primary-hover">
                        <a class="h5 mb-0 text-body" href="admin-setting.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Settings">
                            <i class="bi bi-gear-fill"></i>
                        </a>
                        <a class="h5 mb-0 text-body" href="index.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Home">
                            <i class="bi bi-globe"></i>
                        </a>
                        <a class="h5 mb-0 text-body" href="sign-in.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Sign out">
                            <i class="bi bi-power"></i>
                        </a>
                    </div>
                </div>
                <!-- Sidebar footer END -->

            </div>
        </div>
    </nav>

    <!-- Page content START -->
    <div class="page-content">
        <!-- Page main content START -->
        <div class="page-content-wrapper border">

            <!-- Title -->
            <div class="row mb-3">
                <div class="col-12 d-sm-flex justify-content-between align-items-center">
                    <h1 class="h3 mb-2 mb-sm-0">Categories </h1>
                </div>
            </div>

            <!-- Card START -->
            <div class="card bg-transparent border">

                <!-- Card header START -->
                <div class="card-header bg-light border-bottom">
                    <!-- Search START -->
                    <div class="row g-3 align-items-center justify-content-between">

                        <!-- Search bar -->
                        <!-- Search bar -->
                        <div class="col-md-8">
                            <form class="rounded position-relative">
                                <input class="form-control bg-body" type="search" id="searchInput" placeholder="Search" aria-label="Search">
                                <button class="bg-transparent p-2 position-absolute top-50 end-0 translate-middle-y border-0 text-primary-hover text-reset" type="submit">
                                    <i class="fas fa-search fs-6"></i>
                                </button>
                            </form>
                        </div>


                    </div>
                    <!-- Search END -->
                </div>
                <!-- Card header END -->

                <!-- Card body START -->
                <div class="card-body">
                    <!-- Course table START -->
                    <div class="table-responsive border-0 rounded-3">
                        <!-- Table START -->
                        <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                            <!-- Table head -->
                            <thead>
                                <tr>
                                    <th scope="col" class="border-0 rounded-start">Category Name</th>
                                    <th scope="col" class="border-0">Parent Category Name</th>
                                    <th scope="col" class="border-0 rounded-end">Action</th>
                                </tr>
                            </thead>

                            <!-- Table body START -->
                            <tbody>
                                @forelse($categories as $category)
                                <!-- Table row -->
                                <tr>
                                    <!-- Table data -->
                                    <td>
                                        <div class="d-flex align-items-center position-relative">
                                            <!-- Image -->
                                            <div class="w-60px">
                                                @if ($category->image)
                                                <img src="{{ asset('storage/' .$category->image) }}" class="rounded" alt="{{ $category->name }} Image">
                                                @else
                                                <!-- Default image or placeholder image if there is no image -->
                                                <P>No Image</P>
                                                @endif
                                            </div>
                                            <!-- Title -->
                                            <h6 class="table-responsive-title mb-0 ms-2">{{ $category->name }}</h6>
                                        </div>
                                    </td>

                                    <!-- Table data -->
                                    <td>
                                        @if ($category->parent)
                                        {{ $category->parent->name }}

                                        @else
                                        No Parent Categories
                                        @endif
                                    </td>

                                    <!-- Table data -->
                                    <td>
                                        <button wire:click="editCategory({{ $category->id }})" class="btn btn-sm btn-warning  me-1 mb-1 mb-md-0">Edit</button>
                                        <button class="btn btn-sm btn-danger mb-0" wire:click="deleteCategory({{ $category->id }})">Delete</button>
                                    </td>
                                </tr>
                                @empty
                                <!-- Show this row if no categories are available -->
                                <tr>
                                    <td colspan="3" class="text-center">No categories found</td>
                                </tr>
                                @endforelse
                            </tbody>
                            <!-- Table body END -->
                        </table>

                        <!-- Table END -->
                    </div>
                    <!-- Course table END -->
                </div>
                <!-- Card body END -->

                <!-- Card footer START -->
                <div class="card-footer bg-transparent pt-0">

                </div>
                <!-- Card footer END -->
            </div>
            <!-- Card END -->
        </div>
        <!-- Page main content END -->
    </div>

    <div class="page-content">
        <div class="page-content-wrapper border">

            <div class="row mb-3">
                <div class="col-12 d-sm-flex justify-content-between align-items-center">
                    <h1 class="h3 mb-2 mb-sm-0">Add/Edit Category</h1>
                </div>
            </div>
            <!-- Display a form to create a new category -->
            <form wire:submit.prevent="createCategory" enctype="multipart/form-data">

                <!-- Category Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Category Name:</label>
                    <input type="text" wire:model="name" class="form-control" required>
                </div>

                <!-- Category Image -->
                <div class="mb-3">
                    <label for="image" class="form-label">Category Image:</label>
                    <input type="file" wire:model="image" class="form-control" accept="image/*">

                </div>

                <!-- Parent Category -->
                <div class="mb-3">
                    <label for="parentCategory" class="form-label">Parent Category:</label>
                    <select wire:model="parentCategory" class="form-select">
                        <option value="">None</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Create/Update Category</button>

            </form>
        </div>

    </div>

</main>