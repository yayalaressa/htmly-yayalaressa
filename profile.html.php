<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<header class="card page-header"><h2 class="card-body"><?php echo $name ?></h2><span class="taxonomy-description"><?php echo $about ?></span></header>
<h2 class="mb-4">Posts by this author</h2>
<ul class="list-unstyled">
<!-- Main Posts -->
<?php foreach ($posts as $p): ?>
    <li class="media mb-4">
        <div class="media-body">
            <div class="card">
                <div class="card-body">
                    <a href="<?php echo $p->categoryUrl; ?>" class="badge badge-secondary category"><?php echo str_replace('-', ' ', $p->ct); ?></a>
                    <?php if (!empty($p->link)): ?>
                    	<h2 class="mt-1 mb-1"><a href="<?php echo $p->link;?>" target="_blank" rel="bookmark"><?php echo $p->title;?> <i class="fa fa-external-link"></i></a></h2>
                    <?php else: ?>
                        <h2 class="mt-1 mb-1"><a href="<?php echo $p->url;?>" rel="bookmark"><?php echo $p->title;?></a></h2>
                    <?php endif; ?>
                    <small class="text-muted mb-2"><time><?php echo format_date($p->date) ?></time></small>
                    <div class="card-text mt-auto">
                        <?php echo get_teaser($p->body, $p->url); ?>
                    </div>
                </div>
            </div>
        </div>
    </li>
<?php endforeach; ?>
</ul>

<?php if (!empty($pagination['prev']) || !empty($pagination['next'])): ?>
<!-- Pagination -->
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php if (!empty($pagination['prev'])): ?>
        <li class="page-item">
            <a class="page-link" href="?page=<?php echo $page - 1 ?>">← Next</a>
        </li>
        <?php endif; ?>
        <li class="page-item disabled">
        	<a class="page-link" href="#" aria-disabled="true"><?php echo $pagination['pagenum'];?></a>
        </li>
        <?php if (!empty($pagination['next'])): ?>
        <li class="page-item">
            <a class="page-link" href="?page=<?php echo $page + 1 ?>">Previous →</a>
        </li>
        <?php endif; ?>
    </ul>
</nav>
<?php endif; ?>
