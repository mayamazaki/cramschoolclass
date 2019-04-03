<!DOCTYPE html>
<html>
	<head>
		<title>先生様向けシステム</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- CSS -->
		<?= $this->Html->css('bootstrap/bootstrap.min.css'); ?>
		<?= $this->Html->css('bootstrap_admin_theme/styles.css'); ?>

		<!-- Javascript -->
		<?= $this->Html->script('jquery/jquery-3.3.1.min'); ?>
		<?= $this->Html->script('bootstrap/bootstrap'); ?>

	</head>
	<body>
		<div class="header">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-5">
						<!-- Logo -->
						<div class="logo">
							<h1><a href="#">先生様向けシステム</a></h1>
						</div>
					</div>
					<div class="col-md-5">&nbsp;</div>
					<div class="col-md-2" style="height: 50px !important;">
						<div class="navbar navbar-inverse" role="banner">
							<nav class='navbar navbar-default navbar-static-top'>
								<ul class="nav navbar-nav" style="width:100%">
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">
											<i class="glyphicon glyphicon-user"></i><?= $auth->user('name') . "様" ?> <b class="caret"></b>
										</a>
										<ul class="dropdown-menu animated fadeInUp">
											<li><a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'logout'], true) ?>">ログアウト</a></li>
										</ul>
									</li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- global navigation -->
		<?= $this->element('global_navi'); ?>

		<div class="page-content">
			<div class="row">
				<!-- flash -->
				<?= $this->Flash->render(); ?>
				<!-- content -->
				<?= $this->fetch('content'); ?>
			</div>
		</div>

		<footer>
			<div class="container">
				<div class="copy text-center">
					Copyright 2018 PRONTEST Inc.
				</div>
			</div>
		</footer>

	</body>
</html>
