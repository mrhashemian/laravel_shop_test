@extends('layouts.master') 
@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('پنل کاربری') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('شما وارد شدین!') }}
                </div>
            </div>
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