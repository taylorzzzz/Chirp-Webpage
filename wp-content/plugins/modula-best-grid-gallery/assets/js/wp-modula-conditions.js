wp.Modula = 'undefined' === typeof( wp.Modula ) ? {} : wp.Modula;

var modulaGalleryConditions = Backbone.Model.extend({

	initialize: function( args ){

		var rows = jQuery('.modula-settings-container tr[data-container]');
		var tabs = jQuery('.modula-tabs .modula-tab');
		this.set( 'rows', rows );
		this.set( 'tabs', tabs );

		this.initEvents();
		this.initValues();

	},

	initEvents: function(){

		this.listenTo( wp.Modula.Settings, 'change:type', this.changedType );
		this.listenTo( wp.Modula.Settings, 'change:effect', this.changedEffect );
		this.listenTo( wp.Modula.Settings, 'change:lightbox', this.changedLightbox );
		this.listenTo( wp.Modula.Settings, 'change:disableSocial', this.disableSocial);
	},

	initValues: function(){

		this.changedType( false, wp.Modula.Settings.get( 'type' ) );
		this.changedEffect( false, wp.Modula.Settings.get( 'effect' ) );
		this.changedLightbox( false, wp.Modula.Settings.get( 'lightbox' ) );
		this.disableSocial (false, wp.Modula.Settings.get('disableSocial'));
	},

	changedType: function( settings, value ){
		var rows = this.get( 'rows' ),
			tabs = this.get( 'tabs' );

		if ( 'custom-grid' == value ) {

			// Show Responsive tab
			tabs.filter( '[data-tab="modula-responsive"]' ).show();
			
			rows.filter( '[data-container="columns"], [data-container="gutter"]' ).show();
			rows.filter( '[data-container="width"], [data-container="height"], [data-container="margin"], [data-container="randomFactor"], [data-container="shuffle"]' ).hide();

		}else if ( 'creative-gallery' ) {

			// Hide Responsive tab
			tabs.filter( '[data-tab="modula-responsive"]' ).hide();

			rows.filter( '[data-container="columns"], [data-container="gutter"]' ).hide();
			rows.filter( '[data-container="width"], [data-container="height"], [data-container="margin"], [data-container="randomFactor"], [data-container="shuffle"]' ).show();

		}

	},

	changedLightbox: function( settings, value ){
		var rows = this.get( 'rows' ),
			tabs = this.get( 'tabs' );

		if ( 'lightbox2' == value ) {
			
			rows.filter( '[data-container="show_navigation"], [data-container="show_navigation_on_mobile"]' ).show();

		}else{

			rows.filter( '[data-container="show_navigation"], [data-container="show_navigation_on_mobile"]' ).hide();

		}

	},

	changedEffect: function( settings, value ){
		var hoverBoxes = jQuery( '.modula-effects-preview > div' );

		hoverBoxes.hide();
		hoverBoxes.filter( '.panel-' + value ).show();
	},

	disableSocial: function( settings, value){
		
		var rows = this.get( 'rows' );

		if ( 1 == value ) {
			rows.filter( '[data-container="enableTwitter"],[data-container="enableFacebook"],[data-container="enableLinkedin"],[data-container="enablePinterest"],[data-container="socialIconColor"]' ).prop('checked',0).hide();
			
        }else {
			rows.filter( '[data-container="enableTwitter"],[data-container="enableFacebook"],[data-container="enableLinkedin"],[data-container="enablePinterest"],[data-container="socialIconColor"]').prop('checked',1).show();
			
        }
	}

});