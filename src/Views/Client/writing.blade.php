@extends ('layouts.master')

@section('title')
Writting Page
@endsection

@section('content')


<section class="section-sm">
    <div class="container">
        <h1 class="text-center">Write Your Post</h1>

        @if (!empty($_SESSION['errors']))
                <div class="alert alert-warning">
                    <ul>
                        @foreach ($_SESSION['errors'] as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

                @php
                    unset($_SESSION['errors'])
                @endphp
        @endif

        @if (isset($_SESSION['status']) && !empty($_SESSION['msg']))
                <div class="alert alert-success">
                    {{ $_SESSION['msg'] }}
                </div>

                @php
                    unset($_SESSION['msg'])
                @endphp
        @endif

        <!-- Form Writting -->
        <div class="row justify-content-center">

            <form action="{{ url('writing/store') }}" enctype="multipart/form-data" method="POST">

                <!-- Tittle -->
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="tittle">
                </div>

                <!-- Image -->
                <div class="mb-3 mt-3">
                    <label for="avatar" class="form-label">Image:</label>
                    <input type="file" class="form-control" id="avatar" placeholder="Enter avatar" name="image">
                </div>

                <!-- Genre -->
                <ul class="mb-3 mt-3">
                    <label for="categories" class="form-label">Categories:</label>
                    <ul class="list-inline widget-list-inline">
                        @php
                            foreach ($categories as $category) {
                                echo '
                                    <div class="list-inline-item">
                                        <input class="" type="checkbox" name="category_id[]" id="" value="' . $category['id'] . '">
                                        <span>  ' . $category['name'] . '</span>
                                    </div>
                                ';
                            }
                        @endphp
                    </ul>
                </div>

                <!-- Content -->
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Content:</label>
                    <textarea name="content" id="content" cols="50" rows="25" class=""></textarea>
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</section>

@endsection