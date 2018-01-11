<?php
/* @var $this \Cake\View\View */
$this->assign('title', 'CoCoMS: Work Breakdown Structure (WBS)');
?>

<!-- Top Logo -->
<?php
echo $this->Html->image('main.png', ['alt' => 'CoCoMS', 'class' => 'img-responsive center-block']);
?>
<h1 class="text-center">CoCoMS</h1>
<p class="text-center">
  Construction Correspondence Management System
</p>
<hr />

<div class="col-md-12">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">General Info</h3>
    </div>
    <div class="panel-body">
      <p>
        It is assumed that the construction project is organized in work packages (WP) following the Work Breakdown Structure (WBS) method.
      </p>
      <p>
        A WP is the smallest unit of a Work Breakdown Structure and consist of a group of related tasks within a project. The idea is to break down the project deliverables into smaller, more manageable chunks of work in order to be better scheduled, cost estimated, monitored and controlled. WP are typically grouped into work packages based on geographical area, engineering discipline, technology, or the time needed to accomplish them. You can visualize WP as mini-projects within the whole project.
      </p>
      <p>
        The WBS is a method for getting a complex, multi-step project done. It’s a way to divide and conquer large projects so you can get things done faster and more efficiently. WBS is a hierarchical tree structure that outlines your project and breaks it down into smaller, more manageable portions. Breaking the project down into work packages means work can be done simultaneously by different team members, leading to better team productivity and easier project management overall.
      </p>
    </div>
  </div>
</div>
<div class="col-md-12">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Letters and WBS</h3>
    </div>
    <div class="panel-body">
      <p>
        CoCoMS assumes that letters are issued in relation to WP. As such, the letters are named and organized accordingly. Please refer to <?= $this->Html->link('Letter Naming', ['controller' => 'Pages', 'action' => 'letternaming', 'plugin' => false]) ?> for details regarding the letter naming convention.</p>
      <p>
    </div>
  </div>
</div>
