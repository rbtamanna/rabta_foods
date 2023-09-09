@extends('layouts.master')
@section('page_css')
    <link rel="stylesheet" href="{{ asset('backend/js/datatables/dataTables.bootstrap.css') }}">
@endsection
@section('contents')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                About
            </div>
        </div>
        <div class="panel-body">
            @if ($errors->any())
                <h1>{{ $errors->first() }}</h1>
            @endif
                <table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Heading</th>
                        <th>Paragraph</th>
                        <th>Preference</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>Heading</th>
                        <th>Paragraph</th>
                        <th>Preference</th>
                    </tr>
                    </tfoot>

                    @if ($about)
                        <tbody>
                        @foreach($about as $abouts)
                            <tr>
                                <td>{{ $abouts->heading }}</td>
                                <td>{{ $abouts->paragraph }}</td>
                                <td>{{ $abouts->preference }}</td>
                                <td>
                                    <a href="{{ url('about/edit/'.$abouts->id) }}"><button type="button" class="btn btn-blue"><i class="fa-edit"></i></button></a>
                                    <a href="{{ url('about/delete/'.$abouts->id) }}"><button type="button" class="btn btn-danger"><i class="fa-trash"></i></button></a>
                                </td>
                            </tr>
                        @endforeach
                            <tr >
                                <td >
                                    <a href="{{ url('addAbout') }}"><button type="button" class="btn btn-blue "  ><i class="fa-plus-square"></i></button></a>
                                </td>
                            </tr>    
                        </tbody>
                    @endif
                </table>
        </div>
    </div>
@endsection
@section('page_js')
    <script src="{{ asset('backend/js/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/js/datatables/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('backend/js/datatables/yadcf/jquery.dataTables.yadcf.js') }}"></script>
    <script src="{{ asset('backend/js/datatables/tabletools/dataTables.tableTools.min.js') }}"></script>
    <script type="text/javascript">
        $( document ).ready(function() {
            $("#example-1").dataTable({
                aLengthMenu: [
                    [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
                ]
            });
        });
    </script>
@endsection