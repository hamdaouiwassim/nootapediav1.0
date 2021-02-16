@extends('layouts.admin')

@section('content')
    <div class="container mt-5 pt-5">
        @if (\Session::has('success'))
            <div class="alert alert-success">

                {!! \Session::get('success') !!}

            </div>
        @endif
        @if (\Session::has('error'))
            <div class="alert alert-danger">

                {!! \Session::get('error') !!}

            </div>
        @endif



        <!-- Modal Modification -->

        <div class="conatiner p-4">


            <h5 class="modal-title text-center">تحديث مقالة <span class="text-primary">" {{ $post->title }} "</span></h5>
            <hr />

        
        <div>
            <form action="{{ route('EditPost') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="idpost" value="{{ $post->id }}">
                <div class="mb-3">
                    <label class="form-label">عنوان المقالة</label>
                    <input type="text" class="form-control" name="title" required value="{{ $post->title }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">صورة للمقالة</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="mb-3">
                    <label  class="form-label">الملف الصوتي للمقالة</label>
                    <input type="file" class="form-control" name="soundfile">
                  </div>
                <div class="mb-3">
                    <label class="form-label">محتوى المقالة </label>
                    <textarea class="form-control" rows="10"  name="content"> {!! $post->content !!}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">كلمات دلالية </label>
                    <input data-role="tagsinput" id="tags-input" value="{{ $post->keywords }}" class="form-control"
                        name="keywords" required />
                </div>
                <div class="mb-3">
                    <label  class="form-label">حالة المقالة </label>
                    <select name="stat" class="form-control">
                        
                      <option @if($post->stat == "saved") selected @endif value="saved">مسودة</option>
                      <option @if($post->stat == "published") selected @endif value="published">منشورة</option>
                      <option @if($post->stat == "refused") selected @endif value="refused">إعادة التثبت</option>
                      <option @if($post->stat == "reviewed") selected @endif value="reviewed">تمّت المراجعة</option>
                      <option @if($post->stat == "inreview") selected @endif value="inreview">في طور المراجعة</option>
                    </select>
                  </div>
                <div class="mb-3">
                    <label class="form-label">تصنيف المقالة </label>
                    <select name="category" class="form-control">
                        @foreach ($categories as $c)
                            @if ($c->id == $post->idcategory)
                                <option selected value="{{ $c->id }}">{{ $c->name }}</option>
                            @else
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endif

                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label  class="form-label">وصف الصفحة ( خاصّ بمحركات البحث ) </label>
                    <textarea  class="form-control"  name="meta_description" maxlength="155" >{{ $post->meta_description }}</textarea>
                  </div>
                <button type="submit" class="btn btn-primary">الحفظ</button>
            </form>
        </div>
    </div>
    </div>

@endsection
