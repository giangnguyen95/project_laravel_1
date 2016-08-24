@extends('admin.master')
@section('content')
<!-- /.col-lg-12 -->
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>STT</th>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Date</th>
            <th>Category</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt = 1  ?>
        @foreach($products as $product)
        <tr class="odd gradeX" align="center">
            <td>{{$stt++}}</td>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{number_format($product->price,0,",",".")}}<!--dinh dang number--></td>
            <td>
                <?php
                    echo \Carbon\Carbon::createFromTimeStamp(strtotime($product->created_at))->diffForHumans();
                ?>
            </td>
            <td>
                <?php $cate = DB::table('cates')->where('id',$product->cate_id)->first(); ?>
                    @if(!empty($cate->name))
                        {{$cate->name}}
                    @endif
            </td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{URL::route('admin.product.destroy', $product->id)}}" onclick="return xacnhanxoa('Do You want to delete this product?')"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{URL::route('admin.product.edit', $product->id)}}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection()
                