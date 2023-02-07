@extends('admin.index')
@section('content')
    <style>
        .table td,
        .table th {
            vertical-align: middle
        }
    </style>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>{{ __('Sliders') }}</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">{{ __('Sliders') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="javascript:void(0)" class="btn btn-primary btn-flat m-b-30 m-t-30" data-toggle="modal"
                                    data-target="#addSlider">
                                    Add New
                                </a>
                            </div>
                            <div class="col-md-6">
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- Slider Add Modal -->
                        <div class="modal fade" id="addSlider" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Slider</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('slider.store') }}" class="row" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group col-12">
                                                <label for="image" class="form-label">Image <span class="text-danger">*
                                                        (Recommended Size:
                                                        1900*742px) </span> </label>
                                                <input type="file" name="image" class="form-control">
                                            </div>

                                            <div class="form-group col-12">
                                                <label class="form-label">Order Number <span
                                                        class="text-danger">*</span></label>
                                                <input type="number" name="order_id" class="form-control">
                                            </div>

                                            <div class="form-group col-12">
                                                <label for="status" class="form-label">Status <span
                                                        class="text-danger">*</span></label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="1">Published</option>
                                                    <option value="0">Unpublished</option>
                                                </select>
                                            </div>

                                            <div class="col-md-12 mt-3">
                                                <div class="col-md-6">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-md form-control">Add</button>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="button" class="btn btn-secondary btn-md form-control"
                                                        data-dismiss="modal" value="Close">
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive dtdiv">
                            <table class="table table-striped dttablewidth">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Order Number</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sliders as $key => $slider)
                                        <tr>
                                            <td>{{ $key + 1}}</td>
                                            <td>
                                                <img src="{{ asset($slider->image) }}"class="border rounded" width="80"
                                                    alt="">
                                            </td>
                                            <td>{{ $slider->order_id }}</td>
                                            <td>
                                                @if ($slider->status == 1)
                                                    <span class="badge badge-success">Published</span>
                                                @else
                                                    <span class="badge badge-info">Unpublished</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a class="mr-2 ml-2 btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#editSlider__{{ $slider->id }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{ route('slider.delete', $slider->id) }}" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure to want to delete?');">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                            <!-- Slider Edit Modal -->
                                            <div class="modal fade" id="editSlider__{{ $slider->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Slider</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('slider.update', $slider->id) }}" class="row" method="post"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="form-group col-12">
                                                                    <img src="{{ asset($slider->image) }}"
                                                                        class="border rounded" width="120"
                                                                        alt="">
                                                                </div>
                                                                <div class="form-group col-12">
                                                                    <label for="image" class="form-label">Image <span
                                                                            class="text-danger"> (Recommended Size:
                                                                            1900*742px) </span> </label>
                                                                    <input type="file" name="image" id="image"
                                                                        class="form-control">
                                                                </div>

                                                                <div class="form-group col-12">
                                                                    <label class="form-label">Order
                                                                        Number</label>
                                                                    <input type="number" name="order_id" value="{{ $slider->order_id }}"
                                                                        class="form-control">
                                                                </div>

                                                                <div class="form-group col-12">
                                                                    <label for="status" class="form-label">Status <span
                                                                            class="text-danger">*</span></label>
                                                                    <select name="status" id="status"
                                                                        class="form-control">
                                                                        <option value="1" @if($slider->status == 1) selected @endif>Published</option>
                                                                        <option value="0" @if($slider->status == 0) selected @endif>Unpublished</option>
                                                                    </select>
                                                                </div>

                                                                <div class="col-md-12 mt-3">
                                                                    <div class="col-md-6">
                                                                        <button type="submit"
                                                                            class="btn btn-primary btn-md form-control">Update</button>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input type="button"
                                                                            class="btn btn-secondary btn-md form-control"
                                                                            data-dismiss="modal" value="Close">
                                                                    </div>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
