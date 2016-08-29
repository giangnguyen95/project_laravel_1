@extends('admin.master')
@section('content')
<style type="text/css">
    .img_current, img.img_detail{
        width: 150px;
    }
    .img_detail{
        margin-bottom: 20px;
    }
    .icon_del{
        position: relative;
        top: -51px;
        left: -25px;
    }
    /*button.btn-primary{
        margin-bottom: 40px;
    }*/
    #insert{
        margin-top: 20px;
    }
</style>
<!-- /.col-lg-12 -->
<form action="{{url('product/'.$product->id)}}" method="POST" name="fEditProduct" enctype="multipart/form-data">
    <div class="col-lg-7" style="padding-bottom:120px">
            @include('admin.log.errors')
                {{csrf_field()}}
                <div class="form-group">
                    <label>Product Parent</label>
                    <select class="form-control" name="parent">
                        <?php cate_parent($cate,1, "--", $product->cate_id) ?>
                    </select>
                </div>
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{{$product->name}}" required/>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input class="form-control" name="txtPrice" placeholder="Please Enter Password" value="{{$product->price}}" required/>
            </div>
            <div class="form-group">
                <label>Intro</label>
                <textarea class="form-control" rows="3" name="txtIntro" required>{{$product->intro}}</textarea>
                <script type="text/javascript">ckeditor("txtIntro")</script>
            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea class="form-control" rows="3" name="txtContent" required>{{$product->content}}</textarea>
                <script type="text/javascript">ckeditor("txtContent")</script>
            </div>
            <div class="form-group">
                <label>Images Current</label>
                <img src="{{asset('resources/upload/'.$product['image'])}}" class="img_current" required>
                <input type="hidden" name="img_current" value="{{$product['image']}}">
            </div>
            <div class="form-group">
                <label>Images</label>
                <input type="file" name="fImages">
            </div>
            <div class="form-group">
                <label>Product Keywords</label>
                <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value="{{$product->keywords}}" required/>
            </div>
            <div class="form-group">
                <textarea class="form-control" rows="3" name="txtDescription" required>
                    {{old('txtDescription',$product->description)}}
                </textarea>
            </div>
            <button type="submit" class="btn btn-default submit">Product Edit</button>
            <button type="reset" class="btn btn-default reset">Reset</button>    
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-4">
        @foreach($product_image as $pimg => $val)
            <div class="form-group img" id="{!!$pimg!!}">
                <img src="{{asset('resources/upload/detail/'.$val['image'])}}" class="img_detail" idImage="{!!$val['id']!!}" id="{!!$pimg!!}">
                <a id="del_img_demo" class="btn btn-danger btn-circle icon_del" href="javascript:void(0)" type="button"><i class="fa fa-times"></i></a>
            </div>
        @endforeach
        <button type="button" class="btn btn-primary" id="add_image">Add images</button>
        <div id="insert"></div>
    </div>
</form>
@endsection()