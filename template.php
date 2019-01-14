<?php

/**
 * @file
 * template.php
 */

/**
 * Implements hook_preprocess_html().
 */
function apigee_md_preprocess_html(&$vars) {
  $header_bg_color                = check_plain(theme_get_setting('header_bg_color'));
  $header_txt_color               = check_plain(theme_get_setting('header_txt_color'));
  $header_hover_bg_color          = check_plain(theme_get_setting('header_hover_bg_color'));
  $header_hover_txt_color         = check_plain(theme_get_setting('header_hover_txt_color'));
  $link_color                     = check_plain(theme_get_setting('link_color'));
  $link_hover_color               = check_plain(theme_get_setting('link_hover_color'));
  $footer_bg_color                = check_plain(theme_get_setting('footer_bg_color'));
  $footer_link_color              = check_plain(theme_get_setting('footer_link_color'));
  $footer_link_hover_color        = check_plain(theme_get_setting('footer_link_hover_color'));
  $button_background_color        = check_plain(theme_get_setting('button_background_color'));
  $button_text_color              = check_plain(theme_get_setting('button_text_color'));
  $button_hover_background_color  = check_plain(theme_get_setting('button_hover_background_color'));
  $button_hover_text_color        = check_plain(theme_get_setting('button_hover_text_color'));

  // Add additional class to the body to adjust the body padding according to
  // the logo size. This is to prevent the search box from going beneath the
  // header.
  $vars['classes_array'][] = "logo_" . theme_get_setting('logo_size');

  //$cdn = theme_get_setting('bootstrap_cdn');

  $my_path = drupal_get_path('theme', 'apigee_responsive');

  // if (empty($cdn)) {
  //   drupal_add_css(drupal_get_path('theme', 'bootstrap') . '/css/overrides.css', array('group' => CSS_SYSTEM));
  //   drupal_add_css($my_path . '/css/bootstrap.min.css', array('group' => CSS_SYSTEM));
  //   drupal_add_js($my_path . '/js/bootstrap.min.js', array('group' => CSS_SYSTEM));
  // }
  if (module_exists('devconnect_monetization')) {
    require_once $my_path . '/templates/monetization/template.php';
    drupal_add_css($my_path . '/templates/monetization/css/monetization.css');
  }

  $inline_css = <<< EOF
.navbar-inverse .navbar-nav > .dropdown > a .caret {border-bottom-color: $header_txt_color !important; border-top-color: $header_txt_color !important; color: $header_txt_color !important;}
.faq .collapsed {display:block !important;}
body header.navbar {background-color: $header_bg_color !important;}
body header.navbar {border-color: $header_bg_color;}
body .navbar-inverse .navbar-toggle,
body .navbar-inverse .navbar-collapse:focus,
body .navbar-inverse .navbar-toggle:hover,
body .navbar-inverse .navbar-toggle:focus,
body .navbar-inverse .navbar-nav > .open > a,
body .navbar-inverse .navbar-nav > .open > a:hover,
body .navbar-inverse .navbar-nav > .open > a:focus,
body .navbar-default .navbar-toggle:hover,
body .navbar-default .navbar-toggle:active,
body .navbar-default .navbar-toggle:focus,
body .navbar-default .navbar-collapse,
body .navbar-default .navbar-collapse:hover,
body .navbar-default .navbar-collapse:focus,
body .navbar-default .navbar-nav > .open > a,
body .navbar-default .navbar-nav > .open > a:hover,
body .navbar-default .navbar-nav > .open > a:focus,
body header.navbar.navbar-nav > .open > a,
body header.navbar.navbar-nav > .open > a:hover,
body header.navbar.navbar-nav > .open > a:focus
{
  border-color: $header_bg_color !important;
  background-color: $header_bg_color !important;
}
body .navbar-inverse .navbar-nav > .open > a:hover { color:$header_hover_txt_color !important; }
body header.navbar .nav > li > a { color: $header_txt_color !important; }
body header.navbar .nav > li > a:hover { background-color: $header_hover_bg_color; }
.navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form, .navbar-inverse .navbar-toggle,
.navbar-default .navbar-collapse, .navbar-default .navbar-form, .navbar-default .navbar-toggle, header.navbar.navbar-collapse,
header.navbar.navbar-form, header.navbar.navbar-toggle {border-color: $header_hover_bg_color !important; }
.navbar-inverse .navbar-toggle, .navbar-inverse .navbar-toggle:hover, .navbar-inverse .navbar-toggle:focus,
.navbar-inverse .navbar-nav > .open > a, .navbar-inverse .navbar-nav > .open > a:hover, .navbar-inverse .navbar-nav > .open > a:focus,
.navbar-default .navbar-toggle:hover, .navbar-default .navbar-toggle:active, .navbar-default .navbar-toggle:focus,
.navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus,
header.navbar.navbar-nav > .open > a, header.navbar.navbar-nav > .open > a:hover, header.navbar.navbar-nav > .open > a:focus { background-color: $header_hover_bg_color !important; }
body header.navbar .nav .active > a, body .navbar .nav .active > a:hover, .navbar.navbar-fixed-top #main-menu li a:hover { background-color: $header_hover_bg_color !important; }
body header.navbar .nav > li > a:hover { color: $header_hover_txt_color !important; }
body a {color: $link_color;}
body a:hover {color: $link_hover_color;}
body .footer {background-color: $footer_bg_color;}
body .footer .navbar ul.footer-links > li > a {color: $footer_link_color;}
body .footer .navbar ul.footer-links > li > a:hover {color: $footer_link_hover_color;}
body .btn-primary {background-color: $button_background_color !important;}
body .btn-primary {color: $button_text_color !important;}
body .btn-primary:hover, body .btn-primary:focus, body .btn-primary:active, body .open .dropdown-toggle.btn {background-color: $button_hover_background_color !important; color: $button_hover_text_color !important;}
.navbar-nav > li > span {color: $header_txt_color;}
.navbar-nav > li > span:hover {color: $header_hover_txt_color;}
.navbar-nav > li.expanded span:hover, .navbar-nav > li.expanded.active {background-color: $header_hover_bg_color;}
.navbar-inverse .navbar-nav > .dropdown > a .caret {border-bottom-color: $header_txt_color !important; border-top-color: $header_txt_color !important; color: $header_txt_color !important;}
.modal-body #user-register-form .form-type-password.col-md-4 { width: 100%; }
.cm-s-default.CodeMirror {
  background-color: #263238;
  color: rgba(233, 237, 237, 1);
}
.cm-s-default .CodeMirror-gutters {
  background: #263238;
  color: rgb(83,127,126);
  border: none;
}
.cm-s-default .CodeMirror-guttermarker, .cm-s-default .CodeMirror-guttermarker-subtle, .cm-s-default .CodeMirror-linenumber { color: rgb(83,127,126); }
.cm-s-default .CodeMirror-cursor { border-left: 1px solid #f8f8f0; }
.cm-s-default div.CodeMirror-selected { background: rgba(255, 255, 255, 0.15); }
.cm-s-default.CodeMirror-focused div.CodeMirror-selected { background: rgba(255, 255, 255, 0.10); }
.cm-s-default .CodeMirror-line::selection, .cm-s-default .CodeMirror-line > span::selection, .cm-s-default .CodeMirror-line > span > span::selection { background: rgba(255, 255, 255, 0.10); }
.cm-s-default .CodeMirror-line::-moz-selection, .cm-s-default .CodeMirror-line > span::-moz-selection, .cm-s-default .CodeMirror-line > span > span::-moz-selection { background: rgba(255, 255, 255, 0.10); }

.cm-s-default .CodeMirror-activeline-background { background: rgba(0, 0, 0, 0); }
.cm-s-default .cm-keyword { color: rgba(199, 146, 234, 1); }
.cm-s-default .cm-operator { color: rgba(233, 237, 237, 1); }
.cm-s-default .cm-variable-2 { color: #80CBC4; }
.cm-s-default .cm-variable-3, .cm-s-default .cm-type { color: #82B1FF; }
.cm-s-default .cm-builtin { color: #DECB6B; }
.cm-s-default .cm-atom { color: #F77669; }
.cm-s-default .cm-number { color: #F77669; }
.cm-s-default .cm-def { color: rgba(233, 237, 237, 1); }
.cm-s-default .cm-string { color: #C3E88D; }
.cm-s-default .cm-string-2 { color: #80CBC4; }
.cm-s-default .cm-comment { color: #546E7A; }
.cm-s-default .cm-variable { color: #82B1FF; }
.cm-s-default .cm-tag { color: #80CBC4; }
.cm-s-default .cm-meta { color: #80CBC4; }
.cm-s-default .cm-attribute { color: #FFCB6B; }
.cm-s-default .cm-property { color: #80CBAE; }
.cm-s-default .cm-qualifier { color: #DECB6B; }
.cm-s-default .cm-variable-3, .cm-s-default .cm-type { color: #DECB6B; }
.cm-s-default .cm-tag { color: rgba(255, 83, 112, 1); }
.cm-s-default .cm-error {
  color: rgba(255, 255, 255, 1.0);
  background-color: #EC5F67;
}
.cm-s-default .CodeMirror-matchingbracket {
  text-decoration: underline;
  color: white !important;
}
EOF;

  switch (theme_get_setting('logo_size')) {
    case 'big':
      $inline_css .= "body #navbar.navbar { height:60px; }\n"
        . "@media(max-width:767px) { body #navbar.navbar { height:inherit; } }\n"
        . ".navbar-nav > li > a { line-height:30px; }\n"
        . "@media(min-width:992px) { .logo > img { width:100%; } }\n";
      break;

    case 'bigger':
      $inline_css .= "body #navbar.navbar { height:70px; }\n"
        . "@media(max-width:767px) { body #navbar.navbar { height:inherit; } }\n"
        . ".navbar-nav > li > a { line-height:40px; }\n"
        . "@media(min-width:992px) { .logo > img { width:100%; } }\n";
      break;

    default:
      break;
  }

  switch (theme_get_setting('footer_position')) {
    case 'fixed':
      $inline_css .= "body #push { height: 100px; }\n";
      if (path_is_admin(current_path())) {
        $inline_css .= "#module-filter-tabs.bottom-fixed { bottom: 100px; }\n"
          . "html.js #module-filter-submit { padding: 10px; }\n";
      }
      break;

    case 'static':
      $inline_css .= ".footer.footer-fixed-bottom { position:static; }\n";
      break;

    default;
  }

  if (module_exists('smartdocs')) {
    $inline_css .= <<<EOF
body #resource_URL input,
#method_content [data-role='method_url_container'],
#method_content .url_container > p > span,
[data-role='method_url_container'] span span span.template_param {
    font-family: Courier, 'Courier New', monospace;
}
EOF;
  }

  drupal_add_css($inline_css, array('group' => CSS_THEME, 'type' => 'inline', 'weight' => 9999));
}

/**
 * Implements hook_preprocess_hook().
 */
function apigee_md_preprocess_devconnect_developer_apps_list(&$vars) {
  $user = (isset($vars['user']) ? $vars['user'] : $GLOBALS['user']);

  if (user_access('create developer apps')) {
    $link_text = '<span class="glyphicon glyphicon-plus"></span> ' . t('Add a new !app_label', array('!app_label' => _devconnect_developer_apps_get_app_label(FALSE)));
    $vars['add_app'] = l($link_text, 'user/' . $user->uid . '/apps/add', array('html' => TRUE, 'attributes' => array('class' => array('btn btn-primary'))));
  }

  foreach ($vars['applications'] as $key => $detail) {
    $vars['applications'][$key]['id'] = uniqid();
  }
}
