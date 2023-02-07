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
                    <h1>{{ __('Banners') }}</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">{{ __('Banners') }}</li>
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

                            </div>
                            <div class="col-md-6">
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="table-responsive dtdiv">
                            <table class="table table-striped dttablewidth">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Link</th>
                                        <th>Order</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banners as $key => $banner)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <img src="{{ asset($banner->image) }}" class="border rounded" width="100"
                                                    height="100" alt="">
                                            </td>
                                            <td>
                                                <a href="{{ $banner->link }}" target="__blank" class="btn btn-warning">Open Link</a>
                                            </td>
                                            <td>{{ $banner->order_id }}</td>
                                            <td>
                                                @if ($banner->status == 1)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-info">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a class="mr-2 ml-2 btn btn-success btn-sm text-white" data-toggle="modal"
                                                    data-target="#editBanner_{{ $banner->id }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                            <div class="modal fade" id="editBanner_{{ $banner->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Banner
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('banner.update', $banner->id) }}" class="row" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="form-group col-12">
                                                                    <img src="{{ asset($banner->image) }}"
                                                                        class="border rounded" width="120"
                                                                        alt="">
                                                                </div>
                                                                <div class="form-group col-12">
                                                                    <label class="form-label">Image <br />
                                                                        <span class="text-danger"> (Small image Recommended
                                                                            Size:
                                                                            558*205px)</span><br />
                                                                        <span class="text-danger"> (Big image Recommended
                                                                            Size:
                                                                            640*480px)</span>
                                                                    </label>
                                                                    <input type="file" name="image"
                                                                        class="form-control">
                                                                </div>

                                                                <div class="form-group col-12">
                                                                    <label class="form-label">Link <span class="text-danger">*</span></label>
                                                                    <input type="text" name="link" value="{{ $banner->link }}"
                                                                        class="form-control" required placeholder="URL Link">
                                                                </div>

                                                                <div class="form-group col-12">
                                                                    <label class="form-label">Order
                                                                        Number</label>
                                                                    <input type="number" name="order_id" value="{{ $banner->order_id }}"
                                                                        class="form-control">
                                                                </div>


                                                                <div class="form-group col-12">
                                                                    <label for="status" class="form-label">Status <span
                                                                            class="text-danger">*</span></label>
                                                                    <select name="status" id="status"
                                                                        class="form-control">
                                                                        <option value="1" @if($banner->status == 1) selected @endif>Active</option>
                                                                        <option value="0" @if($banner->status == 0) selected @endif>Inactive</option>
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
