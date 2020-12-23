@extends('layouts.master')

@section('main')
<div class="card mt-4">
  <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">
  <div class="card-body">
    <h3 class="card-title">{{ $products[0]->title }}</h3>
    <h4>قیمت: {{ $products[0]->price }} تومان</h4>
    <h2>توضیحات محصول</h2>
    <p class="card-text">{{ $products[0]->content }}</p>
    <form action="/checkout" method="POST">
      @csrf
          <div class="form-group">
              <label for="exampleInputEmail1">تعداد</label>
              <input type="text" class="form-control" placeholder="1" min="1" name="number" type="number">
          </div>
          <input type="hidden" name="price" value="{{ $products[0]->price }}">
          <input type="hidden" name="details" value="{{ $products[0]->title }}">
          <button type="submit" class="btn btn-primary">خرید</button>
      </form>
  </div>
</div>
@endsection