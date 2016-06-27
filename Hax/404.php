<?php get_header(); ?>

<main id="content-main" class="section error-page">
  <h1 class="page-title">문서를 찾을 수 없습니다.</h1>
  <div class="fail post">
    <p>모든 곳을 찾아봤지만, 찾으시고자 하는 페이지나 파일을 찾지 못했습니다. 가능성을 찾자면:</p>
    <ul>
      <li>너무 오래된 링크나 북마크일 수 있습니다.</li>
      <li>직접 주소를 입력했다면, 잘못 입력될 수도 있습니다.</li>
      <li>에러를 발견한 것일 수 있습니다.</li>
    </ul>

    <h2>그래서 지금 해야 할일은?</h2>
    <ul>
      <li><a href="<?php bloginfo('url'); ?>">첫화면</a>으로 돌아가세요.</li>
      <li>HACKS에서 <a href="#s">검색</a> 하세요.</li>
      <li><a href="<?php echo get_permalink(get_page_by_path('demos')->ID); ?>">데모 페이지</a>를 확인하세요.</li>
    </ul>
  </div>
</main><!-- /#content-main -->

<?php get_footer(); ?>
