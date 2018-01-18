<?
$user_email = APP::Module('DB')->Select(
    APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
    ['email'], 'users',
    [['id', '=', $data['user_id'], PDO::PARAM_INT]]
);

$action_start = strtotime('+17 days', APP::Module('DB')->Select(
    APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
    ['UNIX_TIMESTAMP(cr_date)'], 'tunnels_tags',
    [
        ['user_tunnel_id', '=', $data['id'], PDO::PARAM_INT],
        ['label_id', '=', 'sendmail', PDO::PARAM_STR],
        ['token', '=', '685', PDO::PARAM_STR]
    ]
));

$monthAr = array(
    '01' => 'января',
    '02' => 'февраля',
    '03' => 'марта',
    '04' => 'апреля',
    '05' => 'мая',
    '06' => 'июня',
    '07' => 'июля',
    '08' => 'августа',
    '09' => 'сентября',
    '10'=> 'октября',
    '11'=> 'ноября',
    '12'=> 'декабря'
);
?>
<!DOCTYPE html>
<html lang="ru-RU">
	<head>
<link type='text/css' href='//www.glamurnenko.ru/blog/popup/basic.css' rel='stylesheet' media='screen' />
<script type="text/javascript" src="//www.glamurnenko.ru/blog/popup/jquery-1.3.2.min.js"></script>
<link rel='stylesheet' id='snp_styles_reset-css'  href='//www.glamurnenko.ru/blog/popup/reset.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='fancybox2-css'  href='//www.glamurnenko.ru/blog/popup/jquery.fancybox.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='snp_styles_theme16-css'  href='//www.glamurnenko.ru/blog/popup/theme16.css' type='text/css' media='all' />
<script type="text/javascript" src="//www.glamurnenko.ru/blog/popup/init.js"></script>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="format-detection" content="telephone=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta charset="UTF-8">


	<style type="text/css">
		#fancybox-close{right:-15px;top:-15px}
		div#fancybox-content{border-color:#FFFFFF}
		div#fancybox-title{background-color:#FFFFFF}
		div#fancybox-outer{background-color:#FFFFFF}
		div#fancybox-title-inside{color:#333333}
	</style>

<!-- This site is optimized with the Yoast SEO plugin v3.4.2 - https://yoast.com/wordpress/plugins/seo/ -->
<title>Онлайн Школа Имиджмейкеров Екатерины Маляровой: практика с первого занятия, никакой воды и сильный результат</title>
<link rel="canonical" href="//www.glamurnenko.ru/blog/opredelenie-vashego-cvetotipa/" />
<!-- / Yoast SEO plugin. -->

