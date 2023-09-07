@extends('frontend.frontendMaster')
@section('page_css')
<style>
    .achievemnet-contact{
    padding: 1% 7%;
    /* background-color: #e17f93; */
    color: #2c2e2f;
    text-align: center;
}
.grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr; /* Two equal-width columns */
            gap: 10px; /* Adjust the gap between columns */
            width: 80%; /* Optional: Set a specific width for the grid container */
            margin: 0 auto; /* Optional: Center the grid container */
        }
.contact{
    text-align: center;
}

.contact input, textarea{
    width: 100%;
    padding: 10px;
    font-size: 1rem;
    text-align: center;
    border: none;
    border-radius: 5px;
    resize: none;

}

.contact button{
    border: none;
    border-radius: 12px;
    background-color: #052d2f;
    color: #f28dad;
    cursor: pointer;
    padding: 15px;
    margin: 10px;
    width: 100px;
}


.contact-links{
    text-align: center;
}

.media-buttons .btn{
    border: none;
    border-radius: 25px;
    cursor: pointer;
    font-size: 32px;
    padding: 5px;
    margin: 10px;
    width: 50px;
    background-color: white;
}
.btn:hover{
    background-color: gray;
}

.achievemnet-contact::after{
    clear: both;
    display: table;
    content: '';
 }
</style>
@endsection
@section('contents')

<div class=" achievemnet-contact grid-container">
    <div class="contact" id="contact-id" >
        <h2>CONTACT ME</h2>
        <hr class="dotted-hr">

        <form action="mailto:rbtamannarbt@gmail.com" method="post" enctype="text/plain">
            <p><input type="text" placeholder="Your Name" name="name"></p>
            <p><input type="email" placeholder="Your Email" name="email"></p>
            <p><input type="text" placeholder="Subject" name="subject"></p>
            <textarea name="message" id="" cols="30" rows="10" placeholder="Your Message Here"></textarea>
            <button type="submit">SEND</button>
            <button type="reset">RESET</button>
        </form>
    </div>
    <div class="contact-links" >
        <h2>More Links</h2>
        <hr class="dotted-hr">
        <div class="" style="font-size: 2rem">
        @foreach($contact as $contacts)
            @if ($contacts->url && $contacts->value)
               <a href='{{ $contacts->url }}' target="blank"> 
                {{$contacts->media}}</a> : {{$contacts->value}}<br>
            @endif
            @if ($contacts->url && !$contacts->value)
            <a href='{{ $contacts->url }}' target="blank"> 
                {{$contacts->media}}</a> <br>
            @endif
            @if ($contacts->value && !$contacts->url)
                 {{$contacts->media}} : {{$contacts->value}}<br>
            @endif
        @endforeach
           </br></br>
            <p style="font: size 30px; color:black"><i class="linecons-location" ></i>
            Mirpur 11.5, Pallabi, Dhaka, Bangladesh</p>
        </div>
    </div>
    
</div>


@endsection