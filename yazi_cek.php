<?php 
include 'ayar.php'; //Db Bağlantı
$say = $_GET['s'];
$renk = $_GET['r'];
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$loop = new WP_Query(array('post_type' => array ( 'post'), 'posts_per_page' => $say, 'orderby' => 'rand', 'order' => 'DESC', 'paged' => $paged));
        while ( $loop->have_posts() ) : $loop->the_post();
        global $post;
        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail');
        $thumb_url = $thumb[0];
?>
<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo get_the_title(); ?>" <?php if(!empty($renk)){ ?>style="color:#<?php echo $renk;?>;"<?php } ?>><?php echo get_the_title(); ?></a>
<?php endwhile; ?>