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


    <div class="page-content">
        <div class="page-content-wrapper border">

            <div class="row mb-3">
                <div class="col-12 d-sm-flex justify-content-between align-items-center">
                    <h1 class="h3 mb-2 mb-sm-0">Add Admin</h1>
                </div>
            </div>
            <!-- Display a form to create a new category -->
            <form wire:submit.prevent="createAdmin" enctype="multipart/form-data">

                <!-- Category Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Admin Name:</label>
                    <input type="text" wire:model="name" class="form-control" required>
                </div>

                <!-- Category Image -->
                <div class="mb-3">
                    <label for="email" class="form-label">Admin Email:</label>
                    <input type="text" wire:model="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="text" wire:model="password" class="form-control" required>
                </div>

                <!-- Parent Category -->
                <div class="mb-3">
                    <label for="role_id" class="form-label">Admin Role:</label>
                    <select wire:model="role_id" class="form-select">
                        <option value="">Select</option>
                        <option value="1">Super Admin</option>
                        <option value="2">Admin</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Create Admin</button>

            </form>
        </div>

    </div>
</main>