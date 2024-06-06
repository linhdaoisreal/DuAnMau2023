@extends ('layouts.master')

@section('title')
Danh sách User
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h2 class="m-0">Danh sach User</h2>
                    </div>
                </div>
            </div>
            <div class="white_card_body">

                @if (isset($_SESSION['status']) && $_SESSION['status'])
                    <div class="alert alert-success">{{ $_SESSION['msg'] }}</div>

                    @php
                        unset($_SESSION['status']);
                        unset($_SESSION['msg'])
                    @endphp
                @endif

                <a href="{{ url('admin/users/create') }}" class="">Add new</a>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>IMAGE</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>CREATED AT</th>
                                <th>UPDATED AT</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <?= $user['id']?>
                                    </td>
                                    <td><img src="{{asset($user['avatar'])}}" alt="" width="100px"></td>
                                    <td>
                                        <?= $user['name']?>
                                    </td>
                                    <td>
                                        <?= $user['email']?>
                                    </td>
                                    <td>
                                        <?= $user['created_at']?>
                                    </td>
                                    <td>
                                        <?= $user['updated_at']?>
                                    </td>
                                    <td>

                                        <a href="{{ url('admin/users/' . $user['id'] . '/delete') }}"
                                            onclick="return confirm('Bạn có muốn xoá?')">Delete</a>

                                        <a href="{{ url('admin/users/' . $user['id'] . '/edit') }}">Update</a>

                                        <a href="{{ url('admin/users/' . $user['id'] . '/show') }}">Show</a>


                                    </td>
                                </tr>
                            @endforeach    

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection