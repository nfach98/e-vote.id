@extends('master')

@section('judul', 'Ruang')

@section('script')
    <script>
        window.addEventListener('scroll', function(){
            let nav = document.querySelector('nav');
            let navItem = document.getElementsByClassName("nav-link");
            let windowPos = window.scrollY > 0;
            nav.classList.toggle('scrolling-active', windowPos);
        })
    </script>
@endsection

@section('css')
    .navbar-light .navbar-nav .nav-item .nav-link:hover,
    .navbar-light .navbar-nav .nav-item.active .nav-link{
        color: var(--orange);
    }
    
    .navbar-light .navbar-nav .nav-item .nav-link{
        color: var(--orange);
    }

    .list{
        position: relative;
        min-height: 100vh;
        background: white;
        background-size: cover;
        background-position: center;
        padding: 100px 40px;
    }
    
    #detail{
        text-decoration: none;
        color: #333;
    }
    
    #detail:hover{
        color: white;
    }
    
    .card:hover{
        background: #ff7200;
    }
    
    .card{
        background: white;
        position: relative;
        z-index: 2;
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
@endsection

@section('logo')
    <img src="{{ asset('storage/logo_main.png') }}" height="30" alt="">
@endsection

@section('tab')
    <ul class="navbar-nav ml-lg-auto">
        <li class="nav-item active">
            <a class="nav-link" href="https://e-vote.id/room">Ruang<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Bantuan</a>
        </li>
    </ul>
@endsection

@section('konten')
    <section class="list">
        <div class="container">
            <div class="row">
                @foreach($room as $r)
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="card-deck flex-row flex-nowrap">
                        <a id="detail" href="http://e-vote.id/{{ $r->id }}">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <p><img class=" img-fluid" src={{ $r->gambar }} alt="card image"></p>
                                <h4 class="card-title">{{ $r->nama }}</h4>
                                <p class="card-text">{{ $r->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                </div>
        		@endforeach
            </div>
        </div>
    </section>
@endsection