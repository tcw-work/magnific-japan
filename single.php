
<?php get_header(); ?>



<main class="main single">

    <section id="MainLeft" class="article" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
    <!--articleList_start-->
    <section class="articleContent">
        <div class="article-inner">
           <div class="bread">
               <ol>
                   <?php $cat = get_the_category(); ?>
                   <li><a href="<?php echo home_url().'/'; ?>" title="<?php bloginfo('name'); ?>">Home</a> ></li>
                <!--/全てのカテゴリー表示/子カテゴリーが無いときは親のみ表示する-->
                  
<!--
                  ↓これだとカテゴリー表示がランダムになる
                   <//?php
                   $category = get_the_category();
                   if (!empty( $category )) { ?>
                       </?php
                       foreach($category as $cat){
                           echo '<li><a href="' . get_category_link( $cat->cat_ID ) . '">' . $cat->cat_name . '</a> ><li>';
                       } ?>
-->
                       
<!--                       親カテゴリー-->
                   <?php
                       $category = get_the_category();
                   if (!empty( $category )) { ?>
                       <?php
                       if( $category[1] ){
                           echo '<li><a href="' . get_category_link( $category[1]->term_id ) . '">' . $category[1]->name . '</a> ><li>';
                       }
                   ?>
                   
<!--                   子カテゴリー-->
                   <?php
                       if( $category[0] ){
                           echo '<li><a href="' . get_category_link( $category[0]->term_id ) . '">' . $category[0]->name . '</a> ><li>';
                       }
                   ?>
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
                        <div class="add-infor">
                        <time class="date"  datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
                        </div>
                        <!--thumbnails-->
                        <div class="post_thumbnail">
                            <?php 
                            // アイキャッチ画像が設定されているかチェック
                            if(has_post_thumbnail()){
                                // アイキャッチ画像を表示する
                                the_post_thumbnail();
                            }else{
                                // 代替画像を表示する
                                echo '<img src="【画像のURLを記入する】" width="640" height="384" alt="No Image" />';
                            }
                            ?>
                        </div>
                        <!--thumbnails-->
                        
                        <div class="post-article">
                        <?php the_content(); ?>
                        <?php
                        endwhile;
                        endif;
                        ?>
                        </div>
                        
                        <div class="bread">
                            <ol>
                                <!--

<li>&#149;Key Words</li><br>
-->
                                <?php
                                $posttags = get_the_tags();
                                if( $posttags ){
                                    foreach ( $posttags as $tag ) {
                                        echo '<li><a href="' . get_tag_link( $tag->term_id ) . '">#' . $tag->name . '</a></li>';
                                    }
                                }
                                ?>


                            </ol>
                        </div>
                        
                    </div>
                </div>
            </article>
            
            <div class="sns-box">
                <ul>
                    <a href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php echo get_the_title(); ?> / Magnific-Japan" target="_blank" rel="nofollow"><li class="tweet"><span class="icon-twitter"></span>Tweet</li></a>
                    <a href="https://www.facebook.com/share.php?u=<?php the_permalink(); ?>&t=<?php echo get_the_title(); ?>" target="_blank" rel="nofollow"><li class="share"><span class="icon-facebook"></span>Share</li></a>
                </ul>
            </div>
        </div>

        <section>
            <div class="related">
                <div class="title">
                    <h3 itemprop="headline">Related</h3>
                </div>
                <div class="related-block">
                <?php include( TEMPLATEPATH . '/related-entries.php' ); ?>
            </div><!-- #related-entries -->
            </div>
            
            <div class="single-Recommend">
                <div class="title">
                    <h3 itemprop="headline">Recommend</h3>
                </div>
                <div class="related-block">
                    <?php include( TEMPLATEPATH . '/recommend.php' ); ?>
                </div><!-- #related-entries -->
            </div>
        </section>
        
    </section>
    
    <?php get_sidebar(); ?>
    <!--articleList_end-->
</section>

</main>
<?php get_footer(); ?>