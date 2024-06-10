@extends ('layouts.master')

@section('title')
Cập nhật tài khoản {{$_SESSION['user']['name']}}
@endsection

@section('content')
<section class="section-sm">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h2 class="m-0">Cập nhật tài khoản {{$_SESSION['user']['name']}}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="white_card_body">
                        @if (!empty($_SESSION['errors']))
                                                <div class="alert alert-warning">
                                                    <ul>
                                                        @foreach ($_SESSION['errors'] as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>

                                                    @php
                                                        unset($_SESSION['errors']);
                                                    @endphp
                                                </div>
                        @endif

                        @if (!empty($_SESSION['msg']) && $_SESSION['status'] == true)
                                                <div class="alert alert-warning">
                                                    <ul>
                                                        <li>Success</li>
                                                    </ul>

                                                    @php
                                                        unset($_SESSION['msg']);
                                                        unset($_SESSION['status']);
                                                    @endphp
                                                </div>
                        @endif

                        <form action="{{ url("users/{$user['id']}/update") }}" enctype="multipart/form-data"
                            method="POST">

                            <div class="mb-3 mt-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" value="{{$user['name']}}" name="name">
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" value="{{$user['email']}}"
                                    name="email">
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="avatar" class="form-label">Avatar:</label>
                                <input type="file" class="form-control" id="avatar" placeholder="Enter avatar"
                                    name="avatar">
                                <img src="{{asset($user['avatar'])}}" alt="" width="100px">
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="text" class="form-control" id="password" placeholder="Enter password"
                                    name="password">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection