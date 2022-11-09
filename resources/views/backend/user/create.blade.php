@extends('backend.layouts.app')
@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="text-dark breadcrumb-title pe-3">Pages</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="text-dark bx bx-home-alt"></i></a>
                    </li>
                    <li class="text-dark breadcrumb-item active" aria-current="page">Create User</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            {{-- <div class="btn-group">
                <button type="button" class="btn btn-light">Settings</button>
                <button type="button" class="btn btn-light split-bg-light dropdown-toggle dropdown-toggle-split"
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
        <div class="card-header py-3">
            <h6 class="mb-0">Create User</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.users.store') }}" method="post">
                @csrf
                <div class="row g-3">
                    <div class="col-12">
                        <label for="inputName" class="form-label">Name</label>
                        <div class="ms-auto position-relative">
                            <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                    class="bi bi-person-circle"></i></div>
                            <input type="text" class="form-control radius-30 ps-5" id="inputName"
                                placeholder="Enter Name" name="name">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="inputEmailAddress" class="form-label">Email Address</label>
                        <div class="ms-auto position-relative">
                            <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                    class="bi bi-envelope-fill"></i></div>
                            <input type="email" class="form-control radius-30 ps-5" id="inputEmailAddress"
                                placeholder="Email Address" name="email">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="inputChoosePassword" class="form-label">Enter Password</label>
                        <div class="ms-auto position-relative">
                            <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                    class="bi bi-lock-fill"></i>
                            </div>
                            <input type="password" class="form-control radius-30 ps-5" id="inputChoosePassword"
                                placeholder="Enter Password" name="password">
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="inputChoosePassword" class="form-label">Select Role</label>
                        <div class="ms-auto">
                            <input class="form-check-input me-2" type="radio" id="admin" name="role"
                                value="admin">
                            <label for="admin" class="me-2">admin</label>
                            <input class="form-check-input me-2" type="radio" id="editor" name="role"
                                value="editor">
                            <label for="editor" class="me-2">editor</label>
                            <input class="form-check-input me-2" type="radio" id="writer" name="role" value="writer"
                                checked>
                            <label for="writer" class="me-2">writer</label>
                            @error('role')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary radius-30">Create User</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

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
    @endif
@endsection
@endsection
