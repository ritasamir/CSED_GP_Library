<!DOCTYPE html>

<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : Recreation  
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20130121

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>{{ $post->title }}</title>
<link href="http://fonts.googleapis.com/css?family=Arvo|Open+Sans:400,300,700" rel="stylesheet" type="text/css" />
<link href="/css/style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="menu-wrapper">
	<div id="menu">
		<ul>
			<li class="current_page_item"><a href="#">Homepage</a></li>
			<li><a href="#">Blog</a></li>
			<li><a href="#">Photos</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Links</a></li>
			<li><a href="#">Contact</a></li>
		</ul>
	</div>
	<!-- end #menu -->
</div>


<div id="wrapper">
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content" style="float:right;">
					@yield('content')
					<div style="clear: both;">&nbsp;</div>
				</div>

				<!-- end #content -->
				<div id="sidebar" style="float:left;">
					<ul>    
						<li>
                           <img src="/images/posts/{{$post->avatar}}" style="width:260px; height:200px;padding-left:9px;">
						   <div style="clear: both;">&nbsp;</div>
						</li>
						<li>
							<h1 style="padding:5px;">Supervisors</h1>
							<ul>
                              @foreach($post->citations as $citation)
                                @if($citation->user->isTS == 1)
                                <li>
                                        <img src="/images/avatars/{{$citation->user->avatar}}" style="width:30px; height:30px; float:left; border-radius:50%;align:middle;  ">
                                        <a href="#" style="font-size: 15px;padding-left:5px;"><strong> {{$citation->user->first_name}} {{$citation->user->last_name}}</strong> </a>
                                </li>
                                @endif
                              @endforeach
                            </ul>
						</li>
						<li>
							<h1>Collabrators</h1>
							<ul>
                              @foreach($post->citations as $citation)
                              @if($citation->user->isTS == 0)
                              <li>     
                                  <img src="/images/avatars/{{$citation->user->avatar}}" style="width:30px; height:30px; float:left; border-radius:50%;align:middle;"> 
                                  <a href="#" style="font-size: 15px;padding-left:5px;"><strong> {{$citation->user->first_name}} {{$citation->user->last_name}}</strong> </a>
                             </li>

                              @endif
                              @endforeach
                            </ul>
						</li>
					</ul>
				</div>
				<!-- end #sidebar -->
				<div style="clear: both;">&nbsp;</div>
			</div>
		</div>
	</div>
	<!-- end #page -->
</div>
<div id="footer">
	<p>&copy; Untitled. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
<!-- end #footer -->
</body>
</html>