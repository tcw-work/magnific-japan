
    <?php get_header(); ?>
        <div class="wrap">
            <div class="mainPic">
                <img class="is-pc" src="<?php echo get_template_directory_uri(); ?>/images/main.jpg" alt="">
                <img class="is-sp" src="<?php echo get_template_directory_uri(); ?>/images/sp/main.jpg" alt="">
            </div>
            <!--main-->
            <main class="main" itemscope="itemscope" itemtype="http://schema.org/Blog">
                <div class="main-inner-left">
                    <!--article_start-->
                    <section id="MainLeft" class="article" itemscope itemtype="http://schema.org/BlogPosting" itemref="copyright">
                        <div class="title" itemprop="headline">
                            <h2 itemprop="name"><?php single_cat_title(); ?></h2>
                        </div>
                        <!--articleList_start-->
                        <section class="articleContent">
                            <?php if(have_posts()): while(have_posts()):the_post(); ?>
                            <article class="articleList">
                                <div class="articleLeft">
                                    <a href="<?php the_permalink(); ?>" itemprop="thumbnailUrl">
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
                                                    echo '<div><a href="' . get_category_link( $category->term_id ) . '" itemprop="url">' . $category->name . '</a></div>';
                                                    break;
                                                }
                                            }
                                            ?>
                                        </div>
                                        <time class="date" itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
                                    </div>
                                    <h3 itemprop="headline"><a itemprop="url" href="<?php the_permalink(); ?>"><?php echo mb_substr($post->post_title, 0, 60).'…'; //記事のタイトル?></a></h3>
                                    <!--<p><//?php the_content('Read more'); ?></p>-->
                                </div>
                            </article>
                            <?php endwhile; endif; ?>

                        </section>
                        <!--articleList_end-->
                        <?php get_sidebar(); ?>
                    </section>
                    <!--article_end-->
                </div>
            </main>
            <?php get_footer(); ?>

