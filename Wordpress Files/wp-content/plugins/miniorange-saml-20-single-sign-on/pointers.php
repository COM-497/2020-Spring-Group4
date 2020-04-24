<?php

require_once "mo_saml_settings_page.php";

$pointers = array();
$tab= 'default';
$test_status = get_option('MO_SAML_TEST_STATUS');
if(array_key_exists('tab',$_GET))
    $tab = $_GET['tab'];

if($tab == 'default' && get_option('plugin_wise_tour_initiated')==1)
{

    $pointers['default-miniorange-select-your-idp'] = array(
        'title'     => sprintf( '<h3>%s</h3>', esc_html__( 'Select ADFS as IDP (Step 1 of 12)' ) ),
        'content'   => sprintf( '<p>%s</p>', esc_html__( 'Choose ADFS as your IDP, and refer to the setup guide  for complete instructions.' ) ),
        'anchor_id' => '#select_your_idp',
        'isdefault' => 'yes',
        'edge'      => 'left',
        'align'     => 'left',
        'where'     => array( 'toplevel_page_mo_saml_settings' ) // <-- Please note this
    );
    $pointers['default-miniorange-sp-metadata-url'] = array(
        'title'     => sprintf( '<h3>%s</h3>', esc_html__( 'Service Provider Metadata URL (Step 2 of 12)' ) ),
        'content'   => sprintf( '<p>%s</p>', esc_html__( 'Use this Metadata URL or file to configure ADFS.' ) ),
        'anchor_id' => '#metadata_url',
        'isdefault' => 'yes',
        'edge'      => 'left',
        'align'     => 'left',
        'where'     => array( 'toplevel_page_mo_saml_settings' ) // <-- Please note this
    );
    $pointers['default-miniorange-upload-metadata'] = array(
        'title'     => sprintf( '<h3>%s</h3>', esc_html__( 'Upload your metadata (Step 3 of 12)' ) ),
        'content'   => sprintf( '<p>%s</p>', esc_html__( 'Once you have configured ADFS, you can use this button to upload the metadata received from ADFS.' ) ),
        'anchor_id' => '#upload-metadata',
        'isdefault' => 'yes',
        'edge'      => 'left',
        'align'     => 'left',
        'where'     => array( 'toplevel_page_mo_saml_settings' ) // <-- Please note this
    );
    $pointers['default-miniorange-test-configuration'] = array(
        'title'     => sprintf( '<h3>%s</h3>', esc_html__( 'Check your configurations (Step 4 of 12)' ) ),
        'content'   => sprintf( '<p>%s</p>', esc_html__( 'After uploading the metadata from ADFS, use this button to test the configurations between ADFS and WordPress.' ) ),
        'anchor_id' => '#test_config',
        'isdefault' => 'yes',
        'edge'      => 'left',
        'align'     => 'left',
        'where'     => array( 'toplevel_page_mo_saml_settings' ) // <-- Please note this
    );
    $pointers['default-miniorange-attribute-mapping'] = array(
        'title'     => sprintf( '<h3>%s</h3>', esc_html__( 'Configure Attribute Mapping (Step 5 of 12)' ) ),
        'content'   => sprintf( '<p>%s</p>', esc_html__( 'While auto registering the users in your WordPress site these attributes will automatically get mapped to your WordPress user details.' ) ),
        'anchor_id' => '#miniorange-attribute-mapping',
        'isdefault' => 'yes',
        'edge'      => 'left',
        'align'     => 'left',
        'where'     => array( 'toplevel_page_mo_saml_settings' ) // <-- Please note this
    );

    $pointers['default-miniorange-role-mapping'] = array(
        'title'     => sprintf( '<h3>%s</h3>', esc_html__( 'Configure Role Mapping (Step 6 of 12)' ) ),
        'content'   => sprintf( '<p>%s</p>', esc_html__( 'Select roles to be assigned to users when they are created in Wordpress.' ) ),
        'anchor_id' => '#miniorange-role-mapping',
        'isdefault' => 'yes',
        'edge'      => 'left',
        'align'     => 'left',
        'where'     => array( 'toplevel_page_mo_saml_settings' ) // <-- Please note this
    );
    $pointers['default-minorange-use-widget'] = array(
        'title'     => sprintf( '<h3>%s</h3>', esc_html__( 'Available with this version (Step 7 of 12)' ) ),
        'content'   => sprintf( '<p>%s</p>', esc_html__( 'Add a widget to your Wordpress page and test out the SSO.' ) ),
        'anchor_id' => '#minorange-use-widget',
        'isdefault' => 'yes',
        'edge'      => 'left',
        'align'     => 'left',
        'where'     => array( 'toplevel_page_mo_saml_settings' ) // <-- Please note this
    );
    $pointers['default-miniorange-addons1'] = array(
        'title'     => sprintf( '<h3>%s</h3>', esc_html__( 'Page Restriction (Step 8 of 12)' ) ),
        'content'   => sprintf( '<p>%s</p>', esc_html__( 'Restrict page and post specific access based on user roles using this add-on.' ) ),
        'anchor_id' => '#miniorange-addons1',
        'isdefault' => 'yes',
        'edge'      => 'left',
        'align'     => 'left',
        'where'     => array( 'toplevel_page_mo_saml_settings' ) // <-- Please note this
    );
    $pointers['default-miniorange-addons2'] = array(
        'title'     => sprintf( '<h3>%s</h3>', esc_html__( 'BuddyPress Integration (Step 9 of 12)' ) ),
        'content'   => sprintf( '<p>%s</p>', esc_html__( 'This add-on will map the attributes received from IdP to BuddyPress user profile' ) ),
        'anchor_id' => '#miniorange-addons2',
        'isdefault' => 'yes',
        'edge'      => 'left',
        'align'     => 'left',
        'where'     => array( 'toplevel_page_mo_saml_settings' ) // <-- Please note this
    );
    $pointers['default-miniorange-addons3'] = array(
        'title'     => sprintf( '<h3>%s</h3>', esc_html__( 'LearnDash Integration (Step 10 of 12)' ) ),
        'content'   => sprintf( '<p>%s</p>', esc_html__( 'This add-on will map the users to LearnDash groups based on the attributes received from IdP.' ) ),
        'anchor_id' => '#miniorange-addons3',
        'isdefault' => 'yes',
        'edge'      => 'left',
        'align'     => 'left',
        'where'     => array( 'toplevel_page_mo_saml_settings' ) // <-- Please note this
    );
    $pointers['default-miniorange-addons4'] = array(
        'title'     => sprintf( '<h3>%s</h3>', esc_html__( 'SSO Login Audit (Step 11 of 12)' ) ),
        'content'   => sprintf( '<p>%s</p>', esc_html__( 'This add-on will let you monitor the user SSO activities for your site.' ) ),
        'anchor_id' => '#miniorange-addons4',
        'isdefault' => 'yes',
        'edge'      => 'left',
        'align'     => 'left',
        'where'     => array( 'toplevel_page_mo_saml_settings' ) // <-- Please note this
    );
    $pointers['default-miniorange-addons5'] = array(
        'title'     => sprintf( '<h3>%s</h3>', esc_html__( 'ABR (Step 12 of 12)' ) ),
        'content'   => sprintf( '<p>%s</p>', esc_html__( 'ABR add-on helps you to redirect your users to different pages after they log into your site, based on the attributes sent by your Identity Provider.' ) ),
        'anchor_id' => '#miniorange-addons5',
        'isdefault' => 'yes',
        'edge'      => 'left',
        'align'     => 'left',
        'where'     => array( 'toplevel_page_mo_saml_settings' ) // <-- Please note this
    );
    $pointers['default-miniorange-support-pointer'] = array(
        'title'     => sprintf( '<h3>%s</h3>', esc_html__( 'We are here!!' ) ),
        'content'   => sprintf( '<p>%s</p>', esc_html__( 'Get in touch with us and we will help you setup the plugin in no time.' ) ),
        'anchor_id' => '#mo_saml_support_layout',
        'isdefault' => 'yes',
        'edge'      => 'right',
        'align'     => 'left',
        'where'     => array( 'toplevel_page_mo_saml_settings' ) // <-- Please note this
    );
}
if(get_option('service_provider_setup_tour_initiated')){
    delete_option('service_provider_setup_tour_initiated');

    $pointers['miniorange-select-your-idp'] = array(
        'title'     => sprintf( '<h3>%s</h3>', esc_html__( 'Select your IDP' ) ),
        'content'   => sprintf( '<p>%s</p>', esc_html__( 'Choose your IDP from the list of IDPs, and refer to the setup guides to proceed further' ) ),
        'anchor_id' => '#select_your_idp',
        'edge'      => 'left',
        'align'     => 'left',
        'where'     => array( 'toplevel_page_mo_saml_settings' ) // <-- Please note this
    );
    $pointers['miniorange-upload-metadata'] = array(
        'title'     => sprintf( '<h3>%s</h3>', esc_html__( 'Upload your metadata' ) ),
        'content'   => sprintf( '<p>%s</p>', esc_html__( 'If you have a metadata URL or file provided by your IDP, click on this button.' ) ),
        'anchor_id' => '#upload-metadata',
        'edge'      => 'left',
        'align'     => 'left',
        'where'     => array( 'toplevel_page_mo_saml_settings' ) // <-- Please note this
    );
    $pointers['miniorange-upload-metadata'] = array(
        'title'     => sprintf( '<h3>%s</h3>', esc_html__( 'Upload your metadata' ) ),
        'content'   => sprintf( '<p>%s</p>', esc_html__( 'If you have a metadata URL or file provided by your IDP, click on this button. You can configure the plugin manually as well' ) ),
        'anchor_id' => '#upload-metadata',
        'edge'      => 'left',
        'align'     => 'left',
        'where'     => array( 'toplevel_page_mo_saml_settings' ) // <-- Please note this
    );

    if(mo_saml_is_sp_configured() || get_option('saml_x509_certificate')){
        $pointers['miniorange-test-configuration'] = array(
            'title'     => sprintf( '<h3>%s</h3>', esc_html__( 'Check your configurations' ) ),
            'content'   => sprintf( '<p>%s</p>', esc_html__( 'This will test if the configurations on IDP and SP are correct' ) ),
            'anchor_id' => '#test_config',
            'edge'      => 'left',
            'align'     => 'left',
            'where'     => array( 'toplevel_page_mo_saml_settings' ) // <-- Please note this
        );
        $pointers['export-import-config'] = array(
            'title'     => sprintf( '<h3>%s</h3>', esc_html__( 'Export Configuration' ) ),
            'content'   => sprintf( '<p>%s</p>', esc_html__( 'If you are having trouble setting up the plugin, Export the configurations and mail us at info@xecurify.com.' ) ),
            'anchor_id' => '#export-import-config',
            'edge'      => 'left',
            'align'     => 'left',
            'where'     => array( 'toplevel_page_mo_saml_settings' ) // <-- Please note this
        );
    }

    $pointers['configure-service-restart-tour'] = array(
        'title'     => sprintf( '<h3>%s</h3>', esc_html__( 'Click when you need me!' ) ),
        'content'   => sprintf( '<p>%s</p>', esc_html__( 'Revisit tour' ) ),
        'anchor_id' => '#configure-service-restart-tour',
        'edge'      => 'left',
        'align'     => 'left',
        'where'     => array( 'toplevel_page_mo_saml_settings' ) // <-- Please note this
    );

}
if($tab == 'config'){

    $pointers['miniorange-sp-metadata-url'] = array(
        'title'     => sprintf( '<h3>%s</h3>', esc_html__( 'Service Provider Metadata URL' ) ),
        'content'   => sprintf( '<p>%s</p>', esc_html__( 'Use this Metadata URL or file to configure your IDP.' ) ),
        'anchor_id' => '#metadata_url',
        'edge'      => 'left',
        'align'     => 'left',
        'where'     => array( 'toplevel_page_mo_saml_settings' ) // <-- Please note this
    );
    $pointers['metadata_manual'] = array(
        'title'     => sprintf( '<h3>%s</h3>', esc_html__( 'Service Provider Metadata URLs' ) ),
        'content'   => sprintf( '<p>%s</p>', esc_html__( 'If your IDP does not support metadata URL or file, you can even manually configure your IDP using the information given here' ) ),
        'anchor_id' => '#metadata_manual',
        'edge'      => 'left',
        'align'     => 'left',
        'where'     => array( 'toplevel_page_mo_saml_settings' ) // <-- Please note this
    );


    $pointers['identity-provider-restart-tour'] = array(
        'title'     => sprintf( '<h3>%s</h3>', esc_html__( 'Click when you need me!' ) ),
        'content'   => sprintf( '<p>%s</p>', esc_html__( 'Revisit tour' ) ),
        'anchor_id' => '#identity-provider-restart-tour',
        'edge'      => 'left',
        'align'     => 'left',
        'where'     => array( 'toplevel_page_mo_saml_settings' ) // <-- Please note this
    );

}
if($tab == 'opt'){

    $pointers['miniorange-attribute-mapping'] = array(
        'title'     => sprintf( '<h3>%s</h3>', esc_html__( 'Configure Attribute Mapping' ) ),
        'content'   => sprintf( '<p>%s</p>', esc_html__( 'While auto registering the users in your WordPress site these attributes will automatically get mapped to your WordPress user details.' ) ),
        'anchor_id' => '#miniorange-attribute-mapping',
        'edge'      => 'left',
        'align'     => 'left',
        'where'     => array( 'toplevel_page_mo_saml_settings' ) // <-- Please note this
    );

    $pointers['miniorange-role-mapping'] = array(
        'title'     => sprintf( '<h3>%s</h3>', esc_html__( 'Configure Role Mapping' ) ),
        'content'   => sprintf( '<p>%s</p>', esc_html__( 'Select roles to be assigned to users when they are created in Wordpress.' ) ),
        'anchor_id' => '#miniorange-role-mapping',
        'edge'      => 'left',
        'align'     => 'left',
        'where'     => array( 'toplevel_page_mo_saml_settings' ) // <-- Please note this
    );


    $pointers['attribute-mapping-restart-tour'] = array(
        'title'     => sprintf( '<h3>%s</h3>', esc_html__( 'Click when you need me!' ) ),
        'content'   => sprintf( '<p>%s</p>', esc_html__( 'Revisit tour' ) ),
        'anchor_id' => '#attribute-mapping-restart-tour',
        'edge'      => 'left',
        'align'     => 'left',
        'where'     => array( 'toplevel_page_mo_saml_settings' ) // <-- Please note this
    );


}

