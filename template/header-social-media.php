<?php 
if(!empty(get_option('mb_sozial_media_facebook')) || 
	!empty(get_option('mb_sozial_media_twitter')) || 
	!empty(get_option('mb_sozial_media_instagram')) || 
	!empty(get_option('mb_sozial_media_youtube')) || 
	!empty(get_option('mb_sozial_media_linkedin')) || 
	!empty(get_option('mb_sozial_media_mastodon')) ||
	!empty(get_option('mb_sozial_media_abgeordnetenwatch')) || 
	!empty(get_option('mb_sozial_media_email')) ||
	!empty(get_option('mb_sozial_media_search')) ||  
	!empty(get_option('mb_sozial_media_feed'))
	):
?>
<div class="social-media">
	<?php if(!empty(get_option('mb_sozial_media_facebook'))): ?>
		<a class="facebook" href="<?php echo get_option('mb_sozial_media_facebook'); ?>" target="_blank"><span>Facebook</span></a>
	<?php endif;?>
	<?php if(!empty(get_option('mb_sozial_media_twitter'))): ?>
		<a class="twitter" href="<?php echo get_option('mb_sozial_media_twitter'); ?>" target="_blank"><span>Twitter</span></a>
	<?php endif;?>
	<?php if(!empty(get_option('mb_sozial_media_instagram'))): ?>
		<a class="instagram" href="<?php echo get_option('mb_sozial_media_instagram'); ?>" target="_blank"><span>Instagram</span></a>
	<?php endif;?>
	<?php if(!empty(get_option('mb_sozial_media_youtube'))): ?>
		<a class="youtube" href="<?php echo get_option('mb_sozial_media_youtube'); ?>" target="_blank"><span>Youtube</span></a>
	<?php endif;?>
	<?php if(!empty(get_option('mb_sozial_media_linkedin'))): ?>
		<a class="linkedin" href="<?php echo get_option('mb_sozial_media_linkedin'); ?>" target="_blank"><span>Linkedin</span></a>
	<?php endif;?>
	<?php if(!empty(get_option('mb_sozial_media_mastodon'))): ?>
		<a class="mastodon" rel="me" href="<?php echo get_option('mb_sozial_media_mastodon'); ?>" target="_blank"><span>Mastodon</span></a>
	<?php endif;?>
	<?php if(!empty(get_option('mb_sozial_media_feed'))): ?>
		<a class="feed" href="<?php echo get_option('mb_sozial_media_feed'); ?>" target="_blank"><span>RSS</span></a>
	<?php endif;?>
	<?php if(!empty(get_option('mb_sozial_media_abgeordnetenwatch'))): ?>
		<a class="abgeordnetenwatch" href="<?php echo get_option('mb_sozial_media_abgeordnetenwatch'); ?>" target="_blank"><span>Abgeordnetenwatch</span></a>
	<?php endif;?>
	<?php if(!empty(get_option('mb_sozial_media_email'))): ?>
		<a class="email" href="mailto:<?php echo get_option('mb_sozial_media_email'); ?>" title="mailto:<?php echo get_option('mbgi_sozial_media_email'); ?>"></a>
	<?php endif;?>
	<?php if(!empty(get_option('mb_sozial_media_search'))): ?>
		<a class="search" href="<?php echo get_site_url()?>/?s=" title="zur Suche"><i class="bi bi-search"></i></a>
	<?php endif;?>
</div>

<?php 
endif;
?>