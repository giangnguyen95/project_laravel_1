@extends('admin.master')
@section('content')
<!-- /.col-lg-12 -->
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>STT</th>
            <th>ID</th>
            <th>Username</th>
            <th>Level</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt =1?>
        @foreach($users as $user)
        <tr class="odd gradeX" align="center">
            <td>{{$stt++}}</td>
            <td>{{$user->id}}</td>
            <td>{{$user->username}}</td>
            <td>
                <?php
                    if($user->level == 1 && $user->id == 2)
                        echo 'SuperAdmin';
                    elseif($user->level ==1)
                        echo 'Admin';
                    else
                        echo 'Member';
                ?>
            </td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{URL::route('admin.user.delete', $user->id)}}" onclick="return xacnhanxoa('Do You want to delete this user?')"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{url('user/'.$user->id.'/edit')}}">Edit</a></td>
        </tr>
        @endforeach()
    </tbody>
</table>
@endsection()
                