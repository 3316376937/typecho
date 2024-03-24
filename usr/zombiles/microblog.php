<?php
/**
* MicroBlog
*
* @package custom
*/
?>
<span class="theme_model">
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
			<ul class="pagecookery_list">
				<?php 
				define('pc_url', 'http://pagecokery.net/');  //输入你的PageCookery微博客地址，不要忘记最后面的"/"哦！ 
				define('pc_name', '怡红别院');   //输入你的PageCookery博客名称；
				?>
<li id="panel"><span style="float:left;"><a href="<?php echo $pc_url; ?>" target="_blank"><?php echo $pc_name; ?></a><span style="font-size:10px;font-family:"Lucida Grande",Verdana,Arial;"><a href="<?php echo $pc_url; ?>"><?php echo $pc_url; ?></a></span></span><a href=<?php echo '"' . $pc_url . '?act=login"'; ?> target="_blank">登录</a> | <a href=<?php echo '"' . $pc_url . '?act=comments"'; ?> target="_blank">评论</a> | <a href=<?php echo '"' . $pc_url . '?act=following"'; ?> target="_blank">关注</a></li>
<?php
$xmlfile = $pc_url . "rss.xml"; 
$xml = simplexml_load_file($xmlfile);
$n="20";
for($i=0;$i<$n;$i++){
?>
<li>
<div id="entry-<?php echo $i;?>" class="entry">
<?php echo $xml->channel->item[$i]->description;?><span class="entry-meta" id="entry-meta"><a href="<?php echo $xml->channel->item[$i]->link; ?>"><?php echo $xml->channel->item[$i]->title;?></a></span>
</div>
</li>
<?php }?>
</ul>
													</div>				
					
					<div class="postFooter">
						 <div class="menubar">
                        <span class="author">
                        <a href="<?php $this->options->siteUrl(); ?>"><?php $this->author(); ?></a>
                        </span> 发表于<span class="time"><?php $this->date('F j, Y'); ?></span></div>
    </div>

		</div>
    </div><!-- end #content-->
	<?php $this->need('sidebar.php'); ?>
	<?php $this->need('footer.php'); ?>
</span>