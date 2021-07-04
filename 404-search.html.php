<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<h1 class="not-found-title text-center">Search result not found!</h1>
<div class="card-text text-center mx-auto">
    <h2 class="mb-5 not-found-subtitle text-muted">Please search again, or would you like to try our <a href="<?php echo site_url(); ?>">homepage</a> instead?</h2>
    <form method="GET">
        <div class="input-group">
            <input type="text" class="form-control form-control-lg" name="search" placeholder="Search..." aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <input class="btn btn-lg btn-outline-primary" type="submit" value="Search">
            </div>
        </div>
    </form>
</div>