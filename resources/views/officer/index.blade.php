@extends('layouts.master')
@section('content')
{{-- Coding --}}
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">จัดการข้อมูลพนักงานเปล</h1>
</div>
{{-- Content --}}
<div class="content">
    {{ print_r($data) }}
</div>
@endsection
@section('script')

@endsection

{{-- 
สร้าง Folder department -> index.blade.php
สร้าง Controller -> php artisan make:controller dataController
สร้าง Route web.php -> department
function index = แสดงข้อมูล department
--}}