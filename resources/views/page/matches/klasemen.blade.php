@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="portlet green-sharp box">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings"></i>
                    <span class="caption-subject font-white sbold uppercase">Klasemen</span>
                    <small>managemen data Klasemen</small>
                </div>
                <div class="actions">
                    
                </div>
            </div>

            <div class="portlet-body">
                <table id="datatable" class="table table-striped table-bordered table-hover table-checkable">
                <thead>
                    <tr>
                        <th>Klub</th>
                        <th>MA</th>
                        <th>ME</th>
                        <th>S</th>
                        <th>K</th>
                        <th>GM</th>
                        <th>GK</th>
                        <th>Point</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datas as $data)
                        <tr>
                            <td>{{$data->name}}</td>
                            <td>{{$data->playing}}</td>
                            <td>{{$data->win}}</td>
                            <td>{{$data->seri}}</td>
                            <td>{{$data->lose}}</td>
                            <td>{{$data->win_goal}}</td>
                            <td>{{$data->lose_goal}}</td>
                            <td>{{$data->poin}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
@endsection
