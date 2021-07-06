<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@yield('aimeos_header')
	<title>Lisheapp Freshshop</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4/dist/css/bootstrap.min.css">
	<style>
		/* Theme: Black&White */
		/* body {
			--ai-primary: #000; --ai-primary-light: #000; --ai-primary-alt: #fff;
			--ai-bg: #fff; --ai-bg-light: #fff; --ai-bg-alt: #000;
			--ai-secondary: #555; --ai-light: #D0D0D0;
		} */
		body { color: #000; color: var(--ai-primary, #000); background-color: #fff; background-color: var(--ai-bg, #fff); }
		.navbar, footer { color: #555; color: var(--ai-primary-alt, #555); background-color: #f8f8f8; background-color: var(--ai-bg-alt, #f8f8f8); }
		.navbar a, .navbar a:before, .navbar span, footer a { color: #555 !important; color: var(--ai-primary-alt, #555) !important; }
		.content { margin: 0 5% } .catalog-stage-image { margin: 0 -5.55% }
		.sm { display: block } .sm:before { font: normal normal normal 14px/1 FontAwesome; padding: 0 0.2em; font-size: 225% }
		.facebook:before { content: "\f082" } .twitter:before { content: "\f081" } .instagram:before { content: "\f16d" } .youtube:before { content: "\f167" }
	</style>
	@yield('aimeos_styles')
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-light">
		<a class="navbar-brand" href="/">
			<img src="https://mmea.info/logos.png" height="30" title="Lisheapp Logo">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
			<ul class="navbar-nav">
			<li class="nav-item"><a class="nav-link" href="/shop">Shop</a></li>
				@if (Auth::guest())
					<li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
					<li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
				@else
					<li class="nav-item dropdown">
						<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a class="nav-link" href="{{ route('aimeos_shop_account',['site'=>Route::current()->parameter('site','default'),'locale'=>Route::current()->parameter('locale','en'),'currency'=>Route::current()->parameter('currency','EUR')]) }}" title="Profile">Profile</a></li>
							<li><form id="logout" action="/logout" method="POST">{{csrf_field()}}</form><a class="nav-link" href="javascript: document.getElementById('logout').submit();">Logout</a></li>
						</ul>
					</li>
				@endif
			</ul>
			@yield('aimeos_head')
		</div>
	</nav>
	<div class="content">

<div class="content">
   <div class="row">
     <div class="col-md-12">
       <div class="card card-user">
         <div class="card-header">
           <h5 class="card-title">Contact Us</h5>
         </div>
        <div class="card-body">
           @if(Session::has('success'))
              <div class="alert alert-success">
        	    {{ Session::get('success') }}
               </div>
           @endif
           
          <form method="post" action="contact-us">
             {{csrf_field()}}
             <div class="row">
               <div class="col-md-12">
                 <div class="form-group">
                   <label> Name </label>
                   <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name">
                   @error('name')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                 </div>
               </div>
             <div class="col-md-12">
               <div class="form-group">
                   <label> Email </label>
                   <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email">
                   @error('email')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                 </div>
               </div>   
             <div class="col-md-12">
                <div class="form-group">
                   <label> Phone Number </label>
                   <input type="text" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Phone Number" name="phone_number">
                   @error('phone_number')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                 </div>
               </div>
              <div class="col-md-12">
                 <div class="form-group">
                   <label> Subject </label>
                   <input type="text" class="form-control @error('subject') is-invalid @enderror" placeholder="Subject" name="subject">
                   @error('subject')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                 </div>
               </div>
              <div class="col-md-12">
                <div class="form-group">
                   <label> Message </label>
                   <textarea class="form-control textarea @error('message') is-invalid @enderror" placeholder="Message" name="message"></textarea>
                   @error('message')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                 </div>
               </div>
             </div>
             <div class="row">
              <div class="update ml-auto mr-auto">
                 <button type="submit" class="btn btn-primary btn-round">Send</button>
               </div>
             </div>
           </form>
         </div>
       </div>
     </div>
   </div>
</div>

</div>
<footer class="mt-5 p-5">
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<div class="col-sm-6 my-4"><h2 class="pb-3">LEGAL</h2><p><a href="terms">Terms & Conditions</a></p><p><a href="privacy">Privacy Notice</a></p><p><a href="#">Imprint</a></p></div>
					<div class="col-sm-6 my-4"><h2 class="pb-3">ABOUT US</h2><p><a href="contact-us">Contact us</a></p><p><a href="#">Company</a></p></div>
				</div>
			</div>
			<div class="col-md-4 my-4">
				<a class="px-2 py-4 d-inline-block" href="/"><img src="https://mmea.info/logos.png" style="width: 160px" title="Lisheapp Logo"></a>
				<div class="social"><a href="#" class="sm facebook" title="Facebook" rel="noopener">Facebook</a><a href="#" class="sm twitter" title="Twitter" rel="noopener">Twitter</a><a href="#" class="sm instagram" title="Instagram" rel="noopener">Instagram</a><a href="#" class="sm youtube" title="Youtube" rel="noopener">Youtube</a></div>
			</div>
		</div>
	</footer>
	<!-- Scripts -->
	<script src="https://cdn.jsdelivr.net/combine/npm/jquery@3,npm/bootstrap@4"></script>
	@yield('aimeos_scripts')
	</body>
</html>