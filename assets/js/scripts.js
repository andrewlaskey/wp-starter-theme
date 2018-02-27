function updateViewportDimensions () {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y };
}

jQuery(document).ready(function($) {

	$('.js-toggle-mobile-menu').on('click', function (e) {
		e.preventDefault();

		$('.mobile-nav-wrap').toggleClass('is-open');
	});

});