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
                        <th>Produc Name</th>
                        <th>Product Quantity</th>
                        <th>Per Product Price</th>
                        <th>Total Price</th>
                        <th>Change the Quantity</th>
                        
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <?php
                        $sum=0;
                            foreach ($carts as $i => $cart)
                                $sum+=$products[$i]->price * $cart->quantity 
                            
                        ?>
                        <th>{{$sum}}</th>
                        <th>
                            
                            <form action="{{ url('checkout/'.$carts[0]->customer_id) }}" role="form" id="form1" method="get" class="validate" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <button type="submit" id="submidt_btn" class="btn btn-success custom_c">Checkout</button>
                                </div>

                            </form>
                        </th>
                    </tr>
                    </tfoot>

                    @if ($carts)
                        <tbody>
                            
                        @foreach ($carts as $i => $cart)
                            @if ($cart->quantity > 0)
                                <tr>
                                    <td>{{ $products[$i]->name }}</td>
                                    <td>{{ $cart->quantity }}</td>
                                    <td>{{ $products[$i]->price }}</td>
                                    <td>{{ $products[$i]->price * $cart->quantity }}</td>
                                    <td>
                                       
                                            <form action="{{ url('cart/update/'.$cart->id) }}" role="form" id="form1" method="post" class="validate" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="quantity" value="{{ $cart->quantity }}" id="quantity" data-validate="required" data-message-required="This is custom message for required field." placeholder="Required Field" />
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" id="submidt_btn" class="btn btn-success custom_c"><i class="fa-save"></i></button>
                                                </div>
                                                <a href="{{ url('cart/delete/'.$cart->id) }}"><button type="button" class="btn btn-danger"><i class="fa-trash"></i></button></a>


                                            </form>

                                    </td>
                                </tr>
                            @endif
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