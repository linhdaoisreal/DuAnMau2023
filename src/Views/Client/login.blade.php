@extends ('layouts.master')

@section('title')
Login
@endsection

@section('content')
<section class="section-sm">
    <div class="container">
        <h1 class="mt-5  text-center">Login</h1>

        @if (!empty($_SESSION['error']))
                <div class="alert alert-warning mt-3 mb-3">
                    {{$_SESSION['error']}}
                </div>

                @php
                    unset($_SESSION['error']);
                @endphp
        @endif


        <div class="row justify-content-center">
            <form action="{{ url('handle-login') }}" method="POST">
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{url('/users/create')}}" class="btn btn-primary">Create New Account</a>
            </form>
        </div>
    </div>
</section>
@endsection