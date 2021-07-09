<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>">Home</a></li>
        <li class="breadcrumb-item"><?php echo $p->category; ?></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $p->title; ?></li>
    </ol>
</nav>
<?php if (login()): ?>
<!-- Tab Menu -->
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
<!-- Featured Post -->
<?php if (!empty($p->image)):?>
<div class="featured-post">
    <img style="width:100%;" title="<?php echo $p->title; ?>" alt="<?php echo $p->title; ?>" class="attachment-post-thumbnail wp-post-image" src="<?php echo $p->image; ?>">
</div>
<?php endif; ?>
<?php if (!empty($p->audio)):?>
<div class="featured-post">
    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=<?php echo $p->audio;?>&amp;auto_play=false&amp;visual=true"></iframe>
    </div>
</div>
<?php endif; ?>
<?php if (!empty($p->video)):?>
<div class="featured-post">
    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo get_video_id($p->video); ?>" frameborder="0" allowfullscreen></iframe>
    </div>
</div>
<?php endif; ?>
<?php if (!empty($p->quote)):?>
<div class="featured-post">
    <blockquote class="blockquote"><?php echo $p->quote ?></blockquote>
</div>
<?php endif; ?>
<!-- Post Area -->
<a href="<?php echo $p->categoryUrl; ?>" class="badge badge-secondary category"><?php echo str_replace('-', ' ', $p->ct); ?></a>
<h2 class="mt-1 mb-2"><?php echo $p->title; ?></h2>
<div class="mb-2">
    <small class="text-muted"><time><?php echo format_date($p->date) ?></time></small>
</div>
<div class="share-this mb-3">
	<!-- ShareThis BEGIN -->
		<div class="sharethis-inline-share-buttons"></div>
	<!-- ShareThis END -->
</div>
<div class="card-text mt-auto">
    <?php echo $p->body; ?>
  	<?php if(!empty($p->tag)): ?>
  		<div class="tag">
          <?php echo $p->tag; ?>
  		</div>
  	<?php endif; ?>
</div>

<?php if(facebook() || disqus()): ?>
<!-- Comment Area -->
<?php if(facebook()): ?>
<div id="fb-root"></div>
<script type="text/javascript">
var facebook_appid = '<?php echo config('fb.appid'); ?>';
var language = '<?php echo config('language'); ?>';
function facebook() {
  (function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/" + language + "/all.js#xfbml=1&appId=" + facebook_appid;
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
  
  document.getElementById("facebook_thread").style.visibility = "hidden";
}
</script>
<style>.fb-comments, .fb_iframe_widget span, .fb-comments iframe {width: 100%!important;}</style>
<?php endif; ?>
<?php if(disqus()): ?>
<script type="text/javascript">
var disqus_shortname = '<?php echo config('disqus.shortname'); ?>';
var disqus_title = '<?php echo $p->title; ?>';
var disqus_url = '<?php echo $p->url; ?>';
var disqus_loaded = false;
function disqus() {
  if (!disqus_loaded)  {
    disqus_loaded = true;
    var e = document.createElement("script");
    e.type = "text/javascript";
    e.async = true;
    e.src = "//" + disqus_shortname + ".disqus.com/embed.js";
    (document.getElementsByTagName("head")[0] ||
     document.getElementsByTagName("body")[0])
    .appendChild(e);
  }
};
</script>
<?php endif; ?>
<div class="comments-area my-2" id="comments">
  <?php if(facebook()): ?>
  <div id="facebook_thread" class="text-center"><a id="load_comments" class="card-link" href="#" onclick="facebook();return false;">Load comments &rarr;</a></div>
  <div class="fb-comments" data-lazy="true" data-href="<?php echo $p->url; ?>" data-numposts="<?php echo config('fb.num'); ?>" data-colorscheme="<?php echo config('fb.color'); ?>" data-width="100%"></div>
  <?php endif; ?>
  <?php if (disqus()): ?>
	<div id="disqus_thread" class="text-center"><a id="load_comments" class="card-link" href="#" onclick="disqus();return false;">Load comments &rarr;</a></div>
  <?php endif; ?>
</div>
<?php endif; ?>