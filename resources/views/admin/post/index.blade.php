@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Manage Post</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Posts</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
                <div class="py-1">
                    <div class="button-items d-flex justify-content-end">
                        <a href="{{ route('admin.post.create') }}" type="button"
                            class="btn btn-info waves-effect waves-light">Create Post</a>
                    </div>
                </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Post By</th>     
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ($posts as $key => $element)
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $element->id }}</td>
                                        <td>{{ $element->title }}</td>
                                        <td>{{ $element->admin->name }}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm mt-2" role="group"
                                                aria-label="Basic example">
                                               
                                                    <a href="{{ route('admin.post.edit', $element->id) }}"
                                                        class="btn btn-warning btn-sm" title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                               
                                                <button onclick="" class="btn btn-info btn-sm"
                                                    title="Show">
                                                    <i class="fa fa-eye"></i>
                                                </button>

                                                    <a href="{{ route('admin.post.delete', $element->id) }}"
                                                        class="btn btn-danger btn-sm delete" title="Detete">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                            </div>
                                        </td>
                                    </tr>
                                 @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- modal --}}
    <div class="col-sm-6 col-md-4 col-xl-3">
        <div class="modal fade " id="dataModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="get_data">

                </div>
            </div>
        </div>
    </div>
@endsection