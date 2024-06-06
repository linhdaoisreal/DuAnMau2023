@extends ('layouts.master')

@section('title')
<h1>Update categories {{$category['id']}}</h1>
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h2 class="m-0">Cập nhật user {{$user['id']}}</h2>
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

                <form action="{{ url("admin/categories/{$category['id']}/update") }}" enctype="multipart/form-data"
                    method="POST">
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" value="{{$category['name']}}" name="name">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Email:</label>
                        <select class="form-control" name="status" id="">
                            @php
                                if($category['status'] == 1){
                                    echo "
                                        <option value='1'>Disable</option>
                                        <option value='0'>Active</option>
                                    ";
                                }else{
                                    echo "
                                        <option value='0'>Active</option>
                                        <option value='1'>Disable</option>
                                    ";
                                }
                            @endphp
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection