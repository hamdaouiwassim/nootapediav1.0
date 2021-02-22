@extends('layouts.user',array('categories',$categories))
@section('title','نتائج البحث')
@section('MetaDescription',"نتائج البحث")
@section('content')
 <!-- posts -->
 <div class="container mt-5 pt-5 mb-5">
    <div class="alert alert-secondary d-flex">
        <h4>
            <i class="bi bi-search"></i> نتائج البحث عن :
        </h4>
        <h4 class="text-primary" style="line-height: 1.5"> " {{ $searchkeywords }} "</h4>
    </div>
    <div class="row">
        @if( count($posts) > 0 )
        @foreach($posts as $post)
        <div class="col-lg-6 col-md-12">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-lg-6 col-md-12"  style="border-radius:0 3px 3px 0;min-height:200px;background-image: url({{ asset('uploads/posts/images')}}/{{ $post->image  }});background-size:cover">

                        
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card-body">


                            <h3 class="card-title" style="color:#2c3e50">{{ $post->title }}</h3>
                            <hr />
                            <div class="card-text">
                               {{ $post->content }}
                            </div>

                            <hr />


                            <p class="card-text text-end"><a href="{{ route('showUserPost',[ 'id'=> $post->id ,'title'=> $post->title])}}" class="btn btn-secondary"> عرض
                                    المزيد ... </a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
@else
<div class="p-4">
        <p>
            نأسف لم نتمكن من إيجاد نتائج لما توّد البحث عنه ... 
        </p>
</div>     
@endif

    </div>

</div>




@endsection
   