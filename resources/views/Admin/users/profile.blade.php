@extends('admin.layout.index')
@section('main_content')
    <div class="col-md-12">
        <!--   Kitchen Sink -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Profile
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Avatar</th>
                            <th>Email</th>
                            <th>Chức năng</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ $userLogin ->id }}</td>
                            <td>{{ $userLogin->name }}</td>
                            <td><img src="{{ asset($userLogin->avatar) }}" alt="" style="height: 60px "></td>
                            <td>{{ $userLogin->email }}</td>
                            <td style="text-align: center">
                                <a class="btn btn-warning"
                                   href="{{route('admin.users.update',['id'=>$userLogin->id])}}">Update</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End  Kitchen Sink -->
    </div>
@endsection
