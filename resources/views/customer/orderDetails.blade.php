@extends('frontend.frontendMaster')
@section('page_css')
    <link rel="stylesheet" href="{{ asset('backend/js/datatables/dataTables.bootstrap.css') }}">
@endsection
@section('contents')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                Order Details of - {{$code}} , {{$orders[0]->status}}
            </div>
        </div>
        <div class="panel-body">
            @if ($errors->any())
                <h1>{{ $errors->first() }}</h1>
            @endif
                <table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Produc Name</th>
                        <th>Product Quantity</th>
                        <th>Per Product Price</th>
                        <th>Total Price</th>
                        
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <?php
                        $sum=0;
                            foreach ($orders as $i => $order)
                                $sum+=$order->price * $order->quantity 
                            
                        ?>
                        <th>{{$sum}}</th>
                        
                    </tr>
                    </tfoot>

                    @if ($orders)
                        <tbody>
                            
                        @foreach ($orders as $i => $order)
                            
                                <tr>
                                    <td>{{ $names[$i] }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ $order->price }}</td>
                                    <td>{{ $order->price * $order->quantity }}</td>
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