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


            <h5 class="modal-title text-center alert alert-secondary"><i class="bi bi-person-square"></i> حسابي </h5>
            
            <div class="text-center mt-3 mb-3" >
              <img style="max-width:300px;" src="@if(Auth::user()->avatar) {{ asset('uploads/users/images') }}/{{ Auth::user()->avatar }} @else {{ asset('uploads/users/images/user.png') }}   @endif" alt="" class="img-fluid img-thumbnail">

            </div>
            
            <form action="{{ route('EditUserInfo') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label  class="form-label">إسم المستخدم</label>
                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                  </div>
                  <div class="mb-3">
                    <label  class="form-label">الصورة</label>
                    <input type="file" class="form-control" name="avatar" >
                  </div>
                  <div class="mb-3">
                    <label  class="form-label">البريد الإلكتروني</label>
                    <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
                  </div>
                  <div class="mb-3">
                    <label  class="form-label">الهاتف </label>
                    <input type="text" class="form-control" name="telephone"  value="{{ Auth::user()->phone }}">
                  </div>
                  <div class="mb-3">
                    <label  class="form-label">كلمة المرور </label>
                    <input type="password" class="form-control" name="password"  placeholder="كلمة المرور ...">
                  </div>
                  <div class="mb-3">
                    <label  class="form-label">إعادة كلمة المرور</label>
                    <input type="password" class="form-control" name="rpassword"  placeholder="إعادة كلمة المرور ...">
                  </div>
                  
                 
                  <button type="submit" class="btn btn-primary">الحفظ</button>
                </form>
        
            <div>
        </div>
    </div>
    </div>

@endsection