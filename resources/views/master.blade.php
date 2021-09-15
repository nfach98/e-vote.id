<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="theme-color" content="#ff7200">
        <meta name="msapplication-navbutton-color" content="#ff7200">
        <meta name="apple-mobile-web-app-status-bar-style" content="#ff7200">
        <link rel="icon" type="image/x-icon" href="{{ asset('storage/favicon.ico') }}"/>
        <title>@yield('judul')</title>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;700&display=swap" rel="stylesheet">
        
        <script src="https://app.midtrans.com/snap/snap.js" data-client-key="Mid-client-guNz_YtqBbESrx45"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        
        @yield('script')
        
        <style>
            :root{
                --orange: #ff7200;
            }
            
            html, body, header, .view{
                font-family: 'Lato', sans-serif;
            }
        
            header{
                position: absolute;
                z-index: 10;
                width: 100%;
            }
            
            .navbar{
                padding: 10px 20px;
                transition: all 350ms ease-out;
            }
            
            .form-group{
                margin: 10px 20px;
                width: 100%;
            }
            
            .form-control:focus{
                border-color: var(--orange);
                box-shadow: none; 
                -webkit-box-shadow: none;
            }
            
            .form-control::-webkit-input-placeholder {
                font-family: 'Lato', sans-serif;
                font-weight: 400;
                color: #bbb;
            }
            
            .btn-primary, 
            .btn-primary:hover, 
            .btn-primary:active, 
            .btn-primary:focus{
                padding: 0 20px;
                background: var(--orange);
                border: none;
                font-weight: 400;
                color: white;
                box-shadow: none; 
                -webkit-box-shadow: none;
            }
            
            .btn-info, 
            .btn-info:hover, 
            .btn-info:active, 
            .btn-info:focus{
                background: var(--orange);
                border: none;
                font-weight: 700;
                color: white;
                box-shadow: none; 
                -webkit-box-shadow: none;
            }
            
            .close:active{
                outline: none;
            }
            
            .navbar-light .navbar-nav .nav-item .nav-link:hover,
            .navbar-light .navbar-nav .nav-item.active .nav-link{
                font-weight: 700;
                color: white;
            }
            
            .navbar-light .navbar-nav .nav-item .nav-link{
                padding: 0 10px;
                font-weight: 300;
                font-size: 16px;
                color: white;
            }
            
            /*after scrolled*/
            .scrolling-active{
                background-color: white;
                z-index: 5;
                -moz-box-shadow: 0 1px 4px 1px #ccc;
                -webkit-box-shadow: 0 1px 4px 1px #ccc;
                box-shadow: 0 1px 4px 1px #ccc;
            }
            
            h1, h2, h4, h5{
                font-weight: 700;
            }
    
            p{
                font-weight: 400;
            }
            
            .modal-title{
                color: var(--orange);
                width: 100%;
                text-align: center;
            }
            
            /*footer*/
            #footer-logo{
                margin-bottom: 20px;
            }
            #footer {
                padding: 30px 0;
                background: #333;
            }
            #footer h5{
                padding-bottom: 6px;
                margin-bottom: 20px;
                color: white;
            }
            #footer p{
                margin-bottom: 2px;
            }
            #footer a {
                color: #ffffff;
                text-decoration: none;
                background-color: transparent;
                -webkit-text-decoration-skip: objects;
            }
            #footer ul.quick-links li{
            	padding: 3px 0;
            	-webkit-transition: .5s all ease;
            	-moz-transition: .5s all ease;
            	transition: .5s all ease;
            }
            #footer ul.quick-links li:hover{
            	padding: 3px 0;
            	margin-left:5px;
            	font-weight:700;
            }
            #footer ul.quick-links li:hover a {
                font-weight: 700;
                color: var(--orange);
            }
            
            @media (max-width:767px){
            	#footer h5 {
                padding-left: 0;
                border-left: transparent;
                padding-bottom: 0px;
                margin-bottom: 10px;
            }
            }
            
            @yield('css')
            
        </style>
    </head>
    
    <body>
        <header>
            <div class="container">
                <nav id="navigation" class="navbar navbar-light justify-content-between fixed-top">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        @yield('logo')
                    </a>
                    
                    <button class="navbar-toggler" id="toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!--<div class="form-group">
                            <form class="form-inline" action="/search" accept-charset="UTF-8" method="get">
                                <div class="input-group flex-fill">
                                    <input type="search" name="search" id="search" value="" placeholder="Cari ruang voting" class="form-control" aria-label="Cari ruang voting">
                                    <div class="input-group-append">
                                        <input type="submit" name="commit" value="Cari" id="search" class="btn btn-primary" data-disable-with="Search">
                                    </div> 
                                </div>
                            </form>
                        </div>-->
                        @yield('tab')
                    </div>
                </nav>
            </div>
        </header>
        
        @yield('konten')
        
        <section id="footer">
    		<div class="container">
    			<div class="row text-center text-xs-center text-sm-left text-md-left text-white">
    			    
    				<div class="col-xs-12 col-sm-9 col-md-9" style="margin: 20px 0;">
    				    <img id="footer-logo" src="{{ asset('storage/logo_orange.png') }}" height="50" alt="">
    					<p>Jl. Flamboyan Payolansek</p>
    					<p>Payakumbuh, Sumatera Barat, 26225</p>
    					<p style="margin-top: 20px;">info@e-vote.id</p>
    					<p>0821-1318-4815</p>
    				</div>
    				<!--<div class="col-xs-12 col-sm-3 col-md-3" style="margin: 20px 0;">
    					<h5>Perusahaan</h5>
    					<ul class="list-unstyled quick-links">
    						<li><a href="https://www.fiverr.com/share/qb8D02">Kontak</a></li>
    						<li><a href="https://www.fiverr.com/share/qb8D02">Syarat & ketentuan</a></li>
    						<li><a href="https://www.fiverr.com/share/qb8D02">Kebijakan refund</a></li>
    					</ul>
    				</div>-->
    			</div>
    			
    			<div class="row">
    				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white" style="margin-top: 20px;">
    				    <p class="h6">© 2020 Copyright <b>e-vote.id</b>. All right reserved.</p>
    				</div>
    				<hr>
    			</div>	
    		</div>
    	</section>
        
    </body>
</html>
