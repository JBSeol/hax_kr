<?php
/*********
* Articles in title format (title, Featured indicator, meta).
* Also accommodates Demo posts for mixed pages (archives etc).
*/

$featureddemo_id = get_cat_ID('Featured Demo');

if ($loop_first) : ?>
<ol class="post-list hfeed title">
<?php endif; ?>
  <li class="hentry post <?php if (in_category('demo')) : echo " demo"; endif; ?>" id="post-<?php the_ID(); ?>">
    <h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent link to &#8220;<?php the_title_attribute(); ?>&#8221;"><?php the_title(); ?></a></h2>
    <p class="entry-meta">
      <time class="published" pubdate="pubdate" datetime="<?php the_time('Y-m-d\TH:i:sP'); ?>" title="<?php the_time('Y-m-d\TH:i:sP'); ?>"><?php the_time(get_option('date_format')); ?></time>
      &bull; by <?php if (function_exists(coauthors_posts_links)) : coauthors_posts_links(); else : the_author_posts_link(); endif; ?>
      &bull; <?php if (in_category($featureddemo_id)) : fc_category_minusdemo(', '); else : the_category(', '); endif; ?>
      &bull; <?php $comment_count = get_comment_count($post->ID);
        if ( comments_open() || $comment_count['approved'] > 0 ) : ?>
        <a href="<?php comments_link() ?>"><?php comments_number('아직 댓글이 없습니다.','1개 댓글','% 댓글'); ?></a>
      <?php else : ?>
        더이상 댓글을 쓰실 수 없습니다.
      <?php endif; ?>
      <?php if ( current_user_can( 'edit_page', $post->ID ) ) : ?>&bull; <span class="edit"><?php edit_post_link('문서 수정', '', ''); ?></span><?php endif; ?>
    </p>
  </li>
<?php if ($loop_last) : ?>
</ol>
<?php endif; ?>
