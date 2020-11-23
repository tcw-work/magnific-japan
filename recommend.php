<!-- 記事下ピックアップ -->

<section class="single-article-recommend">


<?php $args = array(
    //    ↓カテゴリーから呼び出す
//    'numberposts' => 3,//表示する記事数（1なら1記事、5なら5記事表示）
//    'post_type' => 'post',
//    'orderby' => 'rand',//ランダム表示適用（ランダム表示しない場合は削除）
//    'tag' => 'recommend'//追加するタグの名前
    //    'numberposts' => 3,//表示する記事数（1なら1記事、5なら5記事表示）
    //    'post_type' => 'post',
    //    'orderby' => 'rand',//ランダム表示適用（ランダム表示しない場合は削除）
    //    'tag' => 'recommend'//追加するタグの名前
    
//    ↓タグから呼び出す
    'post__not_in' => array($post -> ID),
    'posts_per_page'=> 8,
    'tag__in' => $tag_ID,
    'orderby' => 'rand',
);
$recommend = get_posts($args);
if($recommend) : ?>


   
    <?php foreach($recommend as $post) : setup_postdata( $post ); ?>
    
    <article class="articleList">
    <div class="articleLeft">
        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
            <?php if ( has_post_thumbnail() ): // サムネイルを持っているとき ?>
            <?php echo get_the_post_thumbnail($post->ID, 'thumb100'); //サムネイルを呼び出す?>
            <?php else: // サムネイルを持っていないとき ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/no-image.png" alt="NO IMAGE" title="NO IMAGE" width="100px" />
            <?php endif; ?>
        </a>
    </div>
    
    
    
    <div class="articleRight">
        <div class="add-infor">
            <div class="category" itemprop="keywords">
                <?php
                $categories = get_the_category();
                foreach( $categories as $category ){
                    // 親カテゴリーIDを取得
                    $parent = $category->parent;
                    // 親カテゴリーIDがない場合
                    if( !$parent ){
                        echo '<div><a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a></div>';
                        break;
                    }
                }
                ?>
            </div>
            <time class="date reco-data"  datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
        </div>
        <h4 itemprop="headline"><a itemprop="url" href="<?php the_permalink(); ?>"><?php echo mb_substr($post->post_title, 0, 60).'…'; //記事のタイトル?></a></h4>
        <!--<p><//?php the_content('Read more'); ?></p>-->
    </div>
    </article>
    
    <?php endforeach; ?>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>

</section>
<!--/ 記事下ピックアップ -->


