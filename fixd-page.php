<?php
/*
Fixd-pahge contact
Template Name: fixd-index

*/
?>
<?php get_header(); ?>



<main class="main single">

<section id="MainLeft" class="article" itemscope itemtype="http://schema.org/BlogPosting" itemref="copyright">
    <!--articleList_start-->
    <section class="articleContent">
        <div class="article-inner">
           <div class="bread">
               <ol>
                   <?php $cat = get_the_category(); ?>
                   <li><a href="<?php echo home_url().'/'; ?>" title="<?php bloginfo('name'); ?>">Home</a> ></li>
                <!--/全てのカテゴリー表示/子カテゴリーが無いときは親のみ表示する-->
                   <?php
                   $category = get_the_category();
                   if (!empty( $category )) { ?>
                   <li>
                       <?php
                       foreach($category as $cat){
                           echo '<a href="' . get_category_link( $cat->cat_ID ) . '">' . $cat->cat_name . '</a> >';
                       } ?>
                   </li>
                   <?php } ?>
               </ol>
           </div>
            <article>
                <div class="articleMain">
                    <div class="articleMain-inner">
                        <?php
                        if ( have_posts() ) : while ( have_posts() ) : the_post();
                        ?>
                        <h1><?php the_title(); ?></h1>
                        <div class="post-article">
                        <?php the_content(); ?>
                        <?php
                        endwhile;
                        endif;
                        ?>
                        </div>
                        
                    </div>
                </div>
            </article>
        </div>
        
    </section>
    
    <?php get_sidebar(); ?>
    <!--articleList_end-->
</section>

</main>
<?php get_footer(); ?>

