<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

  <div id="primary" class="site-content">
    <div id="content" role="main">

      <?php while ( have_posts() ) : the_post(); ?>

        <div itemscope itemtype="<?php echo get_schema_url() ?>">
          <span itemprop="givenName"><?php the_field( 'givenName' ) ?></span>
          <span itemprop="additionalName"><?php the_field( 'additionalName' ) ?></span>
          <span itemprop="familyName"><?php the_field( 'familyName' ) ?></span>
          <span itemprop="honorificPrefix"><?php the_field( 'honorificPrefix' ) ?></span>
          <span itemprop="honorificSuffix"><?php the_field( 'honorificSuffix' ) ?></span>
          <span itemprop="worksFor"><?php the_field( 'worksFor' ) ?></span>
          <span itemprop="address"><?php the_field( 'address' ) ?></span>
          <span itemprop="alumniOf"><?php the_field( 'alumniOf' ) ?></span>
          <span itemprop="award"><?php the_field( 'award' ) ?></span>
          <span itemprop="awards"><?php the_field( 'awards' ) ?></span>
          <span itemprop="birthDate"><?php the_field( 'birthDate' ) ?></span>
          <span itemprop="brand"><?php the_field( 'brand' ) ?></span>
          <span itemprop="children"><?php the_field( 'children' ) ?></span>
          <span itemprop="colleague"><?php the_field( 'colleague' ) ?></span>
          <span itemprop="colleagues"><?php the_field( 'colleagues' ) ?></span>
          <span itemprop="contactPoint"><?php the_field( 'contactPoint' ) ?></span>
          <span itemprop="contactPoints"><?php the_field( 'contactPoints' ) ?></span>
          <span itemprop="deathDate"><?php the_field( 'deathDate' ) ?></span>
          <span itemprop="duns"><?php the_field( 'duns' ) ?></span>
          <span itemprop="email"><?php the_field( 'email' ) ?></span>
          <span itemprop="faxNumber"><?php the_field( 'faxNumber' ) ?></span>
          <span itemprop="follows"><?php the_field( 'follows' ) ?></span>
          <span itemprop="gender"><?php the_field( 'gender' ) ?></span>
          <span itemprop="globalLocationNumber"><?php the_field( 'globalLocationNumber' ) ?></span>
          <span itemprop="homeLocation"><?php the_field( 'homeLocation' ) ?></span>
          <span itemprop="interactionCount"><?php the_field( 'interactionCount' ) ?></span>
          <span itemprop="isicV4"><?php the_field( 'isicV4' ) ?></span>
          <span itemprop="jobTitle"><?php the_field( 'jobTitle' ) ?></span>
          <span itemprop="knows"><?php the_field( 'knows' ) ?></span>
          <span itemprop="makesOffer"><?php the_field( 'makesOffer' ) ?></span>
          <span itemprop="memberOf"><?php the_field( 'memberOf' ) ?></span>
          <span itemprop="naics"><?php the_field( 'naics' ) ?></span>
          <span itemprop="nationality"><?php the_field( 'nationality' ) ?></span>
          <span itemprop="owns"><?php the_field( 'owns' ) ?></span>
          <span itemprop="parent"><?php the_field( 'parent' ) ?></span>
          <span itemprop="parents"><?php the_field( 'parents' ) ?></span>
          <span itemprop="performerIn"><?php the_field( 'performerIn' ) ?></span>
          <span itemprop="relatedTo"><?php the_field( 'relatedTo' ) ?></span>
          <span itemprop="seeks"><?php the_field( 'seeks' ) ?></span>
          <span itemprop="sibling"><?php the_field( 'sibling' ) ?></span>
          <span itemprop="siblings"><?php the_field( 'siblings' ) ?></span>
          <span itemprop="spouse"><?php the_field( 'spouse' ) ?></span>
          <span itemprop="taxID"><?php the_field( 'taxID' ) ?></span>
          <span itemprop="telephone"><?php the_field( 'telephone' ) ?></span>
          <span itemprop="vatID"><?php the_field( 'vatID' ) ?></span>
          <span itemprop="workLocation"><?php the_field( 'workLocation' ) ?></span>
        </div>

        <?php the_field( 'familyname' ) ?>

        <nav class="nav-single">
          <h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
          <span
            class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentytwelve' ) . '</span> %title' ); ?></span>
          <span
            class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentytwelve' ) . '</span>' ); ?></span>
        </nav><!-- .nav-single -->

        <?php comments_template( '', true ); ?>

      <?php endwhile; // end of the loop. ?>

    </div>
    <!-- #content -->
  </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>