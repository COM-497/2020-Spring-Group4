(function($){ 
jQuery(document).ready(function($) {
    "use strict";

    //FontAwesome Icon Control JS
    $('body').on('click', '.mapro-icon-list li', function(){
        var icon_class = $(this).find('i').attr('class');
        $(this).addClass('icon-active').siblings().removeClass('icon-active');
        $(this).parent('.mapro-icon-list').prev('.mapro-selected-icon').children('i').attr('class','').addClass(icon_class);
        $(this).parent('.mapro-icon-list').next('input').val(icon_class).trigger('change');
    });

    $('body').on('click', '.mapro-selected-icon', function(){
        $(this).next().slideToggle();
    });

    //MultiCheck box Control JS
    $( '.customize-control-checkbox-multiple input[type="checkbox"]' ).on( 'change', function() {

        var checkbox_values = $( this ).parents( '.customize-control' ).find( 'input[type="checkbox"]:checked' ).map(
            function() {
                return $( this ).val();
            }
        ).get().join( ',' );

        $( this ).parents( '.customize-control' ).find( 'input[type="hidden"]' ).val( checkbox_values ).trigger( 'change' );
        
    });

    //Chosen JS
    $(".hs-chosen-select").chosen({
        width: "100%"
    });

    // Gallery Control
    $('.upload_gallery_button').click(function(event){
        var current_gallery = $( this ).closest( 'label' );

        if ( event.currentTarget.id === 'clear-gallery' ) {
            //remove value from input
            current_gallery.find( '.gallery_values' ).val( '' ).trigger( 'change' );

            //remove preview images
            current_gallery.find( '.gallery-screenshot' ).html( '' );
            return;
        }

        // Make sure the media gallery API exists
        if ( typeof wp === 'undefined' || !wp.media || !wp.media.gallery ) {
            return;
        }
        event.preventDefault();

        // Activate the media editor
        var val = current_gallery.find( '.gallery_values' ).val();
        var final;

        if ( !val ) {
            final = '[gallery ids="0"]';
        } else {
            final = '[gallery ids="' + val + '"]';
        }
        var frame = wp.media.gallery.edit( final );

        frame.state( 'gallery-edit' ).on(
            'update', function( selection ) {

                //clear screenshot div so we can append new selected images
                current_gallery.find( '.gallery-screenshot' ).html( '' );

                var element, preview_html = '', preview_img;
                var ids = selection.models.map(
                    function( e ) {
                        element = e.toJSON();
                        preview_img = typeof element.sizes.thumbnail !== 'undefined' ? element.sizes.thumbnail.url : element.url;
                        preview_html = "<div class='screen-thumb'><img src='" + preview_img + "'/></div>";
                        current_gallery.find( '.gallery-screenshot' ).append( preview_html );
                        return e.id;
                    }
                );

                current_gallery.find( '.gallery_values' ).val( ids.join( ',' ) ).trigger( 'change' );
            }
        );
        return false;
    }); 

    //Scroll to section
    $('body').on('click', '#sub-accordion-panel-mapro_home_settings_panel .control-subsection .accordion-section-title', function(event) {
        var section_id = $(this).parent('.control-subsection').attr('id');
        scrollToSection( section_id );
    });

});

function scrollToSection( section_id ){
    var preview_section_id = "sq-home-slider-section";

    var $contents = jQuery('#customize-preview iframe').contents();

    switch ( section_id ) {
        case 'accordion-section-mapro_slider_sec':
        preview_section_id = "sq-home-slider-section";
        break;

        case 'accordion-section-mapro_featured_page_sec':
        preview_section_id = "sq-featured-post-section";
        break;

        case 'accordion-section-mapro_about_sec':
        preview_section_id = "sq-about-us-section";
        break;

        case 'accordion-section-mapro_tab_sec':
        preview_section_id = "sq-tab-section";
        break;

        case 'accordion-section-mapro_logo_sec':
        preview_section_id = "sq-logo-section";
        break;

        case 'accordion-section-maproone_team_sec':
        preview_section_id = "sq-team-section";
        break;

        case 'accordion-section-maproone_testimonial_sec':
        preview_section_id = "sq-testimonial-section";
        break;
    }

    if( $contents.find('#'+preview_section_id).length > 0 ){
        $contents.find("html, body").animate({
        scrollTop: $contents.find( "#" + preview_section_id ).offset().top - 90
        }, 1000);
    }
}

// Extends our custom section.
( function( api ) {

    api.sectionConstructor['pro-section'] = api.Section.extend( {

        // No events for this type of section.
        attachEvents: function () {},

        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    } );

} )( wp.customize );
})(jQuery);