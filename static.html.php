<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<?php if (login()): ?>
<div class="my-3">
	<ul class="nav nav-tabs">
  		<li class="nav-item">
    		<a class="nav-link active" href="<?php echo $p->url; ?>">View</a>
  		</li>
  		<li class="nav-item">
    		<a class="nav-link" href="<?php echo $p->url; ?>/edit?destination=post">Edit</a>
  		</li>
	</ul>
</div>
<?php endif; ?>
<h2 class="mt-0 mb-3 text-center"><?php echo $p->title ?></h2>
<div class="card-text mt-auto">
    <?php echo $p->body; ?>
</div>