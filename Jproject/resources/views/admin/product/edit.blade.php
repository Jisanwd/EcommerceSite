@extends('admin.master')
@section('title')
    Edit Product Page
@endsection
@section('body')
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Edit Product Form</h4>
                    <h4 class="text-center text-success">{{Session::get('message')}}</h4>

                    <form action="{{route('product.update', ['id' => $product->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="category_id">
                                    <option value=""> -- Select Category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$product->category_id == $category->id ? 'Selected' : 'UnSelected'}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Sub Category Name</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="sub_category_id">
                                    <option value=""> -- Select Sub Category --</option>
                                    @foreach($sub_categories as $sub_category)
                                        <option value="{{$sub_category->id}}"  {{$product->sub_category_id == $sub_category->id ? 'Selected' : 'UnSelected'}}>{{$sub_category->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Brand Name</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="brand_id">
                                    <option value=""> -- Select Brand --</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}" {{$product->brand_id == $brand->id ? 'Selected' : 'UnSelected'}}>{{$brand->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Unit Name</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="unit_id">
                                    <option value=""> -- Select Unit --</option>
                                    @foreach($units as $unit)
                                        <option value="{{$unit->id}}" {{$product->unit_id == $unit->id ? 'Selected' : 'UnSelected'}}>{{$unit->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Product Name</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{$product->name}}" class="form-control"  name="name">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Product Code</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{$product->code}}" class="form-control" name="code">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Stock Amount</label>
                            <div class="col-sm-9">
                                <input type="number" value="{{$product->stock_amount}}" class="form-control" name="stock_amount">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Product Price</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="number" value="{{$product->regular_price}}" class="form-control"  name="regular_price" placeholder="Regular Price">
                                    <input type="number" value="{{$product->selling_price}}" class="form-control"  name="selling_price" placeholder="Selling Price">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Short Description</label>
                            <div class="col-sm-9">
                                <textarea rows="5" class="form-control" name="short_description">{{$product->short_description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Long Description</label>
                            <div class="col-sm-9">
                                <textarea rows="5" class="form-control summernote" name="long_description">{{$product->long_description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Product Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control-file" id="horizontal-password-input" name="image">
                                <img src="{{asset($product->image)}}" alt="" height="80" width="60">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Other Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control-file" multiple id="horizontal-password-input" name="other_image[]">
                                @foreach($product->otherImages as $otherImage)
                                    <img src="{{asset($otherImage->image)}}" width="60" height="80">
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">

                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Update Product Info</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

