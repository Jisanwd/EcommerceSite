@extends('admin.master')
@section('title')
    Edit Sub Category Page
@endsection
@section('body')
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Add Sub Category Form</h4>
                    <h4 class="text-center text-success">{{Session::get('message')}}</h4>

                    <form action="{{route('sub-category.update', ['id' => $sub_category->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="category_id">
                                    <option> -- Select Category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$sub_category->category_id == $category->id ?'Selected' : 'Unselected'}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">SubCategory Name</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{$sub_category->name}}" class="form-control" id="horizontal-firstname-input" name="name">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">SubCategory Description</label>
                            <div class="col-sm-9">
                                <textarea rows="5" class="form-control" name="description">{{$sub_category->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">SubCategory Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control-file" id="horizontal-password-input" name="image">
                                <img src="{{asset($sub_category->image)}}" alt="" width="60" height="80">
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">

                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Update Sub Category</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
