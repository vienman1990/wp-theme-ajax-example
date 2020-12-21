<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) { ?>
			
			<ul class="data-wapper">
				<?php while ( have_posts() ) { the_post(); ?>
					
					<li><?php the_title(); ?></li>

				<?php } ?>
			</ul>
			<a href="javascript:void(0);" class="loadmore">loadmore</a>

		<?php } else { ?>

		<?php } ?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->
	
	<script>
		jQuery(document).ready(function($){
			var page_current = 1;
			$('.loadmore').click(function(){	
				$this = $(this);
				$this.hide();
				var data = {
					'action': 'get_more_post',
					'page': page_current + 1
				};
				$.post('<?php echo admin_url( 'admin-ajax.php' ); ?>', data, function(response) {
					if(response){
						$('.data-wapper').append(response);
						page_current = page_current + 1;
						$this.show();
					}else{
						$this.hide();
					}
					
				});
				

			});
		});
	</script>

<?php get_footer(); ?>
