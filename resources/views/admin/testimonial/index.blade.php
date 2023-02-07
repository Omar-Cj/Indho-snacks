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
                    <h1>{{ __('Testimonials') }}</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">{{ __('Testimonials') }}</li>
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
                                <a href="javascript:void(0)" class="btn btn-primary btn-flat m-b-30 m-t-30"
                                    data-toggle="modal" data-target="#addTestimonial">Add New</a>
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
                        <!-- Testimonial Add Modal -->
                        <div class="modal fade" id="addTestimonial" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Testimonial</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('review.storte') }}" class="row" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group col-12">
                                                <label for="image" class="form-label">Image <span class="text-danger">*
                                                        (Recommended
                                                        Size:
                                                        80*80px)</span>
                                                </label>
                                                <input type="file" name="image" class="form-control" required>
                                            </div>

                                            <div class="form-group col-12">
                                                <label class="form-label">Name</label>
                                                <input type="text" name="name" class="form-control" required>
                                            </div>

                                            <div class="form-group col-12">
                                                <label class="form-label">Details</label>
                                                <textarea name="details" cols="30" rows="5" class="form-control" required onkeyup="countChars(this, 987239873);"></textarea>
                                                <p id="charNum_987239873"></p>
                                            </div>

                                            <div class="form-group col-12">
                                                <label for="status" class="form-label">Status <span
                                                        class="text-danger">*</span></label>
                                                <select name="status" class="form-control">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
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
                                        <th width="5%">#</th>
                                        <th width="10%">Image</th>
                                        <th width="10%">Name</th>
                                        <th width="45%">Details</th>
                                        <th width="10%">Status</th>
                                        <th width="20%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($testimonials as $key => $data)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <img src="@if ($data->image) {{ asset($data->image) }} @endif"
                                                    class="border rounded" width="50" height="50" alt="">
                                            </td>
                                            <td>
                                                {{ $data->name }}
                                            </td>
                                            <td>
                                                {{ Str::limit($data->details, '100', '.....') }}
                                            </td>
                                            <td>
                                                @if ($data->status == 1)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-info">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{-- <a data-toggle="modal" data-target="#showTestimonial"><i
                                                        class="fa fa-eye"></i></a> --}}
                                                <a class="mr-2 ml-2" data-toggle="modal"
                                                    data-target="#editTestimonial_{{ $data->id }}"><i
                                                        class="fa fa-edit"></i></a>
                                                <a href="{{ route('review.delete', $data->id) }}"
                                                    onclick="return confirm('Are you sure to want to delete?');"><i
                                                        class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                            <!-- Testimonial Edit Modal -->
                                            <div class="modal fade" id="editTestimonial_{{ $data->id }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                Testimonial</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('review.update', $data->id) }}"
                                                                class="row" method="post"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="form-group col-12">
                                                                    <img src="{{ asset($data->image) }}"
                                                                        class="border rounded" width="80"
                                                                        height="80" alt="">
                                                                </div>
                                                                <div class="form-group col-12">
                                                                    <label for="image" class="form-label">Image <span
                                                                            class="text-danger"> (Recommended
                                                                            Size:
                                                                            80*80px)</span>
                                                                    </label>
                                                                    <input type="file" name="image"
                                                                        class="form-control">
                                                                </div>

                                                                <div class="form-group col-12">
                                                                    <label for="name" class="form-label">Name <span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" name="name"
                                                                        value="{{ $data->name }}" class="form-control">
                                                                </div>

                                                                <div class="form-group col-12">
                                                                    <label for="details" class="form-label">Details <span
                                                                            class="text-danger">*</span></label>
                                                                    <textarea name="details" cols="30" rows="5" class="form-control" onkeyup="countChars(this, {{ $data->id }});">{{ $data->details }}</textarea>
                                                                    <p id="charNum_{{ $data->id }}"></p>
                                                                </div>

                                                                <div class="form-group col-12">
                                                                    <label for="status" class="form-label">Status <span
                                                                            class="text-danger">*</span></label>
                                                                    <select name="status" class="form-control">
                                                                        <option value="1" @if($data->status == 1) selected @endif>Active</option>
                                                                        <option value="0" @if($data->status == 0) selected @endif>Inactive</option>
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

    <script>
        function countChars(obj, id) {
            var maxLength = 250;
            var strLength = obj.value.length;

            if (strLength > maxLength) {
                document.getElementById("charNum_"+id).innerHTML = '<span style="color: red;">' + strLength + ' out of ' +
                    maxLength + ' characters</span>';
            } else {
                document.getElementById("charNum_"+id).innerHTML = '<span style="color: green;">' + strLength + ' out of ' +
                    maxLength + ' characters</span>';
            }

        }
    </script>
@endsection
