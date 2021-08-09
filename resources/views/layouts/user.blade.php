<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="@yield('MetaKeywords')">
    <meta name="description" content="@yield('MetaDescription')">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:title" content="@yield('postTitle')">
    <meta property="og:image" content="@yield('postImage')">
    <title>نوتابيديا :  @yield('title')</title>
    <link rel="icon" href="{{ asset('img/1.png') }}" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ asset('css/icons/bootstrap-icons.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-rtl.css') }}">
   <link  rel="stylesheet" href="{{ asset('css/custom.css') }}">
   <script data-ad-client="ca-pub-6342943160992337" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
   <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v9.0" nonce="apurE7hi"></script>
    
    
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
            @yield('content')
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
                    <a href="https://twitter.com/nootapedia" target="_blank" class="btn btn-outline-secondary text-white"><i class="bi bi-twitter"></i></a>
                    <a href="https://www.youtube.com/channel/UC-go6AWhZuxnLFC_UKDFWlw" target="_blank" class="btn btn-outline-secondary text-white"><i class="bi bi-youtube"></i></a>
                </p>
            <hr>
           
            <p class="text-center p-2">
                <a href="{{ route('Privacy') }}" class="text-white" style="font-size: 14px;text-decoration:none;">سياسة الخصوصية</a> |
                <a href="https://www.nootapedia.com/sitemap.xml" class="text-white" style="font-size: 14px;text-decoration:none;">خريطة الموقع</a>
            </p>
           
            <hr>
            <div class=" text-center">

                <div class="fb-page" 
                data-href="https://www.facebook.com/nootapedia"
                style="max-width: 380px;width:100%"
                data-hide-cover="false"
                data-show-facepile="false"></div>
            </div>
            <hr />
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
   <!-- Global site tag (gtag.js) - Google Analytics -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=G-P1CHPHZCDN"></script>
  
   <script>
       window.dataLayer = window.dataLayer || [];

       function gtag() {
           dataLayer.push(arguments);
       }
       gtag('js', new Date());

       gtag('config', 'G-P1CHPHZCDN');

   </script>
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=60ec5290ad0bf0001b123089&product=inline-share-buttons" async="async"></script>
    @yield('scriptsfiles')
</html>
