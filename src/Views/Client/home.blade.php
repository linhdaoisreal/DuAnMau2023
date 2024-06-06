@extends ('layouts.master')

@section('title')
Home Page
@endsection

@section('content')

<!-- start of banner -->
@include('layouts.partials.banner')

<section class="section-sm">
    <div class="container">
        <div class="row justify-content-center">

            <!-- Recent Post -->
            @include('layouts.partials.recentpost')

            <!-- Aside -->
            @include('layouts.partials.aside')

        </div>
    </div>
</section>

@endsection