$(function(){
	$grid = $('.grid').isotope({
	  itemSelector: '.item',
	  layoutMode: 'fitRows'
	});
	$('.itemClick').click(function(){
		console.log($(this).data('slug'));
		slug = '.'+$(this).data('slug');
		$grid.isotope({ filter: slug });
	});
});