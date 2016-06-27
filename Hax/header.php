<?php if (( is_single() || is_page() ) && (!is_front_page()) ) : $pageClass = 'home'; ?>

<?php endif ?>

<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="alternate" type="application/rss+xml" title="Mozilla Hacks &#8211; the Web developer blog RSS Feed" href="<?php bloginfo('rss2_url'); ?>">

  <link href='//fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
  <link href="//addons.cdn.mozilla.net/static/css/tabzilla/tabzilla.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
  <link rel="stylesheet" href="//cdn.jsdelivr.net/highlight.js/8.6.0/styles/solarized_light.min.css">

  <title><?php if (( is_single() || is_page() ) && (!is_front_page()) ) : ?><?php wp_title($sep = ''); ?> &#x2605;
  <?php elseif ( is_search() ) : ?>&#8220;<?php the_search_query(); ?>&#8221;에 대한 검색결과 &#x2605;
  <?php elseif ( is_category('Demo') ) : ?>구현 예제&#x2605;
  <?php elseif ( is_category('Featured Demo') ) : ?>주요 구현 예제 &#x2605;
  <?php elseif ( is_category('Featured Article') ) : ?>주요 문서 &#x2605;
  <?php elseif ( is_category() ) : ?><?php single_cat_title(); ?> 문서 &#x2605;
  <?php elseif ( is_author() ) : ?><?php echo get_userdata(intval($author))->display_name; ?>이 작성한 문서 &#x2605;
  <?php elseif ( is_tag() ) : ?>&#8220;<?php single_tag_title(); ?>&#8221;로 태깅된 문서 &#x2605;
  <?php elseif ( is_day() ) : ?><?php the_time('F jS, Y'); ?>에 쓴 문서 &#x2605;
  <?php elseif ( is_month() ) : ?><?php the_time('F Y'); ?>에 쓴 문서 &#x2605;
  <?php elseif ( is_year() ) : ?><?php the_time('Y'); ?>에 쓴 문서 &#x2605;
  <?php elseif ( is_404() ) : ?>찾을 수 없음 &#x2605;
  <?php elseif ( is_home() ) : ?>첫화면 &#x2605;
    <?php endif; ?>
    <?php bloginfo('name'); ?>
  </title>

  <script type="text/javascript">
    window.hacks = {};
    // http://cfsimplicity.com/61/removing-analytics-clutter-from-campaign-urls
    var removeUtms  =   function(){
        var l = window.location;
        if( l.hash.indexOf( "utm" ) != -1 ){
            var anchor = l.hash.match(/#(?!utm)[^&]+/);
            anchor  =   anchor? anchor[0]: '';
            if(!anchor && window.history.replaceState){
                history.replaceState({},'', l.pathname + l.search);
            } else {
                l.hash = anchor;
            }
        };
    };
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-35433268-8'],
              ['_setAllowAnchor', true]);
    _gaq.push (['_gat._anonymizeIp']);
    _gaq.push(['_trackPageview']);
    _gaq.push( removeUtms );
    (function(d, k) {
      var ga = d.createElement(k); ga.type = 'text/javascript'; ga.async = true;
      ga.src = 'https://ssl.google-analytics.com/ga.js';
      var s = d.getElementsByTagName(k)[0]; s.parentNode.insertBefore(ga, s);
    })(document, 'script');
  </script>

  <?php wp_head(); ?>
</head>
<body>
  <div class="outer-wrapper">
    <header class="section section--fullwidth header">
      <div class="masthead row">
        <div id="tabzilla">
          <a href="https://www.mozilla.org/">Mozilla</a>
        </div>
        <div class="branding block block--3">
          <h1><a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/mdn-logo-mono.svg" alt="Mozilla"><span>Hac<span class="logo-askew">k</span>s-Korea</span></a></h1>
        </div>
        <div class="search block block--2">
          <form class="search__form" method="get" action="<?php bloginfo('url'); ?>/">
            <input type="search" name="s" class="search__input" placeholder="Search Mozilla Hacks" value="<?php the_search_query(); ?>">
            <i class="fa fa-search search__badge"></i>
          </form>
        </div>
        <nav class="social">
          <a class="social__link youtube" href="http://www.youtube.com/user/mozhacks" title="YouTube"><i class="fa fa-youtube"></i><span>Hacks on YouTube</span></a>
          <a class="social__link slack" href="https://mozkr.slack.com" title="Slack"><i class="fa fa-slack"></i><span>Mozilla Korea Community on Slack</span></a>
          <a class="social__link rss" href="<?php bloginfo('rss2_url'); ?>" title="RSS Feed"><i class="fa fa-rss"></i><span>Hacks RSS Feed</span></a>
        </nav>
      </div>
    </header>
