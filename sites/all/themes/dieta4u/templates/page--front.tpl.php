<header id="navbar" role="banner" class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="topbarLeft col-xs-12 col-sm-6">
                      <?php if (!empty($page['top_bar_left'])): ?>
                        <?php print render($page['top_bar_left']); ?>
                      <?php endif; ?>
                    </div>
                    <div class="topbarRight col-xs-12 col-sm-6">
                      <?php if (!empty($page['top_bar_right'])): ?>
                        <?php print render($page['top_bar_right']); ?>
                      <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-nav">
            <div class="container">
                <div class="row-fluid">
                    <div class="col-md-3">
                      <?php if (!empty($logo)): ?>
                          <a class="logo pull-left" href="<?php print $front_page; ?>"
                             title="<?php print t('Home'); ?>">
                              <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>"/>
                          </a>
                      <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                      <?php if (!empty($page['menu'])): ?>
                        <?php print render($page['menu']); ?>
                      <?php endif; ?>
                    </div>
                    <div class="col-md-3">
                      <?php $block = module_invoke('search', 'block_view', 'search');
                      print render($block); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="main-container container">
    <div class="row no-gutter">
        <div class="col-xs-12 col-sm-12 col-md-8 no-padding">
            <div class="slideshow-wrapper">
                <div class="slider-container">
                    <div class="bg-image"></div>
<!--                    <div class="text-overlay">-->
<!--                        <h2 class="h1 mega-title slideshow__title mega-title--large">Arrivals</h2>-->
<!--                        <span class="mega-subtitle slideshow__subtitle mega-subtitle--large">-->
<!--						                      	Our Classic Tapered (CT) fit is now available-->
<!--						                    </span>-->
<!--                        <span class="mega-subtitle slideshow__button btn">-->
<!--						                      	Read more-->
<!--						                    </span>-->
<!--                    </div>-->
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 no-padding">
            <div class="aphome--bannesliderright effectTwo">
                <img class="img-reponsive" alt="Ap Jka"
                     src="//cdn.shopify.com/s/files/1/1528/0211/files/aphome3-bannerright1.jpg?v=1484752028">
            </div>
            <div class="aphome--bannesliderright effectTwo">
                <img class="img-reponsive" alt="Ap Jka"
                     src="//cdn.shopify.com/s/files/1/1528/0211/files/aphome3-bannerright2.jpg?v=1484752039">
            </div>
        </div>
    </div>

    <header role="banner" id="page-header">
      <?php if (!empty($site_slogan)): ?>
          <p class="lead"><?php print $site_slogan; ?></p>
      <?php endif; ?>

      <?php print render($page['header']); ?>
    </header> <!-- /#header -->

    <div class="row-fluid">

      <?php if (!empty($page['sidebar_first'])): ?>
          <aside class="span3" role="complementary">
            <?php print render($page['sidebar_first']); ?>
          </aside>  <!-- /#sidebar-first -->
      <?php endif; ?>

        <section class="<?php print _bootstrap_content_span($columns); ?>">
          <?php if (!empty($page['highlighted'])): ?>
              <div class="highlighted hero-unit"><?php print render($page['highlighted']); ?></div>
          <?php endif; ?>
          <?php if (!empty($breadcrumb)): print $breadcrumb; endif; ?>
            <a id="main-content"></a>
          <?php print render($title_prefix); ?>
          <?php if (!empty($title)): ?>
              <h1 class="page-header"><?php print $title; ?></h1>
          <?php endif; ?>
          <?php print render($title_suffix); ?>
          <?php print $messages; ?>
          <?php if (!empty($tabs)): ?>
            <?php print render($tabs); ?>
          <?php endif; ?>
          <?php if (!empty($page['help'])): ?>
              <div class="well"><?php print render($page['help']); ?></div>
          <?php endif; ?>
          <?php if (!empty($action_links)): ?>
              <ul class="action-links"><?php print render($action_links); ?></ul>
          <?php endif; ?>
          <?php echo views_embed_view('top_products_slider'); ?>
            <!--      --><?php //print render($page['content']); ?>
        </section>

      <?php if (!empty($page['sidebar_second'])): ?>
          <aside class="span3" role="complementary">
            <?php print render($page['sidebar_second']); ?>
          </aside>  <!-- /#sidebar-second -->
      <?php endif; ?>

    </div>
</div>
<footer class="footer container">
  <?php print render($page['footer']); ?>
</footer>
