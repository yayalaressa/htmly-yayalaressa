<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<!DOCTYPE html>
<html lang="<?php echo str_replace('_', '-', config('language'));?>">
<head>
    <?php echo head_contents();?>
    <?php if(facebook() && !empty(config('fb.admin'))): ?>
    <meta property="fb:app_id" content="<?php echo config('fb.appid'); ?>" />
    <meta property="fb:admins" content="<?php echo config('fb.admin'); ?>"/>
    <?php endif; ?>
    <meta name="description" content="<?php echo $description; ?>"/>
  	<script type='application/ld+json'>
    {
    "@context": "http://www.schema.org",
    "@type": "WebSite",
    "name": "<?php echo blog_title(); ?>",
    "alternateName": "<?php echo blog_title(); ?>",
    "url": "<?php echo site_url();?>"
    }
    </script>
    <link rel="canonical" href="<?php echo $canonical; ?>" />
    <?php if (publisher()): ?><link rel="publisher" href="<?php echo publisher(); ?>"/><?php endif; ?>
    <!-- Font Awesome CSS -->
    <link rel="preload" as="style" href="<?php echo site_url();?>themes/htmly-yayalaressa/css/font-awesome.min.css" onload="this.rel='stylesheet'"/>
    <link rel="preload" as="font" type="font/woff2" crossorigin href="<?php echo site_url();?>themes/htmly-yayalaressa/fonts/fontawesome-webfont.woff2?v=4.7.0"/>
    <!-- Bootstrap CSS -->
    <link rel="preload" as="style" href="<?php echo site_url();?>themes/htmly-yayalaressa/css/bootstrap.min.css" onload="this.rel='stylesheet'"/>
    <link rel="preload" as="style" href="<?php echo site_url();?>themes/htmly-yayalaressa/style.min.css" onload="this.rel='stylesheet'"/>
    <title><?php echo $title;?></title>
</head>
<?php     
    if (isset($_GET['search'])) {
        $search = _h($_GET['search']);
        $url = site_url() . 'search/' . remove_accent($search);
        header("Location: $url");
    }
?>
<body>
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=60e085c934c5920013742265&product=sop' async='async'></script>
<?php if(facebook()) { echo facebook(); } ?>
<?php if (login()) { toolbar(); } ?>
    <div class="container">
        <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="<?php echo site_url();?>">
                <img width="130px" src="<?php echo site_url();?>system/resources/images/logo-big.png" class="logo" alt="HTMLy">
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-top" aria-controls="navbar-top" aria-expanded="false" aria-label="Toggle navigation">
                <span class="menu">Menu</span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbar-top">
                <ul class="navbar-nav mr-auto">
                  	<li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url();?>">Home</a>
                    </li>
                    <?php $data = category_list(true); asort($data); ?>
                    <?php foreach ($data as $key => $category):?>
                    <?php if($category[0] !== 'uncategorized' && $category[0] !== 'sponsored'): ?>
                  	<li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url();?>category/<?php echo $category[0];?>"><?php echo $category[1];?></a>
                    </li>
                    <?php endif; ?>
                    <?php endforeach;?>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#searchForm"><i class="fa fa-search"></i> Search</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Content here -->
        <div class="row">
            <div class="col-lg-8 pt-4">
                <?php echo content();?> 
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4 pt-4">
                <div class="sidebar">
                    <div class="card mb-4 bg-light border-0">
                        <div class="card-body popular-tag">
                            <h2 class="card-title border-bottom py-2"><?php echo i18n("Popular_tags");?></h2>
                            <?php $i = 1; $tags = tag_cloud(true); arsort($tags); ?>
                            <ul>
                            <?php foreach ($tags as $tag => $count):?>
                        	<?php if($tag == 'sponsored' || $tag == 'backlink') $i = $i - 1; // jika ketemu dengan tag tdk diijinkan maka $i dikurangi 1 ?>
                            <?php if($tag !== 'sponsored' && $tag !== 'backlink'): // filter dulu ?>
                            <li><a href="<?php echo site_url();?>tag/<?php echo $tag;?>"><?php echo tag_i18n($tag);?></a></li>
                            <?php endif; ?>
                            <?php if ($i++ >= 5) break;?>
                            <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Footer -->
        <div class="footer bg-light py-4 mt-4">
            <?php echo menu('justify-content-center'); ?>
            <div class="py-2 text-center">
                <small class="text-muted"><?php echo copyright(); ?> Design by. <a href="https://yaya.my.id/">Yaya Laressa</a></small>
            </div>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal modal-search fade" id="searchForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <a href="#" class="close-search" data-dismiss="modal" aria-label="Close"></a>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-search">
                <div class="modal-body">
                    <form method="GET">
                        <div class="input-group mb-3 search">
                            <input type="text" class="form-control form-control-lg" name="search" placeholder="Search..." aria-label="search" aria-describedby="basic-addon2" autocomplete="off">
                            <div class="input-group-append search-button">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <small class="form-text text-muted">Type to search or hit ESC to close</small>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
<div class="back-to-top">
 <a href="#" id="back-to-top" title="back to top">
  <i class="fa fa-arrow-up"></i>
 </a>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo site_url();?>themes/htmly-yayalaressa/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo site_url();?>themes/htmly-yayalaressa/js/bootstrap.min.js"></script>
    <script src="<?php echo site_url();?>themes/htmly-yayalaressa/js/custom.min.js"></script>
    <?php if (analytics()): ?><?php echo analytics() ?><?php endif; ?>
</body>

</html>