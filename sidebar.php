<!--Sidebar_start-->
<section class="Side" itemscope itemtype="http://schema.org/WPSideBar">
    <div class="title is-sp" itemprop="headline">
        <h3 itemprop="name">Keyword</h3>
    </div>
    <div class="SideBar">
        <div class="keyword">
            <div class="KeywordTop">
                <ul>
                    <li  itemprop="headline" class="is-pc cat-title">
                        <h3>Category</h3>
                    </li>
                    <li  itemprop="headline" class="is-sp cat-title">Category</li>
                    <li  itemprop="headline" class="is-pc tag-title">
                        <h3>KeyWord</h3>
                    </li>
                    <li  itemprop="headline" class="is-sp tag-title">KeyWord</li>
                </ul>
            </div>
            <div class="keywordList">
                <!--Keyword.tag-->
                <?php
                // パラメータを指定
                $args = array(
                    // タグ名順で指定
                    'orderby' => 'name',
                    // 昇順で指定
                    'order' => 'ASC'
                );
                $posttags = get_tags( $args );

                if ( $posttags ){
                    shuffle( $posttags );
                    echo ' <ul class="tag-list"> ';
                    foreach( $posttags as $tag ) {
                        echo '<li><a href="'. get_tag_link( $tag->term_id ) . '">' . $tag->name . '</a></li>';
                    }
                    echo ' </ul> ';
                }
                ?>

                <!--Category-->
                <?php
                // パラメータを指定  条件の設定
                $args = array(
                    // カテゴリー内の記事数順で指定
                    'orderby' => 'count',
                    // 降順で指定
                    'order' => 'DSC'
                );
                $categories = get_categories( $args );

                echo ' <ul class="cat-list"> ';
                foreach( $categories as $category ){
                    echo '<li><a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a> </li> ';
                }
                echo ' </ul> ';
                ?>
            </div>
        </div>

        <div class="title is-sp" itemprop="headline">
            <h3 itemprop="name">New Information</h3>
        </div>
        <div class="NewInformation">
            <h3 class="SideTitle is-pc" itemprop="headline">
                <p itemprop="name">New Information</p>
            </h3>
            <div class="facebook">
<!--                <iframe src="https://www.facebook.com/plugins/page.php?locale=en_US&href=https%3A%2F%2Fwww.facebook.com%2FMagnificJapan%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>-->
                <div class="fb-container">
                    <div class="fb-page"
                         data-href="https://www.facebook.com/MagnificJapan/"
                         data-width="500"
                         data-height="600"
                         data-tabs="timeline,events"
                         data-hide-cover="false"
                         data-show-facepile="true"
                         data-small-header="false"
                         data-adapt-container-width="true"
                         >
                    </div>
                </div><!-- fb-container out -->
            </div>
            <div class="sns">
                <ul>
                    <li><a href="https://www.facebook.com/MagnificJapan/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/sns01.gif" alt="" itemprop="image"></a></li>
                    <li><a href="https://www.instagram.com/magnific_japan/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/sns02.gif" alt="" itemprop="image"></a></li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/images/sns03.gif" alt="" itemprop="image"></li>
                </ul>
            </div>
        </div>
    </div>
</section>
