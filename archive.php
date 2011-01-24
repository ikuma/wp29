<?php get_header(); ?>

  <div id="content" class="narrowcolumn">

    <?php if (have_posts()) : ?>

    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
    <?php /* If this is a category archive */ if (is_category()) { ?>
      <h2 class="page-title">Entries in category "<?php single_cat_title(); ?>"</h2>
    <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
      <h2 class="page-title">Entries tagged with "<?php single_tag_title(); ?>"</h2>
    <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
      <h2 class="page-title">Entries in <?php the_time('Y'); ?>/<?php the_time('m'); ?>/<?php the_time('d'); ?>/</h2>
    <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
      <h2 class="page-title">Entries in <?php the_time('Y'); ?>/<?php the_time('m'); ?></h2>
    <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
      <h2 class="page-title">Entries in <?php the_time('Y'); ?></h2>
    <?php /* If this is an author archive */ } elseif (is_author()) { ?>
      <h2 class="page-title">Author Archive</h2>
    <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
      <h2 class="page-title">Blog Archives</h2>
    <?php } ?>

    <div class="navigation">
      <div class="align-left"><?php next_posts_link('<< Older posts') ?></div>
      <div class="align-right"><?php previous_posts_link('Newer posts') ?></div>
    </div>

    <?php while (have_posts()) : the_post(); ?>

    <div class="post hentry" id="post-<?php the_ID(); ?>">
      <h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
      <ul class="post-date">
        <li><a href="<?php echo get_option('home'); ?>/<?php the_time('Y') ?>"><?php the_time('Y') ?></a></li>
        <li><a href="<?php echo get_option('home'); ?>/<?php the_time('Y/m') ?>"><?php the_time('m') ?></a></li>
        <li><a href="<?php echo get_option('home'); ?>/<?php the_time('Y/m/d') ?>"><?php the_time('d') ?></a></li>
      </ul>

      <p class="social-services">
        <a href="http://twitter.com/share?url=<?php the_permalink() ?>&via=june29" class="twitter-share-button">Tweet</a>
        <a href="<?php the_permalink() ?>" class="hatena-bookmark-button" data-hatena-bookmark-title="<?php the_title(); ?>" data-hatena-bookmark-layout="standard" title="このエントリーをはてなブックマークに追加"><img src="http://b.st-hatena.com/images/entry-button/button-only.gif" alt="このエントリーをはてなブックマークに追加" height="24" width="50" style="border: none;" /></a>
        <iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&layout=standard&show_faces=false&width=500&action=like&colorscheme=light" allowtransparency="true" style="border: medium none; overflow: hidden; width: 500px; height: 24px; margin-left: 20px;" frameborder="0" scrolling="no"></iframe>
      </p>

      <div class="entry-content">
        <?php the_content('Read the rest of this entry &raquo;'); ?>
      </div>

      <div class="post-metadata">
        <span class="label">Category</span> <?php the_category(' ') ?>
        <?php the_tags('<span class="label">Tags</span> ', ' ', ''); ?>
      </div>
    </div>
    <?php endwhile; ?>

    <div class="navigation">
      <div class="align-left"><?php next_posts_link('<< Older posts') ?></div>
      <div class="align-right"><?php previous_posts_link('Newer posts') ?></div>
    </div>

    <?php else : ?>

    <h2 class="center">Not Found</h2>
    <?php include (TEMPLATEPATH . '/searchform.php'); ?>
    <?php endif; ?>
  </div>

<?php get_footer(); ?>
