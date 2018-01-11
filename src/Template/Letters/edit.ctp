<?php
/* @var $this \Cake\View\View */
use Cake\Routing\Router;
use Cake\View\Helper\UrlHelper;
?>

<h1 class="page-header">Edit Letter: <?= h($letter->docref); ?></h1>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Please fill the form to edit the letter</h3>
  </div>
  <div class="panel-body">
    <div class="letters form">
      <div class="col-md-6">
        <?php
        echo $this->Form->create($letter, ['type' => 'file']);
        echo $this->Form->input('subject');
        echo $this->Form->input('filelink', ['type' => 'file', 'label' => 'Data File']);
        echo "<div>Current File: ".$this->Html->link($letter->filelink, DS. $letter->file_dir . $letter->filelink)."<br /><br /></div>";
        echo $this->Form->input('file_dir', ['type' => 'hidden']);
        echo $this->Form->input('sender_id', ['options' => $senders]);
        echo $this->Form->input('recipient_id', ['options' => $recipients]);
        echo $this->Form->input('work_package_id', ['options' => $workPackages]);
        ?>
      </div>
      <div class="col-md-6">
        <?php
        echo $this->Form->input('docref', ['label' => 'Letter Ref. No. (Docref)']);
        echo $this->Form->input('docdate', ['label' => 'Letter Date', 'type' => 'text', 'class' => 'datepicker form-control', 'empty' => true]);
        echo $this->Form->input('contents');
        echo $this->Form->input('tags', ['label' => 'References', 'placeholder' => 'Letter Reference', 'data-role' => 'tagsinput']);
        echo $this->Form->input('confidential');
        echo $this->Form->input('replyreq', ['label' => 'Reply Required']);
        ?>
      </div>
      <div class="col-md-12 text-center">
        <div class="form-group">
          <?= $this->Form->button(__('Edit Letter'), ['class' => 'btn btn-default']) ?>
        </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</div>
<script>
var letters = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  prefetch: {
    cache : false,
    url: '<?php echo Router::url(array('controller' => 'Letters', 'action' => 'getall')); ?>',
    //url: '/cocos/letters.json',
    filter: function(list) {
      return $.map(list, function(docref) {
        return { name: docref }; });
    }
  }
});

letters.initialize();

$('#tags').tagsinput({
  typeaheadjs: {
    name: 'docrefs',
    displayKey: 'name',
    valueKey: 'name',
    source: letters.ttAdapter()
  }
});
</script>
