<?php
/*
Plugin Name: Local Business Microdata Widget
Plugin URI: http://mywpcms.com/local-business-microdata-widget/
Description: A widget that displays business contact info with microdata markup for the Local Business type from Schema.org.
Version: 0.3.0
Author: James Maabadi
Author URI: https://plus.google.com/u/0/+JamesMaabadi
License: GPL2
*/

// Prevent direct access to files
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Set up i18n
add_action( 'plugins_loaded', 'lbm_i18n' );

function lbm_i18n() {

	/* Load the translation of the plugin. */
	load_plugin_textdomain( 'lbmw', false, basename( dirname( __FILE__ ) ) . '/languages' );
}


// Register the Widget (mywpcms_local_microdata_widget)
add_action('widgets_init', create_function('', 'return register_widget("mywpcms_local_microdata_widget");' ) );

class mywpcms_local_microdata_widget extends WP_Widget {
	// constructor
	function mywpcms_local_microdata_widget() {
		parent::WP_Widget(
			false, 
			$name = __( 'Local Business Microdata', 'lbmw' ) ,
			array( 'description' => __( 'Display business contact info with microdata as a widget', 'lbmw' ), )
		);
	}

	// widget form creation
	function form($instance) {
		// Check values
		if( $instance) {
			$title=esc_attr($instance['title']);
			$lbm_company_type=esc_attr($instance['lbm_company_type']);

			$lbm_company_name=esc_attr($instance['lbm_company_name']);
			$lbm_company_desc=esc_attr($instance['lbm_company_desc']);

			$lbm_company_phone=esc_attr($instance['lbm_company_phone']);
			$lbm_company_fax=esc_attr($instance['lbm_company_fax']);

			$lbm_company_email=esc_attr($instance['lbm_company_email']);
			$lbm_company_website=esc_attr($instance['lbm_company_website']);

			$lbm_company_street=esc_attr($instance['lbm_company_street']);
			$lbm_company_city=esc_attr($instance['lbm_company_city']);
			$lbm_company_state=esc_attr($instance['lbm_company_state']);
			$lbm_company_zip=esc_attr($instance['lbm_company_zip']);
			$lbm_company_country=esc_attr($instance['lbm_company_country']);
			$lbm_after_address=esc_attr($instance['lbm_after_address']);

			$lbm_company_lat=esc_attr($instance['lbm_company_lat']);
			$lbm_company_long=esc_attr($instance['lbm_company_long']);

			$lbm_open_hours_1_Su=esc_attr($instance['lbm_open_hours_1_Su']);
			$lbm_open_hours_1_Mo=esc_attr($instance['lbm_open_hours_1_Mo']);
			$lbm_open_hours_1_Tu=esc_attr($instance['lbm_open_hours_1_Tu']);
			$lbm_open_hours_1_We=esc_attr($instance['lbm_open_hours_1_We']);
			$lbm_open_hours_1_Th=esc_attr($instance['lbm_open_hours_1_Th']);
			$lbm_open_hours_1_Fr=esc_attr($instance['lbm_open_hours_1_Fr']);
			$lbm_open_hours_1_Sa=esc_attr($instance['lbm_open_hours_1_Sa']);
			$lbm_open_hours_1_open=esc_attr($instance['lbm_open_hours_1_open']);
			$lbm_open_hours_1_close=esc_attr($instance['lbm_open_hours_1_close']);

			$lbm_open_hours_2_Su=esc_attr($instance['lbm_open_hours_2_Su']);
			$lbm_open_hours_2_Mo=esc_attr($instance['lbm_open_hours_2_Mo']);
			$lbm_open_hours_2_Tu=esc_attr($instance['lbm_open_hours_2_Tu']);
			$lbm_open_hours_2_We=esc_attr($instance['lbm_open_hours_2_We']);
			$lbm_open_hours_2_Th=esc_attr($instance['lbm_open_hours_2_Th']);
			$lbm_open_hours_2_Fr=esc_attr($instance['lbm_open_hours_2_Fr']);
			$lbm_open_hours_2_Sa=esc_attr($instance['lbm_open_hours_2_Sa']);
			$lbm_open_hours_2_open=esc_attr($instance['lbm_open_hours_2_open']);
			$lbm_open_hours_2_close=esc_attr($instance['lbm_open_hours_2_close']);

			$lbm_text_before=esc_attr($instance['lbm_text_before']);
			$lbm_text_after=esc_attr($instance['lbm_text_after']);

			$lbm_display_name=esc_attr($instance['lbm_display_name']);
			$lbm_display_desc=esc_attr($instance['lbm_display_desc']);
			$lbm_display_phone=esc_attr($instance['lbm_display_phone']);
			$lbm_display_email=esc_attr($instance['lbm_display_email']);
			$lbm_display_website=esc_attr($instance['lbm_display_website']);
			$lbm_display_address=esc_attr($instance['lbm_display_address']);
			$lbm_display_hours=esc_attr($instance['lbm_display_hours']);

			$lbm_payment_accepted_cash=esc_attr($instance['lbm_payment_accepted_cash']);
			$lbm_payment_accepted_check=esc_attr($instance['lbm_payment_accepted_check']);
			$lbm_payment_accepted_credit=esc_attr($instance['lbm_payment_accepted_credit']);
			$lbm_payment_accepted_invoice=esc_attr($instance['lbm_payment_accepted_invoice']);
			$lbm_payment_accepted_paypal=esc_attr($instance['lbm_payment_accepted_paypal']);
			$lbm_display_payment=esc_attr($instance['lbm_display_payment']);

		} else {
			$title='';
			$lbm_company_type='';

			$lbm_company_name='';
			$lbm_company_desc='';

			$lbm_company_phone='';
			$lbm_company_fax='';

			$lbm_company_email='';
			$lbm_company_website='';

			$lbm_company_street='';
			$lbm_company_city='';
			$lbm_company_state='';
			$lbm_company_zip='';
			$lbm_company_country='';
			$lbm_after_address='';

			$lbm_company_lat='';
			$lbm_company_long='';

			$lbm_open_hours_1_Su='';
			$lbm_open_hours_1_Mo='';
			$lbm_open_hours_1_Tu='';
			$lbm_open_hours_1_We='';
			$lbm_open_hours_1_Th='';
			$lbm_open_hours_1_Fr='';
			$lbm_open_hours_1_Sa='';
			$lbm_open_hours_1_open='';
			$lbm_open_hours_1_close='';

			$lbm_open_hours_2_Su='';
			$lbm_open_hours_2_Mo='';
			$lbm_open_hours_2_Tu='';
			$lbm_open_hours_2_We='';
			$lbm_open_hours_2_Th='';
			$lbm_open_hours_2_Fr='';
			$lbm_open_hours_2_Sa='';
			$lbm_open_hours_2_open='';
			$lbm_open_hours_2_close='';

			$lbm_text_before='';
			$lbm_text_after='';

			$lbm_display_name='';
			$lbm_display_desc='';
			$lbm_display_phone='';
			$lbm_display_email='';
			$lbm_display_website='';
			$lbm_display_address='';
			$lbm_display_hours='';

			$lbm_payment_accepted_cash='';
			$lbm_payment_accepted_check='';
			$lbm_payment_accepted_credit='';
			$lbm_payment_accepted_invoice='';
			$lbm_payment_accepted_paypal='';
			$lbm_display_payment='';

		}

		$localbusiness_types = array(
			'LocalBusiness'               => 'Local Business',
			'AnimalShelter'               => 'Animal Shelter',
			'AutomotiveBusiness'          => 'Automotive Business',
			'AutoBodyShop'                => '--Auto Body Shop',
			'AutoDealer'                  => '--Auto Dealer',
			'AutoPartsStore'              => '--Auto Parts Store',
			'AutoRental'                  => '--Auto Rental',
			'AutoRepair'                  => '--Auto Repair',
			'AutoWash'                    => '--Auto Wash',
			'GasStation'                  => '--Gas Station',
			'MotorcycleDealer'            => '--Motorcycle Dealer',
			'MotorcycleRepair'            => '--Motorcycle Repair',
			'ChildCare'                   => 'Child Care',
			'DryCleaningOrLaundry'        => 'Dry Cleaning Or Laundry',
			'EmergencyService'            => 'Emergency Service',
			'FireStation'                 => '--Fire Station',
			'Hospital'                    => '--Hospital',
			'PoliceStation'               => '--Police Station',
			'EmploymentAgency'            => 'Employment Agency',
			'EntertainmentBusiness'       => 'Entertainment Business',
			'AdultEntertainment'          => '--Adult Entertainment',
			'AmusementPark'               => '--Amusement Park',
			'ArtGallery'                  => '--Art Gallery',
			'Casino'                      => '--Casino',
			'ComedyClub'                  => '--Comedy Club',
			'MovieTheater'                => '--Movie Theater',
			'NightClub'                   => '--Night Club',
			'FinancialService'            => 'Financial Service',
			'AccountingService'           => '--Accounting Service',
			'AutomatedTeller'             => '--Automated Teller',
			'BankOrCreditUnion'           => '--Bank Or CreditUnion',
			'InsuranceAgency'             => '--Insurance Agency',
			'FoodEstablishment'           => 'Food Establishment',
			'Bakery'                      => '--Bakery',
			'BarOrPub'                    => '--Bar Or Pub',
			'Brewery'                     => '--Brewery',
			'CafeOrCoffeeShop'            => '--Cafe Or Coffee Shop',
			'FastFoodRestaurant'          => '--Fast Food Restaurant',
			'IceCreamShop'                => '--Ice Cream Shop',
			'Restaurant'                  => '--Restaurant',
			'Winery'                      => '--Winery',
			'GovernmentOffice'            => 'Government Office',
			'PostOffice'                  => '--Post Office',
			'HealthAndBeautyBusiness'     => 'Health And Beauty Business',
			'BeautySalon'                 => '--Beauty Salon',
			'DaySpa'                      => '--Day Spa',
			'HairSalon'                   => '--Hair Salon',
			'HealthClub'                  => '--Health Club',
			'NailSalon'                   => '--Nail Salon',
			'TattooParlor'                => '--Tattoo Parlor',
			'HomeAndConstructionBusiness' => 'Home And Construction Business',
			'Electrician'                 => '--Electrician',
			'GeneralContractor'           => '--General Contractor',
			'HVACBusiness'                => '--HVAC Business',
			'HousePainter'                => '--House Painter',
			'Locksmith'                   => '--Locksmith',
			'MovingCompany'               => '--Moving Company',
			'Plumber'                     => '--Plumber',
			'RoofingContractor'           => '--Roofing Contractor',
			'InternetCafe'                => 'Internet Cafe',
			'Library'                     => 'Library',
			'LodgingBusiness'             => 'Lodging Business',
			'BedAndBreakfast'             => '--Bed And Breakfast',
			'Hostel'                      => '--Hostel',
			'Hotel'                       => '--Hotel',
			'Motel'                       => '--Motel',
			'MedicalOrganization'         => 'Medical Organization',
			'Dentist'                     => '--Dentist',
			'DiagnosticLab'               => '--Diagnostic Lab',
			'Hospital'                    => '--Hospital',
			'MedicalClinic'               => '--Medical Clinic',
			'Optician'                    => '--Optician',
			'Pharmacy'                    => '--Pharmacy',
			'Physician'                   => '--Physician',
			'VeterinaryCare'              => '--Veterinary Care',
			'ProfessionalService'         => 'Professional Service',
			'AccountingService'           => '--Accounting Service',
			'Attorney'                    => '--Attorney',
			'Dentist'                     => '--Dentist',
			'Electrician'                 => '--Electrician',
			'GeneralContractor'           => '--General Contractor',
			'HousePainter'                => '--House Painter',
			'Locksmith'                   => '--Locksmith',
			'Notary'                      => '--Notary',
			'Plumber'                     => '--Plumber',
			'RoofingContractor'           => '--Roofing Contractor',
			'RadioStation'                => 'Radio Station',
			'RealEstateAgent'             => 'Real Estate Agent',
			'RecyclingCenter'             => 'Recycling Center',
			'SelfStorage'                 => 'Self Storage',
			'ShoppingCenter'              => 'Shopping Center',
			'SportsActivityLocation'      => 'Sports Activity Location',
			'BowlingAlley'                => '--Bowling Alley',
			'ExerciseGym'                 => '--Exercise Gym',
			'GolfCourse'                  => '--Golf Course',
			'HealthClub'                  => '--Health Club',
			'PublicSwimmingPool'          => '--Public Swimming Pool',
			'SkiResort'                   => '--Ski Resort',
			'SportsClub'                  => '--Sports Club',
			'StadiumOrArena'              => '--Stadium Or Arena',
			'TennisComplex'               => '--Tennis Complex',
			'Store'                       => 'Store',
			'AutoPartsStore'              => '--Auto Parts Store',
			'BikeStore'                   => '--Bike Store',
			'BookStore'                   => '--Book Store',
			'ClothingStore'               => '--Clothing Store',
			'ComputerStore'               => '--Computer Store',
			'ConvenienceStore'            => '--Convenience Store',
			'DepartmentStore'             => '--Department Store',
			'ElectronicsStore'            => '--Electronics Store',
			'Florist'                     => '--Florist',
			'FurnitureStore'              => '--Furniture Store',
			'GardenStore'                 => '--Garden Store',
			'GroceryStore'                => '--Grocery Store',
			'HardwareStore'               => '--Hardware Store',
			'HobbyShop'                   => '--Hobby Shop',
			'HomeGoodsStore'              => '--Home Goods Store',
			'JewelryStore'                => '--Jewelry Store',
			'LiquorStore'                 => '--Liquor Store',
			'MensClothingStore'           => '--Mens Clothing Store',
			'MobilePhoneStore'            => '--Mobile Phone Store',
			'MovieRentalStore'            => '--Movie Rental Store',
			'MusicStore'                  => '--Music Store',
			'OfficeEquipmentStore'        => '--Office Equipment Store',
			'OutletStore'                 => '--Outlet Store',
			'PawnShop'                    => '--Pawn Shop',
			'PetStore'                    => '--Pet Store',
			'ShoeStore'                   => '--Shoe Store',
			'SportingGoodsStore'          => '--Sporting Goods Store',
			'TireShop'                    => '--Tire Shop',
			'ToyStore'                    => '--Toy Store',
			'WholesaleStore'              => '--Wholesale Store',
			'TelevisionStation'           => 'Television Station',
			'TouristInformationCenter'    => 'Tourist Information Center',
			'TravelAgency'                => 'Travel Agency',
		);

		?>
		<p><?php _e( 'All fields are optional. Blank fields are not shown. If you choose "Do not display" the microdata for the field will still be used.', 'lbmw' )?></p>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Widget Title: ', 'lbmw' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('lbm_company_type'); ?>"><?php _e( 'Business Type: ', 'lbmw' ); ?></label>
			<select id="<?php echo $this->get_field_id('lbm_company_type'); ?>" name="<?php echo $this->get_field_name('lbm_company_type'); ?>" size="1">
				<?php foreach ( $localbusiness_types as $key => $value ) {
					echo '<option value="' . $key . '"' . ($key == $lbm_company_type ? ' selected' : '') . '>' . $value . '</option>';
				} ?>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('lbm_company_name'); ?>"><?php _e( 'Business Name:', 'lbmw' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('lbm_company_name'); ?>" name="<?php echo $this->get_field_name('lbm_company_name'); ?>" type="text" value="<?php echo $lbm_company_name; ?>" />
			<input id="<?php echo $this->get_field_id('lbm_display_name'); ?>" name="<?php echo $this->get_field_name('lbm_display_name'); ?>" type="checkbox" value="1" <?php checked( '1', $lbm_display_name ); ?> /> <?php _e( 'Do not display name', 'lbmw' ); ?>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('lbm_company_desc'); ?>"><?php _e( 'Description:', 'lbmw' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('lbm_company_desc'); ?>" name="<?php echo $this->get_field_name('lbm_company_desc'); ?>" type="text" value="<?php echo $lbm_company_desc; ?>" />
			<input id="<?php echo $this->get_field_id('lbm_display_desc'); ?>" name="<?php echo $this->get_field_name('lbm_display_desc'); ?>" type="checkbox" value="1" <?php checked( '1', $lbm_display_desc ); ?> /> <?php _e( 'Do not display description', 'lbmw' ); ?>
		</p>

		<div style="width:50%;float:left">
			<p>
				<label for="<?php echo $this->get_field_id('lbm_company_phone'); ?>"><?php _e( 'Phone:', 'lbmw' ); ?></label>
				<input id="<?php echo $this->get_field_id('lbm_company_phone'); ?>" name="<?php echo $this->get_field_name('lbm_company_phone'); ?>" type="text" value="<?php echo $lbm_company_phone; ?>" size="15" />
				<br />
				<input id="<?php echo $this->get_field_id('lbm_display_phone'); ?>" name="<?php echo $this->get_field_name('lbm_display_phone'); ?>" type="checkbox" value="1" <?php checked( '1', $lbm_display_phone ); ?> /> <?php _e( 'Do not display phone or fax', 'lbmw' ); ?>
			</p>
		</div>
		<div style="width:50%;float:right">
			<p>
				<label for="<?php echo $this->get_field_id('lbm_company_fax'); ?>"><?php _e( 'Fax:', 'lbmw' ); ?></label>
				<input id="<?php echo $this->get_field_id('lbm_company_fax'); ?>" name="<?php echo $this->get_field_name('lbm_company_fax'); ?>" type="text" value="<?php echo $lbm_company_fax; ?>" size="15" />
			</p>
		</div>
		<div class="clear"></div>
			
		
		<p>
			<label for="<?php echo $this->get_field_id('lbm_company_email'); ?>"><?php _e( 'Email:', 'lbmw' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('lbm_company_email'); ?>" name="<?php echo $this->get_field_name('lbm_company_email'); ?>" type="text" value="<?php echo $lbm_company_email; ?>" />
			<input id="<?php echo $this->get_field_id('lbm_display_email'); ?>" name="<?php echo $this->get_field_name('lbm_display_email'); ?>" type="checkbox" value="1" <?php checked( '1', $lbm_display_email ); ?> /> <?php _e( 'Do not display email', 'lbmw' ); ?>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('lbm_company_website'); ?>"><?php _e( 'Website:', 'lbmw' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('lbm_company_website'); ?>" name="<?php echo $this->get_field_name('lbm_company_website'); ?>" type="text" value="<?php echo $lbm_company_website; ?>" />
			<input id="<?php echo $this->get_field_id('lbm_display_website'); ?>" name="<?php echo $this->get_field_name('lbm_display_website'); ?>" type="checkbox" value="1" <?php checked( '1', $lbm_display_website ); ?> /> <?php _e( 'Do not display website', 'lbmw' ); ?>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('lbm_company_street'); ?>"><?php _e( 'Physical Street Address:', 'lbmw' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('lbm_company_street'); ?>" name="<?php echo $this->get_field_name('lbm_company_street'); ?>" type="text" value="<?php echo $lbm_company_street; ?>" />
			<div style="width:50%;float:left">
					<label for="<?php echo $this->get_field_id('lbm_company_city'); ?>"><?php _e( 'City:', 'lbmw' ); ?></label>
					<input class="widefat" id="<?php echo $this->get_field_id('lbm_company_city'); ?>" name="<?php echo $this->get_field_name('lbm_company_city'); ?>" type="text" value="<?php echo $lbm_company_city; ?>" />
			</div>
			<div style="width:20%;float:left">
					<label for="<?php echo $this->get_field_id('lbm_company_state'); ?>"><?php _e( 'State:', 'lbmw' ); ?></label>
					<input class="widefat" id="<?php echo $this->get_field_id('lbm_company_state'); ?>" name="<?php echo $this->get_field_name('lbm_company_state'); ?>" type="text" value="<?php echo $lbm_company_state; ?>" />
			</div>
			<div style="width:30%;float:right">
					<label for="<?php echo $this->get_field_id('lbm_company_zip'); ?>"><?php _e( 'Zip:', 'lbmw' ); ?></label>
					<input class="widefat" id="<?php echo $this->get_field_id('lbm_company_zip'); ?>" name="<?php echo $this->get_field_name('lbm_company_zip'); ?>" type="text" value="<?php echo $lbm_company_zip; ?>" />
			</div>
			<div class="clear"></div>
			<label for="<?php echo $this->get_field_id('lbm_company_country'); ?>"><?php _e( 'Country:', 'lbmw' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('lbm_company_country'); ?>" name="<?php echo $this->get_field_name('lbm_company_country'); ?>" type="text" value="<?php echo $lbm_company_country; ?>" />
			<input id="<?php echo $this->get_field_id('lbm_display_address'); ?>" name="<?php echo $this->get_field_name('lbm_display_address'); ?>" type="checkbox" value="1" <?php checked( '1', $lbm_display_address ); ?> /> <?php _e( 'Do not display address', 'lbmw' ); ?>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('lbm_after_address'); ?>"><?php _e( 'Text/HTML After Address:', 'lbmw' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('lbm_after_address'); ?>" name="<?php echo $this->get_field_name('lbm_after_address'); ?>" type="text" value="<?php echo $lbm_after_address; ?>" />
		</p>

		<div style="width:50%;float:left">
			<p>
				<label for="<?php echo $this->get_field_id('lbm_company_lat'); ?>"><?php _e( 'Lat:', 'lbmw' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('lbm_company_lat'); ?>" name="<?php echo $this->get_field_name('lbm_company_lat'); ?>" type="text" value="<?php echo $lbm_company_lat; ?>" />
				<a href="http://goo.gl/04nEj1" target="_blank"><?php _e( 'get coordinates', 'lbmw' )?></a>
			</p>
		</div>
		<div style="width:50%;float:right">
			<p>
				<label for="<?php echo $this->get_field_id('lbm_company_long'); ?>"><?php _e( 'Long:', 'lbmw' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('lbm_company_long'); ?>" name="<?php echo $this->get_field_name('lbm_company_long'); ?>" type="text" value="<?php echo $lbm_company_long; ?>" />
			</p>
		</div>
		<div class="clear"></div>
		
		<p>
			<label for="<?php echo $this->get_field_id('lbm_open_hours_1'); ?>"><?php _e( 'Business Hours Set 1:', 'lbmw' ); ?></label>
			<br />
			<input id="<?php echo $this->get_field_id('lbm_open_hours_1_Su'); ?>" name="<?php echo $this->get_field_name('lbm_open_hours_1_Su'); ?>" type="checkbox" value="1" <?php checked( '1', $lbm_open_hours_1_Su ); ?> /> S
			<input id="<?php echo $this->get_field_id('lbm_open_hours_1_Mo'); ?>" name="<?php echo $this->get_field_name('lbm_open_hours_1_Mo'); ?>" type="checkbox" value="1" <?php checked( '1', $lbm_open_hours_1_Mo ); ?> /> M
			<input id="<?php echo $this->get_field_id('lbm_open_hours_1_Tu'); ?>" name="<?php echo $this->get_field_name('lbm_open_hours_1_Tu'); ?>" type="checkbox" value="1" <?php checked( '1', $lbm_open_hours_1_Tu ); ?> /> T
			<input id="<?php echo $this->get_field_id('lbm_open_hours_1_We'); ?>" name="<?php echo $this->get_field_name('lbm_open_hours_1_We'); ?>" type="checkbox" value="1" <?php checked( '1', $lbm_open_hours_1_We ); ?> /> W
			<input id="<?php echo $this->get_field_id('lbm_open_hours_1_Th'); ?>" name="<?php echo $this->get_field_name('lbm_open_hours_1_Th'); ?>" type="checkbox" value="1" <?php checked( '1', $lbm_open_hours_1_Th ); ?> /> T
			<input id="<?php echo $this->get_field_id('lbm_open_hours_1_Fr'); ?>" name="<?php echo $this->get_field_name('lbm_open_hours_1_Fr'); ?>" type="checkbox" value="1" <?php checked( '1', $lbm_open_hours_1_Fr ); ?> /> F
			<input id="<?php echo $this->get_field_id('lbm_open_hours_1_Sa'); ?>" name="<?php echo $this->get_field_name('lbm_open_hours_1_Sa'); ?>" type="checkbox" value="1" <?php checked( '1', $lbm_open_hours_1_Sa ); ?> /> S
			<br />
			Open: <input class="widefat" style="width:60px;" id="<?php echo $this->get_field_id('lbm_open_hours_1_open'); ?>" name="<?php echo $this->get_field_name('lbm_open_hours_1_open'); ?>" type="text" value="<?php echo $lbm_open_hours_1_open; ?>" />
			Close: <input class="widefat" style="width:60px;" id="<?php echo $this->get_field_id('lbm_open_hours_1_close'); ?>" name="<?php echo $this->get_field_name('lbm_open_hours_1_close'); ?>" type="text" value="<?php echo $lbm_open_hours_1_close; ?>" />
			<br />
			<label for="<?php echo $this->get_field_id('lbm_open_hours_2'); ?>"><?php _e( 'Business Hours Set 2:', 'lbmw' ); ?></label>
			<br />
			<input id="<?php echo $this->get_field_id('lbm_open_hours_2_Su'); ?>" name="<?php echo $this->get_field_name('lbm_open_hours_2_Su'); ?>" type="checkbox" value="1" <?php checked( '1', $lbm_open_hours_2_Su ); ?> /> S
			<input id="<?php echo $this->get_field_id('lbm_open_hours_2_Mo'); ?>" name="<?php echo $this->get_field_name('lbm_open_hours_2_Mo'); ?>" type="checkbox" value="1" <?php checked( '1', $lbm_open_hours_2_Mo ); ?> /> M
			<input id="<?php echo $this->get_field_id('lbm_open_hours_2_Tu'); ?>" name="<?php echo $this->get_field_name('lbm_open_hours_2_Tu'); ?>" type="checkbox" value="1" <?php checked( '1', $lbm_open_hours_2_Tu ); ?> /> T
			<input id="<?php echo $this->get_field_id('lbm_open_hours_2_We'); ?>" name="<?php echo $this->get_field_name('lbm_open_hours_2_We'); ?>" type="checkbox" value="1" <?php checked( '1', $lbm_open_hours_2_We ); ?> /> W
			<input id="<?php echo $this->get_field_id('lbm_open_hours_2_Th'); ?>" name="<?php echo $this->get_field_name('lbm_open_hours_2_Th'); ?>" type="checkbox" value="1" <?php checked( '1', $lbm_open_hours_2_Th ); ?> /> T
			<input id="<?php echo $this->get_field_id('lbm_open_hours_2_Fr'); ?>" name="<?php echo $this->get_field_name('lbm_open_hours_2_Fr'); ?>" type="checkbox" value="1" <?php checked( '1', $lbm_open_hours_2_Fr ); ?> /> F
			<input id="<?php echo $this->get_field_id('lbm_open_hours_2_Sa'); ?>" name="<?php echo $this->get_field_name('lbm_open_hours_2_Sa'); ?>" type="checkbox" value="1" <?php checked( '1', $lbm_open_hours_2_Sa ); ?> /> S
			<br />
			Open: <input class="widefat" style="width:60px;" id="<?php echo $this->get_field_id('lbm_open_hours_2_open'); ?>" name="<?php echo $this->get_field_name('lbm_open_hours_2_open'); ?>" type="text" value="<?php echo $lbm_open_hours_2_open; ?>" />
			Close: <input class="widefat" style="width:60px;" id="<?php echo $this->get_field_id('lbm_open_hours_2_close'); ?>" name="<?php echo $this->get_field_name('lbm_open_hours_2_close'); ?>" type="text" value="<?php echo $lbm_open_hours_2_close; ?>" />
			<br />
			<input id="<?php echo $this->get_field_id('lbm_display_hours'); ?>" name="<?php echo $this->get_field_name('lbm_display_hours'); ?>" type="checkbox" value="1" <?php checked( '1', $lbm_display_hours ); ?> /> <?php _e( 'Do not display hours', 'lbmw' ); ?><br />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('lbm_payment_accepted'); ?>"><?php _e( 'Payment Accepted: ', 'lbmw' ); ?></label>
			<br />
			<input id="<?php echo $this->get_field_id('lbm_payment_accepted_cash'); ?>" name="<?php echo $this->get_field_name('lbm_payment_accepted_cash'); ?>" type="checkbox" value="1" <?php checked( '1', $lbm_payment_accepted_cash ); ?> /> Cash
			<input id="<?php echo $this->get_field_id('lbm_payment_accepted_check'); ?>" name="<?php echo $this->get_field_name('lbm_payment_accepted_check'); ?>" type="checkbox" value="1" <?php checked( '1', $lbm_payment_accepted_check ); ?> /> Check
			<input id="<?php echo $this->get_field_id('lbm_payment_accepted_credit'); ?>" name="<?php echo $this->get_field_name('lbm_payment_accepted_credit'); ?>" type="checkbox" value="1" <?php checked( '1', $lbm_payment_accepted_credit ); ?> /> Credit Card
			<br />
			<input id="<?php echo $this->get_field_id('lbm_payment_accepted_invoice'); ?>" name="<?php echo $this->get_field_name('lbm_payment_accepted_invoice'); ?>" type="checkbox" value="1" <?php checked( '1', $lbm_payment_accepted_invoice ); ?> /> Invoice
			<input id="<?php echo $this->get_field_id('lbm_payment_accepted_paypal'); ?>" name="<?php echo $this->get_field_name('lbm_payment_accepted_paypal'); ?>" type="checkbox" value="1" <?php checked( '1', $lbm_payment_accepted_paypal ); ?> /> PayPal
			<br />
			<input id="<?php echo $this->get_field_id('lbm_display_payment'); ?>" name="<?php echo $this->get_field_name('lbm_display_payment'); ?>" type="checkbox" value="1" <?php checked( '1', $lbm_display_payment ); ?> /> <?php _e( 'Do not display payment types', 'lbmw' ); ?><br />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('lbm_text_before'); ?>"><?php _e( 'Text/HTML Before:', 'lbmw' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('lbm_text_before'); ?>" name="<?php echo $this->get_field_name('lbm_text_before'); ?>" type="text" value="<?php echo $lbm_text_before; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('lbm_text_after'); ?>"><?php _e( 'Text/HTML After:', 'lbmw' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('lbm_text_after'); ?>" name="<?php echo $this->get_field_name('lbm_text_after'); ?>" type="text" value="<?php echo $lbm_text_after; ?>" />
		</p>
		<?php
	}

	// update widget
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		// Fields
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['lbm_company_type'] = strip_tags($new_instance['lbm_company_type']);

		$instance['lbm_company_name'] = strip_tags($new_instance['lbm_company_name']);
		$instance['lbm_company_desc'] = strip_tags($new_instance['lbm_company_desc']);

		$instance['lbm_company_phone'] = strip_tags($new_instance['lbm_company_phone']);
		$instance['lbm_company_fax'] = strip_tags($new_instance['lbm_company_fax']);

		$instance['lbm_company_street'] = strip_tags($new_instance['lbm_company_street']);
		$instance['lbm_company_city'] = strip_tags($new_instance['lbm_company_city']);
		$instance['lbm_company_state'] = strip_tags($new_instance['lbm_company_state']);
		$instance['lbm_company_zip'] = strip_tags($new_instance['lbm_company_zip']);
		$instance['lbm_company_country'] = strip_tags($new_instance['lbm_company_country']);
		$instance['lbm_after_address'] = ($new_instance['lbm_after_address']);

		$instance['lbm_company_lat'] = strip_tags($new_instance['lbm_company_lat']);
		$instance['lbm_company_long'] = strip_tags($new_instance['lbm_company_long']);

		$instance['lbm_open_hours_1_Su'] = strip_tags($new_instance['lbm_open_hours_1_Su']);
		$instance['lbm_open_hours_1_Mo'] = strip_tags($new_instance['lbm_open_hours_1_Mo']);
		$instance['lbm_open_hours_1_Tu'] = strip_tags($new_instance['lbm_open_hours_1_Tu']);
		$instance['lbm_open_hours_1_We'] = strip_tags($new_instance['lbm_open_hours_1_We']);
		$instance['lbm_open_hours_1_Th'] = strip_tags($new_instance['lbm_open_hours_1_Th']);
		$instance['lbm_open_hours_1_Fr'] = strip_tags($new_instance['lbm_open_hours_1_Fr']);
		$instance['lbm_open_hours_1_Sa'] = strip_tags($new_instance['lbm_open_hours_1_Sa']);
		$instance['lbm_open_hours_1_open'] = strip_tags(date("H:i",strtotime($new_instance['lbm_open_hours_1_open'])));
		$instance['lbm_open_hours_1_close'] = strip_tags(date("H:i",strtotime($new_instance['lbm_open_hours_1_close'])));

		$instance['lbm_open_hours_2_Su'] = strip_tags($new_instance['lbm_open_hours_2_Su']);
		$instance['lbm_open_hours_2_Mo'] = strip_tags($new_instance['lbm_open_hours_2_Mo']);
		$instance['lbm_open_hours_2_Tu'] = strip_tags($new_instance['lbm_open_hours_2_Tu']);
		$instance['lbm_open_hours_2_We'] = strip_tags($new_instance['lbm_open_hours_2_We']);
		$instance['lbm_open_hours_2_Th'] = strip_tags($new_instance['lbm_open_hours_2_Th']);
		$instance['lbm_open_hours_2_Fr'] = strip_tags($new_instance['lbm_open_hours_2_Fr']);
		$instance['lbm_open_hours_2_Sa'] = strip_tags($new_instance['lbm_open_hours_2_Sa']);
		$instance['lbm_open_hours_2_open'] = strip_tags(date("H:i",strtotime($new_instance['lbm_open_hours_2_open'])));
		$instance['lbm_open_hours_2_close'] = strip_tags(date("H:i",strtotime($new_instance['lbm_open_hours_2_close'])));

		$instance['lbm_company_email'] = strip_tags($new_instance['lbm_company_email']);
		$instance['lbm_company_website'] = strip_tags($new_instance['lbm_company_website']);

		$instance['lbm_text_before'] = ($new_instance['lbm_text_before']);
		$instance['lbm_text_after'] = ($new_instance['lbm_text_after']);

		$instance['lbm_display_name'] = ($new_instance['lbm_display_name']);
		$instance['lbm_display_desc'] = ($new_instance['lbm_display_desc']);
		$instance['lbm_display_phone'] = ($new_instance['lbm_display_phone']);
		$instance['lbm_display_email'] = ($new_instance['lbm_display_email']);
		$instance['lbm_display_website'] = ($new_instance['lbm_display_website']);
		$instance['lbm_display_address'] = ($new_instance['lbm_display_address']);
		$instance['lbm_display_hours'] = ($new_instance['lbm_display_hours']);

		$instance['lbm_payment_accepted_cash'] = ($new_instance['lbm_payment_accepted_cash']);
		$instance['lbm_payment_accepted_check'] = ($new_instance['lbm_payment_accepted_check']);
		$instance['lbm_payment_accepted_credit'] = ($new_instance['lbm_payment_accepted_credit']);
		$instance['lbm_payment_accepted_invoice'] = ($new_instance['lbm_payment_accepted_invoice']);
		$instance['lbm_payment_accepted_paypal'] = ($new_instance['lbm_payment_accepted_paypal']);
		$instance['lbm_display_payment'] = ($new_instance['lbm_display_payment']);

		return $instance;
	}

	// display widget
	function widget($args, $instance) {
		extract( $args );
		// these are the widget options
		$title = apply_filters('widget_title', $instance['title']);
		$lbm_company_type = $instance['lbm_company_type'];

		$lbm_company_name = $instance['lbm_company_name'];
		$lbm_company_desc = $instance['lbm_company_desc'];

		$lbm_company_phone = $instance['lbm_company_phone'];
		$lbm_company_fax = $instance['lbm_company_fax'];

		$lbm_company_street= $instance['lbm_company_street'];
		$lbm_company_city = $instance['lbm_company_city'];
		$lbm_company_state = $instance['lbm_company_state'];
		$lbm_company_zip = $instance['lbm_company_zip'];
		$lbm_company_country = $instance['lbm_company_country'];
		$lbm_after_address = $instance['lbm_after_address'];

		$lbm_company_lat = $instance['lbm_company_lat'];
		$lbm_company_long = $instance['lbm_company_long'];

		$lbm_open_hours_1_Su = $instance['lbm_open_hours_1_Su'];
		$lbm_open_hours_1_Mo = $instance['lbm_open_hours_1_Mo'];
		$lbm_open_hours_1_Tu = $instance['lbm_open_hours_1_Tu'];
		$lbm_open_hours_1_We = $instance['lbm_open_hours_1_We'];
		$lbm_open_hours_1_Th = $instance['lbm_open_hours_1_Th'];
		$lbm_open_hours_1_Fr = $instance['lbm_open_hours_1_Fr'];
		$lbm_open_hours_1_Sa = $instance['lbm_open_hours_1_Sa'];
		$lbm_open_hours_1_open = $instance['lbm_open_hours_1_open'];
		$lbm_open_hours_1_close = $instance['lbm_open_hours_1_close'];

		$lbm_open_hours_2_Su = $instance['lbm_open_hours_2_Su'];
		$lbm_open_hours_2_Mo = $instance['lbm_open_hours_2_Mo'];
		$lbm_open_hours_2_Tu = $instance['lbm_open_hours_2_Tu'];
		$lbm_open_hours_2_We = $instance['lbm_open_hours_2_We'];
		$lbm_open_hours_2_Th = $instance['lbm_open_hours_2_Th'];
		$lbm_open_hours_2_Fr = $instance['lbm_open_hours_2_Fr'];
		$lbm_open_hours_2_Sa = $instance['lbm_open_hours_2_Sa'];
		$lbm_open_hours_2_open = $instance['lbm_open_hours_2_open'];
		$lbm_open_hours_2_close = $instance['lbm_open_hours_2_close'];

		$lbm_company_email = $instance['lbm_company_email'];
		$lbm_company_website = $instance['lbm_company_website'];

		$lbm_text_before = $instance['lbm_text_before'];
		$lbm_text_after = $instance['lbm_text_after'];

		$lbm_display_name = $instance['lbm_display_name'];
		$lbm_display_desc = $instance['lbm_display_desc'];
		$lbm_display_phone = $instance['lbm_display_phone'];
		$lbm_display_email = $instance['lbm_display_email'];
		$lbm_display_website = $instance['lbm_display_website'];
		$lbm_display_address = $instance['lbm_display_address'];
		$lbm_display_hours = $instance['lbm_display_hours'];

		$lbm_payment_accepted_cash = $instance['lbm_payment_accepted_cash'];
		$lbm_payment_accepted_check = $instance['lbm_payment_accepted_check'];
		$lbm_payment_accepted_credit = $instance['lbm_payment_accepted_credit'];
		$lbm_payment_accepted_invoice = $instance['lbm_payment_accepted_invoice'];
		$lbm_payment_accepted_paypal = $instance['lbm_payment_accepted_paypal'];
		$lbm_display_payment = $instance['lbm_display_payment'];

		echo $before_widget;
		// Display the widget
		echo '<div class="widget-text lbmw-plugin">';

		// Check if title is set
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}

		if ( $lbm_company_type ) {
			echo '<div itemscope itemtype="http://schema.org/' . $lbm_company_type . '">';
		} else {
			echo '<div itemscope itemtype="http://schema.org/LocalBusiness">';
		}
		
			if ( $lbm_text_before ) echo $lbm_text_before;

			if ( !$lbm_display_name ) {
				echo '<p itemprop="name" class="name">' . $lbm_company_name . '</p>';
			} else {
				echo '<meta itemprop="name" content="' . $lbm_company_name . '">';
			}
			
			if ( $lbm_company_desc ) {
				if ( !$lbm_display_desc ) {
					echo '<p itemprop="description" class="description">' . $lbm_company_desc . '</p>';
				} else {
					echo '<meta itemprop="description" content="' . $lbm_company_desc . '">';
				}
			}

			if ( $lbm_company_phone || $lbm_company_phone2 || $lbm_company_fax) {
				if ( !$lbm_display_phone ) {
					echo '<p class="phones">';
					if ($lbm_company_phone) echo '<span class="label">' . __( 'Phone: ', 'lbmw' ) . '</span><span itemprop="telephone">' . $lbm_company_phone . '</span><br />';
					if ($lbm_company_fax) echo __( '<span class="label">Fax: ', 'lbmw' ) . '</span><span itemprop="faxNumber">' . $lbm_company_fax . '</span><br />';
					echo '</p>';
				} else {
					if ($lbm_company_phone) echo '<meta itemprop="telephone" content="' . $lbm_company_phone . '">';
					if ($lbm_company_fax) echo '<meta itemprop="faxNumber" content="' . $lbm_company_fax . '">';
				}
			}
			
			if ( $lbm_company_street ) {
				if ( !$lbm_display_address ) {
					echo '<p itemtype="http://schema.org/PostalAddress" itemscope="" itemprop="address" class="address">';
						echo '<span itemprop="streetAddress" class="street">' . $lbm_company_street . '</span><br />';
						echo '<span itemprop="addressLocality" class="city">' . $lbm_company_city . '</span>, <span itemprop="addressRegion" class="region">' . $lbm_company_state . '</span> <span itemprop="postalCode" class="postal">' . $lbm_company_zip . '</span>';
					echo '</p>';
					if ( $lbm_after_address ) echo $lbm_after_address;
					
				} else {
					echo '<div itemtype="http://schema.org/PostalAddress" itemscope="" itemprop="address" class="address">';
						echo '<meta itemprop="streetAddress" content="' . $lbm_company_street . '">';
						echo '<meta itemprop="addressLocality" content="' . $lbm_company_city . '">';
						echo '<meta itemprop="addressRegion" content="' . $lbm_company_state . '">';
						echo '<meta itemprop="postalCode" content="' . $lbm_company_zip . '">';
						if ( $lbm_company_country ) echo '<meta itemprop="addressCountry" content="' . $lbm_company_country . '">';
					echo '</div>';
				}
			}

			if ($lbm_company_email) {
				if ( !$lbm_display_email ) {
					echo '<p class="email">' . __( 'Email: ', 'lbmw' ) . '<span itemprop="email">'.$lbm_company_email.'</span></p>';
				} else {
					echo '<meta itemprop="email" content="'.$lbm_company_email.'">';
				}
			}
			if ($lbm_company_website) {
				if ( !$lbm_display_website ) {
					echo '<p class="website">' . __( 'URL: ', 'lbmw' ) . '<span itemprop="url">'.$lbm_company_website.'</span></p>';
				} else {
					echo '<meta itemprop="url" content="'.$lbm_company_website.'">';
				}
			}

			if ($lbm_open_hours_1_Su || $lbm_open_hours_1_Mo || $lbm_open_hours_1_Tu || $lbm_open_hours_1_We || $lbm_open_hours_1_Th || $lbm_open_hours_1_Fr || $lbm_open_hours_1_Sa ) {
				
				$open_hours_days_1 = '';
				if ($lbm_open_hours_1_Su) $open_hours_days_1 .= 'Su,';
				if ($lbm_open_hours_1_Mo) $open_hours_days_1 .= 'Mo,';
				if ($lbm_open_hours_1_Tu) $open_hours_days_1 .= 'Tu,';
				if ($lbm_open_hours_1_We) $open_hours_days_1 .= 'We,';
				if ($lbm_open_hours_1_Th) $open_hours_days_1 .= 'Th,';
				if ($lbm_open_hours_1_Fr) $open_hours_days_1 .= 'Fr,';
				if ($lbm_open_hours_1_Sa) $open_hours_days_1 .= 'Sa';
				echo '<meta itemprop="openingHours" content="' . trim($open_hours_days_1,',') . ' ' . $lbm_open_hours_1_open . '-' . $lbm_open_hours_1_close . '">';

				if ($lbm_open_hours_2_Su || $lbm_open_hours_2_Mo || $lbm_open_hours_2_Tu || $lbm_open_hours_2_We || $lbm_open_hours_2_Th || $lbm_open_hours_2_Fr || $lbm_open_hours_2_Sa ) {
					$open_hours_days_2 = '';
					if ($lbm_open_hours_2_Su) $open_hours_days_2 .= 'Su,';
					if ($lbm_open_hours_2_Mo) $open_hours_days_2 .= 'Mo,';
					if ($lbm_open_hours_2_Tu) $open_hours_days_2 .= 'Tu,';
					if ($lbm_open_hours_2_We) $open_hours_days_2 .= 'We,';
					if ($lbm_open_hours_2_Th) $open_hours_days_2 .= 'Th,';
					if ($lbm_open_hours_2_Fr) $open_hours_days_2 .= 'Fr,';
					if ($lbm_open_hours_2_Sa) $open_hours_days_2 .= 'Sa';
					echo '<meta itemprop="openingHours" content="' . trim($open_hours_days_2,',') . ' ' . $lbm_open_hours_2_open . '-' . $lbm_open_hours_2_close . '">';
				}
				if ( !$lbm_display_hours ) {
					echo '<p class="hours"><span class="label">' . __( 'Hours: ', 'lbmw' ) . '</span><br />';
					echo trim($open_hours_days_1,',') . ': ' . date("g:ia",strtotime($lbm_open_hours_1_open)) . '-' . date("g:ia",strtotime($lbm_open_hours_1_close)) . '<br /> ';
					if ($lbm_open_hours_2_Su || $lbm_open_hours_2_Mo || $lbm_open_hours_2_Tu || $lbm_open_hours_2_We || $lbm_open_hours_2_Th || $lbm_open_hours_2_Fr || $lbm_open_hours_2_Sa ) 
						echo trim($open_hours_days_2,',') . ': ' . date("g:ia",strtotime($lbm_open_hours_2_open)) . '-' . date("g:ia",strtotime($lbm_open_hours_2_close)) . ' ';
					echo '</p>';
				}
			}

			if ( $lbm_company_lat && $lbm_company_long ) {
			echo '<div itemtype="http://schema.org/GeoCoordinates" itemscope="" itemprop="geo">';
				echo '<meta itemprop="latitude" content="' . $lbm_company_lat . '" />';
				echo '<meta itemprop="longitude" content="' . $lbm_company_long . '" />';
			echo '</div>';
			}

			if ( $lbm_payment_accepted_cash || $lbm_payment_accepted_check || $lbm_payment_accepted_credit || $lbm_payment_accepted_invoice || $lbm_payment_accepted_paypal ) {
				$lbm_payment_types='';
				if ( $lbm_payment_accepted_cash ) $lbm_payment_types .= 'Cash, ';
				if ( $lbm_payment_accepted_check ) $lbm_payment_types .= 'Check, ';
				if ( $lbm_payment_accepted_credit ) $lbm_payment_types .= 'Credit Card, ';
				if ( $lbm_payment_accepted_invoice ) $lbm_payment_types .= 'Invoice, ';
				if ( $lbm_payment_accepted_paypal ) $lbm_payment_types .= 'PayPal';

				$lbm_payment_types=trim($lbm_payment_types);
				$lbm_payment_types=trim($lbm_payment_types, ',');

				if ( !$lbm_display_payment ) {
					echo '<p class="payment"><span class="label">' . __( 'Payment Accepted: ', 'lbmw' ) . '</span><span itemprop="paymentAccepted">' . $lbm_payment_types . '</span></p>';
				} else {
					echo '<meta itemprop="paymentAccepted" content="' . $lbm_payment_types . '" />';
				}
			}

			if ( $lbm_text_after ) echo $lbm_text_after;

		echo '</div>';


		echo '</div>'; // widget-text end
		echo $after_widget;
	}
}