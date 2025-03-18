<?php
/**
 * The Template for displaying the 404 error page
 *
 * Author: Eagle Themes
 * Version: 1.0.0
 */

get_header();

get_template_part('templates/elements/page-header');

?>

<main class="error-404-page">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="error-num"><?php echo __('404', 'himara') ?><span class="text-uppercase"><?php echo __('Error', 'himara') ?></span></div>
            </div>
            <div class="col-md-7">
                <div class="error-mssg">
                    <h1 class="404-title"><?php echo __('Page Not Found!', 'himara') ?></h1>
                    <p class="mt20"><?php echo __("We're sorry, but we can't find the page you were looking for. It's probably some thing we've done wrong but now we know about it and we'll try to fix it", "himara") ?></p>
                    <div class="mt40"><a href="<?php echo home_url( '/' ); ?>" class="btn btn-sm upper"><?php echo __('Home Page', 'himara') ?></a></div>
                    <div class="mt60">
                        <form class="search-form" action="<?php echo home_url( '/' ); ?>" method="get">
                            <div class="form-group">
                                <input type="text" name="s" class="form-control" placeholder="<?php echo __('Search', 'himara') ?>">
                                <button class="btn" type="submit"><i class="ion-ios-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php

get_footer();
