
    <?php get_header(); ?>
        <div class="wrap">
            <div class="mainPic">
                <img class="is-pc" src="<?php echo get_template_directory_uri(); ?>/images/main.jpg" alt="">
                <img class="is-sp" src="<?php echo get_template_directory_uri(); ?>/images/sp/main.jpg" alt="">
            </div>
            <!--main-->
            <main class="main" itemscope="itemscope" itemtype="http://schema.org/Blog">
                <div class="main-inner-left">
                    <!--topic_start-->
                    <section class="topics content">
                        <div class="title">
                            <h2 itemprop="headline">Topics</h2>
                        </div>
                        <div class="content-box">
                            <ul>
                                <li>
                                    <a href="/tag/mysterious-place" itemprop="url">
                                        <dl>
                                            <dt class="top-zoom">
                                               <span>
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/topic01_myster-site.jpg" itemprop="image" alt="Mysterious Place">
                                                </span>
                                            </dt>
                                            <dd itemprop="name" class="add-high">Mysterious Place</dd>
                                        </dl>
                                    </a>
                                </li>
                                <li>
                                    <a href="/category/trip" itemprop="url">
                                        <dl>
                                            <dt class="top-zoom">
                                               <span>
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/topic02_sightseeing.jpg" itemprop="image" alt="Trip">
                                                </span>
                                            </dt>
                                            <dd itemprop="name" class="add-high">Trip</dd>
                                        </dl>
                                    </a>
                                </li>
                                <li>
                                    <a href="/category/folklore" itemprop="url">
                                        <dl>
                                            <dt class="top-zoom">
                                               <span>
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/topic03_blog.jpg" itemprop="image" alt="Folklore">
                                                </span>
                                            </dt>
                                            <dd itemprop="name" class="add-high">Folklore</dd>
                                        </dl>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php the_permalink(); ?>">
                                        <dl>
                                            <?php $postslist = get_posts('numberposts=1');
                                            foreach ($postslist as $post) : setup_postdata($post);?>
                                            <dt class="top-zoom">
                                               <span>
                                                <img src="<?php echo get_the_post_thumbnail_url();?>" alt="New Article" class="top-editimg">
                                                </span>
                                            </dt>
                                            <dd itemprop="name" class="add-high">
                                                <?//php the_title(); ?>
                                                New Article
                                            </dd>
                                        </dl>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </section>
                    <!--topic_end-->

                    <!--recommends_start-->
                    <section class="recommend content" itemscope="itemscope" itemtype="http://schema.org/BlogPosting">
                        <div class="title" itemprop="headline">
                            <h2 itemprop="name">Recommended</h2>
                        </div>

                        <div class="content-box" itemprop="articleSection">
                            <ul class="content-top is-pc">
                                <li class="r-01">
                                    <articl>
                                        <a href="/trip/7-interesting-and-attractive-sites-at-chichibu-in-saitama/" itemprop="url">
                                            <dl>
                                                <dt>
                                                    <img class="is-pc" src="<?php echo get_template_directory_uri(); ?>/images/recommend01.jpg" alt="nagatoro" itemprop="thumbnailUrl">
                                                    <img class="is-sp" src="<?php echo get_template_directory_uri(); ?>/images/sp/recommend01.jpg" alt="nagatoro" itemprop="thumbnailUrl">
                                                    <span class="ex-title" itemprop="name">Chichibu</span>
                                                </dt>
                                                <dd itemprop="headline">8 interesting and attractive sites at Chichibu in Saitama</dd>
                                            </dl>
                                        </a>
                                    </articl>
                                </li>
                                <li class="r-02">
                                    <article>
                                        <a href="/trip/nikko-toshogu-4-mysterious-and-interesting-points/" itemprop="url">
                                            <dl class="r-02-in01">
                                                <dt>
                                                    <img class="is-pc" src="<?php echo get_template_directory_uri(); ?>/images/recommend03.jpg" alt="NikkouTousyougu" itemprop="thumbnailUrl">
                                                    <img class="is-sp" src="<?php echo get_template_directory_uri(); ?>/images/sp/recommend03.jpg" alt="NikkouTousyougu" itemprop="thumbnailUrl">
                                                    <span class="ex-title"><nobr>Nikkou Tosyogu</nobr></span>
                                                </dt>
                                                <dd itemprop="headline">4 mysterious and interesting points</dd>
                                            </dl>
                                        </a>
                                    </article>
                                    <article>
                                        <a href="/trip/mishaka-lake-in-nagano-beautiful-mirror-lake-in-japan/" itemprop="url">
                                            <dl class="r-2-top">
                                                <dt>
                                                    <img class="is-pc" src="<?php echo get_template_directory_uri(); ?>/images/recommend02.jpg" alt="misyakaike" itemprop="thumbnailUrl">
                                                    <img class="is-sp" src="<?php echo get_template_directory_uri(); ?>/images/sp/recommend02.jpg" alt="misyakaike" itemprop="thumbnailUrl">
                                                    <span class="ex-title" itemprop="name"><nobr>Misyakaike</nobr></span>
                                                </dt>
                                                <dd itemprop="headline">Mishakaike | beautiful mirror lake in Nagano</dd>
                                            </dl>
                                        </a>
                                    </article>
                                </li>
                            </ul>

                            <ul class="content-bottom is-pc">
                                <li>
                                    <article>
                                        <a href="/folklore/hidari-jingro-the-legendary-craftsman-who-lived-in-300-years-in-japan/" itemprop="url">
                                            <dl>
                                                <dt>
                                                    <img class="is-pc" src="<?php echo get_template_directory_uri(); ?>/images/recommend04.jpg" alt="" itemprop="thumbnailUrl">
                                                    <span class="ex-title" itemprop="name">Hidari Jingoro</span>
                                                </dt>
                                                <dd itemprop="headline">
                                                    <?php
                                                    echo mb_strimwidth("The legendary sculptor who lived in 300 years in Japan", 0, 40, "...");
                                                    ?>
                                                </dd>
                                            </dl>
                                        </a>
                                    </article>
                                </li>
                                <li>
                                    <article>
                                        <a href="/folklore/mysterious-customs-and-traditions-in-japan/" itemprop="url">
                                            <dl>
                                                <dt>
                                                    <img class="is-pc" src="<?php echo get_template_directory_uri(); ?>/images/recommend05.jpg" alt="" itemprop="thumbnailUrl">
                                                    <span class="ex-title" itemprop="name">Mysterious Custom</span>
                                                </dt>
                                                <dd itemprop="headline">
                                                    <?php
                                                    echo mb_strimwidth("6 Mysterious customs and traditions in Japan", 0, 40, "...");
                                                    ?>
                                                </dd>
                                            </dl>
                                        </a>
                                    </article>
                                </li>
                                <li>
                                    <article>
                                        <a href="/folklore/tengu-might-have-existed-in-19th-century-japanese-yokai/" itemprop="url">
                                            <dl>
                                                <dt>
                                                    <img class="is-pc" src="<?php echo get_template_directory_uri(); ?>/images/recommend06.jpg" alt="" itemprop="thumbnailUrl">
                                                    <span class="ex-title" itemprop="name">Yokai</span>
                                                </dt>
                                                <dd itemprop="headline">
                                                    <?php
                                                    echo mb_strimwidth("Tengu might have existed in 19th century", 0, 40, "...");
                                                    ?>
                                                </dd>
                                            </dl>
                                        </a>
                                    </article>
                                </li>
                                <li>
                                    <article>
                                        <a href="/trip/kannons-cave-and-takasaki-byakui-daikannon-trip-in-gunma/" itemprop="url">
                                            <dl>
                                                <dt>
                                                    <img class="is-pc" src="<?php echo get_template_directory_uri(); ?>/images/recommend07.jpg" alt="" itemprop="thumbnailUrl">
                                                    <span class="ex-title" itemprop="name">Takasaki</span>
                                                </dt>
                                                <dd itemprop="headline">
                                                    <?php
                                                    echo mb_strimwidth("Kannon’s cave and Takasaki-Byakui-Daikannon in Gunma", 0, 40, "...");
                                                    ?>
                                                </dd>
                                            </dl>
                                        </a>
                                    </article>
                                </li>
                            </ul>
                        </div>
                        
                        
<!--                        slider-->
                        <style>
                            

                        </style>

                            <div class="slider mypattern is-sp" itemprop="articleSection">
                                    <article>
                                        <a href="/folklore/hidari-jingro-the-legendary-craftsman-who-lived-in-300-years-in-japan/" itemprop="url">
                                            <dl>
                                                <dt><img class="is-sp" src="<?php echo get_template_directory_uri(); ?>/images/sp/recommend04.jpg" alt="" itemprop="thumbnailUrl"></dt>
                                                <dd itemprop="headline"><?php
                                                    echo mb_strimwidth("The legendary craftsman who lived in 300 years in Japan", 0, 91, "...");
                                            ?></dd>
                                            </dl>
                                        </a>
                                    </article>
                                <article>
                                    <a href="/folklore/mysterious-customs-and-traditions-in-japan/" itemprop="url">
                                        <dl>
                                            <dt>
                                                <img class="is-sp" src="<?php echo get_template_directory_uri(); ?>/images/sp/recommend05.jpg" alt="" itemprop="thumbnailUrl"></dt>
                                            <dd itemprop="headline">
                                                <?php
                                                echo mb_strimwidth("6 Mysterious customs and traditions in Japan", 0, 91, "...");
                                                ?></dd>
                                        </dl>
                                    </a>
                                </article>
                                <article>
                                    <a href="/folklore/tengu-might-have-existed-in-19th-century-japanese-yokai/" itemprop="url">
                                        <dl>
                                            <dt>
                                                <img class="is-sp" src="<?php echo get_template_directory_uri(); ?>/images/sp/recommend06.jpg" alt="" itemprop="thumbnailUrl"></dt>
                                            <dd itemprop="headline">
                                                <?php
                                                echo mb_strimwidth("Tengu might have existed in 19th century", 0, 91, "...");
                                                ?>
                                            </dd>
                                        </dl>
                                    </a>
                                </article>
                                <article>
                                    <a href="/trip/kannons-cave-and-takasaki-byakui-daikannon-trip-in-gunma/" itemprop="url">
                                        <dl>
                                            <dt>
                                                <img class="is-sp" src="<?php echo get_template_directory_uri(); ?>/images/sp/recommend07.jpg" alt="" itemprop="image"></dt>
                                            <dd itemprop="headline">
                                                <?php
                                                echo mb_strimwidth("Kannon’s cave and Takasaki-Byakui-Daikannon in Gunma", 0, 91, "...");
                                                ?></dd>
                                        </dl>
                                    </a>
                                </article>
                            </div>
