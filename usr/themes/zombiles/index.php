<?php
/**
 * 本主题是在Typecho默认主题的基础上制作的
 * 网站样式是参考博客大巴的一个主题
 * @package Zombiles
 * @author Austin
 * @version 1.0.0
 * @link http://blog.imnerd.org
 */
 
 $this->need('header.php');
 ?>

    <div class="grid_10" id="content">
	<?php while($this->next()): ?>
        <div class="post">
        	<div class="post_header">
			<h2 class="entry_title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
			<p class="entry_data">
				<span><?php _e('分类：'); ?><?php $this->category(','); ?></span>
				 | <span><?php $this->date('F j, Y'); ?></span>
		</div>
			</p>
			<div class="post_body">
			<?php $this->content('阅读剩余部分...'); ?>
					<div class="tags"><?php _e('标签'); ?>: <?php $this->tags(', ', true, 'none'); ?> </div>
							</div>				
					
					<div class="postFooter">
                                <div class="menubar"><span class="author"><a href="<?php $this->options->siteUrl(); ?>"><?php $this->author(); ?></a></span> 发表于<span class="time"><?php $this->date('F j, Y'); ?></span> | <a class="readmore" href="<?php $this->permalink() ?>">阅读全文</a> | <a class="cmt" href="<?php $this->permalink() ?>#comments"><span class="count"><?php $this->commentsNum(_t('当前暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></span></a>
                                </div>
					</div>

        </div>
	<?php endwhile; ?>

    <?php $this->pageNav(); ?>
    </div><!-- end #content-->
	<?php $this->need('sidebar.php'); ?>
	<?php $this->need('footer.php'); ?>
