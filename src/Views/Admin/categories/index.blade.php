@extends ('layouts.master')

@section('title')
Categories
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h2 class="m-0">Categories</h2>
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

                <a href="{{ url('admin/categories/create') }}" class="btn btn-primary">Add new</a>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>CATEGORY NAME</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($categories as $category)
                                <tr>
                                    <td>
                                        <?= $category['id']?>
                                    </td>
                                    <td>
                                        <?= $category['name']?>
                                    </td>
                                    <td>
                                        @php
                                            if($category['status'] == 0){
                                                echo 'Active';
                                            }else{
                                                echo 'Disable';
                                            }
                                        @endphp
                                    </td>
                                    <td>

                                        <a href="{{ url('admin/categories/' . $category['id'] . '/delete') }}"
                                            onclick="return confirm('Bạn có muốn xoá?')" class="btn btn-danger">Delete</a>

                                        <a href="{{ url('admin/categories/' . $category['id'] . '/edit') }}" 
                                        class="btn btn-warning">Update</a>

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
                    echo '<a href="'.url('admin/categories/?page='.$i.'').'" class="btn btn-light mx-2">'.$i.'</a>';
                }
            @endphp
            </div>
        </div>
    </div>

</div>

@endsection