@extends('layouts.app')

@section('bodyClass', 'small-navigation')
@section('title', 'ค้นหา |')

@section('head')
    <!-- Prism -->
    <link rel="stylesheet" href="{{ url('vendors/prism/prism.css') }}" type="text/css">
@endsection

@section('content')

    <div class="page-header">
        <div class="page-title">
            <h3>{{ $pagename }}</h3>
        </div>
    </div>

    <div class="card-block">
        <div class="card-text">
            {{-- <form class="d-flex" method="GET" action="/durablesearch">
                <button class="btn">
                    <i class="ti-search"></i>
                </button>
                <input type="text" name="did" id="did" class="form-control" placeholder="ค้นหา...">
                <button class="btn btn-primary" type="submit">ค้นหา</button>
            </form> --}}
            <form method="GET" action="/durablesearch">
                <div class="input-group input-group-lg mb-3">
                    <input name="did" id="did" type="text" class="form-control"
                           aria-label="Example text with button addon"
                           placeholder="ค้นหาด้วยเลข ID" autofocus
                           aria-describedby="button-addon1" required>
                    <div class="input-group-append">
                        <button class="btn" type="submit" id="button-addon1">
                            <i class="ti-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('script')
    <!-- Prism -->
    <script src="{{ url('vendors/prism/prism.js') }}"></script>
@endsection
