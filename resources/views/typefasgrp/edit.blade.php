@extends('layouts.app')

@section('title', 'แก้ไขประเภทครุภัณฑ์ |')

@section('head')

@endsection

@section('content')
<div class="page-header">
    <div class="page-title">
        <h3>{{ $pagename }}</h3>
            {{-- <a href="{{ route('typefasgrp.index') }}" class="btn btn-outline-warning">
                <i class="ti-control-backward mr-2"></i> กลับ
            </a> --}}
            <div class="dropdown">
                @guest
                @else
                    @if (Auth::user()->isadmin <= "1")
                        <form id="deleteForm" action="{{ route('typefasgrp.destroy', $typefasgrp->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="typefasgrpid" value="{{ $typefasgrp->id }}">
                        </form>
                        <a href="{{ route('typefasgrp.index') }}" class="btn btn-outline-warning">
                            <i class="ti-control-backward mr-2"></i> กลับ
                        </a>
                        <a href="#" class="btn btn-outline-danger" onclick="deleteConfirm()"><i class="ti-trash mr-2"></i> ลบ</a>
                    @else
                    @endif
                @endif
            </div>
    </div>
</div>

      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('typefasgrp.update', $typefasgrp->id) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('PUT')

            <div class="card ">

              <div class="card-body ">

                <div class="row">
                  <label class="col-sm-2 col-form-label text-md-right">{{ __('ประเภทครุภัณฑ์') }}</label>
                  <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('type_name_fasgrp') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('type_name_fasgrp') ? ' is-invalid' : '' }}" name="type_name_fasgrp" id="input-type_name_fasgrp" type="text" placeholder="{{ __('ประเภทครุภัณฑ์') }}" value="{{ $typefasgrp->type_name_fasgrp }}" required />
                      <input type="hidden" name="typefasgrpid" value="{{ $typefasgrp->id }}">
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
                        <button type="submit" class="btn btn-primary"><i class="ti-save mr-2"></i> บันทึก</button>
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

<script>
    function deleteConfirm() {
        $(document).ready(function(){
        swal({
        title: "คุณแน่ใจที่จะลบรายการนี้?",
        text: "เมื่อลบแล้ว คุณจะไม่สามารถกู้คืนได้!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                document.getElementById("deleteForm").submit();
            } else {
            }
        });

    });
    }

</script>

@endsection
