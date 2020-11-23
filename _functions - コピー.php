<!--// スタイルシートの読み込み ------------------------------------------------------------------------->

<?php

//    管理画面に対してcssとjsを適用する
   function load_custom_wp_admin_style() {
    wp_register_style( 'custom_wp_admin_css', get_stylesheet_directory_uri() . '/admin-style.css', false, '1.0.0' );
    wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

?>
<!--この記述でも可能-->
<!--<link rel="stylesheet"  href="<//?php  echo get_template_directory_uri(); ?>/admin-style.css" type="text/css">-->

<link rel="stylesheet"  href="<?php  echo get_template_directory_uri(); ?>/style.css" type="text/css">
<link rel="stylesheet"  href="<?php echo get_template_directory_uri(); ?>/css/reset.css" type="text/css">
<link rel="stylesheet"  href="<?php echo get_template_directory_uri(); ?>/css/swiper.css" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP:700&display=swap" rel="stylesheet">






<?php
class My_Widget extends WP_Widget{
/**
* Widgetを登録する
*/
function __construct() {
parent::__construct(
'my_widget', // Base ID
'Widgetの名前', // Name
array( 'description' => 'Widgetの説明', ) // Args
);
}

/**
* 表側の Widget を出力する（カテゴリーでない原因）
*
* @param array $args      'register_sidebar'で設定した「before_title, after_title, before_widget, after_widget」が入る
* @param array $instance  Widgetの設定項目
*/
public function widget( $args, $instance ) {
$email = $instance['email'];
echo $args['before_widget'];

echo "<p>Email: ${email}</p>";

echo $args['after_widget'];
}

/** Widget管理画面を出力する
*
* @param array $instance 設定項目
* @return string|void
*/
public function form( $instance ){
$email = $instance['email'];
$email_name = $this->get_field_name('email');
$email_id = $this->get_field_id('email');
?>
<p>
    <label for="<?php echo $email_id; ?>">Email:</label>
    <input class="widefat" id="<?php echo $email_id; ?>" name="<?php echo $email_name; ?>" type="text" value="<?php echo esc_attr( $email ); ?>">
</p>
<?php
}

/** 新しい設定データが適切なデータかどうかをチェックする。
     * 必ず$instanceを返す。さもなければ設定データは保存（更新）されない。
     *
     * @param array $new_instance  form()から入力された新しい設定データ
     * @param array $old_instance  前回の設定データ
     * @return array               保存（更新）する設定データ。falseを返すと更新しない。
     */
function update($new_instance, $old_instance) {
    if(!filter_var($new_instance['email'],FILTER_VALIDATE_EMAIL)){
        return false;
    }
    return $new_instance;
}
}

add_action( 'widgets_init', function () {
    register_widget( 'My_Widget' );  //WidgetをWordPressに登録する
    register_sidebar( array(  //「サイドバー」を登録する
        'name'          => 'サイドバー(上部)',
        'id'            => 'my_sidebar',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );
} );
?>

<?php if ( is_active_sidebar( 'my_sidebar' ) ) : ?>
<div>
    <?php dynamic_sidebar( 'my_sidebar' ); ?>
</div><!-- #primary-sidebar -->
<?php endif; ?>
<!--/** Widget管理画面を出力するend-->









<?php

/**
 * WordPress標準機能
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support
 */
function my_setup() {
    add_theme_support( 'post-thumbnails' ); /* アイキャッチ */
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




////カテゴリー反応なし消していい
//function add_taxonomies_to_pages() {
//    register_taxonomy_for_object_type( 'post_tag', 'page' );
//    register_taxonomy_for_object_type( 'category', 'page' );
//}
//add_action( 'init', 'add_taxonomies_to_pages' );
//if ( ! is_admin() ) {
//    add_action( 'pre_get_posts', 'category_and_tag_archives' );
//
//}
//function category_and_tag_archives( $wp_query ) {
//    $my_post_array = array('post','page');
//
//    if ( $wp_query->get( 'category_name' ) || $wp_query->get( 'cat' ) )
//        $wp_query->set( 'post_type', $my_post_array );
//
//    if ( $wp_query->get( 'tag' ) )
//        $wp_query->set( 'post_type', $my_post_array );
//}







/**
 * メニューの登録
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 */
function my_menu_init() {
    register_nav_menus( array(
        'global'  => 'グローバルメニュー',
        'utility' => 'ユーティリティメニュー',
        'drawer'  => 'ドロワーメニュー',
    ) );
}
add_action( 'init', 'my_menu_init' );


wp_nav_menu( array(
    'theme_location' => 'global',
) );



?>








<?//php?>
<!--
   
    // refs.http://webpaprika.com/347.html
    // function.php
    class relative_URI {
    function relative_URI() {
        add_action('get_header', array(&$this, 'get_header'), 1);
        add_action('wp_footer', array(&$this, 'wp_footer'), 99999);
    }
    function replace_relative_URI($content) {
        $home_url = trailingslashit(get_home_url('/'));
        if(strpos('localhost/wp_local_01/') === true){
            return str_replace($home_url, 'http://192.168.11.7/wp_local_01/', $content);
        }
        return $content;
    }
    function get_header(){
        ob_start(array(&$this, 'replace_relative_URI'));
    }
    function wp_footer(){
        ob_end_flush();
    }
}
if (is_apple()) {
    new relative_URI();
}
function is_apple() {
    $useragents = array(
        'iPhone',           // Apple iPhone
        'iPod',             // Apple iPod touch
        'incognito',        // Other iPhone browser
        'Android',         // 1.5+ Android
        'webmate'           // Other iPhone browser
    );
    $pattern = '/'.implode('|', $useragents).'/i';
    return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}

-->










