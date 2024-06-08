@extends ('layouts.master')

@section('title')
List Post
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h2 class="m-0">List Post</h2>
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

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>IMAGE</th>
                                <th>NAME</th>
                                <th>CREATED AT</th>
                                <th>UPDATED AT</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($posts as $post)
                                <tr>
                                    <td>
                                        <?= $post['id']?>
                                    </td>
                                    <td><img src="{{asset($post['image'])}}" alt="" width="100px"></td>
                                    <td>
                                        <?= $post['tittle']?>
                                    </td>
                                    <td>
                                        <?= $post['created_at']?>
                                    </td>
                                    <td>
                                        <?= $post['updated_at']?>
                                    </td>
                                    <td>
                                        @if ($post['status'] == 1)
                                            Disable
                                        @elseif($post['status'] == 0)
                                            Active
                                        @endif
                                    </td>
                                    <td>

                                        <a class="btn btn-danger" href="{{ url('admin/posts/' . $post['id'] . '/delete') }}"
                                            onclick="return confirm('Bạn có muốn xoá?')">Delete</a>

                                        <form action="{{ url('admin/posts/' . $post['id'] . '/change_status') }}" method="post">
                                            @if ($post['status'] == 1)
                                                <input type="hidden" value="0" name="status">
                                            @elseif($post['status'] == 0)
                                                <input type="hidden" value="1" name="status">
                                            @endif
                                            <button class="btn btn-warning" type="submit">Change Status</button>
                                        </form>

                                        <a class="btn btn-info" href="{{ url('admin/posts/' . $post['id'] . '/show') }}">Show</a>

                                    </td>
                                </tr>
                            @endforeach    
                                
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="justify-content-center">
            @php
                for($i = 1; $i <= $totalPage; $i++){
                    echo '<a href="'.url('admin/posts/?page='.$i.'').'" class="btn btn-light mx-2">'.$i.'</a>';
                }
            @endphp
            </div>
        </div>
    </div>

</div>

@endsection