if( $tab =='general'){
    $pointers['minorange-use-widget'] = array(
        'title'     => sprintf( '<h3>%s</h3>', esc_html__( 'Available with this version' ) ),
        'content'   => sprintf( '<p>%s</p>', esc_html__( 'Add a widget to your Wordpress page and test out the SSO.' ) ),
        'anchor_id' => '#minorange-use-widget',
        'edge'      => 'left',
        'align'     => 'left',
        'where'     => array( 'toplevel_page_mo_saml_settings' ) // <-- Please note this
    );
    $pointers['miniorange-auto-redirect'] = array(
        'title'     => sprintf( '<h3>%s</h3>', esc_html__( 'Premium Feature' ) ),
        'content'   => sprintf( '<p>%s</p>', esc_html__( 'Redirect the users to your IdP if user not logged in.Protects your complete site from not logged in Users' ) ),
        'anchor_id' => '#miniorange-auto-redirect',
        'edge'      => 'left',
        'align'     => 'left',
        'where'     => array( 'toplevel_page_mo_saml_settings' ) // <-- Please note this
    );


    $pointers['miniorange-auto-redirect-login-page'] = array(
        'title'     => sprintf( '<h3>%s</h3>', esc_html__( 'Premium Feature' ) ),
        'content'   => sprintf( '<p>%s</p>', esc_html__( 'Automatically redirect the user to the Identity Provider when they land on the WordPress Login Page.' ) ),
        'anchor_id' => '#miniorange-auto-redirect-login-page',
        'edge'      => 'left',
        'align'     => 'left',
        'where'     => array( 'toplevel_page_mo_saml_settings' ) // <-- Please note this
    );

    $pointers['miniorange-short-code'] = array(
        'title'     => sprintf( '<h3>%s</h3>', esc_html__( 'Premium Feature' ) ),
        'content'   => sprintf( '<p>%s</p>', esc_html__( 'Add a shortcode to any page and SSO into your website' ) ),
        'anchor_id' => '#miniorange-short-code',
        'edge'      => 'left',
        'align'     => 'left',
        'where'     => array( 'toplevel_page_mo_saml_settings' ) // <-- Please note this
    );
	
	$pointers['miniorange-redirection-sso-restart-tour'] = array(
        'title'     => sprintf( '<h3>%s</h3>', esc_html__( 'Click when you need me!' ) ),
        'content'   => sprintf( '<p>%s</p>', esc_html__( 'Revisit tour' ) ),
        'anchor_id' => '#miniorange-redirection-sso-restart-tour',
        'edge'      => 'left',
        'align'     => 'left',
        'where'     => array( 'toplevel_page_mo_saml_settings' ) // <-- Please note this
    );
}






return $pointers;