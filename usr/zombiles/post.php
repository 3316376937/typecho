<?php $this->need('header.php'); ?>

    <div class="grid_10" id="content">
        <div class="post">
        	        	<div class="post_header">
			<h2 class="entry_title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
			<p class="entry_data" style="text-indent:0em;">
				<span><?php _e('分类：'); ?><?php $this->category(','); ?></span>
			</p>
		</div>
			<div class="post_body">
			<?php $this->content(); ?>
			<p class="tags"><?php _e('标签'); ?>: <?php $this->tags(', ', true, 'none'); ?></p>
										</div>				
					
					<div class="postFooter">
                                <div class="menubar">
                        <span class="author">
                        <a href="<?php $this->options->siteUrl(); ?>"><?php $this->author(); ?></a>
                        </span> 发表于<span class="time"><?php $this->date('F j, Y'); ?></span></div>
    </div>
		<?php $this->need('comments.php'); ?>
    </div>
       						
    					</div><!-- end #content-->
    					<?php $this->need('sidebar.php'); ?>
    					</div>
    					</div>

	<?php $this->need('footer.php'); ?>
