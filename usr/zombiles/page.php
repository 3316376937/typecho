<?php $this->need('header.php'); ?>

    <div class="grid_10" id="content">
        <div class="post">
        	<div class="post_header">
			<h2 class="entry_title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
			<p class="entry_data" style="text-indent:0em;">
				<span><?php _e('作者：'); ?><?php $this->author(); ?></span> | <?php _e('发布时间：'); ?><?php $this->date('F j, Y'); ?>
			</p>
			</div>
			<div class="post_body">
			<?php $this->content(); ?>
													</div>				
					
					<div class="postFooter">
						 <div class="menubar">
                        <span class="author">
                        <a href="<?php $this->options->siteUrl(); ?>"><?php $this->author(); ?></a>
                        </span> 发表于<span class="time"><?php $this->date('F j, Y'); ?></span></div>
    </div>

		</div>

		<?php $this->need('comments.php'); ?>
    </div><!-- end #content-->
	<?php $this->need('sidebar.php'); ?>
	<?php $this->need('footer.php'); ?>
