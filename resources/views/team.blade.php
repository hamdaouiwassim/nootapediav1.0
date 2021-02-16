@extends('layouts.user',array('categories',$categories))
@section('title', 'فريق العمل')
@section('content')
    <!-- posts -->

    <div class="container mt-5 pt-5  mb-5  col-lg-8  col-md-12">
        <div class="alert alert-secondary text-center">
            <h4><i class="bi bi-people-fill"></i> فريق العمل

            </h4>
        </div>
        <p class="p-3">
            من أجل تقديم محتوى متفرّد , يرتقي إلى مستوى إنتظارات القارء العربي من جودة محتوى و سلاسة في الأسلوب يعمل فريق
            كامل من الكتّاب و المدققين من أجل تقديم الأفضل دائما و هذه لائحة العاملين على الموقع و مقدمي المحتوى .

        </p>
    <div class="row">
        @foreach ($team as $user)
            <div class="col-lg-4 col-md-6 mt-3">
                <div class="card">
                    <img  style="height:200px" src="@if($user->avatar) {{ asset('uploads/users/images') }}/{{ $user->avatar }} @else {{ asset('uploads/users/images/user.png') }} @endif" class="card-img-top img-thumbnail"
                        alt="{{ $user->name }}">
                        <h3 class="text-center mt-3">{{ $user->name  }}</h3>
                    <div class="card-body">
                        <p class="card-text">{{ $user->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach


    </div>
    </div>





@endsection
