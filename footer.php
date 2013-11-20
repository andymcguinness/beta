	</div><!-- Row End -->
</section><!-- Container End -->

<div class="row full-width">
	<?php dynamic_sidebar("Footer"); ?>
</div>

<footer class="row full-width" role="contentinfo">
	<div class="small-12 large-4 columns">
		<p>&copy; Maia M. McGuinness, <?php echo date('Y'); ?>.</p>
	</div>
</footer>
</div>

<?php wp_footer(); ?>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/pushy.min.js"></script>

<script>
	(function($) {
		$(document).foundation();
	})(jQuery);
</script>
	
</body>
</html>