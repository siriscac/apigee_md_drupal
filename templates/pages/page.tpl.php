<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in the ../system directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * CUSTOMIZATIONS:
 * - $myappslink: provides a link for the users my apps page (with glyphicon)
 * - $profilelink: provides a link for the user profile page (with glyphicon)
 * - $logoutlink: provides a link for the user to log out (with glyphicon)
 * - $company_switcher: Provides the dropdown to switch companies if
 *   apigee_company module is enabled.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
global $user;
$user_details = user_load($user->uid);
$can_register = (variable_get('user_register', USER_REGISTER_VISITORS_ADMINISTRATIVE_APPROVAL) != USER_REGISTER_ADMINISTRATORS_ONLY);
?>
<header id="navbar" role="banner" class="<?php print $navbar_classes; ?>">
  <div class="container">
    <div class="navbar-header">
      <?php if ($logo): ?>
        <a class="logo navbar-btn pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
          <img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" />
        </a>
      <?php endif; ?>

      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

      <div class="navbar-collapse collapse">
        <nav role="navigation">
          <?php if (!empty($primary_nav)): print render($primary_nav); endif; ?>
          <ul class="menu nav navbar-nav pull-right account-menu">
            <?php if (user_is_anonymous()): ?>
              <?php if ($can_register): ?><li class="<?php echo (($current_path == 'user/register') ? 'active' : ''); ?>"><?php echo l(t('Register'), 'user/register'); ?></li><?php endif; ?>
              <li class="<?php echo (($current_path == 'user/login') ? 'active' : ''); ?>"><?php echo l(t('Login'), 'user/login'); ?></li>
            <?php else: ?>
              <li class="first expanded dropdown">

                <a data-toggle="dropdown" class="dropdown-toggle" data-target="#" title="" href="/user">
                  <div class="avatar-container">
                    <?php print $user->name[0]; ?>
                  </div>
                  <?php print $user->name; ?> <span class="caret"></span>
                </a>
                <ul class="dropdown-menu"><?php print $dropdown_links; ?></ul>
              </li>
            <?php endif; ?>
          </ul>
          <?php if (!empty($page['navigation'])): print render($page['navigation']); endif; ?>
        </nav>
      </div>
  </div>
</header>

<!-- Breadcrumbs -->
<!-- <?php if ($breadcrumb): ?>
<div class="container" id="breadcrumb-navbar">
  <div class="row">
    <br/>
    <div class="col-md-12">
      <?php print $breadcrumb;?>
    </div>
  </div>
</div>
<?php endif; ?> -->

