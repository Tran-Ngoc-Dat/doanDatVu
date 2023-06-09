$(document).ready(function () {
	
	$('.slideshow').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
	});

	$('.slick-advertise').slick({
		slidesToShow: 2,
		slidesToScroll: 1,
		arrows: false,
		fade: false,
		autoplay: true,
	});
	$('.slick-product').slick({
		slidesToShow: 6,
		slidesToScroll: 1,
		arrows: true,
		fade: false,
	});
	$('.slick-pro-thumb').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		arrows: false,
		fade: false,
	});
	$('.slick-news').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		arrows: false,
		autoplay: true,
		speed: 700,
	});
	$('.slick-10').slick({
		slidesToShow: 10,
		slidesToScroll: 1,
		arrows: false,
		autoplay: true,
		speed: 700,
	});
	$('.slick-4').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		arrows: false,
		fade: false,
		autoplay: true,
		speed:700,
		arrows: true,
		prevArrow:
			"<button type='button' class='slide-arrow-pro ic-left'><img src='./assets/images/zero/sp-prev.png'></button>",
		nextArrow:
			"<button type='button' class='slide-arrow-pro ic-right'><img src='./assets/images/zero/sp-next.png'></button>",
		responsive: [
			{
				breakpoint: 1025,
				settings: {
					slidesToShow: 3,
					arrows: true,
				},
			},
			{
				breakpoint: 769,
				settings: {
					slidesToShow: 2,
					arrows: true,
				},
			},

			{
				breakpoint: 426,
				settings: {
					slidesToShow: 2,
					arrows: false,
				},
			},
		],
	});
	$('.slide-criteria').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		arrows: true,
		autoplay: true,
		speed: 700,
		prevArrow:
			"<button type='button' class='slide-arrow-criteria ic-left'><img src='./assets/images/zero/sp-prev.png'></button>",
		nextArrow:
			"<button type='button' class='slide-arrow-criteria ic-right'><img src='./assets/images/zero/sp-next.png'></button>",
	});

	
	$(".slide-news").slick({
		arrows: true,
		slidesToShow: 3,
		autoplay: false,
		lazyLoad: false,
		speed: 700,
		vertical:true,
		centerMode: false,
		verticalSwiping:true,
		prevArrow:
		"<button type='button' class='slide-arrow-news ic-left'><img src='./assets/images/zero/sp-prev.png'></button>",
		nextArrow:
		"<button type='button' class='slide-arrow-news ic-right'><img src='./assets/images/zero/sp-next.png'></button>",
		responsive: [
		{
			breakpoint: 426,
			settings: {
			  slidesToShow: 2,
			  arrows: false,
		  }, 
	  },
	  ],
	});

	$("#range_price").ionRangeSlider({
		skin: "sharp",
		min: MIN_PRICE,
		max: MAX_PRICE,
		from: 0,
		to: PRICE_TO,
		type: 'double',
		step: 1,
		postfix: ' đ',
		prettify: true,
		hasGrid: true
	});

	loadPaging("api/product.php?perpage=6", '.paging-product');
	$(".paging-product-category").each(function () {
		var list = $(this).data("list");
		loadPaging("api/product.php?perpage=6&idList=" + list, '.paging-product-category-' + list);
	})

	/* Products */
	if (isExist($(".paging-product"))) {
		loadPaging("api/product.php?perpage=6", '.paging-product');
	}

	/* Add */
	$('body').on('click', '.addcart', function () {
		$this = $(this);
		$parents = $this.parents('.right-pro-detail');
		var id = $this.data('id');
		var action = $this.data('action');
		var quantity = $parents.find('.quantity-pro-detail').find('.qty-pro').val();
		quantity = quantity ? quantity : 1;
		var color = $parents.find('.color-block-pro-detail').find('.color-pro-detail input:checked').val();
		color = color ? color : 0;
		var size = $parents.find('.size-block-pro-detail').find('.size-pro-detail input:checked').val();
		size = size ? size : 0;

		if (id) {
			$.ajax({
				url: 'api/cart.php',
				type: 'POST',
				dataType: 'json',
				async: false,
				data: {
					cmd: 'add-cart',
					id: id,
					color: color,
					size: size,
					quantity: quantity
				},
				success: function (result) {
					if (action == 'addnow') {
						$('.count-cart').html(result.max);
						$.ajax({
							url: 'api/cart.php',
							type: 'POST',
							dataType: 'html',
							async: false,
							data: {
								cmd: 'popup-cart'
							},
							success: function (result) {
								$('#popup-cart .modal-body').html(result);
								$('#popup-cart').modal('show');
							}
						});
					} else if (action == 'buynow') {
						window.location = CONFIG_BASE + 'gio-hang';
					}
				}
			});
		}
	});

	/* Delete */
	$('body').on('click', '.del-procart', function () {
		confirmDialog('delete-procart', "Xóa sản phẩm khỏi giỏ hàng", $(this));
	});

	/* Counter */
	$('body').on('click', '.counter-procart', function () {
		var $button = $(this);
		var quantity = 1;
		var input = $button.parent().find('input');
		var id = input.data('pid');
		var code = input.data('code');
		var inventory = input.data('inventory');
		var oldValue = $button.parent().find('input').val();
		if ($button.text() == '+') quantity = parseFloat(oldValue) + 1;
		else if (oldValue > 1) quantity = parseFloat(oldValue) - 1;
		if(quantity >= inventory) quantity = 1;
		$button.parent().find('input').val(quantity);
		updateCart(id, code, quantity);
	});

	/* Quantity */
	$('body').on('change', 'input.quantity-procart', function () {
		var quantity = $(this).val() < 1 ? 1 : $(this).val();
		$(this).val(quantity);
		var id = $(this).data('pid');
		var code = $(this).data('code');
		updateCart(id, code, quantity);
	});
	/* Quantity */
	$('body').on('click', '.btn-opencart', function () {
		$.ajax({
			url: 'api/open_cart.php',
			type: 'POST',
			dataType: 'html',
			async: false,
			data: {
			},
			success: function (result) {
				$('#popup-cart .modal-body').html(result);
				$('#popup-cart').modal('show');
			}
		});
	});
	/* Payments */
	if (isExist($('.payments-label'))) {
		$('.payments-label').click(function () {
			var payments = $(this).data('payments');
			$('.payments-cart .payments-label, .payments-info').removeClass('active');
			$(this).addClass('active');
			$('.payments-info-' + payments).addClass('active');
		});
	}
	/* Quantity detail page */
	if (isExist($('.quantity-pro-detail span'))) {
		$('.quantity-pro-detail span').click(function () {
			var $button = $(this);
			var oldValue = $button.parent().find('input').val();
			if ($button.text() == '+') {
				var newVal = parseFloat(oldValue) + 1;
			} else {
				if (oldValue > 1) var newVal = parseFloat(oldValue) - 1;
				else var newVal = 1;
			}
			$button.parent().find('input').val(newVal);
		});
	}
});

