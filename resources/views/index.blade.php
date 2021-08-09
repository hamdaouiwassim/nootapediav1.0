@extends('layouts.user',array('categories',$categories))
@section('title',' نوتابيديا : موسوعة عربيّة تثقيفيّة ')
@section('MetaDescription',
    ' منصة عربية هدفها إثراء المحتوى العربي على الأنترنت من خلال مقالات وبحوث وأراء في العديد من
    المجالات، التاريخ، العلوم، تكنولوجيا، الأدب والفنّ مع خاصيّة الإستماع الصوتي للمقالات')
@section('MetaKeywords','')
@section('content')
    <!-- posts -->
    <div class="container mt-5 pt-5 mb-5">
        @if ($todayevent)      
    <div class="col-12 card mb-3">
            
            <div class="row">
            
                    <div  class="col-lg-3 col-sm-12">
                   <span style="position:absolute;top:0;background-color:#e74c3c;color:white;padding:13px;">حدث  اليوم </span>
                    <img class="col-12" src="{{ asset('uploads/todayevents/images') }}/{{ $todayevent->image }}" alt="{{ $todayevent->title}}" style="height:200px">
                    
                      </div>
                    
                    <div class="col-lg-9 col-sm-12">
                    
                    <h2 class="text-success pt-3 ms-3"> {{ $todayevent->title}} </h2>
                    <p  class="mt-3 me-2 ms-3" style="font-size:18px">
                        
                        {{ $todayevent->description }}
                    </p>
                    </div>
            
                
            </div>
                               
</div>
@endif 
@if ($posts->currentPage() == 1)
<div class="col-12 row" >
    <div class="col-lg-6 col-12 pe-lg-2 mb-2">
        <div id="carouselExampleFade" class="carousel slide carousel-fade carousel-dark" data-bs-ride="carousel" >
            <div class="carousel-inner">
                @foreach ($mostReadedPosts as  $index => $post)
                @if($index == 0 )
                <div class="carousel-item active">
                    <img src="{{ asset('uploads/posts/images') }}/{{ $post->image }}" class="d-block w-100" alt="{{ $post->title }}" style="height: 350px">
                    <div class="carousel-caption d-md-block p-2 text-white" style="background: #0000009e">
                      <a style="text-decoration: none" href="{{ route('showUserPost', ['id' => $post->id, 'title' => $post->slug]) }}"  >
                                            <Strong style="font-size:1.2rem"
                                            class="card-title text-white">{{ $post->title }}</Strong>
                                        </a>
                    
                    </div>
                  </div>
                @elseif ($index < 3  )
                <div class="carousel-item">
                    <img src="{{ asset('uploads/posts/images') }}/{{ $post->image }}" class="d-block w-100" alt="{{ $post->title }}" style="height: 350px">
                    <div class="carousel-caption d-md-block p-2 text-white" style="background: #0000009e">
                      <a style="text-decoration: none" href="{{ route('showUserPost', ['id' => $post->id, 'title' => $post->slug]) }}"  >
                                            <Strong style="font-size:1.2rem"
                                            class="card-title text-white">{{ $post->title }}</Strong>
                                        </a>
                
                    </div>
                  </div>
                @endif
            
                @endforeach
            </div>
          
       
          </div>
    </div>
    <div class="col-lg-6 col-12  ps-lg-2 mb-2 d-none d-sm-block">
        <div id="carouselExampleFade1" class="carousel slide carousel-fade carousel-dark" data-bs-ride="carousel" >
            <div class="carousel-inner">
                @foreach ($shuffled as  $index => $post)
                @if($index == 0 )
                <div class="carousel-item active">
                    <img src="{{ asset('uploads/posts/images') }}/{{ $post->image }}" class="d-block w-100" alt="{{ $post->title }}" style="height: 350px">
                    <div class="carousel-caption d-md-block p-2 text-white" style="background: #0000009e">
                       <a style="text-decoration: none" href="{{ route('showUserPost', ['id' => $post->id, 'title' => $post->slug]) }}"  >
                                            <Strong style="font-size:1.2rem"
                                            class="card-title text-white">{{ $post->title }}</Strong>
                                        </a> 
                    
                    </div>
                  </div>
                @elseif ($index < 3  )
                <div class="carousel-item">
                    <img src="{{ asset('uploads/posts/images') }}/{{ $post->image }}" class="d-block w-100" alt="{{ $post->title }}" style="height: 350px">
                    <div class="carousel-caption d-md-block p-2" style="background: #0000009e">
                       <a style="text-decoration: none" href="{{ route('showUserPost', ['id' => $post->id, 'title' => $post->slug]) }}"  >
                                            <Strong style="font-size:1.2rem"
                                            class="card-title text-white">{{ $post->title }}</Strong>
                                        </a> 
                
                    </div>
                  </div>
                @endif
            
                @endforeach
            </div>
          
       
          </div>
    </div>
  


</div>          
@endif

<div class="col-12">
  
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
        <div class="alert alert-secondary mt-3">
            @if ($posts->currentPage() == 1)
            <h4>
                <i class="bi bi-calendar2-check"></i> أحدث المقالات
            </h4>
            @else
            <h4>
                <i class="bi bi-calendar2-check"></i> مقالات سابقة
            </h4>
            @endif
        </div>
        <div class="row" >
            @php $i=0; @endphp
            @foreach ($posts as $post)
                @if ($i < 4)
                    <div class="col-lg-6 col-md-12 @if($i % 2 == 0) pe-lg-2 @else ps-lg-2 @endif">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-lg-6 col-md-12"
                                    style="border-radius:0 3px 3px 0;min-height:290px;background-image: url({{ asset('uploads/posts/images') }}/{{ $post->image }});background-size:cover">

                                    
                                    <a style="text-decoration:none;position:absolute;top:0;background-color:rgba(20,20,20,.7);color:white;padding:13px;" href="{{ route('CategoryPost', ['id' => $post->category->id, 'name' => $post->category->slug]) }}"  >
                                        
                                       {{ $post->category->name }}
                                    </a> 

                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="card-body">


                                        <a style="text-decoration: none" href="{{ route('showUserPost', ['id' => $post->id, 'title' => $post->slug]) }}"  >
                                            <Strong style="font-size:1.2rem;color:#002E63"
                                            class="card-title">{{ $post->title }}</Strong>
                                        </a> 
                                        <hr />
                                        <div class="card-text">

                                            @if($post->post_type == "new")
                                            {!! $post->short_description !!}
                                            @else
                                             
                                                {!! $post->content !!} 
                                             
                                            @endif

                                        </div>
                                        <p class="load-more card-text text-end"
                                            style="position: absolute;bottom: 10px;left: 10px;"><a
                                                href="{{ route('showUserPost', ['id' => $post->id, 'title' => $post->slug]) }}"
                                                class="btn btn-secondary"> عرض
                                                المزيد ... </a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                @endif
                @php $i++; @endphp
            @endforeach
         
            @if (count($posts) > 3 )
            <div class="col-12">
               
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
          
            <div class="col-lg-6 col-md-12 p-2 pt-4 pb-4">
                <div >
                    
                        @php $i=0; @endphp
                        @foreach ($posts as $post)

                        @if ($i >= 4 && $i < 8)
                        <a style="text-decoration:none;" href="{{ route('CategoryPost', ['id' => $post->category->id, 'name' => $post->category->slug]) }}"  >
                            <span style="background-color:rgba(20,20,20,.7);color:white;padding:13px;margin-bottom:30px;width:100%">{{ $post->category->name }}</span>
                         
                                        
                            
                         </a> 
                         <br >
                         <br >
                               <a style="text-decoration:none !important;" href="{{ route('showUserPost', ['id' => $post->id, 'title' => $post->slug]) }}" > <Strong style="font-size:1.2rem;color:#002E63;margin-bottom:30px;"
                                        class="card-title">{{ $post->title }}</Strong></a><br />
                                       <p style="margin-top:8px;font-size:18px;">   
                                                    @if($post->post_type == "new")
                                                    {!! $post->short_description !!}
                                                    @else
                                                    
                                                        {!! $post->content !!}
                                                    
                                                    @endif </p>
                                                    @if ( $i != 7 )
                                                    <hr style="border: .5px solid #6c757d;margin-top:7px;" />
                                                    @endif
                            @endif
                            @php $i++; @endphp
                        @endforeach
                   
                </div>
            </div>
            @endif
            @if (count($posts) > 7 )
            <div class="col-lg-6 col-md-12 p-2 pt-4 pb-4">
                <div >
                    
                        @php $i=0; @endphp
                        @foreach ($posts as $post)

                            @if ($i >= 8 && $i < 12 )
                            <a style="text-decoration:none;" href="{{ route('CategoryPost', ['id' => $post->category->id, 'name' => $post->category->slug]) }}"  >
                                <span style="background-color:rgba(20,20,20,.7);color:white;padding:13px;margin-bottom:30px;width:100%">{{ $post->category->name }}</span>
                             
                                            
                                
                             </a> 
                             <br >
                             <br >
                            <a style="text-decoration:none !important;" href="{{ route('showUserPost', ['id' => $post->id, 'title' => $post->slug]) }}" > <Strong style="font-size:1.2rem;color:#002E63;margin-bottom:30px;"
                                class="card-title">{{ $post->title }}</Strong></a><br />
                                       <p style="margin-top:8px;font-size:18px;">   @if($post->post_type == "new")
                                        {!! $post->short_description !!}
                                        @else
                                         
                                            {!! $post->content !!}
                                         
                                        @endif </p>
                                        @if ( $i != 11 )
                                       <hr style="border: .5px solid #6c757d;margin-top:7px;" />
                                       @endif

                            @endif
                            @php $i++; @endphp
                        @endforeach
                    
                </div>
            </div>
            @endif
            @if (count($posts) > 11 )
            <div class="col-12">
           
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
            
                    
                        @php $i=0; @endphp
                        @foreach ($posts as $post)
                        @if ( $i == 12 || $i == 13 )
                        <div class="col-lg-6 col-md-12 @if($i == 12) pe-lg-2 @else ps-lg-2 @endif ">
                            <div class="col-12 mb-2">
                          
                            <a href="{{ route('showUserPost', ['id' => $post->id, 'title' => $post->slug]) }}" class="btn btn-secondary col-12 p-3 flatBtn" >{{ $post->title }} ... </a>
                            <a href="{{ route('showUserPost', ['id' => $post->id, 'title' => $post->slug]) }}"  >
                                 <img src="{{ asset('uploads/posts/images') }}/{{ $post->image }}" alt="{{ $post->title }}"  class="img-hovred img-fluid">
                            </a>
                               
                               
                               
                            
                           
                        </div>
                    </div>
                    @endif
                    @php $i++; @endphp
                        @endforeach
                    
            @endif 
        

            <div class="p-3">
                {{ $posts->links() }}
            </div>
            

            {{-- <div class="col-6">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-lg-6 col-md-12">
                        <img src="https://picsum.photos/800" class="img-fluid" alt="...">
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card-body">


                            <h3 class="card-title" style="color:#2c3e50">ليوناردو دافنشي</h3>
                            <hr />
                            <div class="card-text">
                                لم هذا تسمّى إعادة مليون, ان يذكر فرنسا كما. إذ الدول الشتوية وأكثرها مدن. عرض بفرض
                                بتحدّي الأوضاع تم. أحدث شاسعة تكبّد أخر من, ٣٠ حتى الخاطفة العالمية, هناك عالمية وقد
                                لم. بشرية إتفاقية عل جهة, كل هُزم كانتا ضرب.
                            </div>

                            <hr />


                            <p class="card-text text-end"><button type="button" class="btn btn-secondary"> عرض
                                    المزيد ... </button></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="p-2 row">
            <div class="alert alert-dark">
                <h4>
                    <i class="bi bi-person-badge"></i> شخصيات
                </h4>
            </div>
            <div class="col-lg-6 col-md-12 p-2">
                <div class="card">
                    <img src="https://picsum.photos/seed/picsum/200" class="card-img-top" style="max-height: 200px"
                        alt="...">
                    <div class="card-body">
                        <p class="card-text">لم هذا تسمّى إعادة مليون, ان يذكر فرنسا كما. إذ الدول الشتوية وأكثرها مدن.
                            عرض بفرض بتحدّي الأوضاع تم.</p>
                        <div class="row">
                            <div class="col-6">22/12/2012</div>
                            <div class="col-6"><button class="btn btn-secondary">عرض المزيد...</button></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 p-2">
                <div class="card">
                    <img src="https://picsum.photos/seed/picsum/200" class="card-img-top" style="max-height: 200px"
                        alt="...">
                    <div class="card-body">
                        <p class="card-text">لم هذا تسمّى إعادة مليون, ان يذكر فرنسا كما. إذ الدول الشتوية وأكثرها مدن.
                            عرض بفرض بتحدّي الأوضاع تم.</p>
                        <div class="row">
                            <div class="col-6">22/12/2012</div>
                            <div class="col-6"><button class="btn btn-secondary">عرض المزيد...</button></div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-6">
            <div class="p-2 row">
            <div class="alert alert-dark">
                <h4>
                    <i class="bi bi-person-badge"></i> شخصيات
                </h4>
            </div>
            <div class="col-lg-6 col-md-12 p-2">
                <div class="card">
                    <img src="https://picsum.photos/seed/picsum/200" class="card-img-top" style="max-height: 200px"
                        alt="...">
                    <div class="card-body">
                        <p class="card-text">لم هذا تسمّى إعادة مليون, ان يذكر فرنسا كما. إذ الدول الشتوية وأكثرها مدن.
                            عرض بفرض بتحدّي الأوضاع تم.</p>
                        <div class="row">
                            <div class="col-6">22/12/2012</div>
                            <div class="col-6"><button class="btn btn-secondary">عرض المزيد...</button></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 p-2">
                <div class="card">
                    <img src="https://picsum.photos/seed/picsum/200" class="card-img-top" style="max-height: 200px"
                        alt="...">
                    <div class="card-body">
                        <p class="card-text">لم هذا تسمّى إعادة مليون, ان يذكر فرنسا كما. إذ الدول الشتوية وأكثرها مدن.
                            عرض بفرض بتحدّي الأوضاع تم.</p>
                        <div class="row">
                            <div class="col-6">22/12/2012</div>
                            <div class="col-6"><button class="btn btn-secondary">عرض المزيد...</button></div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="p-2 row">
            <div class="alert alert-dark">
                <h4>
                    <i class="bi bi-person-badge"></i> شخصيات
                </h4>
            </div>
            <div class="col-lg-6 col-md-12 p-2">
                <div class="card">
                    <img src="https://picsum.photos/seed/picsum/200" class="card-img-top" style="max-height: 200px"
                        alt="...">
                    <div class="card-body">
                        <p class="card-text">لم هذا تسمّى إعادة مليون, ان يذكر فرنسا كما. إذ الدول الشتوية وأكثرها مدن.
                            عرض بفرض بتحدّي الأوضاع تم.</p>
                        <div class="row">
                            <div class="col-6">22/12/2012</div>
                            <div class="col-6"><button class="btn btn-secondary">عرض المزيد...</button></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 p-2">
                <div class="card">
                    <img src="https://picsum.photos/seed/picsum/200" class="card-img-top" style="max-height: 200px"
                        alt="...">
                    <div class="card-body">
                        <p class="card-text">لم هذا تسمّى إعادة مليون, ان يذكر فرنسا كما. إذ الدول الشتوية وأكثرها مدن.
                            عرض بفرض بتحدّي الأوضاع تم.</p>
                        <div class="row">
                            <div class="col-6">22/12/2012</div>
                            <div class="col-6"><button class="btn btn-secondary">عرض المزيد...</button></div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-2 row">
            <div class="alert alert-dark">
                <h4>
                    <i class="bi bi-person-badge"></i> شخصيات
                </h4>
            </div>
            <div class="col-lg-6 col-md-12 p-2">
                <div class="card">
                    <img src="https://picsum.photos/seed/picsum/200" class="card-img-top" style="max-height: 200px"
                        alt="...">
                    <div class="card-body">
                        <p class="card-text">لم هذا تسمّى إعادة مليون, ان يذكر فرنسا كما. إذ الدول الشتوية وأكثرها مدن.
                            عرض بفرض بتحدّي الأوضاع تم.</p>
                        <div class="row">
                            <div class="col-6">22/12/2012</div>
                            <div class="col-6"><button class="btn btn-secondary">عرض المزيد...</button></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 p-2">
                <div class="card">
                    <img src="https://picsum.photos/seed/picsum/200" class="card-img-top" style="max-height: 200px"
                        alt="...">
                    <div class="card-body">
                        <p class="card-text">لم هذا تسمّى إعادة مليون, ان يذكر فرنسا كما. إذ الدول الشتوية وأكثرها مدن.
                            عرض بفرض بتحدّي الأوضاع تم.</p>
                        <div class="row">
                            <div class="col-6">22/12/2012</div>
                            <div class="col-6"><button class="btn btn-secondary">عرض المزيد...</button></div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="p-2 row">
            <div class="alert alert-dark">
                <h4>
                    <i class="bi bi-person-badge"></i> شخصيات
                </h4>
            </div>
            <div class="col-lg-6 col-md-12 p-2">
                <div class="card">
                    <img src="https://picsum.photos/seed/picsum/200" class="card-img-top" style="max-height: 200px"
                        alt="...">
                    <div class="card-body">
                        <p class="card-text">لم هذا تسمّى إعادة مليون, ان يذكر فرنسا كما. إذ الدول الشتوية وأكثرها مدن.
                            عرض بفرض بتحدّي الأوضاع تم.</p>
                        <div class="row">
                            <div class="col-6">22/12/2012</div>
                            <div class="col-6"><button class="btn btn-secondary">عرض المزيد...</button></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 p-2">
                <div class="card">
                    <img src="https://picsum.photos/seed/picsum/200" class="card-img-top" style="max-height: 200px"
                        alt="...">
                    <div class="card-body">
                        <p class="card-text">لم هذا تسمّى إعادة مليون, ان يذكر فرنسا كما. إذ الدول الشتوية وأكثرها مدن.
                            عرض بفرض بتحدّي الأوضاع تم.</p>
                        <div class="row">
                            <div class="col-6">22/12/2012</div>
                            <div class="col-6"><button class="btn btn-secondary">عرض المزيد...</button></div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-2 row">
            <div class="alert alert-dark">
                <h4>
                    <i class="bi bi-person-badge"></i> شخصيات
                </h4>
            </div>
            <div class="col-lg-6 col-md-12 p-2">
                <div class="card">
                    <img src="https://picsum.photos/seed/picsum/200" class="card-img-top" style="max-height: 200px"
                        alt="...">
                    <div class="card-body">
                        <p class="card-text">لم هذا تسمّى إعادة مليون, ان يذكر فرنسا كما. إذ الدول الشتوية وأكثرها مدن.
                            عرض بفرض بتحدّي الأوضاع تم.</p>
                        <div class="row">
                            <div class="col-6">22/12/2012</div>
                            <div class="col-6"><button class="btn btn-secondary">عرض المزيد...</button></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 p-2">
                <div class="card">
                    <img src="https://picsum.photos/seed/picsum/200" class="card-img-top" style="max-height: 200px"
                        alt="...">
                    <div class="card-body">
                        <p class="card-text">لم هذا تسمّى إعادة مليون, ان يذكر فرنسا كما. إذ الدول الشتوية وأكثرها مدن.
                            عرض بفرض بتحدّي الأوضاع تم.</p>
                        <div class="row">
                            <div class="col-6">22/12/2012</div>
                            <div class="col-6"><button class="btn btn-secondary">عرض المزيد...</button></div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div> --}}




        </div>

    </div>


   
   
@endsection
