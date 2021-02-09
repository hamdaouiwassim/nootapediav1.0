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
    <div class="row">
        <div class="col-6">
            <h3> <i class="bi bi-file-earmark-medical-fill"></i> {{ $type }} ({{ count($posts) }}) </h3>
        </div>
        
        <div class="col-6 text-end">
            <a href="{{ route('ShowAddPost') }}"  class="btn btn-secondary ms-auto"> <i class="bi bi-cloud-plus-fill"></i> أضف مقالة </a>
        </div>
    </div>
    <hr />
        <div>
            <table class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">العنوان  </th>
                    <th scope="col"> التصنيف</th>
                    <th scope="col"> أخر تحديث </th>
                    <th scope="col"> الصورة الدلالية </th>
                    <th scope="col"> الكاتب </th>
                    <th scope="col"> الحالة </th>
                    <th scope="col">التعامل</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $i= 1;
                    @endphp
                    @foreach ($posts as $p)
                  <tr>
                    <th scope="row">{{ $i }}</th>
                    <td>{{ $p->title }}</td>
                    <td>
                      {{ $p->category->name }}
                     

                    </td>
                    <td>
                      {!! $p->updated_at !!}
                     

                    </td>
                    <td>
                       @if($p->image)
                        <img src="{{ asset('uploads/posts/images') }}/{{ $p->image }}" style="max-width: 100px;" alt="{{$p->title}}" class="img-thumbnail">
                        @else
                        غير متاحة
                        @endif
                    </td>
                    <td>{{ $p->user->name }}</td>
                    <td>
                      @if ($p->stat == "published" )
                      منشورة
                      @elseif ($p->stat == "reviewed")
                      المراجعة
                     
                      @else
                      مسودة
                     @endif

                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('ShowDashboardPost',['id'=> $p->id ]) }} "><i class="bi bi-eye"></i> </a>
                        <a class="btn btn-success" href="{{ route('ShowEditPost',['id'=> $p->id ]) }}"><i class="bi bi-pencil-square"></i> </a>
                       
                        <a class="btn btn-danger" onclick="return confirm('هل أنت متأكد من أنك تريد حذف المقال ؟ ')" href="{{ route('DeletePost',['id' => $p->id ]) }}" ><i class="bi bi-trash2-fill"></i> </a>
                 
                    </td>
                  </tr>
                  
                  @php
                  $i++;
                  @endphp
                  @endforeach
                 
                  
                </tbody>
              </table>
        </div>
        
        
    </div>
    <hr />
   
</div>

<!-- Modal -->
<div class="modal  fade" id="postAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">إضافة مقالة </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
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
                <label  class="form-label">محتوى المقالة </label>
                <textarea class="form-control" id="editor" name="content"  ></textarea>
              </div>
              <div class="mb-3">
                <label  class="form-label">كلمات دلالية </label>
                <input data-role="tagsinput" id="tags-input" value="" class="form-control"  name="keywords" required />
              </div>
              
              <div class="mb-3">
                <label  class="form-label">تصنيف المقالة </label>
                <select name="category" class="form-control">
                  @foreach($categories as $c)
                  <option value="{{ $c->id }}">{{ $c->title }}</option>
                  @endforeach
                </select>
              </div>
              <button type="submit" class="btn btn-primary">الحفظ</button>
            </form>
        </div>
        
      </div>
    </div>
  </div>
@endsection