<div class="master-container">
  <?php if (drupal_is_front_page()): ?>
    <section class="page-header">
      <header class="hero-area" id="home">

        <div class="container">
          <div class="contents text-right">
            <h1 class="wow fadeInRight white-title-hd" data-wow-duration="1000ms" data-wow-delay="300ms">Beautifully designed Banking APIs to accelerate your business</h1>
            <p class="wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="400ms">Partner with us, get started by exploring our APIs</p>
            <a href="/apis" class="btn btn-lg btn-primary wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms">Explore APIs</a>
            <a href="/blog" class="btn btn-lg btn-border wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">Learn More</a>
          </div>
        </header>
    </section>
  <?php else: ?>
    <section id="why" class="page-header">
      <!-- Search -->
      <?php if (!empty($search_form) || !empty($company_switcher)): ?>
        <div class="search-container">
          <div class="container">
            <div class="row">
              <?php if (!empty($company_switcher)):?>
                <div class="col-xs-6">
                  <div class="apigee-company-switcher-container"><?php print $company_switcher; ?></div>
                </div>
              <?php endif;?>
              <?php if (!empty($search_form)): ?>
                <div class="col-xs-6 pull-right">
                  <?php print render($search_form);?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <div class="container">

        <div class="section row">
          <div class="col-md-12">
            <!-- Title Prefix -->
            <?php print render($title_prefix); ?>
            <!-- Title -->
            <h1 class="white-hd"><?php print render($title); ?></h1>
            <!-- SubTitle -->
            <?php if (!empty($subtitle)): ?>
              <br/>
              <p class="subtitle">
                <span class="text-muted">
                  <span class="glyphicon glyphicon-info-sign"></span>
                  <?php print render($subtitle); ?>
                </span>
              </p>
            <?php endif; ?>
            <!-- Title Suffix -->
            <?php print render($title_suffix); ?>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <div class="page-content">
    <div class="main-container">

      <header role="banner" id="page-header">
        <?php print render($page['header']); ?>
      </header> <!-- /#page-header -->

      <?php if (drupal_is_front_page()): ?>
        <section id="counter" class="section">
          <div class="container">
            <div class="row">
              <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
                <div class="counter-item">
                  <div class="icon">
                    <i class="mdi-action-settings-input-composite"></i>
                  </div>
                  <h3 class="timer">450</h3>
                  <hr>
                  <h5>
                    APIs
                  </h5>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">
                <div class="counter-item">
                  <div class="icon">
                    <i class="mdi-action-face-unlock"></i>
                  </div>
                  <h3 class="timer">6523</h3>
                  <hr>
                  <h5>
                    Registered Developers
                  </h5>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="700ms">
                <div class="counter-item">
                  <div class="icon">
                    <i class="mdi-hardware-phonelink"></i>
                  </div>
                  <h3 class="timer">614</h3>
                  <hr>
                  <h5>
                    Apps Built
                  </h5>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="900ms">
                <div class="counter-item">
                  <div class="icon">
                    <i class="mdi-action-trending-up"></i>
                  </div>
                  <h3 class="timer">20382</h3>
                  <hr>
                  <h5>
                    Average Transactions Per Day
                  </h5>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section id="other-features" class="section">
          <div class="container">
            <div class="section-header">
              <h1 class="section-title wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms">Curated API Program</h1>
              <p class="section-subtitle wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="400ms">Purpose built APIs to serve your needs</p>
            </div>
            <div class="row">
              <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms">
                <div class="features-content">
                  <div class="icon">
                    <i class="mdi-action-lock-outline"></i>
                  </div>
                  <h3>Security</h3>
                  <p>APIs secured with industry standard security, build your app with confidence</p>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="800ms">
                <div class="features-content">
                  <div class="icon">
                    <i class="mdi-file-cloud-queue"></i>
                  </div>
                  <h3>Cloud</h3>
                  <p>REST APIs built for cloud scale, automatically monitored SLAs for mission critical APIs</p>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="1000ms">
                <div class="features-content">
                  <div class="icon">
                    <i class="mdi-action-assessment"></i>
                  </div>
                  <h3>Analtyics</h3>
                  <p>Track your app usage and other API metrics for your app easily</p>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="1200ms">
                <div class="features-content">
                  <div class="icon">
                    <i class="mdi-action-grade"></i>
                  </div>
                  <h3>Performance</h3>
                  <p>Track app Performance metrics and bottlenecks from Analytics Dashboard</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="1400ms">
                <div class="features-content">
                  <div class="icon">
                    <i class="mdi-action-group-work"></i>
                  </div>
                  <h3>Community</h3>
                  <p>Connect with the community of developers, exchange ideas & build great experiences</p>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="1800ms">
                <div class="features-content">
                  <div class="icon">
                    <i class="mdi-action-settings-power"></i>
                  </div>
                  <h3>Easy</h3>
                  <p>Easy to use, intutive self service documentation gets you from 0 to 80% in no time</p>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section id="main-features" class="section">
          <div class="container">


            <div class="row">
              <div class="col-md-4 col-sm-4 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
                <img src="https://i.imgur.com/QFAPkJF.png" class="img-responsive" alt="">
              </div>

              <div class="col-md-8 col-sm-8 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms">
                <div class="feature-item">
                  <h3 class="title-small">
                    Interactive Documentation with SDKs
                  </h3>
                  <p>
                    The portal provides you with a self service interactive documentation that lets you test APIs with sample requests, you can also change the parameter values to understannd the API better. There are pre-built SDKs available for each API so that you can get a headstart.
                  </p>
                </div>
              </div>

            </div>

          </div>
        </section>

        <section id="aux-features" class="section main-feature-gray">
          <div class="container">

            <div class="row">
              <div class="col-md-8 col-sm-8 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
                <div class="feature-item">
                  <h3 class="title-small">
                    Track your usage/performace
                  </h3>
                  <p>
                    Specially designed dashboards lets you track your API usage and analyze the App/API performace metrics. You can also view your billing reports, account balance and even recharge for more API call volume for paid APIs.
                  </p>
                </div>
              </div>

              <div class="col-md-4 col-sm-4 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms">
                <img src="https://i.imgur.com/VwtqaL6.png" class="img-responsive" alt="">
              </div>

            </div>

          </div>
        </section>

        <section id="testimonial" class="section">
          <div class="container">
            <div class="section-header text-center wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="400ms">
              <h1 class="section-title">What People Say</h1>
              <h2 class="section-subtitle">Testimonials from developers</h2>
            </div>
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms">
                <div id="testimonial-carousel" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#testimonial-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#testimonial-carousel" data-slide-to="1"></li>
                    <li data-target="#testimonial-carousel" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="item active text-center">
                      <p>Easy to use APIs, helped us kickstart our payment solutions</p>
                      <div class="meta">
                        <p>Chief Architect <span><a href="http://apigee.com/">Blau Inc.</a></span></p>
                      </div>
                    </div>
                    <div class="item text-center">
                      <p>Great purpose built APIs, loved the interactive documentation and the client SDKs</p>
                      <div class="meta">
                        <p>Android Developer <span><a href="http://apigee.com/">Grun Inc.</a></span></p>
                      </div>
                    </div>
                    <div class="item text-center">
                      <p>We were able to identity various bottlenecks in our application through Analytics Dashboard</p>
                      <div class="meta">
                        <p>iOS Developer <span><a href="http://apigee.com/">Ilann LLC.</a></span></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <div class="footer">
          <div class="container">
            Copyright 2018 - All Rights Reserved.
          </div>
        </div>

      <?php else: ?>

        <div class="container page-content-ct">
          <div class="row">

            <?php if (!empty($page['sidebar_first'])): ?>
              <aside class="col-sm-3" role="complementary">
                <?php print render($page['sidebar_first']); ?>
              </aside>  <!-- /#sidebar-first -->
            <?php endif; ?>

            <section<?php print $content_column_class; ?>>
              <?php if (!empty($page['highlighted'])): ?>
                <div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
              <?php endif; ?>
              <?php if ($messages): ?>
                <div class="row">
                  <div class="col-md-12">
                    <?php print $messages; ?>
                  </div>
                </div>
              <?php endif; ?>
              <?php if (!empty($tabs) && !drupal_is_front_page()): ?>
                <?php print render($tabs); ?>
              <?php endif; ?>
              <?php if (!empty($page['help'])): ?>
                <?php print render($page['help']); ?>
              <?php endif; ?>
              <?php if (!empty($action_links)): ?>
                <ul class="action-links"><?php print render($action_links); ?></ul>
              <?php endif; ?>

              <?php print render($page['content']); ?>
            </section>

            <?php if (!empty($page['sidebar_second'])): ?>
              <aside class="col-sm-3" role="complementary">
                <?php print render($page['sidebar_second']); ?>
              </aside>  <!-- /#sidebar-second -->
            <?php endif; ?>

          </div>
        </div>

      <?php endif; ?>
    </div>
  </div>
  <?php if (!drupal_is_front_page()): ?>
    <footer class="footer">
      <div class="container">
        Copyright 2018 - All Rights Reserved.
      </div>
    </footer>
  <?php endif; ?>
</div>
