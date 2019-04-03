<?php use Cake\Core\Configure; ?>
<div class="content-box-large">
	<div class="panel-heading">
		<div class="panel-title"><?= $auth->user('name') ?><br />生徒一覧</div>
		<div class="panel-options">
			<a href="<?= $this->Url->build(['controller' => 'students', 'action' => 'add'], true); ?>" class="btn btn-primary btn">生徒を追加する</a>
		</div>
	</div>

	<div class="panel-body">

		<div class="row">
			<div class="col-xs-6">
				<div class="dataTables_info" id="example_info">
					<?= $this->Paginator->counter([
								'format' => __('{{start}}〜{{end}}件目 / 全{{count}}件')
						]);
					?>
				</div>
			</div>
		</div>

		<div class="table-responsive">
			<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered">
				<thead>
					<tr style="background-color:#E8F3FF;">
						<th>ID</th>
						<th>表示順</th>
						<th>有効/無効</th>
						<th>ユーザー名</th>
						<th>音声タイプ</th>
						<th>生年月日</th>
						<th>ログインID</th>
						<th>パスワード</th>
						<th>塾</th>
						<th>クラス</th>
						<th>電話番号</th>
						<th>郵便番号</th>
						<th>住所</th>
						<th>メモ</th>
						<th>ホスト</th>
						<th>登録日時</th>
						<th>更新日時</th>
						<th scope="col" class="actions">&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($students as $student): ?>
					<tr>
						<td><?= $this->Number->format($student->user->id) ?></td>
						<td><?= $this->Number->format($student->user->disp_no) ?></td>
						<td><?= Configure::read('is_valid')[$this->Number->format($student->user->is_valid)] ?></td>
						<td><?= h($student->user->name) ?></td>
						<td><?= Configure::read('voice_type')[$this->Number->format($student->user->voice_type)] ?></td>
						<td><?= h($student->user->birthday) ?></td>
						<td><?= h($student->user->login_id) ?></td>
						<td><?= h("********") ?></td>
						<td><?= $student->user->has('cram_school') ? $student->user->cram_school->name : '' ?></td>
						<td><?= $student->has('cram_school_class') ? $student->cram_school_class->name : '' ?></td>
						<td><?= h($student->user->tel) ?></td>
						<td><?= h($student->user->zip) ?></td>
						<td><?= h($student->user->address) ?></td>
						<td><?= h($student->user->memo) ?></td>
						<td><?= h($student->user->host) ?></td>
						<td><?= h($student->user->created) ?></td>
						<td><?= h($student->user->modified) ?></td>
						<td class="actions" style="vertical-align:middle;">
						<p>
							<?= $this->Html->link(__(' 編集'), ['action' => 'edit', $student->user->id], ['class' => "btn btn-primary btn-xs"]) ?>
						</p>
						<p>
							<?= $this->Form->postLink(__('無効'), ['action' => 'invalid', $student->user->id], ['confirm' => __('Are you sure you want to invalid # {0}?', $student->user->id), 'class' => "btn btn-danger btn-xs"]) ?>
						</p>
						<p>
							<?= $this->Form->postLink(__('パスワードリセット'), ['action' => 'resetPassword', $student->user->id], ['confirm' => __('Are you sure you want to reset password # {0}?', $student->user->id), 'class' => "btn btn-warning btn-xs"]) ?>
						</p>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>

			<div class="row text-center">
				<div class="dataTables_paginate paging_bootstrap">
					<ul class="pagination">
						<?php echo $this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')); ?>
						<?php echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1, 'ellipsis' => '<li class="disabled"><a>...</a></li>')); ?>
						<?php echo $this->Paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')); ?>
					</ul>
				</div>
			</div>

			<div id="dialog" style="display: none"></div>
		</div>
	</div>
</div>

<?= $this->Html->scriptStart(array('inline' => true)); ?>
<?= $this->Html->scriptEnd(); ?>
