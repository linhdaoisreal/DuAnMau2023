@extends ('layouts.master')

@section('title')
<h1>Chi tiết user</h1>
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h2 class="m-0">Chi tiết User {{$user['id']}}</h2>
                    </div>
                </div>
            </div>
            <div class="white_card_body">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Trường</th>
                            <th>Giá trị</th>
                    </thead>
                    <tbody>

                        @foreach ($user as $field => $value)
                            <tr>
                                <td>
                                    <?= $field?>
                                </td>
                                <td>
                                    <?= $value?>
                                </td>
                            </tr>
                        @endforeach               
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection