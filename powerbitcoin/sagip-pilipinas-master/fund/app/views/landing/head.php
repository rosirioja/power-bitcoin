<style>
.signup-box{
	right:0px;
	position:absolute;
	padding:10px 20px 20px;
	background-color:#FFF;
	-webkit-box-shadow:0px 0px 6px 2px rgba(0,0,0,0.5);
	-moz-box-shadow:0px 0px 6px 2px rgba(0,0,0,0.5);
	box-shadow:0px 0px 6px 2px rgba(0,0,0,0.5);
	display:none
}
	.signup-box .signup-box-close{
		position:absolute;
		right:10px;top:5px
}
	.signup-box .signup-box-head{
		text-transform:uppercase;
		border-bottom:1px solid #d7d9cf;
		margin-bottom:15px;
		font-size:16px;
		padding-bottom:10px;
		margin-top:5px
}
	.signup-box input[type="text"]{
		margin-bottom:5px
}
	.signup-box .control-group{
		margin-bottom:5px
}
</style>


<header id="header">
	<div class="navbar navbar-fixed-top navbar-inverse">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-target=".nav-collapse" data-toggle="collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</a>
				<a href="#" class="brand">Sagip-Pilipinas.ph</a>
				<div class="nav-collapse subnav-collapse pull-right collapse" id="top-navigation">
					<ul class="nav">
						<li class="">
							<a class="home-nav nav-link" href="/" >Home</a>
						</li>
						<li class="">
							<a class="campaign-nav nav-link" href="/campaign"  >Campaigns</a>
						</li>
						<li class="">
							<a class="contributor-nav nav-link" href="/contributor"  >Contributors</a>
						</li>
						
						<li class="">
							<a class="about-nav nav-link" href="#" class="" >About Us</a>
						</li>
					</ul>
					<div class="top-account-control">
					<?php if(!$logstatus): ?>
						<a href="#" class="top-sign-up">Create Account</a>
						
						<a href="#" class="top-sign-in">Sign In</a>
				
						<div class="login-box">
							<a class="close login-box-close" href="http://soziev.com/theme_venera/index#">×</a>
							<h4 class="login-box-head">Login Form</h4>
							<form class="login-form">
							<div class="control-group">
								<label>Username or Email</label>
								<input class="span2" name="useremail" placeholder="Username or Email" type="text">
							</div>
							<div class="control-group">
								<label>Password</label>
								<input class="span2" name="password" placeholder="Password" type="password">
							</div>
							<div class="login-actions">
								<button class="btn btn-primary login-submit-btn">Log Me In</button>
							</div>
							</form>
						</div>
						<div class="signup-box">
							<a class="close signup-box-close" href="http://soziev.com/theme_venera/index#">×</a>
							<h4 class="signup-box-head">Signup Form</h4>
							<form class="signup-form">
							<div class="control-group">
								<label>Username</label>
								<input class="span2" name="username" placeholder="Username" type="text">
							</div>
							<div class="control-group">
								<label>Email</label>
								<input class="span2" name="email" placeholder="Email" type="email">
							</div>
							<div class="control-group">
								<label>Password</label>
								<input class="span2" name="password" placeholder="Password" type="password">
							</div>
							<div class="control-group">
								<label>Confirm Password</label>
								<input class="span2" placeholder="Confirm Password" type="password">
							</div>
							<div class="signup-actions">
								<button class="btn btn-primary signup-submit-btn">Sign Me Up</button>
							</div>
							</form>
						</div>
								<?php else : ?>
							<a href="#" class=" logout-btn" style=""> Log Out</a>
							<a href="#" class="top-sign-in username-link" style="margin-top:-5px;"><img src="<?php echo $profilepic; ?>" style="width:30px; height:30px;"> <span id="username-span" style="font-size:12px;"><?php echo $username;?></span></a>

						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>


<script type="text/javascript">
	jQuery(function($){
		$(".signup-submit-btn").click(function(e){
			e.preventDefault();
			//alert($('.signup-form').serialize());
			$.ajax({
				url     : "/save/signup",
				type    : "POST",
				data    : $('.signup-form').serialize(),
				success : function(data){
					location.reload();
				} 
			});

		});
		$(".login-submit-btn").click(function(e){
			e.preventDefault();
			//alert($('.login-form').serialize());
			$.ajax({
				url     : "/system/checkuser",
				type    : "GET",
				data    : $('.login-form').serialize(),
				success : function(data){
					if(data == "true"){
						location.href="/";
					}
				} 
			});
		});
		$(".logout-btn").click(function(){
			//alert('asd');
			alert('logout');
			location.href = '/flush';
		});
		$(".username-link").click(function(){
			$(".nav-link").each(function(){
				$(this).parent().removeClass('active');
			});
			location.href = '/'+$("#username-span").text();

		});
		

	});
		

		
	
</script>