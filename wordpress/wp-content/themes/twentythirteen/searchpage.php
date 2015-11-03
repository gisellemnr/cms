<?php
/*
Template name: Search Page
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<header class="entry-header">
				<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
				<div class="entry-thumbnail">
					<?php the_post_thumbnail(); ?>
				</div>
				<?php endif; ?>

				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->

			<div class="entry-content">
                          <form role="search" action="<?php echo site_url('/index.php/resultados'); ?>" method="get">
                            Cont&eacute;m as palavras: <input type="text" size=100 name="description"/><br/><br/>
                            Do ano <input type="text" size=4 name="yearfrom"/> at&eacute; <input type="text" size=4 name="yearto"/><br/><br/>
                            Cidade: <input type="text" size=20 name="city"><br/><br/>
                            <input type="submit" name="submit" value="Buscar"/>
                          </form>
			</div><!-- .entry-content -->

			<footer class="entry-meta">
				<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-meta -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
