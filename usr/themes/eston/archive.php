<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

  <div class="wrapper">


    <?php while($this->next()): ?>

    <?php if (array_key_exists('img',unserialize($this->___fields()))): ?>
    <article class="post post--photo post--cover post--index main-item main-post">
    <?php else: ?>
    <article class="post post--text post--index main-item main-post">
    <?php endif; ?>
    <div class="post-inner">
      <header class="post-item post-header">
      <div class="wrapper post-wrapper">
        <a href="<?php $this->author->permalink(); ?>" class="avatar post-author">
        <img src="<?php $this->options->themeUrl('images/avatar.png'); ?>" class="avatar-item avatar-img">
        <span class="avatar-item"><?php $this->author(); ?></span>
        </a>
      </div>
      </header>
      <?php if (array_key_exists('img',unserialize($this->___fields()))): ?>
      <figure class="post-media">
      <img itemprop="image" src="<?php $this->fields->img(); ?>">
      </figure>
      <?php endif; ?>
      <section class="post-item post-body">
      <div class="wrapper post-wrapper">
        <h2 class="post-title">
        <a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>"><?php $this->title() ?></a>
        </h2>
        <p class="post-excerpt">
          <?php $this->excerpt(200, ''); ?>
        </p>
        
      </div>
      </section>
      <footer class="post-item post-footer">
      <div class="wrapper post-wrapper">
        <div class="meta post-meta">
          <a itemprop="datePublished" href="<?php $this->permalink() ?>" class="icon-ui icon-ui-date meta-item meta-date">
          <span class="meta-count"><?php $this->date(); ?></span>
          </a>
          <a href="<?php $this->permalink() ?>#comments" class="icon-ui icon-ui-comment meta-item meta-comment">
          <?php $this->commentsNum('暂无评论', '1 条评论', '%d 条评论'); ?>
          </a>
        </div>
      </div>
      </footer>
    </div>
    </article>


    <?php endwhile; ?>


  </div class="wrapper">

  <nav class="nav main-pager" role="pagination" data-js="pager">
  <span class="nav-item nav-item-alt">
    第 <?php if($this->_currentPage>1) echo $this->_currentPage;  else echo 1;?> 页 / 共 <?php echo ceil($this->getTotal() / $this->parameter->pageSize); ?> 页
  </span>
  <div class="nav nav--pager">
    <!--<?php $this->pageLink('上一页'); ?>-->
    <?php $this->pageLink('下一页','next'); ?>
  </div>
  </nav>

<?php $this->need('footer.php'); ?>