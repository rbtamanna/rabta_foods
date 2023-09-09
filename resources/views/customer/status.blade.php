@extends('frontend.frontendMaster')
@section('page_css')
    <link rel="stylesheet" href="{{ asset('backend/js/datatables/dataTables.bootstrap.css') }}">
@endsection
@section('contents')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                Cart Information
            </div>
        </div>
        <div class="panel-body">
            @if ($errors->any())
                <h1>{{ $errors->first() }}</h1>
            @endif
                <table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Order Code</th>
                        <th>Status</th>
                        <th>Details of Order</th>
                        
                        
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>Order Code</th>
                        <th>Status</th>
                        <th>Details of Order</th>
                        
                    </tr>
                    </tfoot>

                    @if ($codes)
                        <tbody>
                            
                        @foreach ($codes as $i => $code)
                           
                                <tr>
                                    <td>{{ $code }}</td>
                                    <td>{{ $status[$i] }}</td>
                                    
                                    <td>
                                            <form action="{{ url('orderDetails/'.$code) }}" role="form" id="form1" method="get" class="validate" enctype="multipart/form-data">
                                                @csrf
                                                
                                                <div class="form-group">
                                                    <button type="submit" id="submidt_btn" class="btn btn-success custom_c"><i class="fa-file-text-o"></i></button>
                                                </div>

                                            </form>
                                       
                                    </td>
                                </tr>
                            
                        @endforeach

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