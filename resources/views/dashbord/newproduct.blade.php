@extends('layouts.master') 
@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="/admin/products/new" method="POST">
            @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">نام محصول</label>
                    <input type="text" class="form-control" name="title" placeholder="محصول یک">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">توضیحات محصول</label>
                    <textarea class="form-control" name="content" rows="8"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">قیمت</label>
                    <input type="text" class="form-control" placeholder="10000" min="1" name="price" type="number">
                </div>
                <button type="submit" class="btn btn-primary">ثبت</button>
            </form>
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