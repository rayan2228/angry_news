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
                    <li class="breadcrumb-item active" aria-current="page">add tags</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-header py-3">
            <h6 class="mb-0">Add Tags</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-12 d-flex">
                    <div class="card w-100 border shadow-none">
                        <div class="card-body">
                            <form class="row g-3" method="POST" action="{{ route('admin.tags.store') }}">
                                @csrf
                                <div class="col-12">
                                    <label class="form-label">Tag Name</label>
                                    <input type="text" class="form-control" placeholder="tag name" name="tags_name">
                                    @error('tags_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="d-grid">
                                        <button class="btn btn-primary">Add Tags</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-12 d-flex">
                    <div class="card w-100 border shadow-none">
                        <div class="card-header d-flex justify-content-between py-3">
                            <h6 class="mb-0">Tags</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Serial</th>
                                            <th>Name</th>
                                            <th>posts</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($tags as $tag)
                                            <tr>

                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $tag->tags_name }}</td>
                                                <td>{{ $tag->relationPosts->count() }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center fs-6 gap-3">
                                                        <a href="{{ route('admin.tags.edit', ['tag' => $tag->id]) }}"
                                                            class="text-warning" data-bs-toggle="tooltip"
                                                            data-bs-placement="bottom" title=""
                                                            data-bs-original-title="Edit info" aria-label="Edit"><i
                                                                class="bi bi-pencil-fill"></i></a>
                                                        <form action="{{ route('admin.tags.destroy', $tag->id) }}"
                                                            method="post" id="tagdelete">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="text-danger" style="border:none; background:transparent;" data-bs-toggle="tooltip"
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
                                                    <p class="text-danger text-center">no category to show</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <nav class="float-end mt-0" aria-label="Page navigation">
                                {{ $tags->withQueryString()->links() }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
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
    @endsection

    <!--end page main-->
@endsection
