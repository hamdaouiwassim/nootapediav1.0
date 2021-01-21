<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>نوتابيديا : الصفحة الرئسية</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-mUkCBeyHPdg0tqB6JDd+65Gpw5h/l8DKcCTV2D2UpaMMFd7Jo8A+mDAosaWgFBPl" crossorigin="anonymous">
    <style>
        * {
            font-family: 'Tajawal', sans-serif;

        }

        [class^="bi-"]::before,
        [class*=" bi-"]::before {
            line-height: 1.5;
        }
        p{
        font-size: 22px;
    }

    </style>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v9.0" nonce="apurE7hi"></script>
</head>

<body>
    <div id="app">
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">نوتابيديا</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        @if( Auth::user() )
                    
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard"><i class="bi bi-sliders"></i> لوحة تحكم </a>
                        </li>
                 
                        @endif
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-house-fill"></i>
                                الرئسية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-info-circle-fill"></i> عن نوتابيديا</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-mailbox2"></i> تواصل معنا</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-share-fill"></i> شارك مقالتك </a>
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
            <hr>
            <p class="text-center">
                <span style="font-size: 12px;"> كل الحقوق محفوظة لنوتابيديا - 2020 | محتوانا مقدم للجميع فالمرجو إحترامه
                    و
                    عدم تشويهه او نسخه او استخدامه لأغراض شخصية دون إذن مسبق </span>
            </p>
        </footer>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
</script>

</html>
