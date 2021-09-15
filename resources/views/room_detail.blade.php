@extends('master')

@foreach($room as $r)
    @section('judul', $r->nama.' | E-vote.id')
@endforeach

@section('script')
    <script>
        window.addEventListener('scroll', function(){
            let nav = document.querySelector('nav');
            let windowPos = window.scrollY > 0;
            let logo = document.getElementById('navbar-logo');
            let navItem = document.getElementsByClassName("nav-link");
            nav.classList.toggle('scrolling-active', windowPos);
            
            if(windowPos){
                logo.src="{{ asset('storage/logo_main.png') }}";
                for (var i = 0; i < navItem.length; i++) {
                    navItem[i].style.color = "var(--orange)";
                }
            }
            else{
                logo.src="{{ asset('storage/logo_white.png') }}"
                for (var i = 0; i < navItem.length; i++) {
                    navItem[i].style.color = "white";
                }
            }
        })
    </script>
@endsection

@section('css')
    .title{
        position: relative ;
        min-height: 150px;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        background-position: center;
        padding: 120px 0;
    }
    
    .title h2{
        font-family: 'Lato', sans-serif;
        font-weight: 700;
        text-align: center;
        font-size: 3em;
        margin: 0;
        color: #fff;
    }
    
    .title p{
        margin: 0 5px;
        text-align: center;
        color: white;
    }
    
    .navbar-light .navbar-nav .nav-item .nav-link:hover,
    .navbar-light .navbar-nav .nav-item.active .nav-link{
        color: white;
    }
    
    .navbar-light .navbar-nav .nav-item .nav-link{
        color: white;
    }

    .list{
        position: relative;
        min-height: 100vh;
        background: white;
        background-size: cover;
        background-position: center;
        padding: 100px 40px;
    }
    
    .card:hover{
        background: #ff7200;
    }
    
    .card:hover .btn-info{
        color: var(--orange);
        background-color: white;
    }
    
    .card:hover p, 
    .card:hover h4{
        color: white;
    }
    
    .card{
        background: white;
        margin-bottom: 30px;
        -moz-box-shadow: 0 1px 4px 1px #ccc;
        -webkit-box-shadow: 0 1px 4px 1px #ccc;
        box-shadow: 0 1px 4px 1px #ccc;
        border-radius: 0;
    }
    
    .card .card-body{
        padding-top: 0;
        padding-right: 0;
        padding-bottom: 20px;
        padding-left: 0;
    }
    
    .card img{
        width: 100%;
        height: 50vh;
        margin-bottom: 20px;
        object-fit: cover;
        object-position: 0 0;
    }
    
    .card a{
        text-decoration: none;
        color: #333;
    }
    
    .card-title{
        font-family: 'Lato', sans-serif;
        font-weight: 700;
    }
    
    .card-text{
        font-family: 'Lato', sans-serif;
        font-weight: 300;
    }
    
    h1{
        text-align: center;
        font-family: 'Lato', sans-serif;
        font-weight: 700;
        margin: 20px;
        padding: 0;
        font-size: 2.8em;
    }
    
    #room-desc{
        margin-top: 10px;
        margin-bottom: 40px;
    }
    
    #room-info{
        margin: 20px;
    }
    
    #room-info img{
        margin: 0 5px;
    }
@endsection

@section('logo')
    <img id="navbar-logo" src="{{ asset('storage/logo_white.png') }}" height="30" alt="">
@endsection

@section('tab')
    <ul class="navbar-nav ml-lg-auto">
        <li class="nav-item">
            <a class="nav-link" href="https://e-vote.id/room">Ruang</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Bantuan</a>
        </li>
    </ul>
@endsection

@section('konten')
    @foreach($room as $room)
        <section class="title" style="background: linear-gradient(0deg, rgba(50, 50, 50, 0.8), rgba(50, 50, 50, 0.8)), url({{ $room->gambar }});">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2>{{ $room->nama }}</h2>
                    </div>
                </div>
                <div class="row" id="room-desc">
                    <div class="col">
                        <p>{{ $room->deskripsi }}</p>
                    </div>
                </div>
                <div class="row" id="room-info">
                    <div class="col d-flex justify-content-center">
                        <img src="{{ asset('public/icon_candidate.png') }}" width=16 height=16 alt="icon candidate">
                        <p>{{ $kandidat_count }} kandidat</p>
                        <p>  |  </p>
                        <img src="{{ asset('public/icon_vote.png') }}" width=16 height=16 alt="icon vote count">
                        <p>{{ $vote }} suara</p>
                    </div>
                </div>
            </div>
        </section>
    @endforeach

    <section class="list">
        <div class="container">
            <div class="row">
                @foreach($kandidat as $kan)
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="{{ $kan->gambar }}" alt="card image">
                            <h4 class="card-title">{{ $kan->nama }}</h4>
                            <p class="card-text">{{ $kan->deskripsi }}</p>
                            <button type="button" class="btn btn-info" data-val="user1" data-toggle="modal" data-target="#vote">Vote</button>
                        </div>
                    </div>
                </div>
        		@endforeach
            </div>
        </div>
    </section>
    
    <div class="modal fade" id="vote" tabindex="-1" role="dialog" aria-labelledby="my-modal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Vote</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
@endsection