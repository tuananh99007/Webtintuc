@extends('Admin.layout.index')
@section('main_content')
    <div id="page-inner">
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-6">
                <!--    Striped Rows Table  -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Role
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Roles</th>
                                    <th>Permissions</th>
                                    <th>Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $index => $role)
                                    <tr>
                                        <td>{{$role->name}}</td>
                                        <td>
                                            @if(count($role->permissions)>0)
                                                @foreach($role->permissions as $index => $permission)
                                                    <span class="badge badge-success">{{$permission->name}}</span>
                                                @endforeach
                                            @else
                                                <span class="badge badge-danger">No permission</span>
                                            @endif
                                        </td>
                                        <td>
                                            <ul>
                                                @if(count($role->users)>0)
                                                    @foreach($role->users as $index => $user)
                                                        <li class="badge badge-success">{{$user->name}}</li>
                                                    @endforeach
                                                @else
                                                    <li class="badge badge-danger">No user</li>
                                                @endif
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--  End  Striped Rows Table  -->
            </div>
            <div class="col-md-6">
                <!--    Bordered Table  -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Users
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Update</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $index => $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>
                                            @if(count($user->roles)>0)
                                                @foreach($user->roles as $role)
                                                    <span class="badge  badge-success">{{$role->name}}</span>
                                                @endforeach
                                            @else
                                                <span class="badge badge-danger">No role</span>
                                            @endif
                                        </td>
                                        <td><a href="{{ route('admin.users.update', ['id' => $user->id]) }}"
                                               class="btn btn-warning btn-sm">Update</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--  End  Bordered Table  -->
            </div>
        </div>
        <!-- /. ROW  -->
    </div>
@endsection
