@extends('layouts.master')
@section('contents')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                Edit Product
            </div>
        </div>
        <div class="panel-body">
            
            @if ($errors->any())
                <h1>{{ $errors->first() }}</h1>
            @endif
            <form action="{{ url('product/update/'.$product->id) }}" role="form" id="form1" method="post" class="validate" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="control-label">Code</label>

                    <input type="text" class="form-control" name="code" id="code" value="{{ $product->code }}" data-validate="required" data-message-required="This is custom message for required field." placeholder="Required Field" />
                </div>
                <div class="form-group">
                    <label class="control-label">Name</label>

                    <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}" data-validate="required" data-message-required="This is custom message for required field." placeholder="Required Field" />
                </div>
                <div class="form-group">
                    <label class="control-label">Price</label>

                    <input type="text" class="form-control" name="price" id="price" value="{{ $product->price }}" data-validate="required" data-message-required="This is custom message for required field." placeholder="Required Field" />
                </div>
                <div class="form-group">
                    <?php
                        $categories = DB::table('products_category')->where('product_id', $product->id)->get();
                        $oldCategoriesId= array();
                        
                        
                        foreach ($categories as $row) {
                            array_push($oldCategoriesId, $row->category_id);
                            
                        }
                        // dd($oldCategoriesId);
                        
                    ?>
                    <label>
                        Category 
                        <!-- <input mbsc-input id="my-input" data-dropdown="true" data-tags="true" /> -->
                    </label><br>
                    <select data-placeholder="Change categories" multiple class="chosen-select" name="category[]" id="category">
                    
                        <option value=""></option>
                        
                        @foreach ($category as $categories)
                        
                            <option value='{{ $categories->id }}' {{in_array($categories->id,$oldCategoriesId)? 'selected':''}}> {{ $categories->name }} </option>
                            
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="control-label">Image</label>

                    <input type="file" class="form-control" name="image" id="image" />
                </div>

                <div class="form-group">
                    <button type="submit" id="submidt_btn" class="btn btn-success custom_c">Submit</button>
                </div>

            </form>
        </div>
    </div>
@endsection
@section('page_js')
    <script src="{{ asset('backend/js/jquery-validate/jquery.validate.min.js') }}"></script>
    <script type="text/javascript">
        $( document ).ready(function() {
            //alert('ready');
        });
        
        $('#submit_btn').on('click', function () {
            const email = $('#email').val();
          //  alert(email);
            $.ajax({
                type:'POST',
                url:'{{ url('check_email') }}',
                data: {
                    '_token':  '{{ csrf_token() }}',
                    'email': email
                },
                success:function(data){
                    console.log(data);
                    if (data === true) {
                        $('#form1').submit();
                    } else {
                       let span = document.getElementById('email_err');
                       span.innerHTML = 'Email Has Taken';
                       span.style.color = 'red';
                    }
                }
            });
        })
        $(".chosen-select").chosen({
        no_results_text: "Oops, nothing found!"
        })
    </script>
@endsection