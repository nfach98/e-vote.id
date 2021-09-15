@extends('master')

@section('judul', 'E-vote.id - Tentukan pilihanmu')

@section('script')
    <script>
        var windowPos = false;
        
        window.addEventListener('scroll', function(){
            let nav = document.querySelector('nav');
            let logo = document.getElementById('navbar-logo');
            let navItem = document.getElementsByClassName('nav-link');
            windowPos = window.scrollY > 0;
            
            nav.classList.toggle('scrolling-active', windowPos);
            
            //only on welcome page
            if(windowPos){
                logo.src="{{ asset('storage/logo_main.png') }}"
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
        });
        
        function voteclick(id, nama){
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function() {
                if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                    var token = xmlHttp.responseText.replace(/['"]+/g, '');
                    snap.pay(token, {
                        gopayMode: "qr",
                        onSuccess: function(result){
                            var vote = new XMLHttpRequest();
                            vote.open("GET", "https://e-vote.id/public/vote/" + id, true);
                            vote.send();
                            location.reload();
                            return false;
                        },
                        
                        onPending: function(result){
                            // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                        },
                        
                        onError: function(result){
                            // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                        }
                    });
                }
            }
            xmlHttp.open("GET", "https://e-vote.id/public/token/" + nama, true);
            xmlHttp.send();
        }
    </script>
@endsection

@section('css')
    .banner{
        position: relative;
        min-height: 100vh;
        background: linear-gradient(0deg, rgba(50, 50, 50, 0.8), rgba(50, 50, 50, 0.8)), url('https://e-vote.id/public/storage/bg_home.jpg');
        background-size: cover;
        background-position: center;
        padding: 250px 0 200px;
    }
    
    .banner h2{
        font-family: 'Lato', sans-serif;
        font-weight: 700;
        text-align: center;
        margin: 20px;
        padding: 0;
        font-size: 3em;
        color: #fff;
    }
    
    .banner p{
        font-family: 'Lato', sans-serif;
        font-weight: 400;
        text-align: center;
        font-size: 1.4em;
        padding: 0 60px;
        color: #fff;
    }
    
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
        margin: 10px 0;
    }
    
    .navbar-light .navbar-nav .nav-item .nav-link{
        color: white;
        margin: 10px 0;
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
    
    .card-title,
    .card-text{
        font-family: 'Lato', sans-serif;
        font-weight: 700;
    }
    
    .card-text{
        color: var(--orange);
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
    
    .modal p{
        margin: 0 20px;
        font-weight: 700;
        text-align: center;
    }
    
    .modal a{
        font-weight: 400;
    }
    
    .modal a:hover {
        font-weight: 400;
        color: var(--orange);
    }
@endsection

@section('logo')
    <img id="navbar-logo" src="{{ asset('public/storage/logo_white.png') }}" height="30" alt="">
@endsection

@section('tab')
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="#">Bantuan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Tentang</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Syarat dan ketentuan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Refund</a>
        </li>
    </ul>
@endsection

@section('konten')
    <section class="banner">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>Tentukan pilihanmu</h2>
                    <p>Tempat memilih terbaik untuk menemukan beragam ruang voting yang dicari dan mendukung pilihanmu dengan hanya satu klik mudah. Hanya di e-vote.id.</p>
                </div>
            </div>
        </div>
    </section>
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
                <!--<div class="row" id="room-info">
                    <div class="col d-flex justify-content-center">
                        <img src="{{ asset('public/icon_candidate.png') }}" width=16 height=16 alt="icon candidate">
                        <p>{{ $kandidat_count }} kandidat</p>
                        <p>  |  </p>
                        <img src="{{ asset('public/icon_vote.png') }}" width=16 height=16 alt="icon vote count">
                        <p>{{ $vote }} suara</p>
                    </div>
                </div>-->
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
                            <p class="card-text">{{ $kan->suara }} Suara</p>
                            <button class="btn btn-info" onclick="voteclick('{{ $kan->id }}', '{{ $kan->nama }}')">Vote</button>
                        </div>
                    </div>
                </div>
        		@endforeach
            </div>
        </div>
    </section>
@endsection