@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="portlet green-sharp box">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings"></i>
                    <span class="caption-subject font-white sbold uppercase">{{ $view }}</span>
                    <small>managemen data {{ $view }}</small>
                </div>
                <div class="actions">
                    <a class="btn white btn-outline btn-circle" href="{{ route($view.'.create') }}">
                        <i class="fa fa-plus"></i>
                        <span class="hidden-xs"> Add </span>
                    </a>
                </div>
            </div>

            <div class="portlet-body ">
                <table id="datatable" class="table table-striped table-bordered table-hover table-checkable responsive-table">
                <thead>
                    <tr>
                        <th>Klub Tuan Rumah</th>
                        <th>Klub Tandang</th>
                        <th>Skor Klub Taun Rumah</th>
                        <th>Skor Klub Tandang</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($datas as $data)
                    <tr>
                        <td>{{$data->home->name}}</td>
                        <td>{{$data->away->name}}</td>
                        <td>{{$data->home_goal}}</td>
                        <td>{{$data->away_goal}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
@endsection
