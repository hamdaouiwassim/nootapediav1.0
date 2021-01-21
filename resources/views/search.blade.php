@extends('layouts.user')

@section('content')
    <!-- posts -->

    <div class="container mt-5 pt-5  mb-5  col-lg-8  col-md-12">
      

            <div class="alert alert-secondary">
                <h4> أنت ضمن صفحة البحث في موقع نوتابيديا </h4>
            </div>
           
                <form action="{{ route('Search') }}" class="col-12 pr-3 mt-5 mb-5" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" placeholder="إكتب ما تريد البحث عنه..." name="searchkeywords" class="form-control p-3 mr-3 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                    </div>
                    @error('searchkeywords')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
             
                    <div class="form-group mt-3">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    خيــــــــــارات متقدمة
                                </button>
                              </h2>
                              <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body row mt-3">
                                      <div class="col-lg-6 col-md-12">
                                    <label class="mt-2 mb-2"> التاريخ </label>
                                    <input type="date" name="date" placeholder="إكتب تاريخ نشر المقالة ..." class="form-control">
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label class="mt-2 mb-2"> تصنيف </label>
                                        <select name="category" class="form-control">
                                            <option value="" selected >-- إختر تصنيف --</option>
                                            @foreach ($categories as $category)
                                         
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                            
                                            
                                        </select>
                                </div>
                               </div>
                              </div>
                            </div>
                           
                           

                    </div>
                    <div class="form-group text-end">
                        <button class="btn btn-primary btn-lg mt-4" type="submit">
                            بحث <i class="bi bi-search"></i> 
                        </button>
                    </div>
                   
                   
                </form>
        







    </div>




@endsection
