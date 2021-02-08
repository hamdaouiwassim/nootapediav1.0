@extends('layouts.user',array('categories',$categories))
@section('title',$post->title)
@section('MetaDescription',$post->meta_description)

@section('content')
    <!-- posts -->
    <div class="col-md-12" style="height:500px;background-image: url('{{ asset('uploads/posts/images')}}/{{ $post->image }}');background-size:cover">
       
    </div>
    <div class="container pt-2  mb-5  col-lg-8  col-md-12">
                <div class="alert " style="background-color:#212529b8 !important; " >
                    <h2 class="text-center text-white"> {{ $post->title }}</h2>
                    
                </div>
                
      
        <div class="row">


            <div class="col-12">                
                    <button class="btn btn-primary"><i class="bi bi-calendar-fill"></i> {{ $post->created_at->format('Y/m/d') }}</button>
                    <button class="btn btn-success"><i class="bi bi-eye-fill"></i> {{ $post->views }}</button>
                   
                    <a href="{{ Route('CategoryPost',['name'=>$post->category->name]) }}" class="btn btn-danger"><i class="bi bi-tag-fill"></i> {{ $post->category->name }}</a>
                    <div class="card text-center mt-3">
                        @if($post->soundfile)
                        <div class="card-header"> الإستماع صوتيّا الى المقال </div>
                        <div class="card-body" style="text-align: center !important">
                            <audio controls="">

                                <source src="{{ asset('uploads/posts/sounds')}}/{{ $post->soundfile }}"
                                    type="audio/mp3">
                                Your browser does not support the audio element.
                            </audio>

                        </div>
                        @endif
                    </div>
            </div>
        <div class="col-12 text-center">
            <img src="{{ asset('uploads/posts/images')}}/{{ $post->image }}" alt="{{ $post->title }}" class="img-fluid img-thumbnail">

        </div>
            <div class="col-12 pt-5" >
            <p style="font-size:1.4rem">
                    {!! nl2br(e($post->content)) !!}
                    </p>
        
            
               
             </div>
             <div class="alert alert-secondary mt-3">
                 رأيك يستحقّ أن يسمعه الأخرون ... إترك تعليقك ليعرف العالم من أنت 
             </div>
            <div class="fb-comments col-12" data-href="{{ url()->current() }}" data-width="100%" data-numposts="5"></div>
        </div>

    </div>



    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v9.0" nonce="apurE7hi"></script>
    
@endsection
