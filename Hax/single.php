<?php get_header();

$options = get_option( 'enable_sharing' );

// Fetch these IDs now because we'll be using them a lot.
$demo_id = get_cat_ID('Demo');
$featureddemo_id = get_cat_ID('Featured Demo');
$featured_id = get_cat_ID('Featured Article');
?>

<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>

<div id="content-head" class="section">
  <h1 class="post__title"><?php the_title(); ?></h1>
  <div class="byline">
    <h3 class="post__author">
      <?php if (function_exists(coauthors)) : ?>
        <?php
          $authors = get_coauthors($post->ID);
          $authorPos = 0;
        ?>
        <?php echo get_avatar($authors[0], 64) ?>
        작성자:
        <?php foreach ($authors as $author) : ?>
          <?php $authorPos++; ?>
          <?php if($author->user_url) : ?>
            <a class="url" href="<?php echo $author->user_url; ?>" rel="external me"><?php echo hacks_author($author->display_name); ?></a><?php if($authorPos < count($authors)): ?>,<?php endif; ?>
          <?php else : ?>
            <a class="url" href="<?php echo get_author_posts_url($author->ID); ?>"><?php echo hacks_author($author->display_name); ?></a><?php if($authorPos < count($authors)): ?>,<?php endif; ?>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php else : /* if the plugin is disabled, fall back to single author */ ?>
          <h3>작성자</h3>
          <div class="vcard">
            <h4 class="fn">
            <?php if (get_the_author_meta('user_url')) : ?>
              <a class="url" rel="external me" href="<?php the_author_meta('user_url'); ?>"><?php the_author(); ?>
              <?php if (function_exists('get_avatar')) : echo ('<span class="photo">'.get_avatar( get_the_author_meta('user_email'), 48 ).'</span>'); endif; ?>
              </a>
            <?php else : ?>
              <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?>
              <?php if (function_exists('get_avatar')) : echo ('<span class="photo">'.get_avatar( get_the_author_meta('user_email'), 48 ).'</span>'); endif; ?>
              </a>
            <?php endif; ?>
            </h4>
            <?php if (get_the_author_meta('description')) : ?>
            <p><?php the_author_meta('description'); ?></p>
            <?php endif; ?>
             <?php echo dw_get_author_meta(); ?>
            <p><a class="url" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?>가 작성한 문서들&hellip;</a></p>
          </div>
      <?php endif; ?>
    </h2>
    <div class="post__meta">
      작성일:
      <abbr class="published" title="<?php the_time('Y-m-d\TH:i:sP'); ?>">
        <?php the_time(get_option('date_format')); ?>
      </abbr>
      <span class="entry-cat">분류:
        <?php hacks_category_list() ?>
      </span>
      <?php if ( current_user_can( 'edit_page', $post->ID ) ) : ?>
        <span class="edit">
          &middot;
          <i class="fa fa-edit"></i>
          <?php edit_post_link('문서 수정', '', ''); ?>
        </span>
      <?php endif; ?>
      <div class="socialshare" data-type="bubbles"></div>
    </div>
  </div>
</div>

<main id="content-main" class="section article">
  <article class="post" role="article">
    <?php the_content(); ?>
    <section class="about">
      <?php if (function_exists(coauthors)) : ?>
        <?php $authors = get_coauthors($post->ID); ?>
        <?php foreach ($authors as $author) : ?>
          <h2 class="about__header">작성자:
            <?php if($author->user_url) : ?>
              <a class="url" href="<?php echo $author->user_url; ?>" rel="external me">
                <?php echo hacks_author($author->display_name); ?>
              </a>
            <?php else : ?>
              <a class="url" href="<?php echo get_author_posts_url($author->ID); ?>">
                <?php echo hacks_author($author->display_name); ?>
              </a>
            <?php endif; ?>
          </h3>
          <?php if ($author->description) : ?>
            <p><?php echo $author->description; ?></p>
          <?php endif; ?>
          <?php echo dw_get_author_meta($author->ID); ?>
            <p><a class="url" href="<?php echo get_author_posts_url($author->ID); ?>"><?php echo hacks_author($author->display_name); ?>가 작성한 문서들&hellip;</a></p>
        <?php endforeach; ?>
      <?php endif; ?>
    </section>
  </article>
  <?php comments_template(); ?>
</main><!-- /#content-main -->

  <?php endwhile; ?>

<?php else : ?>

  <h1 class="page-title">문서를 찾을 수 없습니다.</h1>
  <p>모든 곳을 찾아봤지만, 찾으시고자 하는 페이지나 파일을 찾지 못했습니다. 가능성을 찾자면:</p>
  <p><img src="<?php bloginfo('stylesheet_directory'); ?>/img/empty.png" width="390" height="390" alt="" class="alignright" /></p>
  <ul>
    <li>너무 오래된 링크나 북마크일 수 있습니다.</li>
    <li>직접 주소를 입력했다면, 잘못 입력될 수도 있습니다.</li>
    <li>에러를 발견한 것일 수 있습니다.</li>
  </ul>

<?php endif; ?>

<?php get_footer(); ?>