/* Click Active */

$(document).ready(function () {
	$('body').on('click', '.filter-category', function () {
		$(this).find('i').addClass('fa-duotone fa-check');
		$(this).addClass('active');
	})
	$('body').on('click', '.filter-category.active', function () {
		$(this).find('i').removeClass('fa-duotone fa-check');
		$(this).removeClass('active');
	})
	$('body').on('click', '.items-filter-sort', function () {
		$('.items-filter-sort').removeClass('active');
		$('.items-filter-sort').find('i').removeClass('fa-duotone fa-check');
		$(this).addClass('active');
		$(this).find('i').addClass('fa-duotone fa-check');
	})
});


/* Load Product Filter*/

function LoadFilter() {
	var id_category = "";
	var start = 0;
	var id_sort = 0;
	$('.filter-category.active').each(function () {
		var id = $(this).data('idcategory');
		id_category += id + ",";
	});

	$('.items-filter-sort.active').each(function () {
		var sort = $(this).data('sort');
		id_sort = sort;
	});

	var $inp = $('#range_price');
	var from = $inp.data("from");
	var to = $inp.data("to");
	start = from;


	$.ajax({
		url: "api/filter.php",
		type: "POST",
		data: {
			id_category, from, to, id_sort
		},
		success: function (result) {
			$('.grid-products').html(result);
		}
	});
}

$(document).ready(function () {
	$('body').on('click', '.items-filter-child', function () {
		LoadFilter();
	});
	$('body').on('change', '#range_price', function () {
		LoadFilter();
	})
	$('body').on('click', '.items-filter-sort', function () {
		LoadFilter();
	})
});

/* Menu fixed */
if(isExist($(".menu-page")))
{
	$(window).scroll(function(){
		if($(window).scrollTop() >= $(".menu-page").height())
		{
			$(".menu-page").addClass('menu-fix');
		}
		else
		{
			$(".menu-page").removeClass('menu-fix');
		}
	});
}

if (isExist($('[data-fancybox="video"]'))) {
	$('[data-fancybox="video"]').fancybox({
		transitionEffect: 'fade',
		transitionDuration: 800,
		animationEffect: 'fade',
		animationDuration: 800,
		arrows: true,
		infobar: false,
		toolbar: true,
		hash: false
	});
}

$('.rate_p').raty({
	half     : true,
	path     : null,
	starHalf : './assets/js/raty/images/star-half3.png',
	starOff  : './assets/js/raty/images/star-off3.png',
	starOn   : './assets/js/raty/images/star-on3.png',
	score: function() {
		return $(this).attr('data-score');
	},
	click: function(score, evt) {
		var id=$(this).attr('data-id');
		var integer = parseInt(score, 10),
		decimal = (score - integer) * 10;
		if (decimal !== 0) {
			decimal = (decimal > 5) ? 1 : 0.5;
		}
		score = integer + decimal;
		$.ajax({
			type:'POST',
			data:{score:score,id:id},
			dataType: 'JSON',
			url:'api/api_rating.php',
			success:function(data){
				$('.count_rate'+id).html(data.count);
			}
		})
	}
});