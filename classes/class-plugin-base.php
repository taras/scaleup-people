<?php
class ScaleUp_People_Plugin {

  private static $_this;

  private static $_people;

  private static $_person_post_type;

  public static function this() {
    return self::$_this;
  }

  function __construct() {

    self::$_this              = $this;
    self::$_person_post_type  = apply_filters( 'scaleup_people_plugin_peopl_post_type', 'person' );
    self::$_people            = new ScaleUp_People( self::$_person_post_type );

    add_action( 'init', array( $this, 'admin_init' ) );
    add_action( 'admin_init', array( $this, 'admin_init' ) );
    add_action( 'after_setup_theme', array( $this, 'after_setup_theme') );
    add_action( 'acf_save_post', array( $this, 'acf_save_post' ), 20 );
  }

  function admin_init() {
    $this->register_field_group();
  }

  function after_setup_theme() {
    if ( function_exists( 'register_scaleup_template' ) ) {
      // you can register as many templates as you need. For example:
      register_scaleup_template( SCALEUP_PEOPLE_DIR . '/templates', '/people.php' );
      register_scaleup_template( SCALEUP_PEOPLE_DIR . '/templates', '/person.php' );
    }
  }

  function register_field_group() {
    if ( function_exists( "register_field_group" ) ) {
      $post_type = self::$_person_post_type;
      register_field_group( array(
                                 'id' => 'scaleup_person_fields',
                                 'title' => 'Person Fields',
                                 'fields' =>
                                 array(
                                   0 =>
                                   array(
                                     'key' => "$post_type.additionalName",
                                     'label' => 'Middle Name',
                                     'name' => 'additionalName',
                                     'type' => 'text',
                                     'order_no' => 0,
                                     'instructions' => 'An additional name for a Person, can be used for a middle name.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   1 =>
                                   array(
                                     'key' => "$post_type.address",
                                     'label' => 'Address',
                                     'name' => 'address',
                                     'type' => 'text',
                                     'order_no' => 1,
                                     'instructions' => 'Physical address of the item.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   2 =>
                                   array(
                                     'key' => "$post_type.affiliation",
                                     'label' => 'Affiliation ',
                                     'name' => 'affiliation',
                                     'type' => 'text',
                                     'order_no' => 2,
                                     'instructions' => 'An organization that this person is affiliated with. For example, a school/university, a club, or a team.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   3 =>
                                   array(
                                     'key' => "$post_type.alumniOf",
                                     'label' => 'Alma Mater',
                                     'name' => 'alumniOf',
                                     'type' => 'text',
                                     'order_no' => 3,
                                     'instructions' => 'An educational organizations that the person is an alumni of.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   4 =>
                                   array(
                                     'key' => "$post_type.award",
                                     'label' => 'Award',
                                     'name' => 'award',
                                     'type' => 'text',
                                     'order_no' => 4,
                                     'instructions' => 'An award won by this person or for this creative work.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   5 =>
                                   array(
                                     'key' => "$post_type.awards",
                                     'label' => 'Awards',
                                     'name' => 'awards',
                                     'type' => 'text',
                                     'order_no' => 5,
                                     'instructions' => 'Awards won by this person or for this creative work. (legacy spelling; see singular form, award)
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   6 =>
                                   array(
                                     'key' => "$post_type.birthDate",
                                     'label' => 'Birth Date ',
                                     'name' => 'birthDate',
                                     'type' => 'number',
                                     'order_no' => 6,
                                     'instructions' => 'Date of birth.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                   ),
                                   7 =>
                                   array(
                                     'key' => "$post_type.brand",
                                     'label' => 'Brand',
                                     'name' => 'brand',
                                     'type' => 'text',
                                     'order_no' => 7,
                                     'instructions' => 'The brand(s) associated with a product or service, or the brand(s) maintained by an organization or business person.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   8 =>
                                   array(
                                     'key' => "$post_type.children",
                                     'label' => 'Children ',
                                     'name' => 'children',
                                     'type' => 'text',
                                     'order_no' => 8,
                                     'instructions' => 'A child of the person.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   9 =>
                                   array(
                                     'key' => "$post_type.colleague",
                                     'label' => 'Colleague	',
                                     'name' => 'colleague',
                                     'type' => 'text',
                                     'order_no' => 9,
                                     'instructions' => 'A colleague of the person.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   10 =>
                                   array(
                                     'key' => "$post_type.colleagues",
                                     'label' => 'Colleagues	',
                                     'name' => 'colleagues',
                                     'type' => 'text',
                                     'order_no' => 10,
                                     'instructions' => 'A colleague of the person (legacy spelling; see singular form, colleague).
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   11 =>
                                   array(
                                     'key' => "$post_type.contactPoint",
                                     'label' => 'Contact Point ',
                                     'name' => 'contactPoint',
                                     'type' => 'text',
                                     'order_no' => 11,
                                     'instructions' => 'A contact point for a person or organization.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   12 =>
                                   array(
                                     'key' => "$post_type.contactPoints",
                                     'label' => 'Contact Points	',
                                     'name' => 'contactPoints',
                                     'type' => 'text',
                                     'order_no' => 12,
                                     'instructions' => 'A contact point for a person or organization (legacy spelling; see singular form, contactPoint).
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   13 =>
                                   array(
                                     'key' => "$post_type.deathDate",
                                     'label' => 'Death Date	',
                                     'name' => 'deathDate',
                                     'type' => 'number',
                                     'order_no' => 13,
                                     'instructions' => 'Date of death.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                   ),
                                   14 =>
                                   array(
                                     'key' => "$post_type.duns",
                                     'label' => 'DUNS Number ',
                                     'name' => 'duns',
                                     'type' => 'text',
                                     'order_no' => 14,
                                     'instructions' => 'The Dun & Bradstreet DUNS number for identifying an organization or business person.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   15 =>
                                   array(
                                     'key' => "$post_type.email",
                                     'label' => 'Email ',
                                     'name' => 'email',
                                     'type' => 'text',
                                     'order_no' => 15,
                                     'instructions' => 'Email address.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   16 =>
                                   array(
                                     'key' => "$post_type.familyName",
                                     'label' => 'Last Name ',
                                     'name' => 'familyName',
                                     'type' => 'text',
                                     'order_no' => 16,
                                     'instructions' => 'Family name. In the U.S., the last name of an Person. This can be used along with givenName instead of the Name property.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   17 =>
                                   array(
                                     'key' => "$post_type.faxNumber",
                                     'label' => 'Fax Number',
                                     'name' => 'faxNumber',
                                     'type' => 'text',
                                     'order_no' => 17,
                                     'instructions' => 'The fax number.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   18 =>
                                   array(
                                     'key' => "$post_type.follows",
                                     'label' => 'Follows',
                                     'name' => 'follows',
                                     'type' => 'text',
                                     'order_no' => 18,
                                     'instructions' => 'The most generic uni-directional social relation.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   19 =>
                                   array(
                                     'key' => "$post_type.gender",
                                     'label' => 'Gender',
                                     'name' => 'gender',
                                     'type' => 'text',
                                     'order_no' => 19,
                                     'instructions' => 'Gender of the person.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   20 =>
                                   array(
                                     'key' => "$post_type.givenName",
                                     'label' => 'First Name ',
                                     'name' => 'givenName',
                                     'type' => 'text',
                                     'order_no' => 20,
                                     'instructions' => 'Given name. In the U.S., the first name of a Person. This can be used along with familyName instead of the Name property.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   21 =>
                                   array(
                                     'key' => "$post_type.globalLocationNumber",
                                     'label' => ' Global Location Number',
                                     'name' => 'globalLocationNumber',
                                     'type' => 'text',
                                     'order_no' => 21,
                                     'instructions' => 'The Global Location Number (GLN, sometimes also referred to as International Location Number or ILN) of the respective organization, person, or place. The GLN is a 13-digit number used to identify parties and physical locations.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   22 =>
                                   array(
                                     'key' => "$post_type.hasPos",
                                     'label' => 'Points-of-Sales',
                                     'name' => 'hasPos',
                                     'type' => 'text',
                                     'order_no' => 22,
                                     'instructions' => 'Points-of-Sales operated by the organization or person.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   23 =>
                                   array(
                                     'key' => "$post_type.homeLocation",
                                     'label' => 'Residence Location 	',
                                     'name' => 'homeLocation',
                                     'type' => 'text',
                                     'order_no' => 23,
                                     'instructions' => 'A contact location for a person\'s residence.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   24 =>
                                   array(
                                     'key' => "$post_type.honorificPrefix",
                                     'label' => 'Name Prefix ',
                                     'name' => 'honorificPrefix',
                                     'type' => 'text',
                                     'order_no' => 24,
                                     'instructions' => 'An honorific prefix preceding a Person\'s name such as Dr/Mrs/Mr.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   25 =>
                                   array(
                                     'key' => "$post_type.honorificSuffix",
                                     'label' => 'Name Suffix ',
                                     'name' => 'honorificSuffix',
                                     'type' => 'text',
                                     'order_no' => 25,
                                     'instructions' => 'An honorific suffix preceding a Person\'s name such as M.D. /PhD/MSCSW.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   26 =>
                                   array(
                                     'key' => "$post_type.interactionCount",
                                     'label' => 'Interaction Count ',
                                     'name' => 'interactionCount',
                                     'type' => 'text',
                                     'order_no' => 26,
                                     'instructions' => 'A count of a specific user interactions with this item—for example, 20 UserLikes, 5 UserComments, or 300 UserDownloads. The user interaction type should be one of the sub types of UserInteraction.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   27 =>
                                   array(
                                     'key' => "$post_type.isicV4",
                                     'label' => 'ISIC Code ',
                                     'name' => 'isicV4',
                                     'type' => 'text',
                                     'order_no' => 27,
                                     'instructions' => 'The International Standard of Industrial Classification of All Economic Activities (ISIC), Revision 4 code for a particular organization, business person, or place.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   28 =>
                                   array(
                                     'key' => "$post_type.jobTitle",
                                     'label' => 'Job Title ',
                                     'name' => 'jobTitle',
                                     'type' => 'text',
                                     'order_no' => 28,
                                     'instructions' => 'The job title of the person (for example, Financial Manager).
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   29 =>
                                   array(
                                     'key' => "$post_type.knows",
                                     'label' => 'Knows ',
                                     'name' => 'knows',
                                     'type' => 'text',
                                     'order_no' => 29,
                                     'instructions' => 'The most generic bi-directional social/work relation.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   30 =>
                                   array(
                                     'key' => "$post_type.makesOffer",
                                     'label' => 'Offering',
                                     'name' => 'makesOffer',
                                     'type' => 'text',
                                     'order_no' => 30,
                                     'instructions' => 'A pointer to products or services offered by the organization or person.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   31 =>
                                   array(
                                     'key' => "$post_type.memberOf",
                                     'label' => 'Member Of ',
                                     'name' => 'memberOf',
                                     'type' => 'text',
                                     'order_no' => 31,
                                     'instructions' => 'An organization to which the person belongs.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   32 =>
                                   array(
                                     'key' => "$post_type.naics",
                                     'label' => 'NAICS code',
                                     'name' => 'naics',
                                     'type' => 'text',
                                     'order_no' => 32,
                                     'instructions' => 'The North American Industry Classification System (NAICS) code for a particular organization or business person.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   33 =>
                                   array(
                                     'key' => "$post_type.nationality",
                                     'label' => 'Nationality',
                                     'name' => 'nationality',
                                     'type' => 'text',
                                     'order_no' => 33,
                                     'instructions' => 'Nationality of the person.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   34 =>
                                   array(
                                     'key' => "$post_type.owns",
                                     'label' => 'Owns',
                                     'name' => 'owns',
                                     'type' => 'text',
                                     'order_no' => 34,
                                     'instructions' => 'Products owned by the organization or person.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   35 =>
                                   array(
                                     'key' => "$post_type.parent",
                                     'label' => 'Parent',
                                     'name' => 'parent',
                                     'type' => 'text',
                                     'order_no' => 35,
                                     'instructions' => 'A parent of this person.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   36 =>
                                   array(
                                     'key' => "$post_type.parents",
                                     'label' => 'Parents',
                                     'name' => 'parents',
                                     'type' => 'text',
                                     'order_no' => 36,
                                     'instructions' => 'A parents of the person (legacy spelling; see singular form, parent).
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   37 =>
                                   array(
                                     'key' => "$post_type.performerIn",
                                     'label' => 'Performing In ',
                                     'name' => 'performerIn',
                                     'type' => 'text',
                                     'order_no' => 37,
                                     'instructions' => 'Event that this person is a performer or participant in.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   38 =>
                                   array(
                                     'key' => "$post_type.Relatives",
                                     'label' => 'Relatives ',
                                     'name' => 'relatedTo',
                                     'type' => 'text',
                                     'order_no' => 38,
                                     'instructions' => 'The most generic familial relation.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   39 =>
                                   array(
                                     'key' => "$post_type.seeks",
                                     'label' => 'Looking For ',
                                     'name' => 'seeks',
                                     'type' => 'text',
                                     'order_no' => 39,
                                     'instructions' => 'A pointer to products or services sought by the organization or person (demand).
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   40 =>
                                   array(
                                     'key' => "$post_type.sibling",
                                     'label' => 'Sibling',
                                     'name' => 'sibling',
                                     'type' => 'text',
                                     'order_no' => 40,
                                     'instructions' => 'A sibling of the person.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   41 =>
                                   array(
                                     'key' => "$post_type.siblings",
                                     'label' => 'Siblings	',
                                     'name' => 'siblings',
                                     'type' => 'text',
                                     'order_no' => 41,
                                     'instructions' => 'A sibling of the person (legacy spelling; see singular form, sibling).
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   42 =>
                                   array(
                                     'key' => "$post_type.spouse",
                                     'label' => 'Spouse',
                                     'name' => 'spouse',
                                     'type' => 'text',
                                     'order_no' => 42,
                                     'instructions' => 'The person\'s spouse.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   43 =>
                                   array(
                                     'key' => "$post_type.taxId",
                                     'label' => 'Tax ID',
                                     'name' => 'taxId',
                                     'type' => 'text',
                                     'order_no' => 43,
                                     'instructions' => 'The Tax / Fiscal ID of the organization or person, e.g. the TIN in the US or the CIF/NIF in Spain.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   44 =>
                                   array(
                                     'key' => "$post_type.phoneNumber",
                                     'label' => 'Phone Number ',
                                     'name' => 'telephone',
                                     'type' => 'text',
                                     'order_no' => 44,
                                     'instructions' => 'The telephone number.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   45 =>
                                   array(
                                     'key' => "$post_type.vatId",
                                     'label' => 'Vat ID',
                                     'name' => 'vatId',
                                     'type' => 'text',
                                     'order_no' => 45,
                                     'instructions' => 'The Value-added Tax ID of the organisation or person.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   46 =>
                                   array(
                                     'key' => "$post_type.workLocation",
                                     'label' => 'Work Location ',
                                     'name' => 'workLocation',
                                     'type' => 'text',
                                     'order_no' => 46,
                                     'instructions' => 'A contact location for a person\'s place of work.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                   47 =>
                                   array(
                                     'key' => "$post_type.worksFor",
                                     'label' => 'Employment ',
                                     'name' => 'worksFor',
                                     'type' => 'text',
                                     'order_no' => 47,
                                     'instructions' => 'Organizations that the person works for.
	',
                                     'required' => 0,
                                     'conditional_logic' =>
                                     array(
                                       'status' => 0,
                                       'rules' =>
                                       array(
                                         0 =>
                                         array(
                                           'field' => 'null',
                                           'operator' => '==',
                                         ),
                                       ),
                                       'allorany' => 'all',
                                     ),
                                     'default_value' => '',
                                     'formatting' => 'none',
                                   ),
                                 ),
                                 'location' =>
                                 array(
                                   'rules' =>
                                   array(
                                     0 =>
                                     array(
                                       'param' => 'post_type',
                                       'operator' => '==',
                                       'value' => 'person',
                                       'order_no' => 0,
                                     ),
                                   ),
                                   'allorany' => 'all',
                                 ),
                                 'options' =>
                                 array(
                                   'position' => 'normal',
                                   'layout' => 'no_box',
                                   'hide_on_screen' =>
                                   array(),
                                 ),
                                 'menu_order' => 0,
                            ) );
    }

  }

  /**
   * Callback for acf_save_post hook. Adds title and slug to people.
   *
   * @param bool $post_id
   */
  static function acf_save_post( $post_id = false ) {

    // sanity check to make sure that we're only doing work for comedians
    if ( get_post_type( $post_id ) != self::$_person_post_type ) return;

    $given_name   = get_field( 'givenName', $post_id );
    $middle_name  = get_field( 'additionalName', $post_id );
    $family_name  = get_field( 'familyName', $post_id );

    $name = $given_name;
    if ( $middle_name )
      $name .= " $middle_name";
    $name .= " $family_name";

    $where = array( 'ID' => $post_id );
    $slug = sanitize_title( $name );

    global $wpdb;
    $wpdb->update( $wpdb->posts, array( 'post_title' => $name, 'post_name' => $slug ), $where );

  }

}

