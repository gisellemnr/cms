<?php
/*
Template name: Results Page
*/

function get_resolutions() {

  $servername = "localhost";
  $username = "ressaude";
  $password = "Ressaude123";
  $dbname = "ressaude";
  
  $db = new mysqli($servername, $username, $password, $dbname);

  if ($db->connect_error) {
    die("Error connecting to database: " . $db->connect_error);
  }

  $description = "%".$_GET['description']."%";
  $city = "%".$_GET['city']."%";
  $yearstart = $_GET['yearfrom'] ? (int) $_GET['yearfrom'] : 1900;
  $yearend = $_GET['yearto'] ? (int) $_GET['yearto'] : 2500;

  # Search parameters:
  #
  # Keyword in description
  # Year from to
  # City

  /* change character set to utf8 */
  if (!$db->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $db->error);
  }

  $query = $db->prepare("SELECT city, number, link, description, year FROM `resolutions` "
    ."WHERE `description` LIKE ? "
    ."AND `city` LIKE ? "
    ."AND `year` >= ? "
    ."AND `year` <= ?");

  $query->bind_param("ssii", $description, $city, $yearstart, $yearend);
  $query->execute();

  # SELECT * FROM `resolutions` WHERE `description` LIKE '%Aprova%' AND `city` LIKE
  # '%Horizonte%' AND `year` >= 1997 AND `year` <= 1997

  $result = $query->get_result();
  $table = "";

  if ($result->num_rows > 0) {
    $table .= "{$result->num_rows} resolu&ccedil;&otilde;es encontradas.<br/>";
    $table .= "<table><tr>"
      ."<th style=\"width:100px\">Cidade</th>"
      ."<th style=\"width:100px;text-align:center\">N&uacute;mero</th>"
      ."<th>Descri&ccedil;&atilde;o</th>"
      ."<th style=\"width:50px;text-align:center\">Ano</th>"
      ."<th style=\"width:50px;text-align:center\">Link</th>"
      ."</tr>";
    
    while ($row = $result->fetch_assoc()) {
      $table .= "<tr>"
        ."<td>".$row["city"]."</td>"
        ."<td style=\"text-align:center\">".$row["number"]."</td>"
        ."<td>".$row["description"]."</td>"
        ."<td style=\"text-align:center\">".$row["year"]."</td>"
        ."<td style=\"text-align:center\"><a href=".$row["link"].">link</a></td>"
        ."</tr>";
    }
    $table .= "</table>";
  } else {
    $table .= "Nenhum resultado.";
  }

  $result->close();
  $db->close();

  echo $table;
  
}

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
                          <?php get_resolutions(); ?>
			</div><!-- .entry-content -->

			<footer class="entry-meta">
				<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-meta -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
