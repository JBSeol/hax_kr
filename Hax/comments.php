<?php // Do not delete these lines
  if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');
  if ( post_password_required() ) {
    echo '<p class="nocomments">이 문서를 보려면 암호가 필요합니다.</p>';
    return;
  }

  /* This variable is for alternating comment background */
  $oddcomment = 'alt';
?>

<?php /* You can start editing here. */ ?>

<?php if ( have_comments() || comments_open() ) : // If there are comments OR comments are open ?>
<section class="discussion">
  <hr class="dino">
  <div class="comments">
    <header class="comments__head">
      <h3><?php comments_number('댓글이 없습니다.', '1개 댓글', '% 댓글' );?></h3>
    </header>

    <?php if ( have_comments() ) : // If there are comments ?>
      <ol class="comments__list" class="hfeed">
      <?php wp_list_comments('type=all&style=ol&callback=hacks_comment'); // Comment template is in functions.php ?>
      </ol>
    <?php endif; ?>
  </div><?php // end .comments ?>

<?php if (comments_open()) : ?>
  <div class="response" id="respond">
    <?php if ( get_option('comment_registration') && !$user_ID ) : // If registration is required and you're not logged in, show a message ?>
    <p>댓글을 쓰시려면 <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">로그인</a>이 필요합니다.</p>

    <?php else : // else show the form ?>
    <form id="comment-form" action="<?php echo esc_attr(get_option('siteurl')); ?>/wp-comments-post.php" method="post">
        <h3><?php comment_form_title( __('댓글 쓰기'), __('%s에 답글 쓰기' ) ); ?></h3>
        <p id="cancel-comment-reply"><?php cancel_comment_reply_link('답글 취소'); ?></p>
      <?php if ( $user_ID ) : ?>
        <div class="self"><?php printf( __( '<a href="%1$s">%2$s</a>로 로그인됨. <a class="logout" href="%3$s">로그아웃?</a>', 'mozhacks' ), admin_url( 'profile.php' ), esc_html($user_identity), wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ); ?></div>
      <?php else : ?>
        <div class="field" id="cmt-name">
          <label for="author"><?php _e('이름', 'mozhacks'); ?> <?php if ($req) :?><abbr title="<?php _e('(required)', 'onemozilla'); ?>">*</abbr><?php endif; ?></label>
          <input type="text" name="author" id="author" size="25" <?php if ($req) echo "required aria-required='true'"; ?>>
        </div>
        <div class="field" id="cmt-email">
          <label for="email"><?php _e('이메일', 'mozhacks'); ?> <?php if ($req) :?><abbr title="<?php _e('(required)', 'onemozilla'); ?>">*</abbr><?php endif; ?></label>
          <input type="email" name="email" id="email" size="25" <?php if ($req) echo "required aria-required='true'"; ?>>
        </div>
        <div class="field" id="cmt-web">
          <label for="url"><?php _e('웹사이트', 'mozhacks'); ?></label>
          <input type="url" name="url" id="url" size="25">
        </div>
        <div id="cmt-ackbar">
          <label for="age"><?php _e('숨겨진 스팸 필드를 썼기 때문에 스팸 로봇으로 생각됩니다. 스패머가 아니라면 다시 댓글을 쓰시고, 잘못된 필드를 비워 놓으세요.', 'mozhacks'); ?></label>
          <input type="text" name="age" id="age" size="4" tabindex="-1">
        </div>
      <?php endif; ?>
      <div class="field" id="cmt-cmt">
        <label for="comment"><?php _e('내용', 'mozhacks'); ?></label> <textarea name="comment" id="comment" cols="50" rows="10" required="required" aria-required="true"></textarea>
      </div>
      <div class="field" id="comment-submit">
        <button name="submit" type="submit"><?php _e('댓글 쓰기', 'mozhacks'); ?></button>
      </div>
      <?php comment_id_fields(); ?>
      <?php do_action('comment_form', $post->ID); ?></div>
    </form>
    <?php endif; // end if reg required and not logged in ?>
  </div><?php // end #respond ?>
</section><?php // end .discussion ?>
<script>jQuery("#comment-form").submit(function() { return fc_checkform(<?php if ($req) : echo "'req'"; endif; ?>); });</script>

<?php else : // else comments are closed ?>

<p class="comments__closed"><b>이 문서는 더이상 댓글을 달 수 없습니다.</b></p>

<?php endif; // end if comments open ?>

<?php endif; // if you delete this the sky will fall on your head ?>
