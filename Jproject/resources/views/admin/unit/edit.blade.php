@extends('admin.master')
@section('title')
    Edit Unit Page
@endsection
@section('body')
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Edit Unit Form</h4>
                    <h4 class="text-center text-success">{{Session::get('message')}}</h4>

                    <form action="{{route('unit.update', ['id' => $unit->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Unit Name</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{$unit->name}}" class="form-control" id="horizontal-firstname-input" name="name">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Unit Code</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{$unit->code}}" class="form-control" id="horizontal-firstname-input" name="code">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Unit Description</label>
                            <div class="col-sm-9">
                                <textarea rows="5" class="form-control" name="description">{{$unit->description}}</textarea>
                            </div>
                        </div>


                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">

                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Update New Unit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



