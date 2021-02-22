@extends('layouts.user',array('categories',$categories))
@section('title',  $category->name )
@section('MetaDescription',  $category->description )
@section('content')
 <!-- posts -->
 <div class="container mt-5 pt-5 mb-5">
    <div class="alert alert-secondary text-center">
        <h2>
             {{ $category->name }} 
        </h2>
        <hr />
        <p>
            {{ $category->description }}
        </p>
    </div>
    <div class="row">
        @if( count($posts) == 0 )
        <p class="pt-5 text-primary">
            لا توجد أي مقالات ضمن هذا التصنيف ...
        </p>
        @endif
        @foreach($posts as $post)
        <div class="col-lg-6 col-md-12">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-lg-6 col-md-12" style="border-radius:0 3px 3px 0;min-height:290px;background-image: url({{ asset('uploads/posts/images')}}/{{ $post->image  }});background-size:cover">
                        

                     
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card-body">


                            <Strong style="font-size:1.2rem;color:#002E63" class="card-title" >{{ $post->title }}</Strong>
                            <hr />
                            <div class="card-text" >
                                
                               {{ $post->content }}
                            
                            </div>
                            <p class="load-more card-text text-end" style="position: absolute;bottom: 10px;left: 10px;"><a href="{{ route('showUserPost',[ 'id'=> $post->id ,'title'=> $post->slug ])}}" class="btn btn-secondary"> عرض
                                    المزيد ... </a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach



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
        </div>
         --}}
       
      


    </div>

</div>


 <!-- Global site tag (gtag.js) - Google Analytics -->
 <script async src="https://www.googletagmanager.com/gtag/js?id=G-P1CHPHZCDN"></script>
 <script>
 window.dataLayer = window.dataLayer || [];
 function gtag(){dataLayer.push(arguments);}
 gtag('js', new Date());

 gtag('config', 'G-P1CHPHZCDN');
 </script>

@endsection
   