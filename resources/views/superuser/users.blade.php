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
                <h3><i class="bi bi-people-fill"></i> المستخدمين </h3>

            </div>

            <div class="col-6 text-end">
                <a data-bs-toggle="modal" data-bs-target="#userAdd" class="btn btn-secondary ms-auto"> <i class="bi bi-cloud-plus-fill"></i> أضف مستخدم </a>
            </div>
        </div>
        <div>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">إسم المستخدم </th>
                        <th scope="col"> تاريخ التحديث </th>
                        <th scope="col"> البريد الإلكتروني </th>
                        <th scope="col"> الهاتف </th>
                        <th scope="col"> النوع </th>
                        <th scope="col">التعامل</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i= 1;
                    @endphp
                    @foreach ($users as $u)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $u->name }}</td>
                            <td>
                                {!! $u->created_at !!}


                            </td>
                            <td>
                                {{ $u->email }}
                                    
                            </td>
                            <td></td>
                            <td>{{ $u->role }}</td>
                            <td>
                                
                                <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#userEdit{{$u->id}}"><i
                                        class="bi bi-pencil-square"></i> تغيير</a>
                                @if ( Auth::user()->id != $u->id || Auth::user()->role != "admin")
                                <a class="btn btn-danger" onclick="return confirm('هل أنت متأكد من أنك تريد حذف المستخدم ؟ ')"
                                href="{{ route('DeleteUser',['id' => $u->id ]) }}"><i class="bi bi-trash2-fill"></i>
                                حذف</a>
                                @endif
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



    
<!-- Modal Add User -->
<div class="modal  fade" id="userAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">تحديث مستخدم </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('AddUser') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                  <label  class="form-label">إسم المستخدم</label>
                  <input type="text" class="form-control" name="name" required placeholder="الإسم ...">
                </div>
                <div class="mb-3">
                  <label  class="form-label">البريد الإلكتروني</label>
                  <input type="email" class="form-control" name="email" required placeholder="البريد الإلكتروني ...">
                </div>
                <div class="mb-3">
                  <label  class="form-label">الهاتف </label>
                  <input type="text" class="form-control" name="telephone"  placeholder="الهاتف ...">
                </div>
                <div class="mb-3">
                  <label  class="form-label">كلمة المرور </label>
                  <input type="password" class="form-control" name="password" required placeholder="كلمة المرور ...">
                </div>
                <div class="mb-3">
                  <label  class="form-label">النوع  </label>
                  <select name="role" class="form-control">
                      <option value="">إختر نوع الحساب</option>
                      <option value="admin">مشرف</option>
                      <option value="editor">محرّر</option>
                    </select>
                </div>
                
               
                <button type="submit" class="btn btn-primary">الحفظ</button>
              </form>
          </div>
          
        </div>
      </div>
  </div>


@foreach($users as $u)

  <!-- Modal Add User -->
<div class="modal  fade" id="userEdit{{ $u->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">تحديث مستخدم </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('EditUser') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden"  name="iduser"  value="{{ $u->id}}">
              <div class="mb-3">
                  <label  class="form-label">إسم المستخدم</label>
                  <input type="text" class="form-control" name="name" required value="{{ $u->name}}">
                </div>
                <div class="mb-3">
                  <label  class="form-label">البريد الإلكتروني</label>
                  <input type="email" class="form-control" name="email" required value="{{ $u->email}}">
                </div>
                <div class="mb-3">
                  <label  class="form-label">الهاتف </label>
                  <input type="text" class="form-control" name="telephone"  value="{{ $u->phone}}">
                </div>
                <div class="mb-3">
                  <label  class="form-label">كلمة المرور </label>
                  <input type="password" class="form-control" name="password" ">
                </div>
                <div class="mb-3">
                  <label  class="form-label">النوع  </label>
                  <select name="role" class="form-control">
                      <option value="">إختر نوع الحساب</option>
                      <option value="admin" @if( $u->role == "admin" )  selected @endif >مشرف</option>
                      <option value="editor" @if( $u->role == "editor" ) selected @endif >محرّر</option>
                    </select>
                </div>
                
               
                <button type="submit" class="btn btn-primary">تحديث</button>
              </form>
          </div>
          
        </div>
      </div>
  </div>
  
@endforeach

@endsection
