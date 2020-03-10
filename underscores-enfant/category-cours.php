<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<ul class = "nav">
			<li><a href="http://localhost/miguel-exam/category/cours">Cours</a></li>
			<li><a href="#">Atelier</a></li>
			<li><a href="#">Événement</a></li>
			<li><a href="#">Nouvelle</a></li>
		</ul>
		<div class ="site-main" style="display: grid; grid-template-columns:repeat(5,1fr); grid-template-rows:repeat(7, 1fr);"> <!--  grille -->
		<?php
		// while ( have_posts() ) :
		// 	the_post();

		// 	get_template_part( 'template-parts/content', 'page' );

		// 	// If comments are open or we have at least one comment, load up the comment template.
		// 	if ( comments_open() || get_comments_number() ) :
		// 		comments_template();
		// 	endif;

		// endwhile; // End of the loop.

		$args = array(
            "category_name" => "cours",
			"posts_per_page"=> 29,
			"orderby"=> "title",
			"order"=> "ASC"
		);
		$i = 0;
		$query1 = new WP_Query($args);
		while ( $query1->have_posts() ) {   //substr(get_post_field("post_name"), -2)
			$query1->the_post();
			$i++;
			//echo '<h4>' . $i . '.  ' . '<a href=' . get_post_permalink() . '>' . get_the_title() . '</a>' . ' - ' . '<span class="session">' ."session: " . substr(get_the_title(),4,1) . '</span>' . ' - ' . 'domaine - '. substr(get_the_title(),5,1) . '</h4>';
			 

			 for($i = 0; $i<29; $i++){
				$rangee = substr(get_the_title(),4,1); // Représente les rangées (sessions)
				$colonne = substr(get_the_title(),5,1); // Représente les colonnes (domaines)

				switch ($rangee) {

					case 1:
					$rangee=2;
						break;
					case 2:
					$rangee=3;
						break;
					case 3:
					$rangee=4;
						break;
					case 4:
					$rangee=5;
						break;
					case 5:
					$rangee=6;
						break;
					case 6:
					$rangee=7;
						break;
			
					default: $rangee=0;
				}

				switch ($colonne) {
					case 1:
					$colonne=1;
						break;
					case 2:
					$colonne=2;
						break;
					case 3:
					$colonne=3;
						break;
					case 4:
					$colonne=4;
					break;
					case 5:
					$colonne=5;
						break;
			
					default: $colonne=0;
				}
                $gridArea = $rangee ."/". $colonne ;
             }
             
             if ($colonne == 1) {
                $style = "r1";
             }
             if ($colonne == 2) {
                $style = "r2";
             }
             if ($colonne == 3) {
                $style = "r3";
             }
             if ($colonne == 4) {
                $style = "r4";
             }
             if ($colonne == 5) {
                $style = "r5";
             }
             
            echo '<h3 class= '.$style.' style="grid-area:'.$gridArea.'">' . get_the_title() . '</h3>';
            /*echo '<div class =" style= grid-area:' . $gridArea. '">' . '<h3>' . get_the_title() . '</h3>' . '</div>';*/
            
        }
            echo '<h3 style="grid-area:1/1">Environnement</h3>';
            echo '<h3 style="grid-area:1/2">Animation</h3>';
            echo '<h3 style="grid-area:1/3">Design</h3>';
            echo '<h3 style="grid-area:1/4">Programmation</h3>';
            echo '<h3 style="grid-area:1/5">Intégration</h3>';
		?>
		</div> <!--  grille -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
