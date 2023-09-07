<div>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand" href="#">
            <img src="{{asset('backend/images/rabta2.jpg')}}" width="100" alt="" class="d-inline-block align-text-top" />
            </a>
            </div>
            <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li class="active"><a href="{{url('menu')}}">Menu</a></li>
            <!-- <li class="dropdown">
                <a class="dropdown-toggle" href="{{url('menu')}}" data-toggle="dropdown" href="#">Menu
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a href="#">Page 1-1</a></li>
                <li><a href="#">Page 1-2</a></li>
                <li><a href="#">Page 1-3</a></li>
                </ul>
            </li> -->
            <li><a href="{{url('about')}}">About</a></li>
            <li><a href="{{url('contact')}}">Contact</a></li>
            </ul>
        </div>
    </nav>
</div>