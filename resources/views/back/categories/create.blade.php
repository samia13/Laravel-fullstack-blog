@extends('layouts.back')
@section('breadcrumb')
    <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Post Add</li>
        </ol>
    </div><!-- /.col -->

@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <form method="POST" action="{{ route('categories.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">General</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Category Name </label>
                                <input type="text" name="title" id="title" class="form-control" required>
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
                    <input type="submit" value="Create" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection
