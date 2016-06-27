<?php get_header();
$search_count = 0;
$search = new WP_Query("s=$s & showposts=-1");
if($search->have_posts()) : while($search->have_posts()) : $search->the_post();
$search_count++;
endwhile; endif;

// Fetch these IDs now because we'll be using them a lot.
$demo_id = get_cat_ID('Demo');
$featureddemo_id = get_cat_ID('Featured Demo');
$featured_id = get_cat_ID('Featured Article');
?>

<main id="content-main" class="section search-results">
  <h1 class="page-title">&ldquo;<?php the_search_query(); ?>&rdquo;에 대해 <?php echo $search_count ?>개의 <?php if ($search_count == "1") { ?>결과를 찾았습니다.<?php } else { ?>결과를 찾았습니다.<?php } ?> </h1>
  <ul class="article-list">
    <?php if (have_posts()) :
      fc_custom_loop($query_string.'&template=article-list'); ?>
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
    <p class="fail">찾으시는 문서가 없습니다.</p>
  <?php endif; ?>

</main><!-- /#content-main -->

<?php get_footer(); ?>
