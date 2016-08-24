@extends('admin.master')
@section('content')
<!-- /.col-lg-12 -->
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>STT</th>
            <th>ID</th>
            <th>Name</th>
            <th>Category Parent</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt = 0;?>
        @foreach($cates as $cate )
            <tr class="odd gradeX" align="center">
                <td>{{ $stt++ }}</td>
                <td>{{$cate->id}}</td>
                <td>{{$cate->name}}</td>
                <td>
                    {{$cate->parent_id}}
                </td>
                <td class="center">
                    <i class="fa fa-trash-o  fa-fw"></i><a href="{{ URL::route('admin.cate.destroy', $cate->id) }}"> Delete</a>
                </td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href=" {{ url('cate/'.$cate->id.'/edit') }}">Edit</a></td>                
            </tr>
        @endforeach
    </tbody>
</table>
@endsection()
                