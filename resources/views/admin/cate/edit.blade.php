@extends('admin.master')
@section('content')
<!-- /.col-lg-12 -->
<div class="col-lg-7" style="padding-bottom:120px">
    @include('admin.log.errors')
    <form action=" {{URL::route('admin.cate.update', $data->id)}} " method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <label>Category Parent</label>
            <select class="form-control" name="parent">
                <?php cate_parent($parent)?>
            </select>
        </div>
        <div class="form-group">
            <label>Category Name</label>
            <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" value="{{$data->name}}" required/>
        </div>
        <div class="form-group">
            <label>Category Order</label>
            <input class="form-control" name="txtOrder" placeholder="Please Enter Category Order" value="{{$data->order}}" required/>
        </div>
        <div class="form-group">
            <label>Category Keywords</label>
            <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value="{{$data->keywords}}" required/>
        </div>
        <div class="form-group">
            <label>Category Description</label>
            <textarea class="form-control" rows="3" name="txtDescription" required>
                {{old('txtDescription', $data->description)}}
            </textarea>
        </div>
        <button type="submit" class="btn btn-default submit">Category Edit</button>
        <button type="reset" class="btn btn-default reset">Reset</button>
    </form>
</div>
@endsection()            