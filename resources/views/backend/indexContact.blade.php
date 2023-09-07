@extends('frontend.frontendMaster')
@section('page_css')
    <link rel="stylesheet" href="{{ asset('backend/js/datatables/dataTables.bootstrap.css') }}">
@endsection
@section('contents')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                Contacts
            </div>
        </div>
        <div class="panel-body">
            @if ($errors->any())
                <h1>{{ $errors->first() }}</h1>
            @endif
                <table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Media</th>
                        <th>URL</th>
                        <th>Value</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>Media</th>
                        <th>URL</th>
                        <th>Value</th>
                    </tr>
                    </tfoot>

                    @if ($contact)
                        <tbody>
                        @foreach($contact as $contacts)
                            <tr>
                                <td>{{ $contacts->media }}</td>
                                <td>{{ $contacts->url }}</td>
                                <td>{{ $contacts->value }}</td>
                                <td>
                                    <a href="{{ url('contact/edit/'.$contacts->id) }}"><button type="button" class="btn btn-blue">Edit</button></a>
                                    <a href="{{ url('contact/delete/'.$contacts->id) }}"><button type="button" class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                        @endforeach
                            <tr >
                                <td >
                                    <a href="{{ url('addContact') }}"><button type="button" class="btn btn-blue "  >Add Category</button></a>
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