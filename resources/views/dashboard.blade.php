@extends('layouts.master')
@section('content')
{{-- Coding --}}
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Order - รายการเรียกเปล</h1>
</div>
{{-- Content --}}
<div class="content">
    {{-- Content --}}
    <div class="">
        <!-- Button trigger modal -->
        <p>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#call">
                เรียกเปล
            </button>
        </p>

        <table id="myTable" class="table">
            <thead>
                <tr>
                    <th scope="col">รหัสรายการ</th>
                    <th scope="col">เวลาแจ้ง</th>
                    <th scope="col">สถานที่แจ้ง</th>
                    <th scope="col">ประเภท</th>
                    <th scope="col">อุปกรณ์เสริม</th>
                    <th scope="col">ปลายทาง</th>
                    <th scope="col">ความเร่งด่วน</th>
                    <th scope="col">หมายเหตุ</th>
                    <th scope="col">สถานะ</th>
                    <th scope="col">ผู้รับงาน</th>
                </tr>
            </thead>
            <tbody>
                {{-- Foreach $data --}}
                @foreach($data as $rs)
                    <tr>
                        <td>{{ $rs->order_id }}</td>
                        <td>{{ $rs->order_datetime }}</td>
                        <td>{{ $rs->place }}</td>
                        <td>{{ $rs->cradle_name }}</td>
                        <td>{{ $rs->device_name }}</td>
                        <td>{{ $rs->destination }}</td>
                        <td>{{ $rs->level_name }}</td>
                        <td>{{ $rs->note }}</td>
                        <td>{{ $rs->status_name }}</td>
                        <td>
                            @if($rs->status_id == 1)
                                <p>
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#work" data-id="{{ $rs->order_id }}">
                                        รับงาน
                                    </button>
                                </p>
                            @endif
                            @if($rs->status_id == 2)
                                <p>
                                    <a href="{{ route('order.confirm',$rs->order_id) }}"
                                        class="btn btn-danger">
                                        รับคนไข้แล้ว
                                    </a>
                                </p>
                            @endif
                            @if($rs->status_id == 3)
                                <p>
                                    <a href="{{ route('order.success',$rs->order_id) }}"
                                        class="btn btn-warning">
                                        ดำเนินการแล้ว
                                    </a>
                                </p>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Modal -->
        {{-- ID = traget ของปุ่มที่กด --}}
        <div class="modal fade" id="call" index="-1" aria-labelledby="callLabel" aria-hidden="true">
            {{-- size modal-lg modal-xl --}}
            <div class="modal-dialog modal-lg">
                <form action="{{ route('order.create') }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="callLabel">เรียกเปล</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="" class="form-label">สถานที่แจ้ง</label>
                                <select name="place" class="selectex" aria-label="" required>
                                    <option value="">กรุณาเลือกข้อมูล</option>
                                    {{-- Loop --}}
                                    @foreach($dept as $rs)
                                        <option value="{{ $rs->place_id }}">
                                            {{ $rs->place_name }}
                                        </option>
                                    @endforeach
                                    {{-- End Loop --}}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">ปลายทาง</label>
                                <select name="dest" class="selectex" aria-label="" required>
                                    <option value="">กรุณาเลือกข้อมูล</option>
                                    {{-- Loop --}}
                                    @foreach($dept as $rs)
                                        <option value="{{ $rs->place_id }}">
                                            {{ $rs->place_name }}
                                        </option>
                                    @endforeach
                                    {{-- End Loop --}}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">ประเภทรถเข็น</label>
                                <select name="type" class="selectex" aria-label="" required>
                                    <option value="">กรุณาเลือกข้อมูล</option>
                                    {{-- Loop --}}
                                    @foreach($ctype as $rs)
                                        <option value="{{ $rs->cradle_id }}">
                                            {{ $rs->cradle_name }}
                                        </option>
                                    @endforeach
                                    {{-- End Loop --}}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">อุปกรณ์</label>
                                <select name="device" class="selectex" aria-label="" required>
                                    <option value="">กรุณาเลือกข้อมูล</option>
                                    {{-- Loop --}}
                                    @foreach($dtype as $rs)
                                        <option value="{{ $rs->device_id }}">
                                            {{ $rs->device_name }}
                                        </option>
                                    @endforeach
                                    {{-- End Loop --}}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">ความเร่งด่วน</label>
                                <select name="level" class="selectex" aria-label="" required>
                                    <option value="">กรุณาเลือกข้อมูล</option>
                                    {{-- Loop --}}
                                    @foreach($level as $rs)
                                        <option value="{{ $rs->level_id }}">
                                            {{ $rs->level_name }}
                                        </option>
                                    @endforeach
                                    {{-- End Loop --}}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">หมายเหตุ</label>
                                <input name="note" type="text" class="form-control" id="" aria-describedby="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success" 
                                onclick="Swal.fire({
                                    title: 'ยืนการเรียกเปล ?',
                                    showCancelButton: true,
                                    confirmButtonText: `บันทึก`,
                                    cancelButtonText: `ยกเลิก`,
                                    icon: 'success',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        form.submit();
                                    } else if (result.isDenied) {
                                        form.reset();
                                    }
                                })">บันทึกข้อมูล
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Work -->
        <div class="modal fade" id="work" tabindex="-1" aria-labelledby="workLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('order.update') }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="workLabel">เลือกผู้รับงาน</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                {{-- Select --}}
                                <label for="" class="form-label">รายชื่อพนักงานเปล</label>
                                <select name="officer" class="form-select" aria-label="" required>
                                    <option value="">กรุณาเลือกข้อมูล</option>
                                    {{-- Loop --}}
                                    @foreach($officer as $rs)
                                        <option value="{{ $rs->officer_id }}">
                                            {{ $rs->officer_name }}
                                        </option>
                                    @endforeach
                                    {{-- End Loop --}}
                                </select>
                                <input id="dataId" name="dataId" type="text">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success" 
                                onclick="Swal.fire({
                                    title: 'ยืนการรับงาน ?',
                                    showCancelButton: true,
                                    confirmButtonText: `บันทึก`,
                                    cancelButtonText: `ยกเลิก`,
                                    icon: 'success',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        form.submit();
                                    } else if (result.isDenied) {
                                        form.reset();
                                    }
                                })">บันทึกข้อมูล
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Content --}}
</div>
@endsection
@section('script')
{{-- Script --}}
<script type="text/javascript">

    $('[data-bs-target="#work"').on('click', function () {
        var id = $(this).data('id');
        document.getElementById('dataId').value = id;
    });

    $(document).ready(function () {
        let table = new DataTable('#myTable');

        $('.selectex').select2({
            width: '100%',
            dropdownParent: $('#call')
        });
    });
</script>
@endsection
