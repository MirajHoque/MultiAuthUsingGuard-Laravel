@extends('admin.layout.master')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Post Create</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Post Create</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 ">
            <div class="py-1">
                <div class="button-items d-flex justify-content-end">
                    <a href="{{ route('admin.post.index') }}" type="button"
                        class="btn btn-success waves-effect waves-light">Posts</a>
                </div>
            </div>
            <div class="card">
                <form action="{{ route('admin.post.update', $post->id) }}" method="POST" autocomplete="off"
                    enctype="multipart/form-data" files="true">
                    @csrf
                    @method('put')
                    <div class="card-body ">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="title" class="col-form-label">Post Title</label>
                                <input id="title" type="text" name="title" placeholder="Post title"
                                    class="form-control" value="{{ $post->title }}" required>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="content" class="col-form-label">Add Content</label>
                                <textarea name="content" id="" cols="30" rows="5" class="form-control">{{ $post->content }}</textarea>
                                @error('content')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        
                        <div class="form-group row">
                            <div class="col-md-1">
                                <div class="button-items float-right">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

