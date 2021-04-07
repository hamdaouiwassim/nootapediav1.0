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
            <h3> <i class="bi bi-file-earmark-medical-fill"></i> الأحداث و المناسبات ({{ count($events) }}) </h3>
        </div>
        
        <div class="col-6 text-end">
            <a  data-bs-toggle="modal" data-bs-target="#todayEventAdd" class="btn btn-secondary ms-auto"> <i class="bi bi-cloud-plus-fill"></i> أضف حدث </a>
        </div>
        

    </div>
    <hr />
        <div>
            <table class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">العنوان  </th>
                    <th scope="col"> أخر تحديث </th>
                    <th scope="col"> الصورة الدلالية </th>
                    <th scope="col"> التاريخ </th>
                    <th scope="col">التعامل</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $i= 1;
                    @endphp
                    @foreach ($events as $e)
                  <tr>
                    <th scope="row">{{ $i }}</th>
                    <td>{{ $e->title }}</td>
                  
                    <td>
                      {!! $e->updated_at !!}
                     

                    </td>
                    <td>
                       @if($e->image)
                        <img src="{{ asset('uploads/todayevents/images') }}/{{ $e->image }}" style="max-width: 100px;" alt="{{$e->title}}" class="img-thumbnail">
                        @else
                        غير متاحة
                        @endif
                    </td>
                    
                 
                    <td>
                     {{ $e->date }}
                    </td>
                    <td>
   
                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#todayEventEdit{{$e->id}}"><i
                            class="bi bi-pencil-square"></i> تغيير</a>
                  
                    <a class="btn btn-danger" onclick="return confirm('هل أنت متأكد من أنك تريد حذف حدث اليوم ؟ ')"
                    href="{{ route('DeleteTodayEvent',['id' => $e->id ]) }}"><i class="bi bi-trash2-fill"></i>
                    حذف</a>
                   
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


    
<!-- Modal Add Event -->
<div class="modal  fade" id="todayEventAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center">إضافة حدث اليوم</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('AddTodayEvent')}} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label  class="form-label">عنوان حدث اليوم</label>
                    <input type="text" class="form-control" name="title" required placeholder="عنوان حدث اليوم ...">
                  </div>
               
                  <div class="mb-3">
                    <label  class="form-label">محتوى حدث اليوم </label>
                    {{-- <textarea class="form-control" id="editor" name="content"  ></textarea> --}}
                    <textarea class="form-control"  name="description" rows="10" placeholder="إكتب محتوى حدث اليوم هنا ...." ></textarea>
              
                  </div>
                  <div class="mb-3">
                    <label  class="form-label">صورة حدث اليوم </label>
                    {{-- <textarea class="form-control" id="editor" name="content"  ></textarea> --}}
                    <input class="form-control" type="file"  name="image" />
              
                  </div>
                  <div class="mb-3">
                    <label  class="form-label">تاريخ حدث اليوم </label>
                    {{-- <textarea class="form-control" id="editor" name="content"  ></textarea> --}}
                    <input class="form-control" type="date" name="date" />
              
                  </div>
                  
                  <button type="submit" class="btn btn-primary">الحفظ</button>
                </form>
          </div>
          
        </div>
      </div>
  </div>


@foreach($events as $event)

  <!-- Modal Add User -->
<div class="modal  fade" id="todayEventEdit{{ $event->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center">تحديث حدث اليوم</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('AddTodayEvent')}} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label  class="form-label">عنوان حدث اليوم</label>
                    <input type="text" class="form-control" name="title" value="{{ $event->title }}">
                  </div>
               
                  <div class="mb-3">
                    <label  class="form-label">محتوى حدث اليوم </label>
                    {{-- <textarea class="form-control" id="editor" name="content"  ></textarea> --}}
                    <textarea class="form-control"  name="description" rows="10"  >{{ $event->description }}</textarea>
              
                  </div>
                  <div class="mb-3">
                    <label  class="form-label">صورة حدث اليوم </label>
                    {{-- <textarea class="form-control" id="editor" name="content"  ></textarea> --}}
                    <input class="form-control" type="file"  name="image" />
              
                  </div>
                  <div class="mb-3">
                    <label  class="form-label">تاريخ حدث اليوم </label>
                    {{-- <textarea class="form-control" id="editor" name="content"  ></textarea> --}}
                    <input class="form-control" type="date" name="date" value="{{ $event->date }}"/>
              
                  </div>
                  
                  <button type="submit" class="btn btn-primary">تحديث</button>
                </form>
          </div>
          
        </div>
      </div>
  </div>
  
@endforeach

@endsection

