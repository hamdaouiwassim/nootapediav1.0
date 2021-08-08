@extends('layouts.editor')

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


            <h5 class="modal-title text-center">إضافة مقالة</h5>
            <hr />

        
        <div>
            <form action="{{ route('AddPost')}} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label  class="form-label">عنوان المقالة</label>
                    <input type="text" class="form-control" name="title" required placeholder="عنوان المقال ...">
                  </div>
               
                  <div class="mb-3">
                    <label  class="form-label">محتوى المقالة </label>
                    {{-- <textarea class="form-control" id="editor" name="content"  ></textarea> --}}
                    <textarea id="editor" class="form-control"  name="content" rows="10" placeholder="إكتب محتوى المقالة هنا ...." ></textarea>
              
                  </div>
                 
                  
                  <div class="mb-3">
                    <label  class="form-label">تصنيف المقالة </label>
                    <select name="category" class="form-control">
                      @foreach($categories as $c)
                      <option value="{{ $c->id }}">{{ $c->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary">الحفظ</button>
                </form>
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