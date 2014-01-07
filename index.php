<?php
/*
Template Name: Blog Grid
*/
?>

<!-- Using Blog Grid -->

<?php get_header(); ?>
<style type='text/css'>
.excerpt_box, .lower_box {
    -moz-box-sizing: border-box;
	box-sizing: border-box;
    background-color: rgba(20, 20, 20, 0.6);
    color: #eee;
    font-size: 13px;
    padding: 5px;
    position: absolute;
    width: 300px;

    opacity: 0;

}
.excerpt_box a, .lower_box a{
    color: #eee!important;
}
.lower_box .comments{
	display: inline-block;
	float: right;
	width:14px;
	height:18px;
	font-size: 9px;
	line-height: 15px;
	text-align: center;
	background: transparent url('<?php bloginfo('stylesheet_directory'); ?>/img/speech2.png') center center no-repeat;
}
.excerpt_box{
	height:58px;
    top:-58px;
    -webkit-transition: top .25s ease-in-out,opacity 0.75s;
	   -moz-transition: top .25s ease-in-out,opacity 0.75s;
	    -ms-transition: top .25s ease-in-out,opacity 0.75s;
	     -o-transition: top .25s ease-in-out,opacity 0.75s;
	        transition: top .25s ease-in-out,opacity 0.75s;
}
.lower_box{
	height:30px;
	bottom:-30px;
	-webkit-transition: bottom .25s ease-in-out,opacity 0.75s;
	   -moz-transition: bottom .25s ease-in-out,opacity 0.75s;
	    -ms-transition: bottom .25s ease-in-out,opacity 0.75s;
	     -o-transition: bottom .25s ease-in-out,opacity 0.75s;
	        transition: bottom .25s ease-in-out,opacity 0.75s;
}
.pic-box:hover > .excerpt_box{
		top:0!important;
}
.pic-box:hover > .lower_box{
		bottom:0;
}
.pic-box:hover > .excerpt_box,.pic-box:hover > .lower_box{

	-webkit-transition: top .25s ease-in-out,opacity .75s,bottom .25s ease-in-out;
	   -moz-transition: top .25s ease-in-out,opacity .75s,bottom .25s ease-in-out;
	    -ms-transition: top .25s ease-in-out,opacity .75s,bottom .25s ease-in-out;
	     -o-transition: top .25s ease-in-out,opacity .75s,bottom .25s ease-in-out;
	        transition: top .25s ease-in-out,opacity .75s,bottom .25s ease-in-out;
	 opacity:1;      

}
.blog_grid_box div.pic-box{
	display: block;
	    overflow: hidden;
    position: relative;
}
div.pic-box a{
	display: inline-block;
}
.first-col {
    margin-right: 30px;
}
.blog_grid_box {
    float: left;
    height: 400px;
    margin-top: 30px;
    width: 300px;

}
.blog_grid_box img {
    height: 300px !important;
    width: 300px;
    margin-bottom:0!important;
}
.blog_grid_box h2 {
text-align:center;
color:#000;
font-size:14px;
margin-top:0;
}
.blog_grid_box h2:before, .blog_grid_box h2:after{
	content:"";
	width:40%;
	border-top: 1px #bbb solid;
	display: block;
	margin:10px auto;
}
.blog-subheading{
	text-align: center;
	font-weight: normal;
	font-size: 30px;
	margin-bottom: 0;
	border-style: solid none;
	border-width: 1px;
	border-color: #ddd;
	padding: 10px 0;
	clear:both;
}
</style>
<!-- Snarf: using blog_grid.php -->
<?php  include_once 'blog-grid.php'; ?>
<?php get_footer(); ?>