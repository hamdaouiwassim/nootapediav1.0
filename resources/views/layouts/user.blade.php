<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="@yield('MetaDescription')">
    <meta name=”robots” content="index, follow">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>نوتابيديا :  @yield('title')</title>
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
                <a class="navbar-brand" style="margin-right:70px;"  href="/">نوتابيديا</a>
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
                                الرئسية</a>
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
                                
                              <li><a class="dropdown-item" href="{{ Route('CategoryPost',['name'=> $category->name ])}}">{{ $category->name }}</a></li>
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
            <p class="text-center"> نوتابيديا </p>
            <p class="text-center" style="width:60%;margin:0 auto"> منصة عربية تثقيفية هدفها إثراء المحتوى العربي على
                الأنترنت من خلال مقالات و بحوث و أراء في العديد من المجالات , التاريخ , العلوم , تكنولوجيا , الأدب و
                الفنّ
                ... يوفر الموقع خاصيّة الاستماع للمقالات صوتيا . </p>
                <p class="text-center p-4">
                    <a href="https://www.instagram.com/nootapedia" target="_blank"class="btn btn-outline-secondary text-white"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.facebook.com/nootapedia" target="_blank"class="btn btn-outline-secondary text-white"><i class="bi bi-facebook"></i></a>
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
