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
        <div class="col-12 alert alert-secondary">
          <form action="{{ route('DashboardFilterPosts')}}" method="POST" class="row">
              @csrf
              <input type="hidden" name="postsType" value="{{ $type }}">
              
              <div class="col-3">
                  <select name="postStat"  class="form-control">
                      <option value="">-- التصنيف --</option>
                      @foreach ($categories as $cat)
                              <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                      
                      @endforeach
                  </select>
              </div>
              <div class="col-3">
                  <select name="postWriter" id="" class="form-control">
                      <option value="">-- الكاتب --</option>
                      @foreach ($users as $user)
                          @if ($user->role != 'verificateur')
                              <option value="{{ $user->id }}">{{ $user->name }}</option>
                          @endif
                      @endforeach

                  </select>
              </div>
              <div class="col-3">
                  <input type="date" class="form-control" name="postDate" >
              </div>
              <div class="col-3 d-grid gap-2">
                <button class="btn btn-primary" type="submit">
                  فلترة
                </button>
              </div>



          </form>
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
                    <td>@if( $p->type == "writer" ) {{ $p->user->name }} @else {{ $p->writer_name }} @endif</td>
                    <td>
                      @if ($p->stat == "published" )
                      منشورة
                      @elseif ($p->stat == "reviewed")
                      تمّت مراجعتها
                      @elseif ($p->stat == "inreview")
                                   في طور المراجعة
                      @elseif ($p->stat == "refused")
                      إعادة التثبت
                      @else
                                    مسودة
                      @endif

                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('ShowDashboardPost',['id'=> $p->id ]) }} "><i class="bi bi-eye"></i> </a>
                        <a class="btn btn-success" href="{{ route('ShowEditPost',['id'=> $p->id ]) }}"><i class="bi bi-pencil-square"></i> </a>
                       
                        <a class="btn btn-danger" onclick="return confirm('هل أنت متأكد من أنك تريد حذف المقال ؟ ')" href="{{ route('DeletePost',['id' => $p->id ]) }}" ><i class="bi bi-trash2-fill"></i> </a>
                        <a class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#postNotes{{$p->id}}" title="إقرأ الملاحظات"  ><i class="bi bi-book-fill"></i> </a>
                        
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

@foreach ($posts as $p)
<!-- Modal -->
<div class="modal  fade" id="postNotes{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"> ملاحظات المدقق </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @if( count($p->postnotes) == 0 )
          <div class="alert alert-success">
          لا توجد ملاحظات
          </div>
          @else
                @foreach( $p->postnotes as $pn)
                <div class="alert alert-success">
                  
                  {{ $pn->notes }}
                </div>
              @endforeach
          @endif
             
              
        </div>
        
      </div>
    </div>
  </div>
  @endforeach
@endsection

