<?php

/**
 * @file
 * CLF THEME INFO.
 */

use Drupal\Core\Form\FormStateInterface;

/**
 * Implements hook_form_system_theme_settings_alter().
 */

function kraken_form_system_theme_settings_alter(&$form, FormStateInterface &$form_state)
{
  // Move the default theme settings to our custom vertical tabs for core theme
  // settings.
  $form['core'] = [
    '#type' => 'vertical_tabs',
    '#prefix' => '<h2><small>' . t('Override Global Settings') . '</small></h2>',
    '#weight' => 0,
  ];

  $form['theme_settings']['#group'] = 'core';
  $form['logo']['#group'] = 'core';
  $form['favicon']['#group'] = 'core';

  // CLF FORM SETTINGS.
  $form['clf_credits'] = [
    '#type' => 'fieldset',
    '#title' => t('UBC Science Drupal Theme Information'),
    '#prefix' => '<h1>' . t('UBC Science theme for Drupal') . '</h1>',
    '#weight' => -10,
    '#description' => t('The UBC Science Drupal theme is a responsive theme, developed by the <a href=":url_web_services" title="Contact UBC IT Web Services" target="_blank">UBC IT Web Services Department</a>.<br><br>The <a href=":url_clf" title="Discover the UBC CLF Brand" target="_blank">CLF</a> is developed and distributed by Communications &amp; Marketing. For support <a href=":url_support" title="Contact UBC Communications & Marketing" target="_blank">please contact us</a>.<br><br>To report an issue with this theme, please visit <a href=":url_repo" target="_blank">the repository on Github</a>', [
      ':url_web_services' => 'https://web.it.ubc.ca/forms/webservices/',
      ':url_support' => 'https://clf.ubc.ca/support',
      ':url_repo' => 'https://github.com/ubc-web-services/kraken',
      ':url_clf' => 'https://brand.ubc.ca/clf',
    ]),
  ];

  // Custom settings in Vertical Tabs container.
  $form['clf'] = [
    '#type' => 'vertical_tabs',
    '#prefix' => '<h2>' . t('CLF Settings') . '</h2>',
    '#weight' => -9,
    '#default_tab' => 'general',
  ];

  // CLF GENERAL OPTIONS.
  $form['general'] = [
    '#type' => 'details',
    '#title' => t('General Settings'),
    '#group' => 'clf',
  ];

  $form['general']['clf_unitname'] = [
    '#type' => 'textfield',
    '#prefix' => t('<h2>General Site Information</h2>'),
    '#title' => t('This field will populate the <a href=":url_unit_name" title="View the location of the Unit Name" target="_blank">Unit Name</a> in the header and the <a href=":url_unit_sub_footer" title="View the location of the Unit Sub Footer" target="_blank">Unit Sub Footer</a>.', [
      ':url_unit_name' => 'https://clf.ubc.ca/parts-of-the-clf/#unit-name',
      ':url_unit_sub_footer' => 'https://clf.ubc.ca/parts-of-the-clf/#unit-sub-footer',
    ]),
    '#default_value' => theme_get_setting('clf_unitname'),
    '#size' => 60,
    '#maxlength' => 128,
    '#required' => TRUE,
  ];

  $form['general']['clf_version'] = [
    //'#type' => 'select',
    '#type' => 'hidden',
    '#title' => t('CLF Version'),
    '#description' => t('Select the version of the CLF you\'d like to use. View <a href=":url" target="_blank">colour theme options</a> and design specifications. Note that CLF 7 verions load a minimal copy of the CLF files from Drupal, which is much better for performance.<br><strong>Warning</strong>: Advanced users only. This will require creating and adding your own css for non-clf regions of the site, including navigation.', [
      ':url' => 'https://clf.ubc.ca/design-specifications/#theme-options',
    ]),
    '#default_value' => theme_get_setting('clf_version'),
    '#options' => [
      '8' => t('8.0.0 (not yet released)'),
      'legacy--bw' => t('7.0.4  - Blue on White'),
      'legacy--wb' => t('7.0.4  - White on Blue'),
      'legacy--wg' => t('7.0.4  - White on Grey'),
      'legacy--gw' => t('7.0.4  - Grey on White'),
    ],
  ];

  $form['general']['clf_layout'] = [
    //'#type' => 'select',
    '#type' => 'hidden',
    '#title' => t('Layout (CLF version 7 only)'),
    '#description' => t('Make the CLF Full Width and Centered, Fluid Width and Left Aligned, or Fixed Width and Centered. You can <a href=":url" target="_blank">compare the layout options here</a>.', [
      ':url' => 'https://clf.ubc.ca/design-specifications/#layout-options',
    ]),
    '#default_value' => theme_get_setting('clf_layout'),
    '#options' => [
      'full' => t('Full Width (Default)'),
      'centered' => t('Fixed width, centered with Grey Background'),
      'fluid' => t('Fluid Width, Left-Aligned'),
    ],
  ];

  $form['general']['clf_widen'] = [
    '#type' => 'checkbox',
    '#title' => t('<strong>Widen the CLF (v.7) to 1720px</strong>'),
    '#description' => t('By default, version 7 of the CLF is constrained to 1200px wide. This option adds an additional 1720px (adjustable in CSS) breakpoint to the CLF required regions (does not effect content regions)'),
    '#default_value' => theme_get_setting('clf_widen'),
  ];

  $form['general']['clf_widen_more'] = [
    '#type' => 'checkbox',
    '#title' => t('<strong>Widen the CLF (v.7) to 2400px</strong>'),
    '#description' => t('This option adds an additional 2400px (adjustable in CSS) breakpoint to the CLF required regions (does not effect content regions)'),
    '#default_value' => theme_get_setting('clf_widen_more'),
  ];

  $form['general']['clf_dark_mode'] = [
    //'#type' => 'checkbox',
    '#type' => 'hidden',
    '#title' => t('<strong>Load Dark Mode stylesheet</strong>'),
    '#description' => t('Allow a Dark Mode option to be loaded if a user\'s preferences ask for it. This option requires additional CSS and is only supported for CLF 8+.'),
    '#default_value' => theme_get_setting('clf_dark_mode'),
  ];

  $form['general']['clf_js'] = [
    '#type' => 'select',
    '#title' => t('Javascript library'),
    '#description' => t('Select whether you\'d like to use the <a href=":url" target="_blank">vue.js</a> library for javascript components or <a href=":bootstrapurl" target="_blank">bootstrap 5</a> libraries (jquery not required). If you choose to use vue.js, you can choose between the development version with debugging tools or the full (production) version for live sites. You can find <a href=":buildsurl" target="_blank">an explanation of the differences here</a>.', [
      ':url' => 'https://vuejs.org',
      ':bootstrapurl' => 'https://getbootstrap.com/docs/5.0/getting-started/javascript/',
      ':buildsurl' => 'https://vuejs.org/v2/guide/installation.html#Explanation-of-Different-Builds',
    ]),
    '#default_value' => theme_get_setting('clf_js'),
    '#options' => [
      'js-dev' => t('Full Vue.js Development version'),
      'js-prod' => t('Full Vue.js Production version'),
      'js-bootstrap' => t('Bootstrap 5'),
    ],
  ];

  $form['general']['clf_css'] = [
    '#type' => 'select',
    '#title' => t('CSS styles'),
    '#description' => t('This theme uses the <a href=":url" target="_blank">PurgeCSS</a> library to scan your twig, html and javascript files and remove any CSS utility styles that are not in use. This is provided by the TailwindCSS utility-first CSS library - see <a href=":url2" target="_blank">the Tailwind CSS docs</a> for information on how to configure and control this.', [
      ':url' => 'https://purgecss.com',
      ':url2' => 'https://tailwindcss.com/docs/controlling-file-size#writing-purgeable-html',
    ]),
    '#default_value' => theme_get_setting('clf_css'),
    '#options' => [
      'css-dev' => t('Load all CSS styles (development)'),
      'css-prod' => t('Load purged CSS styles (production)'),
    ],
  ];

  $form['general']['cwl_site'] = [
    '#type' => 'checkbox',
    '#title' => t('<strong>Display a CWL Login option</strong>'),
    '#description' => t('<strong>Check this option if the site should display a CWL Login option on the <a href=":url" target="_blank">drupal login page</a>.</strong><br />Note that this does not implement CWL protection, but simply adds the form to the login page.', [
      ':url' => '/user',
    ]),
    '#default_value' => theme_get_setting('cwl_site'),
  ];

  $form['general']['clf_fonts'] = [
    '#type' => 'select',
    '#title' => t('CLF typeface options'),
    '#description' => t('UBC Science web branding uses two google fonts, <a href=":url" target="_blank">Merriweather</a> (serif, 400, 700 & 900) and <a href=":url2" target="_blank">Inter</a> (sans-serif, 100, 400, 600 and 700). Enabling this option loads them correctly from Google\'s CDN. <br>If you\'d like to use the older Whitney webfont on the website, choose the version you will be using.<br /><small>Please note that the production version of Whitney is provided by Web Communications, requires authorization via <a href=":brandurl">this form</a>, and only includes two weights (400 and 600).</small>', [
      ':url' => 'https://fonts.google.com/?query=merriweather',
      ':url2' => 'https://fonts.google.com/?query=Inter',
      ':brandurl' => 'http://brand.ubc.ca/font-request-form/',
    ]),
    '#default_value' => theme_get_setting('clf_fonts'),
    '#options' => [
      '' => t("Don't load any webfonts"),
      'default' => t("Inter / Merriweather - Google CDN"),
      'clf8' => t("Open Sans / Merriweather - Google CDN"),
      'legacy-dev' => t('Whitney - Development version'),
      'legacy-prod' => t('Whitney - Production version'),
    ],
  ];

  $form['general']['clf_sticky'] = [
    '#type' => 'checkbox',
    '#title' => t('<strong>Make the top navigation sticky?</strong>'),
    '#description' => t('This option allows the top navigation to stay pinned to the top of the page when scrolling.'),
    '#default_value' => theme_get_setting('clf_sticky'),
  ];

  // UBC unit information.
  $form['unit'] = [
    '#type' => 'details',
    '#title' => t('Site Settings'),
    '#group' => 'clf',
  ];

  $form['unit']['clf_unit_campus'] = [
    '#type' => 'select',
    '#title' => t('Campus Identity'),
    '#prefix' => t('<h2>General Unit Information</h2>'),
    '#description' => t('This field shows your unit\'s campus mandate: Vancouver Campus or Okanagan Campus.<br /><small>If your unit has an institution-wide mandate or if neither choice is applicable, select the third option. See <a href=":url" target="_blank">Campus Identity</a> for guidelines.</small>', [
      ':url' => 'https://clf.ubc.ca/parts-of-the-clf',
    ]),
    '#default_value' => theme_get_setting('clf_unit_campus'),
    '#options' => [
      'vancouver' => t('Vancouver'),
      'okanagan' => t('Okanagan'),
      '' => t('Institution-wide mandate / Not applicable'),
    ],
  ];

  $form['unit']['clf_faculty'] = [
    '#type' => 'checkbox',
    '#title' => t('<strong>Is your unit part of a Faculty?</strong>'),
    '#default_value' => theme_get_setting('clf_faculty'),
  ];

  $form['unit']['clf_faculty_name'] = [
    '#type' => 'select',
    '#title' => t('If yes, choose your Faculty'),
    '#default_value' => theme_get_setting('clf_faculty_name'),
    '#options' => [
      'Allard School of Law' => t('Allard School of Law'),
      'Faculty of Applied Science' => t('Faculty of Applied Science'),
      'Faculty of Arts' => t('Faculty of Arts'),
      'Faculty of Dentistry' => t('Faculty of Dentistry'),
      'Faculty of Education' => t('Faculty of Education'),
      'Faculty of Forestry' => t('Faculty of Forestry'),
      'Faculty of Land and Food Systems' => t('Faculty of Land and Food Systems'),
      'Faculty of Medicine' => t('Faculty of Medicine'),
      'Faculty of Pharmaceutical Sciences' => t('Faculty of Pharmaceutical Sciences'),
      'Faculty of Science' => t('Faculty of Science'),
      'Graduate and Postdoctoral Studies' => t('Graduate and Postdoctoral Studies'),
      'Sauder School of Business' => t('Sauder School of Business'),
    ],
  ];

  $form['unit']['unit_signature'] = [
    //'#type' => 'managed_file',
    '#type' => 'hidden',
    '#required' => false,
    '#title' => t('<strong>Unit signature (SVG)</strong><br>* ensure that svg is trimmed to artwork bounds.'),
    '#description' => t('This option allows an SVG of signature to be uploaded, which is then displayed in the unit footer.'),
    '#default_value' => theme_get_setting('unit_signature'),
    '#upload_location' => 'public://unit-signature/',
    '#disabled' => true,
    '#upload_validators' => array(
      'file_validate_extensions' => array('svg'),
    ),
  ];

  $form['unit']['clf_theme_unitbar_colour'] = [
    '#type' => 'color',
    '#title' => t('Unit Bar Colour'),
    '#description' => t('See design specifications for <a href=":url" title="Learn more about the Unit Name background colours" target="_blank">Unit Name background colours</a>. This colour will be used as the background colour for the Unit Name Background', [
      ':url' => 'https://clf.ubc.ca/parts-of-the-clf/#unit-colors',
    ]),
    '#size' => 7,
    '#maxlength' => 7,
    '#default_value' => theme_get_setting('clf_theme_unitbar_colour'),
    '#required' => TRUE,
  ];

  $form['unit']['clf_theme_unit_colour'] = [
    '#type' => 'color',
    '#title' => t('Unit Primary Colour'),
    '#description' => t('This colour will be set as a variable that can be used in your css as <code>--color-primary</code>. It is often also used as the Unit Bar Colour above.', [
      ':url' => 'https://clf.ubc.ca/parts-of-the-clf/#unit-colors',
    ]),
    '#size' => 7,
    '#maxlength' => 7,
    '#default_value' => theme_get_setting('clf_theme_unit_colour'),
    '#required' => TRUE,
  ];

  $form['unit']['clf_theme_secondary_colour'] = [
    '#type' => 'color',
    '#title' => t('Unit Secondary Colour'),
    '#description' => t('This colour will be set as a variable that can be used in your css as <code>--color-secondary</code>.)', [
      ':url' => 'https://clf.ubc.ca/parts-of-the-clf/#unit-colors',
    ]),
    '#size' => 7,
    '#maxlength' => 7,
    '#default_value' => theme_get_setting('clf_theme_secondary_colour'),
    '#required' => TRUE,
  ];

  $form['unit']['clf_theme_tertiary_colour'] = [
    '#type' => 'color',
    '#title' => t('Unit Tertiary Colour'),
    '#description' => t('This colour will be set as a variable that can be used in your css as <code>--color-tertiary</code>.', [
      ':url' => 'https://clf.ubc.ca/parts-of-the-clf/#unit-colors',
    ]),
    '#size' => 7,
    '#maxlength' => 7,
    '#default_value' => theme_get_setting('clf_theme_tertiary_colour'),
    '#required' => TRUE,
  ];

  $form['unit']['clf_theme_accent_colour'] = [
    '#type' => 'color',
    '#title' => t('Unit Accent Colour'),
    '#description' => t('This colour will be set as a variable that can be used in your css as <code>--color-accent</code>.', [
      ':url' => 'https://clf.ubc.ca/parts-of-the-clf/#unit-colors',
    ]),
    '#size' => 7,
    '#maxlength' => 7,
    '#default_value' => theme_get_setting('clf_theme_accent_colour'),
    '#required' => TRUE,
  ];

  $form['unit']['clf_theme_primary_alt_colour'] = [
    '#type' => 'color',
    '#title' => t('Unit Alt Primary Colour'),
    '#description' => t('This colour will be set as a variable that can be used in your css as <code>--color-alt-primary</code>.', [
      ':url' => 'https://clf.ubc.ca/parts-of-the-clf/#unit-colors',
    ]),
    '#size' => 7,
    '#maxlength' => 7,
    '#default_value' => theme_get_setting('clf_theme_primary_alt_colour'),
    '#required' => TRUE,
  ];

  $form['unit']['clf_theme_secondary_alt_colour'] = [
    '#type' => 'color',
    '#title' => t('Unit Alt Secondary Colour'),
    '#description' => t('This colour will be set as a variable that can be used in your css as <code>--color-alt-secondary</code>.', [
      ':url' => 'https://clf.ubc.ca/parts-of-the-clf/#unit-colors',
    ]),
    '#size' => 7,
    '#maxlength' => 7,
    '#default_value' => theme_get_setting('clf_theme_secondary_alt_colour'),
    '#required' => TRUE,
  ];

  $form['unit']['clf_theme_tertiary_alt_colour'] = [
    '#type' => 'color',
    '#title' => t('Unit Alt Tertiary Colour'),
    '#description' => t('This colour will be set as a variable that can be used in your css as <code>--color-alt-tertiary</code>.', [
      ':url' => 'https://clf.ubc.ca/parts-of-the-clf/#unit-colors',
    ]),
    '#size' => 7,
    '#maxlength' => 7,
    '#default_value' => theme_get_setting('clf_theme_tertiary_alt_colour'),
    '#required' => TRUE,
  ];

  $form['unit']['clf_theme_accent_alt_colour'] = [
    '#type' => 'color',
    '#title' => t('Unit Alt Accent Colour'),
    '#description' => t('This colour will be set as a variable that can be used in your css as <code>--color-alt-accent</code>.', [
      ':url' => 'https://clf.ubc.ca/parts-of-the-clf/#unit-colors',
    ]),
    '#size' => 7,
    '#maxlength' => 7,
    '#default_value' => theme_get_setting('clf_theme_accent_alt_colour'),
    '#required' => TRUE,
  ];

  $form['unit']['clf_theme_link_colour'] = [
    '#type' => 'color',
    '#title' => t('Unit Link Colour'),
    '#description' => t(
      'This colour will be set as a variable that can be used in your css as <code>--color-link</code>.',
      [
        ':url' => 'https://clf.ubc.ca/parts-of-the-clf/#unit-colors',
      ]
    ),
    '#size' => 7,
    '#maxlength' => 7,
    '#default_value' => theme_get_setting('clf_theme_link_colour'),
    '#required' => true,
  ];

  $form['unit']['clf_theme_link_hover_colour'] = [
    '#type' => 'color',
    '#title' => t('Unit Link Hover Colour'),
    '#description' => t(
      'This colour will be set as a variable that can be used in your css as <code>--color-link-hover</code>.',
      [
        ':url' => 'https://clf.ubc.ca/parts-of-the-clf/#unit-colors',
      ]
    ),
    '#size' => 7,
    '#maxlength' => 7,
    '#default_value' => theme_get_setting('clf_theme_link_hover_colour'),
    '#required' => true,
  ];

  $form['unit']['clf_theme_link_active_colour'] = [
    '#type' => 'color',
    '#title' => t('Unit Link Active Colour'),
    '#description' => t(
      'This colour will be set as a variable that can be used in your css as <code>--color-link-active</code>.',
      [
        ':url' => 'https://clf.ubc.ca/parts-of-the-clf/#unit-colors',
      ]
    ),
    '#size' => 7,
    '#maxlength' => 7,
    '#default_value' => theme_get_setting('clf_theme_link_active_colour'),
    '#required' => true,
  ];

  $form['unit']['clf_theme_leading'] = [
    '#type' => 'textfield',
    '#title' => t('Theme Line Height'),
    '#description' => t('This will set a variable that can be used in your css as <code>--leading</code>. '),
    '#size' => 7,
    '#maxlength' => 7,
    '#default_value' => theme_get_setting('clf_theme_leading'),
    '#required' => TRUE,
  ];

  $form['unit']['clf_theme_base_font_size'] = [
    '#type' => 'textfield',
    '#title' => t('Theme Base Font Size'),
    '#description' => t('This will set a variable that can be used in your css as <code>--base-font-size</code>. It should be set in px.'),
    '#size' => 7,
    '#maxlength' => 7,
    '#default_value' => theme_get_setting('clf_theme_base_font_size'),
    '#required' => TRUE,
  ];

  // LOCATION INFORMATION.
  $form['location'] = [
    '#type' => 'details',
    '#title' => t('Unit Footer Settings'),
    '#group' => 'clf',
  ];

  $form['location']['clf_footer_show'] = [
    '#type' => 'checkbox',
    '#title' => t('<strong>Show the Subunit footer?</strong>'),
    '#prefix' => t('<h2>General Unit Footer Settings</h2>'),
    '#description' => t('Note that deselecting this option will prevent the subunit footer from appearing'),
    '#default_value' => theme_get_setting('clf_footer_show'),
  ];

  $form['location']['clf_footer_color'] = [
    '#type' => 'select',
    '#title' => t('Unit Footer Colour'),
    '#description' => t('This field shows your unit\'s campus mandate: Vancouver Campus or Okanagan Campus.<br /><small>If your unit has an institution-wide mandate or if neither choice is applicable, select the third option. See <a href=":url" target="_blank">Campus Identity</a> for guidelines.</small>', [
      ':url' => 'https://clf.ubc.ca/parts-of-the-clf',
    ]),
    '#default_value' => theme_get_setting('clf_footer_color'),
    '#options' => [
      'blue' => t('Science Blue'),
      'gold' => t('Science Gold (subunit)'),
    ],
  ];

  $form['location']['clf_footername_option'] = [
    '#type' => 'textfield',
    '#title' => t('Unit Footer Name option'),
    '#prefix' => t('<h2>Address and Location Information</h2><h3>UBC Science subunit</h3>'),
    '#default_value' => theme_get_setting('clf_footername_option'),
    '#size' => 60,
    '#maxlength' => 128,
  ];

  $form['location']['clf_subname_option'] = [
    '#type' => 'textfield',
    '#title' => t('Unit Subname option'),
    '#default_value' => theme_get_setting('clf_subname_option'),
    '#size' => 60,
    '#maxlength' => 128,
  ];

  $form['location']['clf_building_option'] = [
    '#type' => 'textfield',
    '#title' => t('Building'),
    '#default_value' => theme_get_setting('clf_building_option'),
    '#size' => 60,
    '#maxlength' => 128,
  ];

  $form['location']['clf_streetaddr'] = [
    '#type' => 'textfield',
    '#title' => t('Street Address'),
    '#default_value' => theme_get_setting('clf_streetaddr'),
    '#size' => 60,
    '#maxlength' => 128,
  ];

  $form['location']['clf_locality'] = [
    //'#type' => 'textfield',
    '#type' => 'hidden',
    '#title' => t('City'),
    '#default_value' => theme_get_setting('clf_locality'),
    '#size' => 60,
    '#maxlength' => 128,
    '#disabled' => true,
  ];

  $form['location']['clf_region'] = [
    //'#type' => 'textfield',
    '#type' => 'hidden',
    '#title' => t('Province / Region'),
    '#default_value' => theme_get_setting('clf_region'),
    '#size' => 60,
    '#maxlength' => 128,
    '#disabled' => true,
  ];

  $form['location']['clf_country'] = [
    //'#type' => 'textfield',
    '#type' => 'hidden',
    '#title' => t('Country'),
    '#default_value' => theme_get_setting('clf_country'),
    '#size' => 60,
    '#maxlength' => 128,
    '#disabled' => true,
  ];

  $form['location']['clf_postal'] = [
    '#type' => 'textfield',
    '#title' => t('Postal Code'),
    '#default_value' => theme_get_setting('clf_postal'),
    '#size' => 60,
    '#maxlength' => 128,
  ];

  $form['location']['clf_telephone'] = [
    '#type' => 'textfield',
    '#title' => t('Telephone Number - format as xxx xxx xxxx (spaces only)'),
    '#default_value' => theme_get_setting('clf_telephone'),
    '#size' => 60,
    '#maxlength' => 128,
  ];

  $form['location']['clf_fax'] = [
    //'#type' => 'textfield',
    '#type' => 'hidden',
    '#title' => t('Fax Number - format as xxx xxx xxxx (spaces only)'),
    '#default_value' => theme_get_setting('clf_fax'),
    '#size' => 60,
    '#maxlength' => 128,
    '#disabled' => true,
  ];

  $form['location']['clf_email'] = [
    '#type' => 'textfield',
    '#title' => t('Email'),
    '#default_value' => theme_get_setting('clf_email'),
    '#size' => 60,
    '#maxlength' => 128,
  ];

  $form['location']['clf_website'] = [
    //'#type' => 'textfield',
    '#type' => 'hidden',
    '#title' => t('Website'),
    '#description' => t('Do not include the <em>https://</em>'),
    '#default_value' => theme_get_setting('clf_website'),
    '#size' => 60,
    '#maxlength' => 128,
    '#disabled' => true,
  ];

  // unitsocial.
  $form['unitsocial'] = [
    '#type' => 'details',
    '#title' => t('Unit Social Media Settings'),
    '#group' => 'clf',
  ];

  $form['unitsocial']['unit_social_facebook'] = [
    '#type' => 'textfield',
    '#title' => t('Facebook Account Link'),
    '#prefix' => t('<h2>Add Unit Social Media icons/links to the unit footer</h2>'),
    '#default_value' => theme_get_setting('unit_social_facebook'),
    '#size' => 60,
    '#maxlength' => 128,
    '#description' => t('Format of https://www.xyz.com'),
  ];

  $form['unitsocial']['unit_social_twitter'] = [
    '#type' => 'textfield',
    '#title' => t('Twitter Account Link'),
    '#default_value' => theme_get_setting('unit_social_twitter'),
    '#size' => 60,
    '#maxlength' => 128,
    '#description' => t('Format of https://www.xyz.com'),
  ];

  $form['unitsocial']['unit_social_instagram'] = [
    '#type' => 'textfield',
    '#title' => t('Instagram Account Link'),
    '#default_value' => theme_get_setting('unit_social_instagram'),
    '#size' => 60,
    '#maxlength' => 128,
    '#description' => t('Format of https://www.xyz.com'),
  ];

  $form['unitsocial']['unit_social_linkedin'] = [
    '#type' => 'textfield',
    '#title' => t('Linkedin Account Link'),
    '#default_value' => theme_get_setting('unit_social_linkedin'),
    '#size' => 60,
    '#maxlength' => 128,
    '#description' => t('Format of https://www.xyz.com'),
  ];

  $form['unitsocial']['unit_social_youtube'] = [
    '#type' => 'textfield',
    '#title' => t('YouTube Account Link'),
    '#default_value' => theme_get_setting('unit_social_youtube'),
    '#size' => 60,
    '#maxlength' => 128,
    '#description' => t('Format of https://www.xyz.com'),
  ];

  // social.
  $form['social'] = [
    '#type' => 'details',
    '#title' => t('Science Social Media Settings'),
    '#group' => 'clf',
  ];

  $form['social']['clf_social_facebook'] = [
    '#type' => 'textfield',
    '#title' => t('Facebook Account Link'),
    '#prefix' => t('<h2>Add UBC Science Social Media icons/links to the footer</h2>'),
    '#default_value' => theme_get_setting('clf_social_facebook'),
    '#size' => 60,
    '#maxlength' => 128,
    '#description' => t('Format of https://www.xyz.com'),
  ];

  $form['social']['clf_social_twitter'] = [
    '#type' => 'textfield',
    '#title' => t('Twitter Account Link'),
    '#default_value' => theme_get_setting('clf_social_twitter'),
    '#size' => 60,
    '#maxlength' => 128,
    '#description' => t('Format of https://www.xyz.com'),
  ];

  $form['social']['clf_social_instagram'] = [
    '#type' => 'textfield',
    '#title' => t('Instagram Account Link'),
    '#default_value' => theme_get_setting('clf_social_instagram'),
    '#size' => 60,
    '#maxlength' => 128,
    '#description' => t('Format of https://www.xyz.com'),
  ];

  $form['social']['clf_social_linkedin'] = [
    '#type' => 'textfield',
    '#title' => t('Linkedin Account Link'),
    '#default_value' => theme_get_setting('clf_social_linkedin'),
    '#size' => 60,
    '#maxlength' => 128,
    '#description' => t('Format of https://www.xyz.com'),
  ];

  $form['social']['clf_social_youtube'] = [
    '#type' => 'textfield',
    '#title' => t('YouTube Account Link'),
    '#default_value' => theme_get_setting('clf_social_youtube'),
    '#size' => 60,
    '#maxlength' => 128,
    '#description' => t('Format of https://www.xyz.com'),
  ];

  // search.
  $form['search'] = [
    '#type' => 'details',
    '#title' => t('Search Settings'),
    '#group' => 'clf',
  ];

  $form['search']['clf_searchdomain'] = [
    '#type' => 'textfield',
    '#title' => t('Search Domain'),
    '#default_value' => theme_get_setting('clf_searchdomain'),
    '#prefix' => t('<h2>Default Search Settings</h2>'),
    '#size' => 60,
    '#maxlength' => 128,
    '#description' => t('This option allows you to limit search results in the global UBC search field to a specific domain other than this site. e.g. <strong>*.arts.ubc.ca</strong> or <strong>www.publicaffairs.ubc.ca/category/</strong>. The default searches only this site.'),
  ];

  $form['search']['clf_searchlabel'] = [
    '#type' => 'textfield',
    '#title' => t('Search Field Placeholder (usually your unit name)'),
    '#default_value' => theme_get_setting('clf_searchlabel'),
    '#size' => 60,
    '#maxlength' => 128,
    '#description' => t('This appears inside the search field as placeholder text. e.g. <strong>Search Pharmacy</strong>'),
  ];

  $form['search']['clf_google_verify'] = [
    '#type' => 'textfield',
    '#title' => t('Google Site Verification Code'),
    '#description' => t('Adds a meta tag to your site to allow you to verify the property with Google'),
    '#default_value' => theme_get_setting('clf_google_verify'),
    '#size' => 60,
    '#maxlength' => 128,
  ];

  $form['search']['clf_bing_verify'] = [
    '#type' => 'textfield',
    '#title' => t('Bing Site Verification Code'),
    '#description' => t('Adds a meta tag to your site to allow you to verify the property with Bing'),
    '#default_value' => theme_get_setting('clf_bing_verify'),
    '#size' => 60,
    '#maxlength' => 128,
  ];

  // social.
  $form['icons'] = [
    '#type' => 'details',
    '#title' => t('Icon Settings'),
    '#group' => 'clf',
  ];

  $form['icons']['svg_icon_cart'] = [
    '#type' => 'checkbox',
    '#title' => t('<svg id="icon-cart" viewBox="0 0 32 32" aria-labelledby="title-icon-cart" aria-describedby="description-icon-cart" role="img" style="width:2rem;height:2rem;display:inline-block;">
    <title id="title-icon-cart">E-commerce Cart</title>
    <desc id="description-icon-cart">A shopping cart.</desc>
    <path opacity="0.2" d="M5 8H26.8018C26.9483 8 27.0929 8.03218 27.2256 8.09425C27.3583 8.15633 27.4757 8.2468 27.5695 8.35925C27.6634 8.4717 27.7314 8.6034 27.7687 8.74504C27.8061 8.88667 27.8119 9.03478 27.7857 9.17889L26.1493 18.1789C26.1074 18.4093 25.986 18.6177 25.8062 18.7678C25.6264 18.9178 25.3996 19 25.1654 19H7L5 8Z" fill="currentColor"></path>
    <path d="M24 23H8.56185C8.32766 23 8.1009 22.9178 7.9211 22.7678C7.7413 22.6177 7.61987 22.4093 7.57797 22.1789L4.2402 3.82112C4.19831 3.5907 4.07688 3.3823 3.89708 3.23225C3.71728 3.08219 3.49052 3 3.25633 3H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"></path>
    <path d="M9 28C10.3807 28 11.5 26.8807 11.5 25.5C11.5 24.1193 10.3807 23 9 23C7.61929 23 6.5 24.1193 6.5 25.5C6.5 26.8807 7.61929 28 9 28Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"></path>
    <path d="M24 28C25.3807 28 26.5 26.8807 26.5 25.5C26.5 24.1193 25.3807 23 24 23C22.6193 23 21.5 24.1193 21.5 25.5C21.5 26.8807 22.6193 28 24 28Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"></path>
    <path d="M5 8H26.8018C26.9483 8 27.0929 8.03218 27.2256 8.09425C27.3583 8.15633 27.4757 8.2468 27.5695 8.35925C27.6634 8.4717 27.7314 8.6034 27.7687 8.74504C27.8061 8.88667 27.8119 9.03478 27.7857 9.17889L26.1493 18.1789C26.1074 18.4093 25.986 18.6177 25.8062 18.7678C25.6264 18.9178 25.3996 19 25.1654 19H7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"></path>
  </svg> Cart icon.'),
    '#prefix' => t('<h2>Choose additional icons to load</h2>'),
    '#description' => t('Add a cart icon that can be referenced on each page.'),
    '#default_value' => theme_get_setting('svg_icon_cart'),
  ];

  $form['icons']['svg_icon_clock'] = [
    '#type' => 'checkbox',
    '#title' => t('<svg id="icon-clock" viewBox="0 0 32 32" aria-labelledby="title-icon-clock" aria-describedby="description-icon-clock" role="img" style="width:2rem;height:2rem;display:inline-block;fill:none;">
    <title id="title-icon-clock">Time</title>
    <desc id="description-icon-clock">A clock.</desc>
    <path opacity="0.2" d="M16 27C22.0751 27 27 22.0751 27 16C27 9.92487 22.0751 5 16 5C9.92487 5 5 9.92487 5 16C5 22.0751 9.92487 27 16 27Z" fill="currentColor"></path>
    <path d="M16 9V16H23" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
    <path fill="none" d="M16 27C22.0751 27 27 22.0751 27 16C27 9.92487 22.0751 5 16 5C9.92487 5 5 9.92487 5 16C5 22.0751 9.92487 27 16 27Z" stroke="currentColor" stroke-width="2" stroke-miterlimit="10"></path>
    <path fill="none" d="M24.4854 3.27209L28.728 7.51474" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    <path fill="none" d="M3.27197 7.51474L7.51461 3.27209" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
  </svg> Clock icon.'),
    '#description' => t('Add a clock icon that can be referenced on each page.'),
    '#default_value' => theme_get_setting('svg_icon_clock'),
  ];

  $form['icons']['svg_icon_discussion'] = [
    '#type' => 'checkbox',
    '#title' => t('<svg id="icon-discussion" viewBox="0 0 32 32" aria-labelledby="title-icon-discussion" aria-describedby="description-icon-discussion" role="img" style="width:2rem;height:2rem;display:inline-block;fill:none;">
    <title id="title-icon-discussion">Chats</title>
    <desc id="description-icon-discussion">Two speech clouds.</desc>
    <path opacity="0.2" d="M11.5074 21.9865C11.9498 23.2425 12.6653 24.3848 13.6023 25.331C14.5393 26.2773 15.6744 27.0039 16.926 27.4586C18.1776 27.9134 19.5145 28.0849 20.8404 27.9608C22.1662 27.8367 23.4481 27.4202 24.5935 26.7411L24.5935 26.741L27.702 27.6291C27.8306 27.6659 27.9666 27.6675 28.0961 27.634C28.2256 27.6004 28.3437 27.5329 28.4383 27.4383C28.5329 27.3437 28.6005 27.2256 28.634 27.0961C28.6676 26.9666 28.6659 26.8305 28.6291 26.7019L27.741 23.5935L27.7411 23.5936C28.5302 22.2627 28.963 20.751 28.9977 19.2042C29.0325 17.6574 28.668 16.1278 27.9394 14.7629C27.2109 13.398 26.1429 12.2439 24.8384 11.4119C23.5339 10.58 22.0371 10.0982 20.4922 10.0132L20.4925 10.0131C20.9685 11.3704 21.1125 12.822 20.9125 14.2464C20.7124 15.6708 20.1741 17.0266 19.3425 18.2002C18.511 19.3739 17.4105 20.3313 16.133 20.9924C14.8556 21.6535 13.4384 21.999 12 22C11.8347 22 11.6705 21.9956 11.5074 21.9867V21.9865Z" fill="currentColor"></path>
    <path fill="none" d="M4.25894 17.5936C3.14076 15.7086 2.74916 13.4802 3.15768 11.3269C3.56621 9.17365 4.74675 7.24355 6.47764 5.89908C8.20853 4.55461 10.3707 3.88826 12.5581 4.02514C14.7455 4.16203 16.8078 5.09273 18.3575 6.6425C19.9073 8.19226 20.838 10.2545 20.9749 12.4419C21.1118 14.6293 20.4455 16.7915 19.101 18.5224C17.7565 20.2533 15.8264 21.4338 13.6731 21.8424C11.5199 22.2509 9.29149 21.8593 7.40648 20.7411L7.40651 20.741L4.29808 21.6292C4.16947 21.6659 4.03338 21.6676 3.90391 21.634C3.77443 21.6005 3.65628 21.5329 3.56171 21.4383C3.46713 21.3438 3.39957 21.2256 3.36602 21.0961C3.33247 20.9667 3.33415 20.8306 3.37089 20.702L4.25902 17.5935L4.25894 17.5936Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
    <path fill="none" d="M11.5074 21.9866C11.9498 23.2426 12.6653 24.3848 13.6023 25.3311C14.5393 26.2773 15.6744 27.0039 16.926 27.4587C18.1776 27.9134 19.5145 28.0849 20.8404 27.9608C22.1662 27.8368 23.4481 27.4202 24.5935 26.7411L24.5935 26.741L27.702 27.6291C27.8306 27.6659 27.9666 27.6676 28.0961 27.634C28.2256 27.6005 28.3437 27.5329 28.4383 27.4383C28.5329 27.3438 28.6005 27.2256 28.634 27.0961C28.6676 26.9667 28.6659 26.8306 28.6291 26.702L27.741 23.5935L27.7411 23.5936C28.5302 22.2628 28.963 20.751 28.9977 19.2043C29.0325 17.6575 28.668 16.1278 27.9394 14.7629C27.2109 13.398 26.1429 12.2439 24.8384 11.4119C23.5339 10.58 22.0371 10.0983 20.4922 10.0132" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
  </svg> Discussion icon.'),
    '#description' => t('Add a discussion icon that can be referenced on each page.'),
    '#default_value' => theme_get_setting('svg_icon_discussion'),
  ];

  $form['icons']['svg_icon_facebook'] = [
    '#type' => 'checkbox',
    '#title' => t('<svg id="icon-facebook" viewBox="0 0 32 32" aria-labelledby="title-icon-facebook" aria-describedby="description-icon-facebook" role="img"  style="width:2rem;height:2rem;display:inline-block;fill:none;">
    <title id="title-icon-facebook">Facebook</title>
    <desc id="description-icon-facebook">The logo for the Facebook social media service.</desc>
    <path d="M13.25 11.6667H10V16H13.25V29H18.6667V16H22.5667L23 11.6667H18.6667V9.825C18.6667 8.85 18.8833 8.41667 19.8583 8.41667H23V3H18.8833C14.9833 3 13.25 4.73333 13.25 7.98333V11.6667Z" fill="currentColor"></path>
  </svg> Facebook icon.'),
    '#description' => t('Add a Facebook icon that can be referenced on each page.'),
    '#default_value' => theme_get_setting('svg_icon_facebook'),
  ];

  $form['icons']['svg_icon_home'] = [
    '#type' => 'checkbox',
    '#title' => t('<svg id="icon-home" viewBox="0 0 32 32" aria-labelledby="title-icon-home" aria-describedby="title-icon-home" role="img" style="width:2rem;height:2rem;display:inline-block;fill:none;">
    <title id="title-icon-home">Home</title>
    <desc id="description-icon-home">A house in silhouette.</desc>
    <path opacity="0.2" d="M18.9993 25.9991V19.9989C18.9993 19.7337 18.8939 19.4794 18.7064 19.2918C18.5188 19.1043 18.2645 18.9989 17.9993 18.9989H13.9993C13.7341 18.9989 13.4797 19.1043 13.2922 19.2918C13.1046 19.4794 12.9993 19.7337 12.9993 19.9989V25.9991C12.9993 26.2643 12.8939 26.5186 12.7064 26.7061C12.5189 26.8937 12.2646 26.999 11.9994 26.9991L6.00012 26.9999C5.86879 26.9999 5.73874 26.974 5.6174 26.9238C5.49606 26.8735 5.38581 26.7999 5.29294 26.707C5.20007 26.6142 5.12639 26.5039 5.07613 26.3826C5.02587 26.2612 5 26.1312 5 25.9999V14.4423C5 14.303 5.02911 14.1652 5.08547 14.0378C5.14183 13.9104 5.22418 13.7962 5.32726 13.7024L15.3266 4.61058C15.5106 4.44322 15.7505 4.35047 15.9993 4.35046C16.2481 4.35046 16.4879 4.44318 16.672 4.61054L26.6727 13.7024C26.7758 13.7962 26.8582 13.9104 26.9145 14.0378C26.9709 14.1652 27 14.303 27 14.4424V25.9999C27 26.1312 26.9741 26.2612 26.9239 26.3826C26.8736 26.5039 26.7999 26.6142 26.7071 26.707C26.6142 26.7999 26.5039 26.8735 26.3826 26.9238C26.2613 26.974 26.1312 26.9999 25.9999 26.9999L19.9991 26.9991C19.7339 26.999 19.4796 26.8937 19.2921 26.7061C19.1046 26.5186 18.9993 26.2643 18.9993 25.9991V25.9991Z" fill="currentColor"></path>
    <path fill="none" d="M18.9993 25.9991V19.9989C18.9993 19.7337 18.8939 19.4794 18.7064 19.2918C18.5188 19.1043 18.2645 18.9989 17.9993 18.9989H13.9993C13.7341 18.9989 13.4797 19.1043 13.2922 19.2918C13.1046 19.4794 12.9993 19.7337 12.9993 19.9989V25.9991C12.9993 26.2643 12.8939 26.5186 12.7064 26.7061C12.5189 26.8937 12.2646 26.999 11.9994 26.9991L6.00012 26.9999C5.86879 26.9999 5.73874 26.974 5.6174 26.9238C5.49606 26.8735 5.38581 26.7999 5.29294 26.707C5.20007 26.6142 5.12639 26.5039 5.07613 26.3826C5.02587 26.2612 5 26.1312 5 25.9999V14.4423C5 14.303 5.02911 14.1652 5.08547 14.0378C5.14183 13.9104 5.22418 13.7962 5.32726 13.7024L15.3266 4.61058C15.5106 4.44322 15.7505 4.35047 15.9993 4.35046C16.2481 4.35046 16.4879 4.44318 16.672 4.61054L26.6727 13.7024C26.7758 13.7962 26.8582 13.9104 26.9145 14.0378C26.9709 14.1652 27 14.303 27 14.4424V25.9999C27 26.1312 26.9741 26.2612 26.9239 26.3826C26.8736 26.5039 26.7999 26.6142 26.7071 26.707C26.6142 26.7999 26.5039 26.8735 26.3826 26.9238C26.2613 26.974 26.1312 26.9999 25.9999 26.9999L19.9991 26.9991C19.7339 26.999 19.4796 26.8937 19.2921 26.7061C19.1046 26.5186 18.9993 26.2643 18.9993 25.9991V25.9991Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
  </svg> Home icon.'),
    '#description' => t('Add a Facebook icon that can be referenced on each page.'),
    '#default_value' => theme_get_setting('svg_icon_home'),
  ];

  $form['icons']['svg_icon_instagram'] = [
    '#type' => 'checkbox',
    '#title' => t('<svg id="icon-instagram" viewBox="0 0 32 32" aria-labelledby="title-icon-instagram" aria-describedby="description-icon-instagram" role="img" style="width:2rem;height:2rem;display:inline-block;fill:none;">
  <title id="title-icon-instagram">Instagram</title>
  <desc id="description-icon-instagram">The logo for the Instagram social media service.</desc>
  <path d="M16 5.38333C19.4667 5.38333 19.9 5.38333 21.3083 5.49167C24.8833 5.6 26.5083 7.33333 26.6167 10.8C26.725 12.2083 26.725 12.5333 26.725 16C26.725 19.4667 26.725 19.9 26.6167 21.2C26.5083 24.6667 24.775 26.4 21.3083 26.5083C19.9 26.6167 19.575 26.6167 16 26.6167C12.5333 26.6167 12.1 26.6167 10.8 26.5083C7.225 26.4 5.6 24.6667 5.49167 21.2C5.38333 19.7917 5.38333 19.4667 5.38333 16C5.38333 12.5333 5.38333 12.1 5.49167 10.8C5.6 7.33333 7.33333 5.6 10.8 5.49167C12.1 5.38333 12.5333 5.38333 16 5.38333ZM16 3C12.425 3 11.9917 3 10.6917 3.10833C5.925 3.325 3.325 5.925 3.10833 10.6917C3 11.9917 3 12.425 3 16C3 19.575 3 20.0083 3.10833 21.3083C3.325 26.075 5.925 28.675 10.6917 28.8917C11.9917 29 12.425 29 16 29C19.575 29 20.0083 29 21.3083 28.8917C26.075 28.675 28.675 26.075 28.8917 21.3083C29 20.0083 29 19.575 29 16C29 12.425 29 11.9917 28.8917 10.6917C28.675 5.925 26.075 3.325 21.3083 3.10833C20.0083 3 19.575 3 16 3ZM16 9.28333C12.3167 9.28333 9.28333 12.3167 9.28333 16C9.28333 19.6833 12.3167 22.7167 16 22.7167C19.6833 22.7167 22.7167 19.6833 22.7167 16C22.7167 12.3167 19.6833 9.28333 16 9.28333ZM16 20.3333C13.6167 20.3333 11.6667 18.3833 11.6667 16C11.6667 13.6167 13.6167 11.6667 16 11.6667C18.3833 11.6667 20.3333 13.6167 20.3333 16C20.3333 18.3833 18.3833 20.3333 16 20.3333ZM22.9333 7.55C22.0667 7.55 21.4167 8.2 21.4167 9.06667C21.4167 9.93333 22.0667 10.5833 22.9333 10.5833C23.8 10.5833 24.45 9.93333 24.45 9.06667C24.45 8.2 23.8 7.55 22.9333 7.55Z" fill="currentColor"></path>
</svg> Instagram icon.'),
    '#description' => t('Add a Facebook icon that can be referenced on each page.'),
    '#default_value' => theme_get_setting('svg_icon_instagram'),
  ];

  $form['icons']['svg_icon_linkedin'] = [
    '#type' => 'checkbox',
    '#title' => t('<svg id="icon-linkedin" viewBox="0 0 32 32" aria-labelledby="title-icon-linkedin" aria-describedby="description-icon-linkedin" role="img" style="width:2rem;height:2rem;display:inline-block;fill:none;">
    <title id="title-icon-linkedin">Linkedin</title>
    <desc id="description-icon-linkedin">The logo for the LinkedIn social media service.</desc>
    <path d="M9.29167 7.3913C9.29167 8.73043 8.2375 9.78261 6.89583 9.78261C5.55417 9.78261 4.5 8.73043 4.5 7.3913C4.5 6.05217 5.55417 5 6.89583 5C8.2375 5 9.29167 6.05217 9.29167 7.3913ZM9.29167 11.6957H4.5V27H9.29167V11.6957ZM16.9583 11.6957H12.1667V27H16.9583V18.9652C16.9583 14.4696 22.7083 14.087 22.7083 18.9652V27H27.5V17.3391C27.5 9.78261 18.9708 10.0696 16.9583 13.8V11.6957Z" fill="currentColor"></path>
  </svg> Linkedin icon.'),
    '#description' => t('Add a Linkedin icon that can be referenced on each page.'),
    '#default_value' => theme_get_setting('svg_icon_linkedin'),
  ];

  $form['icons']['svg_icon_location'] = [
    '#type' => 'checkbox',
    '#title' => t('<svg id="icon-location" viewBox="0 0 32 32" aria-labelledby="title-icon-location" aria-describedby="description-icon-location" role="img" style="width:2rem;height:2rem;display:inline-block;fill:none;">
    <title id="title-icon-location">Location Pin</title>
    <desc id="description-icon-location">A map location pin.</desc>
    <path opacity="0.2" d="M16 3C13.3478 3.00001 10.8043 4.05358 8.92894 5.92894C7.05358 7.8043 6.00001 10.3478 6 13C6 22 16 29 16 29C16 29 26 22 26 13C26 10.3478 24.9464 7.8043 23.0711 5.92894C21.1957 4.05358 18.6522 3.00001 16 3ZM16 17C15.2089 17 14.4355 16.7654 13.7777 16.3259C13.1199 15.8864 12.6072 15.2616 12.3045 14.5307C12.0017 13.7998 11.9225 12.9956 12.0769 12.2196C12.2312 11.4437 12.6122 10.731 13.1716 10.1716C13.731 9.61216 14.4437 9.2312 15.2196 9.07686C15.9956 8.92252 16.7998 9.00173 17.5307 9.30448C18.2616 9.60723 18.8864 10.1199 19.3259 10.7777C19.7654 11.4355 20 12.2089 20 13C20 14.0609 19.5786 15.0783 18.8284 15.8284C18.0783 16.5786 17.0609 17 16 17V17Z" fill="currentColor"></path>
    <path fill="none" d="M16 17C18.2091 17 20 15.2091 20 13C20 10.7909 18.2091 9 16 9C13.7909 9 12 10.7909 12 13C12 15.2091 13.7909 17 16 17Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
    <path fill="none" d="M26 13C26 22 16 29 16 29C16 29 6 22 6 13C6 10.3478 7.05357 7.8043 8.92893 5.92893C10.8043 4.05357 13.3478 3 16 3C18.6522 3 21.1957 4.05357 23.0711 5.92893C24.9464 7.8043 26 10.3478 26 13V13Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
  </svg> Location icon.'),
    '#description' => t('Add a Location icon that can be referenced on each page.'),
    '#default_value' => theme_get_setting('svg_icon_location'),
  ];

  $form['icons']['svg_icon_mail'] = [
    '#type' => 'checkbox',
    '#title' => t('<svg id="icon-mail" viewBox="0 0 32 32" aria-labelledby="title-icon-mail" aria-describedby="description-icon-mail" role="img" style="width:2rem;height:2rem;display:inline-block;fill:none;">
    <title id="title-icon-mail">Mail</title>
    <desc id="description-icon-mail">An envelope.</desc>
    <path opacity="0.2" d="M28 12L18.1819 19H13.8181L4 12L16 4L28 12Z" fill="currentColor"></path>
    <path fill="none" d="M4 12V25C4 25.2652 4.10536 25.5196 4.29289 25.7071C4.48043 25.8946 4.73478 26 5 26H27C27.2652 26 27.5196 25.8946 27.7071 25.7071C27.8946 25.5196 28 25.2652 28 25V12L16 4L4 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
    <path fill="none" d="M13.8182 19L4.30835 25.7174" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
    <path fill="none" d="M27.6918 25.7174L18.1818 18.9999" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
    <path fill="none" d="M28 12L18.1819 19H13.8181L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
  </svg> Mail icon.'),
    '#description' => t('Add a Mail icon that can be referenced on each page.'),
    '#default_value' => theme_get_setting('svg_icon_mail'),
  ];

  $form['icons']['svg_icon_pencil'] = [
    '#type' => 'checkbox',
    '#title' => t('<svg id="icon-pencil" viewBox="0 0 32 32" aria-labelledby="title-icon-pencil" aria-describedby="description-icon-pencil" role="img" style="width:2rem;height:2rem;display:inline-block;fill:none;">
    <title id="title-icon-pencil">Pencil</title>
    <desc id="description-icon-pencil">A pencil indicating that this is editable.</desc>
    <path opacity="0.2" d="M17 7.99997L24 15L27.2929 11.7071C27.4804 11.5195 27.5858 11.2652 27.5858 11C27.5858 10.7348 27.4804 10.4804 27.2929 10.2929L21.7071 4.70708C21.5196 4.51954 21.2652 4.41418 21 4.41418C20.7348 4.41418 20.4804 4.51954 20.2929 4.70708L17 7.99997Z" fill="currentColor"></path>
    <path fill="none" d="M17 8L24 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
    <path fill="none" d="M12 27H6C5.73478 27 5.48043 26.8946 5.29289 26.7071C5.10536 26.5195 5 26.2652 5 26V20.4142C5 20.2829 5.02587 20.1528 5.07612 20.0315C5.12638 19.9102 5.20004 19.7999 5.29289 19.7071L20.2929 4.70708C20.4804 4.51954 20.7348 4.41418 21 4.41418C21.2652 4.41418 21.5196 4.51954 21.7071 4.70708L27.2929 10.2929C27.4804 10.4804 27.5858 10.7348 27.5858 11C27.5858 11.2652 27.4804 11.5195 27.2929 11.7071L12 27Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
  </svg> Pencil icon.'),
    '#description' => t('Add a Pencil icon that can be referenced on each page.'),
    '#default_value' => theme_get_setting('svg_icon_pencil'),
  ];

  $form['icons']['svg_icon_phone'] = [
    '#type' => 'checkbox',
    '#title' => t('<svg id="icon-phone" viewBox="0 0 32 32" aria-labelledby="title-icon-phone"
    aria-describedby="description-icon-phone" role="img" style="width:2rem;height:2rem;display:inline-block;fill:none;">
    <title id="title-icon-phone">Telephone</title>
    <desc id="description-icon-phone">An antique telephone.</desc>
    <path opacity="0.2" d="M11.5595 15.6019C12.5968 17.7226 14.3158 19.4338 16.4412 20.4614C16.5967 20.5351 16.7687 20.567 16.9403 20.554C17.1119 20.541 17.2771 20.4836 17.4198 20.3874L20.5492 18.3006C20.6877 18.2083 20.8469 18.152 21.0126 18.1368C21.1782 18.1215 21.3451 18.1479 21.498 18.2134L27.3526 20.7225C27.5515 20.807 27.7175 20.9538 27.8257 21.1409C27.9339 21.328 27.9783 21.5451 27.9524 21.7596C27.7673 23.2076 27.0608 24.5385 25.9652 25.5031C24.8695 26.4678 23.4598 26.9999 22 27C17.4913 27 13.1673 25.2089 9.97919 22.0208C6.79107 18.8327 5 14.5087 5 10C5.00008 8.54022 5.53224 7.13052 6.49685 6.03485C7.46146 4.93918 8.79237 4.23267 10.2404 4.04763C10.4549 4.02167 10.672 4.06612 10.8591 4.1743C11.0461 4.28248 11.193 4.44852 11.2775 4.6474L13.7888 10.5071C13.8537 10.6587 13.8802 10.824 13.8658 10.9883C13.8514 11.1525 13.7967 11.3107 13.7064 11.4487L11.6268 14.6261C11.5322 14.7691 11.4762 14.9341 11.4644 15.1051C11.4526 15.2762 11.4854 15.4473 11.5595 15.6019V15.6019Z" fill="currentColor"></path>
    <path fill="none" d="M11.5595 15.6019C12.5968 17.7226 14.3158 19.4338 16.4412 20.4614C16.5967 20.5351 16.7687 20.567 16.9403 20.554C17.1119 20.541 17.2771 20.4836 17.4198 20.3874L20.5492 18.3006C20.6877 18.2083 20.8469 18.152 21.0126 18.1368C21.1782 18.1215 21.3451 18.1479 21.498 18.2134L27.3526 20.7225C27.5515 20.807 27.7175 20.9538 27.8257 21.1409C27.9339 21.328 27.9783 21.5451 27.9524 21.7596C27.7673 23.2076 27.0608 24.5385 25.9652 25.5031C24.8695 26.4678 23.4598 26.9999 22 27C17.4913 27 13.1673 25.2089 9.97919 22.0208C6.79107 18.8327 5 14.5087 5 10C5.00008 8.54022 5.53224 7.13052 6.49685 6.03485C7.46146 4.93918 8.79237 4.23267 10.2404 4.04763C10.4549 4.02167 10.672 4.06612 10.8591 4.1743C11.0461 4.28248 11.193 4.44852 11.2775 4.6474L13.7888 10.5071C13.8537 10.6587 13.8802 10.824 13.8658 10.9883C13.8514 11.1525 13.7967 11.3107 13.7064 11.4487L11.6268 14.6261C11.5322 14.7691 11.4762 14.9341 11.4644 15.1051C11.4526 15.2762 11.4854 15.4473 11.5595 15.6019V15.6019Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
  </svg> Phone icon.'),
    '#description' => t('Add a Phone icon that can be referenced on each page.'),
    '#default_value' => theme_get_setting('svg_icon_phone'),
  ];

  $form['icons']['svg_icon_play'] = [
    '#type' => 'checkbox',
    '#title' => t('<svg id="icon-play" viewBox="0 0 32 32" aria-labelledby="title-icon-play" aria-describedby="description-icon-play" role="img" style="width:2rem;height:2rem;display:inline-block;fill:none;">
    <title id="title-icon-play">Play</title>
    <desc id="description-icon-play">A media play button.</desc>
    <path opacity="0.2" d="M16 4C13.6266 4 11.3066 4.70379 9.33316 6.02236C7.35977 7.34094 5.8217 9.21509 4.91345 11.4078C4.0052 13.6005 3.76756 16.0133 4.23058 18.3411C4.6936 20.6689 5.83649 22.8071 7.51472 24.4853C9.19295 26.1635 11.3312 27.3064 13.6589 27.7694C15.9867 28.2324 18.3995 27.9948 20.5922 27.0866C22.7849 26.1783 24.6591 24.6402 25.9776 22.6668C27.2962 20.6935 28 18.3734 28 16C28 14.4241 27.6896 12.8637 27.0866 11.4078C26.4835 9.95189 25.5996 8.62901 24.4853 7.51471C23.371 6.40041 22.0481 5.51649 20.5922 4.91344C19.1363 4.31038 17.5759 4 16 4V4ZM14 20V12L20 16L14 20Z" fill="currentColor"></path>
    <path fill="none" d="M16 28C22.6274 28 28 22.6274 28 16C28 9.37258 22.6274 4 16 4C9.37258 4 4 9.37258 4 16C4 22.6274 9.37258 28 16 28Z" stroke="currentColor" stroke-width="2" stroke-miterlimit="10"></path>
    <path fill="none" d="M20 16L14 12V20L20 16Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
  </svg> Play icon.'),
    '#description' => t('Add a Play icon that can be referenced on each page.'),
    '#default_value' => theme_get_setting('svg_icon_play'),
  ];

  $form['icons']['svg_icon_settings'] = [
    '#type' => 'checkbox',
    '#title' => t('<svg id="icon-settings" viewBox="0 0 32 32" aria-labelledby="title-icon-settings" aria-describedby="description-icon-settings" role="img" style="width:2rem;height:2rem;display:inline-block;fill:none;">
    <title id="title-icon-settings">Settings</title>
    <desc id="description-icon-settings">A single gear.</desc>
    <path opacity="0.2" d="M28.6539 13.0676C28.6183 12.9228 28.5513 12.7876 28.4575 12.6717C28.3638 12.5557 28.2456 12.4619 28.1115 12.3968L26.027 11.3661L25.027 9.63407L25.1766 7.31344C25.1873 7.16473 25.1652 7.01548 25.1116 6.87632C25.0581 6.73716 24.9746 6.61151 24.8669 6.50833C23.4287 5.14406 21.6882 4.1392 19.7876 3.57579C19.6444 3.53417 19.4938 3.52463 19.3465 3.54786C19.1993 3.57108 19.0589 3.6265 18.9355 3.71016L17.0006 4.99998H15.0006L13.0657 3.7101C12.9423 3.62644 12.802 3.57102 12.6547 3.54779C12.5074 3.52455 12.3568 3.53409 12.2136 3.5757C10.313 4.13916 8.57255 5.14402 7.13428 6.50828C7.02665 6.61146 6.9431 6.73711 6.88958 6.87627C6.83605 7.01543 6.81386 7.16468 6.82459 7.31339L6.97418 9.63395L5.97418 11.366L3.88965 12.3967C3.7555 12.4618 3.63734 12.5556 3.54359 12.6716C3.44983 12.7875 3.38279 12.9227 3.34723 13.0674C2.88489 14.9952 2.88491 17.0049 3.34729 18.9326C3.38283 19.0774 3.44985 19.2126 3.5436 19.3285C3.63734 19.4445 3.7555 19.5383 3.88965 19.6034L5.97413 20.6341L6.97413 22.3661L6.82453 24.6867C6.81379 24.8354 6.83597 24.9847 6.88949 25.1239C6.943 25.263 7.02654 25.3887 7.13416 25.4919C8.57242 26.8561 10.3129 27.861 12.2136 28.4244C12.3567 28.466 12.5073 28.4756 12.6546 28.4523C12.8019 28.4291 12.9422 28.3737 13.0656 28.29L15.0005 27.0002H17.0005L18.9354 28.2901C19.0588 28.3738 19.1991 28.4292 19.3464 28.4524C19.4937 28.4756 19.6443 28.4661 19.7875 28.4245C21.6881 27.861 23.4285 26.8562 24.8668 25.4919C24.9744 25.3887 25.058 25.2631 25.1115 25.1239C25.165 24.9848 25.1872 24.8355 25.1765 24.6868L25.0269 22.3662L26.0269 20.6342L28.1114 19.6034C28.2456 19.5384 28.3638 19.4446 28.4575 19.3286C28.5513 19.2127 28.6183 19.0775 28.6539 18.9327C29.1162 17.005 29.1162 14.9953 28.6539 13.0676L28.6539 13.0676ZM16.0006 23.0001C14.6161 23.0001 13.2628 22.5896 12.1116 21.8204C10.9605 21.0512 10.0633 19.958 9.53345 18.6789C9.00364 17.3998 8.86502 15.9923 9.13511 14.6345C9.40521 13.2766 10.0719 12.0293 11.0509 11.0504C12.0298 10.0714 13.2771 9.4047 14.635 9.1346C15.9928 8.86451 17.4003 9.00313 18.6794 9.53294C19.9585 10.0628 21.0517 10.96 21.8209 12.1111C22.5901 13.2623 23.0006 14.6156 23.0006 16.0001C23.0006 17.8566 22.2631 19.6371 20.9504 20.9498C19.6376 22.2626 17.8571 23.0001 16.0006 23.0001V23.0001Z" fill="currentColor"></path>
    <path fill="none" d="M16.0007 23C19.8667 23 23.0007 19.866 23.0007 16C23.0007 12.134 19.8667 9 16.0007 9C12.1347 9 9.00073 12.134 9.00073 16C9.00073 19.866 12.1347 23 16.0007 23Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
    <path fill="none" d="M6.97413 22.3661L6.82451 24.6867C6.81377 24.8355 6.83594 24.9847 6.88946 25.1239C6.94298 25.263 7.02653 25.3887 7.13415 25.4919C8.57243 26.8561 10.3129 27.861 12.2135 28.4244C12.3567 28.466 12.5073 28.4756 12.6546 28.4523C12.8019 28.4291 12.9422 28.3737 13.0656 28.29L15.0005 27.0002H17.0005L18.9354 28.2901C19.0588 28.3738 19.1991 28.4292 19.3464 28.4524C19.4937 28.4756 19.6443 28.4661 19.7875 28.4245C21.6881 27.861 23.4285 26.8562 24.8668 25.4919C24.9744 25.3887 25.058 25.2631 25.1115 25.1239C25.165 24.9848 25.1872 24.8355 25.1765 24.6868L25.0269 22.3663L26.0269 20.6342L28.1114 19.6035C28.2456 19.5384 28.3637 19.4446 28.4575 19.3286C28.5513 19.2127 28.6183 19.0775 28.6539 18.9327C29.1162 17.005 29.1162 14.9953 28.6538 13.0676C28.6183 12.9228 28.5512 12.7876 28.4575 12.6717C28.3637 12.5557 28.2456 12.4619 28.1114 12.3968L26.027 11.3661L25.027 9.63407L25.1766 7.31346C25.1873 7.16475 25.1652 7.0155 25.1116 6.87633C25.0581 6.73717 24.9746 6.61152 24.8669 6.50832C23.4287 5.14407 21.6882 4.13922 19.7876 3.57577C19.6444 3.53416 19.4938 3.52463 19.3465 3.54786C19.1992 3.57108 19.0589 3.6265 18.9355 3.71015L17.0006 4.99997H15.0006L13.0657 3.7101C12.9423 3.62644 12.802 3.57102 12.6547 3.54779C12.5074 3.52456 12.3568 3.53408 12.2136 3.57569C10.313 4.13916 8.57255 5.14402 7.13427 6.50829C7.02665 6.61148 6.9431 6.73713 6.88958 6.87629C6.83605 7.01545 6.81387 7.1647 6.82461 7.31342L6.9742 9.63395L5.9742 11.366L3.88968 12.3967C3.75552 12.4618 3.63736 12.5556 3.5436 12.6716C3.44984 12.7875 3.38279 12.9227 3.34723 13.0675C2.8849 14.9952 2.88491 17.0049 3.34726 18.9326C3.38281 19.0774 3.44985 19.2126 3.5436 19.3285C3.63736 19.4445 3.75552 19.5383 3.88968 19.6034L5.97413 20.6341L6.97413 22.3661Z" stroke="currentColor" stroke-width="2" stroke-miterlimit="10"></path>
  </svg> Settings icon.'),
    '#description' => t('Add a Settings icon that can be referenced on each page.'),
    '#default_value' => theme_get_setting('svg_icon_settings'),
  ];

  $form['icons']['svg_icon_speech'] = [
    '#type' => 'checkbox',
    '#title' => t('<svg id="icon-speech" viewBox="0 0 32 32" aria-labelledby="title-icon-speech" aria-describedby="description-icon-speech" role="img" style="width:2rem;height:2rem;display:inline-block;fill:none;">
    <title id="title-icon-speech">Speech Bubble</title>
    <desc id="description-icon-speech">A speech bubble.</desc>
    <path opacity="0.2" d="M5.6786 22.1248C4.18768 19.6115 3.66554 16.6403 4.21024 13.7692C4.75494 10.8982 6.329 8.32472 8.63685 6.5321C10.9447 4.73947 13.8276 3.85099 16.7442 4.0335C19.6607 4.21601 22.4103 5.45696 24.4767 7.52331C26.5431 9.58967 27.784 12.3393 27.9666 15.2559C28.1491 18.1724 27.2606 21.0553 25.468 23.3632C23.6754 25.671 21.1019 27.2451 18.2309 27.7898C15.3598 28.3345 12.3887 27.8124 9.87532 26.3215L9.87534 26.3214L5.73077 27.5055C5.5593 27.5545 5.37784 27.5568 5.20521 27.512C5.03257 27.4673 4.87504 27.3772 4.74894 27.2511C4.62283 27.125 4.53275 26.9675 4.48802 26.7948C4.44328 26.6222 4.44553 26.4408 4.49452 26.2693L5.67869 22.1247L5.6786 22.1248Z" fill="currentColor"></path>
    <path fill="none" d="M5.6786 22.1248C4.18768 19.6115 3.66554 16.6403 4.21024 13.7692C4.75494 10.8982 6.329 8.32472 8.63685 6.5321C10.9447 4.73947 13.8276 3.85099 16.7442 4.0335C19.6607 4.21601 22.4103 5.45696 24.4767 7.52331C26.5431 9.58967 27.784 12.3393 27.9666 15.2559C28.1491 18.1724 27.2606 21.0553 25.468 23.3632C23.6754 25.671 21.1019 27.2451 18.2309 27.7898C15.3598 28.3345 12.3887 27.8124 9.87532 26.3215L9.87534 26.3214L5.73077 27.5055C5.5593 27.5545 5.37784 27.5568 5.20521 27.512C5.03257 27.4673 4.87504 27.3772 4.74894 27.2511C4.62283 27.125 4.53275 26.9675 4.48802 26.7948C4.44328 26.6222 4.44553 26.4408 4.49452 26.2693L5.67869 22.1247L5.6786 22.1248Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
  </svg> Speech icon.'),
    '#description' => t('Add a Speech icon that can be referenced on each page.'),
    '#default_value' => theme_get_setting('svg_icon_speech'),
  ];

  $form['icons']['svg_icon_star'] = [
    '#type' => 'checkbox',
    '#title' => t('<svg id="icon-star" viewBox="0 0 32 32" aria-labelledby="title-icon-star" aria-describedby="description-icon-star" role="img" style="width:2rem;height:2rem;display:inline-block;fill:none;">
    <title id="title-icon-star">Star</title>
    <desc id="description-icon-star">An outline of a star.</desc>
    <path opacity="0.2" d="M16.5514 23.8416L22.8558 27.8358C23.6617 28.3464 24.6622 27.587 24.4231 26.6463L22.6016 19.481C22.5503 19.2815 22.5564 19.0715 22.6191 18.8752C22.6819 18.6789 22.7987 18.5044 22.9563 18.3715L28.6097 13.6661C29.3525 13.0478 28.9691 11.815 28.0147 11.7531L20.6318 11.2739C20.4329 11.2597 20.2422 11.1893 20.0818 11.0709C19.9214 10.9525 19.7979 10.791 19.7258 10.6051L16.9722 3.67097C16.8974 3.4737 16.7643 3.30387 16.5906 3.18403C16.417 3.06418 16.211 3 16 3C15.789 3 15.583 3.06418 15.4094 3.18403C15.2357 3.30387 15.1026 3.4737 15.0278 3.67097L12.2742 10.6051C12.2021 10.791 12.0786 10.9525 11.9182 11.0709C11.7578 11.1893 11.5671 11.2597 11.3682 11.2739L3.98525 11.7531C3.03087 11.815 2.64746 13.0478 3.3903 13.6661L9.04371 18.3715C9.20126 18.5044 9.31813 18.6789 9.38088 18.8752C9.44362 19.0715 9.4497 19.2815 9.39841 19.481L7.70918 26.126C7.42222 27.2549 8.62287 28.1661 9.58991 27.5534L15.4486 23.8416C15.6134 23.7367 15.8047 23.681 16 23.681C16.1953 23.681 16.3866 23.7367 16.5514 23.8416V23.8416Z" fill="currentColor"></path>
    <path fill="none" d="M16.5514 23.8416L22.8558 27.8358C23.6617 28.3464 24.6622 27.587 24.4231 26.6463L22.6016 19.481C22.5503 19.2815 22.5564 19.0715 22.6191 18.8752C22.6819 18.6789 22.7987 18.5044 22.9563 18.3715L28.6097 13.6661C29.3525 13.0478 28.9691 11.815 28.0147 11.7531L20.6318 11.2739C20.4329 11.2597 20.2422 11.1893 20.0818 11.0709C19.9214 10.9525 19.7979 10.791 19.7258 10.6051L16.9722 3.67097C16.8974 3.4737 16.7643 3.30387 16.5906 3.18403C16.417 3.06418 16.211 3 16 3C15.789 3 15.583 3.06418 15.4094 3.18403C15.2357 3.30387 15.1026 3.4737 15.0278 3.67097L12.2742 10.6051C12.2021 10.791 12.0786 10.9525 11.9182 11.0709C11.7578 11.1893 11.5671 11.2597 11.3682 11.2739L3.98525 11.7531C3.03087 11.815 2.64746 13.0478 3.3903 13.6661L9.04371 18.3715C9.20126 18.5044 9.31813 18.6789 9.38088 18.8752C9.44362 19.0715 9.4497 19.2815 9.39841 19.481L7.70918 26.126C7.42222 27.2549 8.62287 28.1661 9.58991 27.5534L15.4486 23.8416C15.6134 23.7367 15.8047 23.681 16 23.681C16.1953 23.681 16.3866 23.7367 16.5514 23.8416V23.8416Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
  </svg> Star icon.'),
    '#description' => t('Add a Star icon that can be referenced on each page.'),
    '#default_value' => theme_get_setting('svg_icon_star'),
  ];

  $form['icons']['svg_icon_twitter'] = [
    '#type' => 'checkbox',
    '#title' => t('<svg id="icon-twitter" viewBox="0 0 32 32" aria-labelledby="title-icon-twitter" aria-describedby="description-icon-twitter" role="img" style="width:2rem;height:2rem;display:inline-block;fill:none;">
    <title id="title-icon-twitter">Twitter</title>
    <desc id="description-icon-twitter">The logo for the Twitter social media service.</desc>
    <path d="M10.8058 28C21.3723 28 27.1507 19.1521 27.1507 11.4799C27.1507 11.2285 27.1456 10.9784 27.1342 10.7293C28.2558 9.90983 29.2309 8.88693 30 7.72304C28.9707 8.18524 27.8631 8.49649 26.7011 8.63683C27.887 7.91809 28.7978 6.7806 29.2274 5.42487C28.1173 6.09018 26.888 6.57363 25.5798 6.83435C24.5311 5.70587 23.0381 5 21.3863 5C18.2135 5 15.6406 7.6004 15.6406 10.8056C15.6406 11.2614 15.6913 11.7043 15.7893 12.1295C11.0153 11.8871 6.78168 9.57637 3.94866 6.06346C3.45473 6.92125 3.17034 7.91841 3.17034 8.98156C3.17034 10.9958 4.18464 12.7742 5.72694 13.8148C4.78462 13.7855 3.8993 13.5235 3.12512 13.0883C3.12385 13.1125 3.12385 13.1369 3.12385 13.1623C3.12385 15.9745 5.10435 18.3223 7.73261 18.8543C7.25014 18.9873 6.74251 19.0587 6.21833 19.0587C5.84828 19.0587 5.48842 19.0214 5.13843 18.9541C5.86961 21.2606 7.99056 22.9395 10.5051 22.9868C8.53863 24.5444 6.06164 25.4723 3.37034 25.4723C2.90698 25.4723 2.44967 25.4456 2 25.3919C4.54227 27.0386 7.56096 28 10.8058 28Z" fill="currentColor"></path>
  </svg> Twitter icon.'),
    '#description' => t('Add a Twitter icon that can be referenced on each page.'),
    '#default_value' => theme_get_setting('svg_icon_twitter'),
  ];

  $form['icons']['svg_icon_user'] = [
    '#type' => 'checkbox',
    '#title' => t('<svg id="icon-user" viewBox="0 0 32 32" aria-labelledby="title-icon-user" aria-describedby="description-icon-user" role="img" style="width:2rem;height:2rem;display:inline-block;fill:none;">
    <title id="title-icon-user">User</title>
    <desc id="description-icon-user">A silhouette of a person.</desc>
    <path opacity="0.2" d="M16 4C13.5726 4.00002 11.2022 4.73622 9.20189 6.11139C7.20156 7.48656 5.66531 9.43604 4.79597 11.7025C3.92662 13.9689 3.76506 16.4457 4.33261 18.8058C4.90015 21.166 6.17013 23.2985 7.97486 24.9219V24.9217C8.72778 23.4405 9.87609 22.1966 11.2926 21.3279C12.709 20.4592 14.3384 19.9996 16 20C15.0111 20 14.0444 19.7068 13.2222 19.1573C12.3999 18.6079 11.759 17.827 11.3806 16.9134C11.0022 15.9998 10.9031 14.9945 11.0961 14.0245C11.289 13.0546 11.7652 12.1637 12.4645 11.4645C13.1637 10.7652 14.0546 10.289 15.0246 10.0961C15.9945 9.90315 16.9998 10.0022 17.9134 10.3806C18.8271 10.759 19.6079 11.3999 20.1574 12.2221C20.7068 13.0444 21 14.0111 21 15C21 16.3261 20.4732 17.5978 19.5355 18.5355C18.5979 19.4732 17.3261 20 16 20C17.6616 19.9996 19.291 20.4592 20.7074 21.3279C22.1239 22.1966 23.2722 23.4405 24.0251 24.9217C25.8299 23.2984 27.0998 21.1658 27.6674 18.8057C28.2349 16.4456 28.0734 13.9688 27.204 11.7024C26.3347 9.43597 24.7984 7.4865 22.7981 6.11134C20.7978 4.73618 18.4274 4.00001 16 4V4Z" fill="currentColor"></path>
    <path fill="none" d="M16 28C22.6274 28 28 22.6274 28 16C28 9.37258 22.6274 4 16 4C9.37258 4 4 9.37258 4 16C4 22.6274 9.37258 28 16 28Z" stroke="currentColor" stroke-width="2" stroke-miterlimit="10"></path>
    <path fill="none" d="M16 20C18.7614 20 21 17.7614 21 15C21 12.2386 18.7614 10 16 10C13.2386 10 11 12.2386 11 15C11 17.7614 13.2386 20 16 20Z" stroke="currentColor" stroke-width="2" stroke-miterlimit="10"></path>
    <path fill="none" d="M7.97485 24.9218C8.72812 23.4408 9.8765 22.1971 11.2929 21.3284C12.7093 20.4598 14.3384 20 16 20C17.6615 20 19.2906 20.4598 20.707 21.3284C22.1234 22.1971 23.2718 23.4407 24.0251 24.9217" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
  </svg> User icon.'),
    '#description' => t('Add a User icon that can be referenced on each page.'),
    '#default_value' => theme_get_setting('svg_icon_user'),
  ];

  $form['icons']['svg_icon_vimeo'] = [
    '#type' => 'checkbox',
    '#title' => t('<svg id="icon-vimeo" viewBox="0 0 32 32" aria-labelledby="title-icon-vimeo" aria-describedby="description-icon-vimeo" role="img" style="width:2rem;height:2rem;display:inline-block;">
    <title id="title-icon-vimeo">Vimeo</title>
    <desc id="description-icon-vimeo">The logo for the Vimeo video sharing service.</desc>
    <path d="M1709 518q-10 236-332 651-333 431-562 431-142 0-240-263-44-160-132-482-72-262-157-262-18 0-127 76l-77-98q24-21 108-96.5t130-115.5q156-138 241-146 95-9 153 55.5t81 203.5q44 287 66 373 55 249 120 249 51 0 154-161 101-161 109-246 13-139-109-139-57 0-121 26 120-393 459-382 251 8 236 326z" fill="currentColor"></path>
  </svg> Vimeo icon.'),
    '#description' => t('Add a Vimeo icon that can be referenced on each page.'),
    '#default_value' => theme_get_setting('svg_icon_vimeo'),
  ];

  $form['icons']['svg_icon_youtube'] = [
    '#type' => 'checkbox',
    '#title' => t('<svg id="icon-youtube" viewBox="0 0 32 32" aria-labelledby="title-icon-youtube" aria-describedby="description-icon-youtube" role="img" style="width:2rem;height:2rem;display:inline-block;fill:none;">
    <title id="title-icon-youtube">Youtube</title>
    <desc id="description-icon-youtube">The logo for the YouTube video sharing service.</desc>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M25.9119 6.96157L25.9203 6.96228L25.9288 6.96293C26.999 7.04537 27.5663 7.24878 27.8788 7.43524C28.1353 7.58822 28.3614 7.81019 28.5771 8.29955C28.8209 8.85259 29.0291 9.70446 29.1608 11.0405C29.2911 12.3622 29.3333 13.998 29.3333 16.0501C29.3333 18.1017 29.2911 19.747 29.1606 21.0803C29.0286 22.4289 28.8197 23.2954 28.5736 23.8587C28.3547 24.3597 28.1301 24.5733 27.8922 24.7133C27.5998 24.8855 27.0524 25.0786 25.9968 25.1328L25.9911 25.1331L25.9854 25.1335C21.2938 25.3945 10.7602 25.395 6.04416 25.1351C4.9914 25.0513 4.43103 24.8498 4.12116 24.6649C3.86474 24.5119 3.6386 24.2899 3.42288 23.8006C3.17908 23.2476 2.97088 22.3957 2.83919 21.0597C2.7089 19.738 2.66667 18.1021 2.66667 16.0501C2.66667 13.998 2.7089 12.3622 2.83919 11.0405C2.97088 9.70446 3.17908 8.85259 3.42288 8.29955C3.6386 7.81019 3.86474 7.58822 4.12116 7.43524C4.43367 7.24878 5.00097 7.04537 6.07119 6.96293L6.07966 6.96228L6.08812 6.96157C10.7407 6.57331 21.2593 6.57331 25.9119 6.96157ZM0 16.0501C0 24.3282 0.666667 27.3992 5.86667 27.7997C10.6667 28.0668 21.3333 28.0668 26.1333 27.7997C31.3333 27.5327 32 24.3282 32 16.0501C32 7.77191 31.3333 4.70097 26.1333 4.30042C21.3333 3.89986 10.6667 3.89986 5.86667 4.30042C0.666667 4.70097 0 7.77191 0 16.0501ZM13.9296 20.4247C13.0431 20.8686 12 20.223 12 19.2305V12.8697C12 11.8772 13.0431 11.2316 13.9296 11.6755L20.2815 14.8559C21.2643 15.3479 21.2643 16.7523 20.2815 17.2443L13.9296 20.4247Z" fill="currentColor"></path>
  </svg> Youtube icon.'),
    '#description' => t('Add a Youtube icon that can be referenced on each page.'),
    '#default_value' => theme_get_setting('svg_icon_youtube'),
  ];

  // extras.
  $form['extra'] = [
    '#type' => 'details',
    '#title' => t('Extra Settings'),
    '#group' => 'clf',
  ];

  $form['extra']['clf_noindex'] = [
    '#type' => 'checkbox',
    '#title' => t('<strong>Do <em>not</em> allow the site to be indexed</strong>'),
    '#prefix' => t('<h2>Additional miscellaneous options</h2>'),
    '#description' => t('If this is <strong>not</strong> a production website, this checkbox will add a "nofollow" meta tag to all pages.'),
    '#default_value' => theme_get_setting('clf_noindex'),
  ];

  $form['extra']['clf_fontawesome'] = [
    '#type' => 'checkbox',
    '#title' => t('<strong>Use Fontawesome 4.7.x</strong>'),
    '#description' => t('Add all Fontawesome icon fonts to the site. <a href=":url" target="_blank">Read the documentation</a>.<br /><small>*Note: unless you\'re using the minimal CLF, version 3.x of the fontawesome library is included with the CLF package. Before enabling this option, please consider using a more efficient alternative, such as SVGs or a generating a free custom icon font through a service like <a href=":url_fontello" target="_blank">Fontello</a> or <a href=":url_icomoon" target="_blank">Icomoon</a>.</small>', [
      ':url' => 'http://fontawesome.io/icons/',
      ':url_fontello' => 'http://fontello.com',
      ':url_icomoon' => 'https://icomoon.io/app',
    ]),
    '#default_value' => theme_get_setting('clf_fontawesome'),
  ];

  if ($file_id = $form_state->getValue(['unit_signature', '0'])) {
    $file = \Drupal::entityTypeManager()->getStorage('file')->load($file_id);
    $file->setPermanent();
    $file->save();
  }
}
