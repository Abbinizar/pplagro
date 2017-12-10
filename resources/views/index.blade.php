<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>ternakin</title>
	<meta name="viewport" content="width=device-width, initial-scale=10">
	<link rel="stylesheet" href="css/style.css">
	<link href='logo.png' style="width: 32px;height: 32px;" rel='shortcut icon'>

</head>

<body>
	<header>
		<img src="img/logo-horizontal.png" style="width: 200px; height: 70px;">
	</header>
	
	<nav id="navigation-menu">
		<ul></li>
			
			<li><a href="{{url('login')}}">Masuk</a></li>
		</ul>
	</nav>
	
	<div id="content">
		<section id="section-1">	
		<div class="cpntent">	
				<img src="img/diskusi.png" style="	width: 70%;
				height: 50%px; margin-left: 16%; margin-top: 100px;">
			</div>

			<div id= "kotaku">
				<a href="{{url('register')}}">DAFTAR SEKARANG</a>
			</div>

		
		<footer>Copyright &copy; UNEJ 2017 | PPL AGRO 9C</footer>
	</div>
	

	
	<!-- Google CDN jQuery -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	
	<!-- Page Scroll plugin -->
	<script src="jquery.PageScroll2id.js"></script>
	
	<script>
		(function($){
			$(window).load(function(){
				$("#navigation-menu a,a[href='#top'],a[rel='m_PageScroll2id']").mPageScroll2id({
					highlightSelector:"#navigation-menu a"
				});

				$("a[rel='next']").click(function(e){
					e.preventDefault();
					var to=$(this).parent().parent("section").next().attr("id");
					$.mPageScroll2id("scrollTo",to);
				});				
			});
		})(jQuery);
	</script>
</body>
</html>
