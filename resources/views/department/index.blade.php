@extends('layouts.master')
@section('content')
{{-- Coding --}}
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">จัดการข้อมูลฝ่ายงาน</h1>
</div>
{{-- Content --}}
<div class="content">
    <p>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
            data-bs-target="#addDepartmentModal">
            เพิ่มข้อมูลสถานที่ / หน่วยบริการ
        </button>
    </p>
    <table id="basicTable" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>ชื่อสถานที่ / หน่วยบริการ</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $rs)
            <tr>
                <td>{{ $rs->place_id }}</td>
                <td>{{ $rs->place_name }}</td>
                <td>
                    <a href="{{ route('department.edit',$rs->place_id) }}" class="btn btn-warning btn-sm">
                        แก้ไขข้อมูล
                    </a>
                </td>
                <td>
                    <a class="btn btn-danger btn-sm deletePlace" data-id="{{ $rs->place_id }}">
                        ลบข้อมูล
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Add Department -->
<div class="modal fade" id="addDepartmentModal" tabindex="-1" aria-labelledby="addDepartmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('department.create') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addDepartmentModalLabel">เพิ่มข้อมูลสถานที่ / หน่วยบริการ</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">ชื่อสถานที่ / หน่วยบริการ</label>
                        <input type="text" class="form-control" name="place_name" placeholder="กรุณากรอกข้อมูล">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-success" 
                        onclick="Swal.fire({
                            title: 'ยืนยันการเพิ่มหน่วยบริการ ?',
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
                        บันทึกข้อมูล
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
<script>
    $('.deletePlace').click(function () {
        var id = $(this).data('id');
        var token = "{{ csrf_token() }}";

        event.preventDefault();
        Swal.fire({
            icon: 'warning',
            title: 'ลบข้อมูลรหัส ' + id,
            showCancelButton: true,
            confirmButtonText: `ยืนยัน`,
            cancelButtonText: `ยกเลิก`,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('department.delete') }}",
                    method: 'POST',
                    data: {
                        id: id,
                        _token: token
                    },
                    success: function (data) {
                        Swal.fire({
                            icon: 'error',
                            title: 'ลบสำเร็จ',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        window.setTimeout(function () {
                            location.reload()
                        }, 1500);
                    }
                });
            }
        })
    });
</script>
@endsection

{{-- 
สร้าง Folder department -> index.blade.php
สร้าง Controller -> php artisan make:controller dataController
สร้าง Route web.php -> department
function index = แสดงข้อมูล department
--}}