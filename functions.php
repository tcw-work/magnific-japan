<?php

//    管理画面に対してcssとjsを適用する
   function load_custom_wp_admin_style() {
    wp_register_style( 'custom_wp_admin_css', get_stylesheet_directory_uri() . '/admin-style.css', false, '1.0.0' );
    wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );







//
//css表示失敗
//function my_scripts()  {
//
//    // 管理画面では読み込まない
//    if ( !is_admin() ) {
//        // スタイルシートディレクトリーを取得する。
//        $dir = get_stylesheet_directory_uri();
//        // スタイルシートも基本同じように使えます。
//        wp_enqueue_style( 'my-css', $dir.'/style.css' );
//    }
//}
//add_action( 'wp_enqueue_scripts', 'my_scripts' );






/**
 * WordPress標準機能
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support
 */
function my_setup() {
    add_theme_support( 'post-thumbnails' ); /* アイキャッチ */
    // アイキャッチ画像サイズを指定する（横：640px 縦：384）
    // 画像サイズをオーバーした場合は切り抜き
    set_post_thumbnail_size( 790, 480, true );
//    add_image_size( 'rela', 330, 200, true ); //関連記事の時
    add_theme_support( 'automatic-feed-links' ); /* RSSフィード */
    add_theme_support( 'title-tag' ); /* タイトルタグ自動生成 */
    add_theme_support( 'html5', array( /* HTML5のタグで出力 */
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );
}
add_action( 'after_setup_theme', 'my_setup' );


//* メニューの登録
function my_menu_init() {
    register_nav_menus( array(
        'global'  => 'グローバルメニュー',
        'utility' => 'ユーティリティメニュー',
        'drawer'  => 'ドロワーメニュー',
    ) );
}
add_action( 'init', 'my_menu_init' );


//↓これが原因
//wp_nav_menu( array(
//    'theme_location' => 'global',
//) );




/**
 * ウィジェットの登録
 *
 * @codex http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_sidebar
 */
function my_widget_init() {
    register_sidebar( array(
        'name'          => 'サイドバー',
        'id'            => 'sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="widget-title">',
        'after_title'   => '</div>',
    ) );
}
add_action( 'widgets_init', 'my_widget_init' );




function insert_table_of_contents( $the_content ){
    if(is_single()) {  //投稿ページの場合
        $tag = '/^<h[2-6].*?>(.+?)<\/h[2-6]>$/im'; //見出しタグの検索パターン
        if(preg_match_all($tag, $the_content, $tags)) { //本文中に見出しタグが含まれていれば
            $idpattern = '/id *\= *["\'](.+?)["\']/i'; //見出しタグにidが定義されているか検索するパターン
            $table_of_contents = '<div class="table_of_contents"><p class="title">Table of Content</p><ul>';
            $idnum = 1;
            $nest = 0;

            for($i = 0 ; $i < count($tags[0]) ; $i++){
                if( ! preg_match_all($idpattern, $tags[0][$i], $idstr) ){
                    //見出しタグにidが定義されていない場合、「autoid_1」のようなidを自動設定
                    $idstr[1][0] = 'autoid_'.$idnum++; 
                    $the_content = preg_replace( "/".str_replace('/', '\/' ,$tags[0][$i])."/", preg_replace('/(^<h[2-6])/i', '${1} id="' . $idstr[1][0] . '" ' , $tags[0][$i]), $the_content,1);
                }
                //見出しへのリンクを目次に追加。<li>でリスト形式に。
                $table_of_contents .= '<li><a href="#' . $idstr[1][0] . '">' . $tags[1][$i] .'</a>';
            }

            $table_of_contents .= '</ul></div>'; //目次の各タグを閉じる

            if($tags[0][0]){
                //作った目次を、1番目の見出しタグの直前に追加
                $the_content = preg_replace('/(^<h[2-6].*?>.+?<\/h[2-6]>$)/im', $table_of_contents.'${1}', $the_content,1);
            }
        }
    }
    return $the_content;
}

// 記事表示時に「insert_table_of_contents()」を実行する
add_filter('the_content','insert_table_of_contents');


//ショートコード
function and_mark() {
    return "&amp;";
}
add_shortcode('and_mark', 'and_mark');

function percente() {
    return "&#037;";
}
add_shortcode('percente', 'percente');

function gmap_start() {
    return '<div class="gmap">';
}
add_shortcode('gmap_start', 'gmap_start');

function gmap_end() {
    return '</div>';
}
add_shortcode('gmap_end', 'gmap_end');

function hyphen() {
    return "&#045;";
}
add_shortcode('hyphen', 'hyphen');

function angle_braqcket_strat() {
    return "&#060;";
}
add_shortcode('angle_braqcket_strat', 'angle_braqcket_strat');

function angle_braqcket_end() {
    return "&#062;";
}
add_shortcode('angle_braqcket_end', 'angle_braqcket_end');

function parentheses_start() {
    return "&#040;";
}
add_shortcode('parentheses_start', 'parentheses_start');

function parentheses_end() {
    return "&#041;";
}
add_shortcode('parentheses_end', 'parentheses_end');

function slash_bar() {
    return "&#047;";
}
add_shortcode('slash_bar', 'slash_bar');

function under_bar() {
    return "&#095;";
}
add_shortcode('under_bar', 'under_bar');

function vertical_bar() {
    return "&#124;";
}
add_shortcode('vertical_bar', 'vertical_bar');

function single_quotation_start() {
    return "&#145;";
}
add_shortcode('single_quotation_start', 'single_quotation_start');

function single_quotation_end() {
    return "&#146;";
}
add_shortcode('single_quotation_end', 'single_quotation_end');

function double_quotation_start() {
    return "&#147;";
}
add_shortcode('double_quotation_start', 'double_quotation_start');

function double_quotation_end() {
    return "&#148;";
}
add_shortcode('double_quotation_end', 'double_quotation_end');

function circle() {
    return "&#149;";
}
add_shortcode('circle', 'circle');

function copyright() {
    return "&#169;";
}
add_shortcode('copyright', 'copyright');

function at_sign() {
    return "&#064;";
}
add_shortcode('at_sign', 'at_sign');

function question() {
    return "&#063;";
}
add_shortcode('question', 'question');

function sharp() {
    return "&#035;";
}
add_shortcode('sharp', 'sharp');

function exclamation() {
    return "&#033;";
}
add_shortcode('exclamation', 'exclamation');

function colon() {
    return "&#058;";
}
add_shortcode('colon', 'colon');

function semi_colon() {
    return "&#059;";
}
add_shortcode('semi_colon', 'semi_colon');

function lang_attribute_start() {
    return '<span lang="ja">';
}
add_shortcode('lang_attribute_start', 'lang_attribute_start');

function lang_attribute_end() {
    return "</span>";
}
add_shortcode('lang_attribute_end', 'lang_attribute_end');

function bold_attribute_start() {
    return "<b>";
}
add_shortcode('bold_attribute_start', 'bold_attribute_start');

function bold_attribute_end() {
    return "</b>";
}
add_shortcode('bold_attribute_end', 'bold_attribute_end');

function bullet_point() {
    return "･";
}
add_shortcode('bullet_point', 'bullet_point');

function arrow_left() {
    return "&#8592;";
}
add_shortcode('arrow_left', 'arrow_left');

function arrow_top() {
    return "&#8593;";
}
add_shortcode('arrow_top', 'arrow_top');

function arrow_right() {
    return "&#8594;";
}
add_shortcode('arrow_right', 'arrow_right');

function arrow_bottom() {
    return "&#8595;";
}
add_shortcode('arrow_bottom', 'arrow_bottom');


?>