<link rel='dns-prefetch' href='//fonts.googleapis.com'>
<link rel='dns-prefetch' href='//s.w.org'>
<link rel="alternate" type="application/rss+xml" title="Гламурненько.ру &raquo; Лента" href="//www.glamurnenko.ru/blog/feed/" />
<link rel="alternate" type="application/rss+xml" title="Гламурненько.ру &raquo; Лента комментариев" href="//www.glamurnenko.ru/blog/comments/feed/" />
		<script type="text/javascript">
			window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/2\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/2\/svg\/","svgExt":".svg","source":{"concatemoji":"https:\/\/www.glamurnenko.ru\/blog\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.6"}};
			!function(a,b,c){function d(a){var c,d,e,f,g,h=b.createElement("canvas"),i=h.getContext&&h.getContext("2d"),j=String.fromCharCode;if(!i||!i.fillText)return!1;switch(i.textBaseline="top",i.font="600 32px Arial",a){case"flag":return i.fillText(j(55356,56806,55356,56826),0,0),!(h.toDataURL().length<3e3)&&(i.clearRect(0,0,h.width,h.height),i.fillText(j(55356,57331,65039,8205,55356,57096),0,0),c=h.toDataURL(),i.clearRect(0,0,h.width,h.height),i.fillText(j(55356,57331,55356,57096),0,0),d=h.toDataURL(),c!==d);case"diversity":return i.fillText(j(55356,57221),0,0),e=i.getImageData(16,16,1,1).data,f=e[0]+","+e[1]+","+e[2]+","+e[3],i.fillText(j(55356,57221,55356,57343),0,0),e=i.getImageData(16,16,1,1).data,g=e[0]+","+e[1]+","+e[2]+","+e[3],f!==g;case"simple":return i.fillText(j(55357,56835),0,0),0!==i.getImageData(16,16,1,1).data[0];case"unicode8":return i.fillText(j(55356,57135),0,0),0!==i.getImageData(16,16,1,1).data[0];case"unicode9":return i.fillText(j(55358,56631),0,0),0!==i.getImageData(16,16,1,1).data[0]}return!1}function e(a){var c=b.createElement("script");c.src=a,c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g,h,i;for(i=Array("simple","flag","unicode8","diversity","unicode9"),c.supports={everything:!0,everythingExceptFlag:!0},h=0;h<i.length;h++)c.supports[i[h]]=d(i[h]),c.supports.everything=c.supports.everything&&c.supports[i[h]],"flag"!==i[h]&&(c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&c.supports[i[h]]);c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&!c.supports.flag,c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.everything||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);
		</script>
		<style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
</style>
	<style type="text/css">
	.wp-pagenavi{margin-left:auto !important; margin-right:auto; !important}
	</style>
  <link rel='stylesheet' id='fotorama.css-css'  href='//www.glamurnenko.ru/blog/wp-content/plugins/fotorama/fotorama.css?ver=4.6' type='text/css' media='all' />
<link rel='stylesheet' id='fotorama-wp.css-css'  href='//www.glamurnenko.ru/blog/wp-content/plugins/fotorama/fotorama-wp.css?ver=4.6' type='text/css' media='all' />
<link rel='stylesheet' id='jquery.tipTip-css'  href='//www.glamurnenko.ru/blog/wp-content/plugins/wp-tooltip/js/tipTip.css?ver=1.3' type='text/css' media='all' />
<link rel='stylesheet' id='wp-tooltip-css'  href='//www.glamurnenko.ru/blog/wp-content/plugins/wp-tooltip/wp-tooltip.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='fancybox-css'  href='//www.glamurnenko.ru/blog/wp-content/plugins/fancybox-for-wordpress/fancybox/fancybox.css?ver=4.6' type='text/css' media='all' />
<link rel='stylesheet' id='toc-screen-css'  href='//www.glamurnenko.ru/blog/wp-content/plugins/table-of-contents-plus/screen.min.css?ver=1509' type='text/css' media='all' />
<link rel='stylesheet' id='Tippy-css'  href='//www.glamurnenko.ru/blog/wp-content/plugins/tippy/jquery.tippy.css?ver=4.6' type='text/css' media='all' />
<link rel='stylesheet' id='wpfront-scroll-top-css'  href='//www.glamurnenko.ru/blog/wp-content/plugins/wpfront-scroll-top/css/wpfront-scroll-top.css?ver=1.4.4' type='text/css' media='all' />
<link rel='stylesheet' id='font-roboto-css'  href='//www.glamurnenko.ru/blog/wp-content/themes/metz/css/fonts/font-roboto.css?ver=4.6' type='text/css' media='all' />
<link rel='stylesheet' id='font-arial-css'  href='//www.glamurnenko.ru/blog/wp-content/themes/metz/css/fonts/font-arial.css?ver=4.6' type='text/css' media='all' />
<link rel='stylesheet' id='reset-css'  href='//www.glamurnenko.ru/blog/wp-content/themes/metz/css/reset.css?ver=4.6' type='text/css' media='all' />
<link rel='stylesheet' id='style-css'  href='//www.glamurnenko.ru/blog/wp-content/themes/metz/style.css?ver=4.6' type='text/css' media='all' />
<link rel='stylesheet' id='font-awesome-css'  href='//www.glamurnenko.ru/blog/wp-content/themes/metz/css/font-awesome.min.css?ver=4.3.0' type='text/css' media='all' />
<link rel='stylesheet' id='montserrat-css'  href='//fonts.googleapis.com/css?family=Montserrat&#038;subset=latin&#038;ver=4.6' type='text/css' media='all' />
<link rel='stylesheet' id='font-css'  href='https://fonts.googleapis.com/css?family=Roboto%3A300&#038;subset=latin%2Ccyrillic&#038;ver=4.6' type='text/css' media='all' />
<link rel='stylesheet' id='responsive-css'  href='//www.glamurnenko.ru/blog/wp-content/themes/metz/css/responsive.css?ver=4.6' type='text/css' media='all' />
<link rel='stylesheet' id='slicknav-css'  href='//www.glamurnenko.ru/blog/wp-content/themes/metz/css/slicknav.css?ver=4.6' type='text/css' media='all' />
<link rel='stylesheet' id='adv-spoiler-css'  href='//www.glamurnenko.ru/blog/wp-content/plugins/advanced-spoiler/css/advanced-spoiler.css?ver=2.02' type='text/css' media='all' />
<link rel='stylesheet' id='sphinxStyleSheets-css'  href='//www.glamurnenko.ru/blog/wp-content/plugins/wordpress-sphinx-plugin/templates/sphinxsearch.css?ver=4.6' type='text/css' media='all' />
<link rel='stylesheet' id='wp-pagenavi-style-css'  href='//www.glamurnenko.ru/blog/wp-content/plugins/wp-pagenavi-style/css/css3_gray_glossy.css?ver=1.0' type='text/css' media='all' />
<script type='text/javascript' src='//www.glamurnenko.ru/blog/wp-includes/js/jquery/jquery.js?ver=1.12.4'></script>
<script type='text/javascript' src='//www.glamurnenko.ru/blog/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1'></script>
<script type='text/javascript' src='//www.glamurnenko.ru/blog/wp-content/plugins/fotorama/fotorama.js?ver=4.6'></script>
<script type='text/javascript' src='//www.glamurnenko.ru/blog/wp-content/plugins/fotorama/fotorama-wp.js?ver=4.6'></script>
<script type='text/javascript' src='//www.glamurnenko.ru/blog/wp-content/plugins/q2w3-fixed-widget/js/q2w3-fixed-widget.min.js?ver=4.1'></script>
<script type='text/javascript' src='//www.glamurnenko.ru/blog/wp-content/plugins/wp-tooltip/js/jquery.tipTip.minified.js?ver=1.3'></script>
<script type='text/javascript' src='//www.glamurnenko.ru/blog/wp-content/plugins/wp-tooltip/js/wp-tooltip.js?ver=1.0.0'></script>
<script type='text/javascript' src='//www.glamurnenko.ru/blog/wp-content/plugins/fancybox-for-wordpress/fancybox/jquery.fancybox.js?ver=1.3.4'></script>
<script type='text/javascript' src='//www.glamurnenko.ru/blog/wp-content/plugins/tippy/jquery.tippy.js?ver=6.0.0'></script>
<script type='text/javascript' src='//www.glamurnenko.ru/blog/wp-content/plugins/wpfront-scroll-top/js/wpfront-scroll-top.js?ver=1.4.4'></script>
<link rel='https://api.w.org/' href='//www.glamurnenko.ru/blog/wp-json/' />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="//www.glamurnenko.ru/blog/xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="//www.glamurnenko.ru/blog/wp-includes/wlwmanifest.xml" />
<meta name="generator" content="WordPress 4.6" />
<link rel='shortlink' href='//www.glamurnenko.ru/blog/?p=12736' />
<link rel="alternate" type="application/json+oembed" href="//www.glamurnenko.ru/blog/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fwww.glamurnenko.ru%2Fblog%2Fopredelenie-vashego-cvetotipa%2F" />
<link rel="alternate" type="text/xml+oembed" href="//www.glamurnenko.ru/blog/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fwww.glamurnenko.ru%2Fblog%2Fopredelenie-vashego-cvetotipa%2F&#038;format=xml" />
<script type="text/javascript" src="//www.glamurnenko.ru/blog/wp-content/plugins/audio-player/assets/audio-player.js?ver=2.0.4.6"></script>
<script type="text/javascript">AudioPlayer.setup("//www.glamurnenko.ru/blog/wp-content/plugins/audio-player/assets/player.swf?ver=2.0.4.6", {width:"90%",animation:"yes",encode:"yes",initialvolume:"60",remaining:"yes",noinfo:"no",buffer:"5",checkpolicy:"no",rtl:"no",bg:"E5E5E5",text:"333333",leftbg:"CCCCCC",lefticon:"333333",volslider:"666666",voltrack:"FFFFFF",rightbg:"B4B4B4",rightbghover:"999999",righticon:"333333",righticonhover:"FFFFFF",track:"FFFFFF",loader:"D0BB7A",border:"CCCCCC",tracker:"DDDDDD",skip:"666666",pagebg:"FFFFFF",transparentpagebg:"yes"});</script>

<!-- Fancybox for WordPress -->
<script type="text/javascript">
jQuery(function(){

jQuery.fn.getTitle = function() { // Copy the title of every IMG tag and add it to its parent A so that fancybox can show titles
	var arr = jQuery("a.fancybox");
	jQuery.each(arr, function() {
		var title = jQuery(this).children("img").attr("title");
		jQuery(this).attr('title',title);
	})
}

// Supported file extensions
var thumbnails = jQuery("a:has(img)").not(".nolightbox").filter( function() { return /\.(jpe?g|png|gif|bmp)$/i.test(jQuery(this).attr('href')) });

thumbnails.addClass("fancybox").attr("rel","fancybox").getTitle();
jQuery("a.fancybox").fancybox({
	'cyclic': false,
	'autoScale': true,
	'padding': 0,
	'opacity': true,
	'speedIn': 500,
	'speedOut': 500,
	'changeSpeed': 300,
	'overlayShow': true,
	'overlayOpacity': "0.3",
	'overlayColor': "#666666",
	'titleShow': true,
	'titlePosition': 'inside',
	'enableEscapeButton': true,
	'showCloseButton': true,
	'showNavArrows': true,
	'hideOnOverlayClick': true,
	'hideOnContentClick': false,
	'width': 560,
	'height': 600,
	'transitionIn': "fade",
	'transitionOut': "fade",
	'centerOnScroll': true
});


})
</script>
<!-- END Fancybox for WordPress -->
<link rel='stylesheet' href='//www.glamurnenko.ru/blog/wp-content/plugins/secure-html5-video-player/video-js/video-js.css' type='text/css' />
<link rel='stylesheet' href='//www.glamurnenko.ru/blog/wp-content/plugins/secure-html5-video-player/video-js/skins/tube.css' type='text/css' />
<script src='//www.glamurnenko.ru/blog/wp-content/plugins/secure-html5-video-player/video-js/video.js' type='text/javascript' ></script>
<script type='text/javascript' > VideoJS.setupAllWhenReady(); </script>
<style type="text/css">div#toc_container {width: 50%;}div#toc_container ul li {font-size: 90%;}</style>
            <script type="text/javascript">
                jQuery(document).ready(function() {
                    jQuery('.tippy').tippy({ position: "link", offsetx: 0, offsety: 10, closetext: "X", hidedelay: 700, showdelay: 100, calcpos: "parent", showspeed: 200, hidespeed: 200, showtitle: true, hoverpopup: false, draggable: true, dragheader: true, multitip: false, autoshow: false, showheader: true, showclose: true, htmlentities: false });
                });
            </script>
        	<style type="text/css">
	 .wp-pagenavi
	{
		font-size:12px !important;
	}
	</style>

	<style type="text/css">

		/* General */
		body { background-color: #000000; }
		abbr, pre { background-color: #f3f3f3; }
		abbr.required { background: transparent; }
		table, th, td, pre { border-color: #f3f3f3; }


			body { background: url(//www.glamurnenko.ru/blog/wp-content/uploads/2015/10/fon2.png) top; no-repeat #000 no-repeat; }


			.main-container-outer { max-width: 1120px; }
			.leaderboard-inner { max-width: 1080px; }

				/* */

		/* Misc */
		.filter-bar { background-color: #FFFFFF; }
		.filter-bar-content { color: #000000; font-family: Oranienbaum, serif;}
		.nothing-found { background-color: #FFF; color: #000; }
		.page-with-no-image { color: #000; }
		#googleMap { height: 500px; }
		.leaderboard-inner,
		.leaderboard-inner-afs { background-color: #FFF; }
		/* */

		/* Post Formats */

		article.post { background-color: #FFF; border-color: #000000; border-width: 0px; }
		article .wp-caption p.wp-caption-text { background-color: #FFF; }
		article.post .tag-bar,
		article.post .paging-bar,
		article.post .category-bar,
		article.post .tag-bar a,
		article.post .tag-bar a:visited,
		article.post .category-bar a,
		article.post .category-bar a:visited,
		article.post blockquote,
		.wpcf7-form-control-wrap span,
		.wpcf7-form p,
		.wpcf7-response-output,
		.wpcf7-mail-sent-ok { color: #000000; }
		article.post .chief-hdr,
		article.post .chief-hdr a,
		article.post .chief-hdr a:visited,
		article.post .date-bar,
		article.post .date-bar a,
		article.post .date-bar a:visited { color: #000; }
		.bx-wrapper .bx-pager.bx-default-pager a,
		.bx-wrapper .bx-pager.bx-default-pager a:hover,
		.bx-wrapper .bx-pager.bx-default-pager a.active { background-color: #000; }
		article.post .author-bar,
		article.post div.the-content { color: #000000; }
		article.post .social-bar a,
		article.post .social-bar a:visited { color: #d5b977; }
		article.post blockquote { border-left-color: #9b7d16; }
		article.post .the-content a,
		article.post .the-content a:visited,
		article.post .paging-bar a,
		article.post .paging-bar a:visited,
		var,
		.wpcf7-form .wpcf7-submit { color: #266494; text-decoration: underline;}
		.wpcf7-form .wpcf7-submit:hover { color: #FFF; background-color: #266494; border-color: #266494; }
		.excerpt-teaser { color: #000; }
		article.post .author-bar a,
		article.post .author-bar a:visited { color: #266494; border-bottom: 1px solid; border-bottom-color: #266494; }
		article.post .btnReadMore a,
		article.post .btnReadMore a:visited { background-color: #FFF; border-color: #000; color: #000; }
		article.post .btnReadMore a:hover { background-color: #000; color: #FFF; }
		article.post .post-styleB a,
		article.post .post-styleB a:visited { color: #000; }
		input,
		textarea,
		select,
		.social-bg { background-color: #f3f3f3; color: #999; }
		article.post hr { background-color: #f3f3f3; color: #f3f3f3; }
		article.post a.date-a,
		article.post a.date-a:visited { color: #000000; }
		.social-bar { border: 1px solid #f3f3f3; }
		a .page-navi-btn,
		a .page-navi-btn:visited { background-color: #000; color: #FFF; }
		a .page-navi-btn:hover { background-color: #FFF; color: #000; }
		span.page-numbers.dots,
		span.page-numbers.current,
		.pagenavi a.page-numbers,
		.pagenavi a.page-numbers:visited { color: #000; }
		.pagenavi a.next.page-numbers,
		.pagenavi a.prev.page-numbers { background-color: #000; border-color: #000; color: #FFF; }
		.pagenavi a.next.page-numbers:hover,
		.pagenavi a.prev.page-numbers:hover { background-color: #FFF; color: #000; }


			.zig-zag:after {
				background-color: #dadada;
				display: block;
				bottom: 0px;
				left: 0px;
				width: 100%;
				height: 1px;
			}

			.comments-container.zig-zag:after {
				background-color: #dadada;
			}


		/* */

		/* Related Posts & Post Comments */
		.comments-container { background-color: #FFF; }
		.comments { color: #666; }
		.comment-reply-title,
		.comments .comments-hdr,
		.comment-author-name { color: #000; }
		.rp-a-without-image { background: rgba(235,228,202,1); }
		.related-posts a > div.related-post-item-header-a .rpih-inner-a,
		.related-posts a:visited > div.related-post-item-header-a .rpih-inner-a,
		.related-posts a > div.related-post-item-header-b .rpih-inner-b,
		.related-posts a:visited > div.related-post-item-header-b .rpih-inner-b { background: rgba(235,228,202,1); color: #756c4c; }
		.related-posts a:hover > div.related-post-item-header-a .rpih-inner-a,
		.related-posts a:hover > div.related-post-item-header-b .rpih-inner-b { background: rgba(117,108,76, 1); color: #ebe4ca; }
		.comments .comment-text { border-top: 1px solid #e3e3e3; }
		.form-submit .submit,
		.comments a,
		.comments a:visited { color: #9b7d16; }
		.comments-paging .page-numbers.current,
		.comment-date,
		.comment-awaiting,
		.must-log-in,
		.logged-in-as,
		.comment-input-hdr,
		.comments-num { color: #999; }
		.comments input,
		.comments textarea,
		.comments select { background-color: #f3f3f3; color: #999; }
		.comment-content span.bButton a,
		.comment-content span.bButton a:visited,
		.comment-respond .form-submit .submit { background-color: #FFF; border-color: #000; color: #000; }
		.comment-content span.bButton a:hover,
		.comment-respond .form-submit .submit:hover { background-color: #000; color: #FFF; }
		/* */

		/* Menu & Header */
		.slicknav_menu,
		#sticky-menu-container { background-color: #000; }
		.slicknav_menu .slicknav_icon-bar { background-color: #FFF; }
		.slicknav_menu a,
		.slicknav_menu a:visited { color: #FFF; }
		.slicknav_menu a:hover { color: #6fc4d4; }

		.logo-text a,
		.logo-text a:visited { color: #000000; }

		.header-menu-outer { margin-bottom: 20px; }
		.header-menu-outer a,
		.header-menu-outer a:visited { color: #FFFFFF; }
		.header-menu-outer a:hover { color: #6fc4d4; }

		.site-nav2 a,
		.site-nav2 a:visited { color: #FFF; }
		.site-nav2 a:hover { color: #6fc4d4; }
		.site-nav2 li ul { background-color: #000; }

		/*.site-top-outer { background-color: #000; padding: 0 40px 0 40px; }*/
		.site-logo-container img { display: block; }


		.site-top-outer { display: none; }
		.site-logo-outer { padding-top: 0px; padding-bottom: 40px; }
		.site-logo-container { display: inline-block; }
		.site-menu-outer { width: 100%; font-size: 0; }
		.site-menu-container { display: inline-block; }

		@media all and (min-width: 1000px) {

			.site-top-outer { display: block; }
			.site-logo-outer { padding-bottom: 0px; }

		}


			/*.top-bar-outer { max-width: 100%; }*/
			.leaderboard-inner-afs { max-width: 100%; }

				/* */

		/* Slider Colors */
		.slider-caption { color: #000; }
		.slider-button a,
		article.post .slider-button a,
		.slider-button a:visited,
		article.post .slider-button a:visited { color: #FFF; border-color: #000; background-color: #000; }
		article.post .slider-button a:hover,
		.slider-button a:hover { color: #000; background-color: #FFF; }
		.slide-info-inner { color: #000; }
		.slide-text { background: rgba(255,255,255,0.5); }


			.metz-slider-container { display: block; }

				/* */

		/* Sidebar & Home Widgets */
		.widget-item,
		.textwidget { color: #666; }
		.widget-item a,
		.widget-item a:visited,
		.textwidget a,
		.textwidget a:visited { color: #9b7d16; }
		.widget-item a:hover,
		.widget-item .textwidget a:hover { color: #000; }

		#wp-calendar { border-color: #f3f3f3; color: #666; }
		#wp-calendar caption { background-color: #f3f3f3; color: #999; }
		#wp-calendar tfoot td#prev a:hover,
		#wp-calendar tfoot td#next a:hover { color: #000; }

		.wp-tag-cloud li a,
		.wp-tag-cloud li a:visited { background-color: #9bbba1; border-color: #9bbba1; color: #FFF; }
		.wp-tag-cloud li a:hover { background-color: #FFF; color: #9bbba1; }

		.widget-item input,
		.widget-item textarea,
		.widget-item select { background-color: #f3f3f3; color: #999; }

		.widget-item abbr { background-color: #f3f3f3; }

		.widget-item h2,
		.widget-date-bar,
		.widget-date-bar a,
		.widget-date-bar a:visited,
		.recent-comment-author { color: #000; }

		.widget-item-opt-hdr,
		.widget-date-bar a.date-a,
		.recent-comment-hdr a,
		.recent-comment-hdr a:visited { color: #999; }
		.recent-comment-item { border-bottom-color: rgba(153,153,153, 0.2); }
		.widget-item { background-color: #FFF; }

		.widget-item.zig-zag:after { background-color: #dadada; }

		.woo-p-widget-inner a { color: #000 !important; }
		/* */

		/* Footer */
		.footer-box { background-color: #000; }
		.footer-text { color: #ffffff; }
		.site-footer a,
		.site-footer a:visited { color: #ffffff; }
		.site-footer a:hover { color: #6fc4d4; }

		a.a-top,
		a.a-top:visited { background-color: #000; border-color: #FFF; color: #FFF; }
		a.a-top:hover { background-color: #FFF; color: #000; }

		.widget-item-footer,
		.widget-item-footer .textwidget { color: #e5ecee; }
		.widget-item-footer a,
		.widget-item-footer a:visited,
		.widget-item-footer .textwidget a,
		.widget-item-footer .textwidget a:visited { color: #6fc4d4; }
		.widget-item-footer a:hover,
		.widget-item-footer .textwidget a:hover { color: #FFF; }

		.widget-item-footer #wp-calendar { border-color: #f3f3f3; color: #e5ecee; }
		.widget-item-footer #wp-calendar caption { background-color: #f3f3f3; color: #999; }
		.widget-item-footer #wp-calendar tfoot td#prev a:hover,
		.widget-item-footer #wp-calendar tfoot td#next a:hover { color: #FFF; }

		.widget-item-footer .wp-tag-cloud li a,
		.widget-item-footer .wp-tag-cloud li a:visited { background-color: #e5ecee; border-color: #e5ecee; color: #57818d; }
		.widget-item-footer .wp-tag-cloud li a:hover { background-color: #57818d; color: #e5ecee; }

		.widget-item-footer input,
		.widget-item-footer textarea,
		.widget-item-footer select { background-color: #f3f3f3; color: #999; }

		.widget-item-footer abbr { background-color: #f3f3f3; }

		.widget-item-footer h2,
		.widget-item-footer .widget-date-bar,
		.widget-item-footer .widget-date-bar a,
		.widget-item-footer .widget-date-bar a:visited,
		.widget-item-footer .recent-comment-author { color: #FFF; }

		.widget-item-footer .widget-item-opt-hdr,
		.widget-item-footer .widget-date-bar a.date-a,
		.widget-item-footer .recent-comment-hdr a,
		.widget-item-footer .recent-comment-hdr a { color: #999; }
		.widget-item-footer .recent-comment-item { border-bottom-color: rgba(153,153,153, 0.2); }
		.widget-item-footer { background-color: #000; }

		.widget-item-footer.zig-zag:after { background-color: #000; }


			.site-footer { max-width: 1120px; }

				/* */

		/* UPPERCASE */

		.wp-tag-cloud li,
		.social-widget-button-text,
		.date-bar,
		.tag-bar,
		.category-bar,
		.widget-date-bar,
		.widget-date-bar-b,
		.comment-date,
		.post-password-form input[type="submit"],
		.filter-bar-content,
		a.woocommerce-review-link,
		a.woocommerce-review-link:visited,
		.woocommerce-result-count,
		.button.add_to_cart_button.product_type_variable,
		.button.add_to_cart_button.product_type_simple,
		button.single_add_to_cart_button.button.alt,
		.woocommerce .woocommerce-message a.button,
		.woocommerce .woocommerce-message a.button:visited,
		.woocommerce #review_form #respond .form-submit input.submit,
		ul.products li a.added_to_cart.wc-forward,
		.woocommerce #respond input#submit,
		.woocommerce a.button,
		.woocommerce button.button,
		.woocommerce input.button,
		.posted_in a,
		.posted_in a:visited,
		.tagged_as a,
		.tagged_as a:visited,
		.woocommerce span.onsale,
		.woocommerce a.reset_variations,
		.woocommerce a.reset_variations:visited,
		.woocommerce a.shipping-calculator-button,
		.woocommerce a.shipping-calculator-button:visited,
		.woocommerce a.woocommerce-remove-coupon,
		.woocommerce a.woocommerce-remove-coupon:visited,
		p.stock.out-of-stock,
		p.stock.in-stock,
		.woocommerce a.edit,
		.woocommerce a.edit:visited,
		div.price_slider_amount button,
		.woocommerce div.product .woocommerce-tabs ul.tabs li,
		.woocommerce #reviews #comments ol.commentlist li .comment-text p.meta time[itemprop="datePublished"],
		.woocommerce #respond label,
		.woocommerce p.form-row label,
		.woo-p-widget a.added_to_cart.wc-forward,
		.woo-p-widget .product_type_simple,
		.mc4wp-checkbox-registration_form label,
		.slider-date { text-transform: uppercase; }

				/* */

		/* Woo Commerce */
		.brnhmbx-wc-outer {
			background-color: #FFF;
			color: #000000;
		}

		.brnhmbx-wc-outer h1,
		.brnhmbx-wc-outer h2,
		.brnhmbx-wc-outer h3,
		.star-rating,
		p.stars span a,
		.amount,
		.price ins,
		.products li a h3,
		.woocommerce #reviews #comments ol.commentlist li .comment-text p.meta strong[itemprop="author"] {
			color: #000;
		}

		a.woocommerce-review-link,
		a.woocommerce-review-link:visited,
		.woocommerce-result-count {
			color: #000000;
		}

		.woocommerce .woocommerce-error,
		.woocommerce .woocommerce-info,
		.woocommerce .woocommerce-message {
			background-color: #f3f3f3;
		}

		.button.add_to_cart_button.product_type_variable,
		.button.add_to_cart_button.product_type_simple,
		button.single_add_to_cart_button.button.alt,
		.woocommerce .woocommerce-message a.button,
		.woocommerce .woocommerce-message a.button:visited,
		.woocommerce #review_form #respond .form-submit input.submit,
		ul.products li a.added_to_cart.wc-forward,
		.woo-p-widget a.added_to_cart.wc-forward,
		.woo-p-widget .product_type_simple {
			border-color: #000;
			background-color: #FFF;
			color: #000;
		}

		.woo-p-widget .product_type_simple {
			color: #000 !important;
		}

		.woocommerce #respond input#submit,
		.woocommerce a.button,
		.woocommerce button.button,
		.woocommerce input.button {
			border-color: #000;
			background-color: #FFF !important;
			color: #000 !important;
		}

		.button.add_to_cart_button.product_type_variable:hover,
		.button.add_to_cart_button.product_type_simple:hover,
		button.single_add_to_cart_button.button.alt:hover,
		.woocommerce .woocommerce-message a.button:hover,
		.woocommerce #review_form #respond .form-submit input.submit:hover,
		ul.products li a.added_to_cart.wc-forward:hover,
		.woo-p-widget a.added_to_cart.wc-forward:hover,
		.woo-p-widget .product_type_simple:hover {
			background-color: #000 !important;
			color: #FFF !important;
			opacity: 1;
		}

		.woocommerce #respond input#submit:hover,
		.woocommerce a.button:hover,
		.woocommerce button.button:hover,
		.woocommerce input.button:hover {
			background-color: #000 !important;
			color: #FFF !important;
			opacity: 1;
		}

		.price del,
		a .price del,
		.price del span.amount {
			color: #000 !important;
		}

		div.quantity input.input-text.qty.text {
			border-color: #000;
		}

		.posted_in a,
		.posted_in a:visited,
		.tagged_as a,
		.tagged_as a:visited {
			color: #000000;
		}

		.woocommerce span.onsale {
			background-color: #000;
			color: #FFF;
		}

		.woocommerce a.reset_variations,
		.woocommerce a.reset_variations:visited,
		.woocommerce a.shipping-calculator-button,
		.woocommerce a.shipping-calculator-button:visited,
		.woocommerce a.woocommerce-remove-coupon,
		.woocommerce a.woocommerce-remove-coupon:visited,
		p.stock.out-of-stock,
		p.stock.in-stock,
		.woocommerce a.edit,
		.woocommerce a.edit:visited,
		div.price_slider_amount button {
			color: #9b7d16;
		}

		.woocommerce div.product .woocommerce-tabs ul.tabs:before {
			border-color: #f3f3f3;
		}

		.woocommerce div.product .woocommerce-tabs ul.tabs li {
			background-color: #f3f3f3;
			border-color: #f3f3f3;
		}

		.woocommerce div.product .woocommerce-tabs ul.tabs li a,
		.woocommerce div.product .woocommerce-tabs ul.tabs li a:visited,
		.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover {
			font-weight: normal;
			color: #999;
		}

		.woocommerce div.product .woocommerce-tabs ul.tabs li.active,
		.woocommerce div.product .woocommerce-tabs ul.tabs li.active a:hover {
			background-color: #FFF;
			color: #000;
		}

		.woocommerce #reviews #comments ol.commentlist li .comment-text p.meta time[itemprop="datePublished"],
		.woocommerce #respond label,
		.woocommerce p.form-row label {
			color: #000000;
		}

		.woocommerce #reviews #comments ol.commentlist li .comment-text div.description {
			border-color: #f3f3f3;
		}

		.order-info mark {
			background-color: #f3f3f3;
		}

		.select2-results {
			color: #000000;
		}

		.select2-results .select2-highlighted {
			background-color: #f3f3f3;
			color: #000000;
		}

		.woocommerce-checkout #payment div.payment_box {
			background-color: #FFF;
			color: #000000;
		}

		.woocommerce-checkout #payment div.payment_box:after {
			border: 8px solid #FFF;
			border-right-color: transparent;
			border-left-color: transparent;
			border-top-color: transparent;
		}

		.woocommerce-checkout #payment{
			background: #f3f3f3;
		}

		.woocommerce-message a {
			color: #9b7d16;
		}

		/* Price Filter Widget */
		.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
		.woocommerce .widget_price_filter .ui-slider .ui-slider-range {
			background-color: #9b7d16;
		}

		.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content {
			background-color: #f3f3f3;
		}
		/* */

		/* Mail Chimp */
		.mc4wp-checkbox-registration_form label,
		.mc4wp-form label {
			color: #000000;
		}

		.widget-item .mc4wp-form label {
			color: #999;
		}

		.mc4wp-form input[type="submit"] { color: #9b7d16; }
		.mc4wp-form input[type="submit"]:hover { color: #FFF; background-color: #9b7d16; border-color: #9b7d16; }

		.widget-item .mc4wp-form input[type="submit"] { color: #9b7d16; }
		.widget-item .mc4wp-form input[type="submit"]:hover { color: #FFF; background-color: #9b7d16; border-color: #9b7d16; }

		/* */
article.post .btnReadMore a, article.post .btnReadMore a {
    text-decoration: none;
}
		article.post .article-container h1.chief-hdr, .page-with-no-image {
font-family: Oranienbaum, serif;
text-transform: uppercase;
}
h2.playfair, h1,h2,h3,h4,h5,h6 {
font-family: Oranienbaum, serif;
text-transform: uppercase;
}
.site-nav2 li a {
font-family: Oranienbaum, serif;
}
.slider-header {
font-family: Oranienbaum, serif;
}

.comment-date {
display:none;
}
.top-bar-outer{
margin-bottom: 0px;
}

.top-bar-outer .site-top-outer{
text-align: right;
}
.menu li a:hover {background-position: 0 -25px;}

.row-1-2 article.post .paging-bar {display: none;}

.comment-form{    margin-left: 60px;}

article.post .article-container h1.chief-hdr {
		font-size: 4em;
		line-height: 1em
	}
	.highlight {
    background-color: #ffe867;
    display: inline;
    padding: 7px 8px 2px 7px;
    margin: -7px -8px -2px -7px;
}
    </style>


    <script type='text/javascript' language='Javascript'>
      function s_toggleDisplay(his, me, show, hide) {
        if (his.style.display != 'none') {
          his.style.display = 'none';
          me.innerHTML = show;
					me.className += ' collapsed';
        } else {
          his.style.display = '';
          me.innerHTML = hide;
					me.className = me.className.replace(' collapsed', '');
        }
      }
      </script><!-- wp thread comment 1.4.9.4.002 -->
<style type="text/css" media="screen">
.editComment, .editableComment, .textComment{
	display: inline;
}
.comment-childs{
	padding-top: 10px;
	background-color: white;
}
.thdrpy{
	text-align: right;
}
.chalt{
	background-color: #E2E2E2;
}
#newcomment{
	border:1px dashed #777;width:90%;
}
#newcommentsubmit{
	color:red;
}
.adminreplycomment{
	border:1px dashed #777;
	width:99%;
	margin:4px;
	padding:4px;
}
.mvccls{
	color: #999;
}
article.post div.the-content {
    line-height: 28px;
    text-align: left;
    padding-bottom: 0px;
}
</style>
<link href='https://fonts.googleapis.com/css?family=Oranienbaum&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" id="font-css" href="https://fonts.googleapis.com/css?family=Roboto:300&subset=latin,cyrillic" type="text/css" media="all">


	</head>

<body class="page page-id-12736 page-template-default">
	<div class="hiddenInfo">
    	<span id="mapInfo_Zoom">15</span>
		<span id="mapInfo_coorN">49.0138</span>
		<span id="mapInfo_coorE">8.38624</span>
    	<span id="bxInfo_Controls">arrow</span>
        <span id="bxInfo_Auto">0</span>
        <span id="bxInfo_Controls_Main">arrow</span>
        <span id="bxInfo_Auto_Main">0</span>
        <span id="bxInfo_Pause">4000</span>
        <span id="bxInfo_Infinite">1</span>
        <span id="bxInfo_Random">0</span>
        <span id="bxInfo_Mode">horizontal</span>
        <span id="siteUrl">//www.glamurnenko.ru/blog</span>
        <span id="trigger-sticky-value">300</span>
    </div>

	<!-- Sticky Header -->
    <div id="sticky-menu-container">
    <!-- sticky-menu-inner -->
    <div class="clearfix sticky-menu-inner">

            <div class="table-cell-middle">
				<div class="sticky-logo"><a href="//www.glamurnenko.ru"><img alt="" src="//www.glamurnenko.ru/blog/wp-content/uploads/2015/10/glamurnenko_white_logo2.png"></a></div>
            </div>


        <div class="site-nav2 sticky-extra playfair"><ul id="site-menu-sticky" class="menu">
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8587" style="margin-top: 2px;"><a href="#menu1" style="vertical-align: sub;">ДЛЯ КОГО</a></li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8587" style="margin-top: 2px;"><a href="#menu2" style="vertical-align: sub;">МОЯ ИСТОРИЯ</a></li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8587" style="margin-top: 2px;"><a href="#menu3" style="vertical-align: sub;">ПРОГРАММА</a></li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8590" style="margin-top: 2px;"><a href="#menu4" style="vertical-align: sub;">ЗАПИСАТЬСЯ</a></li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8592" style="margin-top: 2px;"><a href="#menu5" style="vertical-align: sub;">ОТЗЫВЫ</a></li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8593" style="margin-top: 2px;"><a href="#menu6" style="vertical-align: sub;">КОНТАКТЫ</a></li>
  								<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8593"><a href="https://instagram.com/ekaterinamalyarova/" target="_blank" title="Instagram" style="margin-left: 15px;background-image: url('//www.glamurnenko.ru/blog/images/1438557260_inst_4.png');display: block; width: 25px; height: 25px;background-repeat: no-repeat;margin-right: 0px;"></a></li>
								<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8593"><a href="https://www.facebook.com/glamurnenkoru" target="_blank" title="Facebook" style="margin-left: 15px;background-image: url('//www.glamurnenko.ru/blog/images/1438557245_ab_4.png');display: block; width: 25px; height: 25px;background-repeat: no-repeat;margin-right: 0px;"></a></li>
								<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8593"><a href="//vk.com/glamurnenkoru" target="_blank" title="Vkontakte" style="margin-left: 15px;background-image: url('//www.glamurnenko.ru/blog/images/1438423986_vk_3.png');display: block; width: 25px; height: 25px;background-repeat: no-repeat;margin-right: 0px;"></a></li>
								<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8593" style="margin-left: 15px;"><a href="/blog/contacts/" target="_blank" style="vertical-align: sub;">8(800)707-05-13</a></li>
</ul></div>

    </div><!-- /sticky-menu-inner -->
</div>
    <!-- site-container -->
	<div class="site-container">
        <!-- site-container-inner -->
        <div class="clearfix site-container-inner-sidebar">
        	<!-- top-bar-outer -->
			<div class="top-bar-outer main-container-outer clearfix">


                <div class="site-top-outer">
                    <div class="site-top-container clearfix">

											<div class="site-menu-outer">
						<div class="site-menu-container clearfix">
						<div class="site-nav2 playfair">

						<ul id="site-menu" class="menu">
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8587" style="margin-top: 2px;"><a href="#menu1" style="vertical-align: sub;">ДЛЯ КОГО</a></li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8587" style="margin-top: 2px;"><a href="#menu2" style="vertical-align: sub;">МОЯ ИСТОРИЯ</a></li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8587" style="margin-top: 2px;"><a href="#menu3" style="vertical-align: sub;">ПРОГРАММА</a></li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8590" style="margin-top: 2px;"><a href="#menu4" style="vertical-align: sub;">ЗАПИСАТЬСЯ</a></li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8592" style="margin-top: 2px;"><a href="#menu5" style="vertical-align: sub;">ОТЗЫВЫ</a></li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8593" style="margin-top: 2px;"><a href="#menu6" style="vertical-align: sub;">КОНТАКТЫ</a></li>
  								<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8593"><a href="https://instagram.com/ekaterinamalyarova/" target="_blank" title="Instagram" style="margin-left: 15px;background-image: url('//www.glamurnenko.ru/blog/images/1438557260_inst_4.png');display: block; width: 25px; height: 25px;background-repeat: no-repeat;margin-right: 0px;"></a></li>
								<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8593"><a href="https://www.facebook.com/glamurnenkoru" target="_blank" title="Facebook" style="margin-left: 15px;background-image: url('//www.glamurnenko.ru/blog/images/1438557245_ab_4.png');display: block; width: 25px; height: 25px;background-repeat: no-repeat;margin-right: 0px;"></a></li>
								<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8593"><a href="//vk.com/glamurnenkoru" target="_blank" title="Vkontakte" style="margin-left: 15px;background-image: url('//www.glamurnenko.ru/blog/images/1438423986_vk_3.png');display: block; width: 25px; height: 25px;background-repeat: no-repeat;margin-right: 0px;"></a></li>
								<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8593" style="margin-left: 15px;"><a href="/blog/contacts/" target="_blank" style="vertical-align: sub;">8(800)707-05-13</a></li>
						</ul>
						</div></div></div>
					</div>
                </div>


					<div class="menu-phone">
						<a href="//www.glamurnenko.ru/" class="logo-main clearfix">
							<img src="//www.glamurnenko.ru/blog/wp-content/themes/metz/img/logo-new.png">
							<span>Обучаем имиджу <br/> с 2005 года</span>
						</a>
						<div id="touch-menu"></div>
					</div>
					<div class="mission">
						<h3>НАША МИССИЯ:</h3>
						<a href="/blog/million/" target="_self">«МИЛЛИОН КРАСИВО ОДЕТЫХ ЖЕНЩИН»</a>
					</div>




			</div><!-- /top-bar-outer -->


            <!-- main-container-outer -->
            <div class="clearfix main-container-outer sticky-header" style="padding-top: 200px;">



                <!-- main-container -->
                <div class="clearfix main-container-sidebar" style="padding-right: 0px;">
                    <!-- site-content -->
                    <div class="clearfix site-content-sidebar">





<script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
<script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
			<div>

				<article class="post post-page zig-zag clearfix">

					<div class="clearfix article-outer-sidebar">
						<div class="article-inner" style="">
							<div class="article-container clearfix">

                            	<div class="fs40 playfair page-with-no-image">Онлайн Школа Имиджмейкеров Екатерины Маляровой: практика с первого занятия, никакой воды и сильный результат</div>


							</div>
						</div>
					</div>
					<div id="menu4" class="clearfix article-outer-sidebar" style="padding-bottom: 0px;padding-top: 50px;">
						<div class="article-inner" style="">
							<div class="article-container clearfix">

                            	<div class="fs40 playfair page-with-no-image" style="padding-bottom: 0px; text-align: left;">Старт нового потока: <?= date('j', $action_start) . ' ' . $monthAr[date('m', $action_start)] ?></div>


							</div>
						</div>
					</div>
					<div class="clearfix article-outer-sidebar">
						<div class="article-inner">
							<div class="article-container clearfix">
								<div class="fs16 arial the-content">
<p>Стандартная цена: <strike>49 900 рублей</strike><br/>
Скидка для ранних участников: 20 000 рублей<br/>
Ваша цена: 29 900 рублей<br/>
<br/>
Запишитесь в предварительный список, чтобы получить скидку и успеть записаться на новый поток</p>
				</div>

							</div>
						</div>
					</div>
                                    
                                    
<?
if (APP::Module('DB')->Select(
    APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
    ['COUNT(id)'], 'tunnels_tags',
    [
        ['user_tunnel_id', '=', $data['id'], PDO::PARAM_INT],
        ['label_id', '=', 'preentry', PDO::PARAM_STR]
    ]
)) {
    ?>
    <center>			<div class="bl_name"><span style="    font-size: 22px;
    border: 3px dashed #ffe867;
    padding: 10px;
    margin: 10px 210px;
    display: block;">
				Вы уже в списке на получение скидки
						</span></div></center>
    <?
} else { 
    ?>
<center><iframe style="width: 700px; height: 580px; border: 0px solid #dddddd ;" src="<?= APP::Module('Routing')->root ?>products/imageschool-new/preentry/form?email=<?= $user_email ?>&user_tunnel_id=<?= $data['id'] ?>&user_id=<?=$data['user_id']?>" frameborder="0" scrolling="no" name="frame1"></iframe></center>
    <?
}
?>                                      
                                    
					



<div class="clearfix article-outer-sidebar">
						<div class="article-inner">
							<div class="article-container clearfix">
								<div class="fs16 arial the-content">
<p><span class="highlight" style="font-weight:900;font-size: 18px;">Онлайн-обучение из любой точки мира.</span><br/>
Вы занимаетесь в своем темпе, не ждёте группу и не стоите в пробках по пути на занятия. Вы ничего не пропустите, потому что у вас всегда есть доступ к записям, которое можете слушать сколько угодно раз.
<br/><br/>
<span class="highlight" style="font-weight:900;font-size: 18px;">Я лично проверяю ваши работы и домашние задания.</span><br/>
И комментирую их голосом. Пример такого комментария будет ниже на этой странице. Мой опыт позволит вам избежать сотни неочевидных ошибок начинающих и получить максимально быстро тот результат, за которым вы пришли.
<br/><br/>
<span class="highlight" style="font-weight:900;font-size: 18px;">Я одеваю клиентов с 2007 года.</span><br/>
Мои ученики одевают клиентов, работают стилистами самостоятельно или в моей команде. Если вы хотите вкусно одевать себя и других - добро пожаловать!</p>
				</div>

							</div>
						</div>
					</div>
					<br/><br/>
<br/><br/>
<img src="https://www.glamurnenko.ru/blog/images/TSV_3258.jpg" style="border-width:0;width:208px;height:auto;margin-right:5px;"><img src="https://www.glamurnenko.ru/blog/images/TSV_2754.jpg" style="border-width:0;width:208px;height:auto;margin-right:5px;"><img src="https://www.glamurnenko.ru/blog/images/TSV_2891.jpg" style="border-width:0;width:208px;height:auto;margin-right:5px;"><img src="https://www.glamurnenko.ru/blog/images/TSV_3020.jpg" style="border-width:0;width:208px;height:auto;margin-right:5px;"><img src="https://www.glamurnenko.ru/blog/images/TSV_2696.jpg" style="border-width:0;width:208px;height:auto;"><div style="margin: 0 5% 0 5%;width: 90%;color: #888888;font-style: italic;font-size: 13px;text-align: center;line-height: 1.5;"><p class="text" style="padding-top:0px;padding-bottom:0px;padding-right:0px;padding-left:0px;font-family:Helvetica,Arial,sans-serif;font-size:12px;font-weight:normal;line-height:22px;Margin:1em 0px;margin-top: 0px;">Это я &mdash; Екатерина Малярова, стилист-имиджмейкер. У меня было свыше 500 клиентов на личные услуги. Одевала клиентов на красную ковровую дорожку, на экономический форум в Санкт-Петербурге, на встречу с президентом. Хочу передать вам свои знания и навыки в Школе Имиджмейкеров</p></div>
<div id="menu1" class="clearfix article-outer-sidebar" style="padding-bottom: 0px;padding-top: 50px;">
						<div class="article-inner" style="">
							<div class="article-container clearfix">

															<div class="fs40 playfair page-with-no-image" style="padding-bottom: 0px; text-align: left;">Выбирайте Школу Имиджмейкеров, если:</div>


							</div>
						</div>
					</div>
					<div class="clearfix article-outer-sidebar" style="padding-bottom: 0px;padding-top: 50px;">
						<div class="article-inner" style="">
							<div class="article-container clearfix">

															<div class="fs40 playfair page-with-no-image" style="padding-bottom: 0px; text-align: left;font-size: 2.5em;">1. Вы хотите быть профи в собственном стиле и имидже</div>


							</div>
						</div>
					</div>
					<div class="clearfix article-outer-sidebar">
						<div class="article-inner">
							<div class="article-container clearfix">
								<div class="fs16 arial the-content">
<p>Вы до нюансов разберетесь в собственном стиле и будете создавать его без помощи специалистов. Вы будете разной и при этом с индивидуальным стилем.
<br/><br/>
<span class="highlight"><strong>Если человек плохо одет, это показывает его внутренние конфликты.</strong></span>
<br/><br/>
Хотите, решайте их долго с помощью психолога &mdash; это подход &laquo;изнутри наружу&raquo;.
<br/><br/>
А хотите &mdash; действуйте &laquo;снаружи-внутрь&raquo;. Это когда правильно подобранный гардероб изменяет отношение окружающих к вам. Меняется и ваше поведение и принятие себя. А вслед за этим отваливаются психологические проблемы из разряда &laquo;я некрасивая&raquo;, &laquo;я недостойная&raquo;, &laquo;я никому не нравлюсь&raquo;, &laquo;я неинтересная&raquo; и т.д.
<br/><br/>
Имидж &mdash; это инструмент, который поможет решить вопросы в отношениях, карьере, знакомствах и дружбе, принятии себя.
<br/><br/>
А еще вы можете помогать со стилем близким, друзьям и знакомым. И ваш совет будет отличаться от обычных &laquo;советов друзей&raquo;, потому что будет профессиональным. </p>
</p>
				</div>

							</div>
						</div>
					</div>

					<div>
										<blockquote style=""><img src="//www.glamurnenko.ru/blog/images/garlant.png" alt="" style="
											float: left;
											margin: 40px 0px 0px 0px;
									"><p style="text-align:left;margin-left:140px;margin-top: 40px;"><em>Я почувствовала себя привлекательной молодой женщиной. Я вышла из кризиса, в котором находилась после того, как родилась моя дочка. Я думаю, что если бы я не нуждалась в деньгах, я бы делала это бесплатно, потому что это такое благодарное и прекрасное дело – помогать женщинам найти путь к себе настоящей, чувствовать себя привлекательной, любоваться своим отражением в зеркале.
<br/><br/>Татьяна Гарлант</em></p>
</blockquote></div>




					<div class="clearfix article-outer-sidebar" style="padding-bottom: 0px;padding-top: 50px;">
						<div class="article-inner" style="">
							<div class="article-container clearfix">

															<div class="fs40 playfair page-with-no-image" style="padding-bottom: 0px; text-align: left;font-size: 2.5em;">2. Вы хотите сменить работу и стать имиджмейкером</div>


							</div>
						</div>
					</div>
					<div class="clearfix article-outer-sidebar">
						<div class="article-inner">
							<div class="article-container clearfix">
								<div class="fs16 arial the-content">
<p>Вы сможете зарабатывать, предоставляя услуги стилиста. И в Школе Имиджмейкеров мы отдельно разбираем как привлекать клиентов и работать с ними.
<br/><br/>
<span class="highlight">В работе имиджмейкера есть плюсы и минусы. Я должна их упомянуть, прежде, чем вы примите решение.</span>
<br/><br/>
<strong>Плюсы:</strong></p>
<p style="padding-left: 70px;">
&ndash; Вы свободны распроряжаться собой и своим временем. Вы сами выбираете когда работаете, а когда отдыхаете и едете в отпуск. Вы можете вставать к обеду, а шоппинг затягивать до закрытия торговых центров. Или шоппиться всю ночь на акциях &laquo;Ночь шоппинга&raquo;
<br/><br/>
&ndash; Вам нравится то, чем вы занимаетесь. Ваше воскресенье больше не &laquo;отравлено понедельником&raquo;. Вы чувствуете смысл своей работы и видите результаты.
<br/><br/>
&ndash; Вы просто вынуждены быть красивой :) Вы ведь пример для клиентов.
<br/><br/>
&ndash; Вы делаете красивыми других женщин. Это как наряжать кукол в детстве. Только теперь вам за это платят.
<br/><br/>
&ndash; Нет рутины. Каждый день новые клиенты, новые характеры, разные магазины.
<br/><br/>
</p>
<p>
<strong>Минусы:</strong>
</p>
<p style="padding-left: 70px;">
&ndash; Вам придется много работать. Изучать и применять, применять, применять. Когда работа нелюбимая это тяготит. Если вы &laquo;горите&raquo; модой &mdash; вам будет это все в радость.
<br/><br/>
&ndash; Ненормированный рабочий день. Я не уйду с шоппинга, пока работа не сделана. Если у меня простуда, я не отменяю шоппинг, потому что следующее свободное место у меня через месяц, а клиент все сделал, чтобы прийти сегодня. К вам приходят за результатом и вы его даете.
<br/><br/>
&ndash; Необходимо следить за собой. Постоянно интересно выглядеть. Быть полной энтузиазма. Потому что клиенты привязываются еще и к эмоциям, которые вы даете. </p>
				</div>

							</div>
						</div>
					</div>
					<div>
										<blockquote style=""><img src="//www.glamurnenko.ru/blog/images/kalinichenko.png" alt="" style="
											float: left;
											margin: 40px 0px 0px 0px;
									"><p style="text-align:left;margin-left:140px;margin-top: 40px;"><em>Сейчас у меня ощущение, что я делаю то, что надо, и двигаюсь туда, куда надо. Я вижу реакцию людей, которые с моей помощью преобразились. И это энергетически очень классно возвращается.
<br/><br/>
Мало того, что от них, так еще и от реакции окружающих: «Ой! Как так возможно?».
<br/><br/>
Опять же, кайф от разрушения вот этого вот мифа, что обязательно надо в дорогих брендах одеваться, чтобы всех покорить. В общем, через какие-то обыкновенные действия ты доносишь до людей, что это реально возможно, каждый может быть интересным, просто прибегая к услугам профессионала.
<br/><br/>
Оксана Калиниченко<br/>
<a href="https://www.facebook.com/profile.php?id=100004744573144" target="_blank">https://www.facebook.com/profile.php?id=100004744573144</a></em></p>
</blockquote></div>
					<div class="clearfix article-outer-sidebar" style="padding-bottom: 0px;padding-top: 50px;">
						<div class="article-inner" style="">
							<div class="article-container clearfix">

															<div class="fs40 playfair page-with-no-image" style="padding-bottom: 0px; text-align: left;font-size: 2.5em;">3. Вы хотите дополнить свою работу</div>


							</div>
						</div>
					</div>
					<div class="clearfix article-outer-sidebar">
						<div class="article-inner">
							<div class="article-container clearfix">
								<div class="fs16 arial the-content">
<p>Вы уже работаете в какой-нибудь бьюти / fashion / модной сфере и хотите перейти на новый уровень.
<br/><br/>
Я постараюсь в этом вам помочь.
<br/><br/>
Среди моих учеников: швеи, портные, стилисты-парикмахеры, владельцы салонов красоты, байеры, дизайнеры, визажисты.
<br/><br/>
Каждый находит для себя что-то новое, что поднимает его над конкурентами.</p>
				</div>

							</div>
						</div>
					</div>
					<div>
										<blockquote style=""><img src="//www.glamurnenko.ru/blog/images/fomina.png" alt="" style="
											float: left;
											margin: 40px 0px 0px 0px;
									"><p style="text-align:left;margin-left:140px;margin-top: 40px;"><em>Как только одна моя клиентка, которой я помогала с интерьерами, узнала, что я учусь на имиджмейкера, то попросила помочь ей выбрать платье на торжественный вечер и оплатила мое время. Потом я разбирала ее гардероб. Помню свое волнение, столько вещей я в жизни не видела)), устала и, по-моему, ее вещи мне снились целую неделю!
<br/><br/>
Тут же одна из моих подруг попросила ей помочь с выбором осеннего гардероба, а другая заинтересовалась своим цветотипом — вот и понеслось!
<br/><br/>
Успехи были в том, что у меня уже в процессе обучения появились клиентки. Настоящие. И я заработала гораздо больше, чем потратила на учебу.
<br/><br/>
Вита Фомина<br/>
<a href="https://www.facebook.com/fomina.vita" target="_blank">https://www.facebook.com/fomina.vita</a></em></p>
</blockquote></div>
					<div class="clearfix article-outer-sidebar" style="padding-bottom: 0px;padding-top: 50px;">
						<div class="article-inner" style="">
							<div class="article-container clearfix">

															<div class="fs40 playfair page-with-no-image" style="padding-bottom: 0px; text-align: left;font-size: 2.5em;">4. Вы уже имиджмейкер</div>


							</div>
						</div>
					</div>
					<div class="clearfix article-outer-sidebar">
						<div class="article-inner">
							<div class="article-container clearfix">
								<div class="fs16 arial the-content">
<p>Но чувствуете, что застряли в развитии. Или просто хотите развиваться еще больше.
<br/><br/>
Для вас будут особенно полезны практические фишки: наработки с шоппингов, как общаться с клиентами, создание своего бизнеса, выстраивание линейки продуктов, привлечение клиентов, работа с подписной базой, установление статуса эксперта, маркетинг. </p>
				</div>

							</div>
						</div>
					</div>
					<div>
										<blockquote style=""><img src="//www.glamurnenko.ru/blog/images/melyakova.png" alt="" style="
											float: left;
											margin: 40px 0px 0px 0px;
									"><p style="text-align:left;margin-left:140px;margin-top: 40px;"><em>Что касается обучения, то теория имиджа, конечно, мне давалась легко, потому что, во-первых, это было уже не первое мое обучение, во-вторых, я уже начала практиковаться с клиентами. Катина подача расширила мой профессиональный кругозор, и в мою копилку легло еще очень много полезных знаний.
<br/><br/>
Но самым полезным для меня было именно общение с клиентами. Катя этому уделяет в своей школе очень много внимания: и психологическим моментам, и дает буквально разжеванный алгоритм, как провести первую встречу. Поскольку какие-то клиенты уже были, то имелась возможность тут же на них отрабатывать алгоритмы, видеть, как это все работает.
<br/><br/>
Екатерина Мелякова<br/>
<a href="https://www.facebook.com/createimageru/" target="_blank">https://www.facebook.com/createimageru/</a></em></p>
</blockquote></div>
					<div class="clearfix article-outer-sidebar" style="padding-bottom: 0px;padding-top: 50px;">
						<div class="article-inner" style="">
							<div class="article-container clearfix">

                            	<div class="fs40 playfair page-with-no-image" style="padding-bottom: 0px; text-align: left;">Кто такой стилист-имиджмейкер и что он делает?</div>


							</div>
						</div>
					</div>
					<div class="clearfix article-outer-sidebar">
						<div class="article-inner">
							<div class="article-container clearfix">
								<div class="fs16 arial the-content">
<p>Я называю себя стилистом-имиджмейкером.
<br/><br/>
Мои коллеги называют себя по-разному: стилистами, шопперами, консультантами по стилю, имидж-экспертами и другими похожими названиями.
<br/><br/>
Стандартов названия и профессии нет. Я лучше расскажу, чем именно мы занимаемся и для кого это всё.</p>
				</div>

							</div>
						</div>
					</div>
					<div class="clearfix article-outer-sidebar" style="padding-bottom: 0px;padding-top: 50px;">
						<div class="article-inner" style="">
							<div class="article-container clearfix">

                            	<div class="fs40 playfair page-with-no-image" style="padding-bottom: 0px; text-align: left;">Мы со стилистами команды хорошо делаем следующее:</div>


							</div>
						</div>
					</div>
					<div class="clearfix article-outer-sidebar">
						<div class="article-inner">
							<div class="article-container clearfix">
								<div class="fs16 arial the-content">
<p>– Консультация по цветам. Показываем какие цвета подходят клиенту и как их правильно сочетать в одежде.
<br/><br/>
– Консультация по фигуре. Определяем фигуру человека и показываем как её корректировать с помощью одежды.
<br/><br/>
– Консультация по стилям. Выбираем стили, которые подходят клиенту.
<br/><br/>
– Разбор гардероба. Перебираем текущий гардероб, составляем новые комплекты, рекомендуем что выбросить и что докупить.
<br/><br/>
– Шоппинг-сопровождение. Ходим по магазинам и подбираем готовый вкусный гардероб с максимумом комплектов. В Москве, Милане, Дубаи. Моя любимая услуга, потому что клиент максимально быстро преображается.
<br/><br/>
– Проводим семинары и тренинги вживую и через интернет. Как для компаний, так и для любых желающих.</p>
				</div>

							</div>
						</div>
					</div>
					<img src="//www.glamurnenko.ru/blog/images/52-53-may.jpg" alt="2-6" class="aligncenter size-full wp-image-1378">
					<div style="margin: 0 5% 0 5%;width: 90%;color: #888888;font-style: italic;font-size: 13px;text-align: center;line-height: 1.5;"><p class="text" style="padding-top:0px;padding-bottom:0px;padding-right:0px;padding-left:0px;font-family:Helvetica,Arial,sans-serif;font-size:12px;font-weight:normal;line-height:22px;Margin:1em 0px;margin-top: 0px;">На изображении мой ежемесячный отчет с шоппинга за прошедший месяц. Это один из вариантов обучающих услуг, которые мы предлагаем</p></div>
					<div class="clearfix article-outer-sidebar">
						<div class="article-inner">
							<div class="article-container clearfix">
								<div class="fs16 arial the-content">
									<img src="https://www.glamurnenko.ru/images/letter/kote.png" style="float:right;margin:10px;;width:180px;margin-bottom: 280px;margin-top: 0px;" />
<p><span style="font-weight:900;font-size: 18px;">Голос скептика («сомневающийся котэ»):</span> <br/>
<em>– Чтобы это делать нужен врожденный талант и художественный вкус?
<br/><br/>
– Чтобы этому научиться, не нужно таланта. В стиле и имидже есть свои правила и законы.
<br/><br/>
Ваш вкус можно воспитать с помощью «насмотренности». Это когда вы сотни успешных образов раскладываете по этим правилам и законам. Примерно на сотом образе у вас начнет получаться это автоматически. На тысячном у вас появится «хороший вкус» )
<br/><br/>
В моей Школе Имиджмейкеров на каждую область знаний есть задания, которые вы выполняете и прокачиваете нужный навык и нарабатываете опыт, понимание и насмотренность.</em></p>
				</div>

							</div>
						</div>
					</div>
					<div class="clearfix article-outer-sidebar" style="padding-bottom: 0px;padding-top: 50px;">
						<div class="article-inner" style="">
							<div class="article-container clearfix">

                            	<div class="fs40 playfair page-with-no-image" style="padding-bottom: 0px; text-align: left;">Чем мы не занимаемся:</div>


							</div>
						</div>
					</div>
					<div class="clearfix article-outer-sidebar">
						<div class="article-inner">
							<div class="article-container clearfix">
								<div class="fs16 arial the-content">
<p>– не стрижем, не делаем прически и макияж;
<br/><br/>
– не оказываем психологическую помощь;
<br/><br/>
– не занимаемся этикетом и манерами;
<br/><br/>
– не шьем и не создаем дизайн одежды;
<br/><br/>
– не закупаем ассортиментный ряд для магазинов.
<br/><br/>
При необходимости мы посылаем к соответствующим специалистам. Хотя вы, при желании, можете совмещать все это, если у вас есть эти навыки.
<br/><br/>
А еще как стилист вы можете работать в журналах и стилизовать съемки. Или работать консультантами в магазинах.</p>
				</div>

							</div>
						</div>
					</div>
					<div class="clearfix article-outer-sidebar" style="padding-bottom: 0px;padding-top: 50px;">
						<div class="article-inner" style="">
							<div class="article-container clearfix">

                            	<div class="fs40 playfair page-with-no-image" style="padding-bottom: 20px; text-align: left;">Для кого наши услуги?</div>


							</div>
						</div>
					</div>
					<img src="https://www.glamurnenko.ru/blog/images/b17290f3b.png" alt="2-6" class="aligncenter size-full wp-image-1378">
					<div style="margin: 0 5% 0 5%;width: 90%;color: #888888;font-style: italic;font-size: 13px;text-align: center;line-height: 1.5;">
                  <p class="text" style="padding-top:0px;padding-bottom:0px;padding-right:0px;padding-left:0px;font-family:Helvetica,Arial,sans-serif;font-size:12px;font-weight:normal;line-height:22px;Margin:1em 0px;margin-top: 0px;">Скриншот из моего портфолио с клиентами</p></div>
					<div class="clearfix article-outer-sidebar">
						<div class="article-inner">
							<div class="article-container clearfix">
								<div class="fs16 arial the-content">
<p>Есть миф, что нашими услугами пользуются только звезды. Совсем не обязательно.
<br/><br/>
Наши услуги для женщин, которые ценят свое время и знают как внешний вид влияет на качество жизни (самовосприятие, удовольствие от жизни, успехи в бизнесе).
<br/><br/>
Обычно это руководители, топ-менеджеры, высококлассные специалисты, успешные жены.
<br/><br/>
Это женщины, которые хотят по работе и в ежедневной жизни нравиться себе и производить нужное впечатление на окружающих.
<br/><br/>
Это женщины, которым надо рядом со своим мужчиной выглядеть на 100%.
<br/><br/>
Они понимают, что если идти на шоппинг самим без профессиональных знаний, то купишь хуже, больше потратишь и меньше удовольствия получишь от результата.</p>
				</div>

							</div>
						</div>
					</div>
					<div class="clearfix article-outer-sidebar" style="padding-bottom: 0px;padding-top: 50px;">
						<div class="article-inner" style="">
							<div class="article-container clearfix">

                            	<div class="fs40 playfair page-with-no-image" style="padding-bottom: 0px; text-align: left;">Как стать имиджмейкером с нуля?</div>


							</div>
						</div>
					</div>
					<div class="clearfix article-outer-sidebar">
						<div class="article-inner">
							<div class="article-container clearfix">
								<div class="fs16 arial the-content">
<p><span style="font-weight:900;font-size: 18px;">Что нужно</span>
<br/><br/>
– Желание учиться — самое главное.
<br/><br/>
– Время.<br/>
Стать стилистом за два дня или неделю невозможно. Необходимо время, чтобы выработать навыки. Больше года не нужно — получится затягивание и распыление на непрофильные дисциплины типа «история моды» или «этикет». 3-6 месяцев обучения вместе с практическими заданиями — золотая середина. Дальше — уже развивать навыки всю жизнь.
<br/><br/>
– Любить одежду и магазины.<br/>
Если вы не любите шоппинг, магазины, наряды — забудьте про профессию стилиста-имиджмейкера — будет лучше вам и вашим потенциальным клиентам.
<br/><br/>
<span style="font-weight:900;font-size: 18px;">О чем не надо беспокоиться</span>
<br/><br/>
– Нет профильного высшего образования на тему искусств или моды.
Ничего страшного. Я вот финансовый менеджер. И вполне успешно работаю. Высшее образование в общем будет полезно, т.к. оно определяет стиль мышления. Вам легче будет обучаться.
<br/><br/>
– Нет таланта. <br/>
Чтобы стать стилистом талант не нужен. Здесь более важна «насмотренность» — это когда каждый образ вы раскладываете с помощью правил. Когда у вас таких насмотренных качественных образов больше тысячи, у вас магически появляется и вкус, и талант.
<br/><br/>
– Не умеете рисовать.<br/>
Все жалуются на мой почерк. А человека я рисую, как в детстве, колбасками. Но мы не дизайнеры одежды, и нам не надо рисовать моделей.</p>
				</div>

							</div>
						</div>
					</div>

              <img src="https://www.glamurnenko.ru/images/letter/spsk1big.jpg" style="border-width:0;width:350px;height:auto;margin-right:5px;"><img src="https://www.glamurnenko.ru/images/letter/spsk2big.jpg" style="border-width:0;width:350px;height:auto;margin-right:5px;"><img src="https://www.glamurnenko.ru/images/letter/spsk3big.jpg" style="border-width:0;width:350px;height:auto;"></a>
<div style="margin: 0 5% 0 5%;width: 90%;color: #888888;font-style: italic;font-size: 13px;text-align: center;line-height: 1.5;"><p class="text" style="padding-top:0px;padding-bottom:0px;padding-right:0px;padding-left:0px;font-family:Helvetica,Arial,sans-serif;font-size:12px;font-weight:normal;line-height:22px;Margin:1em 0px;margin-top: 0px;">Расписываю шоппинг-лист для клиентов в Милане. Почерк ужас )</p></div>
								<div class="clearfix article-outer-sidebar">
									<div class="article-inner">
										<div class="article-container clearfix">
											<div class="fs16 arial the-content">
			<p><span style="font-weight:900;font-size: 18px;">Очень хорошо</span>
<br/><br/>
– Если у вас легкий характер.<br/>
Вы умеете общаться и ладить с людьми. Вы легки на подъем, оптимистичны и можете продолжать делать, даже если с первого раза не получается.
<br/><br/>
– Когда у вас много идей.<br/>
И вы горите попробовать и одно, и другое, и третье.
<br/><br/>
– Базовая компьютерная грамотность.<br/>
Все технические вопросы вы сможете переложить на специалиста. И мы покажем как это сделать. Но базовые вещи по поиску информации, работе с почтой, регистрации на сайтах и сервисах, работа в Word, Excel и т.п. желательно, чтобы у вас были.
<br/><br/>
– Поддержка родственников.<br/>
Когда вас поддерживают близкие, все получается гораздо лучше. К тому же с самого начала вы сможете практиковаться и на них.</p>
							</div>

										</div>
									</div>
								</div>

								<div class="clearfix article-outer-sidebar">
									<div class="article-inner">
										<div class="article-container clearfix">
											<div class="fs16 arial the-content">
												<img src="https://www.glamurnenko.ru/images/letter/kote.png" style="float:right;margin:10px;;width:180px;margin-bottom: 310px;margin-top: 0px;" />
			<p><span style="font-weight:900;font-size: 18px;">Голос скептика («сомневающийся котэ»):</span> <br/>
			<em>– Чтобы работать стилистом нужен диплом?
<br/><br/>
– Нет не нужен ))) Деятельность стилиста-имиджмейкера не лицензируется. С 2007 года у меня было свыше 500 клиентов на шоппинг и всего несколько раз на первой встрече меня спрашивали что-то вроде: «А вы где-то учились?». Но конкретно о дипломе речь не шла.
<br/><br/>
Важнее на первой встрече своим внешним видом показать, что вы стилист. Для этого надо выглядеть лучше, чем клиент.
<br/><br/>
Ваш внешний вид — лучшая реклама вашей деятельности. По нему будут судить, что вы сможете сделать как профессионал. И надо, чтобы было заметно, что вы работаете в индустрии моды. Чтобы вы были одеты стильно, эффектно, интересно.
<br/><br/>
Ваш внешний вид — это и есть ваш лучший диплом, который говорит сам за себя.</em></p>
							</div>

										</div>
									</div>
								</div>

								<div class="clearfix article-outer-sidebar">
									<div class="article-inner">
										<div class="article-container clearfix">
											<div class="fs16 arial the-content">
			<p>Получится именно у вас стать стилистом или нет? Я не знаю, здесь нет гарантий.
<br/><br/>
Но я расскажу мою историю и истории женщин, у кого это получилось. Я покажу внутреннюю кухню, как мы учимся и работаем.</p>
							</div>

										</div>
									</div>
								</div>
								<div id="menu2" class="clearfix article-outer-sidebar" style="padding-bottom: 0px;padding-top: 50px;">
									<div class="article-inner" style="">
										<div class="article-container clearfix">

																		<div class="fs40 playfair page-with-no-image" style="padding-bottom: 20px; text-align: left;">«Ду-у-ура!» — кричал на меня папа...</div>


										</div>
									</div>
								</div>
								<img src="https://www.glamurnenko.ru/blog/images/ekaterina-imgsch.jpg" alt="2-6" class="aligncenter size-full wp-image-1378">
								<div style="margin: 0 5% 0 5%;width: 90%;color: #888888;font-style: italic;font-size: 13px;text-align: center;line-height: 1.5;"><p class="text" style="padding-top:0px;padding-bottom:0px;padding-right:0px;padding-left:0px;font-family:Helvetica,Arial,sans-serif;font-size:12px;font-weight:normal;line-height:22px;Margin:1em 0px;margin-top: 0px;">Фотографии с моей первой фотосессии. Недорогие вещи, но собранные в интересные комплекты. Благодаря второй фотографии ко мне пришла одна из любимых клиенток. Она подумала: «Если Катя может так смело носить шляпу, мне надо к ней»</p></div>
								<div class="clearfix article-outer-sidebar">
									<div class="article-inner">
										<div class="article-container clearfix">
											<div class="fs16 arial the-content">
			<p>«Ду-у-ура!» — кричал на меня папа, когда я объявила о решении уволиться со стабильной работы и стать имиджмейкером. — «Ты сливаешь карьеру в унитаз ради каких-то иллюзий! Ты бесишься с жиру! Чем и сколько ты будешь зарабатывать на жизнь?»
<br/><br/>
Когда я делилась своей мечтой с подругами, те недоверчиво хмыкали: «Ты серьезно считаешь ЭТО работой, которая кому-то нужна? Где ты возьмешь клиентов?»
<br/><br/>
Моя жизнь была вполне стабильна. После окончания университета я работала экономистом. Зарплату выплачивали вовремя и её хватало чуть больше, чем на проживание. Через некоторое время могла стать ведущим экономистом, потом начальником отдела... А еще через 30 лет выйти на пенсию, которую мне вряд ли бы хватило на нормальную жизнь…
<br/><br/>
Но я понимала, что это совершенно не то, чем я бы хотела заниматься. Не то, на что готова тратить свою жизнь.</p>
							</div>

										</div>
									</div>
								</div>
								<div class="clearfix article-outer-sidebar" style="padding-bottom: 0px;padding-top: 50px;">
									<div class="article-inner" style="">
										<div class="article-container clearfix">

																		<div class="fs40 playfair page-with-no-image" style="padding-bottom: 0px; text-align: left;">А на что тратить свою жизнь?</div>


										</div>
									</div>
								</div>
								<div class="clearfix article-outer-sidebar">
									<div class="article-inner">
										<div class="article-container clearfix">
											<div class="fs16 arial the-content">
			<p>Я любила листать модные журналы и рассматривать фотографии.
<br/><br/>
Мне нравилось следить за модными новинками и креативить над собственным гардеробом.
<br/><br/>
Я любила атмосферу магазинов. Мне нравилось даже просто ходить и рассматривать одежду и аксессуары.</p>
							</div>

										</div>
									</div>
								</div>
								<div class="clearfix article-outer-sidebar" style="padding-bottom: 0px;padding-top: 50px;">
									<div class="article-inner" style="">
										<div class="article-container clearfix">

																		<div class="fs40 playfair page-with-no-image" style="padding-bottom: 0px; text-align: left;">Но можно ли сделать свое увлечение работой?</div>


										</div>
									</div>
								</div>
								<div class="clearfix article-outer-sidebar">
									<div class="article-inner">
										<div class="article-container clearfix">
											<div class="fs16 arial the-content">
			<p>Я слышала о людях, которые покупают клиентам одежду и зарабатывают на этом деньги... Но это были люди как будто из другого мира.
<br/><br/>
Их называют стилистами, имиджмейкерами и шопперами. Но как стать одной из них? Как получать деньги за то, чтобы сделать человека привлекательнее? Где брать клиентов и кто ко мне обратится?
<br/><br/>
Фраза: «У тебя ничего не получится», — была ключевой во всех разговорах про мое имиджмейкерство.</p>
							</div>

										</div>
									</div>
								</div>
								<div class="clearfix article-outer-sidebar" style="padding-bottom: 0px;padding-top: 50px;">
									<div class="article-inner" style="">
										<div class="article-container clearfix">

																		<div class="fs40 playfair page-with-no-image" style="padding-bottom: 0px; text-align: left;">И что в итоге?</div>


										</div>
									</div>
								</div>
								<div class="clearfix article-outer-sidebar">
									<div class="article-inner">
										<div class="article-container clearfix">
											<div class="fs16 arial the-content">
			<p>С 2007 года у меня было свыше 500 клиентов на шоппинги и консультации по стилю. Я одевала клиентов на красную ковровую дорожку, на экономический форум в Санкт-Петербурге, на встречу с президентом...
<br/><br/>
Я сама распоряжаюсь своим временем. Мне не надо просыпаться в 6 утра и ни свет, ни заря бежать на работу. Торчать в пробках, слушать приказы и упреки начальства, томиться в ожидании пятницы и испытывать вечером в воскресенье противное чувство надвигающего понедельника. Б-р-р-р!
<br/><br/>
У меня нет проблем с финансами. Нередко с одного шоппинга я получаю сумму, равную месячной зарплате экономиста.
<br/><br/>
Я заряжаюсь энергией от новых встреч, полна позитива и творческих задумок. В моем ежедневнике шоппинги расписаны на месяц вперед.</p>
							</div>

										</div>
									</div>
								</div>
								<div class="clearfix article-outer-sidebar" style="padding-bottom: 0px;padding-top: 50px;">
									<div class="article-inner" style="">
										<div class="article-container clearfix">

																		<div class="fs40 playfair page-with-no-image" style="padding-bottom: 0px; text-align: left;">Проблема )</div>


										</div>
									</div>
								</div>
								<div class="clearfix article-outer-sidebar">
									<div class="article-inner">
										<div class="article-container clearfix">
											<div class="fs16 arial the-content">
			<p>А еще — клиенты возвращаются. И я поняла, что передо мной проблема — одна не справляюсь. Тогда я запустила первый поток Школы Имиджмейкеров.
<br/><br/>
Выпускники Школы работают в моей команде, самостоятельно ходят на шоппинги и проводят консультации или применяют знания в жизни/работе.
<br/><br/>
В конце мая я запускаю новый поток Школы Имиджмейкеров. Если вы хотите попасть на него, запишитесь в предварительный список.</p>
							</div>

										</div>
									</div>
								</div>
								<div class="clearfix article-outer-sidebar" style="padding-bottom: 0px;padding-top: 50px;">
									<div class="article-inner" style="">
										<div class="article-container clearfix">

																		<div class="fs40 playfair page-with-no-image" style="padding-bottom: 0px; text-align: left;">1. Практика с первого занятия</div>


										</div>
									</div>
								</div>

								<div class="clearfix article-outer-sidebar">
									<div class="article-inner">
										<div class="article-container clearfix">
											<div class="fs16 arial the-content">
			<p><strong>Только с помощью практики вы научитесь делать</strong>
<br/><br/>
Вы можете полгода читать про устройство велосипеда, историю его изобретения, теорию езды. Или за неделю научиться кататься. Пусть с шишками и ссадинами. Но вам с завистью будут смотреть вслед, кто просто изучал теорию.
<br/><br/>
В Школе Имиджмейкеров вы начинаете практику прямо с первого занятия. Сначала вашими клиентами становитесь вы сами и ваши знакомые. Потом мы учимся находить клиентов и работать с ними.
<br/><br/>
<strong>Каждое занятие завершается практическим заданием</strong>
<br/><br/>
Вы будете проводить первую встречу, составлять палитры и шоппинг-листы, расчерчивать фигуры и длины одежды, исследовать магазины и выполнять еще свыше 30 практических заданий.
<br/><br/>
<strong>Каждое задание &mdash; это часть вашей будущей работы</strong>
<br/><br/>
Все, что вы сделаете будет потом работать на вас. Каждое задание, которое вы выполните, будет кирпичиком в вашем результате.</p>
							</div>

										</div>
									</div>
								</div>
								<div>
													<blockquote style=""><img src="//www.glamurnenko.ru/blog/images/kharkov.png" alt="" style="
														float: left;
														margin: 40px 0px 0px 0px;
												"><p style="text-align:left;margin-left:140px;margin-top: 40px;"><em>Я долго искала, пробовала разные курсы. В конце концов, нашла Катю и для начала купила у нее несколько семинаров. Потом записалась на тренинг и сразу поняла, что это то самое, что я так долго искала – практика, практика и еще раз практика.
<br/><br/>
Я скупила все Катины курсы: нет ни одного тренинга, ни одного семинара, который я бы не прошла. Поэтому, когда стартовала запись в «Школу имиджмейкеров», сомнений уже не было никаких.
<br/><br/>
Алена Харьков<br/>
			<a href="https://www.facebook.com/StylingWithHelen/" target="_blank">https://www.facebook.com/StylingWithHelen/</a></em></p>
			</blockquote></div>

								<div class="clearfix article-outer-sidebar" style="padding-bottom: 0px;padding-top: 50px;">
									<div class="article-inner" style="">
										<div class="article-container clearfix">

																		<div class="fs40 playfair page-with-no-image" style="padding-bottom: 0px; text-align: left;">2. Никакой воды</div>


										</div>
									</div>
								</div>

								<div class="clearfix article-outer-sidebar">
									<div class="article-inner">
										<div class="article-container clearfix">
											<div class="fs16 arial the-content">
			<p>Воду льют лекторы, у которых мало практики и опыта. Кто прочитал в интернете и пересказывает.
<br/><br/>
Или есть темы, которые добавляют, чтобы придать объем курсу: история моды, этикет, брендинг и т.п. Но за ними теряется самое главное &mdash; практика, &laquo;мясо&raquo;, действия.
<br/><br/>
С 2007 года я работаю стилистом. И больше никем. Я не визажист, не парикмахер, не экономист. Каждый день я развиваюсь как стилист: шоппинги, разборы гардеробов, поездки в Милан, семинары, тренинги. Даже когда я отдыхаю, я автоматически анализирую людей, витрины, обложки.
<br/><br/>
В этом курсе я отфильтровала именно то, что использую каждый день. И выстроила это последовательно и логически, чтобы можно было поэтапно все изучить. Я выжала знания и опыт в сухой остаток и даю его вам.</p>
							</div>

										</div>
									</div>
								</div>

								<div class="clearfix article-outer-sidebar" style="padding-bottom: 0px;padding-top: 50px;">
									<div class="article-inner" style="">
										<div class="article-container clearfix">

																		<div class="fs40 playfair page-with-no-image" style="padding-bottom: 0px; text-align: left;">3. Сильный результат</div>


										</div>
									</div>
								</div>

								<div class="clearfix article-outer-sidebar">
									<div class="article-inner">
										<div class="article-container clearfix">
											<div class="fs16 arial the-content">
			<p>Все просто. Вы следуете нашему плану обучения и делаете &mdash; у вас появляется результат. Никакой магии. Просто трудолюбие и дисциплина.
<br/><br/>
И отзывы студентов &mdash; лучшее подтверждение, что Школа Имиджмейкеров работает. Ниже на этой странице я собрала часть таких отзывов. Почитайте.
<br/><br/>
Хотя нет, лучшее подтверждение &mdash; это работающие стилисты. Почитайте у скольки стилистов в отчетах цифры и реальная работа. Вот это и есть &laquo;сильный результат&raquo;.</p>
							</div>

										</div>
									</div>
								</div>
								<div>
													<blockquote style=""><img src="//www.glamurnenko.ru/blog/images/peffer.png" alt="" style="
														float: left;
														margin: 40px 0px 0px 0px;
												"><p style="text-align:left;margin-left:140px;margin-top: 40px;"><em>У меня есть живые клиенты, с которыми я непосредственно взаимодействую. И есть те, с кем я работаю на расстоянии. Всего, наверное, было около 200 клиентов. Некоторые из них стали постоянными, то есть мы с ними периодически ходим на шоппинги, каждый сезон. Больше всего, конечно, запомнились первые клиенты, потому что это были самые яркие по ощущениям.
<br/><br/>
Сомневалась, наверное, только в одном: смогу ли я потом на практике применить эти знания, то есть смогу ли я перебороть свой страх и начать работать с клиентами. Тогда я уже решила, что лучше попробовать, чем потом жалеть. Страхи всегда нужно преодолевать и выходить из своей зоны комфорта. Если этого не делать, ничего не изменится, никакого роста не будет.
<br/><br/>Александра Пеффер<br/>
			<a href="https://www.facebook.com/aleksandra.bogomaz.1" target="_blank">https://www.facebook.com/aleksandra.bogomaz.1</a></em></p>
			</blockquote></div>
			<div id="menu3" class="clearfix article-outer-sidebar" style="padding-bottom: 0px;padding-top: 50px;">
									<div class="article-inner" style="">
										<div class="article-container clearfix">

			                            	<div class="fs40 playfair page-with-no-image" style="padding-bottom: 0px; text-align: left;">Что будет в Школе Имиджмейкеров?</div>


										</div>
									</div>
								</div>

								<div class="clearfix article-outer-sidebar">
									<div class="article-inner">
										<div class="article-container clearfix">
											<div class="fs16 arial the-content">
			<p>Каждое занятие длится от 2 часов и представлено в формате видео-презентации.</p>
							</div>

										</div>
									</div>
								</div>
								<img src="https://www.glamurnenko.ru/blog/images/scrn1.png" alt="2-6" width="1060px" class="aligncenter size-full wp-image-1378" >
								<div style="margin: 0 5% 0 5%;width: 90%;color: #888888;font-style: italic;font-size: 13px;text-align: center;line-height: 1.5;"><p class="text" style="padding-top:0px;padding-bottom:0px;padding-right:0px;padding-left:0px;font-family:Helvetica,Arial,sans-serif;font-size:12px;font-weight:normal;line-height:22px;Margin:1em 0px;margin-top: 0px;">На скриншоте первое занятие. Мы уже разбираем анкету клиента и как работать с ответами.</p></div>
								<div class="clearfix article-outer-sidebar">
									<div class="article-inner">
										<div class="article-container clearfix">
											<div class="fs16 arial the-content">
								<p>
									<span class="highlight"><strong>План занятий:</strong></span>
									<br/><br/>
1. Первая встреча с клиентом: структура, результат, правильные вопросы.
<br/><br/>
2. Разбираемся с цветотипами и составляем коллаж по каждому цветотипу.
<br/><br/>
3. Проводим цветовое тестирование себя / клиента / знакомых.
<br/><br/>
4. Составляем вкусные цветовые сочетания и расписываем их по комплектам.
<br/><br/>
5. Проводим консультацию по цвету.
<br/><br/>
6. Определяем форму лица и составляем список рекомендаций по прическе и оттенкам волос.
<br/><br/>
7. Создаем сайт за день.
<br/><br/>
8. Первая продажа ваших услуг.
<br/><br/>
9. Наполняем сайт для привлечения заинтересованных покупателей.
<br/><br/>
10. Консультация по фигуре: последовательность, схема, материалы.
<br/><br/>
11. Проводим консультацию по фигуре: определяем тип фигуры, особенности, достоинства, определяем пропорции одежды, расписываем коррекцию фигуры, подбираем фасоны и детали.
<br/><br/>
12. Практикуемся в цветотипах/фигуре и привлекаем клиентов через интернет.
<br/><br/>
13. Выбираем стили для клиентки и расписываем комплекты.
<br/><br/>
14. Консультация по стилям: последовательность, схема, материалы.
<br/><br/>
15. Анализируем магазины для шоппинга.
<br/><br/>
16. Добавляем услугу шоппинг-сопровождения.
<br/><br/>
17. Добавляем услугу по комплексной консультации.
<br/><br/>
18. Подбираем аксессуары и анализируем магазины аксессуаров.
<br/><br/>
19. Мужской имидж: выбираем стилевые направления, расписываем комплекты.
<br/><br/>
20. Создаем подписку на сайте для привлечения клиентов.
<br/><br/>
21. Мужской имидж &mdash; практика.
<br/><br/>
22. Разбираем и анализируем гардероб. Составляем список комплектов и список &laquo;что докупить&raquo;. Добавляем услугу разбор гардероба.
<br/><br/>
23. Создаем серию писем для перевода читателя в клиента.
<br/><br/>
24. Массово привлекаем подписчиков в вашу систему продаж.
<br/><br/>
25. Разбираемся с изнанкой моды &mdash; откуда берутся тенденции и как их предсказывать.
<br/><br/>
26. Типы клиенты и как с ними работать.
<br/><br/>
27. Управляем клиентами в зависимости от их типа.
<br/><br/>
28. Финал! Что дальше делать для выдающихся результатов.
<br/><br/>
29. БОНУС &laquo;Тренинговый Десант: как создать, провести и упаковать собственный тренинг&raquo;.
<br/><br/>
30. БОНУС &laquo;ЛистЭксперт.pro: Как создавать свою рассылку, вести её, строить отношения и продавать подписчикам&raquo; </p>
								</div>

										</div>
									</div>
								</div>

								<div class="clearfix article-outer-sidebar" style="padding-bottom: 0px;padding-top: 50px;">
									<div class="article-inner" style="">
										<div class="article-container clearfix">

			                            	<div class="fs40 playfair page-with-no-image" style="padding-bottom: 0px; text-align: left;">Как выглядит обучение</div>


										</div>
									</div>
								</div>

								<div class="clearfix article-outer-sidebar">
									<div class="article-inner">
										<div class="article-container clearfix">
											<div class="fs16 arial the-content">
								<p>Обучение проходит через интернет. Вам не надо никуда ехать. Достаточно просто иметь доступ к компьютеру и интернету.
<br/><br/>
У вас будет доступ в закрытый раздел. Там вы сможете смотреть видео, скачивать видео, дополнительные материалы.
<br/><br/>
Три раза в неделю я буду открывать вам новый урок.
<br/><br/>
У вас постоянно будет доступ в этот раздел. Если вы что-то пропустили, в любой момент вы сможете вернуться и повторно переслушать записи и работать в удобном для вас темпе.</p>
								</div>

										</div>
									</div>
								</div>

								<div class="clearfix article-outer-sidebar" style="padding-bottom: 0px;padding-top: 50px;">
									<div class="article-inner" style="">
										<div class="article-container clearfix">

			                            	<div class="fs40 playfair page-with-no-image" style="padding-bottom: 0px; text-align: left;">Разбор домашних заданий</div>


										</div>
									</div>
								</div>

								<div class="clearfix article-outer-sidebar">
									<div class="article-inner">
										<div class="article-container clearfix">
											<div class="fs16 arial the-content">
								<p>В процессе обучения вы выкладываете свои домашние задания и вопросы, а я на них отвечаю. У вас будет моя поддержка и обратная связь на протяжении 4 месяцев!</p>
								</div>
										</div>
									</div>
								</div>
								<div class="clearfix article-outer-sidebar" style="background: url(//www.glamurnenko.ru/blog/images/bg-ek.jpg);margin: 0px;">
									<div class="article-inner" style="margin-left: 40px;max-width: 600px;">
										<div class="article-container clearfix">
											<div class="fs16 arial the-content">

								<p style="color: white;font-weight: 500;padding-bottom: 70px;padding-top: 70px;">
									<span style="text-align:center;text-align: center;
    font-size: 2.5em;
    line-height: 1em;
    font-family: Oranienbaum, serif;
    text-transform: uppercase;">&laquo;Куда делись деньги?&raquo;</span><br/><br/>Часто бывает так, что я не могу вспомнить куда делись все те деньги, которые я заработала за прошлый год. Вот смотришь &mdash; сумма большая. А куда они ушли? И явно вспоминаются только какие-то крупные покупки или обучение, которое дало результат.
<br/><br/>
Я всегда помню куда делись деньги, которые я вложила в свое образование, если есть практика и результаты. Потому что я вижу эти результаты.
<br/><br/>
Деньги приходят и уходят. Но если вы их вложите в виде знаний и навыков в себя, они останутся с вами навсегда. И будут постоянно приносить вам пользу.
<br/><br/>
Школа Имиджмейкеров &mdash; это инвестиция. Прежде всего в вас самих. Это ваше конкурентное преимущество и в личной жизни, и в карьере или бизнесе.
<br/><br/>
Я постаралась сделать так, чтобы эта инвестиция была самой выгодной в вашей жизни.
</p>
								</div>
										</div>
									</div>
								</div>
								
								<div id="menu5" class="clearfix article-outer-sidebar" style="padding-bottom: 0px;padding-top: 50px;">
						<div class="article-inner" style="">
							  <div class="article-container clearfix">

                            	<div class="fs40 playfair page-with-no-image" style="padding-bottom: 0px; text-align: left;">Отзывы на Школу Имиджмейкеров</div>


							</div>
						</div>
					</div>
					<div class="clearfix article-outer-sidebar">
						<div class="article-inner">
							<div class="article-container clearfix">
								<div class="fs16 arial the-content">
					<p>Отзывы постоянно приходят и мы стараемся их оперативно выкладывать. Некоторые из них вы можете прочитать ниже.
</p>
					</div>
							</div>
						</div>
					</div>
					<br/><br/>
					<div>
						<img src="https://www.glamurnenko.ru/products/imageschool/images/ava100.jpg" alt="" style="
							float: left;
							margin: 40px 80px 0px 60px;
					">
										<blockquote><p style="text-align:left;margin-left: 330px;">НА СЕГОДНЯ У МЕНЯ УЖЕ ЗАРАБОТАНО 120 ТЫС. РУБ., ПРИЧЕМ БОЛЬШАЯ ЧАСТЬ — ЗА ПОСЛЕДНИЕ 3 МЕСЯЦА
					<br/><br/>
					БОЛЬШИНСТВО ДЕНЕГ Я ЗАРАБОТАЛА 8 КОМПЛЕКСНЫМИ КОНСУЛЬТАЦИЯМИ — 3 КЛИЕНТКИ ПРИШЛИ ИЗ АКЦИИ ПО ОПРЕДЕЛЕНИЮ ЦВЕТОТИПА, 5 ШОПИНГОВ, 3 РАЗБОРА ГАРДЕРОБА И МНОГО ПЕРВЫХ ВСТРЕЧ
<br><br>
					Я хочу написать не только, чтобы отчитаться, но и для того, чтобы девушки увидели,что все возможно :)
					<br><br>
					Итак, на сегодня у меня уже заработано 120 тыс. руб., причем большая часть — за последние 3 месяца.
					<br><br>
					Реально стало получаться только когда я приняла решение уволиться с работы и заняться только имиджмейкерством. Лично у меня не получалось совмещать, т.к. это тяжело физически и времени не хватает ходить по магазинам, отслеживать тенденции, готовить материалы…
					<br><br>
					Итак, большинство денег я заработала 8 комплексными консультациями — 3 клиентки пришли из акции по определению цветотипа, 5 шопингов, 3 разбора гардероба и много первых встреч :)
					<br><br>
					Хочу сказать, долго топталась на месте — до шопинга с Екатериной и поездки в Милан — потом произошел какой-то прорыв — появилась уверенность в своих силах и ощущение, что все получится. За что, огромное тебе спасибо, Екатерина! А еще спасибо шопингу в Милане, за то, что он подарил возможность познакомиться с коллегами лично :)
					<br><br>
					Конечно, у меня до сих пор бывают сомнения по поводу цветотипа, иногда клиенты ставят меня в тупик своими вопросами или мне бывает их жалко :) Но я стараюсь их сильно не жалеть и настаивать на своем.
				<br><br>Галышина Галина</p></blockquote></div>

				<div>
					<img src="https://www.glamurnenko.ru/products/imageschool/images/ava2.jpg" alt="" style="
						float: left;
						margin: 40px 80px 0px 60px;
				">
									<blockquote style="background-color: rgba(235,228,202,1);"><p style="text-align:left;margin-left: 330px;">
										ЗАРАБОТАЛА 16 000 РУБЛЕЙ. ХОТЯ, ЗНАЮ, ЧТО МОГЛО БЫТЬ ГОРАЗДО БОЛЬШЕ ))
						<br/><br/>
						ДОБАВЛЕНО:<br/>
						УСЛУГА — РАЗБОР ГАРДЕРОА. ВРЕМЯ РАЗБОРА — 5 ЧАСОВ )) ЗАРАБОТАННЫЕ ДЕНЬГИ — 12500 (1 ЧАС СТОИТ ПОКА 2500 РУБ). ИТОГО МОЙ ЗАРАБОТОК ЗА ВСЁ ВРЕМЯ РАБОТЫ СОСТАВИЛ 16+12,5 = 28500. ПОЧТИ ОКУПИЛА КУРС))
						<br/><br/>
						ДОБАВЛЕНО:<br/>
						РАЗБОР ГАРДЕРОБА. ЗАРАБОТАЛА Я 7500 РУБ. МОЯ КОПИЛКА УЖЕ 28500 + 7500 = 36 000! УРА )
						<br/><br/>
						ДОБАВЛЕНО:<br/>
						РАЗБОР ДЛИЛСЯ 5 ЧАСОВ, ЗАРАБОТАННАЯ СУММА 10 000 РУБЛЕЙ. ИТОГО, МОЙ ЗАРАБОТОК СОСТАВИЛ 36000+10000 = 46000 РУБЛЕЙ.
<br><br>
Имиджмейкером я стала совершенно случайно ))) Когда-то я решила поработать над своим образом, и решила записаться на курсы «Сам себе стилист». Когда я пришла, меня уговорили пойти на курсы имиджмейкера, чтобы уметь работать не только с собой, но и профессионально помогать мужу, друзьям, и, возможно, клиентам. Тогда я занималась психологией, и даже и не думала менять профессию. Хотя, уже упорно искала «узкую нишу», хотела совместить психологию ещё с чем-то, но не знала с чем. И тут пошло-поехало… <br><br>Меня настолько увлекла эта тема, настолько сложился пазл, что психология и имидж — это то, что нужно, это то, что интересно и это очень меня увлекло! На тех курсах я получила много теоретических знаний, но было очень мало знаний, как это применить на практике, как работать с клиентами, и т.д.<br><br> <strong>К Кате я пришла как раз заполнить пробелы в этих знаниях. И ни на секунду не пожалела.</strong><br><br> Во-первых, я ещё раз повторила то, что знала, тем более, когда слышишь это второй раз, другими словами, с другой точки зрения, то и понимание становится более объёмным. <br>А во-вторых, что было самым ценным — было много практических вещей, и работа с сайтом, и написание статей, и тонкости работы с клиентами. Ещё было очень здорово, что <strong>Катя делилась своими наработками, которые можно получить только в практическом опыте, о которых нигде не прочитаешь, которые можно узнать, только наступив нескоько раз «на грабли».</strong> Спасибо тебе, Катя, что уберегла от многих ошибок сразу )))<br><br>
По поводу того, что я сделала.<br><br>
Скажу сразу, что сделала не много, и причиной этому было и отсутствие времени, и самосаботаж, и банальная лень )) Но тем не менее, я точно знаю, что буду делать в ближайшее время.
<strong>За время обучения я создала свой сайт, написала несколько статей, определила цветотип своим подругам, провела разбор гардероба, сводила одного клиента на шоппинг. Заработала 16 000 рублей. Хотя, знаю, что могло быть гораздо больше ))</strong><br><br>
Сейчас занимаюсь доработкой сайта, в процессе написания книги.<br><br>
В блиайший месяц наметила кучу дел — в первую очередь планирую начать он-лайн-консультации, потихоньку нарабатывать «живых» клиентов. Пока нигде не пиарюсь, поскольку пиарить особо нечего — много чего не доработано. Как только доделаю сайт, распишу все свои услуги, добавлю контент, то начну пиариться по клиентским базам своих друзей — уже есть договорённости. Также, есть договорённость с интернет-магазином одежды, буду писать для них статьи и делать луки из ассортимента. Пока этих дел для меня, как говориться, «выше крыши» )) остальное всё впереди!<br><br>
По поводу тренинга, что можно было бы улучшить — лично мне хотелось бы более жёсткого тренинга — не сделал домашку — на занятие не допускается. По другому я не могу себя никак организовать )) Даже это задание, которое я сейчас пишу, я делаю в большей степени для того, чтобы получить допуск на последнюю встречу))) А в остальном всё было отлично, на мой взгляд!<br><br>
Катя и Андрей — спасибо!!!
<br/><br/>
Катя, девочки! Пишу отзыв. Не знаю, сюда или нет, <strong>это по поводу очередных заработанных денег.</strong><br><br>
Услуга — разбор гардероа. Время разбора — 5 часов )) Заработанные деньги — 12500 (1 час стоит пока 2500 руб). Итого мой заработок за всё время работы составил 16+12,5 = 28500. Почти окупила курс))<br><br>

Рассказываю. Мой первый разбор гардероба случился с одной моей знакомой. Девушка 31 год, сейчас не работает, часто по несколько месяцев проводит в Америке. Гардероб — огромный. Как я понимаю — редкость большая, ибо большинство имиджмейкеров говорит о том, что в гардеробах разбирать нечего)) Практически весь гардероб куплен в Америке, соответственно.<br><br>
Огромное количество платьев, несколько костюмов, много юбок, топы, трикотаж — всего много.<br>
Девушка по цветотипу ЗИМА.<br>
Что в итоге оказалось. Даже с большим гардеробом у клиентки огромное количество неподходящих вещей — по цвету и по фигуре. Очень мало подходящей бижутерии, практически вся бижутерия в жёлтом исполнении, очень мало сумок, из них все не очень, и вообще нет цветной обуви (кроме серых ботильон, которые она не знала, с чем носить, и кторые в результате почти подо всё подошли))<br>
<strong>Расскажу мои впечатления, результаты, ошибки…</strong><br>
Самым большим недочётом было то, что я сосредоточила внимание на формировании комплектов, но не уделила внимание тому, чтобы количество комплектов соответствовало образу жизни. Т.е. я просто формировала комплекты, но не мы не делали акцент, для чего этот комплект. Это я уже поняла, когда пришла домой.<br><br>
Второе — я реально не успела за 5 часов качественно проработать весь гардероб. Всвязи с этим, вопрос к Кате — как быть, если реально времени не хватило? Я уходила от неё уже в 12 часов, и мы договорились, что я как-нибудь зайду и мы доделаем (там остались вечерние платья, которых тоже много).<br><br>
Потом, внимание ещё не настолько развито, чтобы улавливать в образе ВСЁ. Так, например, уже прия домой и просматривая фотографии я видела, что некоторые вещи, которые мы оставили — лучше бы не оставлять. Например, у неё низкий рост и большая грудь, а я оставила два трикотажных платья с воротником-стойкой. В сравнении с платьями с V-образным вырезом и запахом они выглядят не очень. Я конечно, напишу ей комментарии к фотографиям, и уточню, что лучше бы без воротника, и посовтую цепь с кулоном, чтобы имитировало вырез и удлиняло, НО… я этого совсем не увидела там, дома, когда она была рядом. Я так была сосредоточена на цветовых сочетаниях, что не заметила, что фасон не очень подходящий.<br><br>
Ещё, перед разбором гардероба очень рекомендую всем девочкам научиться завязывать шарфы и платки разными способами, я вот в этом вопросе не подковалась, и это был минус, было пару моментов, когда мне это очень бы помогло.<br><br>

Это из минусов, плюсы тоже были, конечно, <strong>девушка оказалась довольна</strong>, но я собой осталась не очень довольна — это факт.
<br/><br/>
Татьяна Куренкова</p></blockquote></div>

<div>
	<img src="https://www.glamurnenko.ru/products/imageschool/images/ava101.jpg" alt="" style="
		float: left;
		margin: 40px 80px 0px 60px;
">
					<blockquote><p style="text-align:left;margin-left: 330px;">
						ДЕНЬГИ, ПОТРАЧЕННЫЕ НА ОПЛАТУ ШКОЛЫ БЫЛИ БУКВАЛЬНО ПОСЛЕДНИМИ. НО Я НИ НА МИНУТУ НЕ ЖАЛЕЮ О ПРИНЯТОМ РЕШЕНИИ. С ТОГО САМОГО МОМЕНТА И ПО СЕЙ ДЕНЬ МОЯ ЖИЗНЬ ИЗМЕНИЛАСЬ КАРДИНАЛЬНО! Я НАКОНЕЦ-ТО ОБРЕЛА ДОЛГОЖДАННОЕ ДЕЛО, К КОТОРОМУ НЕ УТРАЧИВАЕТСЯ ИНТЕРЕС И ЖЕЛАНИЕ ИДТИ ДАЛЬШЕ, РАСТИ И СОВЕРШЕНСТВОВАТЬСЯ!
						<br/><br/>
						ПРОВЕЛА КОНСУЛЬТАЦИЙ: ПО ЦВЕТУ — 3, ПО ФИГУРЕ — 2, ПО СТИЛЮ — 1. РАЗБОР ГАРДЕРОБА — 2. ШОППИНГОВ ПРОВЕЛА — 3. КОЛИЧЕСТВО ДЕНЕГ, ПОТРАЧЕННЫХ НА ШОППИНГАХ ВСЕГО СЛОЖНО ОЦЕНИТЬ ТОЧНО, НО ЧТО-ТО ОКОЛО 100 Т.Р. ВСЕГО ЗАРАБОТАЛА ДЕНЕГ: 11+18+7+7+6=49 ТЫСЯЧ
<br><br>
Почему решила стать имиджмейкером? Потому что давно, пусть и неосознанно шла к этому, пожалуй, всю сознательную жизнь. Просто все сошлось в одной точке в нужное время – моя внутренняя готовность, моя внешняя решимость и письмо от Кати в моем почтовом ящике :) Именно тогда я поняла — сейчас или никогда!
<br><br>

Причем момент был не самый удачный в плане финансов – только вернулись из отпуска, где погуляли на славу. И деньги, потраченные на оплату школы были буквально последними. Но я ни на минуту не жалею о принятом решении. С того самого момента и по сей день моя жизнь изменилась кардинально! Я наконец-то обрела долгожданное дело, к которому не утрачивается интерес и желание идти дальше, расти и совершенствоваться!
<br><br>

Очень долго не удавалось увлечься чем-то по-настоящему и серьёзно. Я люблю, всё, что несёт в своей основе красоту, гармонию, стиль, преображение, поэтому всегда тянулась к творческим специальностям – шесть лет работала парикмахером, интересуюсь дизайном интерьеров, увлекалась различными видами рукоделия – вышивка, вязание, лепка из полимерной глины ит.д. Но все это было лишь этапами на пути к делу, которым я по-настоящему «болею», и в котором намерена достичь профессиональных высот и личного удовлетворения от собственной работы!
<br><br>

Когда я начала обучение, Екатерина говорила о том, что надо делать, чтобы совершенствоваться постоянно: читать книги и журналы о моде, рассматривать людей на улицах и анализировать их стиль. А я это и так делала постоянно: если журнал – то рассматриваю, как все там одеты, если блог – то о моде, если телевизор – то Fashion-TV ). Это то, что увлекает меня давно и всерьез, поэтому мне ничего не пришлось менять в своем образе жизни, в своих предпочтениях. Просто теперь я это делаю целенаправленно и это — моя работа, любимая и долгожданная!
<br><br>

Провела консультаций: по цвету — 3, по фигуре — 2, по стилю — 1. Разбор гардероба — 2. Шоппингов провела — 3. Количество денег, потраченных на шоппингах всего сложно оценить точно, но что-то около 100 т.р. Всего заработала денег: 11+18+7+7+6=49 тысяч
<br><br>

Иногда бывает сложно себя самоорганизовать, к тому же никуда не делись домашние дела, ребенок (который пока не ходит в сад, а значит всегда со мной)), и многое другое. Но это все отговорки – когда человек чего-то хочет – он ищет пути, как этого добиться! Поэтому мой личный рецепт – жесткое планирование: записываю на листке список дел на день, большие задачи разбиваю на мелкие, список дальносрочных целей висит на холодильнике – мозолит глаз и не дает расслабиться).
<br><br>

Недостаточно проработала тему мужского стиля, она сложная для меня (парадокс, но еще пару лет назад, я считала, что и понятия-то такого нет, ну, то есть понятие-то существует, а где этот зверь обитает и нужно ли это кому-нибудь – большой вопрос:)). Сейчас я уже так не считаю, потому что одеваю мужа, и вижу, как реагируют на него окружающие, результат моих усилий – на лицо). Но в голове пока еще есть остатки этого предубеждения). Также не мешало бы еще раз переслушать некоторые уроки и особое внимание уделить урокам по продвижению и пиару своих услуг.
<br><br>

О ближайших целях на месяц: хочу дополнительно пройти тренинг на тему аксессуаров. Чувствую пробел в этом вопросе, хочу свои знания подтянуть и упорядочить, и в будущем – проводить этот тренинг клиентам. Планирую деньги, заработанные в ближайшее время, тратить именно на учебу и развитие. Также хочу освоить и попробовать (для начала) аудио формат семинара, а потом, возможно, на видео или вебинар замахнусь :).
<br><br>

Есть и более долгосрочные цели: развивать свой собственный стиль (я очень критична в этом месте:)), сделать профессиональную фотосессию на сайт, сделать портфолио (спасибо огромное Александре Пеффер за ее опыт и то, что она поделилась им с нами, а также за вдохновение, в общем). У нее двое! детей, младший из которых даже меньше моего ребенка. А она учится, ездит на шоппинг с Катей в Милан, развивает сайт – молодец одним словом! Ее трудолюбие и успехи — это такая мотивация для меня лично, и отличный «пинок под зад», к тому же) Пардон за мой французский:)). Ну и, конечно, поехать с Катей на шоппинг в Милан! Это моя мечта, которой, я теперь это точно знаю, суждено сбыться и в самое ближайшее время.
<br><br>

Озарений за время учебы и по сей день – очень много! Но самое главное, что я поняла – нет ничего невозможного! Надо верить в себя, искать единомышленников, ставить себе цели, и поменьше задавать себе вопросов (а получится ли, смогу, справлюсь, достойна ли успеха и т.д.?), а просто работать-работать-работать! И тогда не может не получиться, обязательно получится!
<br><br>
Вера Осташкина</p></blockquote></div>

<div>
	<img src="https://www.glamurnenko.ru/products/imageschool/images/ava102.jpg" alt="" style="
		float: left;
		margin: 40px 80px 0px 60px;
">
					<blockquote style="background-color: rgba(235,228,202,1);"><p style="text-align:left;margin-left: 330px;">
						НА ДАННЫЙ МОМЕНТ ПРОВЕЛА 2 РАЗБОРА ГАРДЕРОБА И ПРИОБРЕЛА ДВУХ ПОСТОЯННЫХ КЛИЕНТОК НА ШОПИНГ. ВСЕГО ЗАРАБОТАНО 36 000 РУБ.
						<br><br>
						Добрый вечер, Катя, девочки!<br><br>
						Хочу описать свои достижения в новой для меня профессии имиджмейкер. Хоть школа закончилась не так и давно, у меня ощущения, будто это было несколько лет назад. Наверно, потому что это одно из тех занятий, которое меня увлекло и стало неотъемлемой частью моей жизни. Даже в своей основной профессии, дизайнер интерьера, я постоянно использую те знания, которые Вы нам дали. Ведь создание комплекта одежды очень перекликается с организацией пространства помещения. Также сейчас я часто ловлю себя на мыслях, что постоянно как-то корректирую или анализирую комплекты людей, с которыми встречаюсь в течение дня. <br><br>
						<strong>На данный момент провела 2 разбора гардероба и приобрела двух постоянных клиенток на шопинг.</strong> <br><br>
						Первый разбор гардероба был у молодой женщины Екатерины 36 лет. Она занимает достаточно высокий пост в автобизнесе и по ее словам после очередного повышения сама поняла, что что-то нужно менять в своем образе. В ее гардеробе встречались интересные представители модных брендов (не так давно летала в Италию), но как это часто бывает, все они чувствовали себя там как-то одиноко и неуютно. Это было похоже на набор импульсивно купленных вещей, что она мне потом сама и подтвердила. Часто покупались вещи просто для поднятия настроения, которые так и висели с бирками в шкафу, а носились привычные и проверенные годами комплекты. <br><br>
						После довольно долгой примерки, мы пришли к выводу, что часть низов и верхней одежды имеются, а вот с аксессуарами и количеством верхов засада, хотя один интересный жакет был. Еще оставила, купленные недавно в Италии 2 сумки (белая Фурла с отделкой кожей питона и рыжая Марина Орланди), ботильоны пудрового цвета (приятное удивление), коричневые туфли Балдинини, черные сапоги, длинные кожаные перчатки. <br><br>
						<strong>На разборе гардероба я заработала 6 000 руб. (3,5 часа)</strong> <br><br>
						Далее я составила список необходимых вещей и аксессуаров, и мы договорились пойти на шопинг через 2 недели. До шопинга обследовала выбранный мной торговый центр, в который мы собирались пойти, и присмотрела варианты для примерки.<br><br>
						В результате шопинга было приобретено:<br>
						1.	2 платья (футляр и струящееся)<br>
						2.	3 топа разных расцветок, фасонов и фактур<br>
						3.	2 интересные блузки<br>
						4.	Нейтральная трикотажная кофта на пуговицах как дополнение к топам и платьям для создания многослойности. <br>
						5.	Трое бус (первые с разноцветными камнями интересной огранки, вторые цепочки+ мелкие бусины, третьи длинные для создания вертикали ), браслет, серьги, ремешок.<br>
						6.	Юбка-карандаш кораллового цвета. Очень хорошо села. <br><br>
						<strong>В результате было потрачено около 83 000 руб. Я заработала 6 000 руб. (3 часа).</strong><br><br>

						Далее я расписала ей комплекты и отправила по почте. Так же порекомендовала проверенного парикмахера. Буквально через неделю она мне позвонила и рассказала о том, что получила массу комплиментов от коллег и друзей, постоянно ловит на себе завистливые взгляды тех, кто на комплименты не решается. <br><br>
						Потом с ней было еще 2 встречи связанных с покупкой платьев и аксессуаров для конкретных случаев. <strong>За каждую встречу я получила по 4000 руб.</strong> <br><br>
						Заранее я предупреждаю клиентов, что час работы стоит 2000 руб., минимальная сумма выезда 4000 руб., не важно, 2 часа я работала или мы за час все подобрали или разобрали. Исключение только консультации.<br><br>Итого: 20 000 руб.<br><br>Второй клиенткой стала мама первой. Светлана Сергеевна, 55 лет. Довольно полная, 56 размер, рост 167, треугольник основанием вниз с ярко выраженным перепадом бедро-талия.
						С ней я работала только ситуативно. Было 3 шопинга. На первом было куплено пальто, плащ (не запланированная покупка, очень хорошо подошел, и была хорошая скидка), сапоги, сумка шарф и платок. <br><br>
						Всего потрачено 43 000 руб. Я заработала 4000 руб. (около 2-х часов).<br><br>
						Два остальных похода были за платьями, обувью и аксессуарами по случаю. <br><br>
						На последнем шопинге, кроме комплекта на выход, было куплено довольно облегающее трикотажное платье с вертикальной деталировкой, которое очень удачно село на фигуру и стройнило ее. Трикотаж довольно плотный с интересной фактурой. К нему я подобрала удачное белье. <br><br>
						За каждый шопинг получила по 4000 руб. <br><br>
						Мне было особенно приятно получать слова благодарности от этой клиентки. По ее словам она уже довольно давно не получала комплиментов и думала, что с ее фигурой это вообще нереально. Трикотажное платье поразило всех ее знакомых и родных, хотя сама она очень сомневалась в магазине во время примерки. Она мне говорила, что наверно у них зеркало стройнит, или она как-то неправильно себя видит, и еще массу всего просто не веря в то, что это ее отражение и она чертовски хороша. <br><br>
						Через время после каждого шопинга она мне перезванивала и рассказывала, как ее воспринимали окружающие в новом наряде. О комплиментах, которые ей делают знакомые и родные. А после последнего шопинга, на котором было куплено, теперь ее любимое трикотажное платье, она мне сказала, что муж начал ревновать и это для нее самый важный комплимент. <br><br>
						<strong>Итого: 12 000 руб.</strong><br><br>
						Второй разбор гардероба был у девушки Оли 26 лет. Она довольно успешный фотограф.<br><br>
						Если на нее посмотреть, то сразу становится понятно, что задержалась где-то в 17-20 годах. Она понимает, что одеваться нужно по-другому, но как непонятно.
						На разбор я пошла только потому, что она очень настаивала, хотя сама уже понимала бесполезность этого мероприятия.<br><br>
						Особо разбирать было нечего, типичный тинэйджеркий гардероб. Масса маечек, водолазок и т.д., а если это что-то другое, например был брючный костюм, то только на выброс, т.к. фасон морально устарел. В последнее время покупались в основном джинсы и что-то к ним. Обувь и аксессуары в той же опере. <br><br>
						В результате было отобрано 2 комплекта одежды до первого шопинга и составлен список покупок. Но точной уверенности в том, что он состоится, у меня пока нет, т.к. она сразу не записалась, а после разбора уже прошло около месяца. <br><br>
						Заработала 4000 руб. (1,5 часа). <br><br>
						<strong>Всего заработано 36 000 руб.</strong><br><br>Бовтунова Наташа</p></blockquote></div>

						<div>
							<img src="https://www.glamurnenko.ru/products/imageschool/images/ava_none.jpg" alt="" style="
								float: left;
								margin: 40px 80px 0px 60px;
						">
											<blockquote><p style="text-align:left;margin-left: 330px;">
												В РЕЗУЛЬТАТЕ ЗА 3 КОНСУЛЬТАЦИИ И 1 ПЕРВУЮ ВСТРЕЧУ, КЛИЕНТКА МНЕ ЗАПЛАТИЛА 6 Т.Р., МЫ ТАК ДОГОВОРИЛИСЬ НА ПЕРВОЙ ВСТРЕЧЕ.
<br/><br/>
ДОБАВЛЕНО:<br/>
ИТОГО: ВСЕ МОИ ЗАРАБОТКИ СОСТАВИЛИ:<br/>
31 ТЫС РУБ: 2 ШОППИНГА (10 ТЫС) + 3 КОМПЛЕКСНЫЕ КОНСУЛЬТАЦИИ (15 ТЫС) + ПЕРВАЯ ВСТРЕЧА 6 ТЫСЯЧ<br><br>
Всем привет, Катя, девочки!<br><br>
Пишу отчет про первый шоппинг!<br><br>
<strong>До этого был разбор гардероба с клиенткой</strong> ...<br><br>
<strong>Шоппинг длился около 3 часов включая расписывание комплектов.</strong><br><br>
...<br><br>
По итогам я составила 14 комплектов.<br><br>
Мои выводы:<br>
До этого я проходила по магазинам и кое-что подобрала. Но на практике столкнулась с тем, что не всегда остаются нужные размеры. Так подобрала 1 платье-футляр и к нему пиджак с рукавом 3/4, но не было размеров, аналогично было с пиджаком в мелкую клетку в другом отделе(((<br><br>
Недостаточно проработала магазины.видимо нужно готовить накануне за 1-2 дня,а я обходила некоторые за неделю)<br><br>
Клиентка сначала возражала против новых комплектов,но я говорила-будем мерить и все. Поняла, люди все-таки сначала сопротивляются новому. И заметила,что клиентка тянулась к вешалкам с похожими как у нее вещами. Я говорила, что такое мерить мы не будем, так как уже были подобные вещи в гардеробе.<br><br>
Клиентка говорила-а может еще посмотрим прежде чем брать, но я настаивала,чтобы покупать сейчас.<br><br>

Теперь о моих впечатлениях.<br>
Сначала я немного волновалась и в основном конечно, из-за этих размеров.Но потом стала просто смотреть и подбирать другие вещи.<br><br>
Когда клиентка мерила я ей все рассказывала, что этим корректируем, чем еще надо дополнить итд.<br><br>
<strong>Она осталсь довольна.</strong> За 3 часа я достаточно устала. Сделала вывод,что надо идти в более крупный ТЦ. Изначально я рассудила раз у нас 1/2 гардероба, то выбрала 2 соседних небольших ТЦ. А для внушительных шопингов,конечно,надо большие ТЦ.<br><br>
<strong>Сегодня на работе, когда она выходила в пальто и новом платке ее даже не узнали. Приятно видеть результаты своей работы)))</strong> За это время я заработала 6 тыс.руб.<br><br>
							Валерия Титова</p></blockquote></div>

							<div>
								<img src="https://www.glamurnenko.ru/products/imageschool/images/ava.jpg" alt="" style="
									float: left;
									margin: 40px 80px 0px 60px;
							">
												<blockquote style="background-color: rgba(235,228,202,1);"><p style="text-align:left;margin-left: 330px;">
													ПРОВЕЛА 5 КОНСУЛЬТАЦИЙ ПО ЦВЕТУ ВЖИВУЮ, 2 ОН-ЛАЙН; 4 РАЗБОРА ГАРДЕРОБА; 2 ШОПИНГА; ЗАРАБОТАЛА 14 ТЫС.РУБ; СОЗДАЛА САЙТ; НАПИСАЛА 7 СТАТЕЙ; СОЗДАЛА КНИГУ И СЕРИЮ ИЗ 5 ПИСЕМ; У МЕНЯ 31 ПОДПИСЧИК.
													<br><br>
													1) Стать имиджмейкером я и не мечтала, но мне, как и любой девушке всегда была интересна тема моды и стиля. К тому же я чаще, чем моя семья бывала за границей и привозила всем одежду. Потом поняла, что для большей эффективности и саморазвития хорошо бы иметь базовые профессиональные знания. Между делом смотрела, выбирала школы стилистов. На ваш набор в Школу Имиджмейкеров отреагировала как «сейчас или никогда» и нырнула. О чем нисколько не жалею.

<br><br>
2) Что я сделала за 2 месяца обучения в Школе Имиджмейкеров. Провела 5 консультаций по цвету вживую, 2 он-лайн; 4 разбора гардероба; 2 шопинга; заработала 14 тыс.руб; создала сайт; написала 7 статей; создала книгу и серию из 5 писем; у меня 31 подписчик. Пока не пиарилась.
<br><br>

3) Задания по продвижению не выполняла, т.к. посчитала, что ещё не достаточно подкована как специалист и нужно пока тренироваться на «ближнем круге», чем и занимаюсь. И вообще, буду прослушивать весь материал по второму-третьему разу. Ещё отредактирую статьи по стилям и шопингу. Они у меня написаны, но не впечатляют. Плюс ко всему, буду работать над самоконтролем или, как это сейчас называется, self-management. Лишний раз удостоверилась, что жесткое планирование наше всё.
<br><br>

4) План на ближайший месяц составила. В общих чертах, это контент сайта, маркетинг и продажи, практика.
<br><br>

5) Эмоций было очень много разных. Это, конечно, и приятное ожидание трех раз в неделю занятий, новые знания, выполнение практических занятий. Самые положительные и вдохновляющие эмоции были после первого шопинг и создания сайта с первыми статьями. Эти дни я не спала и, казалось, питалась воздухом, но энергии было на целый пионеротряд! Только потом сработал эффект маятника и где-то к 16-17 занятию, поняла, что начала себя распускать. Спасал энтузиазм Кати и «волшебные пинки», подбадривания Андрея. На многие вещи у меня открылись глаза, я начала по-другому думать, оценивать работы стилистов на страницах журналов.
<br><br>

6) В качестве пожеланий, было бы просто замечательно разнообразить наглядный материал. Я уже слушала ваши вдохновляющие тренинги и семинары, полезную теорию повторить никогда не вредно, а вот некоторые картинки успели изрядно приесться.
<br><br>

Большое спасибо Катя, Андрей и вам, девушки, за эти два месяца интенсивных занятий! Можно с уверенностью сказать, они были очень полезными. Надеюсь, что дальше будет ещё интереснее, жду с нетерпением Имидж-Клуб.PRO
<br><br>
Анастасия Матвеева</p></blockquote></div>

<div>
	<img src="https://www.glamurnenko.ru/products/imageschool/images/ava_none.jpg" alt="" style="
		float: left;
		margin: 40px 80px 0px 60px;
">
					<blockquote><p style="text-align:left;margin-left: 330px;">
						ПРОВЕЛА 4 ПЕРВЫХ ВСТРЕЧИ, 3 РАЗБОРА ГАРДЕРОБА, 4 КОНСУЛЬТАЦИИ ПО ЦВЕТОТИПУ, 3 ШОПИНГА. ДЕНЕГ НА ШОПИНГИ ПОТРАТИЛИ ОКОЛО 80 Т.Р. Я ЗАРАБОТАЛА 20 Т.Р., Т.К. БЫЛА ТОЛЬКО ОДНА КЛИЕНТКА, А ПОДРУГИ БЛАГОДАРИЛИ ПОДАРКАМИ)))<br><br>
						Доброго времени, Катя, Андрей и девочки!<br><br>
						Вот и закончилось наше увлекательнейшее обучение в школе имиджмейкеров… Так жаль! Из-за разницы во времени не могла присутствовать «живьем», проходила обучение в записи. Большое спасибо за такую замечательную возможность! Всегда можно прослушать и повторить нужные материалы!<br><br>
						Темой красоты и моды интересовалась давно, прошла обучение по стилистике для себя. Вот только зарабатывать на этих знаниях не получалась, т.к. в основном была только теория. Не хватало четкой системы именно практической работы с клиентами. Просматривала варианты других курсов по этой теме, и тут пришло письмо с рассылкой Екатерины, хотя я не была на нее подписана. С огромным удовольствием и интересом просмотрела информацию на сайте и решила обучаться именно в Катиной Школе имиджмейкеров.<br><br>
						За время тренинга сделала не так много,как хотелось бы… Не все домашние задания выполнила.<br><br>
						<strong>Провела 4 первых встречи, 3 разбора гардероба, 4 консультации по цветотипу, 3 шопинга. Денег на шопинги потратили около 80 т.р. Я заработала 20 т.р., т.к. была только одна клиентка, а подруги благодарили подарками)))</strong><br><br>
						В планах на ближайший месяц запустить доработанный сайт, написать статьи, книгу и серию писем, продвигать свои услуги он-лайн и «вживую», наработать клиентскую базу, изучить ассортимент в магазинах, прослушать все занятия еще раз и законспектировать их, сделать все ДЗ, прочитать рекомендованную литературу и просмотреть фильмы, журналы и материалы в интернете. Нужно доработать свой имидж, т.к. многое хочется изменить)) Работы еще очень-очень много, но она вся в удовольствие!<br><br>
						<strong>Катя, Андрей, спасибо вам огромное за такой замечательный тренинг! Все эмоции не передать-мне ОЧЕНЬ понравилось!! Настолько четко, конкретно, доступно выдана информация! И именно та, которая появляется в процессе работы с клиентами и ни в каких книгах ее просто нет!</strong> Очень интересно «думать образом, а не шмоткой»)) Совершенно иначе стали восприниматься магазины. Хочется переодеть людей на улице)) Катя, спасибо Вам за Ваш профессионализм и доброжелательность. Спасибо Андрею за доступные и понятные уроки по созданию своего сайта и работе с ним , т.к. в этом вопросе я полный «чайник»))! Спасибо Калин Руслану за техподдержку! Спасибо всем девочкам, которые выполняли ДЗ, т.к.получила очень много полезной информации при их разборе!
											<br><br>		Людмила Оленберг</p></blockquote></div>

						<div>
														<img src="https://www.glamurnenko.ru/products/imageschool/images/ava103.jpg" alt="" style="
															float: left;
															margin: 40px 80px 0px 60px;
													">
																		<blockquote style="background-color: rgba(235,228,202,1);"><p style="text-align:left;margin-left: 330px;">
																			ИТОГО ЗАРАБОТАЛА: 25,000 Р<br><br>
																			<strong>Первые 5 тысяч рублей были заработанны на комплексной консультации он-лайн.</strong> Первая консультация была проведена девушке Екатерине из г.Самара, 33 года. Она работает бухгалтером. Стоимость консультации со скидкой 50% составила 2,500 рублей. Провела 3 консультации: по цвету, фигуре и стилю. Клиентка осталась довольна, написала положительный отзыв. Она часто бывает в Дубае на отдыхе. Планирует приехать в ноябре в Дубай, хочет пойти со мной на шоппинг. Оставила отзыв на консультацию.<br><br>
																			Затем была консультация с девушкой Мариной, 29 лет из г.Кирова. Она не работает. Находится в декрете по уходу за малышом. До родов у нее были красивые вещи в гардеробе, но после родов кроме спортивного костюма непонятного болотного цвета ничего не оказалось. Она была крайне удивлена, что можно подобрать и другую удобную одежду для прогулок с ребенком. Ей провела комплексную консультацию. Стоимость со скидкой составила 2,500 руб. Оставила отзыв на консультацию.<br><br>
																			Заработала: 5,000 рублей. <br><br>
																			Потом было еще две комплексных консультации он-лайн. <br><br>
																			Дина, 42 года, г.Милан. Работает в модной индустрии, специализируется на продаже модной брендовой одежды и аксессуаров. Но свой гардероб скучный, темный, однообразный. Аксессуаров практически не носит, так как не понимает, что ей к лицу, а что нет. Я сначала, удивилась, что человеку из модной индустрии нужна консультация. Оказывается и тем, кто ни один год «варится» в модной индустрии, тоже нужна помощь. Провела 3 консультации как обычно, но третью консультацию по стилю расширила, включила тему аксессуаров для нее. Она осталась очень довольной. Стоимость консультации со скидкой: 2,500 руб. <br><br>
																			Алёна, 26 лет , г.Мельбрун. Тоже работает в модной индустрии и одновременно учится в университете. Работает менеджером магазина Karen Millen. Провела комплексную консультацию. Стоимость 2,500 по скидке.<br><br>
																			<strong>Итого заработала: 10,000 рублей.</strong><br><br>
																			Далее был шоппинг-сопровождение в г.Дубай. Ирина, 23 года. Молодая девушка, временно не работает, замужем за бывшим футболистом из Бразилии. Муж работает менеджером футбольной команды. Она ему помогает. Муж старше на 15 лет. В их окружении высокооплачиваемые футболисты с женами, с которыми часто приходится пересекаться не только по работе, но и на играх и на отдыхе. В старом гардеробе преобладали вещи «а-ля девочка-припевочка». Нужны вещи другого уровня. Нужно было создать образ стильной молодой девушки-жены и, в то же время, не сделать ее старше, чем она есть на самом деле. Изначально бюджет был заявлен 1000 евро, поговорив с ней и объяснив, что этих средств недостаточно, она согласилась увеличить бюджет до 2000 долларов. Предварительный подбор гардероба делала исходя из 2000 долларов. Но в день шопинга она заявила, что согласна потратить не больше 1000 евро как планировала вначале. По ходу шопинга она вошла во вкус и была согласна потратить больше. Но в итоге собрали комплекты ровно на 1000 евро. Кое-какие достойные вещи в гардеробе у нее уже были: сникерсы на танкетке, хулиганистые джинсы, кожаная куртка-бомбер, брюки, юбка-карандаш. Эти вещи тоже учитывала при составлении комплектов. <br><br>
																			Купили (цены перевела в рубли): <br>
																			1.       Спортивное струящееся платье со шлевками на рукавах и деталеровкой на плечах вишневого цвета Oasis – 2,770 р<br>
																			2.       Платье Massimo Dutti c кожаной отделкой -4,285 р<br>
																			3.       Юбка кожаная с имитацией запаха жемчужно-серого цвета Topshop – 2,380 р<br>
																			4.       Три топа разных по цвету и фасону (один с принтом) (Oasis, Topshop) – 7,015 р<br>
																			5.       Рубашка хлопковая светлый деним Topshop – 2,460 р<br>
																			6.       Жакет цвета цикломен Zara – 2,815 р<br>
																			7.       Ремень тоненький Charles &amp; Keith – 1,300 р<br>
																			8.       Балетки с ремешком и пряжкой Charles and Keith – 2,000 р<br>
																			9.       Набор тоненьких браслетов Aldo Accessorize – 600 р<br>
																			10.   Браслет светлая кожа + металл Aldo Accessorize – 430 р<br>
																			11.   Шарфик Aldo Accessorize – 700 р<br>
																			12.   Украшение на шею 2 шт  Aldo Accessorize  – 1500 р<br>
																			13.   Серьги Topshop – 820 р<br>
																			14.   Клатч с интересной окантовкой – цепочкой Topshop – 2,800 р<br>
																			15.   Сумка DKNY цвета черешни – 11,200 р <br>
																			Не купили только одни запланированные туфли на каблуке, так как она опаздывала на встречу, а те которые успели померять, не подошли по размеру. Обещала докупить самостоятельно.
																			Клиентка осталась очень довольна. По окончанию шопинга она сразу переоделась в новые вещи, надела аксессуары и взяла новую сумку. В обновленном образе она пошла на встречу с мужем и друзьми. Ее переполняли эмоции! (Меня наверное еще больше чем ее). Говорила, что не может поверить, что можно так все сочетать и у нее теперь столько красивых вещей в гардеробе. Не успела я добраться до дома как она мне присылает смс, что получила кучу комплиментов от мужа и друзей. На следующий день прислала отзыв, хотя я ее даже не успела попросить. <br><br>
																			По времени получилось 5 часов. Заработала 15,000 р. + шикарный отзыв<br><br>
																			<strong>Итого заработала: 25,000 р</strong><br><br>Александра Пеффер</p></blockquote></div>

																			<div>
																				<img src="https://www.glamurnenko.ru/products/imageschool/images/ava104.jpg" alt="" style="
																					float: left;
																					margin: 40px 80px 0px 60px;
																			">
																								<blockquote><p style="text-align:left;margin-left: 330px;">
																									ПО ИТОГАМ РАЗБОРА ГАРДЕРОБА БЫЛ СОЗДАН ОТЧЕТ НА БОЛЕЕ, ЧЕМ 20 СТРАНИЦ- КЛИЕНТКА БЫЛА В ВОСТОРГЕ, СКАЗАЛА, ЧТО РАСПЕЧАТАЕТ И ПОВЕСИТ В ШКАФУ — ТАК МНОГО ВАРИАНТОВ И ТАК ВСЁ ПОНЯТНО.
<br/><br/>
ИТОГ 12000 РУБ И МОРЕ УДОВОЛЬСТВИЯ.
<br/><br/>
Моя клиентка знакома со мной уже какое-то время, я оформляла ей спальню текстилем, и за это время у нее сложилось представление о моем вкусе. Поэтому когда я ей заикнулась о том, что пробую себя в новом качестве, она попросила приехать к ней разобрать гардероб и составить план будущих покупок (да, впереди шопинг с ней).<br><br>

Молодая женщина, 32 года, кормящая мама. Работала в офисе иностранной компании, «яркая зима», невысокая, тип фигуры — треугольник основанием вниз (ярко-выраженный). Преобладал офисный стиль в одежде, но, забеременев и родив, погрязла в леггинсах-лосинах и миллионе трикотажных милых свитерочков и трикотажных платьиц. Сошла с каблуков, купила балетки и кеды. Тревожный звоночек раздался от мужа, который пожелал на Новый год, чтобы она купила ультра короткое мини с открытой спиной.Пожелание было выполнено, поэтому гардероб пополнился еще и этим странным платьем.<br><br>

Сам разбор гардероба прошел в очень позитивном ключе, видимо потому что клиентка морально была готова, а я полна энтузиазма. Сразу были выброшены все растянутые и застиранные вещи (трикотаж выходит из стоя очень быстро), в мусорку отправилось и любимое платье с запахом из трикотажа, которое она носила 10! лет. Обнаружен бирюзовый жакет и ярко-розовое платье, которые ни разу не одевались, так как не было понимания с чем это носить.<br><br>

Новая жизнь появилась у длинной юбки в пол, которую мы примерили с двумя кардиганами, с ремешком поверх, что зрительно делало талию тоньше, а ноги длиннее, при этом скрывалась широкая часть бедер. Для варианта прогулок по улице длинную юбку надели с двубортным коротким полупальто с поясом — получился очень женственный образ. Вообще, цель разбора гардероба, которую я озвучила клиентке, после разговора с ней — избавится от откровенно спортивного стиля, уйти в сторону женственности и не потерять при этом в практичности, так как вся жизнь всё-равно сейчас сосредоточена на ребенке, и выходить куда-то «в свет» всё-равно еще не получается.<br><br>

Получилось множество вариантов с кардиганами-топами-платками-ремешками и джинсами-леггинсами, ожила длинная юбка. И тут клиентка достает классные шерстяные шорты и сетует, что, мол, не с чем совершенно их носить. Они темно-серого цвета. тут же были придуманы комплекты с ними — как женственные (разнообразные многослойные верхи плюс плотные серые колготки плюс темно серые ботильоны из прошлой жизни, а верхняя одежда — короткое двухбортное пально под пояс), так и более повседневные — шорты с плотными колготками и кедами (кожанные бордовые) и дафлкот в качестве верхней одежды или куртка-косуха.<br><br>

Составили список, что докупить:<br>
- базовые топы — при наличии множества кофточек и свитерков, не нашлось ни одного приличного топа под кардиганы. Минимально- белый топ к кардиганам и яркий, ягодного цвета под свитшоты и свитера.<br>
-Обувь с тонкими ремешками яркого цвета- зеленый-ярко желтый-синий для женственных образов и более теплой погоды,когда все комплекты можно будет носить без верхней одежды
-Тонкая джинсовая рубашка для стильных комплектов в юбкой-шортами-и прочими низами<br>
-базовое платье отличного цвета от заполонившего гардероб цвета фуксии, розового и сиреневого- носить с жакетом, кардиганами<br>
- небольшие сумочки — клатч, сумочку через плечо — так как в гардеробе только офисные сумки формата а4<br>
- современные украшения — в шкатулке одни «бусики» разных форматов.<br>
<br>
По итогам разбора гардероба был создан отчет на более, чем 20 страниц- клиентка была в восторге, сказала, что распечатает и повесит в шкафу — так много вариантов и так всё понятно.<br><br>

Я осталась в неописуемом восторге от разбора гардероба — мне очень понравился этот процесс — собирать новые комплекты из имеющихся и достраивать образ недостающими вещами — берешь вещь — и перед глазами десяток картинок с чем её можно скомбинировать.<br><br>

При этом важно учитывать потребности и привычки клиентки — например, моей клиентке подошли бы прямые фасоны или не приталенные вещи, но она долго и усердно ходила в спортзал и качала пресс, благодаря чему у нее талия стала просто осиной))) Любые мои попытки снять ремешки или убрать с талии акценты были встречены в штыки. Я не стала сильно переубеждать — когда мы пойдем на шопинг, я принесу ей в примерочную несколько вариантов, чтобы она увидела своими глазами и возможно, изменила свое отношение к не приталенным фасонам.<br><br>

Критиковать свою работу не стану, так как получила помимо денег огромное удовольствие, и не смотря на то, что к концу четвертого часа сильно устала, возможность новых комплектов придавала второе дыхание, и разбор гардероба закончился тем, что клиентка просто рухнула на диван, не в силах что-либо примерять дальше. Хочу больше разборов гардероба!)<br><br>

<strong>Итог 12000 руб и море удовольствия.</strong><br><br>Виолетта Фомина</p></blockquote></div>

<div>
								<img src="https://www.glamurnenko.ru/products/imageschool/images/ava_none.jpg" alt="" style="
									float: left;
									margin: 40px 80px 0px 60px;
							">
												<blockquote style="background-color: rgba(235,228,202,1);"><p style="text-align:left;margin-left: 330px;">
													В РЕЗУЛЬТАТЕ ЗА 3 КОНСУЛЬТАЦИИ И 1 ПЕРВУЮ ВСТРЕЧУ, КЛИЕНТКА МНЕ ЗАПЛАТИЛА 6 Т.Р., МЫ ТАК ДОГОВОРИЛИСЬ НА ПЕРВОЙ ВСТРЕЧЕ.
<br/><br/>
ДОБАВЛЕНО:<br/>
ИТОГО: ВСЕ МОИ ЗАРАБОТКИ СОСТАВИЛИ:<br/>
31 ТЫС РУБ: 2 ШОППИНГА (10 ТЫС) + 3 КОМПЛЕКСНЫЕ КОНСУЛЬТАЦИИ (15 ТЫС) + ПЕРВАЯ ВСТРЕЧА 6 ТЫСЯЧ<br><br>
Всем привет,<br><br>
<strong>Пришла делиться своим впечатлением от первого клиента.</strong> Честно говоря, ни как не ожидала, что все так получится, однако история вышла следующая. Во время проведения школы имиджмейкеров моей единственной подопытной была моя сестра, на которой я отрабатывала все задания, подбирала цвета, комплекты в разных стилевых направлениях, выбрали новую интересную сумку и аксессуары, её образ стал более законченным и интересным. На работе сестры коллега поинтересовалась, как она так изменилась, сестра ей сказала, что есть знакома я девушка-имиджмейкер, конечно, она ни слова не упомянула о нашей с ней родственной связи.<br><br>
На вопрос зачем она так сделала, сестра сказала мне, что я же хотела работать, вот и получай. Вот так я заполучила первого клиента, сестра ради эксперимента даже согласилась сидеть с моим малышом. Девушка мне позвонила, и я назначила ей первую встречу в ТЦ Карамель, в нашем городе малое подобие Европейского. <strong>Честно говоря, было очень страшно</strong>, к первой встрече я готовилась дольше, чем к экзамену в универе, спасибо Кате и её волшебной анкете, которая очень помогла. <br><br>
Благо, с клиенткой мне повезло, не пришлось её убеждать, что с гардеробом что-то не то, она сама хотела перемен, за тем и пришла. После беседы мы разобрали, что её гардероб очень скуден, состоит в основном из водолазок разных цветов и трикотажа, которые она носит с брюками, для свободного времени у неё есть джинсы, куча разных футболок и толстовок, при этом девушка хотела выглядеть элегантной и компетентной и в свободное время хочет быть женственной. Платьев совсем в гардеробе не было, джинсов тоже, не говоря уже о пиджаках. <br><br>
Времени на встречу мы затратили чуть больше часа, т.к. обсуждали вопросы в анкете, клиентка много говорила, решили провести комплексную консультация по цвету, фигуре и стилям. Единственное пожелание у клиентки было, чтобы провести все встречи за 1 неделю, т.к. потом у неё не будет свободного времени, из-за плотного рабочего графика. Цветотип было определить легко на глаз, т.к. девушка явное натуральное лето, и тип фигуры тоже был понятен – треугольник основанием вниз. <br><br>
<strong>Потом была консультации по цвету</strong>, поскольку я дотянула с платками до последнего, в нужный момент их у меня не было, пришлось одолжить платки. Хорошо, что я сама лето и делала ДЗ по сочетаниям для себя, поэтому кое-что взяла оттуда, кое-какие идеи из ДЗ девочек, вообщем неплохо подготовилась, клиентка была довольна, поскольку она с цветом работала ещё меньше чем я и новые знания ей были очень интересны, некоторые правила сочетания цветов её очень удивили, однако она обещала все попробовать. <br><br>
<strong>Консультация по фигуре</strong> прошла более гладко, тема фигуры мне как-то вообще легче всего далась, клиентка прислала мне фотографии, какие было нужно, я все расчертила, материал подготовила, правда картинки многие брала из Катиных презенташек, ну кое-что и в нете нашла. Клиентка явный треугольник основанием вниз, но очень высокая и красивая линия шеи и декольте, её удивило, то что была расчерчена карта длин, потом также я рассказала про возможности роста, что она никогда не делала и также ей понравилось, как можно привлечь внимание к удачным зонам. От этой консультации я сама получила большое наслаждение, была уверена в себе. Последняя консультация по стилям не была столь удачной, потому что возникла сложность в подборе стилей для клиентке, не уверена, что подобрала ей все правильно. Конечно про стили я рассказала, ткани, аксессуары, куда носить, картинок подобрала немного с учетом пропорций и образа жизни клиентки, хотя потратила кучу времени, вроде клиентка осталась довольна. <br><br>
Только я теперь шопинга боюсь очень, вдруг она захочет его потом, в первую очередь надо ассортимент досконально изучать, потом страшно, что вдруг что-то не получится собрать. Однако начало положено, надо действовать дальше, теперь вот каждый свободный час стараюсь в ТЦ выбраться, все сканирую, делаю шпаргалки. <strong>В результате за 3 консультации и 1 первую встречу, клиентка мне заплатила 6 т.р.,</strong> мы так договорились на первой встрече. За эти деньги я вымотала себе все нервы и практически не спала всю неделю, тк. делала все ночами. Однако теперь появилась гордость за то, что я все-таки сделала это и огромное желание продолжать дальше, надо срочно все ДЗ сделать, материал весь понадобится. Ну и платочки конечно едут ко мне)))). <br><br>
<strong>Девочки, кто собирается работать – не тяните с платками, т.к. они могут потребоваться в любой момент.</strong>
<br><br>
<strong>Отчет о заработанных деньгах: 25 тыс руб: 2 шоппинга (10 тыс), 3 комплексные консультации (15 тыс). Общий зароботок со всех встреч 31 тыс (26+6 отчитывалась выше)</strong><br><br>
Для нашего города это средняя цена – час шопинга 1 тыс, комплексная консультация 5 тыс. 2 клиентки после комплексной консультации сходили со мной на шопинг, 3 пока думает, но и консультация была недавно. Шопинги прошли в ТЦ в средней, ценовой категории. На первый шопинг бюджет был 30 тыс руб: девушка работает менеджером в офисе, собрали 2 комплекта для офиса (платье футляр +украшение + пиджак ),( брюки +блузка и рубашка +платочек), туфли, сумка. Бюджет на второй шопинг был 40 т.р. клиентка- врач, одежда требовалась для свободного времени. Девушка очень яркая, красивая, среднего роста, но не может носить каблуки (максимум 3см). Предпочитает свободное время проводить активно: ездить на природу, ходить в кино, на выставки. Выбрали (платье без рукавов в морском стиле + пиджак с коротким рукавом + украшение + туфли с открытым носом на маленьком каблуке, также футлярное платье для театра и прочих выходов, пиджак подходит), (прямые брюки, по покрою как джинсы+2топа+джинсовые шорты +босоножки с разноцветной танкеткой), сумка, клатч. Шопинги прошли относительно спокойно, ездила сама заранее, все выбрала. Не знаю, насколько все это правильно, клиентки вроде довольны очень. Утешаю себя мыслью Кати, что сами бы они все-равно лучше не сделали)). <br><br>
Единственная проблема, в нашем городе нет таких больших ТЦ, как в Москве, чтобы была и одежда и магазины с хорошей обувью в одном месте, со второй клиенткой пришлось обувь покупать на второй день, т.к. надо было ехать в другое место и побоялись в пробку попасть. Третья клиентка с которой была консультация, но не было шопинга – с проблемной фигурой, явный треугольник основанием вниз, массивные бедра и ноги + маленький рост 150 см, честно немного боюсь шопинга, т.к.не очень представляю где на неё брать одежду, кое-что конечно я присмотрела, ещё в выходные пойду снова обойду магазины.<br><br>Ирина Швакова</p></blockquote></div>
<div>
	<img src="https://www.glamurnenko.ru/products/imageschool/images/ava_none.jpg" alt="" style="
		float: left;
		margin: 40px 80px 0px 60px;
