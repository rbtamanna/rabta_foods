@extends('layouts.master')
@section('page_css')
    <link rel="stylesheet" href="{{ asset('backend/js/datatables/dataTables.bootstrap.css') }}">
@endsection
@section('contents')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                Order History
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
                        <th>Customer ID</th>
                        <th>Status</th>
                        <th>Total Price</th>
                        
                        
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>Order Code</th>
                        <th>Customer ID</th>
                        <th>Status</th>
                        <th>Total Price</th>
                        
                        
                    </tr>
                    </tfoot>

                    @if(isset($code) && count($code) > 0)
                        <tbody>
                            
                        @foreach ($code as $i => $codes)
                           
                                <tr>
                                    <td>{{ $codes }}</td>
                                    <td>{{ $customer_id[$i] }}</td>
                                    <td>{{ $status[$i] }}</td>
                                    <td>{{ $total[$i] }}</td>
                                    
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