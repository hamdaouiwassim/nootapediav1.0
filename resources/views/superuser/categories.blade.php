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
            <h3> <i class="bi bi-tags-fill"></i> تصنيفات ({{ count($categories) }}) </h3>
        </div>
        
        <div class="col-6 text-end">
            <a data-bs-toggle="modal" data-bs-target="#categorieAdd"  class="btn btn-secondary ms-auto"> <i class="bi bi-cloud-plus-fill"></i> أضف تصنيف </a>
        </div>
    </div>
    <hr />
        <div>
            <table class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">الإسم </th>
                    <th scope="col">الصورة</th>
                    <th scope="col">الوصف </th>
                    
                    <th scope="col">التعامل</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $i= 1;
                    @endphp
                    @foreach ($categories as $c)
                  <tr>
                    <th scope="row">{{ $i }}</th>
                    <td>{{ $c->name }}</td>
                    <td>
                      @if($c->image)
                        <img src="{{ asset('uploads/categories/images') }}/{{ $c->image }}" style="max-width: 100px;" alt="{{$c->name}}" class="img-thumbnail">
                      @endif

                    </td>
                    <td>{{ $c->description }}</td>
                    <td>
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#categorie{{ $c->id }}"><i class="bi bi-pencil-square"></i> تغيير</button>
                        <a class="btn btn-danger" onclick="return confirm('هل أنت متأكد من أنك تريد حذف التصنيف ؟ ')" href="{{ route('DeleteCategorie',['id' => $c->id ]) }}" ><i class="bi bi-trash2-fill"></i> حذف</a>
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
<div class="modal fade" id="categorieAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">إضافة تصنيف </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('AddCategory')}} " method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label  class="form-label">إسم التصنيف</label>
                <input type="text" class="form-control" name="name" required placeholder="شخصيات ...">
              </div>
              <div class="mb-3">
                <label  class="form-label">صورة للتصنيف</label>
                <input type="file" class="form-control" name="image">
              </div>
              <div class="mb-3">
                <label  class="form-label">وصف التصنيف </label>
                <textarea class="form-control" name="description" required placeholder="..." rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">الحفظ</button>
            </form>
        </div>
        
      </div>
    </div>
  </div>
@foreach ($categories as $c)
  <!-- Modal Modification -->
<div class="modal fade" id="categorie{{ $c->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"> تحديث التصنيف </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('EditCategory') }} " method="POST" enctype="multipart/form-data" >
            @csrf
            <input type="hidden" name="idcategory" value="{{ $c->id }}">
            <div class="mb-3">
                <label  class="form-label">إسم التصنيف</label>
                <input type="text" class="form-control" name="name" value="{{ $c->name }}">
              </div>
              <div class="mb-3">
                <label  class="form-label">صورة التصنيف  </label><br />
                
                @if($c->image)
                <img src="{{ asset('uploads/categories/images') }}/{{ $c->image }}" style="max-width: 100px;" alt="{{$c->name}}" class="img-thumbnail" /><hr />
              @endif
                
                <input type="file" class="form-control" name="image">
              </div>
              <div class="mb-3">
                <label  class="form-label">وصف التصنيف </label>
                <textarea class="form-control" name="description" rows="3">{{ $c->description }}</textarea>
              </div>
              <button type="submit" class="btn btn-primary">الحفظ</button>
        </form>
        </div>
       
          
          
     
      </div>
    </div>
  </div>
  @endforeach
@endsection