">
					<blockquote><p style="text-align:left;margin-left: 330px;">
						СЕЙЧАС У МЕНЯ В ПРОЦЕССЕ ДВЕ КЛИЕНТКИ НА ПОЛНЫЙ ПАКЕТ УСЛУГ. ПРОВЕЛА УЖЕ КОНСУЛЬТИРОВАНИЕ ОБОИМ. НА ОЧЕРЕДИ РАЗБОР ГАРДЕРОБА И ОДИН ШОПИНГ В КОНЦЕ ЭТОЙ НЕДЕЛИ, ОДИН НА СЛЕДУЮЩЕЙ. ЗАРАБОТАЛА ЗА ПРОШЛЫЙ МЕСЯЦ, ПОКА ЕЩЕ БЕЗ ШОПИНГОВ 7,5 ТЫС. РУБ.
<br/><br/>
Добрый вечер, Екатерина, Андрей, девочки.<br><br>
Здорово, что есть возможность поделиться опытом обучения, своими эмоциями)) Стать имиджмейкером было моей давней мечтой. Я чувствую, что именно в этой профессии я смогу что-то качественно дать людям, здесь реализуются и соберутся воедино те навыки и умения, те способности, которыми обладаю и которые еще предстоит освоить. А то как люди выглядят, как одеваются, какой образ создают интересовало меня с самого детства. Живя тогда долгое время Европе, я видела, что нашу русскую женщину можно было определить в толпе безошибочно, СРАЗУ, она отличалась разительно от других женщин и сравнение это было не в ее пользу! Я уже тогда стала искать ответ ПОЧЕМУ?! По каким деталям? И почему, например, то как выглядят европейские старушки, так разительно отличается от того, как выглядят наши?)) И дело даже не в скудности выбора одежды в то время, а в абсолютной безграмотности в вопросах имиджа и стиля, которая наблюдается порой и сейчас . А главное в том, к сожалению, что наши женщины просто не умеют любить себя. Честное слово, хочется что-то менять))))))<br><br>
Обучение у Екатерины я получаю уже после прохождения дистанционных курсов имиджмейкеров-стилистов. Получила хорошую «теоретическую» базу знаний и свои первые практические шаги начала уже примерно за месяц до обучения у Екатерины. Сразу стало понятно: НЕ ХВАТАЕТ именно практических знаний, как вести «продажу», консультирование, какова структура встречи с клиентом, как продвигать свои услуги и многое другое. На мои справедливые вопросы в центр обучения своим практикующим учителям, мне сказали, что каждый из них чуть ли не вслепую самостоятельно нащупывал СВОИ методы работы, поэтому не вправе мне их навязывать и предоставляют мне полную свободу выбора и наработки своих собственных)))))) <strong>Поэтому, когда я узнала, что набираются курсы имиджмейкеров с упором на ПРАКТИКУ, я очень обрадовалась и присоединилась без раздумий!</strong> (жаль средств хватило только на стандарт) <br><br>
Каждое новое занятие, где Екатерина открыто делилась своими наработками, были для меня просто бальзамом))) т.к. я уже успела потыкаться на ощупь, вслепую, как мне рекомендовали)) Я и до этого провела уже несколько первых встреч, консультаций, шопингов и понимала, как не хватает четких алгоритмов действий. И как же долго их придется нарабатывать! <strong>Екатерина, Андрей спасибо Вам большое, вы как раз отвечали на все те самые вопросы, которые неизбежно возникают с началом практики!!!</strong><br><br>
<strong>Поэтому за эти два месяца, я совсем по другому, и совсем с другим результатом провела несколько первых встреч и уже не с родственниками и друзьями, как это было раньше, а с реальными клиентами. Провела две полных консультации без шопинга. Сейчас у меня в процессе две клиентки на полный пакет услуг. Провела уже консультирование обоим. На очереди разбор гардероба и один шопинг в конце этой недели, один на следующей. Заработала за прошлый месяц, пока еще без шопингов 7,5 тыс. руб. </strong><br><br>
Уделила еще много времени набору всевозможных материалов – подборки по цветотипам, типам фигур, стилям, на каждый тип лица (аксессуары, прически и т.д.) т.к. это действительно ОЧЕНЬ пригождается при работе с реальными клиентами! Находила не один километр по торговым центрам, после чего понимаю, что процесс изучения ассортимента магазинов – должен быть скорее всего постоянный! К большому сожалению не было времени на сайт, а тяп ляп делать не хочется. На ближайший месяц планирую продолжить практику консультирования и шопингов, планирую заняться созданием сайта. Параллельно рассматриваю возможность проводить очные семинары, поэтому важно наработать интересные темы для этого.<br><br>
В заключение скажу, что эмоций и озарений было и правда много)) часть их я уже описала…. Но напишу еще что после просмотра кино «Дьявол носит Прада», я испытала гордость, что и я теперь причастна к этой огромной и мощной индустрии КРАСОТЫ И МОДЫ, казавшейся мне раньше чем-то, ну почти не достижимым))))<br><br>
<strong>С надеждой на новые открытия и озарения, жду теперь занятия клуба имидж-PRO.</strong><br><br>
СПАСИБО.<br><br>Екатерина Мелякова</p></blockquote></div>

<div>
								<img src="https://www.glamurnenko.ru/products/imageschool/images/ava105.jpg" alt="" style="
									float: left;
									margin: 40px 80px 0px 60px;
							">
												<blockquote style="background-color: rgba(235,228,202,1);"><p style="text-align:left;margin-left: 330px;">
													Я ЗАРАБОТАЛА 5000 РУБ; САЙТ СОЗДАЛА; СТАТЕЙ НАПИСАЛА 3 ГОТОВЫХ И 2 СТАТЬИ В НАБРОСКАХ И ОТДЕЛЬНЫХ МЫСЛЕЙ; КОНСУЛЬТАЦИЙ ПРОВЕЛА: 4; РАЗБОР ГАРДЕРОБА: 1; ШОППИНГ: 1<br><br>
													Здравствуйте Катя, Андрей и коллеги!<br><br>
													Я присоединяюсь ко всем кто высказывает сожалении об окончании школы.<br><br>
													Я решила стать имиджмейкером совсем недавно. Все началось с того, что после очередной беременности я располнела и перестала нравиться себе. К тому же мой гардероб перестал на меня налазить и я захотела измениться сама и найти для себя новый имидж. Стала лазить по просторам интернета и случайно наткнулась на сайт «Гламурненько» и стала скачивать бесплатные предложения. Вот тут то меня и осенило, что я хочу быть имиджмейкером. <br><br>Нашла подходящую мне по цене и способу обучения одну школу по имиджу и стала учиться, почти через месяц я уже записалась в школу Гламурненько и стала учиться сразу в двух школах, но уже через неделю поняла, что <strong>то чему учат Катя и Андрей это просто бесценно! Спасибо им за это!</strong> Первую свою школу я отложила т.к. в нашей школе больше заданий было да и уроки информативней, но планирую ее тоже закончить для общего образования, как говориться.<br><br>
													Теперь о том, что я успела сделать за 2 месяца. К своему стыду очень мало. Я мама 3 детей и самой маленькой уже скоро исполнится годик, поэтому у меня было очень мало времени на задания. Но планы у меня грандиозные. Я нагенерировала кучу информации для будущих консультаций, а так же запланировала несколько мероприятий для пиара (это и услуги «одного дня» в местных магазинах и работа с телевидением и журналом).<br><br>
													-консультаций провела: 4<br>
													-разбор гардероба: 1<br>
													-шоппинг: 1<br>
													-колличество потраченных денег: 20000 руб<br>
													-я заработала 5000 руб<br>
													-сайт создала<br>
													-статей написала 3 готовых и 2 статьи в набросках и отдельных мыслей<br><br>
													Все остальное, что связано с сайтом не сделала, т.к. я не успевала с уроками по имиджу, поэтому решила отложить создание сайта и его наполнение на время после окончания школы. Возможно это неправильное решение, но в виду моих жизненных обстоятельств мне так будет удобнее. К тому же, я наработала кучу идей и информации для сайта и буду обязательно все реализовывать в дальнейшем.<br><br>
													- Что касается того, что мне удалось сделать хорошо, а что нет, то скажу так, я пока недовольна своими результатами. Знаю, что могла бы лучше, но недостаток времени сказался на всех моих заданиях.<br><br>
													-план на ближайший месяц я для себя определила следующий:<br>
													1. это обязательно прослушать все лекции заново, но с тетрадкой в руке и с конспектированием особенно важных и интересных моментов.<br>
													2. доделать сайт и все что с ним связано<br>
													3. сделать книгу<br>
													4. сделать визитки и распространить через магазины.<br><br>
													Это пока моя программа максимум на этот месяц. На этом конечно останавливаться не буду, т.к. для себя я решила, что однозначно буду развиваться и дальше в этом направлении. <strong>Теперь для меня профессия имиджмейкер это смысл жизни.</strong><br><br>
													- Что касается эмоций, то их написать очень сложно это скорее звуки, размахивания рук и просто полный восторг. <strong>Я за это время действительно очень много получила знаний и самое главное ОПЫТА! Я стала уверенее в себе, я нашла свое любимое дело, я нашла свое будущее!</strong> У меня растут 2 дочери и у меня есть как минимум две будущие женщины, которым мои знания очень пригодятся! Даже ради этого стоило пойти в эту школу. Как знать, а может и они станут имиджмейкерами?<br><br>
													Если давать совет, что можно улучшить, то наверно не дам я такого совета, потому что все уроки построены грамотно во всех отношениях. Если только создание сайта сделать во второй части школы как отдельные уроки, чтоб на его создание уходило максимальное время и не распалялось между другими уроками. А в остальном вы ребята просто МОЛОДЦЫ!<br><br>
													Я хочу пожелать вам дальнейшего процветания в этом деле! Я надеюсь, что ваша школа станет общеизвестной и у вас не будет отбоя от учеников. Кате я желаю легких родов и здорового малыша! Я рада, что еще могу слышать ваши голоса в имидж-клубе и это здорово!<br><br> Спасибо всем и девочкам нашей школы. Все очень отзывчивые!<br><br>Наталья Черёмухина</p></blockquote></div>

													<div>
														<img src="https://www.glamurnenko.ru/products/imageschool/images/ava_none.jpg" alt="" style="
															float: left;
															margin: 40px 80px 0px 60px;
													">
																		<blockquote><p style="text-align:left;margin-left: 330px;">
																			Я ПРОВЕЛА ПЕРВЫЙ ПЛАТНЫЙ ШОПИНГ С РЕАЛЬНОЙ КЛИЕНТКОЙ (2,5 Т.Р, 500 РУБ/ЧАС 5 ЧАСОВ), 1 РАЗБОР ГАРДЕРОБА (1 Т.Р) С ДРУГОЙ И 2 КОНСУЛЬТАЦИИ С ТРЕТЬЕЙ (2 Т.Р.) ИТОГО МОЙ ЗАРАБОТОК СОСТАВИЛ 5,5 Т.Р
																			<br/><br/>
																			Привет, всем!<br><br>
																			На новогодних праздниках мне удалось поработать: <strong>я провела ПЕРВЫЙ платный шопинг с реальной клиенткой (2,5 т.р, 500 руб/час 5 часов), 1 разбор гардероба (1 т.р) с другой и 2 консультации с третьей (2 т.р.).</strong><br><br>
																			Это стоимость услуг со скидкой 50 % , будет в 2 раза дороже. Такие цены многим покажутся смешными, особенно тем, кто в Москве, Питере, но у нас в Новосибирске это средняя цена по рынку. <strong>Итого мой заработок составил 5,5 т.р.</strong><br><br>
																			Начну с шопинга. Конечно, я волновалась, идя на первую встречу, и на шопинг тоже. Но отступать было некуда. В целом, я шопингом довольна. Учту некоторые недоработки на будущее.
																			Клиентка 30 лет, юрист в страховой компании, после декрета выходит на работу, Очень подвижная, общительная, любит быть в центре внимания. Фигура модельная, подозреваю песочные часы. Рост 173. Дресс-код не строгий, его практически нет, «можно и кофточках» ходить.<br><br>
																			Я ее спросила про деловые костюмы, но она сказала, нет не нужно такое. Как потом оказалось на шопинге, она не против жакетов и прямых юбок была, и мы стали их мерить, хотя я заранее их не смотрела. Я присмотрела ей только жакет в стиле шанель как альтернативу деловому стилю. Но он не сел, хотя и мне и ей очень понравился.<br><br>
																			<strong>В итоге мы купили:</strong><br>
																			Одежда:<br>
																			Платье трикотажное белое с серым 600 Распродажа<br>
																			Платье кружево коктейльное 1300 Распродажа<br>
																			Джинсы 1700<br>
																			Блузка иск шелк голубой+ розовый 1000 Распродажа<br>
																			Юбка-карандаш Zara т.синий 1300 Распродажа<br>
																			Жакет 2000 Mango сине-бело-серый принт Распродажа<br>
																			Белая рубашка 1800<br>
																			Топ красный 700 Распродажа<br>
																			Итого одежда: 10400 р<br><br>
																			Аксессуары<br>
																			Сумка яркая 4500 скидка<br>
																			Сапоги 3500 скидка<br>
																			Ремень 800<br>
																			Украшения 600<br>
																			Колготки цветные 2 пары 400 скидки<br>
																			Итого аксессуары 9800 р<br><br>
																			Всего инвистиции в гардероб составили 20200 рублей<br><br>
																			Уже было у клиентки: Черные брюки, Черная юбка, Ботильоны 1 пара, Черная сумка<br><br>
																			<strong>В итоге были составлены следующие комплекты для работы и свободного времени:</strong><br><br>Ирина Шаталова</p></blockquote></div>

																			<div>
																											<img src="https://www.glamurnenko.ru/products/imageschool/images/ava106.jpg" alt="" style="
																												float: left;
																												margin: 40px 80px 0px 60px;
																										">
																															<blockquote style="background-color: rgba(235,228,202,1);"><p style="text-align:left;margin-left: 330px;">
																																ЖИЗНЬ МОЯ ПЕРЕВЕРНУЛАСЬ. И Я ТВЁРДО ВЕРЮ, ЧТО В ЛУЧШУЮ СТОРОНУ! У МЕНЯ УЖЕ ЕСТЬ ПОСТОЯННЫЕ КЛИЕНТЫ. КОГДА ОНИ РАССКАЗЫВАЮТ О ПЕРЕМЕНАХ В СВОЕЙ ЖИЗНИ, Я ПОНИМАЮ ПОЧЕМУ Я ВЫБРАЛА ЭТУ РАБОТУ.
<br><br>
Меня зовут Галина, я — имиджмейкер. Теперь я уже говорю это безо всяких оговорок, типа: — ну, это моё хобби.<br><br>

В сентябре 2012 года, когда я начала заниматься в Школе Имиджмейкеров Кати Маляровой, я и представить не могла, что:<br>
— через полгода я окажусь в Риме и буду вместе с Екатериной подбирать одежду РЕАЛЬНЫМ клиентам;<br>
— а ещё через месяц и меня будут шопинги с МОИМИ клиентами;<br>
— а через год после моего решения поучиться (так, для себя), я буду сама вести тренинг «Школа имиджа». И увижу как «мои девочки» преображаются прямо на глазах;<br>
— и САМОЕ НЕВЕРОЯТНОЕ для меня! Что через каких-то 1,5 года я уйду с престижной высокооплачиваемой работы главного бухгалтера и стану профессиональным имиджмейкером.<br><br>

И всё это значит, что жизнь моя перевернулась. И я твёрдо верю, что в лучшую сторону! У меня уже есть постоянные клиенты. Когда они рассказывают о переменах в своей жизни, я понимаю почему я выбрала ЭТУ работу.<br><br>

С 1 апреля начались занятия во второй Школе имиджа. Половина из новых «учениц» пришли по рекомендации выпускниц первой школы. А 9 апреля начнутся встречи в Клубе «Имидж и стиль». Это, благодаря моим первым ученицам, которые попросили «ещё что-нибудь придумать» ))<br><br>

Для нашего не очень большого Калининграда, имиджмейкер — профессия новая и не слишком понятная. Многие интересуются, но попробовать пока не решаются. И я очень благодарна тем девушкам и женщинам, которые решились на этот эксперимент.<br><br>

Да, я хотела написать отчет о заработанных деньгах. Рубеж 50 тысяч рублей пройден, и даже как-то незаметно. Я уже окупила и затраты на учёбу и поездку с Катей в Италию. Но самое главное — я изменила свою жизнь. Я теперь занимаюсь любимым делом и несу в этот мир красоту и радость.<br><br>

Катя, я безгранично тебе благодарна! Желаю тебе дальнейших успехов в твоём творчестве!<br><br>Галина Бартошевич</p></blockquote></div>

<div>
	<img src="https://www.glamurnenko.ru/products/imageschool/images/ava101.jpg" alt="" style="
		float: left;
		margin: 40px 80px 0px 60px;
">
					<blockquote><p style="text-align:left;margin-left: 330px;">
						ИТОГО: МОЙ ПЕРВЫЙ ЗАРАБОТОК (ЗА РАЗБОР И ОПРЕДЕЛЕНИЕ ЦВЕТОТИПА) 11000+18.000=29.000 Т.Р.
						<br/><br/>
						Пишу отчет о первых заработанных 29 т.р. С клиенткой, которая заказывала у меня определение цветотипа и разбор гардероба, ходили на шоппинг. Это был мой первый опыт шоппинга с клиентом. В магазинах я чувствовала себя достаточно уверенно, к шоппингу подготовилась, но на деле оказалось все не так просто…<br><br>

Во-первых, у девушки оказалась достаточно нестандартная фигура (треугольник основанием вниз, очень узкая талия, и тяжелое бедро относительно всей фигуры при размере одежды 44) – мы очень много времени потратили, чтобы подобрать ей джинсы (но одну пару все-таки купили). Я, в конце концов, пришла к выводу, что с ней за джинсами надо идти вообще отдельно и посвящать этому не один час.<br><br>

Ну и, конечно, сказался недостаток моего опыта – я пока не знаю, какие магазины или марки специализируются на моделях именно для такой фигуры (хотя чисто теоретически я понимаю, какие именно джинсы должны ей подойти)…<br><br>

Зато на ее фигуру с большим перепадом «талия – бедро» (Екатерина, кстати, правда, что такие фигуры даже называются – «плательные»?) идеально садились платья, особенно футлярные и особенно нарядные. Но каждый день, же в них не походишь, поэтому с повседневным вариантом тоже пришлось помучиться.<br><br>

Всего ходили 6,5 часов, и это, конечно слишком много – под конец было трудно сосредоточиться. Хотя это, безусловно, вопрос тренировки и опыта (после этого я уже ходила на шоппинг с другой клиенткой, и было уже намного легче).<br><br>

Купили: джинсы, сорочка белая, платье повседневное, жакет черный, пуловер черный крупной вязки, платье на выход, пуловер с рисунком, палантин, одна пара зимних сапог, одни ботильоны на каблуке, шарф и шапку крупной вязки, колготки 4 пары, бусы, сережки.<br><br>

Почти не купили аксессуаров, хотя вроде и в списке, составленном после разбора гардероба, они были.<br><br>

Я так сосредоточилась на одежде, что уже почти под конец сообразила, что мы кучу магазинов прошли, в которых могли бы посмотреть и ремни, и шарфы, бижутерию и т.д. (к тому же было опасение, что так много еще надо всего купить из одежды, и что может не хватить денег, если сейчас будем «распыляться» на аксессуары). Не купили верхнюю одежду — она хотела куртку (хотя по времени, которое потратили и по финансам — вполне могли бы наверно).<br><br>

Я довольна всеми вещами, которые мы купили, хотя мне кажется, что за это время можно было бы приобрести и больше. Немного обидно, что не освоили и половины бюджета, хотя он был достаточно приличный, и можно было развернуться. Клиентка осталась довольна. Говорит, что сама могла потратить столько времени и ничего не купить.<br><br>

Сама я сделала вывод, что мне надо чаще просто по магазинам ходить (даже когда нет клиентов), изучать ассортимент и не бояться предлагать клиенту даже то, что ему не нравится и не идти у него на поводу.<br><br>

Заработала я за этот шоппинг 6 часов*3.000= 18.000. Итого: мой первый заработок (за разбор и определение цветотипа) 11000+18.000=29.000 т.р.<br><br>Вера Осташкина, г. Владивосток</p></blockquote></div>

<div>
								<img src="https://www.glamurnenko.ru/products/imageschool/images/ava_none.jpg" alt="" style="
									float: left;
									margin: 40px 80px 0px 60px;
							">
												<blockquote style="background-color: rgba(235,228,202,1);"><p style="text-align:left;margin-left: 330px;">
													ЗА 4 МЕСЯЦА Я ОКУПИЛА ДЕНЬГИ, КОТОРЫЕ УЛОЖИЛА В ОБУЧЕНИЕ В ШКОЛЕ ИМИДЖМЕЙКЕРОВ…ЭТО 9 ШОПИНГОВ, 4 РАЗБОРА ГАРДЕРОБА, 6 КОНСУЛЬТАЦИЙ.
<br><br>
Сначала хочу поделиться своим успехом! За 4 месяца я окупила деньги, которые уложила в обучение в Школе Имиджмейкеров. Я определила для себя эту сумму в 40 т.р. (30 школа+ платки+ тренинги). Уже приближаюсь к 50 т.р. Это 9 шопингов, 4 разбора гардероба, 6 консультаций.<br><br>

Возможно для кого-то это незначительная сумма: в Москве цены другие. Для меня существенная, так как час шопинга стоит 1 т.р., а половину шопингов я провела по 500 руб час.<br><br>

За это время были и неудачи. Например, одна клиентка после разбора гардероба не пошла на шопинг, хотя очень хотела и вся горела. Но так совпало, что я уезжала в отпуск и ей пришлось ждать возвращения 3 недели (я ее предупреждала об этом). За это время она передумала и решила ехать в отпуск в Эмираты и заодно там прикупить себе вещи. Хотя я уже начала подготовку к шопингу для нее, потом только узнала. Было очень обидно.<br><br>

В другом случае, я провела первую встречу, мы составили план покупок и назначили дату. Я готовилась к шопингу, но у клиентки отложился выход на работу недели на 2, и она потом пропала куда-то.…я не звонила больше.<br><br>

Один раз девушка хотела подарить 2 часа шопинга своему мужу на ДР. Мы провели первую встречу, назначили дату. Я обрадовалась шансу провести мужской шопинг. Но у них случился какой-то форс-мажор, они предупредили и больше не появлялись.<br><br>

Вчера вечером клиентка отказалась накануне шопинга. И сегодня у меня выдался выходной! УРА! Если раньше я бы переживала, расстраивалась по этому поводу и воспринимала бы это на свой счет, то сейчас я даже обрадовалась. Так как клиентка была скорее проблемной, чем перспективной (маленький бюджет и завышенные ожидания). Появятся другие, более адекватные.<br><br>Ирина</p></blockquote></div>

<div>
	<img src="https://www.glamurnenko.ru/products/imageschool/images/ava_none.jpg" alt="" style="
		float: left;
		margin: 40px 80px 0px 60px;
">
					<blockquote><p style="text-align:left;margin-left: 330px;">
						ТРИ РАЗБОРА ГАРДЕРОБА. ДВА ШОПИНГА С ПОДРУГАМИ И ОДИН ШОПИНГ С КЛИЕНТКОЙ. С ПОДРУГ ДЕНЕГ НЕ ВЗЯЛА, А С КЛИЕНТКИ ОБЯЗАТЕЛЬНО =)) ЗАРАБОТАЛА 5000 РУБ. БЮДЖЕТ НА ПОКУПКИ У КЛИЕНТКИ БЫЛ: 40.000 РУБ. РЕЗУЛЬТАТОМ ОНА БЫЛА ОЧЕНЬ ДОВОЛЬНА.
						<br/><br/>
						Добрый день, Катерина, коллеги!<br><br>
						Из-за своего отъезда, не смогла отчет выложить своевременно. Но, наша школа подошла к завершению и я согласна с тем, что нужно подвести итог. Сделано, конечно, много, но могло быть и больше.<br><br>
						Начну по порядку.<br><br>
						Почему решила стать имиджмейкером.<br>
						Всегда интересовалась стилем, миром моды и индустрией красоты. Скупала пачками глянцевые журналы, интересовалась соответствующими передачами, училась на различных курсах. Но, себя в роли имиджмейкера даже не представляла, эта профессия, была чем-то сказочным для меня.<br><br>
						Все изменилось, после очередных курсов.<br>
						«Визажист-стилист», так звучало название курса. Стилистики, скажу я Вам, там кот наплакал. Но, я, благодарна судьбе, что попала именно в эту школу по визажу, там я поняла, что все это время, пока я бегала с курса на курс, я искала именно это.<br><br>
						Начала искать информацию в интернете, но поняла, что объемы необходимых знаний намного больше, чем я себе представляла. И не долго думая,я уехала учиться на имидж-дизайнера. Где еще больше убедилась в том, что это мое и жизни уже без этого не представляю.<br><br>
						<strong>А когда я задумалась, о технической части (очень захотелось свой сайт), о том, где мне искать клиентов и как организовать свою работу, тут как по заказу приглашение в школу имиджмейкеров =))</strong><br><br>

						Огромное спасибо Катерина и Андрей, за колоссальной труд и Вашу поддержку! Вы так нереально заряжаете и толкаете вперед!<br>
						<strong>Пополнила багаж знаний значительно. Но нет предела совершенству, нужно расти постоянно.</strong> Очень рада, возможности развиваться дальше с единомышленниками в проекте Имидж-Клуб.PRO. Девочки, очень благодарна Вам за вашу поддержку и помощь!<br><br>

						Что сделано. Провела 3 консультации, две по цвету, одну по фигуре, подругам…<br>
						<strong>Три разбора гардероба. Два шопинга с подругами и один шопинг с клиенткой. С подруг денег не взяла, а с клиентки обязательно =)) Заработала 5000 руб. Бюджет на покупки у клиентки был: 40.000 руб. Результатом она была очень довольна. Сказала, что подруги сделали комплемент: «Помолодела на 15 лет!» Это то, чего она хотела.</strong><br><br>
						Создала сайт, написала 6 статей и 7 описаний услуг, всплывающее окно есть, все как положено. Книга в процессе. Сайт пока не пиарила,допишу последнюю статью и на днях начну. А потому, в подписчиках одни знакомые. Серию писем еще не делала, не хватает времени. Но конечно все доделаю.<br><br>
						В ближайший месяц планирую: дописать книгу, создать серию писем, заняться пиаром, переслушать все семинары, прочитать рекомендуемую литературу. И конечно нести в мир красоту! =)
						Что можно улучшить в тренинге. Больше примеров хотелось бы!<br><br>
						А так все отлично. Спасибо огромное!<br><br>Наталия Илюхина</p></blockquote></div>

						<div>
														<img src="https://www.glamurnenko.ru/products/imageschool/images/ava_none.jpg" alt="" style="
															float: left;
															margin: 40px 80px 0px 60px;
													">
																		<blockquote style="background-color: rgba(235,228,202,1);"><p style="text-align:left;margin-left: 330px;">
																			Я КАК РАЗ ИЗ КАТЕГОРИИ ЛЮДЕЙ «ИМИДЖМЕЙКЕР БЕЗ ОПЫТА»: СНАЧАЛА ПЯТЬ ЛЕТ НАЗАД ОТУЧИЛАСЬ «ДЛЯ СЕБЯ», ПОТОМ ПОНЯЛА, ЧТО ЭТО ПРОФЕССИЯ И МОЖНО ЗАРАБАТЫВАТЬ ДЕНЬГИ... ...1 ШОПИНГ, 1 РАЗБОР ГАРДЕРОБА. ДЕНЕГ ЗАРАБОТАЛА ВСЕГО 6 ТЫСЯЧ.
						<br><br>
						Катя, девочки, всем привет.<br><br>
						<strong>Я как раз из категории людей «имиджмейкер без опыта»: сначала пять лет назад отучилась «для себя», потом поняла, что это профессия и можно зарабатывать деньги, но все немногочисленные клиенты были из знакомых, поэтому либо бесплатно работала, либо приходилось демпинговать….</strong><br><br>
						То, что привлекло здесь – это анонсирование того, что научат находить клиентов. Честно сказать, не пожалела.<br><br>
						<strong>Катя дает по профессии гораздо больше информации, чем в учебном центре, и без ненужной «воды», дисциплин «до кучи»:</strong> все развернуто, объяснено, все карты открыты, все по делу. Как будто и не училась раньше, очень много нового узнала. Видна заинтересованность в нашем успехе. Спасибо Вам большое, ребята.<br><br>
						К своему стыду, похвастаться мне пока нечем: <strong>1 шопинг, 1 разбор гардероба. Денег заработала всего 6 тысяч.</strong> Зарегистрировала домен, сайтом еще только предстоит заниматься. Как всегда в лучших традициях, одновременно навалилось много работы со всех сторон, плюс мой муж стал ревновать к занятиям – при нем оказалось невозможно сидеть у компьютера вечерами. Очень радуюсь тому, что есть возможность посмотреть-послушать в записи. Смотрю, когда нахожусь одна в машине. Иду с опозданием пока.<br><br>
						Ближайший месяц планирую заниматься сайтом и продвижением своих услуг.<br><br>
						Из пожеланий…. Даже не знаю, можно ли это каким-то образом улучшить, ведь учеба идет он-лайн, но когда смотришь занятие в записи, понимаешь, как много времени уходит на то, что приходится ждать «когда картинка загрузится», а если изображений много и они идут одна за другой, то это очень много времени занимает. Особенно, когда хочется догнать скорей всех.<br/><br/>Дарья Вострикова</p></blockquote></div>

						<div>
							<img src="https://www.glamurnenko.ru/products/imageschool/images/ava106.jpg" alt="" style="
								float: left;
								margin: 40px 80px 0px 60px;
						">
											<blockquote><p style="text-align:left;margin-left: 330px;">
												ИТОГО, МОЙ ПЕРВЫЙ ЗАРАБОТОК — 13 ТЫСЯЧ РУБЛЕЙ С ДВУХ КЛИЕНТОК.
												<br/><br/>
												Здравствуйте, Катя, коллеги.<br><br>

												Я закончила школу имиджмейкеров в ноябре. Поначалу работать не собиралась. Но потом пришло «озарение» и я решила поехать с Катей в Италию на стажировку в качестве имиджмейкера.
												Катя, ещё раз огромное СПАСИБО за это обучение. Я много для себя вынесла из этой поездки. Я поняла как надо работать с клиентами, подбирать комплекты. Вся теория Школы разложилась «по-полочкам».<br><br>
												До этой поездки клиентов у меня не было, т.к. не было уверенности в себе.<br>
												Вернувшись домой я активно начала продвигать свои услуги: доделала сайт, завела страничку ВКонтакте, даже провела один семинар вживую.<br>
												<strong>И есть уже результат. У меня два клиента.</strong><br><br>
												Первая: цветотип зима, фигура треугольник основанием вверх,размер 48, выступающий живот, 44 года.
												Клиентка последнее время одевалась в джинсы и кофточки, что не скрывало недостатки фигуры. Единственный плюс гардероба- много разных красивых сумок и обуви. Собрали ей летний гардероб очень яркий и многовариантный. Опишу немного. Юбка-карандаш шелковая темно-синяя с принтом в виде крупных цветков. Брюки шелковые прямые от бедра ярко-синего цвета. Жакет из хлопка приталенный зеленый. Блузки-топы — трикотажная лимонного цвета, цвета фуксии из натурального шелка, коралловая (немного тёплый для неё, но в комплекте с остальным очень освежает), блузка с оригинальными рукавами мятного цвета, интересный трикотажный свитерок белого цвета с синим ремешком (ремень подошел почти ко всем комплектам). Футлярное платье бледно-желтого даже немного в салатовый цвета. Обувь, сумки и бижутерию подбирали из имеющегося у неё. Комплектов получилось очень много, образы яркие и функциональные. Она очень довольна.<strong>Денег потратила около 30 тыс рублей.</strong> <strong>Мой заработок — 4000 рублей</strong><br><br>

												Вторая клиентка: цветотип лето, 49 лет,рост 159, размер 44-в груди, 46- в бедрах. Футлярные платья не садились. Взяли два трикотажных, одно бледно-желтое, другое сине-зеленое, радужное. Зато юбки-карандаш сели отлично: мятная и серо-бежевая. Две пары брюк: жаккардовые цвета шампанского, плотный хлопок с голубым некрупным принтом. Верхов много получилось_ фиолетовая блузка из шифона, майка с болеро трикотажнные одного цвета, но разной фактуры, топ зелёного цвета с синим рисунком, топ в полоску разных оотенков синего, серого и розового. Очень хорошо всё скомпоновал хлопковый жакет серо-жемчужного цвета. Две сумки разного цвета- холодно-желтая GUESS, и припыленно-синяя стиля шанель простеганная с ручками -цепочками. Туфли было трудно подобрать, т.к размер ноги небольшой и требования к удобству высокие. Взяли Паззолини пудрового цвета на невысокой танкетке. Из украшений трое бус разного цвета и стиля, серьги не носит, браслеты тоже. Взяли часы GUESS с тремя съемными ремешками(белый,черный и коричневый. Когда расписали комплекты, то оказалось 20! я сама не ожидала. Очень понравилось мне самой и ей то, что вещи были разной ценовой категории, но недорогие в комплекте с более качественными смотрятся очень достойно. За счет этого общая сумма вполне разумная. <strong>Денег потратили 40 тысяч рублей,получила скидки по моим картам около 3тыс. Клиентка довольна, даже заплатила мне «Премию» как она выразилась — 1 тыс.руб. Мой заработок — 8000+1000.</strong><br><br>
												Итого, мой первый заработок — 13 тысяч рублей с двух клиенток.<br><br>Галина Бартошевич</p></blockquote></div>

												<div>
																				<img src="https://www.glamurnenko.ru/products/imageschool/images/ava107.jpg" alt="" style="
																					float: left;
																					margin: 40px 80px 0px 60px;
																			">
																								<blockquote style="background-color: rgba(235,228,202,1);"><p style="text-align:left;margin-left: 330px;">
																									ЗА ВРЕМЯ ОБУЧЕНИЯ В ШКОЛЕ ИМИДЖМЕЙКЕРОВ Я ПРОВЕЛА ПЯТНАДЦАТЬ КОНСУЛЬТАЦИЙ, 3 РАЗБОРА ГАРДЕРОБА, 2 ШОППИНГА. НА ШОППИНГАХ (ОБРАЗЫ ПО СЛУЧАЮ) КЛИЕНТЫ ИНВЕСТИРОВАЛИ В НОВУЮ ОДЕЖДУ И АКСЕССУАРЫ 30 ТЫС. РУБЛЕЙ, ВСЕГО Я ЗАРАБОТАЛА 7,5 ТЫС. РУБЛЕЙ.
<br/><br/>
Я СДЕЛАЛА СВОЙ САЙТ FIND-STYLE.RU НА РЕГУЛЯРНО РАЗМЕЩАЮ СТАТЬИ И ВИДЕО-ОБЗОРЫ, ВЕДУ СВОЙ КАНАЛ НА YOUTUBE. В НАСТОЯЩЕЕ ВРЕМЯ НА САЙТЕ ОКОЛО 60 СТАТЕЙ В БЛОГЕ И 6 АВТОРСКИХ ВИДЕО, РАЗМЕЩЕННЫХ В ОБЩЕМ ДОСТУПЕ.
												<br><br>
												Я решила стать имиджмейкером, потому что меня давно пленила тема моды и стиля, еще с детства: вначале я заходила в эту творческую сферу со стороны фотографии, еще в школе мечтала стать дизайнером и конструктором одежды. Я закончила московский государственный университет дизайна и технологии (бывший институт легкой промышленности), но после него отправилась работать в другую сферу. Но мечта продолжала жить, я листала модные журналы и переодевала людей мысленно, когда ездила в транспорте и где была еще возможность представить человека в новом образе и понаблюдать за его характером и пластикой движений.<br><br>

												Вторую беременность и декретный отпуск я решила совместить с освоением новой профессии. Стала искать различные варианты дистанционного обучения. Мне сразу очень понравилась рассылка Екатерины Маляровой – емкая и информативная. Каждый онлайн-семинар Екатерины я слушала с карандашом и блокнотом, с удовольствием впитывая долгожданные знания:)<br><br>

												За время обучения в Школе Имиджмейкеров я провела пятнадцать консультаций, 3 разбора гардероба, 2 шоппинга. На шоппингах (образы по случаю) клиенты инвестировали в новую одежду и аксессуары 30 тыс. рублей, всего я заработала 7,5 тыс. рублей.<br><br>

												Я сделала свой сайт find-style.ru На регулярно размещаю статьи и видео-обзоры, веду свой канал на Youtube. В настоящее время на сайте около 60 статей в блоге и 6 авторских видео, размещенных в общем доступе.<br><br>

												Я создала два front-end продукта: книгу и бесплатный видео-курс из 5-ти видео, разработала серию из 10 писем (больше не позволяет сделать функциональность смартреспордера) :).<br><br>

												У меня сейчас 190 подписчиков в серии писем и 613 человек на странице в Facebook https://www.facebook.com/findstyleru , в основном продвигала свои услуги и бесплатные продукты через социальные сети, давала рекламу в яндекс-директе. Пишу статьи об имидже и стиле для портала «Домашний» www.domashniy.ru/persons/4261/<br><br>

												Любимое долгожданное занятие – как маленький ребенок, требует много внимания. Нет предела совершенству :) Можно и серию писем доработать, и заняться более тщательным продвижением сайта.<br><br>

												В ближайший месяц планирую договориться о предоставлении услуг-консультации в салонах красоты и сделать на сайт портфолио.<br><br>

												Екатерина, огромное спасибо вам и Андрею Косенко за потрясающий тренинг! Все разделы изложены очень подробно и емко, охвачены все необходимые темы, которые требуется знать для начала работы. А так как мир моды и стиля очень подвижный и переменчивый, разумеется, нет предела совершенству, которое проходит теперь гораздо проще благодаря качественным базовым знаниям.<br><br>

												Я очень рада, что мне посчастливилось пройти этот курс обучения. В процессе обучения я без особого труда научилась применять все знания на практике. Хотя, конечно, изучение занимает много времени, практически переданный и переработанный Екатериной Маляровой опыт гораздо более ценный, чем разрозненные знания, которые я до этого по крупицам собирала в книгах и других источниках. Еще раз спасибо!!!<br><br>

												Тренинг замечательный и сложно сразу сказать, что требует улучшения. Так как я проходила курс уже позже, и смотрела в записи, то добавила бы для последующих покупателей обратную связь с тренером, например, в виде ежемесячных вебинаров с ответами на вопросы.<br/><br/>Марина Мустафина</p></blockquote></div>

												<div>
													<img src="https://www.glamurnenko.ru/products/imageschool/images/ava_none.jpg" alt="" style="
														float: left;
														margin: 40px 80px 0px 60px;
												">
																	<blockquote><p style="text-align:left;margin-left: 330px;">
																		СЕЙЧАС, КОГДА Я ПОЛУЧИЛА ЭТОТ МАТЕРИАЛ, БЕЗ ЛИШНЕГО ПАФОСА МОГУ СКАЗАТЬ, ЧТО ВОЗМОЖНО, ЕСЛИ БЫ ВСЕ ЭТО ЗНАТЬ РАНЬШЕ, ТО И МОЯ ЛИЧНАЯ ЖИЗНЬ И КАРЬЕРА МОГЛА БЫ СЛОЖИТЬСЯ ПО-ДРУГОМУ. ДА ДА. ЭТО НЕ ГРОМКИЕ СЛОВА. ЭТО МОЕ УБЕЖДЕНИЕ.
																		<br/><br/>
																		Здравствуйте, Катя и все красавицы этого тренига! Меня зовут Елена. Мне 48 лет, живу в прекрасном, очень красивом городе Львове. У меня два высших образования. Ну и как водится у нас в стране — женщины очень много работают.<br><br>

																		Так случилось и в моей жизни — строила карьеру, зарабатывала деньги, одна поднимала детей. Потом так устала от вечной борьбы за выживание и ушла с хорошей роботы и высокой должности. Многие меня не поняли тогда. Но я ни о чем не жалею. Сейчас «на своих хлебах» — занимаюсь страховым бизнесом.<br><br>

																		Я всегда нравилась мужчинам, но личная жизнь, тем не менее, не сложилась.<br><br>

																		Сейчас, когда я получила этот материал, без лишнего пафоса могу сказать, что возможно, если бы все это знать раньше, то и моя личная жизнь и карьера могла бы сложиться по-другому. Да да. Это не громкие слова. Это мое убеждение.<br><br>

																		Работать над домашними заданиями было очень интересно. Я первые дни даже спать не могла, на столько это было увлекательно. По началу было сложно найти нужные цвета для своего цветотипа, правильно и «вкусно» их сочетать. И я много раз просматривала разбор домашних заданий, который проводила Катя. Каждый раз что-то новое для себя находила.<br><br>

																		Просматривая, как легко все получается у Кати, начинала составлять комплекты-луки в интернете. Это было очень увлекательно. Однако не так просто на практике. Тем не менее, сейчас я думаю, что все ведь так логично и просто описано в тренинге. Почему раньше это не приходило в голову?<br><br>

																		Сейчас я думаю, что мне пришло на почту приглашение подписаться на Катину рассылку и как хорошо, что я тогда не прошла мимо.<br><br>
																		Решив принять участие в тренинге, я надеялась, что это придаст мне силы к тому, чтоб изменить свою внешность и не поддаться возрасту.<br><br>
																		Во время тренинга я испытала множество эмоций. И все положительные. Как же это здорово, когда ты видишь себя красивой, молодой и успешной. А какая женщина не любит комплименты?<br><br>

																		Для меня приятным открытием был подбор аксессуаров — интересные сочетания цветов в обуви и сумках. Как я раньше могла носить черную обувь и черные сумки? Однако буду еще просматривать материалы, поскольку есть еще вопросы по стилям, по созданию интересных комплектов.<br><br>

																		Я еще раз хочу от всей души поблагодарить Катю за прекрасное качество предоставленных материалов. ЭТОТ ТРЕНИНГ ЛУЧШИЙ В РУНЕТЕ!!!!! Все очень логично и доходчиво, прекрасно и наглядно подобраны примеры в картинках.<br><br>

																		От всей души желаю Вам, Катя, огромного счастья, здоровья, творческого вдохновения, удовольствия от работы и всего наилучшего. А всем участницам тренинга — найти свой стиль и свою «изюминку», быть красивыми и неповторимыми, получать удовольствия от жизни и всего самого наилучшего.<br><br>Елена Усова</p></blockquote></div>

																		<div>
																										<img src="https://www.glamurnenko.ru/products/imageschool/images/ava_none.jpg" alt="" style="
																											float: left;
																											margin: 40px 80px 0px 60px;
																									">
																														<blockquote style="background-color: rgba(235,228,202,1);"><p style="text-align:left;margin-left: 330px;">
																															Я ОБРЕЛА СВОБОДУ, УВЕРЕННОСТЬ В СЕБЕ, И ЛЮБИМОЕ ДЕЛО.
																		<br><br>
																		Хочу поделиться новостью — я сегодня уволилась. Возможно, мне проще это было сделать, чем многим из вас, ведь я 6 лет провела в декретах. Но, запасного аэродрома больше нет, дальше только вперед!<br><br>

																		<strong>Катя, хочу выразить тебе огромную благодарность за Школу Имиджмейкеров! Я обрела свободу, уверенность в себе, и любимое дело.</strong><br><br>

																		Я бы все равно не вернулась на прежнюю работу, но увольнение не было бы столь радостным событием для меня как сегодня.<br><br>Ирина Ш</p></blockquote></div>

																		<div>
																			<img src="https://www.glamurnenko.ru/products/imageschool/images/ava_none.jpg" alt="" style="
																				float: left;
																				margin: 40px 80px 0px 60px;
																		">
																							<blockquote><p style="text-align:left;margin-left: 330px;">
																								180 USD — ПЕРВАЯ КОНСУЛЬТАЦИЯ, ЦВЕТОТЕСТИРОВАНИЕ, КОНСУЛЬТАЦИЯ ПО ЦВЕТОСОЧЕТАНИЯМ 7 ЦВЕТОТЕСТИРОВАНИЙ , ОБЩАЯ СУММА 490 USD
																								<br/><br/>
																								Тяжело было рекомендовать свои услуги и говорить о цене за услуги, начала практиковаться, стала чувствовать себя более уверенно, тем более что женщинам очень нравится когда я их консультирую.<br><br>

																								<strong>180 usd — первая консультация, цветотестирование, консультация по цветосочетаниям. 7 цветотестирований , общая сумма 490 usd</strong><br><br>

																								Цветотестирования проходят на ура, а вот записей на шопинг пока нет.<br><br>

																								Мне хочется ходить с клиентом на шопинг, чтобы он сразу увидел результат, на консультациях испытываю языковой барьер, хотелось бы больше рассказать клиенту, но с переводом тяжело. Пока выбираю направление своей работы.<br><br>

																								Если записей на шопинг не будет, то пересмотрю свою линейку услуг и подход к работе, буду проводить консультации по стилю и имиджу, добавлю на свой сайт рекламу о цветотестировании онлайн.<br><br>

																								Ещё много не сделано, но результаты уже радуют.<br><br>Ирина</p></blockquote></div>

																								<div>
																																<img src="https://www.glamurnenko.ru/products/imageschool/images/ava_none.jpg" alt="" style="
																																	float: left;
																																	margin: 40px 80px 0px 60px;
																															">
																																				<blockquote style="background-color: rgba(235,228,202,1);"><p style="text-align:left;margin-left: 330px;">
																																					ЗА ВРЕМЯ УЧЕБЫ Я СОЗДАЛА САЙТ, НАПИСАЛА 5 СТАТЕЙ. ПРОВЕЛА КОНСУЛЬТАЦИИ ПО ЦВЕТУ (ТРЕНИРОВОЧНЫЕ), ПЕРВЫЕ ВСТРЕЧИ, БЫЛ ОДИН РЕАЛЬНЫЙ РАЗБОР ГАРДЕРОБА, И ОДИН ШОПИНГ. ЗАРАБОТАЛА Я ПОКА НЕМНОГО, 2000.
																								<br><br>
																								Добрый день, Катя, Андрей, девочки!<br><br>
																								Немного запоздала с отчетом.<br><br>
																								Во-первых, конечно, присоединюсь ко всему выше сказанному! <strong>Огромное спасибо Кате за ее работу, все было замечательно, очень интересно, главное все доступно, понятно. Столько новой и главное очень полезной информации!</strong> К сожалению я могла слушать только в записи (разница во времени 5 часов!), но все равно практически никаких вопросов не было, все понятно )))<br><br>
																								<strong>Большое спасибо Андрею, никогда бы не подумала, что все технические моменты можно сделать самостоятельно за столь короткое время, спасибо за уроки по продвижению, действительно очень полезно!!!</strong><br><br>
																								По специальности я дизайнер, работаю с текстилем в интерьере, всегда увлекалась модой, часто слышу комплименты в свой адрес, мне казалось одеваюсь оригинально и со вкусом. Последнее время знакомые практически в один голос говорили о том, что мне надо стать имиджмейкером, да я и сама думала об этом, только не знала, где получить знания и подруга мне прислала Катины уроки. Вот так я оказалась в школе и не пожалела )))<br><br>
																								<strong>За время учебы я создала сайт, написала 5 статей. К сожалению подписчиков еще нет, надо написать книгу (последнее время со временем напряг), в общем надо нагонять!<br><br>
																								Провела консультации по цвету (тренировочные), первые встречи, был один реальный разбор гардероба, и один шопинг.</strong><br><br>
																								Конечно, больше всего эмоций от шопинга!!! Клиентом была подруга, но на удивление слушала меня во всем. Комплект получился интересный и по стилю и по цвету. Клиент остался доволен ))) Родные ее тоже одобрили. Я поняла, что это «мое»!!! Были, конечно, трудности, т.к. город небольшой (Иркутск), хоть и областной центр, все приличные магазины разбросаны по городу, поэтому увеличивается время, ну и плюс недостаток опыта тоже сказался. Но я думаю с опытом смогу все систематизировать, лучше ориентироваться.<br><br>
																								<strong>Заработала я пока немного, 2000.</strong> Но надо активнее продвигать услуги, чем и буду в ближайшее время заниматься.<br><br>
																								ЕЩЕ РАЗ БОЛЬШОЕ СПАСИБО!!!!<br><br>Татьяна Курохтина</p></blockquote></div>


																								<div>
																									<img src="https://www.glamurnenko.ru/products/imageschool/images/ava108.jpg" alt="" style="
																										float: left;
																										margin: 40px 80px 0px 60px;
																								">
																													<blockquote><p style="text-align:left;margin-left: 330px;">
																														ПРОВЕЛА 5 ПЕРВЫХ ВСТРЕЧ – ОДНА СТАЛА ПОСТОЯННОЙ КЛИЕНТКОЙ, УЖЕ ТРИ ШОППИНГА ПРОВЕЛИ, ЕЩЕ ТРОЕ ОБРАТИЛИСЬ ЗА КОНСУЛЬТАЦИЯМИ
																														<br/><br/>
																														Мои впечатления: Когда начинаешь общаться и задавать вопросы, человек как бы поворачивается другой стороной. То есть у меня было определенное представление о том, какая она, а тут раз — все по-другому. Очень интересно слушать. Я буквально каждый раз влюблялась в собеседницу. Еще очень интересно видеть в клиентке «изюм» — те качества, которые хочется подчеркнуть.<br><br>

																														Что было сделано хорошо: проявила интерес, была одета интересно, показала свою экспертность (одна стала постоянной клиенткой – уже три шоппинга провели, еще 3 обратились за консультациями)<br><br>

																														Что было сделано плохо: не было четкого логичного плана, перескакивала с одного на другое. Несколько раз сбивалась вообще на свои личные истории. Торопилась (встречи заняли по 45 мин каждая). Заметно нервничала. Часто повторяла «понятно». Мало спросила про работу (хотя я очень хорошо знаю условия и дресс-код, т.к мы работаем в одном подразделении). В одном случае забыла спросить рост и размер обуви – уточнила потом на шоппинге.<br><br>

																														Я думаю с опытом вот эта нервозность на первых встречах пройдет.<br><br>

																														И еще заметила – когда просишь кого-то из близких подруг помочь и побыть в качестве клиента, то чаще сталкиваешься с капризами и установкой «я знаю все сама и мне ничего не надо», чем когда то же самое с просто приятельницами. «Нет» от близких людей сильно бьет по уверенности в своих силах.<br><br>Екатерина Медведкова</p></blockquote></div>



																														<div>
																																						<img src="https://www.glamurnenko.ru/products/imageschool/images/ava109.jpg" alt="" style="
																																							float: left;
																																							margin: 40px 80px 0px 60px;
																																					">
																																										<blockquote style="background-color: rgba(235,228,202,1);"><p style="text-align:left;margin-left: 330px;">
																																											МОИ ПЕРВЫЕ 350$ БЫЛИ ЗАРАБОТАНЫ ЗА СЧЕТ УСЛУГИ ШОПИНГ-СОПРОВОЖДЕНИЕ
																														<br><br>
																														Здравствуйте Катя!<br><br>
																														Хочу поделиться своим первым успехом, мои первые 350$ были заработаны за счет услуги шопинг-сопровождение. Я дала рекламу в группу «Русский Лос-Анджелес» и мне написала девушка, сказала что приезжает в Л.А. и мы договорились с ней о первой встрече. Кстати, я же сделала портфолио и оно сработало! Девушка на первой встрече сказала что ей очень понравилось как я одела людей.<br><br>

																														После первой встречи мы договорились о шопинге через день, я обошла магазины, расписала комплекты. В итоге отшопались за 5 часов, я получила 300$ за шопинг и 50$ за первую встречу. Собрала 9 комплектов из 16 предметов, включая обувь и аксессуары. В результате я и клиентка осталась довольна, за исключением того что мы очень устали :)
																														<br><br>Фомина Мария</p></blockquote></div>


																														<div>
																															<img src="https://www.glamurnenko.ru/products/imageschool/images/ava_none.jpg" alt="" style="
																																float: left;
																																margin: 40px 80px 0px 60px;
																														">
																																			<blockquote><p style="text-align:left;margin-left: 330px;">
																																				СЕЙЧАС Я ПРОСТО НЕ МОГУ ПОНЯТЬ КАК МОЖНО БЫЛО СТОЛЬКО ПРОЖИТЬ И ЭТОГО ВСЕГО НЕ ЗНАТЬ! Я ХОЖУ ПО УЛИЦАМ И РАЗГЛЯДЫВАЮ ЛЮДЕЙ. Я СМОТРЮ КАК НЕКОТОРЫЕ ОДЕТЫ В СВОЁМ ЦВЕТОТИПЕ И КАК НЕЛЕПО СМОТРИТСЯ КОГДА ОСЕНЬ ДОПУСТИМ В ЗИМЕ!
																																				<br/><br/>
																																				Дорогая Екатерина Здравствуйте!<br><br>

																																				Я училась в школе лепки по полимерной глине и меня пригласили на урок по цвету. Тогда я и подумать не могла что этот урок приведет меня на Ваш сайт и познакомит с Вами! Я очень рада этой встрече) Мне 35. Последний раз когда я чувствовала себя счастливой в своей одежде было лет в 13. Потом сложилось так что я перестала выбирать себе то что мне нравится и поддавалась мнению окружающих меня людей. Последним таким человеком который формировал мой гардероб на свой вкус был мой бывший муж ! Это было ужасно. Я возненавидела магазины. Поход в гости либо в театр вызывали панику внутри потому как вся одежда была спортивного либо полуспортивного стиля. Одеть в прямом смысле было нечего!<br><br>

																																				Вообщем темная страница моей жизни в плане одежды и стиля закрыта навсегда)<br><br>

																																				После того как я заказала ваши диски я скачивала и слушала всю информацию с сайта в закрытом отделе!<br><br>

																																				Сейчас я просто не могу понять как можно было столько прожить и этого всего не знать! Я хожу по улицам и разглядываю людей. Я смотрю как некоторые одеты в своём цветотипе и как нелепо смотрится когда осень допустим в зиме! Работа идёт, но очень медленно. Я прослушала четыре дня и получила немного информации, но уже столько всего переменилось к лучшему. Моя сестра которая выглядела всегда очень хорошо и мне всегда казалось что одета прекрасно попросила меня сходить с ней на шоппинг! Я определила её цветотип и всё что я рекомендовала она приобрела и уже получила комплементы на работе! Это было потрясающее! Мне теперь нравится ходить по магазинам потому что я сразу вижу что в этом магазине есть для меня и не трачу энергию, сомневаясь подойдет или нет ! Конечно есть ещё несколько белых пятен по типам фигур и по стилям например! Очень тяжело мне даётся составление комплектов…<br><br>

																																				Екатерина Спасибо вам и вашей команде за то вы делаете! Стало намного интереснее жить !<br><br>Иванова Наталья</p></blockquote></div>


																																				<div>
																																												<img src="https://www.glamurnenko.ru/products/imageschool/images/ava_none.jpg" alt="" style="
																																													float: left;
																																													margin: 40px 80px 0px 60px;
																																											">
																																																<blockquote style="background-color: rgba(235,228,202,1);"><p style="text-align:left;margin-left: 330px;">
																																																	С БОЛЬШИМ УДОВОЛЬСТВИЕМ, А ГЛАВНОЕ — С ОГРОМНОЙ ПОЛЬЗОЙ ДЛЯ СЕБЯ ПРОСЛУШАЛА УСКОРЕННЫЙ КУРС О ПРОФЕССИИ ИМИДЖМЕЙКЕРА.
																																				<br><br>
																																				Добрый вечер, команда «Гламурненько»! С большим удовольствием, а главное — с огромной пользой для себя прослушала ускоренный курс о профессии имиджмейкера. Считаю, что творческий деловой тандем — Катя и Андрей — отработал на все 100%. Четко, ясно, безо всякой пены и лишней саморекламы ребята давали материал. Представленный список литературы постараюсь максимально использовать и в своей работе.<br><br>

																																				Понравился структурированный расклад Андрея, как давать информацию о своих услугах: сначала рекламируем свой продукт, а потом его продаём. Образно говоря, сначала всё рассказываем о подушках, а потом ловим гусей, дергаём пух и набиваем наволочки.<br><br>

																																				У меня самой теоретических знаний вполне достаточно, но до практической пятилетней Катиной работы расти и расти. И это вдохновляет. Спасибо, Екатерина, Хочется купить цветные карандаши и раскрасить заново мир, окружающий тебя.<br><br>

																																				Злюсь на себя, что не смогла записаться на ваши курсы. Но я надеюсь, что Андрей как настоящий рекламист придумает, как приобрести ваш расширенный, а не ускоренный продукт.<br><br>

																																				С уважением и пожеланием процветания вашему бизнесу<br><br>Ирина Родик</p></blockquote></div>


																																				<div>
																																					<img src="https://www.glamurnenko.ru/products/imageschool/images/ava_none.jpg" alt="" style="
																																						float: left;
																																						margin: 40px 80px 0px 60px;
																																				">
																																									<blockquote><p style="text-align:left;margin-left: 330px;">
																																										ОЧЕНЬ КАЧЕСТВЕННО ПРОРАБОТАННЫЙ КУРС, ВСЕ РАЗЛОЖЕНО ПО ПОЛКАМ И СТРУКТУРИРОВАНО, ЧТО НЕСОМНЕННО БУДЕТ ПРИМЕНЯТЬСЯ В ПРАКТИКЕ И СОВЕРШЕНСТВОВАТЬСЯ. ЭМОЦИИ ТОЛЬКО ПОЛОЖИТЕЛЬНЫЕ, А ОСОБЕННО, КОГДА Я УЖЕ УВИДЕЛА РЕЗУЛЬТАТ НА СВОИХ КЛИЕНТАХ И САМОЕ ГЛАВНОЕ ИХ УДОВЛЕТВОРЕННОСТЬ И ВОСТОРГ ОТ ПРОДЕЛАННОЙ РАБОТЫ. ЭТО БОЛЬШЕ ВСЕГО МОТИВИРУЕТ НЕ ОСТАНАВЛИВАТЬСЯ НА ДОСТИГНУТОМ И БРАТЬ НОВЫЕ ГОРИЗОНТЫ.
																																										<br/><br/>
																																										Я много лет работала совсем в другой индустрии и была преуспевающим менеджером среднего звена. Модные тенденции, стилевые направления мне всегда были интересны и я этим увлекалась как хобби, применяла свои умения ни только к себе, но и к своим друзьям-подругам, помогала найти им свой стиль.
А в 2015 году меня сократили, в связи с экономической ситуацией и я встала перед выбором куда двигаться дальше. И после долгих раздумий и мониторинга различных предложений, я наткнулась на курс Екатерины Маляровой, который меня заставил посмотреть на мои умения-хобби серьезно, поэтому я прошла обучающий курс и решила попробовать себя реализовать в этой сфере.
<br/><br/>
За 2 месяца обучения в Школе Имиджмейкеров<br/>
— проведено 5 консультаций<br/>
— проведено 5 разборов<br/>
— 3 шопинга<br/>
— в среднем один шопинг 45 000рублей<br/>
— пока не заработала ничего, тк в основном все что я делала для своих клиентов, это для того чтобы завоевать их социальную аудиторию, где они являются значимыми людьми. Работаю на перспективу.<br/>
— сайт создала na-veshalke.ru<br/>
— на данный момент уже выложено на сайт 4 статьи, 2 статьи уже почти готовы, будут добавлены в ближайшее время.<br/>
— плотно стала выстраивать свою деятельность в Инстаграмм и набирать там подписчиков, остальные варианты еще только в стадии проработки.<br/>
— подписчиков: 134
<br/><br/>
Я еще не проработала достаточно хорошо серию писем и книгу, поэтому буду в ближайшее время это доделывать. Мужские стили и направления.
<br/><br/>
У меня запланировано ведение рубрики «Стильных советов» для одного из клубов будущих мам, проведение нескольких бесплатных мастер-классов, привлечение клиентов через инстаграм, развитие на своем сайте рубрики «стильные советы», путем написания различных мотивирующих и познавательных статей.
<br/><br/>
Очень качественно проработанный курс, все разложено по полкам и структурировано, что несомненно будет применяться в практике и совершенствоваться. Эмоции только положительные, а особенно, когда я уже увидела результат на своих клиентах и самое главное их удовлетворенность и восторг от проделанной работы. Это больше всего мотивирует не останавливаться на достигнутом и брать новые горизонты.
<br/><br/>
На сегодняшний день, я бы наверное хотела еще что-то узнать про возможности работы с Инстаграм как грамотно выстраивать свою деятельность, искать клиентов и тд. А в остальном все отлично!
<br/><br/>
Спасибо огромное!<br/><br/>Оксана Калиниченко</p></blockquote></div>

<div>
								<img src="https://www.glamurnenko.ru/products/imageschool/images/ava_none.jpg" alt="" style="
									float: left;
									margin: 40px 80px 0px 60px;
							">
												<blockquote style="background-color: rgba(235,228,202,1);"><p style="text-align:left;margin-left: 330px;">
													ОЧЕНЬ ХОТЕЛОСЬ ПОЛУЧИТЬ ЭТУ ПРОФЕССИЮ, НО БОЯЛАСЬ, ЧТО УЖЕ ПОЗДНО НАЧИНАТЬ. ПОМОГЛИ ВИДЕО АНДРЕЯ ИЗ СЕРИИ ЛДМЖ И КНИГА БАРБАРЫ ШЕР «ЛУЧШЕ ПОЗДНО, ЧЕМ НИКОГДА». СВЕРШИЛОСЬ! Я В ШКОЛЕ! ТРЕНИНГ ОСТАВИЛ У МЕНЯ НЕЗАБЫВАЕМЫЕ ВПЕЧАТЛЕНИЯ! МОИ ОБРАЗЫ СТАЛИ ИНТЕРЕСНЕЕ, ЖИВЕЕ, РАЗНООБРАЗНЕЕ, ГОРАЗДО СМЕЛЕЕ И СТИЛЬНЕЙ. Я СТАЛА УВЕРЕННЕЕ. НАВЕРНОЕ, МОЯ УВЕРЕННОСТЬ ТРАНСЛИРУЕТСЯ ОКРУЖАЮЩИМ — Я ПОЛУЧАЮ КОМПЛИМЕНТЫ, И ДАЖЕ ПОЛУЧИЛА ПРИБАВКУ К З/П.
<br><br>
Почему решила стать имиджмейкером? Череда случайностей (которые, вероятно, не случайны).
<br><br>
Может, начался этот путь, когда в 14 лет мама записала меня, вместе с собой, на курсы кройки и шитья «Модница». Девяностые, и разнообразия в одежде никакого.Научившись шить, я могла выгодно отличаться внешне от одноклассниц, а затем и однокурсниц.
<br><br>
Не поступив в институт на ин.яз после школы, мне нужно было переждать 1 год и я пошла в училище с самой большой стипендией — швейное. Там даже умудрилась со своим самостоятельно придуманным и изготовленным платьем (помню его, как наяву) занять первое место на конкурсе среди учащихся.
Но кроить и шить мне не «залюбилось». А одеваться интересней, чем обычно нравилось.
<br><br>
В общем, имея два высших:педагогическое и экономическое, работая несколько лет главбухом, год назад я поняла, что моя работа не та, которой хочется посвятить дальнейшую жизнь.
<br><br>
К тому времени накопилось много вопросов и проблем в моем образе: в нем что-то не так, чего-то не хватает, я не всем довольна и нет чувства удовлетворения, многие вещи покупаю, а потом не ношу и т.д.
<br><br>
В поисках ответа и, исследуя интернет на тему стиля, фигуры, цветотипов, о чем-то я имела представления, но это было не то, что нужно — не было системы.
<br><br>
И вот мне попался тест с вашего сайта, пройдя который я стала получать письма. Меня заинтересовала Школа имиджмейкеров. Я начала зреть. Почти полгода. Очень хотелось получить эту профессию, но боялась, что уже поздно начинать. Помогли видео Андрея из серии ЛДМЖ и книга Барбары Шер «Лучше поздно, чем никогда». Свершилось! Я в Школе!
<br><br>
Если честно, было тяжело. Но интересно!
<br><br>
За время обучения:<br>
— провела 4 консультации<br>
— провела 2 разбора гардероба<br>
— провела 2 шопинга<br>
— заработка пока нет, все это проводилось с целью потренироваться, попробовать себя:мое ли это и смогу ли, да и чтобы за «первый блин комом» не пришлось расплачиваться клиентам<br>
— создала сайт<br>
— написала 5 статей<br>
— создала эл.книгу<br>
— серии писем пока нет<br>
— нигде пока не пиарилась<br>
— 13 подписчиков
<br><br>
Пока не отработала темы по мужчинам — ну не лежит душа, и все! Думаю, когда «гром грянет», тогда и придется осваивать.
<br><br>
Вряд ли что-то могла сделать лучше — я старалась выполнять задания максимально.Потому, что мне это было очень интересно. Уроки были настолько полезны, интересны и познавательны, что просто невозможно было не увлечься! Хотя были и трудности, и саботаж.
<br><br>
Мое замечание к себе — это то,что затянула обучение. Можно освоить курс гораздо быстрее, потому что, все продумано отлично — и по времени, и по структуре. Но у меня были личные причины: во-первых, курс пришелся на два отчетных периода, а во-вторых, параллельно со Школой я затеяла еще одно обучение.
<br><br>
Только поэтому мне катастрофически не хватало (и не хватает) времени. А Андрей в ЛДМЖ предупреждал: не осваивайте несколько новых дел одновременно:)
В ближайший месяц займусь сайтом и пиаром. Буду создавать серию писем.
<br><br>
Тренинг оставил у меня незабываемые впечатления!
<br><br>
Если честно, я не рассчитывала освоить профессию за 3 месяца. Но сейчас я понимаю, какая разница между мной до Школы, и мной нынешней — в плане знаний по имиджу, маркетингу, тех.работе с сайтом.
<br><br>
Уроки построены грамотно, материал хорошо структурирован, нет воды, все четко и по делу. Бесценны профессиональные советы Кати. Особенно — в части проверки д/з- что изменить, добавить, убрать — это позволяет обойти некоторые подводные камни. Иногда прямо озаряло: да, вот оно! этого мне как раз и недоставало! Спасибо Кате огромное за подробные и полные комментарии!
<br><br>
Занятия по созданию и работе с сайтом — это отдельная песня. Сначала я думала, что это из разряда фантастики и мои мысли были типа : «Ира, ты что, хочешь это освоить? ты бредишь?» А не так давно я показала свой сайт своему программисту, он выпучил глаза и спросил: «Вы это сделали сами???». У него был шок и, по-моему, он стал уважать меня еще больше:) Но это заслуга не моя, а Андрея и Руслана- так понятно, как они мне не объяснял ни один программист!
<br><br>
Я и сама очень изменилась. Мои образы стали интереснее, живее, разнообразнее, гораздо смелее и стильней. Я стала увереннее. Наверное, моя уверенность транслируется окружающим — я получаю комплименты, и даже получила прибавку к з/п (я же теперь знаю, как выглядеть компетентнее!)
Полезны были занятия по психологии, маркетингу и продвижению — наиважнейшие моменты, особенно для меня, т.к. я считала, что не смогу заниматься продажами. Теперь появились знания, а с ними и уверенность.
<br><br>
В процессе обучения и выполнения д/з был страх: вдруг не получится? Уроки смотрела по два раза, с составлением конспектов. Д/з на тему цветотипов переделывала несколько раз, но и консультация по цветотипам у меня прошла легче и лучше остальных.
<br><br>
Страх ушел, когда я провела консультации по всем темам. Теперь мне гораздо легче двигаться дальше. Жаль только, что теперь не будет Катиных советов!
Мне сложно определить, что в тренинге можно улучшить. Все необходимые основы даны. А дальше — это уже вопрос желаний каждого. Всё, что нужно для того, чтобы идти дальше в профессию — я получила. А для себя, своего стиля — более чем достаточно!
<br><br>
Огромная благодарность вам, Катя и Андрей! Эти месяцы обучения были наполнены удивительной радостью, новыми знаниями, удовольствием и гордостью за себя, когда что-либо получалось! Вы — большие молодцы и настоящие профессионалы! Спасибо вам за вашу работу, за переданные знания и опыт!
<br><br>
Еще хочу добавить, сразу упустила.
<br><br>
Очень важна (для меня, во всяком случае)оказалась пятиминутка в дне 24 — о саботаже при выходе из зоны комфорта и о преодолении внутреннего сопротивления. Как это было кстати! Как раз руки опускались и начали проклевываться сомнения.<br><br>Ирина Луговая</p></blockquote></div>

<div>
	<img src="https://www.glamurnenko.ru/products/imageschool/images/ava_none.jpg" alt="" style="
		float: left;
		margin: 40px 80px 0px 60px;
">
					<blockquote><p style="text-align:left;margin-left: 330px;">
						СЕЙЧАС, КОГДА Я ПОЛУЧИЛА ЭТОТ МАТЕРИАЛ, БЕЗ ЛИШНЕГО ПАФОСА МОГУ СКАЗАТЬ, ЧТО ВОЗМОЖНО, ЕСЛИ БЫ ВСЕ ЭТО ЗНАТЬ РАНЬШЕ, ТО И МОЯ ЛИЧНАЯ ЖИЗНЬ И КАРЬЕРА МОГЛА БЫ СЛОЖИТЬСЯ ПО-ДРУГОМУ. ДА ДА. ЭТО НЕ ГРОМКИЕ СЛОВА. ЭТО МОЕ УБЕЖДЕНИЕ.
						<br/><br/>
						Здравствуйте, Катя и все красавицы этого тренига! Меня зовут Елена. Мне 48 лет, живу в прекрасном, очень красивом городе Львове. У меня два высших образования. Ну и как водится у нас в стране — женщины очень много работают.
<br/><br/>
Так случилось и в моей жизни — строила карьеру, зарабатывала деньги, одна поднимала детей. Потом так устала от вечной борьбы за выживание и ушла с хорошей роботы и высокой должности. Многие меня не поняли тогда. Но я ни о чем не жалею. Сейчас «на своих хлебах» — занимаюсь страховым бизнесом.
<br/><br/>
Я всегда нравилась мужчинам, но личная жизнь, тем не менее, не сложилась.
<br/><br/>
Сейчас, когда я получила этот материал, без лишнего пафоса могу сказать, что возможно, если бы все это знать раньше, то и моя личная жизнь и карьера могла бы сложиться по-другому. Да да. Это не громкие слова. Это мое убеждение.
<br/><br/>
Работать над домашними заданиями было очень интересно. Я первые дни даже спать не могла, на столько это было увлекательно. По началу было сложно найти нужные цвета для своего цветотипа, правильно и «вкусно» их сочетать. И я много раз просматривала разбор домашних заданий, который проводила Катя. Каждый раз что-то новое для себя находила.
<br/><br/>
Просматривая, как легко все получается у Кати, начинала составлять комплекты-луки в интернете. Это было очень увлекательно. Однако не так просто на практике. Тем не менее, сейчас я думаю, что все ведь так логично и просто описано в тренинге. Почему раньше это не приходило в голову?
<br/><br/>
Сейчас я думаю, что мне пришло на почту приглашение подписаться на Катину рассылку и как хорошо, что я тогда не прошла мимо.<br/>
Решив принять участие в тренинге, я надеялась, что это придаст мне силы к тому, чтоб изменить свою внешность и не поддаться возрасту.<br/>
Во время тренинга я испытала множество эмоций. И все положительные. Как же это здорово, когда ты видишь себя красивой, молодой и успешной. А какая женщина не любит комплименты?
<br/><br/>
Для меня приятным открытием был подбор аксессуаров — интересные сочетания цветов в обуви и сумках. Как я раньше могла носить черную обувь и черные сумки? Однако буду еще просматривать материалы, поскольку есть еще вопросы по стилям, по созданию интересных комплектов.
<br/><br/>
Я еще раз хочу от всей души поблагодарить Катю за прекрасное качество предоставленных материалов. ЭТОТ ТРЕНИНГ ЛУЧШИЙ В РУНЕТЕ!!!!! Все очень логично и доходчиво, прекрасно и наглядно подобраны примеры в картинках.
<br/><br/>
От всей души желаю Вам, Катя, огромного счастья, здоровья, творческого вдохновения, удовольствия от работы и всего наилучшего. А всем участницам тренинга — найти свой стиль и свою «изюминку», быть красивыми и неповторимыми, получать удовольствия от жизни и всего самого наилучшего.<br/><br/>Елена Усова</p></blockquote></div>


<div>
								<img src="https://www.glamurnenko.ru/products/imageschool/images/ava_none.jpg" alt="" style="
									float: left;
									margin: 40px 80px 0px 60px;
							">
												<blockquote style="background-color: rgba(235,228,202,1);"><p style="text-align:left;margin-left: 330px;">
													ЗА ПЕРВЫЙ ЭТАП СВОЕЙ РАБОТЫ Я ПОЛУЧИЛА 8000 РУБЛЕЙ. ОЧЕНЬ ПРИЯТНО ПОЛУЧАТЬ ДЕНЬГИ ЗА РАБОТУ, КОТОРУЮ ДЕЛАЕШЬ С УДОВОЛЬСТВИЕМ. ТЕПЕРЬ НА ПОДХОДЕ ШОПИНГ, НЕМНОГО СТРАШНОВАТО) ХОТЯ, КОГДА Я УЖЕ НАМЕТИЛА ОБЩУЮ КОНЦЕПЦИЮ СТАЛА НАМНОГО СПОКОЙНЕЕ.
<br><br>
Хочу поделиться впечатлениями о первых заработанных деньгах.
<br><br>
Моей первой более серьезной клиенткой стала моя знакомая. До этого я проводила консультации по скайпу и бесплатно для наработки опыта.
<br><br>
Так вот, моя знакомая сейчас меняет место работы на более престижную и ей нужно поменять свой гардероб, особенно его деловую часть. Она медицинский работник и раньше на работе ходила в халате, поэтому рабочего гардероба как такого у нее не было. Сейчас ее работа заключается в проведении встреч и конференций, и теперь деловой гардероб просто необходим.
<br><br>
Я с ней провела первую встречу, выяснила все потребности и предпочтения. Далее определила ее цветотип. Было несложно — она натуральное лето. Довольно быстро разобралась с ее фигурой, благо у нее она хорошая и практически не требует коррекции (в профиль треугольник основанием вниз, а в фас песочные часы).
<br><br>
Мы с ней договорились работать в два этапа. Поскольку ей интересно разобраться в своем стиле, поэтому этап первый — я подготовила для нее презентацию со всеми рекомендациями и примера с подиума. Второй этап – это собственно шопинг. Договорились провести его в сентябре.
<br><br>
Помимо первой встречи и определения цветотипа, я провела еще с ней полную консультацию, на которой показала все материалы подготовленной презентации. Она осталась довольна. Сказала, все, что я предложила, интуитивно ей всегда нравилось, и еще я это все очень удобно структурировала для нее.
<br><br>
Ей понравилась индивидуальная цветовая палитра. Я нарисовала ее красками. Решила попробовать такой вариант, потому что в электронном виде цвет иногда сильно искажается на разных компьютерах.
<br><br>
Теперь о самом приятном. За первый этап своей работы я получила 8000 рублей. Очень приятно получать деньги за работу, которую делаешь с удовольствием. Теперь на подходе шопинг, немного страшновато) хотя, когда я уже наметила общую концепцию стала намного спокойнее.<br><br>Катерина Сорокина</p></blockquote></div>

<div>
	<img src="https://www.glamurnenko.ru/products/imageschool/images/ava_none.jpg" alt="" style="
		float: left;
		margin: 40px 80px 0px 60px;
">
					<blockquote><p style="text-align:left;margin-left: 330px;">
						ДЛЯ МЕНЯ ПРОФЕССИЯ ИМИДЖМЕЙКЕР, ЭТО СПОСОБ СДЕЛАТЬ СВОЕ ХОББИ – РАБОТОЙ. Я СЧИТАЮ БОЛЬШОЙ УДАЧЕЙ, ЧТО Я МОГУ ПОЛУЧАТЬ ЗА ЭТО ДЕНЬГИ! ОТ ТРЕНИНГА У МЕНЯ ОСТАЛИСЬ ТОЛЬКО ЛУЧШИЕ ВПЕЧАТЛЕНИЯ. КАЖДЫЙ УРОК И КАЖДОЕ КАТИНО ПИСЬМО В ПОЧТОВЫЙ ЯЩИК, ПРОСТО ЗАРЯЖАЕТ МЕНЯ ЭНЕРГИЕЙ, МНЕ ХОЧЕТСЯ ХВАТАТЬ КОГО-ТО И БЕЖАТЬ ПРЕОБРАЖАТЬ ЕГО В ЛУЧШУЮ СТОРОНУ. У МЕНЯ ТАКОЕ ВПЕЧАТЛЕНИЕ, ЧТО МНЕ ПЕРЕСАДИЛИ МОЗГ. Я ТЕПЕРЬ ТОЧНО ЗНАЮ, КАК ХОРОШО ВЫГЛЯДЕТЬ САМОЙ И ПРЕОБРАЖАТЬ ДРУГИХ, А ШОПИНГ ПЕРЕСТАЛ БЫТЬ ДЛЯ МЕНЯ МУКОЙ. МУЖ, ГЛЯДЯ НА МЕНЯ, ГОВОРИТ, ЧТО ТОЛЬКО МОЕ НАСТРОЕНИЕ И МОЕ УДОВОЛЬСТВИЕ, ОТ ТОГО ЧТО Я ДЕЛАЮ, УЖЕ ОКУПИЛ ЕМУ ЭТОТ ТРЕНИНГ.
						<br/><br/>
						Я всегда любила наряжаться и делать макияж, считала себя модницей. Теперь я знаю, что у меня плохо получалось. По образованию я юрист, 5 лет проработала в суде. Работы завалы, зарплата маленькая. Кроме работы, у меня ни на что не было времени, ни на мужа, ни на ребенка, который скатился на двойки в школе, о друзьях вообще молчу. Мне казалось, что жизнь проходит мимо меня, пока я сижу, уткнувшись в протоколы. Я стала задумываться, чтобы сменить работу с достойной заработной платой, но на государство или «дядю» я работать не хотела. Хотелось начать свое дело, которое мне будет приносить и моральное удовлетворение, и деньги, чтобы я сама была хозяйкой своего времени и сама устанавливала рабочий график.
<br/><br/>
В один прекрасный день я решила уволиться и действовать. К счастью после увольнения я забеременела и у меня появилось достаточно времени для раздумий. Мы перебирали с мужем множество вариантов, чтобы с минимальным бюджетом, так как накоплений у нас не было, а был большой пассив в виде строящегося дома, землю под который мы взяли в ипотеку.
<br/><br/>
Как-то я наткнулась на фотографию стильно одетой девушки в инстаграмме и вошла на ее страницу. Этой девушкой оказалась имиджмейкер Яна Фисти. Вы, Катя, наверно ее знаете. Мне нравятся ее работы, хотя, они бывают достаточно своеобразны, поскольку она любит сочетать не сочетаемое. Я прочитала ее историю о том, что она самоучка и нигде имиджу не училась, была юристом, потом уволилась с работы вместе со своим мужем, чтобы начать вместе свое дело. И тут меня осенило! Почему я раньше свое увлечение модой не рассматривала как работу?
<br/><br/>
Я приняла решение учиться имиджу, начала искать школы, в которых можно учиться онлайн. Я смотрела больше не на теорию, а на работы выпускников школ и работы имиджмейкеров, которые обучают имиджу. Затем мой муж наткнулся на ваш сайт, на который я впоследствии подсела. Я участвовала в бесплатном семинаре, мне понравилось как Вы преподносите теорию, очень доходчиво и понятно, рассказывая интересные истории, примеры. Так же понравились образы для клиентов. И так сошлись звезды, что я учусь у Вас.
<br/><br/>
Для меня профессия имиджмейкер, это способ сделать свое хобби – работой. Раньше я бесплатно занималась этим, ходя по магазинам с родными и подругами. Мне нравилось одевать людей. И я считаю большой удачей, что я могу получать за это деньги!
<br/><br/>
За время учебы в школе имиджмейкеров:<br/>
— Дала 4 бесплатных консультации по цвету, фигуре и стилю.<br/>
— Разобрала свой гардероб.<br/>
— Провела 3 шопинга.<br/>
— В сумме за 2 шопинга потрачено 23 000 рублей.<br/>
— Заработала пока только опыт.<br/>
— Я создала сайт и стараюсь его по мере возможностей улучшать. Так же создала страничку в ВК, где предлагаю бесплатную услугу, пишу статьи и небольшие советы.<br/>
— Я написала 7 статей на сайте и 40 небольших постов с советами и образами в группе ВК.<br/>
— Создала книгу о женском базовом гардеробе.<br/>
— Серия писем в разработке. Книга уже есть, но ч хочу написать интересные статьи, чтобы потом не писать впопыхах, так как статьи писать мне пока трудно. Я решила подойти основательно и сначала подготовить материал, а потом создать письма. Но я над этим работаю!<br/>
— Я заказывала рекламу в ВК на 1000 показов, и сама рассылала приглашения друзьям и знакомым. В итоге 19 подписчиков в группе. Большую часть привлекла в группу сама, реклама оказалась не очень действенной. Но я поняла ошибку, и впоследствии, буду заказывать не количество показов рекламы людям, а количество подписчиков. Хоть это дороже, но думаю, будет действенней. На сайте пока нет подписчиков.<br/>
<br/><br/>
Я точно знаю, что я еще улучшу свою книгу, напишу интересные статьи на сайт, создам рассылку серии писем, найму флилансера для создания комментариев на моем сайте, так же хочу улучшить оформление сайта. Я не собираюсь останавливаться на достигнутом, и уже продумала план дальнейших действий развития своего дела. В него так же входит в будущем и стажировка у Кати в Милане, научиться писать продающие тексты, так как с текстами у меня беда, научиться красиво оформлять письма в рассылку с кнопками, картинками и т.д.
<br/><br/>
От тренинга у меня остались только лучшие впечатления. Каждый урок и каждое Катино письмо в почтовый ящик, просто заряжает меня энергией, мне хочется хватать кого-то и бежать преображать его в лучшую сторону. О моих озарениях я уже писала ранее и не знаю даже, стоит ли повторяться? У меня такое впечатление, что мне пересадили мозг. Я теперь точно знаю, как хорошо выглядеть самой и преображать других, а шопинг перестал быть для меня мукой. Муж, глядя на меня, говорит, что только мое настроение и мое удовольствие, от того что я делаю, уже окупил ему этот тренинг.
<br/><br/>
Катя и Андрей, Вы просто молодцы, что сделали такой интересный тренинг<br/><br/>Анна Хорьякова</p></blockquote></div>

<div>
								<img src="https://www.glamurnenko.ru/products/imageschool/images/ava_none.jpg" alt="" style="
									float: left;
									margin: 40px 80px 0px 60px;
							">
												<blockquote style="background-color: rgba(235,228,202,1);"><p style="text-align:left;margin-left: 330px;">
													С ТЕХ ПОР КАК Я НАЧАЛА УЧИТЬСЯ В ШКОЛЕ, МНОГОЕ ИЗМЕНИЛОСЬ В МОЕМ ГАРДЕРОБЕ. ВЗГЛЯДЫ, КОМПЛЕМЕНТЫ ОТ ОКРУЖАЮЩИХ ОЧЕНЬ ПРИЯТНЫ! ))) ЕКАТЕРИНА, ОГРОМНОЕ ВАМ СПАСИБО, ЗА ШКОЛУ! ОЧЕНЬ ЦЕННЫЕ ЗНАНИЯ! ОЧЕНЬ ДОСТУПНО И ПОНЯТНО! НА МОЙ ВЗГЛЯД ВСЕ ОТЛИЧНО!!!
<br><br>
До тренинга было желание научиться не только самой одеваться стильно и со вкусом, но помогать своим подругам, и женщинам. Каждая поездка в метро подтверждает, что наши женщины пока не умеют правильно одеваться. А с тех пор как я начала учиться в школе, многое изменилось в моем гардеробе.
Взгляды, комплементы от окружающих очень приятны! )))
<br><br>
За 2 месяца обучения в Школе Имиджмейкеров я сделала следующее:<br>
— сколько провели консультаций – пока только 5<br>
— сколько разборов гардероба – пока только 3<br>
— сколько шопингов – пока только 2<br>
— кол-во денег, потраченных на шопингах – около 20.000 руб.<br>
— сколько заработали вы всего – о, т.к. это были тренировочные встречи с подругами<br>
— создали ли сайт — да<br>
— сколько статей – 11 статей<br>
— создали ли front-end (книгу или видео) – книга в процессе, видео нет<br>
— создали ли серию писем, сколько писем в серии – да<br>
— где пиарились, где набирали подписчиков, с кем заключили партнерские отношения – пока нет<br>
— сколько у вас подписчиков – пока нет<br>
<br><br>
Планирую проводить небольшие бесплатные мастер-классы, с целью привлечения клиентов.
<br><br>
Екатерина, огромное Вам спасибо, за школу! Очень ценные знания! Очень доступно и понятно! На мой взгляд все отлично!!! Еще раз БОЛЬШОЕ СПАСИБО!!!<br><br>Екатерина Эрхард</p></blockquote></div>


<div>
	<img src="https://www.glamurnenko.ru/products/imageschool/images/ava_none.jpg" alt="" style="
		float: left;
		margin: 40px 80px 0px 60px;
">
					<blockquote><p style="text-align:left;margin-left: 330px;">
						ПОПРОСИЛА СУПРУГА СДЕЛАТЬ МНЕ ПОДАРОК НА 10-ЛЕТИЕ НАШЕЙ СВАДЬБЫ — ПОДАРИТЬ МНЕ ПУТЁВКУ В НОВУЮ ЖИЗНЬ – Т.Е. ШКОЛУ ИМИДЖМЕЙКЕРОВ! И Я ПРИЗНАЮСЬ, ЧТО ПОСЛЕДНИЕ ПОЛ ГОДА Я ЖИВУ КАК В СЧАСТЛИВОМ СНЕ… ОЧЕНЬ ИЗМЕНИЛОСЬ КАЧЕСТВО МОЕЙ ЖИЗНИ. Я ОЩУЩАЮ СЕБЯ ДРУГИМ ЧЕЛОВЕКОМ, ВЕДУ СЕБЯ «КАК ИМИДЖМЕЙКЕР», ДАЖЕ РЕАГИРУЮ ПО-ДРУГОМУ И МОЙ ОБРАЗ ТОЖЕ ПРЕТЕРПЕЛ БОЛЬШИЕ ИЗМЕНЕНИЯ! ТРЕНИНГ ПРОШЁЛ ДЛЯ МЕНЯ «НА ОДНОМ ДЫХАНИИ» — КАК 1 ДЕНЬ! ЗА ВРЕМЯ ОБУЧЕНИЯ ВЫ СТАЛИ ДЛЯ МЕНЯ БОЛЬШЕ, ЧЕМ УЧИТЕЛЕМ! КАКИМ-ТО ВОЛШЕБНЫМ ОБРАЗОМ ВЫ ВСЕЛИЛИ В МЕНЯ УВЕРЕННОСТЬ В СЕБЕ И СВОИХ СИЛАХ.
						<br/><br/>
						Работать в модной индустрии – Моя детская Мечта. Даже не мечта, а цель, к которой я шла.
<br/><br/>
В течении пяти лет я ходила в художественную школу (она была академической по полной программе: живопись, рисунок, скульптура, композиция, мировая художественная культура – всё это венчалось экзаменами по этим предметам), изучала историю костюма, стилистические направления, составляла списки видов тканей и какая одежда из них изготовляется, много рисовала костюмов и платьев, запоминала удачные образы, а если видела, что «что-то не так» пыталась анализировать — «Почему?».
<br/><br/>
Моей маме казалось, что это неприбыльная профессия, поэтому она настоятельно рекомендовала мне заняться изучением иностранных языков и стать переводчиком…
<br/><br/>
И пошло-поехало… освоила Яна 3 языка и уехала жить за границу. Со стороны казалось, что всё хорошо, но если честно, то внутри росла ПУСТОТА, которую ни любимый муж, ни обожаемые дети не могли заполнить. Это было ЖЕЛАНИЕ ТВОРИТЬ.
<br/><br/>
Случай подвернулся как нельзя кстати. Мне очень понравилось высказывание Анны Винтур, о том что она рекомендует всем быть уволенными!<br/><br/>
Проект, над которым я работала, решили закрыть и я поняла, что у меня в руках наконец-то оказался реальный шанс ИЗМЕНИТЬ СВОЮ ЖИЗНЬ.<br/><br/>
Надо сказать, что коллеги по работе уже давно подогревали моё желание стать имиджмейкером. Две мои начальницы однажды тихо загнали меня в укромный уголок и стали интересоваться «с напором», где я покупаю одежду…
<br/><br/>
В другой раз коллега фактически наизнанку вывернула мою одежду, попросив потрогать джемпер…
<br/><br/>
Апогеем стала молоденькая сотрудница, которая «в лоб» спросила мена «Как сделать так, чтобы стать ВАМИ?»
<br/><br/>
Я должна сказать, что для меня это было как «пинок» к действию.
<br/><br/>
Я не пошла искать новую работу, а попросила супруга сделать мне подарок на 10-летие нашей свадьбы — подарить мне путёвку в НОВУЮ ЖИЗНЬ – т.е. ШКОЛУ ИМИДЖМЕЙКЕРОВ!
<br/><br/>
И я признаюсь, что последние пол года я живу как в счастливом сне… Очень изменилось КАЧЕСТВО моей жизни. Я ощущаю себя другим человеком, веду себя «как имиджмейкер», даже реагирую по-другому и мой образ тоже претерпел большие изменения!
<br/><br/>
Но это только НАЧАЛО!..
<br/><br/>
Всё самое интересное – ЖДЁТ ВПЕРЕДИ!
<br/><br/>
За время обучения:<br/>
・провела 3 пробные консультации (по цвету-стилю-фигуре)<br/>
・3 разбора гардероба<br/>
・2 шопинга<br/>
・Заработала опыт<br/>
・Создала сайт<br/>
　　・Написала 12 статей<br/>
　　・Книга находится в активной разработке (скоро закончу и выложу), записала 1 пробное видео<br/>
　　・Серия писем также в активной разработке<br/>
　　・PR пока «самое слабое звено», прикидываю на бумаге, как организовать и с кем сотрудничать<br/>
　　・7 подписчиков (друзья, знакомые)
<br/><br/>
Всё время кажется, что надо ещё опыта набраться или дополнительных знаний, прежде чем пиариться…Но оглядываясь назад, понимаю, что это уже отговорки – и пришло время действовать смело.
<br/><br/>
В планах:<br/>
・дописать книгу,<br/>
・снять ещё видео (мне понравилось),<br/>
・создать версию сайта на иностранном языке<br/>
・прикрутить другую платёжную систему (Глопарт действует только на территории РФ)<br/>
・создать серию писем (интересно оформив их)<br/>
・начинать-таки пиариться и искать партнёров
<br/><br/>
Тренинг прошёл для меня «на одном дыхании» — как 1 день! Задания были челенджеровые, и именно поэтому их было так интересно выполнять! Опыт и уверенность в себе копились постепенно и пришли «НЕЗАМЕТНО». Каждый новый урок открывал много больших секретов и маленьких хитростей!
<br/><br/>
Сейчас эмоции немного улеглись, но на первых занятиях кожей ощущала всплеск адреналина, переходя от выполнения одного домашнего задания к другому…
На смену адреналину, пришла спокойная уверенность : «Я знаю, что надо делать – ИДТИ ВПЕРЁД!»
<br/><br/>
В целом хочется сердечно поблагодарить всех, кто участвовал в создании этого тренинга – Екатерину, Андрея, Руслана – т.к. он дает в руки такие инструменты, получив которые хочется создавать новую реальность!
<br/><br/>
За время обучения Вы стали для меня больше, чем Учителем! Каким-то волшебным образом вы вселили в меня уверенность в себе и своих силах.
Это ощущение довольно трудно описать словами.
<br/><br/>
У меня как будто появился «вектор движения», который приводит меня в действие.
<br/><br/>
Обучение почти завершилось, но совсем не хочется прощаться с вами
<br/><br/>
Я теперь совершенно точно знаю, что пойду по пути «стилиста-имиджмейкера» и ИСКРЕННЕ БЛАГОДАРЮ ВАС за то, что вы помогали мне делать первые шаги на этом Пути!
<br/><br/>
С Уважением и Благодарностью, которая не знает границ,<br/>
Ваша ученица, Яна<br/><br/>Яна Бабенко</p></blockquote></div>

<div>
								<img src="https://www.glamurnenko.ru/products/imageschool/images/ava_none.jpg" alt="" style="
									float: left;
									margin: 40px 80px 0px 60px;
							">
												<blockquote style="background-color: rgba(235,228,202,1);"><p style="text-align:left;margin-left: 330px;">
													МЕНЯ ВСЕГДА ПОРАЖАЛА ЭСТЕТИЧЕСКАЯ СТОРОНА МОДЕЛЕЙ ОДЕЖДЫ, НЕОБЫЧНЫЙ ДИЗАЙН, СОЧЕТАНИЯ. ОДНАКО В РЕАЛЬНОЙ ЖИЗНИ БЫЛО ВСЕ ДОВОЛЬНО ПРОЗАИЧНО — ТЕХУНИВЕРСИТЕТ И СКУЧНАЯ РАБОТА С БУМАГАМИ… В КАКОЙ-ТО МОМЕНТ Я ВСПОМНИЛ О СВОЕМ УВЛЕЧЕНИИ, СВОЕЙ СТРАСТИ И РЕШИЛ ПОМЕНЯТЬ ЧТО-ТО В СВОЕЙ ЖИЗНИ. В ОБЩЕМ ТРЕНИНГ ПОНРАВИЛСЯ. МНОГО ИНФОРМАЦИИ, ПРИЧЕМ ПОДКРЕПЛЕННОЙ ОПЫТОМ, СОВЕТАМИ.
<br><br>
Признаюсь, обучение в Школе заняло больше 2-х месяцев. В круговороте ежедневной рутины сложно выделить час-полтора, чтобы вдумчиво прослушать лекции. Но тем не менее путь этот я осилил, что уже плюс.:)
<br><br>
Почему решили стать имиджмейкером
<br><br>
Модой я увлекся давно. Меня всегда поражала эстетическая сторона моделей одежды, необычный дизайн, сочетания. Однако в реальной жизни было все довольно прозаично — техуниверситет и скучная работа с бумагами… В какой-то момент я вспомнил о своем увлечении, своей страсти и решил поменять что-то в своей жизни. Пока удалось немного, но дорогу осилит идущий.
<br><br>
Для меня в работе имиджмейкера объединились две интересные сферы — с одной стороны эстетика (в гармоничном составлении образов), а с другой стороны психология (как отражение внутреннего мира человека в предложенном образе). На мой взгляд обе составляющих важны.
<br><br>
Что сделали за 2 месяца обучения в Школе Имиджмейкеров<br>
— сколько провели консультаций — 2 консультации по подбору формы стрижек и 1 консультация по стилю<br>
— сколько разборов гардероба — 1 (для себя)<br>
— сколько шопингов — 1 (для себя)<br>
— кол-во денег, потраченных на шопингах — около 60 000 руб.<br>
— создали ли сайт — пока нет, но работаю в этом направлении.<br>
— сколько статей — две статьи на форумах о моде и стиле (платья для новогодних праздников и по сочетанию аксессуаров)
<br><br>
Планирую создать сайт. Найти 5 реальных клиентов. Составить наконец карту магазинов торговых центров (у меня пока все на листочках — не могу собрать все воедино). Провести семинар или вебинар по стилю.
<br><br>
В общем тренинг понравился. Много информации, причем подкрепленной опытом, советами. Екатерина, Андрей спасибо за потрясающий тренинг.<br><br>Сергей К.</p></blockquote></div>

<div>
	<img src="https://www.glamurnenko.ru/products/imageschool/images/ava_none.jpg" alt="" style="
		float: left;
		margin: 40px 80px 0px 60px;
">
					<blockquote><p style="text-align:left;margin-left: 330px;">
						ВАШИ ПИСЬМА ЗАРОДИЛИ ВО МНЕ МЕЧТУ, ЦЕЛЬ В ЖИЗНИ, И НАДЕЖДУ, ЧТО Я СМОГУ И У МЕНЯ ПОЛУЧИТСЯ СТАТЬ ИМИДЖМЕЙКЕРОМ, ДАЖЕ ЕСЛИ ЭТО МНЕ НЕ ЗНАКОМО. ТРЕНИНГ ПРОШЕЛ КАК «НА ОДНОМ ДЫХАНИИ», Я ПОЧТИ НЕ ОТХОДИЛА ОТ КОМПА И СЛУШАЛА ЗАПИСИ. ТЕПЕРЬ, КОГДА ВСЕ ЗНАНИЯ РАЗЛОЖЕНЫ ПОЧТИ ПО ПОЛОЧКАМ, ЭТО БЛАГОДАРЯ ЕЩЕ И ДОМАШНИМ ЗАДАНИЯМ, Я ИМЕЮ ЧЕТКИЙ ПЛАН ДЕЙСТВИЙ, ЗНАЮ, ЧТО Я ДЕЛАЮ И В КАКОМ НАПРАВЛЕНИИ МНЕ ДВИГАТЬСЯ ДАЛЬШЕ, ЧТОБЫ ДОСТИЧЬ УСПЕХА.
						<br/><br/>
						Кто-то всю жизнь интересуется модой, хорошо разбирается в стилях, а я была далека от всего этого и никогда не гонялась за модой. Мне было хорошо в том, в чем мне комфортно. Пока в моей жизни не появились мои прекрасные девочки. Мне стало стыдно, и я очень сильно захотела, чтобы мои дети мной гордились, чтобы я была для них отличным примером как быть женственной, стильной, успешной.
<br/><br/>
В мой день рождения я впервые наткнулась на ваш сайт. До этого мне вообще такое не попадалось на глаза никогда. И в этот день ваши письма зародили во мне мечту, цель в жизни, и надежду, что я смогу и у меня получится стать имиджмейкером, даже если это мне не знакомо. Но я хочу разбираться в теме красоты и стиля не только для себя или для своих девочек, я хочу помочь другим увидеть красоту в себе и помочь обрести уверенность в себе, а следом и успех. А что не рождает уверенность как красивый и стильный образ!
<br/><br/>
Сразу напишу, что пока прибыли не заработала, была только практика на семье и знакомых, но зато это привело к тому, что на январь и февраль у меня уже запланировано по 2 встречи. С нетерпением жду и волнуюсь, так как это будут незнакомые люди. Поэтому буду готовиться, и продолжать тренироваться он-лайн.
<br/><br/>
Консультаций провела 2, разобрала 1 гардероб и на каникулах буду тренироваться на гардеробе сестры, 1 шопинг.
<br/><br/>
Создала сайт и теперь наполняю его статьями, которых пока 4, сделала наброски на книгу, но пока в процессе.
<br/><br/>
На мой взгляд, все темы я проработала достаточно хорошо.
<br/><br/>
В ближайший месяц я планирую наполнять и улучшать сайт, создать серию писем, создать группу в соцсетях и начать пиариться там, набирать подписчиков, закончить книгу, провести встречи в январе и начать зарабатывать, а в следующие месяцы хочу заняться еще и мастер-классами.
<br/><br/>
Тренинг прошел как «на одном дыхании», я почти не отходила от компа и слушала записи. Теперь, когда все знания разложены почти по полочкам, это благодаря еще и домашним заданиям, я имею четкий план действий, знаю, что я делаю и в каком направлении мне двигаться дальше, чтобы достичь успеха.
Катя, спасибо вам и вашей команде за вашу отличную работу! Ваши советы, примеры вдохновляют и не дают опускать руки.
<br/><br/>
В тренинге все хорошо, особенно примеры, приведенные из личного опыта.<br/><br/>Оксана Чикало</p></blockquote></div>

<div>
								<img src="https://www.glamurnenko.ru/products/imageschool/images/ava_none.jpg" alt="" style="
									float: left;
									margin: 40px 80px 0px 60px;
							">
												<blockquote style="background-color: rgba(235,228,202,1);"><p style="text-align:left;margin-left: 330px;">
													СНАЧАЛА Я НАЧАЛА УЧИТЬСЯ НА ИМИДЖМЕЙКЕРА ДЛЯ СЕБЯ. НО ЧЕМ ДАЛЬШЕ СТАЛА РАЗБИРАТЬСЯ, ТЕМ СТАЛО ИНТЕРЕСНЕЕ. КОГДА ЧУВСТВУЕШЬ СЕБЯ В ЧЕМ-ТО ЭКСПЕРТОМ, ЭТИМ МОЖНО ПОДЕЛИТЬСЯ С ДРУГИМИ. РЕШИЛА, ЭТО БУДЕТ МОЕЙ ПРОФЕССИЕЙ. ТРЕНИНГ И ТЕ ЗНАНИЯ, КОТОРЫЕ Я ПОЛУЧИЛА, РАССТАВИЛ ВСЕ ПО СВОИМ МЕСТАМ. ОЧЕНЬ ПОНРАВИЛОСЬ ТО, ЧТО ВСЕ ПЕРСОНАЛИЗИРОВАНО, ВЫ ЛИЧНО ОТВЕЧАЕТЕ НА ДОМАШНИЕ ЗАДАНИЯ, ВАШ ЗВОНКИЙ ГОЛОС СИЛЬНО ЗАРЯЖАЕТ.
<br><br>
Для меня магазины с одеждой — это отдушина. Не всегда конечно так было. Был далекий период, когда я боялась заходить в магазины, подходить к одежде, не говоря уже о том, что бы взять что-то и померить. Постепенно это все было преодолено и с каждым разом было все интереснее и интереснее находить что-то уникальное. Но долгое время покупки были эмоциональными и не совсем продуманными.
<br><br>
Мне часто в жизни приходилось переезжать и в каждый такой переезд выкидывалось примерно по 10 пакетов с одеждой, которую я не хотела брать в новую жизнь….Таким образом, я постепенно пришла к пониманию, что шоппинг тоже может быть наукой и продуманной системой. Сначала я начала учиться на имиджмейкера для себя. Быть стилистом для самой себя – это здорово. Но чем дальше стала разбираться, тем стало интереснее. Когда чувствуешь себя в чем-то экспертом, этим можно поделиться с другими. Решила, это будет моей профессией.
<br><br>
У меня есть две склонности делать это. Первая –в моей жизни часто происходят перемены. Организую их сама себе. Смена имиджа, новый гардероб и т.п. — это тоже связано с переменами. Я могу помочь другим через это пройти. Вторая интересная склонность – до сих пор я работала аналитиком. Мое любимое занятие — из хаоса информации сделать структуру, систему и т.п. Недавно осенило – магазины, торговые центры и т.п. для кого-то тоже сплошной хаос. Есть много знакомых, кто даже боится туда заходить, столько всего из чего надо выбрать что-то одно.
<br><br>
Для меня никогда не было проблемой найти интересную и нужную вещь. Я захожу в магазин и сразу из дверей вижу, есть ли эта вещь или нет. Поэтому, зная определенные правила очень интересно из такого «хаоса» одежды помочь другим собрать нужный образ. Если для кого-то шоппинг стресс — для меня это увлекательное занятие.
<br><br>
В период обучения я занималась своим гардеробом. Решила, что, прежде всего надо разобраться с самой собой. Коммерческая деятельность – следующий этап.
<br><br>
Тренинг и те знания, которые я получила, расставил все по своим местам. Я получила исчерпывающую информацию по цвету, стилям, фигуре. Очень много практических примеров, которые можно смело использовать. Мне понравилось, как Вы искренне делитесь своим опытом, и эта искренность заряжает энергией и энтузиазмом. Очень понравилось то, что все персонализировано, Вы лично отвечаете на домашние задания (не через консультантов). Исчерпывающе отвечаете на вопросы. Главный наверное козырь – то, что есть возможность слышать Ваш голос и даже какие то видео записи. Создает связь. Ваш звонкий голос сильно заряжает.
<br><br>
Я научилась красиво сочетать цвета. Разобралась с фигурами и подбором одежды. Начала различать четко стили. Определять какие стили кому и в каких ситуациях подходят.
<br><br>
Начала разглядывать людей и видеть ошибки в одежде. Мысленно понимать, как это можно поправить.<br><br>Оксана Новакова</p></blockquote></div>

<div>
	<img src="https://www.glamurnenko.ru/products/imageschool/images/ava_none.jpg" alt="" style="
		float: left;
		margin: 40px 80px 0px 60px;
">
					<blockquote><p style="text-align:left;margin-left: 330px;">
						Я «НАТКНУЛАСЬ» НА РЕКЛАМНЫЙ «ТЕСТ ОТ СТИЛИСТА» ЕКАТЕРИНЫ МАЛЯРОВОЙ, ПРОШЛА ЕГО И НА ВОПРОС: «ХОТИТЕ ЛИ ВЫ СТАТЬ ИМИДЖМЕЙКЕРОМ?» БЕЗ КОЛЕБАНИЙ ОТВЕТИЛА: «ДА». ТРЕНИНГ МНЕ ПОНРАВИЛСЯ. БЫЛО ОБЕЩАНО МНОГОЕ, А ДАНО – В РАЗЫ БОЛЬШЕ. БОЛЬШУЮ ЦЕННОСТЬ ДЛЯ МЕНЯ ПРЕДСТАВЛЯЮТ ЗНАНИЯ О ТОМ, КАК ПОСТРОИТЬ СВОЙ БИЗНЕС В ЭТОЙ ПРОФЕССИИ: ОТ СОЗДАНИЯ САЙТА – ДО ТЕХНИК ПРИВЛЕЧЕНИЯ ПОТЕНЦИАЛЬНЫХ КЛИЕНТОВ.
						<br/><br/>
						Почему я решила стать имиджмейкером? Довольно простой вопрос, на который трудно дать такой же ответ.
<br/><br/>
Одни люди уже с рождения знают, чем хотят заниматься. Есть другие, которые постоянно в поиске и не успокаиваются, пока не найдут дело своей жизни. Я отношусь к категории людей, которые выбрали профессию неосознанно, под влиянием родителей, социальной среды и обстоятельств. Как человек ответственный, общительный, с неплохими организаторскими способностями, я добилась успеха в своей профессии.
<br/><br/>
Спустя годы я решила, что пришло время перемен. И взяла тайм-аут. Я делала то, на что у меня никогда не хватало времени: путешествовала, отдыхала, много читала и думала обо всём.
<br/><br/>
Вот в это время я «наткнулась» на рекламный «тест от стилиста» Екатерины Маляровой, прошла его и на вопрос: «Хотите ли Вы стать имиджмейкером?» без колебаний ответила: «Да». Это было открытием для меня, и я поделилась им с мужем. Он ответил просто: «Кому, как не тебе, одевать людей?..» Сейчас я знаю, что дала правильный ответ. Имидж и стиль – это именно то, чем я хочу заниматься.
<br/><br/>
За время обучения в Школе Имиджмейкеров я провела пять консультаций по цвету, две консультации по фигуре и три консультации по стилям, три разбора гардероба, два шопинга. На шопингах потрачено четыре тысячи долларов США (первый шопинг с женщиной в положении – 1500$, второй шопинг с мужчиной – 2500$). Заработано всего 227$, в том числе: доход от проведения консультаций по цвету – 40$ (две платные консультации: личная встреча и онлайн с 50% скидкой), от проведения консультаций по стилям — 22$ (одна платная консультация вживую с 50% скидкой), от разбора гардероба — 45$ (один платный разбор с 50% скидкой), от второго шопинга – 120$ (первый шопинг – бесплатный);
<br/><br/>
За время обучения в Школе я создала сайт, на сайте размещено описание всех услуг, 5 статей на статистических страницах и 22 статьи в блоге. Я пишу электронную книгу на тему «Как похудеть на два размера, выбрав правильное платье?». Серия писем ещё в процессе создания. Создала страницы в Facebook, Instagram, стала участником десяти женских групп в Facebook, заключила партнёрские отношения с группой «Домашняя выпечка». На моём сайте 11 подписчиков.
<br/><br/>
Мои планы на ближайший месяц:<br/>
•	пойти на шопинг с клиенткой, которой проводила платный разбор гардероба (заказ услуги сделан);<br/>
•	дописать электронную книгу;<br/>
•	создать серию писем;<br/>
•	создать видео в качестве front-end;<br/>
•	заменить статью «Модные цвета сезона «весна-лето 2016». Какой из них мой?» статьёй о цветотипах внешности;<br/>
•	создание контента для наполнения сайта (нагенерировано множество тем);<br/>
•	привлечение подписчиков (покупка рекламы в других рассылках, партнёрство с крупными женскими сайтами).<br/>
<br/>
Тренинг мне понравился. Было обещано многое, а дано – в разы больше. Тренинг объединил в себе теоретические знания и ни с чем несравнимый практический опыт, которым Вы щедро поделились со мной. Большую ценность для меня представляют знания о том, как построить свой бизнес в этой профессии: от создания сайта – до техник привлечения потенциальных клиентов. Разбор домашних заданий дал возможность понять, в чём мои ошибки и как делать лучше.
<br/><br/>
Что касается эмоций и впечатлений, то сначала была эйфория, потом, от большого количества полученных новых знаний, наступила путаница. Именно выполнение домашний заданий дало возможность систематизировать знания, а практический опыт принёс уверенность в себе. Одновременно пришло понимание, что на пути к успеху надо проделать большую работу в разных направлениях, и радость от того, что я не одна и всегда могу получить помощь от Вас, Екатерина.
<br/><br/>
Тренинг представляет собой целостную систему, гармонично объединяющую теоретические знания и практический опыт.
<br/><br/>
Примите мою искреннюю благодарность. Желаю плодотворной работы, материального благополучия, крепкого здоровья, большого семейного счастья Вам, Екатерина, Андрею и дружной редакции Glamurnenko.ru!<br/><br/>Любовь Билейчук</p></blockquote></div>


<div>
								<img src="https://www.glamurnenko.ru/products/imageschool/images/ava_none.jpg" alt="" style="
									float: left;
									margin: 40px 80px 0px 60px;
							">
												<blockquote style="background-color: rgba(235,228,202,1);"><p style="text-align:left;margin-left: 330px;">
													ПРОШЛА ВАШ «ТЕСТ ОТ СТИЛИСТА». ЛОВУШКА ЗАХЛОПНУЛАСЬ! ПРАВИЛЬНО ОТМЕЧЕНО: ШИ -ТОЧКА НЕВОЗВРАТА В СЕРОЕ ПРОШЛОЕ. УРОВЕНЬ САМООЦЕНКИ С КАЖДОЙ КОНСУЛЬТАЦИЕЙ, ДА И ПРОСТО СОВЕТОМ ДАЖЕ ПОДРУГЕ РАСТЁТ НА ГЛАЗАХ. ПЕРЕСТАЛА БОЯТЬСЯ ЛЮДЕЙ И МАГАЗИНОВ. КАЖДЫЙ УРОК В ВАШЕЙ ШИ ПРИВОДИЛ В ВОСХИЩЕНИЕ ОТ ПРОСТОТЫ ПОДАЧИ МАТЕРИАЛА ДО ТОЙ ДОБРОЖЕЛАТЕЛЬНОСТИ И ТЕРПЕНИЯ, С КОТОРЫМИ КАТЯ КОММЕНТИРОВАЛА Д/З.
<br><br>
Всю свою жизнь я учусь. Но все мои образования, техническое, экономическое, лингвистическое, никак не были связаны с миром моды и стиля. В далёком прошлом ещё умудрилась закончить курсы кройки и шитья. Но и это мне не дало возможности обрести свой индивидуальный стиль в одежде. Всегда с замиранием смотрела на женщин, которые умели обратить на себя внимание своим внешним видом (в хорошем смысле). Но это умение считала просто одним из талантов. При покупке одежды самостоятельно не могла решиться ни на одну вещь, постоянно с кем-нибудь советовалась. И так мне это надоело! А тут Ваш «Тест от стилиста». Ловушка захлопнулась! Сначала купила один тренинг.
<br><br>
При выполнении д/з полностью сменила свой гардероб. На работе один вывод- любовь, других вариантов такого преображения нет. Уже у меня стали спрашивать совета. И я поняла, что вы даёте работающие инструменты. А тут предложение ШИ. Посоветовалась с семьёй, продала щенят (почти анекдотическая ситуация) и на вырученные деньги купила этот тренинг. Сейчас жалею только об одном, что этой возможности у меня не было лет 10-15 назад.
<br><br>
На данный момент мои результаты скромные:<br>
— 3 консультации<br>
— 1 разбор гардероба<br>
— 3 шопинга<br>
— 150 долларов потрачено на шопингах (это всё родственники)<br>
— заявка на 1 платную комплексную консультацию (30 долларов) и после неё шопинг-сопровождение<br>
-сайт (и соответственно серия писем, статьи) – всё в набросках.
<br><br>
Недостаточно хорошо проработала тему возможных длин в костюмном ансамбле. Определение цветотипа почти всегда (если не типичный представитель) вызывает вопрос.
<br><br>
В самое ближайшее время планирую:<br>
- обратиться к фрилансеру для разработки сайта. Параллельно пытаюсь прорисовывать страницы на нём и определять наполнение сайта.<br>
- после создания сайта заявить о себе в тех кругах, где бываю (фитнес, салон красоты, друзьям за границей)<br>
- провести бесплатную консультацию для желающих по сочетанию цветов в одежде в организациях, где работает муж, подруги.<br>
- в долгосрочных планах – сделать эту работу своим основным источником дохода.
<br><br>
Правильно отмечено: ШИ - точка невозврата в серое прошлое. Уровень самооценки с каждой консультацией, да и просто советом даже подруге растёт на глазах. Перестала бояться людей и магазинов. Желание работать в этом направлении увеличивается.
<br><br>
Каждый урок в Вашей ШИ приводил в восхищение от простоты подачи материала до той доброжелательности и терпения, с которыми Катя комментировала д/з.
<br><br>
Огромное спасибо всей вашей команде за талантливо построенное обучение, на самом деле работающие методики, внимание к каждому вопросу. Здоровья, дальнейшего процветания и благодарных клиентов!<br><br>Татьяна Т.</p></blockquote></div>


<div>
	<img src="https://www.glamurnenko.ru/products/imageschool/images/ava_none.jpg" alt="" style="
		float: left;
		margin: 40px 80px 0px 60px;
">
					<blockquote><p style="text-align:left;margin-left: 330px;">
						Я РАБОТАЮ ВО ФРАНЦИИ ВОЛОНТЕРОМ В БИБЛИОТЕКЕ И ЧАСТО СЛЫШУ В СВОЙ АДРЕС КОМПЛИМЕНТЫ: КАК У МЕНЯ ВСЕ СОЧЕТАЕТСЯ В ОБРАЗЕ, ОСОБЕННО ОЦЕНИВАЮТ АКСЕССУАРЫ. ВЕСНОЙ ПЛАНИРУЮ СТАЖИРОВКУ С КАТЕЙ В ИТАЛИИ И ПОСЕЩАТЬ КУРСЫ ИМИДЖМЕЙКЕРОВ PRO.
						<br/><br/>
Раньше я жила в Минске, работала в университете доцентом на кафедре психологии. Очень любила свою работу: жизнь в среде молодых и стремящихся вперед, наполняло энергией и оптимизмом и не позволяло расслабляться. Студенты, которые потом стали моими аспирантами, до сих пор делают комплименты и рассказывают, что часто ходили на лекции, чтобы оценить мои наряды. Приятные комплименты.
<br/><br/>
Даже в эпоху тотального дефицита я умудрялась одеваться модно: окончила 3-х годичные курсы кройки и шитья и по выкройкам Бурды шила себе сама. Плюс ко всему мама научила меня хорошо вязать, так что я вязала красивые вещи не только себе, но и сестре и дочке.
<br/><br/>
В настоящее время я живу во Франции, в Альпах, среди горнолыжных курортов, уже 10 лет. Особо наряжаться некуда, только в путешествиях и когда летаю в Минск. Надо отметить, что французские женщины моего региона предпочитают спортивный стиль и часто вообще трудно понять, кто перед тобой – мужчина или женщина.
<br/><br/>
Я работаю волонтером в библиотеке и тоже часто слышу в свой адрес комплименты: как у меня все сочетается в ансамбле, особенно оценивают аксессуары. То есть нельзя сказать, что всех местных женщин не интересует мода, однако, увидеть здесь женщину на каблуках – большая редкость.
<br/><br/>
Я ощутила реальную проблему: привычка покупать новые вещи осталась, а поводов, куда их носить, намного уменьшилось, поэтому тренинг Екатерины «Рациональный гардероб на 100%» для меня был очень полезным. Потом я прошла курс Кати по имиджу, и, наконец, начала размышлять на тему, почему бы мне не одевать других женщин и не стать имиджмейкером? Тем более, что эта профессия связана с психологией: коммуникация, создание имиджа, формирование уверенности в себе, история и психология моды и т.д.
<br/><br/>
Я не хочу быть привязана к работодателю, а хочу быть свободной, распоряжаться своим временем, развиваться самой, помогать другим становиться красивыми и счастливыми, а также найти свое место для проявления творчества. Живя уже во Франции, я написала две научно-популярные книги по психологии, и писать статьи для сайта мне не сложно, особенно на интересные для меня темы о моде.
<br/><br/>
В процессе учебы я набирала опыт с подругами и родственниками бесплатно:<br/>
Провела 3 консультации по определению цветотипа и типа фигуры; 4 разбора гардероба; 2 шопинга с подругой; деньги, потраченные на шопинг не посчитала, создали 4 полных образа.
<br/><br/>
Создала сайт, написала 5 статей и 5 услуг.
<br/><br/>
Планирую сделать в ближайшее время: написать книгу, раскручивать сайт и набирать подписчиков. Весной планирую стажировку с Катей в Италии и посещать курсы имиджмейкеров pro.
<br/><br/>
Впечатления и эмоции от школы самые позитивные : ощущаю позитивные изменения себя и внутри, и в создании костюмных ансамблей, при покупке вещей мыслю образами, обращаю внимание в магазинах на то, чего раньше не видела; разбираю витрины, определяю прохожих по цветотипу и типу фигур, мысленно одеваю их по-другому, либо отмечаю что-то оригинальное в их образах, что я могу использовать для себя и работы.
<br/><br/>
Поскольку в процессе учебы я определила, что у меня теплый цветотип, а не холодный, то пришлось расстаться с вещами «летнего» колорита дочке (отдала дочке и крестнице, которых я определила как цветотип «Лето». Мой гардероб становится более рациональным. Всех подруг учу мыслить образами и составлять шопинг-листы.
<br/><br/>
Пожелания Кате: создавать новые курсы для имиджмейкеров, а мы будем продолжать повышать квалификацию и набираться опыта, а также будем иметь возможность общения с коллегами и единомышленниками он-лайн.
<br/><br/>
Большое спасибо за вашу работу и за то, что вы помогаете женщинам найти себя и быть счастливыми!<br/><br/>Светлана Купи</p></blockquote></div>

<div>
								<img src="https://www.glamurnenko.ru/products/imageschool/images/ava_none.jpg" alt="" style="
									float: left;
									margin: 40px 80px 0px 60px;
							">
												<blockquote style="background-color: rgba(235,228,202,1);"><p style="text-align:left;margin-left: 330px;">
													МНЕ ОТКРЫЛИСЬ ГЛАЗА НА МНОГООБРАЗИЕ ЦВЕТОВЫХ СОЧЕТАНИЙ. ВАС ОЧЕНЬ ПРИЯТНО СЛУШАТЬ, И ОСОБЕННО ПРИЯТНО, КОГДА ВИДИШЬ РЕЗУЛЬТАТ ПОСЛЕ ШОППИНГА. РАЗГЛЯДЫВАЮ ВСЕХ И ОПРЕДЕЛЯЮ ЦВЕТОТИП ЛЮДЕЙ. САМА ДЛЯ СЕБЯ ОПРЕДЕЛИЛАСЬ С ПОДХОДЯЩИМИ ЦВЕТАМИ, ОДЕЖДОЙ, ПОДХОДЯЩЕЙ К ФИГУРЕ, ШОППИНГ СТАЛ КОРОЧЕ И ЭФФЕКТИВНЕЙ
<br><br>
Я еще не совсем решила стать имиджмейкером, потому что на сегодняшний момент моя работа меня вполне устраивает. У меня было большое желание получить знания и практические рекомендации по моде, стилю, потомy чтo эти темы меня давно интересовали и хотелось послушать опытного имиджмейкерa.
<br><br>
Екатерина, огромное спасибо ! Вас очень приятно слушать, и особенно приятней, когда видишь результат после шоппинга. Ваши занятия мне много принесли, и сейчас я даже задумываюсь, а почему и мне не начать деятельность имиджмейкерa, пока в свободное время, а потом посмотрим.
<br><br>
Провела 2 разбора гардероба, 2 консультации и 2 шопинга для себя и близких . К сожалению сайтом пока не получилось заняться.
<br><br>
Все темы кроме сайта, пиара, статей проработаны хорошо.
<br><br>
В планах послушать всю школу еще один раз и делать записи в тетради.
<br><br>
Эмоции очень много, мне открылись глаза на многообразие цветовых сочетаний. Сидя в автобусе и гуляя на улице, разглядываю всех и определяю цветотип людей. Сама для себя определилась с подходящими цветами, одеждой, подходящей к фигуре, шоппинг стал короче и эффективней.
<br><br>
Все супер, особенно примеры из личного опыта бесценны.<br><br>Лидия Лэнг</p></blockquote></div>


					<div id="menu6" class="clearfix article-outer-sidebar" style="padding-bottom: 0px;padding-top: 50px;">
						<div class="article-inner" style="">
							<div class="article-container clearfix">

                            	<div class="fs40 playfair page-with-no-image" style="padding-bottom: 0px; text-align: left;">Остались вопросы?</div>


							</div>
						</div>
					</div>
					<div class="clearfix article-outer-sidebar">
						<div class="article-inner">
							<div class="article-container clearfix">
								<div class="fs16 arial the-content">
<p>Позвоните по телефону: 8(800)707-05-13; +7(499)350-23-35</p>
<p>Обратитесь к консультанту в правом нижнем углу экрана.</p>
<p>Или напишите по адресу: support@glamurnenko.ru		</p>
				</div>

							</div>






						</div>
					</div>
				</article>
			</div>
                <style>
    #mc-container{
        padding: 10px;
		background: white;
    }
</style>



        </div><!-- /site-content -->



    </div><!-- /main-container -->
</div><!-- main-container-outer -->


        <!-- footer-outer -->
        <div class="footer-outer clearfix">
            <!-- footer-container -->
<div class="footer-container">

                <footer class="site-footer clearfix">



                        <div class="footer-box">


<div class="btn-to-top montserrat fs11 bButton"><a href="#" class="a-top">НАВЕРХ <i class="fa fa-angle-up i-spcr-l"></i></a></div>
                        </div>


                    <div class="montserrat fs11 footer-text"><a href="//www.glamurnenko.ru/blog/sitemap/" target="_blank">Карта сайта</a><br>
                      <a href="//www.glamurnenko.ru/pers.html" target="_blank">Политика приватности</a><br>
                  Перепечатка разрешена только с активной ссылкой на нас<br>© Glamurnenko.ru, 2005-2016 Тел.: 8(800)707-05-13; +7(499)350-23-35 <br/> Email: support@glamurnenko.ru</div>
                    <div class="clearfix footer-menu-outer">

                        <div id="footer-social" class="montserrat fs11">
                       		<div class="social-accounts-footer"><div class="fs14 social-accounts clearfix"></div></div>
                        </div>



                    </div>

                </footer>

            </div><!-- /footer-container -->
        </div><!-- /footer-outer -->

	</div><!-- /site-container-inner -->
</div><!-- /site-container -->
<noindex>
	<center>
<script src="//pult.glamurnenko.ru/ref/cookies/0/set/token.js"></script>

<!-- Begin Tracking -->
<script type="text/javascript">if (!window.jQuery) { document.write('<scr' + 'ipt type="text/javascript" src="//pult.glamurnenko.ru/public/WebApp/jquery/jquery-1.10.2.min.js"></scr' + 'ipt>');}</script>


<script type="text/javascript" src="//pult.glamurnenko.ru/start?HTTP_REFERER=&ENTRY=//www.glamurnenko.ru/blog/opredelenie-vashego-cvetotipa/"></script>

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-KZKJM6"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KZKJM6');</script>
<!-- End Google Tag Manager -->
	</center>
</noindex>
<script async="async" src="https://w.uptolike.com/widgets/v1/zp.js?pid=1245469" type="text/javascript"></script>


    <style type="text/css">

        @media screen and (max-width: 640px) {

            #wpfront-scroll-top-container {
                visibility: hidden;
            }

        }

    </style>

    <style type="text/css">

        @media screen and (max-device-width: 640px) {

            #wpfront-scroll-top-container {
                visibility: hidden;
            }

        }

    </style>

    <div id="wpfront-scroll-top-container"><img src="//www.glamurnenko.ru/blog/wp-content/plugins/wpfront-scroll-top/images/icons/36.png" alt="" /></div>
    <script type="text/javascript">if(typeof wpfront_scroll_top == "function") wpfront_scroll_top({"scroll_offset":100,"button_width":0,"button_height":0,"button_opacity":0.8,"button_fade_duration":200,"scroll_duration":400,"location":1,"marginX":40,"marginY":400,"hide_iframe":"on","auto_hide":false,"auto_hide_after":2});</script><script type="text/javascript">
jQuery(window).load(function(){
  var q2w3_sidebar_1_options = { "sidebar" : "brnhmbx_sidebar_right", "margin_top" : 10, "margin_bottom" : 0, "stop_id" : "", "screen_max_width" : 0, "width_inherit" : false, "widgets" : ['text-9'] };
  q2w3_sidebar(q2w3_sidebar_1_options);
  setInterval(function () { q2w3_sidebar(q2w3_sidebar_1_options); }, 1500);
});
</script>
<link rel='stylesheet' id='wdi_mCustomScrollbar-css'  href='//www.glamurnenko.ru/blog/wp-content/plugins/wd-instagram-feed/css/gallerybox/jquery.mCustomScrollbar.css?ver=1.1.8' type='text/css' media='all' />
<link rel='stylesheet' id='wdi_frontend_thumbnails-css'  href='//www.glamurnenko.ru/blog/wp-content/plugins/wd-instagram-feed/frontend/../css/wdi_frontend.css?ver=4.6' type='text/css' media='all' />
<script type='text/javascript'>
/* <![CDATA[ */
var tocplus = {"smooth_scroll":"1","visibility_show":"\u041f\u043e\u043a\u0430\u0437\u0430\u0442\u044c","visibility_hide":"\u0421\u043a\u0440\u044b\u0442\u044c","width":"50%"};
/* ]]> */
</script>
<script type='text/javascript' src='//www.glamurnenko.ru/blog/wp-content/plugins/table-of-contents-plus/front.min.js?ver=1509'></script>
<script type='text/javascript' src='//www.glamurnenko.ru/blog/wp-includes/js/jquery/ui/core.min.js?ver=1.11.4'></script>
<script type='text/javascript' src='//www.glamurnenko.ru/blog/wp-includes/js/jquery/ui/widget.min.js?ver=1.11.4'></script>
<script type='text/javascript' src='//www.glamurnenko.ru/blog/wp-includes/js/jquery/ui/mouse.min.js?ver=1.11.4'></script>
<script type='text/javascript' src='//www.glamurnenko.ru/blog/wp-includes/js/jquery/ui/draggable.min.js?ver=1.11.4'></script>
<script type='text/javascript' src='//www.glamurnenko.ru/blog/wp-content/themes/metz/js/jquery.fitvids.js?ver=4.6'></script>
<script type='text/javascript' src='//www.glamurnenko.ru/blog/wp-content/themes/metz/js/burnhambox.js?ver=4.6'></script>
<script type='text/javascript' src='//www.glamurnenko.ru/blog/wp-content/themes/metz/js/jquery.slicknav.min.js?ver=4.6'></script>
<script type='text/javascript' src='//www.glamurnenko.ru/blog/wp-includes/js/wp-embed.min.js?ver=4.6'></script>
<script type='text/javascript' src='//www.glamurnenko.ru/blog/wp-content/plugins/wd-instagram-feed/frontend/../js/wdi_instagram.js?ver=1.1.8'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var wdi_ajax = {"ajax_url":"http:\/\/www.glamurnenko.ru\/blog\/wp-admin\/admin-ajax.php"};
var wdi_url = {"plugin_url":"http:\/\/www.glamurnenko.ru\/blog\/wp-content\/plugins\/wd-instagram-feed\/frontend\/","ajax_url":"http:\/\/www.glamurnenko.ru\/blog\/wp-admin\/admin-ajax.php"};
var wdi_front_messages = {"connection_error":"\u041e\u0448\u0438\u0431\u043a\u0430 \u0441\u043e\u0435\u0434\u0438\u043d\u0435\u043d\u0438\u044f. \u041f\u043e\u0436\u0430\u043b\u0443\u0439\u0441\u0442\u0430, \u043f\u043e\u043f\u0440\u043e\u0431\u0443\u0439\u0442\u0435 \u043f\u043e\u0437\u0434\u043d\u0435\u0435 :\u0421","user_not_found":"\u041f\u043e\u043b\u044c\u0437\u043e\u0432\u0430\u0442\u0435\u043b\u044c \u043d\u0435 \u043d\u0430\u0439\u0434\u0435\u043d","network_error":"\u041e\u0448\u0438\u0431\u043a\u0430 \u0441\u043e\u0435\u0434\u0438\u043d\u0435\u043d\u0438\u044f \u0441 \u0421\u0435\u0442\u044c\u044e. \u041f\u043e\u0436\u0430\u043b\u0443\u0439\u0441\u0442\u0430, \u043f\u043e\u043f\u0440\u043e\u0431\u0443\u0439\u0442\u0435 \u043f\u043e\u0437\u0434\u043d\u0435\u0435 :\u0421","hashtag_nodata":"\u041f\u043e \u044d\u0442\u043e\u043c\u0443 \u0445\u044d\u0448\u0442\u0435\u0433\u0443 \u043d\u0435\u0442 \u0434\u0430\u043d\u043d\u044b\u0445","filter_title":"\u041a\u043b\u0438\u043a\u043d\u0438\u0442\u0435 \u0434\u043b\u044f \u0444\u0438\u043b\u044c\u0442\u0440\u0430\u0446\u0438\u0438 \u0438\u0437\u043e\u0431\u0440\u0430\u0436\u0435\u043d\u0438\u0439 \u043f\u043e \u044d\u0442\u043e\u043c\u0443 \u0438\u043c\u0435\u043d\u0438 \u043f\u043e\u043b\u044c\u0437\u043e\u0432\u0430\u0442\u0435\u043b\u044f"};
var wdi_feed_0 = {"feed_row":{"thumb_user":"ekaterinamalyarova","feed_name":"Sample Feed","feed_thumb":"https:\/\/scontent.cdninstagram.com\/t51.2885-19\/s150x150\/12338794_597124673769874_563844914_a.jpg","published":"1","theme_id":"1","feed_users":"[{\"username\":\"ekaterinamalyarova\",\"id\":\"1199633560\"}]","feed_display_view":"widget","sort_images_by":"date","display_order":"desc","follow_on_instagram_btn":"1","display_header":"0","number_of_photos":"4","load_more_number":"4","pagination_per_page_number":"10","pagination_preload_number":"10","image_browser_preload_number":"10","image_browser_load_number":"10","number_of_columns":"1","resort_after_load_more":"1","show_likes":"0","show_description":"0","show_comments":"0","show_usernames":"0","display_user_info":"1","display_user_post_follow_number":"1","show_full_description":"1","disable_mobile_layout":"0","feed_type":"thumbnails","feed_item_onclick":"instagram","popup_fullscreen":"0","popup_width":"640","popup_height":"640","popup_type":"none","popup_autoplay":"0","popup_interval":"5","popup_enable_filmstrip":"0","popup_filmstrip_height":"70","autohide_lightbox_navigation":"1","popup_enable_ctrl_btn":"1","popup_enable_fullscreen":"1","popup_enable_info":"0","popup_info_always_show":"0","popup_info_full_width":"0","popup_enable_comment":"0","popup_enable_fullsize_image":"1","popup_enable_download":"0","popup_enable_share_buttons":"0","popup_enable_facebook":"0","popup_enable_twitter":"0","popup_enable_google":"0","popup_enable_pinterest":"0","popup_enable_tumblr":"0","show_image_counts":"0","enable_loop":"1","popup_image_right_click":"1","conditional_filters":"","conditional_filter_type":"none","show_username_on_thumb":"0","conditional_filter_enable":"0","id":"1","widget":true,"access_token":"1199633560.54da896.15a6bd11fa704d888659e62e44b551fa","wdi_feed_counter":0},"data":[],"usersData":[],"dataCount":"0"};
var wdi_front = {"feed_counter":"0"};
/* ]]> */
</script>
<script type='text/javascript' src='//www.glamurnenko.ru/blog/wp-content/plugins/wd-instagram-feed/frontend/../js/wdi_frontend.js?ver=1.1.8'></script>
<script type='text/javascript' src='//www.glamurnenko.ru/blog/wp-content/plugins/wd-instagram-feed/frontend/../js/wdi_responsive.js?ver=1.1.8'></script>
<script type='text/javascript' src='//www.glamurnenko.ru/blog/wp-includes/js/underscore.min.js?ver=1.8.3'></script>
<script type='text/javascript' src='//www.glamurnenko.ru/blog/wp-content/plugins/wd-instagram-feed/js/gallerybox/jquery.mobile.js?ver=1.1.8'></script>
<script type='text/javascript' src='//www.glamurnenko.ru/blog/wp-content/plugins/wd-instagram-feed/js/gallerybox/jquery.mCustomScrollbar.concat.min.js?ver=1.1.8'></script>
<script type='text/javascript' src='//www.glamurnenko.ru/blog/wp-content/plugins/wd-instagram-feed/js/gallerybox/jquery.fullscreen-0.4.1.js?ver=1.1.8'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var wdi_objectL10n = {"wdi_field_required":"\u041f\u043e\u043b\u0435 \u043e\u0431\u044f\u0437\u0430\u0442\u0435\u043b\u044c\u043d\u043e \u0434\u043b\u044f \u0437\u0430\u043f\u043e\u043b\u043d\u0435\u043d\u0438\u044f.","wdi_mail_validation":"\u042d\u0442\u043e \u043d\u0435\u043f\u0440\u0430\u0432\u0438\u043b\u044c\u043d\u044b\u0439 \u0430\u0434\u0440\u0435\u0441 \u044d\u043b\u0435\u043a\u0442\u0440\u043e\u043d\u043d\u043e\u0439 \u043f\u043e\u0447\u0442\u044b.","wdi_search_result":"\u041f\u043e \u0432\u0430\u0448\u0435\u043c\u0443 \u043f\u043e\u0438\u0441\u043a\u0443 \u0438\u0437\u043e\u0431\u0440\u0430\u0436\u0435\u043d\u0438\u0439 \u043d\u0435 \u043d\u0430\u0439\u0434\u0435\u043d\u043e"};
/* ]]> */
</script>
<script type='text/javascript' src='//www.glamurnenko.ru/blog/wp-content/plugins/wd-instagram-feed/js/gallerybox/wdi_gallery_box.js?ver=1.1.8'></script>

</body>
</html>
