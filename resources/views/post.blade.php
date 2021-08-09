@extends('layouts.user',array('categories',$categories))
@section('title',"$post->title - نوتابيديا ")
@section('postTitle',$post->title)
@section('postImage',"https://www.nootapedia.com/uploads/posts/images/$post->image")
@section('MetaDescription',$post->meta_description)
@section('MetaKeywords',$post->keywords)
@section('content')

    <!-- posts -->
    <div class="col-md-12 p-5" style="height:500px;background-image: url('{{ asset('uploads/posts/images')}}/{{ $post->image }}');background-size:cover">
    @if( $post->type == "guest" )
        <div class="m-5" style="margin-top:150px !important">        
              
                            <p class="alert text-white text-center" style="background-color:rgba(0,0,0,.6);font-size: 2.2rem">
                                مقالات القرّاء 
                            </p>
                    
                </div>
            @endif
    </div>
    <div class="container pt-2  mb-5  col-lg-8  col-md-12 pShadow">
                <div class="alert " style="background-color:#212529b8 !important; " >
                    
                    <h1 class="text-center text-white" style="font-size:1.5rem"> {{ $post->title }}</h1>
                    
                </div>
                
      
        <div class="row">


            <div class="col-12">                
                   
                    <a href="{{ Route('CategoryPost',['id'=> $post->category->id ,'name'=>$post->category->slug]) }}" class="btn text-white" style="background-color:RGBA(32, 32, 32,.9) "><i class="bi bi-tag-fill"></i> {{ $post->category->name }}</a>
                    <span class="btn text-white" style="background-color:RGBA(32, 32, 32,.4) "><i class="bi bi-calendar-fill"></i>@php setlocale(LC_TIME, 'ar_TN.utf8') @endphp {{  Carbon\Carbon::parse($post->published_at)->formatLocalized('%A %d %B %Y') }}</span>
                   
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
        <div class="col-12">
   <!-- Start Annonce -->
   

   <!-- annonce1 -->
   <ins class="adsbygoogle"
        style="display:block"
        data-ad-client="ca-pub-6342943160992337"
        data-ad-slot="5367456066"
        data-ad-format="auto"
        data-full-width-responsive="true"></ins>
  
   <!-- Fin Annonce -->
   <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
</script>
        </div>
         
            <div class="col-12 pt-5 single_post" >
                @if($post->post_type == "new")
                {!! $post->content !!}
                @else
                    <p style="font-size:1.4rem;margin-bottom:70px;" >
                    {!! nl2br(e($post->content)) !!}
                    </p>
                @endif
                   
                   
             </div>
             <div class="col-12">
               

                <ins class="adsbygoogle"
                    style="display:block; text-align:center;"
                    data-ad-layout="in-article"
                    data-ad-format="fluid"
                    data-ad-client="ca-pub-6342943160992337"
                    data-ad-slot="9914858125"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                   </script>
                
             </div>
             <h2 class="text-center mb-3">شارك المقال </h2>
             <div class="sharethis-inline-share-buttons mb-3"></div>
             <div class="alert alert-secondary" role="alert">
                <h4 ><i class="bi bi-person-square"></i> إعداد و كتابة المقال :<span class="text-success">@if( $post->type == "writer" ) {{ $post->user->name }} @else {{ $post->writer_name }} @endif<span></h4>
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
               <h3> ماذا تعرف عن "{{ $post->title }}" شاركنا بها في التعليقات </h3>
             </div>
            <div class="fb-comments col-12" data-href="{{ url()->current() }}" data-width="100%" data-numposts="5"></div>
            <div id="fb-root"></div>
         
        </div>

    </div>



    
    <div class="col-12 row">
        
        <div class="col-lg-6 col-md-12 mb-5 p-3">
          
                
              
              
                       
                        @foreach($shufflePosts as $index => $post )
                    <a href="{{ route('showUserPost', ['id' => $post->id, 'title' => $post->slug]) }}"
                                class="btn btn-secondary d-block text-start mt-2"> {{ $post->title }} </a>
                            
                        @endforeach
     


        </div>
        <div class="col-lg-6 col-md-12 mb-5 p-3" style="overflow: hidden;">
       
            <ins class="adsbygoogle"
            style="display:block; text-align:center;"
            data-ad-layout="in-article"
            data-ad-format="fluid"
            data-ad-client="ca-pub-6342943160992337"
            data-ad-slot="9914858125"></ins>
            <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
            </script>

        </div>
        @foreach ($related as $rpost)
        <div class="col-lg-6 col-md-12 mb-5 p-3">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-lg-6 col-md-12"
                                    style="border-radius:0 3px 3px 0;min-height:290px;background-image: url({{ asset('uploads/posts/images') }}/{{ $rpost->image }});background-size:cover">



                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="card-body">


                                        <a style="text-decoration: none" href="{{ route('showUserPost', ['id' => $rpost->id, 'title' => $rpost->slug]) }}"  >
                                            <Strong style="font-size:1.2rem;color:#002E63"
                                            class="card-title">{{ $rpost->title }}</Strong>
                                        </a>
                                        <hr />
                                        <div class="card-text">

                                            @if($rpost->post_type == "new")
                                            {!! $rpost->short_description !!}
                                            @else
                                             
                                                {!! $rpost->content !!}
                                             
                                            @endif

                                        </div>
                                        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

                                        <p class="load-more card-text text-end"
                                            style="position: absolute;bottom: 10px;left: 10px;"><a
                                                href="{{ route('showUserPost', ['id' => $rpost->id, 'title' => $rpost->slug]) }}"
                                                class="btn btn-secondary"> عرض
                                                المزيد ... </a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


        @endforeach
        
    

    </div>
@endsection
