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
                    <input type="text" class="form-control" name="title" required placeholder="شخصيات ...">
                  </div>
                  <div class="mb-3">
                    <label  class="form-label">صورة للمقالة</label>
                    <input type="file" class="form-control" name="image">
                  </div>
                  <div class="mb-3">
                    <label  class="form-label">الملف الصوتي للمقالة</label>
                    <input type="file" class="form-control" name="soundfile">
                  </div>
                  <div class="mb-3">
                    <label  class="form-label">محتوى المقالة </label>
                    <textarea class="form-control" id="editor" name="content"  ></textarea>
                  </div>
                  <div class="mb-3">
                    <label  class="form-label">كلمات دلالية </label>
                    <input data-role="tagsinput" id="tags-input"  class="form-control"  name="keywords" required />
                  </div>
                  <div class="mb-3">
                    <label  class="form-label">حالة المقالة </label>
                    <select name="stat" class="form-control">
                      <option value="saved">مسودة</option>
                      <option value="published">منشورة</option>
                      <option value="trashed">محذوفة</option>
                    </select>
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