@extends('backend.layouts.app')
@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">User</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">User List</li>
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
    <div class="card">
        <div class="card-header py-3">
            <h6 class="mb-0">User Lists</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-12 d-flex">
                    <div class="card w-100 border shadow-none">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Serial</th>
                                            <th>Name</th>
                                            <th>email</th>
                                            <th>role</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $user)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    <a
                                                        href="{{ route('admin.user.show', ['user' => $user->id]) }}">{{ $user->name }}</a>
                                                </td>
                                                <td>
                                                    {{ $user->email }}
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge @if ($user->role === 'admin') bg-success
                                                        @elseif ($user->role === 'writer')
                                                         bg-primary
                                                         @else
                                                         bg-secondary @endif">{{ $user->role }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="form-check-danger form-check form-switch">
                                                        <form action="{{ route('admin.user.update', ['user' => $user->id]) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <input onchange="this.form.submit()" class="form-check-input" type="checkbox"
                                                                id="flexSwitchCheckCheckedDanger"
                                                                @if ($user->status === 'active') checked @endif >
                                                        </form>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center fs-6 gap-3">
                                                        <form
                                                            action="{{ route('admin.user.destroy', ['user' => $user->id]) }}"
                                                            method="post" id="delete">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button style="border: none; background: transparent"
                                                                class="text-danger" data-bs-toggle="tooltip"
                                                                data-bs-placement="bottom" title=""
                                                                data-bs-original-title="Delete" aria-label="Delete"><i
                                                                    class="bi bi-trash-fill"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">
                                                    <p class="text-danger text-center">no posts to show</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!--end breadcrumb-->
    @section('footer_script')
        @if (session('delete'))
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
                        icon: 'warning',
                        title: "{{ session('delete') }}"
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
    @endsection
@endsection
