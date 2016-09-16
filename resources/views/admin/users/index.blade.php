@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('htmlheader_title')
    Novels
@endsection

@section('contentheader_title')
    Novels list
@endsection

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">用户列表</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @if( Session::has('user_message') )
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-check"></i> Alert!</h4>
                            {{ Session::get('user_message') }}
                        </div>
                    @endif
                    <table id="novels" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>openID</th>
                            <th>昵称</th>
                            <th>是否订阅</th>
                            <th>推送时间</th>
                            <th>创建时间</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>openID</th>
                            <th>昵称</th>
                            <th>是否订阅</th>
                            <th>推送时间</th>
                            <th>创建时间</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
@section('script')
    <script>
        $(function () {
            $('#novels').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('admin/users/datatables') }}",
                "columns": [
                    {data: 'id', name: 'id'},
                    {data: 'open_id', name: 'openID'},
                    {data: 'nickname', name: 'nickname'},
                    {data: 'is_subscribe', name: 'is_subscribe'},
                    {data: 'push_time', name: 'push_time'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'operations', name: 'operations'}
                ]
            });
        });
    </script>
    <script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
@endsection
