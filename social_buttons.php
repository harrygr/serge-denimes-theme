<div id="social_buttons">

<a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="lizziecolman" >Tweet</a>


<!-- <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?php the_permalink(); ?>" layout="button_count" show_faces="false" width="85"></fb:like> -->

<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>

<?php
if (has_post_thumbnail()){ 
$att = wp_get_attachment_image_src( get_post_thumbnail_id());
?>

<a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php echo $att[0]; ?>&amp;description=<?php echo rawurlencode(get_the_title() . " on Serge DeNimes"); ?>" class="pin-it-button" count-layout="horizontal"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>

<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
<?php
}
?>

</div>

