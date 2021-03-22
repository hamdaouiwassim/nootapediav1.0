
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{{ $post->meta_description }}">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>نوتابيديا :  {{ $post->title }}</title>
    <link rel="icon" href="{{ asset('img/1.png') }}" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ asset('css/icons/bootstrap-icons.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-rtl.css') }}">
   <link  rel="stylesheet" href="{{ asset('css/custom.css') }}">

</head>

<body>
    <div id="app">
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand mx-auto" style="padding-right:70px;"  href="/"> <img src="{{ asset('uploads/Logo-nootapedia-white.png') }}" alt="Nootapedia" style="height:40px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" style="margin:0 auto;text-align:center" id="navbarNav">
                    <ul class="navbar-nav" style="margin:0 auto;">
                        @if( Auth::user() )
                    
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard"><i class="bi bi-sliders"></i> لوحة تحكم </a>
                        </li>
                 
                        @endif
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/"><i class="bi bi-house-fill"></i>
                                الرئيسية</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-diagram-3-fill"></i>
                              الأقسام
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @php $i = 0; @endphp
                                @foreach($categories as $category)
                                @php $i++; @endphp
                                
                              <li><a class="dropdown-item" href="{{ Route('CategoryPost',['id'=> $category->id ,'name'=>$category->slug]) }}">{{ $category->name }}</a></li>
                              @if( $i != count($categories)) <li><hr class="dropdown-divider"></li> @endif
                              @endforeach
                            </ul>
                          </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/aboutus"><i class="bi bi-info-circle-fill"></i> عن نوتابيديا</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact"><i class="bi bi-mailbox2"></i> تواصل معنا</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/sharewithus"><i class="bi bi-share-fill"></i> شارك مقالتك </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/team"><i class="bi bi-people-fill"></i> فريق العمل  </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/search"><i class="bi bi-search"></i> البحث </a>
                        </li>
                    
                    </ul>
                   
                   
                </div>
                
            </div>
        </nav>
        <main>
    <!-- posts -->
    <div class="col-md-12" @if($post->image) style="height:500px;background-image: url('{{ asset('uploads/posts/images')}}/{{ $post->image }}');background-size:cover" @else style="height:500px;background-image: url('{{ asset('img/nootapedia.png')}}');background-size:cover" @endif >
        @if( $post->type == "guest" )
        <div class="m-5 p-5">        
                <div class="m-5 p-5">
                            <p class="alert text-white text-center m-5 p-5" style="background-color:rgba(0,0,0,.6);font-size: 2.5rem">
                                مقالات القرّاء 
                            </p>
                    </div>
                </div>
            @endif
    </div>
    <div class="container pt-2  mb-5  col-lg-8  col-md-12">
                <div class="alert " style="background-color:#212529b8 !important; " >
                    <h2 class="text-center text-white"> {{ $post->title }}</h2>
                </div>
                
      
        <div class="row">


            <div class="col-12">                
                    <button class="btn btn-primary"><i class="bi bi-calendar-fill"></i> {{ $post->created_at->format('Y/m/d') }}</button>
                    <button class="btn btn-success"><i class="bi bi-eye-fill"></i> {{ $post->views }}</button>
                    <a href="{{ Route('CategoryPost',['id'=> $post->category->id ,'name'=>$post->category->name]) }}" class="btn btn-danger"><i class="bi bi-tag-fill"></i> {{ $post->category->name }}</a>
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
                @if($post->image)
            <img src="{{ asset('uploads/posts/images')}}/{{ $post->image }}" alt="{{ $post->title }}" class="img-fluid img-thumbnail">
            @else
            <img src="{{ asset('img/nootapedia.png')}}" alt="{{ $post->title }}" class="img-fluid img-thumbnail">
                @endif
        </div>
            <div class="col-12 pt-5">
                <p style="font-size:1.4rem">
                    {!! nl2br(e($post->content)) !!}
                    </p>
               
             </div>
             <div class="alert alert-secondary mt-3 mr-2 ml-2">
                 رأيك يستحقّ أن يسمعه الأخرون ... إترك تعليقك ليعرف العالم من أنت 
             </div>
           
        </div>

    </div>
</main>
        <!-- footer -->
        <footer class="bg-dark p-4 text-white">
            <p class="text-center"> <img src="{{ asset('uploads/Logo-nootapedia-white.png') }}" alt="Nootapedia" style="height: 70px;" > </p>
            <p class="text-center" style="width:80%;margin:0 auto;font-size:1.2rem"> منصة عربية تثقيفية هدفها إثراء المحتوى العربي على
                الأنترنت من خلال مقالات و بحوث و أراء في العديد من المجالات , التاريخ , العلوم , تكنولوجيا , الأدب و
                الفنّ
                ... يوفر الموقع خاصيّة الاستماع للمقالات صوتيا . </p>
                <p class="text-center p-4">
                    <a href="https://www.instagram.com/nootapedia" target="_blank" class="btn btn-outline-secondary text-white"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.facebook.com/nootapedia" target="_blank" class="btn btn-outline-secondary text-white"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.youtube.com/channel/UC-go6AWhZuxnLFC_UKDFWlw" target="_blank" class="btn btn-outline-secondary text-white"><i class="bi bi-youtube"></i></a>
                </p>
            <hr>
            <p class="text-center p-2">
                <a href="{{ route('Privacy') }}" class="text-white" style="font-size: 14px;text-decoration:none;">سياسة الخصوصية</a> |
                <a href="https://www.nootapedia.com/sitemap.xml" class="text-white" style="font-size: 14px;text-decoration:none;">خريطة الموقع</a>
            </p>
           
            <hr>
            <p class="text-center">
                <span style="font-size: 12px;"> كل الحقوق محفوظة لنوتابيديا - 2020 | محتوانا مقدم للجميع فالمرجو إحترامه
                    و
                    عدم تشويهه او نسخه او استخدامه لأغراض شخصية دون إذن مسبق </span>
            </p>
        </footer>
    </div>

</body>
     
<script src="{{ asset('bootstrap5/js/bootstrap.bundle.min.js') }}">
</script>

</html>



 

