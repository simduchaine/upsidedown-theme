
        <footer>

        	<div id="instafeed">
				<?php echo do_shortcode('[instagram-feed width=100 widthunit=% height=300 heightunit=px imagepadding=0 num=7 cols=7 showheader=false showbutton=false showfollow=false]'); ?>
			</div>

        	<div class="container footer clearfix">
	        	<div class="row top-row">
	        		<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
	        	</div>

					<?php get_template_part( 'template-parts/footer/footer', 'logo' ); ?>

		        <hr>

		        <div class="row">
		        	<?php get_template_part( 'template-parts/footer/footer', 'copyright' ); ?>
		        </div>

        	</div>


        </footer>

               

        <?php wp_footer(); ?>  

    </body>
</html>
