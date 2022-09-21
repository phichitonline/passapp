@extends('layouts.app')

@section('title', 'เพิ่มผู้ใช้ใหม่ |')

@section('head')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ url('vendors/select2/css/select2.min.css') }}" type="text/css">

@endsection

@section('content')
<div class="page-header">
    <div class="page-title">
        <h3>{{ $pagename }}</h3>
            <a href="{{ route('user.index') }}" class="btn btn-outline-warning">
                <i class="ti-control-backward mr-2"></i> กลับ
            </a>
    </div>
</div>

      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('user.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">

              <div class="card-body ">

                <div class="row">
                  <label class="col-sm-2 col-form-label text-md-right">{{ __('ชื่อ - นามสกุล') }}</label>
                  <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('ชื่อ - นามสกุล') }}" value="{{ old('name') }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label text-md-right">{{ __('Email') }}</label>
                  <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required />
                      @if ($errors->has('email'))
                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label text-md-right">{{ __('หน่วยงาน') }}</label>
                    <div class="col-sm-6">
                      <div class="form-group{{ $errors->has('depcode') ? ' has-danger' : '' }}">
                          <select id="depcode" name="depcode" class="js-example-basic-single">
                              @foreach ($department as $department)
                              <option value="{{ $department->depcode }}">{{ $department->dep_name }}</option>
                              @endforeach
                          </select>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label text-md-right">{{ __('ระดับผู้ใช้') }}</label>
                    <div class="col-sm-6">
                      <div class="form-group{{ $errors->has('isadmin') ? ' has-danger' : '' }}">
                          <select id="isadmin" name="isadmin" class="js-example-basic-single">
                              @foreach ($usertype as $usertype)
                              <option value="{{ $usertype->type }}">{{ $usertype->usertype }}</option>
                              @endforeach
                          </select>
                      </div>
                    </div>
                  </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label text-md-right" for="input-password">{{ __(' Password') }}</label>
                  <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" input type="password" name="password" id="input-password" placeholder="{{ __('รหัสผ่าน') }}" value="" required />
                      @if ($errors->has('password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label text-md-right" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('ยืนยันรหัสผ่าน') }}" value="" required />
                      <input type="hidden" name="user_level" value="8">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-6">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="ti-save mr-2"></i> เพิ่มผู้ใช้</button>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </form>
        </div>
      </div>
@endsection

@section('script')

    <!-- Select2 -->
    <script src="{{ url('vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{ url('assets/js/examples/select2.js') }}"></script>

@endsection
