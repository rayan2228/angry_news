@extends('backend.layouts.app')
@section('content')

    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3">Category</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            {{-- <div class="btn-group">
                    <button type="button" class="btn btn-primary">Settings</button>
                    <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                        data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                            href="javascript:;">Action</a>
                        <a class="dropdown-item" href="javascript:;">Another action</a>
                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                        <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
                    </div>
                </div> --}}
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="py-3 card-header">
            <h6 class="mb-0">Add Product Category</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-12 d-flex">
                    <div class="border shadow-none card w-100">
                        <div class="card-body">
                            <form class="row g-3" method="POST" action="{{ route('admin.category.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" placeholder="Category name"
                                        name="category_name" value="{{ old('category_name') }}">
                                    @error('category_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Slug</label>
                                    <input type="text" class="form-control" placeholder="Slug name" name="category_slug">
                                    @error('category_slug')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Category Image</label>
                                    <input type="file" class="form-control" name="category_image">
                                    @error('category_image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Choose a parent category</label>
                                    <select class="form-select" name="category_id">
                                        <option value="0" selected>Choose a parent category</option>
                                        @foreach ($allCategories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Category Status</label>
                                    <select class="form-select" name="category_status">
                                        <option value="active">active</option>
                                        <option value="deactive">deactive</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" rows="3" cols="3" placeholder="Category Description"
                                        name="category_description"></textarea>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button class="btn btn-primary">Add Category</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-12 d-flex">
                    <div class="border shadow-none card w-100">
                        <div class="py-3 card-header d-flex justify-content-between">
                            <h6 class="mb-0">Parent Categories</h6>
                            <!-- Button trigger modal -->
                            <button type="button" class="mb-0 btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#trash">
                                Trash
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="trash" tabindex="-1" aria-labelledby="trashLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="trashLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table align-middle">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Serial</th>
                                                                <th>Name</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($trashCategories as $trashCategory)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $trashCategory->category_name }}</td>
                                                                    </td>
                                                                    <td>
                                                                        <div class="gap-3 d-flex align-items-center fs-6">
                                                                            <a href="{{ route('admin.category.restore', ['category' => $trashCategory->id]) }}"
                                                                                class="text-success"><i
                                                                                    class="fa-solid fa-rotate-left"></i>
                                                                            </a>
                                                                            <butoon class="text-danger delete"
                                                                                value="{{ route('admin.category.trash', ['category' => $trashCategory->id]) }}">
                                                                                <i class="bi bi-trash-fill"></i>
                                                                            </butoon>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="3">
                                                                        <p class="text-center text-danger">no trash
                                                                            category to
                                                                            show</p>
                                                                    </td>
                                                                </tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Serial</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($categories as $category)
                                            <tr>

                                                <td>{{ $categories->firstItem() + $loop->index }}</td>
                                                <td>{{ $category->category_name }}</td>
                                                <td>{{ $category->category_slug }}</td>
                                                <td>
                                                    @if ($category->category_status === 'active')
                                                        <i class="fa-solid fa-eye"
                                                            style="color: green; font-size:16px;"></i>
                                                    @else
                                                        <i class="fa-solid fa-eye-slash"
                                                            style="color: red; font-size:16px;"></i>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="gap-3 d-flex align-items-center fs-6">
                                                        <a href="{{ route('admin.category.edit', ['category' => $category->id]) }}"
                                                            class="text-warning" data-bs-toggle="tooltip"
                                                            data-bs-placement="bottom" title=""
                                                            data-bs-original-title="Edit info" aria-label="Edit"><i
                                                                class="bi bi-pencil-fill"></i></a>
                                                        <form
                                                            action="{{ route('admin.category.destroy', ['category' => $category->id]) }}"
                                                            method="post" id="delete">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-danger"
                                                                style="background: none; border:none;"
                                                                data-bs-toggle="tooltip" data-bs-original-title="Delete"
                                                                aria-label="Delete"><i
                                                                    class="bi bi-trash-fill"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">
                                                    <p class="text-center text-danger">no category to show</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- sub catewgory --}}
                <div class="col-12 col-lg-12 d-flex">
                    <div class="border shadow-none card w-100">
                        <div class="py-3 card-header d-flex justify-content-between">
                            <h6 class="mb-0">Sub Categories</h6>
                            <!-- Button trigger modal -->
                            <button type="button" class="mb-0 btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#subtrash"> Trash
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="subtrash" tabindex="-1" aria-labelledby="trashLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="trashLabel">Sub Category Trash</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table align-middle">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Serial</th>
                                                                <th>Name</th>
                                                                <th>Parent Category</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($trashSubCategories as $trashSubCategory)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $trashSubCategory->subCategory_name }}</td>
                                                                    <td>{{ $trashSubCategory->relationCategory->category_name }}
                                                                    </td>
                                                                    <td>
                                                                        <div class="gap-3 d-flex align-items-center fs-6">
                                                                            <a href="{{ route('admin.subCategory.restore', ['subcategory' => $trashSubCategory->id]) }}"
                                                                                class="text-success"><i
                                                                                    class="fa-solid fa-rotate-left"></i>
                                                                            </a>
                                                                            <butoon class="text-danger subdelete"
                                                                                value="{{ route('admin.subCategory.trash', ['subcategory' => $trashSubCategory->id]) }}">
                                                                                <i class="bi bi-trash-fill"></i>
                                                                            </butoon>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="4">
                                                                        <p class="text-center text-danger">no trash
                                                                            category to
                                                                            show</p>
                                                                    </td>
                                                                </tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Serial</th>
                                            <th>Name</th>
                                            <th>Parent Category Name</th>
                                            <th>Slug</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($subCategories as $subCategory)
                                            <tr>
                                                <td>{{ $subCategories->firstItem() + $loop->index }}</td>
                                                <td>{{ $subCategory->subCategory_name }}</td>
                                                <td>{{ $subCategory->relationCategory->category_name }}</td>
                                                <td>{{ $subCategory->subCategory_slug }}</td>
                                                <td>
                                                    @if ($subCategory->subCategory_status === 'active')
                                                        <i class="fa-solid fa-eye"
                                                            style="color: green; font-size:16px;"></i>
                                                    @else
                                                        <i class="fa-solid fa-eye-slash"
                                                            style="color: red; font-size:16px;"></i>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="gap-3 d-flex align-items-center fs-6">
                                                        <a href="{{ route('admin.subCategory.edit', ['subcategory' => $subCategory->id]) }}"
                                                            class="text-warning" data-bs-toggle="tooltip"
                                                            data-bs-placement="bottom" title=""
                                                            data-bs-original-title="Edit info" aria-label="Edit"><i
                                                                class="bi bi-pencil-fill"></i></a>
                                                        <form
                                                            action="{{ route('admin.subCategory.delete', ['subcategory' => $subCategory->id]) }}"
                                                            method="post" id="subDelete">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="#"
                                                                onclick="document.getElementById('subDelete').submit()"
                                                                class="text-danger" data-bs-toggle="tooltip"
                                                                data-bs-placement="bottom" title=""
                                                                data-bs-original-title="Delete" aria-label="Delete"><i
                                                                    class="bi bi-trash-fill"></i></a>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">
                                                    <p class="text-center text-danger">no category to show</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <nav class="mt-0 float-end" aria-label="Page navigation">
                                {{ $subCategories->withQueryString()->links() }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            {{-- {{ $categories->withQueryString()->links() ?? $subCategories->withQueryString()->links()   }} --}}
            <!--end row-->
        </div>
    </div>
    <nav class="mt-0 float-end" aria-label="Page navigation">
        {{ $categories->withQueryString()->links() }}
    </nav>

    @section('footer_script')
        @if (session('success'))
            <script>
                $(document).ready(function() {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: "{{ session('success') }}"
                    })
                });
            </script>
        @elseif (session('delete'))
            <script>
                $(document).ready(function() {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: "{{ session('delete') }}"
                    })
                });
            </script>
        @elseif (session('update'))
            <script>
                $(document).ready(function() {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: "{{ session('update') }}"
                    })
                });
            </script>
        @elseif (session('restore'))
            <script>
                $(document).ready(function() {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: "{{ session('restore') }}"
                    })
                });
            </script>
        @elseif (session('error'))
            <script>
                $(document).ready(function() {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        icon: 'error',
                        title: "{{ session('error') }}"
                    })
                });
            </script>
        @endif
        <script>
            $(".delete").click(function() {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.assign($(this).attr("value"))
                    }
                })
            });
        </script>
        <script>
            $(".subdelete").click(function() {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.assign($(this).attr("value"))
                    }
                })
            });
        </script>
    @endsection

    <!--end page main-->
@endsection
