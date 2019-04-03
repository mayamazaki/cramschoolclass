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

	<body class="login-bg">

		<div class="header">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12">
						<!-- Logo -->
						<div class="logo">
							<h1><a href="#">先生様向けシステム</a></h1>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?= $this->Flash->render(); ?>

		<form action="login" method="post" accept-charset="utf8">

			<div class="page-content container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<div class="login-wrapper">
							<div class="box">
								<div class="content-wrap">
									<h6>Sign In</h6>
									<?= $this->Form->control('login_id', ['type' => 'text', 'class' => 'formtext', 'label' => false]) ?>
									<?= $this->Form->control('password', ['type' => 'password', 'class' => 'formtext', 'label' => false]) ?>
									<div class="action">
										<input class="btn btn-primary signup" type="submit" value="Login">
									</div>

								</div>
							</div>

						</div>
					</div>
				</div>
			</div>

		</form>

	</body>
</html>
