@extends('layouts.master')
@section('content')
{{-- Coding --}}
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">จัดการข้อมูลฝ่ายงาน</h1>
</div>
{{-- Content --}}
<div class="content">
    <form action="{{ route('department.update',$data->place_id) }}" method="POST">
        @csrf
        <div class="modal-content">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="" class="form-label">ชื่อสถานที่ / หน่วยบริการ</label>
                    <input type="text" class="form-control" name="place_name" 
                        placeholder="กรุณากรอกข้อมูล" value="{{ $data->place_name }}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" 
                    onclick="Swal.fire({
                        title: 'ยืนยันการแก้ไขหน่วยบริการ ?',
                        showCancelButton: true,
                        confirmButtonText: `บันทึก`,
                        cancelButtonText: `ยกเลิก`,
                        icon: 'question',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        } else if (result.isDenied) {
                            form.reset();
                        }
                        })">
                    แก้ไขข้อมูล
                </button>
            </div>
        </div>
    </form>
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