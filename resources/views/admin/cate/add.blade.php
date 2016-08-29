@extends('admin.master')
@section('model')
Category
@stop()
@section('action')
Add
@stop()
@section('content')
<!-- /.col-lg-12 -->
<div class="col-lg-7" style="padding-bottom:120px">
    @include('admin.log.errors')
    <form action="{{ url('/cate') }}" method="POST"><!--url('/posts/add')-->
        <!--<input type="hidden" name="_token" value="{{!! csrf_token()!!}}">-->
        {{ csrf_field() }}
        <div class="form-group">
            <label>Category Parent</label>
            <select class="form-control" name="parent">
                <!--@foreach($parent as $item)
                <option value="">{{$item['name']}}</option>
                @endforeach-->
                <?php cate_parent($parent)?>
            </select>
        </div>
        <div class="form-group">
            <label>Category Name</label>
            <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" value="{{old('txtCateName')}}" required />
        </div>
        <div class="form-group">
            <label>Category Order</label>
            <input class="form-control" name="txtOrder" placeholder="Please Enter Category Order" value="{{old('txtOrder')}}" required/>
        </div>
        <div class="form-group">
            <label>Category Keywords</label>
            <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value="{{old('txtKeywords')}}" required/>
        </div>
        <div class="form-group">
            <label>Category Description</label>
            <textarea class="form-control" rows="3" name="txtDescription" required>
                {{old('txtDescription')}}
            </textarea>
        </div>
        <button type="submit" class="btn btn-default submit">Category Add</button>
        <button type="reset" class="btn btn-default reset">Reset</button>
    </form>
</div>
@endsection()
                