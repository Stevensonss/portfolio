import './actions'
import './videos'

( function ( $ ) {
	$( document ).on( 'ready', function () {
		const openClass = 'open';
		let selectedTab = 'Home';
		const stepsTitle = $( '.hsr-onboarding-step--title' )
		const closeBtn = $( '.hsr-close-btn' );
		const navigationItem = $( '.hsr-list__item' );
		const knowledgeCard = $( '#card-knowledge' );
		const helpCard = $( '#card-help' );

		stepsTitle.on( 'click', function () {
			$( this ).find( '.hsr-onboarding-step--expand' ).toggleClass( openClass );
			$( this ).parent().find( '.hsr-onboarding-step--content' ).slideToggle( 200 );
		} )

		closeBtn.on( 'click', function () {
			$( '.hsr-modal' ).removeClass( 'open' );
			$( 'body' ).removeClass( 'modal-open' );
		} )

		navigationItem.click( function () {
			let clickedItem = $( this );

			$( '.hsr-list__item' ).removeClass( 'hsr-active' );

			clickedItem.addClass( 'hsr-active' );
			selectedTab = clickedItem.data( 'name' );

            $( '.hsr-tab-content' ).hide();
            $( '.hsr-tab-content[data-name="' + selectedTab + '"]' ).show();

			add_admin_menu_class();
		} );

        if( window.location.hash ) {
            let tab = $( '.hsr-onboarding-navbar .hsr-wrapper__list .hsr-list__item[data-name="' + window.location.hash.split('#')[1] + '"]' )

            if(tab.length > 0) {
                $( '.hsr-list__item' ).removeClass( 'hsr-active' );
                tab.addClass( 'hsr-active' );

                $( '.hsr-tab-content' ).hide();
                $( '.hsr-tab-content[data-name="' + window.location.hash.split('#')[1] + '"]' ).show();
            }
        } else {

            $( '.hsr-wrapper__list .hsr-list__item:first-of-type' ).addClass( 'hsr-active' );

        }

		helpCard.click( function () {
			window.open( 'https://hostinger.com/cpanel-login?r=jump-to/new-panel/section/help', '_blank' );
		} );
		knowledgeCard.click( function () {
			window.open( 'https://support.hostinger.com/en/?q=WordPress', '_blank' );
		} );

		document.querySelectorAll( '.hsr-playlist-item' ).forEach( function ( item ) {
			const firstItem = document.querySelector( '.hsr-playlist-item:first-child' );
			firstItem.classList.add( 'hsr-active-video' );
			firstItem.querySelector( '.hsr-playlist-item-arrow' ).style.visibility = 'visible';
			item.addEventListener( 'click', function () {
				document.querySelectorAll( '.hsr-playlist-item.hsr-active-video' ).forEach( function ( selectedItem ) {
					selectedItem.classList.remove( 'hsr-active-video' );
					selectedItem.querySelector( '.hsr-playlist-item-arrow' ).style.visibility = 'hidden';
				} );
				this.classList.add( 'hsr-active-video' );
				this.querySelector( '.hsr-playlist-item-arrow' ).style.visibility = 'visible';
			} );
		} );

		function add_admin_menu_class () {
			const hostingerSubMenu = document.querySelectorAll( '#toplevel_page_hostinger .wp-submenu li' );

			if ( hostingerSubMenu ) {
				hostingerSubMenu.forEach( item => {
					item.classList.remove( 'current' );
				} );

                const tabSelectors = document.querySelectorAll( '.hsr-onboarding-navbar .hsr-wrapper__list .hsr-list__item' );

				tabSelectors.forEach( ( item, index ) => {
					if ( item.classList.contains( 'hsr-active' ) ) {
						if ( typeof hostingerSubMenu[ index + 1 ] !== "undefined" ) {
							hostingerSubMenu[ index + 1 ].classList.add( 'current' );
						}
					}
				} );
			}
		}

		add_admin_menu_class();

		// Copy nameservers to clipboard
		$(document).ready(function() {
			$('.hts-nameservers svg').click(function() {
				let textToCopy = $(this).closest('div').find('b').text();
				copyTextToClipboard(textToCopy);
			});
		});

		function copyTextToClipboard(text) {
			let textArea = document.createElement('textarea');
			textArea.value = text;
			document.body.appendChild(textArea);
			textArea.select();
			document.execCommand('copy');
			document.body.removeChild(textArea);
		}

	} );

} )( jQuery );
