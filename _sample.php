<?php
/*
Template Name: sample
*/
?>

<?php get_header(); ?>
<div class="wrap">
    <!--main-->
    <main class="main" itemscope="itemscope" itemtype="http://schema.org/Blog">
        <div class="main-inner-left">
            <!--article_start-->
            <section id="MainLeft" class="article" itemscope itemtype="http://schema.org/BlogPosting" itemref="copyright">
                <div class="title" itemprop="headline">
                    <h2 itemprop="name"><?php the_title(); ?></h2>
                </div>
                <!--articleList_start-->
                <section class="articleContent">
                    <article class="articleList">
                        <?php while (have_posts()): the_post(); ?>
                        <?php the_content(); ?>
                        <?php endwhile; ?>
                    </article>

                </section>
                <!--articleList_end-->
                <?php get_sidebar(); ?>
            </section>
            <!--article_end-->
        </div>
    </main>
    <?php get_footer(); ?>











<!--
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>sample</title>
    </head>

    <body>

        <h2>問合せ内容</h2>    

        <form action="mailto.php" method="post">

            <table border="1">
                <tr>
                    <td>名前</td>
                    <td><?php echo $_POST["name"]; ?></td>
                </tr>
                <tr>
                    <td>メールアドレス</td>
                    <td><?php echo $_POST["mail"]; ?></td>
                </tr>
                <tr>
                    <td>問い合わせ内容</td>
                    <td><?php echo $_POST["inquiry"]; ?></td>
                </tr>
            </table>

            <input type="submit" value="送信" />
        </form>

    </body>

</html>-->
