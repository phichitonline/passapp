@extends('layouts.app')

@section('title', 'เพิ่มประเภทครุภัณฑ์ |')

@section('head')

@endsection

@section('content')
<div class="page-header">
    <div class="page-title">
        <h3>{{ $pagename }}</h3>
            <a href="{{ route('typefasgrp.index') }}" class="btn btn-outline-warning">
                <i class="ti-control-backward mr-2"></i> กลับ
            </a>
    </div>
</div>

      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('typefasgrp.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">

              <div class="card-body ">

                <div class="row">
                  <label class="col-sm-2 col-form-label text-md-right">{{ __('ประเภทครุภัณฑ์') }}</label>
                  <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('type_name_fasgrp') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('type_name_fasgrp') ? ' is-invalid' : '' }}" name="type_name_fasgrp" id="input-type_name_fasgrp" type="text" placeholder="{{ __('ประเภทครุภัณฑ์') }}" value="{{ old('type_name_fasgrp') }}" required />
                      @if ($errors->has('type_name_fasgrp'))
                        <span id="type_name_fasgrp-error" class="error text-danger" for="input-type_name_fasgrp">{{ $errors->first('type_name_fasgrp') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-6">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="ti-save mr-2"></i> เพิ่มประเภท</button>
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

@endsection
