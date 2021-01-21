<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
          <link rel="stylesheet" href="{{asset('css/custom.css')}}">
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
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/"><i class="bi bi-house-fill"></i>
                                الموقع</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboardposts') }}"><i class="bi bi-file-earmark-medical-fill"></i> مقالات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboardcategories') }}"><i class="bi bi-tags-fill"></i> تصنيفات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboardusers') }}"><i class="bi bi-people-fill"></i> المستخدمون </a>
                        </li>
                       
                    </ul>

                    <div class="ms-auto">
                      
                          
                                <a class="btn btn-secondary" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                              <i class="bi bi-door-closed-fill"></i>
                                 الخروج
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form></li>
                          
                          

                    </div>
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
<script src="https://cdn.tiny.cloud/1/rkxysyae7nlmq1kbb3p7v6em52ftswe79448py4wh1eyccq5/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: '#editor',
      rtl_ui:true ,
      directionality :"rtl",
    // change this value according to your HTML
    plugins: ['directionality',
                'autolink',
                'codesample',
                'link',
                'lists',
                'media',
                'table',
                'image',
                'quickbars',
                'codesample',
                'help'
    ],
    toolbar: 'image link lists',


    
    });
  </script>
  
  <script src="{{ asset('js/jquery.js') }}" ></script>
  <script src="{{ asset('js/tags-input.js') }}"></script> 
<script>
    $(function() {
var citynames = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        url: "../getCreditors",
        replace: function(url, query) {
            return url + "?q=" + query;
        },
        ajax : {
            type: "POST",
            data: {
                q: function() {
                    return $('#tags-input').val()
                }
            }
        }
    }
});
citynames.initialize();

$('input').tagsinput({
  typeaheadjs: {
    name: 'citynames',
    displayKey: 'name',
    valueKey: 'name',
    source: citynames.ttAdapter()
  }
});    
    });
</script>

</html>