<!--                       slider-->
                    </section>
                    <!--recommends_end-->

                    <!--article_start-->
                    <section id="MainLeft" class="article" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
                        <div class="title" itemprop="headline">
                            <h2 itemprop="name">Article</h2>
                        </div>
                        <!--articleList_start-->
                        <section class="articleContent content">
                            <?php if(have_posts()): while(have_posts()):the_post(); ?>
                            <article class="articleList">
                                <div class="articleLeft" itemprop="thumbnailUrl">
                                    <a href="<?php the_permalink(); ?>" itemprop="url">
                                        <?php 
                                        // アイキャッチ画像が設定されているかチェック
                                        if(has_post_thumbnail()){
                                            // アイキャッチ画像を表示する
                                            the_post_thumbnail();
                                        }else{?>
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/no-image.jpg" width="288px" height="172px">
                                            
                                        <?php } ?>
                                    </a>
                                </div>
                                <div class="articleRight">
                                    <div class="add-infor">
                                        <div class="category">
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
                            <?php
                            the_posts_pagination( array(
                                'prev_text' => '',
                                'next_text' => '',
                                'mid_size' => 3,
                                'screen_reader_text' => 'posts_pagination',
                            ) );
                            ?>
                        </section>
                        <!--articleList_end-->
                        <?php get_sidebar(); ?>
                    </section>
                    <!--article_end-->
                </div>
            </main>
            <?php get_footer(); ?>

