@extends('layouts.user',array('categories',$categories))
@section('title',$post->title)
@section('MetaDescription',$post->meta_description)

@section('content')
    <!-- posts -->
    <div class="col-md-12" style="height:500px;background-image: url('{{ asset('uploads/posts/images')}}/{{ $post->image }}');background-size:cover">
       
    </div>
    <div class="container pt-2  mb-5  col-lg-8  col-md-12">
                <div class="alert " style="background-color:#212529b8 !important; " >
                    <h1 class="text-center text-white" style="font-size:1.5rem"> {{ $post->title }}</h1>
                    
                </div>
                
      
        <div class="row">


            <div class="col-12">                
                    <button class="btn btn-primary"><i class="bi bi-calendar-fill"></i> {{ $post->published_at }}</button>
                    <button class="btn btn-success"><i class="bi bi-eye-fill"></i> {{ $post->views }}</button>
                   
                    <a href="{{ Route('CategoryPost',['id'=> $post->category->id ,'name'=>$post->category->slug]) }}" class="btn btn-danger"><i class="bi bi-tag-fill"></i> {{ $post->category->name }}</a>
                    @if($post->soundfile)
                    <div class="card text-center mt-3">
                     
                        <div class="card-header"> الإستماع صوتيّا الى المقال </div>
                        <div class="card-body" style="text-align: center !important">
                            <audio controls="">

                                <source src="{{ asset('uploads/posts/sounds')}}/{{ $post->soundfile }}"
                                    type="audio/mp3">
                                Your browser does not support the audio element.
                            </audio>

                        </div>
                       
                    </div>
                    @endif
            </div>
        <div class="col-12 text-center mt-2">
            <img src="{{ asset('uploads/posts/images')}}/{{ $post->image }}" alt="{{ $post->title }}" class="img-fluid img-thumbnail">

        </div>
            <div class="col-12 pt-5" >
                    <p style="font-size:1.4rem;margin-bottom:70px;" >
                    {!! nl2br(e($post->content)) !!}
                    </p>
                   
                   
             </div>
             <div class="alert alert-secondary" role="alert">
                <h4 ><i class="bi bi-person-square"></i> إعداد و كتابة المقال :<span class="text-success"> {{ $post->user->name }} <span></h4>
                @if($post->verificateur_name)
                <hr />
                <h4 ><i class="bi bi-person-bounding-box"></i> تدقيق المقال : <span class="text-success"> {{ $post->verificateur_name }} <span> </h4>
               @endif
               @if($post->soundfile)
               <hr />
               <h4 ><i class="bi bi-file-earmark-music-fill"></i> الأداء الصوتي : <span class="text-success"> حمداوي وسيم <span> </h4>
               @endif
              </div>
             <div class="alert alert-secondary mt-3 mr-2 ml-2">
                 رأيك يستحقّ أن يسمعه الأخرون ... أترك تعليقك ليعرف العالم من أنت 
             </div>
            <div class="fb-comments col-12" data-href="{{ url()->current() }}" data-width="100%" data-numposts="5"></div>
        </div>

    </div>



    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v9.0" nonce="apurE7hi"></script>
    
@endsection
