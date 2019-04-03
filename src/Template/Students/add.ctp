<?php use Cake\Core\Configure; ?>
<div class="content-box-large">
	<div class="panel-heading">
		<div class="panel-title"><?= h($auth->user('name')) ?><br />生徒 追加</div>
	</div>
	<div class="panel-body">
		<div id="rootwizard">
			<?= $this->Form->create($student, ['class' => 'form-horizontal', 'novalidate']) ?>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">クラス<span class="required">*</span></label>
					<div class="col-sm-3">
						<?php echo $this->Form->input('students.0.cram_school_class_id', ['label' => false, 'type' => 'select', 'required' => false, 'class' => 'form-control', 'empty' => '選択してください', 'value' => h($auth->user('id')), 'disabled' => 'disabled']); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">表示順<span class="required">*</span></label>
					<div class="col-sm-2">
						<?php echo $this->Form->input('disp_no', ['type' => 'text', 'label' => false, 'required' => false, 'class' => 'form-control']); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">有効/無効<span class="required">*</span></label>
					<div class="col-sm-2">
						<?php echo $this->Form->input('is_valid', ['label' => false, 'type' => 'select', 'required' => false, 'class' => 'form-control', 'options' => Configure::read('is_valid'), 'default' => '1']); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">ユーザー名<span class="required">*</span></label>
					<div class="col-sm-6">
						<?php echo $this->Form->input('name', ['type' => 'text', 'label' => false, 'required' => false, 'class' => 'form-control']); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">音声タイプ<span class="required">*</span></label>
					<div class="col-sm-2">
						<?php echo $this->Form->input('voice_type', ['label' => false, 'type' => 'select', 'required' => false, 'class' => 'form-control', 'options' => Configure::read('voice_type'), 'empty' => '選択してください']); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">生年月日<span class="required">*</span></label>
					<div class="col-sm-2" bfh-datepicker-toggle" data-toggle="bfh-datepicker">
						<?php echo $this->Form->input('birthday', ['type' => 'text', 'label' => false, 'required' => false, 'class' => 'form-control datepicker', 'div' => false]); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">ログインID<span class="required">*</span></label>
					<div class="col-sm-4">
						<?php echo $this->Form->input('login_id', ['type' => 'text', 'label' => false, 'required' => false, 'class' => 'form-control']); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">パスワード<span class="required">*</span></label>
					<div class="col-sm-4">
						<?php echo $this->Form->input('password', ['type' => 'password', 'label' => false, 'required' => false, 'class' => 'form-control', 'value' => '']); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">塾<span class="required">*</span></label>
					<div class="col-sm-3">
						<?php echo $this->Form->input('cram_school_id', ['label' => false, 'type' => 'select', 'empty' => '選択してください', 'required' => false, 'class' => 'form-control', 'value' => $auth->user('cram_school_id'), 'disabled' => 'disabled']); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">電話番号<span class="required">*</span></label>
					<div class="col-sm-3">
						<?php echo $this->Form->input('tel', ['type' => 'text', 'label' => false, 'required' => false, 'class' => 'form-control', 'templates' => ['inputContainer' => '<div class="form-group text">{{content}}<span style="font-size:10px;">※半角で、ハイフン（-）を付けずに入力してください</span></div>', 'inputContainerError' => '<div class="form-group text has-error">{{content}}<span style="font-size:10px;">※半角で、ハイフン（-）を付けずに入力してください</span>{{error}}</div>']]); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">郵便番号</label>
					<div class="col-sm-3">
						<?php echo $this->Form->input('zip', ['type' => 'text', 'label' => false, 'required' => false, 'div' => false, 'class' => 'form-control', 'templates' => ['inputContainer' => '<div class="form-group text">{{content}}<span style="font-size:10px;">※半角で、ハイフン（-）を付けずに入力してください</span></div>', 'inputContainerError' => '<div class="form-group text has-error">{{content}}<span style="font-size:10px;">※半角で、ハイフン（-）を付けずに入力してください</span>{{error}}</div>']]); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">住所</label>
					<div class="col-sm-8">
						<?php echo $this->Form->input('address', ['type' => 'text', 'label' => false, 'required' => false, 'class' => 'form-control']); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">メモ</label>
					<div class="col-sm-8">
						<?php echo $this->Form->input('memo', ['type' => 'textarea', 'label' => false, 'required' => false, 'class' => 'form-control']); ?>
					</div>
				</div>
<!--
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">PC名、IP</label>
					<div class="col-sm-6">
						<?php echo $this->Form->input('host', ['type' => 'text', 'label' => false, 'required' => false, 'class' => 'form-control']); ?>
					</div>
				</div>
-->

				<div class="form-actions">
					<div class="row text-center">
						<div class="col-md-12">
							<a href="<?= $this->Url->build(["controller" => "students", "action" => "index"], true); ?>" class="btn btn-default">戻る</a>
							<button class="btn btn-primary" type="submit" id="save-btn"><i class="fa fa-save"></i>登録</button>
						</div>
					</div>
				</div>

			<?= $this->Form->end() ?>
		</div>
	</div>
</div>

<!-- jquery-ui -->
<link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">
<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<!-- datepicker -->
<?= $this->Html->script('jquery.ui.datepicker-ja.js'); ?>

<?= $this->Html->scriptStart(['inline' => true]); ?>

<!-- datepicker -->
$(function () {
	$('.datepicker').datepicker({
		autoclose: true,
		format: 'yyyy-mm-dd',
		language: 'ja'
	});
});

<?= $this->Html->scriptEnd(); ?>
