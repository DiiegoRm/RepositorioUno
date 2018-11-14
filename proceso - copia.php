<!DOCTYPE HTML>
<!--
	Identity by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Menu</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<style>
			.with-nav-tabs.panel-primary .nav-tabs > li > a,
			.with-nav-tabs.panel-primary .nav-tabs > li > a:hover,
			.with-nav-tabs.panel-primary .nav-tabs > li > a:focus {
					color: #fff;
			}
			.with-nav-tabs.panel-primary .nav-tabs > .open > a,
			.with-nav-tabs.panel-primary .nav-tabs > .open > a:hover,
			.with-nav-tabs.panel-primary .nav-tabs > .open > a:focus,
			.with-nav-tabs.panel-primary .nav-tabs > li > a:hover,
			.with-nav-tabs.panel-primhttps://s.bootsnipp.com/iframe/MaA0A#tab2primaryary .nav-tabs > li > a:focus {
				color: #fff;
				background-color: #3071a9;
				border-color: transparent;
			}
			.with-nav-tabs.panel-primary .nav-tabs > li.active > a,
			.with-nav-tabs.panel-primary .nav-tabs > li.active > a:hover,
			.with-nav-tabs.panel-primary .nav-tabs > li.active > a:focus {
				color: #428bca;
				background-color: #fff;
				border-color: #428bca;
				border-bottom-color: transparent;
			}
			.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu {
					background-color: #428bca;
					border-color: #3071a9;
			}
			.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a {
					color: #fff;   
			}
			.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
			.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
					background-color: #3071a9;
			}
			.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a,
			.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
			.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
					background-color: #4a9fe9;
			}
		</style>
	</head>
	<body>
		<?php
			session_start();
			switch ($_SESSION["perfil"]) {
				case 1:
						?>
							<div class="container">
								<div class="page-header">
										<h1>Panels with nav tabs.<span class="pull-right label label-default">:)</span></h1>
								</div>
								<div class="row">
									<div class="panel with-nav-tabs panel-primary">
											<div class="panel-heading">
															<ul class="nav nav-tabs">
																	<li class="active"><a href="#tab1primary" data-toggle="tab">Primary 1</a></li>
																	<li><a href="#tab2primary" data-toggle="tab">Primary 2</a></li>
																	<li><a href="#tab3primary" data-toggle="tab">Primary 3</a></li>
																	<li class="dropdown">
																			<a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
																			<ul class="dropdown-menu" role="menu">
																					<li><a href="#tab4primary" data-toggle="tab">Primary 4</a></li>
																					<li><a href="#tab5primary" data-toggle="tab">Primary 5</a></li>
																			</ul>
																	</li>
															</ul>
											</div>
											<div class="panel-body">
													<div class="tab-content">
															<div class="tab-pane fade in active" id="tab1primary">Primary 1</div>
															<div class="tab-pane fade" id="tab2primary">Primary 2</div>
															<div class="tab-pane fade" id="tab3primary">Primary 3</div>
															<div class="tab-pane fade" id="tab4primary">Primary 4</div>
															<div class="tab-pane fade" id="tab5primary">Primary 5</div>
													</div>
											</div>
									</div>
								</div>
							</div>
						<?php
						break;
				case 2:
						echo "udted es estudiante";
						break;
				case 3:
						echo "ud es acudkiente";
						break;
				case 3:
						echo "ud es adminitrativo";
						break;
		}
		?>
	</body>
</html>

