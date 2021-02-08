@extends('layouts.user',array('categories',$categories))
@section('title','تواصل معنا')
@section('content')
    <!-- posts -->

    <div class="container mt-5 pt-5  mb-5  col-lg-8  col-md-12">
        <div class="alert alert-secondary text-center">
        <h4 ><i class="bi bi-mailbox2"></i> تواصل معنا</h4>
        </div>
       
        <div class="row">
            <div class="col-4 p-3">
                <div class="card pt-5 pb-5 text-center" style="min-height: 150px">
                    <i class="bi bi-envelope-open-fill" style="font-size: 2rem;"></i>
                    <a href="mailto:contact@nootapedia.com" style="color:#212529;"> الإيميل </a>
                   

                </div>
            </div>
            <div class="col-4 p-3">
                <div class="card pt-5 pb-5 text-center" style="min-height: 150px">
                    <i class="bi bi-instagram" style="font-size: 2rem;"></i>
                    <a href="https://www.instagram.com/nootapedia" style="color:#212529;"> الأنستاجرام </a>
                    
                </div>
            </div>
            <div class="col-4 p-3">
                <div class="card pt-5 pb-5 text-center" style="min-height: 150px">
                    <i class="bi bi-facebook" style="font-size: 2rem;"></i>
                    <a href="https://www.facebook.com/nootapedia" style="color:#212529;"> الفايسبوك </a>
                   
                </div>
            </div>

        </div>



    </div>




@endsection
