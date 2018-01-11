<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
?>
<div class="alert alert-info alert-dismissable <?= h($class) ?>">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<?= h($message) ?>
</div>
