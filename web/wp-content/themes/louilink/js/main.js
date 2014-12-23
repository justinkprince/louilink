// Whole bunch of globals.
var $window,
	$pageEl,
	$headerEl,
	$mainMenu,
	$mainMenuItems,
	$primaryNavSubsDrawer,
	$primaryNavSubs,

	isPrimaryNavSubsDrawerActive = false;

$(document).ready( function () {
	// Init our globals.
	$window = $(window);
	$pageEl = $('body .page').eq(0);
	$headerEl = $('#page-header');
	$mainMenu = $('#menu-main-menu'),
	$mainMenuItems = $mainMenu.find('> .menu-item');
	$primaryNavSubsDrawer = $('#primary-nav-subs');
	$primaryNavSubs = $primaryNavSubsDrawer.find('.sub');

	// Drawer code.
	// TODO: Move to widget along with the globals.
	$mainMenuItems.each( function (index, mainMenuItem) {
		var $mainMenuItem = $(mainMenuItem),
			itemId = $mainMenuItem.attr('id').replace('menu-item-', ''),
			$sub = $('#sub-' + itemId);

		if (!$sub.length) {
			return;
		}
		
		$mainMenuItem.data('sub', $sub);

		$mainMenuItem.hover(
			// OnMouseEnter
			function (e) {
				// MouseEnter always activates the drawer.
				isPrimaryNavSubsDrawerActive = true;
				// Let's use a short delay before the drawer opens.
				// It'll avoid having a passing cursor from opening the drawer.
				startDrawerOpenTimeout($mainMenuItem, 200);
			},
			// OnMouseLeave
			function (e) {
				// Deactivate the drawer for now. It can always be reactivated by
				// hovering over the drawer itself or another mainMenuItem.
				isPrimaryNavSubsDrawerActive = false;
				// Let's use a short delay before the drawer closes. That seems fair.
				startDrawerCloseTimeout(500);
			}
		);

		$headerEl.hover(
			function (e) {
			},
			function (e) {
			}
		);

		$primaryNavSubsDrawer.hover(
			// onMouseEnter, set the drawer back to active.
			function (e) {
				isPrimaryNavSubsDrawerActive = true;
			},
			// onMouseLeave, unset the active flag and start the close timeout.
			function (e) {
				isPrimaryNavSubsDrawerActive = false;
				// Let's use a longer delay for when the mouse exits the drawer itself.
				startDrawerCloseTimeout(2000);
			}
		);
	});

	// Fixed/sticky header. Polled every 100ms of scrolling.
	$(document).scroll($.throttle(100, updateFixedHeader));

	// $('#sub-45').addClass('active');
	// $('#primary-nav-subs').addClass('active');
});

// Set a timeout that will close the drawer unless another event
// reactivates it before the timer ends.
function startDrawerCloseTimeout(delay) {
	setTimeout(function () {
		if (!isPrimaryNavSubsDrawerActive) {
			$primaryNavSubs.removeClass('active');
			$primaryNavSubsDrawer.removeClass('active');
			$mainMenuItems.removeClass('active');
		}
	}, delay);
}

// Set a timeout that will open the drawer unless another event
// deactivates it before the timer ends.
function startDrawerOpenTimeout(menuItem, delay) {
	setTimeout(function () {
		if (isPrimaryNavSubsDrawerActive) {
			$primaryNavSubs.removeClass('active');
			$mainMenuItems.removeClass('active');
			menuItem.addClass('active');
			menuItem.data('sub').addClass('active');
			$primaryNavSubsDrawer.addClass('active');
		}
	}, delay);
}

/*function getScript(url, callback) {
    jQuery.ajax({
            type: "GET",
            url: url,
            success: callback,
            dataType: "script",
            cache: true
    });
};*/

function updateFixedHeader() {
	var scrollTop = $window.scrollTop(),
		threshold = 38,
		isBeyondThreshold = (scrollTop > threshold);

	$pageEl.toggleClass('fixed-header', isBeyondThreshold);
}
