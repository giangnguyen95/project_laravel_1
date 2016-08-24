@extends('admin.master')
@section('content')
<!-- /.col-lg-12 -->
<form action="{{url('/product')}}" method="POST" enctype="multipart/form-data">
    <div class="col-lg-7" style="padding-bottom:120px">
        @include('admin.log.errors')
            {{csrf_field()}}
            <div class="form-group">
                <label>Product Parent</label>
                <select class="form-control" name="parent">
                    <option value="0">Please Choose Product</option>
                    <?php cate_parent($cate,1, "--", old('sltParent'))?>
                </select>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{{old('txtName')}}" required />
            </div>
            <div class="form-group">
                <label>Price</label>
                <input class="form-control" name="txtPrice" placeholder="Please Enter Price" value="{{old('txtPrice')}}" required/>
            </div>
            <div class="form-group">
                <label>Intro</label>
                <textarea class="form-control" rows="3" name="txtIntro" required>
                    {{old('txtIntro')}}
                </textarea>
                <script type="text/javascript">ckeditor("txtIntro")</script>
            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea class="form-control" rows="3" name="txtContent" required>
                    {{old('txtContent')}}
                </textarea>
                <script type="text/javascript">ckeditor("txtContent")</script>
            </div>
            <div class="form-group">
                <label>Images</label>
                <input type="file" name="fImages" required>
            </div>
            <div class="form-group">
                <label>Product Keywords</label>
                <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value="{{old('txtKeywords')}}" required/>
            </div>
            <div class="form-group">
                <label>Product Description</label>
                <textarea class="form-control" rows="3" name="txtDescription" required>
                    {{old('txtDescription')}}
                </textarea>
            </div>
            <button type="submit" class="btn btn-default">Product Add</button>
            <button type="reset" class="btn btn-default">Reset</button>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-4">
        @for($i =1; $i<=10; $i++)
            <div class="form-group">
                <label>Image Product Detail {{$i}}</label>
                <input type="file" name="fProductDetail[]">
            </div>
        @endfor
    </div>
</form>
@endsection()