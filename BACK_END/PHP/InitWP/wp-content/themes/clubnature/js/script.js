/**
 * Js template
 *
 * @package ClubNature
 */

jQuery( document ).ready(function( $ ) {
	// Mouse cursor
	if ($(window).width() > 767.98) {
		document.getElementsByTagName("body")[0].addEventListener("mousemove", function(n) {
			t.style.left = n.clientX + "px", 
			t.style.top = n.clientY + "px", 
			e.style.left = n.clientX + "px", 
			e.style.top = n.clientY + "px"
		});
		var t = document.getElementById("cursor"),
		e = document.getElementById("cursor2")
		function n(t) {
			e.classList.add("hover")
		}
		function s(t) {
			e.classList.remove("hover")
		}
		s();
		for (var r = document.querySelectorAll(".hover-target"), a = r.length - 1; a >= 0; a--) {
			o(r[a])
		}
		function o(t) {
			t.addEventListener("mouseover", n), t.addEventListener("mouseout", s)
		}
	}

	$( document ).on('scroll', function() {
		if ($( this ).scrollTop() >= $( '.content' ).position().top ) {
			$( '.navbar' ).addClass( 'navbar-scroll' );
		} else {
			$( '.navbar' ).removeClass( 'navbar-scroll' );
		}
	})

	$( window ).on( 'scroll load' , function() {
		var $navbar_brand  = $( '.navbar-brand' );
		if (150 <= $( window ).scrollTop() ) {
			$navbar_brand.addClass( 'navbar-brand-scroll' );
		} else {
			$navbar_brand.removeClass( 'navbar-brand-scroll' );
		}
	});

	$( '.btn-sidebar' ).click( function() {
		$( '.sidebar-button' ).toggleClass( 'active' );
		$( '.sidebar' ).toggleClass( 'active' );
	});


	$( '.dropdown-toggle' ).keyup( function( e ) {
		if ( e.keyCode == 9 ) {
			if ( $( e.target ).hasClass( 'dropdown-toggle' ) ) {
				$( this ).dropdown( 'toggle' );
			}
		}
	});

	$( document ).keyup( function( e ) {
		if ( e.keyCode == 9 ) {
			$( '.navbar-toggler' ).focusin( function() {
				$( '.navbar-toggler' ).removeClass( 'collapsed' );
				$( '.navbar-toggler' ).attr('aria-expanded', 'true');
				$( '.navbar-collapse' ).addClass( 'show' );
			});

			$( '.navbar-nav .nav-item' ).last().focusout( function() {
				$( '.navbar-toggler' ).addClass( 'collapsed' );
				$( '.navbar-toggler' ).attr('aria-expanded', 'false');
				$( '.navbar-collapse' ).removeClass( 'show' );
			});
		}

		if ( e.shiftKey && e.key === 'Tab' ) {
			$( '.skip-link' ).focus( function() {
				$( '.navbar-toggler' ).addClass( 'collapsed' );
				$( '.navbar-toggler' ).attr('aria-expanded', 'false');
				$( '.navbar-collapse' ).removeClass( 'show' );
			});
		}

	});

});
