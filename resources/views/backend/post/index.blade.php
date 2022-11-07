@extends('backend.layouts.app')
@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Post</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Post List</li>
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
            <h6 class="mb-0">Post Lists</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-12 d-flex">
                    <div class="card w-100 border shadow-none">
                        <div class="card-header d-flex justify-content-between py-3">
                            <h6 class="mb-0">Posts</h6>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger mb-0" data-bs-toggle="modal"
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
                                                            @forelse ($trashPosts as $trashPost)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $trashPost->post_heading }}</td>
                                                                    </td>
                                                                    <td>
                                                                            <div
                                                                                class="gap-3 d-flex align-items-center fs-6">
                                                                                <a href="{{ route('admin.post.restore', ['post' => $trashPost->id]) }}"
                                                                                    class="text-success"><i
                                                                                        class="fa-solid fa-rotate-left"></i>
                                                                                </a>
                                                                                <butoon class="text-danger delete"
                                                                                    value="{{ route('admin.post.trash', ['post' => $trashPost->id]) }}">
                                                                                    <i class="bi bi-trash-fill"></i>
                                                                                </butoon>
                                                                            </div>
                                                                        </td>
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="3">
                                                                        <p class="text-danger text-center">no trash
                                                                            posts to
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
                                            <th>Heading</th>
                                            <th>Slug</th>
                                            <th>Thumbnail</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($posts as $post)
                                            <tr>
                                                <td>{{ $posts->firstItem() + $loop->index }}</td>
                                                <td><a
                                                        href="{{ route('admin.post.show', ['post' => $post->id]) }}">{{ $post->post_heading }}</a>
                                                </td>
                                                <td>{{ $post->post_slug }}</td>
                                                <td><img src="{{ asset('uploads/post_thumbnail') }}/{{ $post->post_thumbnail }}"
                                                        alt="{{ $post->post_thumbnail }}" width=100 height=100></td>
                                                <td>
                                                    @if ($post->post_status === 'active')
                                                        <i class="fa-solid fa-eye"
                                                            style="color: green; font-size:16px;"></i>
                                                    @else
                                                        <i class="fa-solid fa-eye-slash"
                                                            style="color: red; font-size:16px;"></i>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center fs-6 gap-3">
                                                        <a href="{{ route('admin.post.edit', ['post' => $post->id]) }}"
                                                            class="text-warning" data-bs-toggle="tooltip"
                                                            data-bs-placement="bottom" title=""
                                                            data-bs-original-title="Edit info" aria-label="Edit"><i
                                                                class="bi bi-pencil-fill"></i></a>
                                                        <form
                                                            action="{{ route('admin.post.destroy', ['post' => $post->id]) }}"
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
                            <nav class="float-end mt-0" aria-label="Page navigation">
                                {{ $posts->withQueryString()->links() }}
                            </nav>
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
