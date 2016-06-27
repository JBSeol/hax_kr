    <footer class="footer section section--fullwidth">
      <div class="row">
        <p class="block block--1">
          특별한 고지가 없는 한 문서와 예제들은
          <a href="https://creativecommons.org/licenses/by-sa/3.0/" rel="license external">Creative Commons Attribution Share-Alike License v3.0</a>
          이나 해당 라이센스의 최신 버전을 따릅니다.
        </p>
        <img class="footer__logo" alt="the Mozilla dino logo" src="<?php echo get_template_directory_uri(); ?>/img/dino.svg">
      </div>
    </footer>
  </div>
  <?php wp_footer(); ?>
  <script>
    // External links should open in a new tab.
    (function () {
      var postLinks = document.querySelectorAll('#content-main a');

      var origin = location.origin;

      for (var i = 0; i < postLinks.length; i++) {
        var link = postLinks[i];
        if (link.origin !== origin && !link.getAttribute('target')) {
          link.setAttribute('target', '_blank');
        }
      }
    })();
  </script>
</body>
</html>
