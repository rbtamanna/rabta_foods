@extends('frontend.frontendMaster')
@section('contents')

<div class="panel panel-default">
        <?php
            $sum=0;
            // dd($carts[0]->quantity);
            foreach ($carts as $i => $cart)
                $sum+=$products[$i]->price * $cart->quantity 
            
        ?>
        <div class="panel-heading">
            <div class="panel-title">
                Total Amount : {{$sum}} , Cash On Delivery
            </div>
        </div>
        <div class="panel-body">
            @if ($errors->any())
                <h1>{{ $errors->first() }}</h1>
            @endif
            
            
            <form action="{{ url('checkout/'.$carts[0]->customer_id) }}" role="form" id="form1" method="post" class="validate" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="control-label">Phone number</label>
                        <input type="text" class="form-control" placeholder="{{$customer->phone}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <!-- <label class="control-label">Address</label>

                    <input type="email" class="form-control" name="email" id="email" value="" data-validate="required" data-message-required="This is custom message for required field." placeholder="Required Field" /> -->
                    <div class="col-xs-4">
                        <label class="control-label">Road</label>
                        <input type="text" class="form-control" name="road" id="road" value="" data-validate="required" data-message-required="This is custom message for required field." placeholder="Required Field" />
                        <!-- <input type="text" class="form-control" placeholder=".col-xs-6" /> -->
                    </div>
                    <div class="col-xs-4">
                        <label class="control-label">House</label>
                        <input type="text" class="form-control" name="house" id="house" value="" data-validate="required" data-message-required="This is custom message for required field." placeholder="Required Field" />
                        <!-- <input type="text" class="form-control" placeholder=".col-xs-6" /> -->
                    </div>
                    <div class="col-xs-4">
                        <label class="control-label">Area</label>
                        <input type="text" class="form-control" name="area" id="area" value="" data-validate="required" data-message-required="This is custom message for required field." placeholder="Required Field" />
                        <!-- <input type="text" class="form-control" placeholder=".col-xs-6" /> -->
                    </div>
                </div>
                <div class="form-group"><br><br>
                    <label class="control-label">City</label>
                    
                    <!-- <div class="col-xs-12"> -->
                        <select name="city" id="city" class="form-control">
                            <option>Dhaka</option>
                            <!-- <option>Option 2</option>
                            <option>Option 3</option>
                            <option>Option 4</option>
                            <option>Option 5</option> -->
                        </select>
                    <!-- </div> -->
                </div>
                

                <div class="form-group">
                    <button type="submit" id="submidt_btn" class="btn btn-success custom_c">Order Confirm</button>
                </div>

            </form>
        </div>
    </div>



@endsection