@extends('layouts.master')

@section('content')
<div class="card-deck mb-3 text-center">
    <div class="card mb-4 box-shadow">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">رایگان</h4>
        </div>
        <div class="card-body">
            <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ ماهیانه</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
                <li>10 کاربر</li>
                <li>2 گیگ فضایی ذخیره سازی</li>
                <li>پشتیبانی ایمیلی</li>
                <li>دسترسی به مرکز راهنما</li>
            </ul>
            <button type="button" class="btn btn-lg btn-block btn-outline-primary">عضویت برای رایگان</button>
        </div>
    </div>
    <div class="card mb-4 box-shadow">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">اختصاصی</h4>
        </div>
        <div class="card-body">
            <h1 class="card-title pricing-card-title">$15 <small class="text-muted">/ ماهیانه</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
                <li>20 کاربر</li>
                <li>10 گیگ فضایی ذخیره سازی</li>
                <li>پشیبانی اختصاصی ایمیل</li>
                <li>دسترسی به مرکز راهنما</li>
            </ul>
            <button type="button" class="btn btn-lg btn-block btn-primary">خریداری</button>
        </div>
    </div>
    <div class="card mb-4 box-shadow">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">شرکتی</h4>
        </div>
        <div class="card-body">
            <h1 class="card-title pricing-card-title">$29 <small class="text-muted">/ ماهیانه</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
                <li>30 کاربر</li>
                <li>15 گیگ فضایی ذخیره سازی</li>
                <li>پشتیبانی ایمیل و تلفن</li>
                <li>دسترسی به مرکز راهنما</li>
            </ul>
            <button type="button" class="btn btn-lg btn-block btn-primary">تماس بگیرید</button>
        </div>
    </div>
</div>
@endsection