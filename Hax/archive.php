<?php get_header();

// Fetch these IDs now because we'll be using them a lot.
$demo_id = get_cat_ID('Demo');
$featureddemo_id = get_cat_ID('Featured Demo');
$featured_id = get_cat_ID('Featured Article');

$search_count = 0;
$search = new WP_Query("s=$s & showposts=-1");
if($search->have_posts()) : while($search->have_posts()) : $search->the_post();
$search_count++;
endwhile; endif;
?>

<!-- /#content-head -->

<main id="content-main" class="section">
  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
  <h1 class="page-title">
    <?php if (is_category($demo_id)) : ?>구현 예제
    <?php elseif (is_category()) : ?><?php single_cat_title(); ?> 문서
    <?php elseif (is_tag()) : ?>&#8220;<?php single_tag_title(); ?>&#8221;로 태깅된 문서
    <?php elseif (is_day()) : ?><?php the_time('F jS, Y'); ?>에 작성된 문서
    <?php elseif (is_month()) : ?><?php the_time('F Y'); ?>에 작성된 문서
    <?php elseif (is_year()) : ?><?php the_time('Y'); ?>에 작성된 문서
    <?php elseif (is_author()) : ?><?php echo get_userdata(intval($author))->display_name; ?>가 쓴 문서
    <?php elseif (is_search()) : ?>&ldquo;<?php the_search_query(); ?>&rdquo;검색한 문서 &#10025;
    <?php elseif (isset($_GET['paged']) && !empty($_GET['paged'])) : ?>문서
    <?php else : ?>문서
    <?php endif; ?>
  </h1>

  <?php if (have_posts()) : ?>
  <ul class="article-list">
    <?php fc_custom_loop($query_string.'&template=article-list'); ?>
  </ul>

  <hr class="dino">

  <?php if (fc_show_posts_nav()) : ?>
    <?php if (function_exists('fc_pagination') ) : fc_pagination(); else: ?>
      <nav class="nav-paging">
        <?php if ( $paged < $wp_query->max_num_pages ) : ?><span class="nav-paging__next"><?php next_posts_link('다음'); ?></span><?php endif; ?>
        <?php if ( $paged > 1 ) : ?><span class="nav-paging__prev"><?php previous_posts_link('이전'); ?></span><?php endif; ?>
      </nav>
    <?php endif; ?>
  <?php endif; ?>

  <?php else : ?>
    <p class="fail">더이상 문서가 없습니다.</p>
  <?php endif; ?>
</main><!-- /#content-main -->

<?php get_footer(); ?>
