// block.js
( function( blocks, element ) {
	// These are gutenberg items(React components, etc.)
	var el = element.createElement,
		source = blocks.source;

	// Register our Gutenberg block
	blocks.registerBlockType( 'ninja-forms/forms', {
		title: 'Ninja Forms',
		icon: 'edit',
		category: 'common',
		attributes: {
			nf_form_id: {
				type: 'string',
				source: source.children( 'div' ), // This is why we wrap the
				// short code in the div in the save method. So that we can
				// grab the short code
				default: ''
			},
		},

		// This function sets up the block HTML(what you see in the editor)
		edit: function( props ) {
			var children,
				options;

			function setFormId( event ) {
				// Get the ID value from the select element
				var selected = event.target.querySelector( 'option:checked' );
				var tmpId = selected.value;
				var shortCodeStr = '';

				// set the nf_form_id prop value with the new ID selected
				if ( 0 !== tmpId.length ) {
					shortCodeStr = "[ninja_form id=" + tmpId + "]";
				}
				props.setAttributes( { nf_form_id: shortCodeStr } );
				event.preventDefault();
			}

			function getElementValue( props ) {
				// Get our current nf_form_id prop value
				var tmpVal = props.attributes.nf_form_id;

				// Get the actual id value from the short code string
				// This value will be a Ninja Form short code and we need
				// the form ID
				if( 0 < tmpVal.length ) {
					tmpVal = tmpVal.split( '=' )[1];
					tmpVal = tmpVal.substring( 0, tmpVal.length - 1 );
				}

				return tmpVal;
			}
			// children will be an array of HTML elements that will be
			// rendered in the block
			children = [];

			var containerDiv = el( 'div', {style : {width: '100%'}}, el( 'img',
				{ src: ninja_forms.block_logo}) );

			children.push(containerDiv);

			options = [];
			// create the options for the form dropdown
			options.push( el( 'option', { value: '' }, '- Select -' ) );

			// iterate over the form data passed from PHP
			_.each( ninja_forms.nf_forms, function( nf_form ) {
				options.push( el( 'option' , { value: nf_form.id }, nf_form.title + " (ID: " + nf_form.id + ")" ) );

			});

			// create a select element, get the value that was last saved,
			// and append the options
			children.push( el( 'select', {
						style: { width: '100%' },
						name: 'nf_form_id',
						id: 'nf_form_id',
						value: getElementValue( props ),
						onChange: setFormId
					},
					options
				)
			);

			// Create the form and append the label and select elements
			var form = el( 'form', { onSubmit: setFormId }, children );

			// This is what renders the elements to the blocks, so we wrap
			// the form in a div here
			return el( 'div', { class: 'wp-block-shortcode' }, form );
		},

		save: function( props ) {
			// This is what will be rendered by our block on the front-end
			return "<div>" + props.attributes.nf_form_id + "</div>";
		}
	} );
} )(
	window.wp.blocks,
	window.wp.element
);