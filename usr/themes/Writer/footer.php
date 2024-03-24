<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

                    </div>
                </main>
            </div>
        </div>
    </div>
</div>
<div class="footer-widget-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="footer-widgets">
                    <h3>Writers</h3>
                    <div class="textwidget">这是一款响应式简约Typecho博客主题，它能让您的网站在所有设备中始终保持良好的展现并且对主题框架进行了高度SEO优化。</div>
                </div>
            </div>
            <div class="col-md-4"><div class="footer-widgets"><h3>更快的页面加载</h3><div class="textwidget">Writers 主题的加载时间为350毫秒，这比互联网上96%的网站加载的都要快，我手动优化了所有代码，包含网页的请求次数，资源使用等，使其非常快速。</div></div></div>
            
            <div class="col-md-4"><div class="footer-widgets"><h3>高度的SEO优化</h3><div class="textwidget">Writers 主题遵循 Google SEO优化准则，使主题在内容显示和布局模块完美的符合搜索引擎，并且对文章内容页面进行了 Google 结构化数据的输出。</div></div></div>
        </div>
    </div>
</div>
<footer id="colophon" class="site-footer">
    <div class="row site-info">
        <div class="copy-right-section"> © <?php echo date('Y'); ?> <?php $this->options->title(); ?> - Theme by Roogle</div>
    </div>
</footer>
</div>

<script type="text/javascript" src="<?php $this->options->themeUrl(); ?>jquery.js?ver=1.12.4"></script>
<!--[if lt IE 9]>
<script src="//cdnjscn.b0.upaiyun.com/libs/html5shiv/r29/html5.min.js"></script>
<![endif]--> 
<script>(function($) {
$(document).ready(function(){
  $('.notebar').slideDown(300);
  
  $('#notebar-hidebar').click(function(){
    $('.notebar').slideUp(300, function(){
      $('.notebar-dropdown').slideDown(300);
    });
    return false;
  });

  $('.notebar-dropdown').click(function(){
    $('.notebar-dropdown').slideUp(300,function(){
      $('.notebar').slideDown();
    });
    return false;
  });
  
});
})( jQuery );</script> 



<?php $this->footer(); ?>
</body>
</html>
