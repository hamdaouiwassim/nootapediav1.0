@extends('layouts.verificateur')

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
                    <label class="form-label">محتوى المقالة </label>
                    <textarea id="editor" class="form-control" rows="10"  name="content"> {!! $post->content !!}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">كلمات دلالية </label>
                    <input data-role="tagsinput" id="tags-input" value="{{ $post->keywords }}" class="form-control"
                        name="keywords" required />
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
                    <label class="form-label">ملاحظات على المقالة </label>
                    <textarea class="form-control" rows="10"  name="note"> {!! $post->note !!}</textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">الحفظ</button>
                
                <a data-bs-toggle="modal" data-bs-target="#remarquesModal"  class="btn btn-danger">أعد المقالة للكاتب</a>
            </form>
        </div>
    </div>
    </div>




 
  <!-- Modal -->
  <div class="modal fade" id="remarquesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ملاحظات عن المقالة</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('ResendPostToWriter')}}" method="POST">
            @csrf
            <input type="hidden" name="postId" value="{{ $post->id }}">
            <label  class="form-label"> ملاحظات عن المقالة </label>
            <textarea  class="form-control" rows="10" name="notes"  ></textarea>
          
        </div>
        <div class="modal-footer">
          
          <button type="submit" class="btn btn-primary">أرسل</button>
        </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scriptsfiles')

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
    content_style:
    "@import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap'); body { font-family: Tajawal; }",
    
    });
  </script>

@endsection