@extends('layouts.back')
@section('breadcrumb')
    <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Posts Edit</li>
        </ol>
    </div><!-- /.col -->
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">General</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Post Title</label>
                            <input type="text" id="inputName" class="form-control" value="{{ $post->title }}">
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Post Excerpt</label>
                            <textarea id="inputDescription" class="form-control" rows="3">{{ $post->excerpt }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Post Description</label>
                            <textarea id="inputDescription" class="form-control" rows="5">{{ $post->excerpt }}</textarea>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="#" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Save Changes" class="btn btn-success float-right">
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
