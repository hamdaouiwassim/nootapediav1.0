@extends('layouts.verificateur')

@section('content')
<div class="container mt-5 pt-5">
    <h3><i class="bi bi-file-bar-graph-fill"></i> إحصائيات </h3>
    <hr />
    <div class="row">
        
        <div class="col-4 p-2">
            <div class="alert alert-success">
                <h4>
                <i class="bi bi-file-earmark-medical-fill"></i> مقالات ({{ $posts }})
            </h4>
            </div>
           
        </div>
        <div class="col-4 p-2">
            <div class="alert alert-warning">
                <h4>
            <i class="bi bi-tags-fill"></i> تصنيفات ({{ $categories }})
                </h4>
         </div>
        </div>
        <div class="col-4 p-2">
            <div class="alert alert-danger">
                <h4>
            <i class="bi bi-people-fill"></i> المستخدمون ({{ $users }})
                </h4>
        </div>
        </div>
    </div>
    
    

    <h3><i class="bi bi-pie-chart-fill"></i> النتائج </h3>
    <hr />
    <div class="row">
        
        <div class="col-4 p-2">
            <div class="alert alert-success">
                <h4>
                <i class="bi bi-eye-fill"></i> إجمالي المشاهدات ({{ $posts }})
            </h4>
            </div>
           
        </div>
        <div class="col-4 p-2">
            <div class="alert alert-warning">
                <h4>
            <i class="bi bi-eye-fill"></i> مشاهدات الاسبوع ({{ $categories }})
                </h4>
         </div>
        </div>
        <div class="col-4 p-2">
            <div class="alert alert-danger">
                <h4>
            <i class="bi bi-eye-fill"></i> مشاهدات اليوم ({{ $users }})
                </h4>
        </div>
        </div>
    </div>
    
   
   
</div>
@endsection