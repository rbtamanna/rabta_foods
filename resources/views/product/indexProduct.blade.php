@extends('layouts.master')
@section('page_css')
    <link rel="stylesheet" href="{{ asset('backend/js/datatables/dataTables.bootstrap.css') }}">
@endsection
@section('contents')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                Products
            </div>
        </div>
        <div class="panel-body">
            @if ($errors->any())
                <h1>{{ $errors->first() }}</h1>
            @endif
                <table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Image</th>
                        
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Image</th>
                       
                    </tr>
                    </tfoot>

                    @if ($products)
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->category }}
                                    <?php
                                        $categories = DB::table('products_category')->where('product_id', $product->id)->get();
                                        // echo $categories;
                                        foreach ($categories as $row) {
                                            // Access individual columns of the row
                                            $names = DB::table('categories')->where('id', $row->category_id)->get();
                                            // echo $categories;
                                            foreach ($names as $name) {
                                                $category = $name->name;
                                                echo "$category, \n";
                                            }
                                        }
                                        
                                    ?>
                                    
                                </td>
                                <td><div class="user-profile">
                                        <img src="{{ asset('storage/product/'.$product->image) }}" alt="" class="img-inline userpic-32" height="50px">
                                    </div>
                                </td>
                                
                                <td>
                                    <a href="{{ url('product/edit/'.$product->id) }}"><button type="button" class="btn btn-blue"><i class="fa-edit"></i></button></a>
                                    <a href="{{ url('product/delete/'.$product->id) }}"><button type="button" class="btn btn-danger"><i class="fa-trash"></i></button></a>
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