@extends('layouts.app')

@section('title', 'เพิ่มผู้ใช้ใหม่ |')

@section('head')

@endsection

@section('content')
<div class="page-header">
    <div class="page-title">
        <h3>{{ $pagename }}</h3>
            {{-- <a href="{{ route('department.index') }}" class="btn btn-outline-warning">
                <i class="ti-control-backward mr-2"></i> กลับ
            </a> --}}
            <div class="dropdown">
                @guest
                @else
                    @if (Auth::user()->isadmin <= "1")
                        <form id="deleteForm" action="{{ route('department.destroy', $department->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="departmentid" value="{{ $department->id }}">
                        </form>
                        <a href="{{ route('department.index') }}" class="btn btn-outline-warning">
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
          <form method="post" action="{{ route('department.update',$department->id) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('PUT')

            <div class="card ">

              <div class="card-body ">

                <div class="row">
                  <label class="col-sm-2 col-form-label text-md-right">{{ __('รหัสหน่วยงาน') }}</label>
                  <div class="col-sm-2">
                    <div class="form-group{{ $errors->has('depcode') ? ' has-danger' : '' }}">
                      <input type="hidden" name="departmentid" value="{{ $department->id }}">
                      <input class="form-control{{ $errors->has('depcode') ? ' is-invalid' : '' }}" name="depcode" id="input-depcode" type="text" placeholder="{{ __('รหัสหน่วยงาน') }}" value="{{ $department->depcode }}" required="true" aria-required="true"/>
                      @if ($errors->has('depcode'))
                        <span id="name-depcode" class="error text-danger" for="input-depcode">{{ $errors->first('depcode') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label text-md-right">{{ __('ชื่อหน่วยงาน') }}</label>
                  <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('dep_name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('dep_name') ? ' is-invalid' : '' }}" name="dep_name" id="input-dep_name" type="text" placeholder="{{ __('ชื่อหน่วยงาน') }}" value="{{ $department->dep_name }}" required />
                      @if ($errors->has('dep_name'))
                        <span id="dep_name-error" class="error text-danger" for="input-dep_name">{{ $errors->first('dep_name') }}</span>
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
