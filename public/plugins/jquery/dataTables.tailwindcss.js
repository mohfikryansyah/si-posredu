/*! DataTables Tailwind CSS integration
 */

(function( factory ){
	if ( typeof define === 'function' && define.amd ) {
		// AMD
		define( ['jquery', 'datatables.net'], function ( $ ) {
			return factory( $, window, document );
		} );
	}
	else if ( typeof exports === 'object' ) {
		// CommonJS
		var jq = require('jquery');
		var cjsRequires = function (root, $) {
			if ( ! $.fn.dataTable ) {
				require('datatables.net')(root, $);
			}
		};

		if (typeof window === 'undefined') {
			module.exports = function (root, $) {
				if ( ! root ) {
					// CommonJS environments without a window global must pass a
					// root. This will give an error otherwise
					root = window;
				}

				if ( ! $ ) {
					$ = jq( root );
				}

				cjsRequires( root, $ );
				return factory( $, root, root.document );
			};
		}
		else {
			cjsRequires( window, jq );
			module.exports = factory( jq, window, window.document );
		}
	}
	else {
		// Browser
		factory( jQuery, window, document );
	}
}(function( $, window, document ) {
'use strict';
var DataTable = $.fn.dataTable;



/*
 * This is a tech preview of Tailwind CSS integration with DataTables.
 */

// Set the defaults for DataTables initialisation
$.extend( true, DataTable.defaults, {
	renderer: 'tailwindcss'
} );


// Default class modification
$.extend( true, DataTable.ext.classes, {
	container: "dt-container dt-tailwindcss",
	search: {
		input: "block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
	},
	length: {
		select: "border px-3 py-2 rounded-lg border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500"
	},
	processing: {
		container: "dt-processing"
	},
	paging: {
		active: 'font-semibold bg-gray-100 dark:bg-gray-700/75',
		notActive: 'bg-white dark:bg-gray-800',
		button: 'relative inline-flex justify-center items-center space-x-2 border px-4 py-2 -mr-px leading-6 hover:z-10 focus:z-10 active:z-10 border-gray-200 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:active:border-gray-700',
		first: 'rounded-l-lg',
		last: 'rounded-r-lg',
		enabled: 'text-gray-800 hover:text-gray-900 hover:border-gray-300 hover:shadow-sm focus:ring focus:ring-gray-300 focus:ring-opacity-25 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600 dark:focus:ring-opacity-40',
		notEnabled: 'text-gray-300 dark:text-gray-600'
	},
	table: 'dataTable w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400',
	thead: {
		row: 'text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 whitespace-nowrap',
		cell: 'px-6 py-4'
	},
	tbody: {
		row: 'bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600',
		cell: 'px-6 py-3'
	},
	tfoot: {
		row: 'text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 whitespace-nowrap',
		cell: 'px-6 py-3'
	},
} );

DataTable.ext.renderer.pagingButton.tailwindcss = function (settings, buttonType, content, active, disabled) {
	var classes = settings.oClasses.paging;
	var btnClasses = [classes.button];

	btnClasses.push(active ? classes.active : classes.notActive);
	btnClasses.push(disabled ? classes.notEnabled : classes.enabled);

	var a = $('<a>', {
		'href': disabled ? null : '#',
		'class': btnClasses.join(' ')
	})
		.html(content);

	return {
		display: a,
		clicker: a
	};
};

DataTable.ext.renderer.pagingContainer.tailwindcss = function (settings, buttonEls) {
	var classes = settings.oClasses.paging;

	buttonEls[0].addClass(classes.first);
	buttonEls[buttonEls.length -1].addClass(classes.last);

	return $('<ul/>').addClass('pagination').append(buttonEls);
};

DataTable.ext.renderer.layout.tailwindcss = function ( settings, container, items ) {
	var row = $( '<div/>', {
			"class": items.full ?
				'grid grid-cols-1 gap-4' :
				'md:flex md:space-y-0 space-y-3 items-center justify-between p-5'
		} )
		.appendTo( container );

	$.each( items, function (key, val) {
		var klass;

		// Apply start / end (left / right when ltr) margins
		if (val.table) {
			klass = 'overflow-x-auto';
		}
		else if (key === 'start') {
			klass = '';
		}
		else if (key === 'end') {
			klass = '';
		}
		else {
			klass = '';
		}

		$( '<div/>', {
				id: val.id || null,
				"class": klass + ' ' + (val.className || '')
			} )
			.append( val.contents )
			.appendTo( row );
	} );
};


return DataTable;
}));