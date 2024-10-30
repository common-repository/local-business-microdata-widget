=== Local Business Microdata Widget ===
Contributors: jamesmm
Tags: widget, widgets, local business, local seo, microdata, rich snippet, schema, schema.org
Requires at least: 2.8.0
Tested up to: 3.7
Stable tag: 0.3.0
License: GPLv2 or Later

A simple and easy way to include Schema.org Local Business contact information with microdata markup as a widget in a sidebar.

== Description ==

This is a simple widget you can use to display business contact information in a sidebar on your website. This contact information includes the Schema.org microdata markup of the LocalBusiness type. (http://schema.org/LocalBusiness)


**Available Fields** *(all optional)*:

* Business Name
* Text Description
* Phone Number
* Fax Number
* Physical Street Address, City, State/Region, Postalcode and Country
* Text/HTML After Address
* Latitude and Longitude Coordinates
* Business Contact Email Address
* Business Website URL
* Business Hours (2 sets)
* Text/HTML Before
* Text/HTML After


**Available Local Business Types** *(list from schema.org)*:

LocalBusiness, AnimalShelter, AutomotiveBusiness, AutoBodyShop, AutoDealer, AutoPartsStore, AutoRental, AutoRepair, AutoWash, GasStation, MotorcycleDealer, MotorcycleRepair, ChildCare, DryCleaningOrLaundry, EmergencyService, FireStation, Hospital, PoliceStation, EmploymentAgency, EntertainmentBusiness, AdultEntertainment, AmusementPark, ArtGallery, Casino, ComedyClub, MovieTheater, NightClub, FinancialService, AccountingService, AutomatedTeller, BankOrCreditUnion, InsuranceAgency, FoodEstablishment, Bakery, BarOrPub, Brewery, CafeOrCoffeeShop, FastFoodRestaurant, IceCreamShop, Restaurant, Winery, GovernmentOffice, PostOffice, HealthAndBeautyBusiness, BeautySalon, DaySpa, HairSalon, HealthClub, NailSalon, TattooParlor, HomeAndConstructionBusiness, Electrician, GeneralContractor, HVACBusiness, HousePainter, Locksmith, MovingCompany, Plumber, RoofingContractor, InternetCafe, Library, LodgingBusiness, BedAndBreakfast, Hostel, Hotel, Motel, MedicalOrganization, Dentist, DiagnosticLab, Hospital, MedicalClinic, Optician, Pharmacy, Physician, VeterinaryCare, ProfessionalService, AccountingService, Attorney, Dentist, Electrician, GeneralContractor, HousePainter, Locksmith, Notary, Plumber, RoofingContractor, RadioStation, RealEstateAgent, RecyclingCenter, SelfStorage, ShoppingCenter, SportsActivityLocation, BowlingAlley, ExerciseGym, GolfCourse, HealthClub, PublicSwimmingPool, SkiResort, SportsClub, StadiumOrArena, TennisComplex, Store, AutoPartsStore, BikeStore, BookStore, ClothingStore, ComputerStore, ConvenienceStore, DepartmentStore, ElectronicsStore, Florist, FurnitureStore, GardenStore, GroceryStore, HardwareStore, HobbyShop, HomeGoodsStore, JewelryStore, LiquorStore, MensClothingStore, MobilePhoneStore, MovieRentalStore, MusicStore, OfficeEquipmentStore, OutletStore, PawnShop, PetStore, ShoeStore, SportingGoodsStore, TireShop, ToyStore, WholesaleStore, TelevisionStation, TouristInformationCenter, TravelAgency


**Demo**

You can see this widget in action at http://mywpcms.com/local-business-microdata-widget/ 

== Installation ==

1. Upload the zip package via 'Plugins > Add New > Upload' in your WP Admin OR Extract the zip package and upload the localbusiness-microdata-widget folder to the /wp-content/plugins/ directory via FTP
1. Activate the plugin through the 'Plugins > Installed Plugins' section in WP Admin

The widget will now be available in 'Appearance > Widgets > Availalbe Widgets'. Simply drag the widget to a sidebar and enter the business contact information you would like to display.

== Screenshots ==

1. Widget Setup in Sidebar
2. Widget shown in Twenty Thirteen
3. Schema.org Markup in Source Code

== Changelog ==

= 0.3.0 =
* Added field for specific Local Business type from Schema.org
* Added PaymentAccepted field

= 0.2.1 =
* Fixed business hours set 2 from showing when days not set
* Added label class to field labels

= 0.2.0 =
* Corrected localizing/internationalizing issues, THX Piet!
* Increased security: prevented direct access to the file, THX Piet!
* Added field to display after address
* Added country field to physical address
* Added business hours
* Added functionality to hide elements from display
* Improved readme, screenshots, typos, THX Bob Riley!

= 0.1.0 =
* Initial version.
