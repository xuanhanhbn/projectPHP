@extends('admin.layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section("custom_css")
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<!-- Or for RTL support -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />
@endsection
@section('content')
@include('admin.layouts.navbars.auth.topnav', ['title' => 'Create Product'])
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create Product</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{url("/admin/categories/create")}}" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label>Title</label>
                                <input class="  form-control" type="text" value="" name="title" placeholder="Enter title..." required>
                                @error("title")
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>key</label>
                                <input class="form-control" type="text" value="" name="key" placeholder="Enter key..." required>
                                @error("key")
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input class="form-control" type="file" value="" name="image">
                                @error("Image")
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description">{{old("description")}}</textarea>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer d-flex justify-content-between">
                            <div>
                                <a class="btn btn-primary  " href="{{url("admin/product/list")}}">Back</a>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>

                            </a>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->

            </div>
        </div>

    </div>
    @include('admin.layouts.footers.auth.footer')
</div>
@endsection
@section("custom_js")
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
<script type="text/javascript">
    $('.select2').select2({
        theme: 'bootstrap-5'
    });
</script>
@endsection