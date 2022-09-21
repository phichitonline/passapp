@extends('layouts.app')

@section('title', 'Setting |')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if ($message = Session::get('success'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <i class="ti-check mr-2"></i> {{ $message }}
            </div>
            @endif

            <div class="card">
                <div class="card-header">{{ __('ตั้งค่าระบบ') }}</div>

                @foreach ($setting as $data)

                <div class="card-body">
                    <form action="{{ route('setting.update',1) }}" method="POST" novalidate="novalidate">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="s_name" class="col-md-3 col-form-label text-md-right">{{ __('ชื่อหน่วยงาน') }}</label>
                            <div class="col-md-7">
                                <input id="s_name" type="text" class="form-control" name="s_name" value="{{ $data->s_name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="s_address" class="col-md-3 col-form-label text-md-right">{{ __('ที่อยู่') }}</label>
                            <div class="col-md-7">
                                <input id="s_address" type="text" class="form-control" name="s_address" value="{{ $data->s_address }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="s_no" class="col-md-3 col-form-label text-md-right">{{ __('เลขที่หนังสือ') }}</label>
                            <div class="col-md-7">
                                <input id="s_no" type="text" class="form-control" name="s_no" value="{{ $data->s_no }}">
                                <input id="id" type="hidden" class="form-control" name="id" value="{{ $data->id }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="s_headname" class="col-md-3 col-form-label text-md-right">{{ __('ชื่อผู้อนุมัติ') }}</label>
                            <div class="col-md-7">
                                <input id="s_headname" type="text" class="form-control" name="s_headname" value="{{ $data->s_headname }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="s_address" class="col-md-3 col-form-label text-md-right">{{ __('เปิดปิดระบบงาน') }}</label>
                            <div class="col-md-7">
                                <div class="form-group mt-2">
                                    <div class="custom-control custom-checkbox custom-checkbox-primary">
                                        <input type="checkbox" class="custom-control-input" id="module3" name="module3" value="1" @if($data->module3 == 1) checked @endif>
                                        <label class="custom-control-label" for="module3">เปิดใช้การระบุพิกัด GPS</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox custom-checkbox-success">
                                        <input type="checkbox" class="custom-control-input" id="module1" name="module1" value="1" @if($data->module1 == 1) checked @endif>
                                        <label class="custom-control-label" for="module1">เปิดใช้ระบบศูนย์เครื่องมือแพทย์</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox custom-checkbox-secondary">
                                        <input type="checkbox" class="custom-control-input" id="module2" name="module2" value="1" @if($data->module2 == 1) checked @endif>
                                        <label class="custom-control-label" for="module2">เปิดใช้ระบบงานซ่อมพร้อมประวัติการซ่อม</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox custom-checkbox-warning">
                                        <input type="checkbox" class="custom-control-input" id="module5" name="module5" value="1" @if($data->module5 == 1) checked @endif>
                                        <label class="custom-control-label" for="module5">มีและใช้งาน Line notify แจ้งเตือนการส่งซ่อม</label>
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <div class="custom-control custom-checkbox custom-checkbox-danger">
                                        <input type="checkbox" class="custom-control-input" id="module4" name="module4" value="1" @if($data->module4 == 1) checked @endif>
                                        <label class="custom-control-label" for="module4">เก็บประวัติการโอนย้ายครุภัณฑ์</label>
                                    </div>
                                </div> --}}
                                {{-- <div class="form-group">
                                    <div class="custom-control custom-checkbox custom-checkbox-warning">
                                        <input type="checkbox" class="custom-control-input" id="customCheck4" checked>
                                        <label class="custom-control-label" for="customCheck4">Check this custom checkbox - Warning</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox custom-checkbox-info">
                                        <input type="checkbox" class="custom-control-input" id="customCheck5" checked>
                                        <label class="custom-control-label" for="customCheck5">Check this custom checkbox - Info</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox custom-checkbox-dark">
                                        <input type="checkbox" class="custom-control-input" id="customCheck6" checked>
                                        <label class="custom-control-label" for="customCheck6">Check this custom checkbox - Dark</label>
                                    </div>
                                </div> --}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="linetoken" class="col-md-3 col-form-label text-md-right">{{ __('Line notify accToken') }}</label>
                            <div class="col-md-7">
                                <input id="linetoken" type="text" class="form-control" name="linetoken" value="{{ $data->linetoken }}">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-7 offset-md-3">
                                <button type="submit" class="btn btn-primary"><i class="ti-check mr-2"></i>
                                    {{ __('บันทึก') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>


@endsection
