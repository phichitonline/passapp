<!doctype html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print preview</title>

    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&family=Noto+Sans+Thai&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Kanit', sans-serif;
            font-family: 'Noto Sans Thai', sans-serif;
        }
        table.borderless td,table.borderless th {
            border: none !important;
        }
    </style>

<body onload="javascript:window.print()">

@foreach ($durable as $data)

@php $genqrcode = config('app.url')."/search/".$data->id; @endphp

{{-- <div class="card flex-row flex-wrap border-0" style="width: 500px;"> --}}
<div class="card flex-row border-0" style="width: 500px;">
    <div class="card px-2 border-0 text-center mt-2" style="width: 170px;">
        {!! QrCode::size(150)->generate($genqrcode) !!}
        ID:{{ $data->id }}
    </div>
    <div class="card-block px-0 mt-3">
        <h2><b>{{ $data->pass_number }}</b></h2>
        <h4 class="mt-3">{{ $data->type_name_fasgrp }}</h4>
        <p class="mt-2" style="float:left;">วันที่ได้มา : &nbsp;</p>
        <h4 class="mt-1" style="float:left;"><b>{{ DateThaiFull($data->str_date) }}</b></h4>
        {{-- <h4 style="text-align:right; display: inline">อายุงาน : <b>{{ $data->life }} ปี</b> (Rate {{ $data->rate }})</h4> --}}
    </div>
</div>
<div class="card px-2 border-0" style="width: 500px;">
    <h3>{{ $data->pass_name }} {{ $data->model }}</h3>
</div>

{{-- <div class="table-responsive">
    <table class="table borderless" style="width: 500px;">
      <tbody>
        <tr>
          <td class="text-center" style="width: 160px;">
            {!! QrCode::size(150)->generate($genqrcode) !!}<br>ID:{{ $data->id }}
          </td>
          <td>
            <h2><b>{{ $data->pass_number }}</b></h2>
            <h3>วันที่ได้มา : <b>{{ DateThaiFull($data->str_date) }}</b></h3>
            <h3>อายุใช้งาน : <b>{{ $data->life }} ปี</b> (Rate {{ $data->rate }})</h3>
          </td>
        </tr>
        <td colspan="2">
            <h4>ประเภท : {{ $data->type_name_fasgrp }}</h4>
            <h3>{{ $data->pass_name }}</h3>
        </td>
      </tbody>
    </table>
</div> --}}

@endforeach
