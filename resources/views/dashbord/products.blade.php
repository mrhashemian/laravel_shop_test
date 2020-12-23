@extends('layouts.master') 
@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach ($products as $key => $value)      
            <div class="col-lg-12 col-md-12 mb-12">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title">
                        <a href="/products/{{ $value->slug }}">{{ $value->title }}</a>
                        </h4>
                        <h5>${{ $value->price }}</h5>
                        <p class="card-text">{{ $value->content }}</p>
                    </div>
                </div>
            </div>
            <br>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('sidebar')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">امکانات</div>
        <div class="card-body">
            <ul>
                <li><a href="/admin/products">محصولات</a></li>
                <li><a href="/admin/products/new">محصول جدید</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection