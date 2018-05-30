<?php   
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */ 

function optionsframework_option_name() {
	// Change this to use your theme slug
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );
	return $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'skt-cutsnstyle'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {
	//array of all custom font types.
	$font_types = array(  '' => '',
		'ABeeZee' => 'ABeeZee',
		'Abel' => 'Abel',
		'Abril Fatface' => 'Abril Fatface',
		'Aclonica' => 'Aclonica',
		'Acme' => 'Acme',
		'Actor' => 'Actor',
		'Adamina' => 'Adamina',
		'Advent Pro' => 'Advent Pro',
		'Aguafina Script' => 'Aguafina Script',
		'Akronim' => 'Akronim',
		'Aladin' => 'Aladin',
		'Aldrich' => 'Aldrich',
		'Alegreya' => 'Alegreya',
		'Alegreya Sans SC' => 'Alegreya Sans SC',
		'Alegreya SC' => 'Alegreya SC',
		'Alex Brush' => 'Alex Brush',
		'Alef' => 'Alef',
		'Alfa Slab One' => 'Alfa Slab One',
		'Alice' => 'Alice',
		'Alike' => 'Alike',
		'Alike Angular' => 'Alike Angular',
		'Allan' => 'Allan',
		'Allerta' => 'Allerta',
		'Allerta Stencil' => 'Allerta Stencil',
		'Allura' => 'Allura',
		'Almendra' => 'Almendra',
		'Almendra Display' => 'Almendra Display',
		'Almendra SC' => 'Almendra SC',
		'Amiri' => 'Amiri',
		'Amarante' => 'Amarante',
		'Amaranth' => 'Amaranth',
		'Amatic SC' => 'Amatic SC',
		'Amethysta' => 'Amethysta',
		'Amita' => 'Amita',
		'Anaheim' => 'Anaheim',
		'Andada' => 'Andada',
		'Andika' => 'Andika',
		'Annie Use Your Telescope' => 'Annie Use Your Telescope',
		'Anonymous Pro' => 'Anonymous Pro',
		'Antic' => 'Antic',
		'Antic Didone' => 'Antic Didone',
		'Antic Slab' => 'Antic Slab',
		'Anton' => 'Anton',
		'Angkor' => 'Angkor',
		'Arapey' => 'Arapey',
		'Arbutus' => 'Arbutus',
		'Arbutus Slab' => 'Arbutus Slab',
		'Architects Daughter' => 'Architects Daughter',
		'Archivo White' => 'Archivo White',
		'Archivo Narrow' => 'Archivo Narrow',
		'Arial' => 'Arial',
		'Arimo' => 'Arimo',
		'Arya' => 'Arya',
		'Arizonia' => 'Arizonia',
		'Armata' => 'Armata',
		'Artifika' => 'Artifika',
		'Arvo' => 'Arvo',
		'Asar' => 'Asar',
		'Asap' => 'Asap',
		'Asset' => 'Asset',
		'Astloch' => 'Astloch',
		'Asul' => 'Asul',
		'Atomic Age' => 'Atomic Age',
		'Aubrey' => 'Aubrey',
		'Audiowide' => 'Audiowide',
		'Autour One' => 'Autour One',
		'Average' => 'Average',
		'Average Sans' => 'Average Sans',
		'Averia Gruesa Libre' => 'Averia Gruesa Libre',
		'Averia Libre' => 'Averia Libre',
		'Averia Sans Libre' => 'Averia Sans Libre',
		'Averia Serif Libre' => 'Averia Serif Libre',
		'Battambang' => 'Battambang',
		'Bad Script' => 'Bad Script',
		'Bayon' => 'Bayon',
		'Balthazar' => 'Balthazar',
		'Bangers' => 'Bangers',
		'Basic' => 'Basic',
		'Baumans' => 'Baumans',
		'Belgrano' => 'Belgrano',
		'Belleza' => 'Belleza',
		'BenchNine' => 'BenchNine',
		'Bentham' => 'Bentham',
		'Berkshire Swash' => 'Berkshire Swash',
		'Bevan' => 'Bevan',
		'Bigelow Rules' => 'Bigelow Rules',
		'Bigshot One' => 'Bigshot One',
		'Bilbo' => 'Bilbo',
		'Bilbo Swash Caps' => 'Bilbo Swash Caps',
		'Biryani' => 'Biryani',
		'Bitter' => 'Bitter',
		'White Ops One' => 'White Ops One',
		'Bokor' => 'Bokor',
		'Bonbon' => 'Bonbon',
		'Boogaloo' => 'Boogaloo',
		'Bowlby One' => 'Bowlby One',
		'Bowlby One SC' => 'Bowlby One SC',
		'Brawler' => 'Brawler',
		'Bree Serif' => 'Bree Serif',
		'Bubblegum Sans' => 'Bubblegum Sans',
		'Bubbler One' => 'Bubbler One',
		'Buda' => 'Buda',
		'Buenard' => 'Buenard',
		'Butcherman' => 'Butcherman',
		'Butcherman Caps' => 'Butcherman Caps',
		'Butterfly Kids' => 'Butterfly Kids',
		'Cabin' => 'Cabin',
		'Cabin Condensed' => 'Cabin Condensed',
		'Cabin Sketch' => 'Cabin Sketch',
		'Cabin' => 'Cabin',
		'Caesar Dressing' => 'Caesar Dressing',
		'Cagliostro' => 'Cagliostro',
		'Calligraffitti' => 'Calligraffitti',
		'Cambay' => 'Cambay',
		'Cambo' => 'Cambo',
		'Candal' => 'Candal',
		'Cantarell' => 'Cantarell',
		'Cantata One' => 'Cantata One',
		'Cantora One' => 'Cantora One',
		'Capriola' => 'Capriola',
		'Cardo' => 'Cardo',
		'Carme' => 'Carme',
		'Carrois Gothic' => 'Carrois Gothic',
		'Carrois Gothic SC' => 'Carrois Gothic SC',
		'Carter One' => 'Carter One',
		'Caveat' => 'Caveat',
		'Caveat Brush' => 'Caveat Brush',
		'Catamaran' => 'Catamaran',
		'Caudex' => 'Caudex',
		'Cedarville Cursive' => 'Cedarville Cursive',
		'Ceviche One' => 'Ceviche One',
		'Changa One' => 'Changa One',
		'Chango' => 'Chango',
		'Chau Philomene One' => 'Chau Philomene One',
		'Chenla' => 'Chenla',
		'Chela One' => 'Chela One',
		'Chelsea Market' => 'Chelsea Market',
		'Cherry Cream Soda' => 'Cherry Cream Soda',
		'Cherry Swash' => 'Cherry Swash',
		'Chewy' => 'Chewy',
		'Chicle' => 'Chicle',
		'Chivo' => 'Chivo',
		'Chonburi' => 'Chonburi',
		'Cinzel' => 'Cinzel',
		'Cinzel Decorative' => 'Cinzel Decorative',
		'Clicker Script' => 'Clicker Script',
		'Coda' => 'Coda',
		'Codystar' => 'Codystar',
		'Combo' => 'Combo',
		'Comfortaa' => 'Comfortaa',
		'Coming Soon' => 'Coming Soon',
		'Condiment' => 'Condiment',
		'Content' => 'Content',
		'Contrail One' => 'Contrail One',
		'Convergence' => 'Convergence',
		'Cookie' => 'Cookie',
		'Comic Sans MS' => 'Comic Sans MS',
		'Copse' => 'Copse',
		'Corben' => 'Corben',
		'Courgette' => 'Courgette',
		'Cousine' => 'Cousine',
		'Coustard' => 'Coustard',
		'Covered By Your Grace' => 'Covered By Your Grace',
		'Crafty Girls' => 'Crafty Girls',
		'Creepster' => 'Creepster',
		'Creepster Caps' => 'Creepster Caps',
		'Crete Round' => 'Crete Round',
		'Crimson' => 'Crimson',
		'Croissant One' => 'Croissant One',
		'Crushed' => 'Crushed',
		'Cuprum' => 'Cuprum',
		'Cutive' => 'Cutive',
		'Cutive Mono' => 'Cutive Mono',
		'Damion' => 'Damion',
		'Dangrek' => 'Dangrek',
		'Dancing Script' => 'Dancing Script',
		'Dawning of a New Day' => 'Dawning of a New Day',
		'Days One' => 'Days One',
		'Dekko' => 'Dekko',
		'Delius' => 'Delius',
		'Delius Swash Caps' => 'Delius Swash Caps',
		'Delius Unicase' => 'Delius Unicase',
		'Della Respira' => 'Della Respira',
		'Denk One' => 'Denk One',
		'Devonshire' => 'Devonshire',
		'Dhurjati' => 'Dhurjati',
		'Didact Gothic' => 'Didact Gothic',
		'Diplomata' => 'Diplomata',
		'Diplomata SC' => 'Diplomata SC',
		'Domine' => 'Domine',
		'Donegal One' => 'Donegal One',
		'Doppio One' => 'Doppio One',
		'Dorsa' => 'Dorsa',
		'Dosis' => 'Dosis',
		'Dr Sugiyama' => 'Dr Sugiyama',
		'Droid Sans' => 'Droid Sans',
		'Droid Sans Mono' => 'Droid Sans Mono',
		'Droid Serif' => 'Droid Serif',
		'Duru Sans' => 'Duru Sans',
		'Dynalight' => 'Dynalight',
		'EB Garamond' => 'EB Garamond',
		'Eczar' => 'Eczar',
		'Eagle Lake' => 'Eagle Lake',
		'Eater' => 'Eater',
		'Eater Caps' => 'Eater Caps',
		'Economica' => 'Economica',
		'Ek Mukta' => 'Ek Mukta',
		'Electrolize' => 'Electrolize',
		'Elsie' => 'Elsie',
		'Elsie Swash Caps' => 'Elsie Swash Caps',
		'Emblema One' => 'Emblema One',
		'Emilys Candy' => 'Emilys Candy',
		'Engagement' => 'Engagement',
		'Englebert' => 'Englebert',
		'Enriqueta' => 'Enriqueta',
		'Erica One' => 'Erica One',
		'Esteban' => 'Esteban',
		'Euphoria Script' => 'Euphoria Script',
		'Ewert' => 'Ewert',
		'Exo' => 'Exo',
		'Exo 2' => 'Exo 2',
		'Expletus Sans' => 'Expletus Sans',
		'Fanwood Text' => 'Fanwood Text',
		'Fascinate' => 'Fascinate',
		'Fascinate Inline' => 'Fascinate Inline',
		'Fasthand' => 'Fasthand',
		'Faster One' => 'Faster One',
		'Federant' => 'Federant',
		'Federo' => 'Federo',
		'Felipa' => 'Felipa',
		'Fenix' => 'Fenix',
		'Finger Paint' => 'Finger Paint',
		'Fira Mono' => 'Fira Mono',
		'Fira Sans' => 'Fira Sans',
		'Fjalla One' => 'Fjalla One',
		'Fjord One' => 'Fjord One',
		'Flamenco' => 'Flamenco',
		'Flavors' => 'Flavors',
		'Fondamento' => 'Fondamento',
		'Fontdiner Swanky' => 'Fontdiner Swanky',
		'Forum' => 'Forum',
		'Francois One' => 'Francois One',
		'FreeSans' => 'FreeSans',
		'Freckle Face' => 'Freckle Face',
		'Fredericka the Great' => 'Fredericka the Great',
		'Fredoka One' => 'Fredoka One',
		'Fresca' => 'Fresca',
		'Freehand' => 'Freehand',
		'Frijole' => 'Frijole',
		'Fruktur' => 'Fruktur',
		'Fugaz One' => 'Fugaz One',
		'Gafata' => 'Gafata',
		'Galdeano' => 'Galdeano',
		'Galindo' => 'Galindo',
		'Gentium Basic' => 'Gentium Basic',
		'Gentium Book Basic' => 'Gentium Book Basic',
		'Geo' => 'Geo',
		'Georgia' => 'Georgia',
		'Geostar' => 'Geostar',



		'Geostar Fill' => 'Geostar Fill',
		'Germania One' => 'Germania One',
		'Gilda Display' => 'Gilda Display',
		'Give You Glory' => 'Give You Glory',
		'Glass Antiqua' => 'Glass Antiqua',
		'Glegoo' => 'Glegoo',
		'Gloria Hallelujah' => 'Gloria Hallelujah',
		'Goblin One' => 'Goblin One',
		'Gochi Hand' => 'Gochi Hand',
		'Gorditas' => 'Gorditas',
		'Gurajada' => 'Gurajada',
		'Goudy Bookletter 1911' => 'Goudy Bookletter 1911',
		'Graduate' => 'Graduate',
		'Grand Hotel' => 'Grand Hotel',
		'Gravitas One' => 'Gravitas One',
		'Great Vibes' => 'Great Vibes',
		'Griffy' => 'Griffy',
		'Gruppo' => 'Gruppo',
		'Gudea' => 'Gudea',
		'Gidugu' => 'Gidugu',
		'GFS Didot' => 'GFS Didot',
		'GFS Neohellenic' => 'GFS Neohellenic',
		'Habibi' => 'Habibi',
		'Hammersmith One' => 'Hammersmith One',
		'Halant' => 'Halant',
		'Hanalei' => 'Hanalei',
		'Hanalei Fill' => 'Hanalei Fill',
		'Handlee' => 'Handlee',
		'Hanuman' => 'Hanuman',
		'Happy Monkey' => 'Happy Monkey',
		'Headland One' => 'Headland One',
		'Henny Penny' => 'Henny Penny',
		'Herr Von Muellerhoff' => 'Herr Von Muellerhoff',
		'Hind' => 'Hind',
		'Hind Siliguri' => 'Hind Siliguri',
		'Hind Vadodara' => 'Hind Vadodara',
		'Holtwood One SC' => 'Holtwood One SC',
		'Homemade Apple' => 'Homemade Apple',
		'Homenaje' => 'Homenaje',
		'IM Fell' => 'IM Fell',
		'Itim' => 'Itim',
		'Iceberg' => 'Iceberg',
		'Iceland' => 'Iceland',
		'Imprima' => 'Imprima',
		'Inconsolata' => 'Inconsolata',
		'Inder' => 'Inder',
		'Indie Flower' => 'Indie Flower',
		'Inknut Antiqua' => 'Inknut Antiqua',
		'Inika' => 'Inika',
		'Irish Growler' => 'Irish Growler',
		'Istok Web' => 'Istok Web',
		'Italiana' => 'Italiana',
		'Italianno' => 'Italianno',
		'Jacques Francois' => 'Jacques Francois',
		'Jacques Francois Shadow' => 'Jacques Francois Shadow',
		'Jim Nightshade' => 'Jim Nightshade',
		'Jockey One' => 'Jockey One',
		'Jaldi' => 'Jaldi',
		'Jolly Lodger' => 'Jolly Lodger',
		'Josefin Sans' => 'Josefin Sans',
		'Josefin Sans' => 'Josefin Sans',
		'Josefin Slab' => 'Josefin Slab',
		'Joti One' => 'Joti One',
		'Judson' => 'Judson',
		'Julee' => 'Julee',
		'Julius Sans One' => 'Julius Sans One',
		'Junge' => 'Junge',
		'Jura' => 'Jura',
		'Just Another Hand' => 'Just Another Hand',
		'Just Me Again Down Here' => 'Just Me Again Down Here',
		'Kadwa' => 'Kadwa',
		'Kdam Thmor' => 'Kdam Thmor',
		'Kalam' => 'Kalam', 
		'Kameron' => 'Kameron',
		'Kantumruy' => 'Kantumruy',
		'Karma' => 'Karma',
		'Karla' => 'Karla',
		'Kaushan Script' => 'Kaushan Script',
		'Kavoon' => 'Kavoon',
		'Keania One' => 'Keania One',
		'Kelly Slab' => 'Kelly Slab',
		'Kenia' => 'Kenia',
		'Khand' => 'Khand',
		'Khmer' => 'Khmer',
		'Khula' => 'Khula',
		'Kite One' => 'Kite One',
		'Knewave' => 'Knewave',
		'Kotta One' => 'Kotta One',
		'Kranky' => 'Kranky',
		'Kreon' => 'Kreon',
		'Kristi' => 'Kristi',
		'Koulen' => 'Koulen',
		'Krona One' => 'Krona One',
		'Kurale' => 'Kurale',
		'Lakki Reddy' => 'Lakki Reddy',
		'La Belle Aurore' => 'La Belle Aurore',
		'Lancelot' => 'Lancelot',
		'Laila' => 'Laila',
		'Lato' => 'Lato',
		'Lateef' => 'Lateef',
		'League Script' => 'League Script',
		'Leckerli One' => 'Leckerli One',
		'Ledger' => 'Ledger',
		'Lekton' => 'Lekton',
		'Lemon' => 'Lemon',
		'Libre Baskerville' => 'Libre Baskerville',
		'Life Savers' => 'Life Savers',
		'Lilita One' => 'Lilita One',
		'Limelight' => 'Limelight',
		'Linden Hill' => 'Linden Hill',
		'Lobster' => 'Lobster',
		'Lobster Two' => 'Lobster Two',
		'Londrina Outline' => 'Londrina Outline',
		'Londrina Shadow' => 'Londrina Shadow',
		'Londrina Sketch' => 'Londrina Sketch',
		'Londrina Solid' => 'Londrina Solid',
		'Lora' => 'Lora',
		'Love Ya Like A Sister' => 'Love Ya Like A Sister',
		'Loved by the King' => 'Loved by the King',
		'Lovers Quarrel' => 'Lovers Quarrel',
		'Lucida Sans Unicode' => 'Lucida Sans Unicode',
		'Luckiest Guy' => 'Luckiest Guy',
		'Lusitana' => 'Lusitana',
		'Lustria' => 'Lustria',
		'Macondo' => 'Macondo',
		'Macondo Swash Caps' => 'Macondo Swash Caps',
		'Magra' => 'Magra',
		'Maiden Orange' => 'Maiden Orange',
		'Mallanna' => 'Mallanna',
		'Mandali' => 'Mandali',
		'Mako' => 'Mako',
		'Marcellus' => 'Marcellus',
		'Marcellus SC' => 'Marcellus SC',
		'Marck Script' => 'Marck Script',
		'Margarine' => 'Margarine',
		'Marko One' => 'Marko One',
		'Marmelad' => 'Marmelad',
		'Marvel' => 'Marvel',
		'Martel' => 'Martel',
		'Martel Sans' => 'Martel Sans',
		'Mate' => 'Mate',
		'Mate SC' => 'Mate SC',
		'Maven Pro' => 'Maven Pro',
		'McLaren' => 'McLaren',
		'Meddon' => 'Meddon',
		'MedievalSharp' => 'MedievalSharp',
		'Medula One' => 'Medula One',
		'Megrim' => 'Megrim',
		'Meie Script' => 'Meie Script',
		'Merienda' => 'Merienda',
		'Merienda One' => 'Merienda One',
		'Merriweather' => 'Merriweather',
		'Metal' => 'Metal',
		'Metal Mania' => 'Metal Mania',
		'Metamorphous' => 'Metamorphous',
		'Metrophobic' => 'Metrophobic',
		'Michroma' => 'Michroma',
		'Milonga' => 'Milonga',
		'Miltonian' => 'Miltonian',
		'Miltonian Tattoo' => 'Miltonian Tattoo',
		'Miniver' => 'Miniver',
		'Miss Fajardose' => 'Miss Fajardose',
		'Miss Saint Delafield' => 'Miss Saint Delafield',
		'Modak' => 'Modak',
		'Modern Antiqua' => 'Modern Antiqua',
		'Molengo' => 'Molengo',
		'Molle' => 'Molle',
		'Moulpali' => 'Moulpali',
		'Monda' => 'Monda',
		'Monofett' => 'Monofett',
		'Monoton' => 'Monoton',
		'Monsieur La Doulaise' => 'Monsieur La Doulaise',
		'Montaga' => 'Montaga',
		'Montez' => 'Montez',
		'Montserrat' => 'Montserrat',
		'Montserrat Alternates' => 'Montserrat Alternates',
		'Montserrat Subrayada' => 'Montserrat Subrayada',
		'Mountains of Christmas' => 'Mountains of Christmas',
		'Mouse Memoirs' => 'Mouse Memoirs',
		'Moul' => 'Moul',
		'Mr Bedford' => 'Mr Bedford',
		'Mr Bedfort' => 'Mr Bedfort',
		'Mr Dafoe' => 'Mr Dafoe',
		'Mr De Haviland' => 'Mr De Haviland',
		'Mrs Saint Delafield' => 'Mrs Saint Delafield',
		'Mrs Sheppards' => 'Mrs Sheppards',
		'Muli' => 'Muli',
		'Mystery Quest' => 'Mystery Quest',
		'Neucha' => 'Neucha',
		'Neuton' => 'Neuton',
		'New Rocker' => 'New Rocker',
		'News Cycle' => 'News Cycle',
		'Niconne' => 'Niconne',
		'Nixie One' => 'Nixie One',
		'Nobile' => 'Nobile',
		'Nokora' => 'Nokora',
		'Norican' => 'Norican',
		'Nosifer' => 'Nosifer',
		'Nosifer Caps' => 'Nosifer Caps',
		'Nova Mono' => 'Nova Mono',
		'Noticia Text' => 'Noticia Text',
		'Noto Sans' => 'Noto Sans',
		'Noto Serif' => 'Noto Serif',
		'Nova Round' => 'Nova Round',
		'Numans' => 'Numans',
		'Nunito' => 'Nunito',
		'NTR' => 'NTR',
		'Offside' => 'Offside',
		'Oldenburg' => 'Oldenburg',
		'Oleo Script' => 'Oleo Script',
		'Oleo Script Swash Caps' => 'Oleo Script Swash Caps',
		'Open Sans' => 'Open Sans',
		'Open Sans Condensed' => 'Open Sans Condensed',
		'Oranienbaum' => 'Oranienbaum',
		'Orbitron' => 'Orbitron',
		'Odor Mean Chey' => 'Odor Mean Chey',
		'Oregano' => 'Oregano',
		'Orienta' => 'Orienta',
		'Original Surfer' => 'Original Surfer',
		'Oswald' => 'Oswald',
		'Over the Rainbow' => 'Over the Rainbow',
		'Overlock' => 'Overlock',
		'Overlock SC' => 'Overlock SC',
		'Ovo' => 'Ovo',
		'Oxygen' => 'Oxygen',
		'Oxygen Mono' => 'Oxygen Mono',
		'Palanquin Dark' => 'Palanquin Dark',
		'Peddana' => 'Peddana',
		'Poppins' => 'Poppins',
		'PT Mono' => 'PT Mono',
		'PT Sans' => 'PT Sans',
		'PT Sans Caption' => 'PT Sans Caption',
		'PT Sans Narrow' => 'PT Sans Narrow',
		'PT Serif' => 'PT Serif',
		'PT Serif Caption' => 'PT Serif Caption',
		'Pacifico' => 'Pacifico',
		'Paprika' => 'Paprika',
		'Parisienne' => 'Parisienne',
		'Passero One' => 'Passero One',
		'Passion One' => 'Passion One',
		'Patrick Hand' => 'Patrick Hand',
		'Patrick Hand SC' => 'Patrick Hand SC',
		'Patua One' => 'Patua One',
		'Paytone One' => 'Paytone One',
		'Peralta' => 'Peralta',
		'Permanent Marker' => 'Permanent Marker',
		'Petit Formal Script' => 'Petit Formal Script',
		'Petrona' => 'Petrona',
		'Philosopher' => 'Philosopher',
		'Piedra' => 'Piedra',
		'Pinyon Script' => 'Pinyon Script',
		'Pirata One' => 'Pirata One',
		'Plaster' => 'Plaster',
		'Palatino Linotype' => 'Palatino Linotype',
		'Play' => 'Play',
		'Playball' => 'Playball',
		'Playfair Display' => 'Playfair Display',
		'Playfair Display SC' => 'Playfair Display SC',
		'Podkova' => 'Podkova',
		'Poiret One' => 'Poiret One',
		'Poller One' => 'Poller One',
		'Poly' => 'Poly',
		'Pompiere' => 'Pompiere',
		'Pontano Sans' => 'Pontano Sans',
		'Port Lligat Sans' => 'Port Lligat Sans',
		'Port Lligat Slab' => 'Port Lligat Slab',
		'Prata' => 'Prata',
		'Pragati Narrow' => 'Pragati Narrow',
		'Preahvihear' => 'Preahvihear',
		'Press Start 2P' => 'Press Start 2P',
		'Princess Sofia' => 'Princess Sofia',
		'Prociono' => 'Prociono',
		'Prosto One' => 'Prosto One',
		'Puritan' => 'Puritan',
		'Purple Purse' => 'Purple Purse',
		'Quando' => 'Quando',
		'Quantico' => 'Quantico',
		'Quattrocento' => 'Quattrocento',
		'Quattrocento Sans' => 'Quattrocento Sans',
		'Questrial' => 'Questrial',
		'Quicksand' => 'Quicksand',
		'Quintessential' => 'Quintessential',
		'Qwigley' => 'Qwigley',
		'Racing Sans One' => 'Racing Sans One',
		'Radley' => 'Radley',
		'Rajdhani' => 'Rajdhani',
		'Raleway Dots' => 'Raleway Dots',
		'Raleway' => 'Raleway',
		'Rambla' => 'Rambla',
		'Ramabhadra' => 'Ramabhadra',
		'Ramaraja' => 'Ramaraja',
		'Rammetto One' => 'Rammetto One',
		'Ranchers' => 'Ranchers',
		'Rancho' => 'Rancho',
		'Ranga' => 'Ranga',
		'Ravi Prakash' => 'Ravi Prakash',
		'Rationale' => 'Rationale',
		'Redressed' => 'Redressed',
		'Reenie Beanie' => 'Reenie Beanie',
		'Revalia' => 'Revalia',
		'Rhodium Libre' => 'Rhodium Libre',
		'Ribeye' => 'Ribeye',
		'Ribeye Marrow' => 'Ribeye Marrow',
		'Righteous' => 'Righteous',
		'Risque' => 'Risque',
		'Roboto' => 'Roboto',
		'Roboto Condensed' => 'Roboto Condensed',
		'Roboto Mono' => 'Roboto Mono',
		'Roboto Slab' => 'Roboto Slab',
		'Rochester' => 'Rochester',
		'Rock Salt' => 'Rock Salt',
		'Rokkitt' => 'Rokkitt',
		'Romanesco' => 'Romanesco',
		'Ropa Sans' => 'Ropa Sans',
		'Rosario' => 'Rosario',
		'Rosarivo' => 'Rosarivo',
		'Rouge Script' => 'Rouge Script',
		'Rozha One' => 'Rozha One',
		'Rubik' => 'Rubik',
		'Rubik One' => 'Rubik One',
		'Rubik Mono One' => 'Rubik Mono One',
		'Ruda' => 'Ruda',
		'Rufina' => 'Rufina',
		'Ruge Boogie' => 'Ruge Boogie',
		'Ruluko' => 'Ruluko',
		'Rum Raisin' => 'Rum Raisin',
		'Ruslan Display' => 'Ruslan Display',
		'Russo One' => 'Russo One',
		'Ruthie' => 'Ruthie',
		'Rye' => 'Rye',
		'Sacramento' => 'Sacramento',
		'Sail' => 'Sail',
		'Salsa' => 'Salsa',
		'Sanchez' => 'Sanchez',
		'Sancreek' => 'Sancreek',
		'Sahitya' => 'Sahitya',
		'Sansita One' => 'Sansita One',
		'Sarpanch' => 'Sarpanch',
		'Sarina' => 'Sarina',
		'Satisfy' => 'Satisfy',
		'Scada' => 'Scada',
		'Scheherazade' => 'Scheherazade',
		'Schoolbell' => 'Schoolbell',
		'Seaweed Script' => 'Seaweed Script',
		'Sarala' => 'Sarala',
		'Sevillana' => 'Sevillana',
		'Seymour One' => 'Seymour One',
		'Shadows Into Light' => 'Shadows Into Light',
		'Shadows Into Light Two' => 'Shadows Into Light Two',
		'Shanti' => 'Shanti',
		'Share' => 'Share',
		'Share Tech' => 'Share Tech',
		'Share Tech Mono' => 'Share Tech Mono',
		'Shojumaru' => 'Shojumaru',
		'Short Stack' => 'Short Stack',
		'Sigmar One' => 'Sigmar One',
		'Suranna' => 'Suranna',
		'Suravaram' => 'Suravaram',
		'Suwannaphum' => 'Suwannaphum',
		'Signika' => 'Signika',
		'Signika Negative' => 'Signika Negative',
		'Simonetta' => 'Simonetta',
		'Siemreap' => 'Siemreap',
		'Sirin Stencil' => 'Sirin Stencil',
		'Six Caps' => 'Six Caps',
		'Skranji' => 'Skranji',
		'Slackey' => 'Slackey',
		'Smokum' => 'Smokum',
		'Smythe' => 'Smythe',
		'Sniglet' => 'Sniglet',
		'Snippet' => 'Snippet',
		'Snowburst One' => 'Snowburst One',
		'Sofadi One' => 'Sofadi One',
		'Sofia' => 'Sofia',
		'Sonsie One' => 'Sonsie One',
		'Sorts Mill Goudy' => 'Sorts Mill Goudy',
		'Sorts Mill Goudy' => 'Sorts Mill Goudy',
		'Source Code Pro' => 'Source Code Pro',
		'Source Sans Pro' => 'Source Sans Pro',
		'Special I am one' => 'Special I am one',
		'Spicy Rice' => 'Spicy Rice',
		'Spinnaker' => 'Spinnaker',
		'Spirax' => 'Spirax',
		'Squada One' => 'Squada One',
		'Sree Krushnadevaraya' => 'Sree Krushnadevaraya',
		'Stalemate' => 'Stalemate',
		'Stalinist One' => 'Stalinist One',
		'Stardos Stencil' => 'Stardos Stencil',
		'Stint Ultra Condensed' => 'Stint Ultra Condensed',
		'Stint Ultra Expanded' => 'Stint Ultra Expanded',
		'Stoke' => 'Stoke',
		'Stoke' => 'Stoke',
		'Strait' => 'Strait',
		'Sura' => 'Sura',
		'Sumana' => 'Sumana',
		'Sue Ellen Francisco' => 'Sue Ellen Francisco',
		'Sunshiney' => 'Sunshiney',
		'Supermercado One' => 'Supermercado One',
		'Swanky and Moo Moo' => 'Swanky and Moo Moo',
		'Syncopate' => 'Syncopate',
		'Symbol' => 'Symbol',
		'Timmana' => 'Timmana',
		'Taprom' => 'Taprom',
		'Tangerine' => 'Tangerine',
		'Tahoma' => 'Tahoma',
		'Teko' => 'Teko',
		'Telex' => 'Telex',
		'Tenali Ramakrishna' => 'Tenali Ramakrishna',
		'Tenor Sans' => 'Tenor Sans',
		'Terminal Dosis' => 'Terminal Dosis',
		'Terminal Dosis Light' => 'Terminal Dosis Light',
		'Text Me One' => 'Text Me One',
		'The Girl Next Door' => 'The Girl Next Door',
		'Tienne' => 'Tienne',
		'Tillana' => 'Tillana',
		'Tinos' => 'Tinos',
		'Titan One' => 'Titan One',
		'Titillium Web' => 'Titillium Web',
		'Trade Winds' => 'Trade Winds',
		'Trebuchet MS' => 'Trebuchet MS',
		'Trocchi' => 'Trocchi',
		'Trochut' => 'Trochut',
		'Trykker' => 'Trykker',
		'Tulpen One' => 'Tulpen One',
		'Ubuntu' => 'Ubuntu',
		'Ubuntu Condensed' => 'Ubuntu Condensed',
		'Ubuntu Mono' => 'Ubuntu Mono',
		'Ultra' => 'Ultra',
		'Uncial Antiqua' => 'Uncial Antiqua',
		'Underdog' => 'Underdog',
		'Unica One' => 'Unica One',
		'UnifrakturCook' => 'UnifrakturCook',
		'UnifrakturMaguntia' => 'UnifrakturMaguntia',
		'Unkempt' => 'Unkempt',
		'Unlock' => 'Unlock',
		'Unna' => 'Unna',
		'VT323' => 'VT323',
		'Vampiro One' => 'Vampiro One',
		'Varela' => 'Varela',
		'Varela Round' => 'Varela Round',
		'Vast Shadow' => 'Vast Shadow',
		'Vesper Libre' => 'Vesper Libre',
		'Verdana' => 'Verdana',
		'Vibur' => 'Vibur',
		'Vidaloka' => 'Vidaloka',
		'Viga' => 'Viga',
		'Voces' => 'Voces',
		'Volkhov' => 'Volkhov',
		'Vollkorn' => 'Vollkorn',
		'Voltaire' => 'Voltaire',
		'Waiting for the Sunrise' => 'Waiting for the Sunrise',
		'Wallpoet' => 'Wallpoet',
		'Walter Turncoat' => 'Walter Turncoat',
		'Warnes' => 'Warnes',
		'Wellfleet' => 'Wellfleet',
		'Wendy One' => 'Wendy One',
		'Wire One' => 'Wire One',
		'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
		'Yantramanav' => 'Yantramanav',
		'Yellowtail' => 'Yellowtail',
		'Yeseva One' => 'Yeseva One',
		'Yesteryear' => 'Yesteryear',
		'Zeyada' => 'Zeyada'
	);

	//array of all font sizes.
	$font_sizes = array( 
		'10px' => '10px',
		'11px' => '11px',
	);
	for($n=12;$n<=100;$n+=1){
		$font_sizes[$n.'px'] = $n.'px';
	}
	
	// Pull all the pages into an array
	 $options_pages = array();
	 $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	 $options_pages[''] = 'Select a page:';
	 foreach ($options_pages_obj as $page) {
	  $options_pages[$page->ID] = $page->post_title;
	 }

	// array of section content.
	$section_text = array(		
		1 => array(
			'section_title'	=> 'Our Team',
			'menutitle'		=> '',
			'bgcolor' 		=> '#ffffff',
			'class'			=> 'team-wrap',
			'content'		=> '[ourteam show="3"]'
		),
				
		2 => array(
			'section_title'	=> 'Check Our Pricing Table',
			'menutitle'		=> '',
			'bgcolor' 		=> '#ffffff',
			'bgimage'		=> get_template_directory_uri()."/images/pricing-table.jpg",
			'class'			=> 'our-pricing-table',
			'content'		=> '[pricing_table bgcolor="#ffffff"][price_row bdcolor="#c9c9c9" hairservice="Trim your Beard" hairprice="$ 15.99"][price_row bdcolor="#c9c9c9" hairservice="Trim your Hair" hairprice="$ 15.99"][price_row bdcolor="#c9c9c9" hairservice="Special Beard Treatment" hairprice="$ 15.99"][price_row bdcolor="#c9c9c9" hairservice="Color your Beard" hairprice="$ 15.99"][price_row bdcolor="#c9c9c9" hairservice="Wax your Beard" hairprice="$ 15.99"][price_row hairservice="Complete Treatment" hairprice="$ 15.99"][/pricing_table]'
		),	

		
		3 => array(
			'section_title'	=> 'Latest Posts',
			'menutitle'		=> '',
			'bgcolor' 		=> '#fbfafa',
			'bgimage'		=> '',
			'class'			=> 'latestposts',
			'content'		=> '[latestposts show="4"]'
		),
		
		4 => array(
			'section_title'	=> 'Testimonials',
			'menutitle'		=> '',
			'bgcolor' 		=> '#ffffff',
			'bgimage'		=> '',
			'class'			=> 'testimonials-wrap',
			'content'		=> '[testimonials show="2"]',
		),	
			
		5 => array(
			'section_title'	=> '',
			'menutitle'		=> '',
			'bgcolor' 		=> '',
			'bgimage'		=> get_template_directory_uri()."/images/allday.jpg",
			'class'			=> '',
			'content'		=> '[stat_main][stat everyday="Mon" bgcolor="#fff" textcolor="#5b5a5a"]8:00 - 16:00[/stat] [stat everyday="Tue" bgcolor="#fff" textcolor="#5b5a5a"]8:00 - 16:00[/stat][stat everyday="Wed" bgcolor="#fff" textcolor="#5b5a5a"]8:00 - 16:00[/stat] [stat everyday="Thu" bgcolor="#fff" textcolor="#5b5a5a"]8:00 - 16:00[/stat] [stat everyday="Fri" bgcolor="#fff" textcolor="#5b5a5a"]8:00 - 16:00[/stat] [stat everyday="Sat" bgcolor="#000" textcolor="#5b5a5a"]CLOSED[/stat][stat everyday="Sun" bgcolor="#000" textcolor="#5b5a5a"]CLOSED[/stat][/stat_main]',
		),
		
		6 => array(
			'section_title'	=> 'Gallery',
			'menutitle'		=> 'home-gallery',
			'bgcolor' 		=> '#ffffff',
			'bgimage'		=> '',
			'class'			=> '',
			'content'		=> '[photogallery filter="false"]',
		),	
		
		
		7 => array(
			'section_title'	=> 'Get in Touch ',
			'menutitle'		=> 'home-social-icons',
			'bgcolor' 		=> '#ffffff',
			'bgimage'		=> '',
			'class'			=> '',
			'content'		=> '[social_area][social icon="facebook" link="#"] [social icon="twitter" link="#"] [social icon="google" link="#"] [social icon="pinterest" link="#"] [social icon="youtube" link="#"] [social icon="linkedin-square" link="#"] [social icon="vimeo-square" link="#"] [social icon="rss" link="#"] [social icon="instagram" link="#"] [social icon="tumblr" link="#"] [social icon="flickr" link="#"] [social icon="yahoo" link="#"] [social icon="dribbble" link="#"] [social icon="stumbleupon" link="#"] [social icon="meanpath" link="#"] [social icon="behance" link="#"] [social icon="codepen" link="#"] [social icon="git" link="#"] [social icon="foursquare" link="#"] [social icon="wordpress" link="#"] [social icon="yelp" link="#"] [social icon="mail-forward" link="#"] [social icon="vk" link="#"] [social icon="rocket" link="#"] [social icon="whatsapp" link="#"] [social icon="medium" link="#"] [social icon="linkedin" link="#"] [social icon="globe" link="#"] [social icon="magnet" link="#"] [social icon="google-plus-square" link="#"] [social icon="link" link="#"] [social icon="vine" link="#"] [social icon="yelp" link="#"] [social icon="envelope-o" link="#"][/social_area]',
		),		

	);

	$options = array();

	//Basic Settings
	$options[] = array(
		'name' => __('Basic Settings', 'skt-cutsnstyle'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Logo', 'skt-cutsnstyle'),
		'desc' => __('Upload your main logo here', 'skt-cutsnstyle'),
		'id' => 'logo',
		'class' => '',
		'std'	=> get_template_directory_uri()."/images/logo.png",
		'type' => 'upload');

	$options[] = array(		
		'desc' => __('manage your custom logo height', 'skt-cutsnstyle'),
		'id' => 'logoheight',
		'std' => '55',
		'type' => 'text');

	$options[] = array(
		'name' => __('Custom CSS', 'skt-cutsnstyle'),
		'desc' => __('Some Custom Styling for your site. Place any css codes here instead of the style.css file.', 'skt-cutsnstyle'),
		'id' => 'style2',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'name' => __('Header Top Info', 'skt-cutsnstyle'),
		'desc' => __('Edit header info from here Book Appointment and link.', 'skt-cutsnstyle'),
		'id' => 'headerinfo',
		'std' => '<a href="#">Book an Appointment</a>',
		'type' => 'textarea');	
		
	// font family start 
		
	$options[] = array(
		'name' => __('Font Faces', 'skt-cutsnstyle'),
		'desc' => __('Select font for the body text', 'skt-cutsnstyle'),
		'id' => 'bodyfontface',
		'type' => 'select',
		'std' => 'Arimo',
		'options' => $font_types );
		
	$options[] = array(
		'desc' => __('Select font for the textual logo', 'skt-cutsnstyle'),
		'id' => 'logofontface',
		'type' => 'select',
		'std' => 'Roboto',
		'options' => $font_types );
		
	$options[] = array(
		'desc' => __('Select font for the navigation text', 'skt-cutsnstyle'),
		'id' => 'navfontface',
		'type' => 'select',
		'std' => 'Roboto',
		'options' => $font_types );
		
	$options[] = array(
		'desc' => __('Select font for heading text. eg: Section Title', 'skt-cutsnstyle'),
		'id' => 'headfontface',
		'type' => 'select',
		'std' => 'Roboto',
		'options' => $font_types );
			
	$options[] = array(
		'desc' => __('Select font for Slide title', 'skt-cutsnstyle'),
		'id' => 'slidetitlefontface',
		'type' => 'select',
		'std' => 'Roboto',
		'options' => $font_types );	
		
	$options[] = array(
		'desc' => __('Select font for Slide Description', 'skt-cutsnstyle'),
		'id' => 'slidedesfontface',
		'type' => 'select',
		'std' => 'Roboto',
		'options' => $font_types );	
		
	$options[] = array(
		'desc' => __('Select font face for the services team title and description', 'skt-cutsnstyle'),
		'id' => 'teamservfontface',
		'type' => 'select',
		'std' => 'Roboto',
		'options' => $font_types );
		
	$options[] = array(
		'desc' => __('Select font face for the h1 heading', 'skt-cutsnstyle'),
		'id' => 'h1fontface',
		'type' => 'select',
		'std' => 'Roboto',
		'options' => $font_types );	
		
	$options[] = array(
		'desc' => __('Select font face for the h2 heading', 'skt-cutsnstyle'),
		'id' => 'h2fontface',
		'type' => 'select',
		'std' => 'Roboto',
		'options' => $font_types );	

	$options[] = array(
		'desc' => __('Select font face for the h3 heading', 'skt-cutsnstyle'),
		'id' => 'h3fontface',
		'type' => 'select',
		'std' => 'Roboto',
		'options' => $font_types );	

	$options[] = array(
		'desc' => __('Select font face for the h4 heading', 'skt-cutsnstyle'),
		'id' => 'h4fontface',
		'type' => 'select',
		'std' => 'Roboto',
		'options' => $font_types );	

	$options[] = array(
		'desc' => __('Select font face for the h5 heading', 'skt-cutsnstyle'),
		'id' => 'h5fontface',
		'type' => 'select',
		'std' => 'Roboto',
		'options' => $font_types );	

	$options[] = array(
		'desc' => __('Select font face for the h6 heading', 'skt-cutsnstyle'),
		'id' => 'h6fontface',
		'type' => 'select',
		'std' => 'Roboto',
		'options' => $font_types );	

		
	// font sizes start	
	$options[] = array(
		'name' => __('Font Sizes', 'skt-cutsnstyle'),
		'desc' => __('Select font size for body text', 'skt-cutsnstyle'),
		'id' => 'bodyfontsize',
		'type' => 'select',
		'std' => '13px',
		'options' => $font_sizes );
		
	$options[] = array(
		'desc' => __('Select font size for textual logo', 'skt-cutsnstyle'),
		'id' => 'logofontsize',
		'type' => 'select',
		'std' => '36px',
		'options' => $font_sizes );
		
	$options[] = array(
		'desc' => __('Select font size for textual logo tagline', 'skt-cutsnstyle'),
		'id' => 'logotagfontsize',
		'type' => 'select',
		'std' => '13px',
		'options' => $font_sizes );		
		
		
	$options[] = array(
		'desc' => __('Select font size for navigation', 'skt-cutsnstyle'),
		'id' => 'navfontsize',
		'type' => 'select',
		'std' => '14px',
		'options' => $font_sizes );	
		
	$options[] = array(
		'desc' => __('Select font size for section title', 'skt-cutsnstyle'),
		'id' => 'sectitlesize',
		'type' => 'select',
		'std' => '38px',
		'options' => $font_sizes );
		
	$options[] = array(
		'desc' => __('Select font size for welcome title', 'skt-cutsnstyle'),
		'id' => 'welcomefontsize',
		'type' => 'select',
		'std' => '64px',
		'options' => $font_sizes );
		
	$options[] = array(
		'desc' => __('Select font size for our services and our team', 'skt-cutsnstyle'),
		'id' => 'teamservfontsize',
		'type' => 'select',
		'std' => '16px',
		'options' => $font_sizes );
		
	$options[] = array(
		'desc' => __('Select font size for footer title', 'skt-cutsnstyle'),
		'id' => 'ftfontsize',
		'type' => 'select',
		'std' => '26px',
		'options' => $font_sizes );	

	$options[] = array(
		'desc' => __('Select h1 font size', 'skt-cutsnstyle'),
		'id' => 'h1fontsize',
		'std' => '32px',
		'type' => 'select',
		'options' => $font_sizes);

	$options[] = array(
		'desc' => __('Select h2 font size', 'skt-cutsnstyle'),
		'id' => 'h2fontsize',
		'std' => '26px',
		'type' => 'select',
		'options' => $font_sizes);

	$options[] = array(
		'desc' => __('Select h3 font size', 'skt-cutsnstyle'),
		'id' => 'h3fontsize',
		'std' => '18px',
		'type' => 'select',
		'options' => $font_sizes);

	$options[] = array(
		'desc' => __('Select h4 font size', 'skt-cutsnstyle'),
		'id' => 'h4fontsize',
		'std' => '22px',
		'type' => 'select',
		'options' => $font_sizes);

	$options[] = array(
		'desc' => __('Select h5 font size', 'skt-cutsnstyle'),
		'id' => 'h5fontsize',
		'std' => '20px',
		'type' => 'select',
		'options' => $font_sizes);

	$options[] = array(
		'desc' => __('Select h6 font size', 'skt-cutsnstyle'),
		'id' => 'h6fontsize',
		'std' => '16px',
		'type' => 'select',
		'options' => $font_sizes);


	// font colors start

	$options[] = array(
		'name' => __('Font Colors', 'skt-cutsnstyle'),
		'desc' => __('Select font color for the body text', 'skt-cutsnstyle'),
		'id' => 'bodyfontcolor',
		'std' => '#78797c',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select font color for textual logo', 'skt-cutsnstyle'),
		'id' => 'logofontcolor',
		'std' => '#f00a77',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select font color for textual logo tagline', 'skt-cutsnstyle'),
		'id' => 'logotagfontcolor',
		'std' => '#f00a77',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select font color for section title', 'skt-cutsnstyle'),
		'id' => 'sectitlecolor',
		'std' => '#343434',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for welcome title', 'skt-cutsnstyle'),
		'id' => 'welcomecolor',
		'std' => '#343434',
		'type' => 'color');			
	
	$options[] = array(
		'desc' => __('Select font color for navigation', 'skt-cutsnstyle'),
		'id' => 'navfontcolor',
		'std' => '#1a191e',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select font color for navigation hover', 'skt-cutsnstyle'),
		'id' => 'navhovercolor',
		'std' => '#f00a77',
		'type' => 'color');
	
	$options[] = array(
		'desc' => __('Select font color for navigation', 'skt-cutsnstyle'),
		'id' => 'opningtimefontcolor',
		'std' => '#ffffff',
		'type' => 'color');		
		
	$options[] = array(
		'desc' => __('Select font color for widget title', 'skt-cutsnstyle'),
		'id' => 'wdgttitleccolor',
		'std' => '#ffffff',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select font color for footer title', 'skt-cutsnstyle'),
		'id' => 'foottitlecolor',
		'std' => '#ffffff',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select font color for footer', 'skt-cutsnstyle'),
		'id' => 'footdesccolor',
		'std' => '#8e8d8d',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for footer anchor tag ', 'skt-cutsnstyle'),
		'id' => 'footermenucolor',
		'std' => '#f00a77',
		'type' => 'color');		
		
	$options[] = array(
		'desc' => __('Select hover font color for footer ', 'skt-cutsnstyle'),
		'id' => 'footermenucurrent',
		'std' => '#8e8d8d',
		'type' => 'color');			
		
	$options[] = array(
		'desc' => __('Select font color for footer left text (copyright)', 'skt-cutsnstyle'),
		'id' => 'copycolor',
		'std' => '#ffffff',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select font color for footer right text (design by)', 'skt-cutsnstyle'),
		'id' => 'designcolor',
		'std' => '#ffffff',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select font color for links / anchor tags', 'skt-cutsnstyle'),
		'id' => 'linkcolor',
		'std' => '#f00a77',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select font color for links / anchor tags on hover', 'skt-cutsnstyle'),
		'id' => 'linkhovercolor',
		'std' => '#e7e6e6',
		'type' => 'color');			
		
	$options[] = array(
		'desc' => __('Select font color for sidebar li a', 'skt-cutsnstyle'),
		'id' => 'sidebarfontcolor',
		'std' => '#78797c',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font hover color for sidebar li a', 'skt-cutsnstyle'),
		'id' => 'sidebarfonthvcolor',
		'std' => '#f1177e',
		'type' => 'color');			
			
	$options[] = array(
		'desc' => __('Select font color for Testimonials title', 'skt-cutsnstyle'),
		'id' => 'tmn_titlefontcolor',
		'std' => '#3c3b3b',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font color for footer links', 'skt-cutsnstyle'),
		'id' => 'copylinks',
		'std' => '#f00a77',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font hover color for footer links', 'skt-cutsnstyle'),
		'id' => 'copylinkshover',
		'std' => '#ffffff',
		'type' => 'color');		
		
	$options[] = array(
		'desc' => __('Select font color for social icons', 'skt-cutsnstyle'),
		'id' => 'socialfontcolor',
		'std' => '#ffffff',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select border hover color for social icons', 'skt-cutsnstyle'),
		'id' => 'socialfonthvcolor',
		'std' => '#ffffff',
		'type' => 'color');	

	$options[] = array(
		'desc' => __('Select font color for our team title designation and description', 'skt-cutsnstyle'),
		'id' => 'teamtitlecolor',
		'std' => '#212121',
		'type' => 'color');	

	$options[] = array(
		'desc' => __('Select color for our team social icon', 'skt-cutsnstyle'),
		'id' => 'teamsicolor',
		'std' => '#222222',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select hover color for our team social icon', 'skt-cutsnstyle'),
		'id' => 'teamsicolorhv',
		'std' => '#f04696',
		'type' => 'color');	

	$options[] = array(		
		'desc' => __('Select font color for first section below the slider', 'skt-cutsnstyle'),
		'id' => 'fsh2color',
		'std' => '#000000',
		'type' => 'color');	

	$options[] = array(
		'desc' => __('Select h1 font color', 'skt-cutsnstyle'),
		'id' => 'h1fontcolor',
		'std' => '#343434',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select h2 font color', 'skt-cutsnstyle'),
		'id' => 'h2fontcolor',
		'std' => '#343434',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select h3 font color', 'skt-cutsnstyle'),
		'id' => 'h3fontcolor',
		'std' => '#343434',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select h4 font color', 'skt-cutsnstyle'),
		'id' => 'h4fontcolor',
		'std' => '#343434',
		'type' => 'color');	

	$options[] = array(
		'desc' => __('Select h5 font color', 'skt-cutsnstyle'),
		'id' => 'h5fontcolor',
		'std' => '#343434',
		'type' => 'color');	

	$options[] = array(
		'desc' => __('Select h6 font color', 'skt-cutsnstyle'),
		'id' => 'h6fontcolor',
		'std' => '#343434',
		'type' => 'color');	

	// Background start		
	$options[] = array(	
		'name' => __('Background Colors', 'skt-cutsnstyle'),	
		'desc' => __('Select background color for header', 'skt-cutsnstyle'),
		'id' => 'headerbg',
		'std' => '#000000',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background section first', 'skt-cutsnstyle'),
		'id' => 'section1bgcolor',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background section second', 'skt-cutsnstyle'),
		'id' => 'section2bgcolor',
		'std' => '#fbfafa',
		'type' => 'color');		
	
	$options[] = array(
		'desc' => __('Select background color for nav', 'skt-cutsnstyle'),
		'id' => 'navbgcolor',
		'std' => '#ffffff',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select border color for nav li', 'skt-cutsnstyle'),
		'id' => 'navlibdcolor',
		'std' => '#e7e6e6',
		'type' => 'color');
		

	$options[] = array(
		'desc' => __('Select background color for Opning Time', 'skt-cutsnstyle'),
		'id' => 'opningtimebgcolor',
		'std' => '#000000',
		'type' => 'color');
		
	$options[] = array(		
		'desc' => __('Select opacity for Opning Time background', 'skt-cutsnstyle'),
		'id' => 'opningtimebgopacity',
		'std' => '0.6',
		'type' => 'select',
		'options'	=> array('1'=>1, '0.9'=>0.9,'0.8'=>0.8,'0.7'=>0.7,'0.6'=>0.6,'0.5'=>0.5,'0.4'=>0.4,'0.3'=>0.3,'0.2'=>0.2,));		
	
	$options[] = array(
		'desc' => __('Select background color for our team social icon', 'skt-cutsnstyle'),
		'id' => 'teamsocialbrbg',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background color for our team description', 'skt-cutsnstyle'),
		'id' => 'teamdescriptionbrbg',
		'std' => '#f7f6f6',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background color for All image hover', 'skt-cutsnstyle'),
		'id' => 'teamthumbrbg',
		'std' => '#f1177e',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background color for social icon', 'skt-cutsnstyle'),
		'id' => 'socialbgcolor',
		'std' => '#d4d3d3',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background hover color for social icon', 'skt-cutsnstyle'),
		'id' => 'socialbgcolorhv',
		'std' => '#f1177e',
		'type' => 'color');		
	
	
		
	$options[] = array(
		'desc' => __('Select background color for footer', 'skt-cutsnstyle'),
		'id' => 'footerbgcolor',
		'std' => '#121212',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select background color for copyright section', 'skt-cutsnstyle'),
		'id' => 'copybgcolor',
		'std' => '#000000',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select background color for gallery hover', 'skt-cutsnstyle'),
		'id' => 'galhvcolor',
		'std' => '#f1177e',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select background color for sidebar widget', 'skt-cutsnstyle'),
		'id' => 'sidebarbgcolor',
		'std' => '#f9f9f9',
		'type' => 'color');	
		
	$options[] = array(	
		'desc' => __('Select background color for header top bar', 'skt-cutsnstyle'),
		'id' => 'hdrtopbgcolor',
		'std' => '#f5f5f5',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background color for toggle menu', 'skt-cutsnstyle'),
		'id' => 'togglemenu',
		'std' => '#f00a77',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background color for top search form', 'skt-cutsnstyle'),
		'id' => 'searchbgcolor',
		'std' => '#f1177e',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background color for testimonials description', 'skt-cutsnstyle'),
		'id' => 'tmndescbgcolor',
		'std' => '#f8f8f8',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background color for testimonials pagination', 'skt-cutsnstyle'),
		'id' => 'tmnpagerbg',
		'std' => '#464d51',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background hover color for testimonials pagination', 'skt-cutsnstyle'),
		'id' => 'tmnpagerbghv',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background color for sidebat widget title', 'skt-cutsnstyle'),
		'id' => 'widgettitlebgcolor',
		'std' => '#f1177e',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background color for toggle menu on responsive view', 'skt-cutsnstyle'),
		'id' => 'tgmenuresponsivebg',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background color for testimonials thumbnails', 'skt-cutsnstyle'),
		'id' => 'tmthumbgcolor',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select background color for slider loadings', 'skt-cutsnstyle'),
		'id' => 'slideloadingbg',
		'std' => '#ffffff',
		'type' => 'color');																			


	// Border colors
	$options[] = array(
		'name' => __('Border Colors', 'skt-cutsnstyle'),	
		'desc' => __('Select border color for All', 'skt-cutsnstyle'),
		'id' => 'allbdcolor',
		'std' => '#f1177e',
		'type' => 'color');		
		
	$options[] = array(
		'desc' => __('Select border color for All Gray color', 'skt-cutsnstyle'),
		'id' => 'grayallbdcolor',
		'std' => '#eceaeb',
		'type' => 'color');		
			
	$options[] = array(	
		'desc' => __('Select border color for footer posts', 'skt-cutsnstyle'),
		'id' => 'footerpostborder',
		'std' => '#5e6162',
		'type' => 'color');	

	$options[] = array(
		'desc' => __('Select border color for Opning Time Separator', 'skt-cutsnstyle'),
		'id' => 'separatorbdcolor',
		'std' => '#434548',
		'type' => 'color');	
			
	$options[] = array(
		'desc' => __('Select border color for footer column separator', 'skt-cutsnstyle'),
		'id' => 'footercolumnbdcolor',
		'std' => '#3b3b3b',
		'type' => 'color');	

	$options[] = array(			
		'desc' => __('Select border color for iframe', 'skt-cutsnstyle'),
		'id' => 'iframeborder',
		'std' => '#e5e5e4',
		'type' => 'color');	
		
	$options[] = array(			
		'desc' => __('Select border color for sidebar li a', 'skt-cutsnstyle'),
		'id' => 'sidebarliaborder',
		'std' => '#d0cfcf',
		'type' => 'color');	
		
	$options[] = array(			
		'desc' => __('Select border color for read more button', 'skt-cutsnstyle'),
		'id' => 'readmorebutton',
		'std' => '#454545',
		'type' => 'color');	
	
	$options[] = array(			
		'desc' => __('Select border hover color for read more button', 'skt-cutsnstyle'),
		'id' => 'readmorebuttonhv',
		'std' => '#f1177e',
		'type' => 'color');			

	// Default Buttons		
	$options[] = array(
		'name' => __('Button Colors', 'skt-cutsnstyle'),		
		'desc' => __('Select background color for button', 'skt-cutsnstyle'),
		'id' => 'btnbgcolor',
		'std' => '#f00a77',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select hover background color for button', 'skt-cutsnstyle'),
		'id' => 'btnbghvcolor',
		'std' => '#343434',
		'type' => 'color');		

	$options[] = array(
		'desc' => __('Select font color button', 'skt-cutsnstyle'),
		'id' => 'btntxtcolor',
		'std' => '#ffffff',
		'type' => 'color');

	$options[] = array(
		'desc' => __('Select font color button on hover', 'skt-cutsnstyle'),
		'id' => 'btntxthvcolor',
		'std' => '#ffffff',
		'type' => 'color');	

	$options[] = array(
		'desc' => __('Select active border bottom color for filter gallery', 'skt-cutsnstyle'),
		'id' => 'galleryactivebc',
		'std' => '#f1177e',
		'type' => 'color');			
					
		
	// Slider Caption colors	
	$options[] = array(	
		'name' => __('Slider Caption Colors', 'skt-cutsnstyle'),			
		'desc' => __('Select font color for slider title', 'skt-cutsnstyle'),
		'id' => 'slidetitlecolor',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(		
		'desc' => __('Select font color for slider description', 'skt-cutsnstyle'),
		'id' => 'slidedesccolor',
		'std' => '#ffffff',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select font size for slider title', 'skt-cutsnstyle'),
		'id' => 'slidetitlefontsize',
		'type' => 'select',
		'std' => '40px',
		'options' => $font_sizes );
		
	$options[] = array(
		'desc' => __('Select font size for slider description', 'skt-cutsnstyle'),
		'id' => 'slidedescfontsize',
		'type' => 'select',
		'std' => '14px',
		'options' => $font_sizes );
		
	// Slider controls colors		
	$options[] = array(
		'name' => __('Slider controls Colors', 'skt-cutsnstyle'),
		'desc' => __('Select background color for slider pager', 'skt-cutsnstyle'),
		'id' => 'sldpagebg',
		'std' => '#ffffff',
		'type' => 'color');
		
	$options[] = array(
		'desc' => __('Select background color for slider pager active', 'skt-cutsnstyle'),
		'id' => 'sldpagehvbg',
		'std' => '#f00a77',
		'type' => 'color');	
		
	$options[] = array(
		'desc' => __('Select Border color for slider pager', 'skt-cutsnstyle'),
		'id' => 'sldpagehvbd',
		'std' => '#ffffff',
		'type' => 'color');	

	$options[] = array(
		'name' => __('Blog Single Layout', 'skt-cutsnstyle'),
		'desc' => __('Select layout. eg:Boxed, Wide', 'skt-cutsnstyle'),
		'id' => 'singlelayout',
		'type' => 'select',
		'std' => 'singleright',
		'options' => array('singleright'=>'Blog Single Right Sidebar', 'singleleft'=>'Blog Single Left Sidebar', 'sitefull'=>'Blog Single Full Width', 'nosidebar'=>'Blog Single No Sidebar') );
		
	$options[] = array(
		'name' => __('Woocommerce Page Layout', 'skt-cutsnstyle'),
		'desc' => __('Select layout. eg:Boxed, Wide', 'skt-cutsnstyle'),
		'id' => 'woocomercelayout',
		'type' => 'select',
		'std' => 'woocomerceright',
		'options' => array('woocomerceright'=>'Woocomerce Right Sidebar', 'woocomerceleft'=>'Woocomerce Left Sidebar', 'woocomercesitefull'=>'Woocomerce Full Width') );
		

	$options[] = array(			
		'name' => __('Woocommerce Price filter color setting', 'skt-cutsnstyle'),
		'desc' => __('Select color for Price slider background', 'skt-cutsnstyle'),
		'id' => 'pricesliderbg',
		'std' => '#cccccc',
		'type' => 'color');	

	$options[] = array(			
		'desc' => __('Select color for Price slider handle background', 'skt-cutsnstyle'),
		'id' => 'pricehandlebg',
		'std' => '#282828',
		'type' => 'color');	

	$options[] = array(			
		'desc' => __('Select color for Price slider Range background', 'skt-cutsnstyle'),
		'id' => 'pricerangebg',
		'std' => '#f1177e',
		'type' => 'color');
		
	$options[] = array(
		'name' => __('Social Icon Style', 'skt-cutsnstyle'),
		'desc' => __('Select Style. eg:circle, square', 'skt-cutsnstyle'),
		'id' => 'socialstyle',		
		'std' => '50',
		'type' => 'select',
		'options' => array('50'=>'Social icons Style in Circle', '0'=>'Social icons Style in Square') );
		
	$options[] = array(	
		'name' => __('Read More Text Button', 'skt-cutsnstyle'),		
		'desc' => __('Change your read more button text for blog templates', 'skt-cutsnstyle'),
		'id' => 'blogreadmoretext',
		'std' => 'Read More',
		'type' => 'text');	

	$options[] = array(	
		'name' => __('Custom Excerpt Length', 'skt-cutsnstyle'),		
		'desc' => __('Select excerpt length for Client Say', 'skt-cutsnstyle'),
		'id' => 'testimonialexcerptlength',
		'std' => '40',
		'type' => 'text');

	$options[] = array(		
		'desc' => __('Select excerpt length for our team member', 'skt-cutsnstyle'),
		'id' => 'teamexcerptlength',
		'std' => '10',
		'type' => 'text');
		
	$options[] = array(		
		'desc' => __('Select excerpt length for homepage latest news', 'skt-cutsnstyle'),
		'id' => 'newsboxlength',
		'std' => '22',
		'type' => 'text');					

	//Layout Settings
	$options[] = array(
		'name' => __('Sections', 'skt-cutsnstyle'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Welcome Page for Section 1','skt-cutsnstyle'),
		'desc'	=> __('select welcome page for frontpage section First','skt-cutsnstyle'),
		'id' 	=> 'welcomepage',
		'type'	=> 'select',
		'options' => $options_pages,
	);
	
	$options[] = array(	
		'desc' => __('Select excerpt length for top welcome section', 'skt-cutsnstyle'),
		'id' => 'welcomesectionlength',
		'std' => '80',
		'type' => 'text');
	
	$options[] = array(			
			'desc'	=> __('Check to hide welcome page section', 'skt-cutsnstyle'),
			'id'	=> 'hidewelcomesec',
			'type'	=> 'checkbox',
			'std'	=> '');	
	
	$options[] = array(
		'name' => __('Services Section Title', 'skt-cutsnstyle'),
		'desc' => __('Add title for services section', 'skt-cutsnstyle'),
		'id' => 'servicestitle',
		'std' => 'Our Services',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Services Box For Section 2','skt-cutsnstyle'),
		'desc'	=> __('First Services box for frontpage section second','skt-cutsnstyle'),
		'id' 	=> 'box1',
		'type'	=> 'select',
		'options' => $options_pages,
	);
	
	$options[] = array(		
		'desc' => __('upload image  for first box.', 'skt-cutsnstyle'),
		'id' => 'boximg1',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');
	
	$options[] = array(	
		'desc'	=> __('Second Services box for frontpage section second','skt-cutsnstyle'),
		'id' 	=> 'box2',
		'type'	=> 'select',
		'options' => $options_pages,
	);
	
	$options[] = array(		
		'desc' => __('upload image  for second box.', 'skt-cutsnstyle'),
		'id' => 'boximg2',
		'std'	=> '',
		'type' => 'upload');
	
	$options[] = array(	
		'desc'	=> __('Third Services box for frontpage section second','skt-cutsnstyle'),
		'id' 	=> 'box3',
		'type'	=> 'select',
		'options' => $options_pages,
	);	
	
	$options[] = array(		
		'desc' => __('upload image  for third box.', 'skt-cutsnstyle'),
		'id' => 'boximg3',
		'std'	=> '',
		'type' => 'upload');

	$options[] = array(	
		'desc'	=> __('Four Services box for frontpage section second','skt-cutsnstyle'),
		'id' 	=> 'box4',
		'type'	=> 'select',
		'options' => $options_pages,
	);	
	
	$options[] = array(		
		'desc' => __('upload image  for fourth box.', 'skt-cutsnstyle'),
		'id' => 'boximg4',
		'std'	=> '',
		'type' => 'upload');
		
	$options[] = array(	
		'desc'	=> __('Five Services box for frontpage section second','skt-cutsnstyle'),
		'id' 	=> 'box5',
		'type'	=> 'select',
		'options' => $options_pages,
	);	
	
	$options[] = array(		
		'desc' => __('upload image  for five box.', 'skt-cutsnstyle'),
		'id' => 'boximg5',
		'std'	=> '',
		'type' => 'upload');
		
	$options[] = array(	
		'desc'	=> __('Six Services box for frontpage section second','skt-cutsnstyle'),
		'id' 	=> 'box6',
		'type'	=> 'select',
		'options' => $options_pages,
	);	
	
	$options[] = array(		
		'desc' => __('upload image  for six box.', 'skt-cutsnstyle'),
		'id' => 'boximg6',
		'std'	=> '',
		'type' => 'upload');
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	$options[] = array(		
		'desc' => __('Select excerpt length for our services three boxes section', 'skt-cutsnstyle'),
		'id' => 'threeboxlength',
		'std' => '8',
		'type' => 'text');	
	
	$options[] = array(			
			'desc'	=> __('Check to hide our servoces three column section', 'skt-cutsnstyle'),
			'id'	=> 'hideservicessec',
			'type'	=> 'checkbox',
			'std'	=> '');

	$options[] = array(
		'name' => __('Number of Sections', 'skt-cutsnstyle'),
		'desc' => __('Select number of sections', 'skt-cutsnstyle'),
		'id' => 'numsection',
		'type' => 'select',
		'std' => '7',
		'options' => array_combine(range(1,30), range(1,30)) );

	$numsecs = of_get_option( 'numsection', 7 );

	for( $n=1; $n<=$numsecs; $n++){
		$options[] = array(
			'desc' => __("<h3>Section ".$n."</h3>", 'skt-cutsnstyle'),
			'class' => 'toggle_title',
			'type' => 'info');	
	
		$options[] = array(
			'name' => __('Section Title', 'skt-cutsnstyle'),
			'id' => 'sectiontitle'.$n,
			'std' => ( ( isset($section_text[$n]['section_title']) ) ? $section_text[$n]['section_title'] : '' ),
			'type' => 'text');

		$options[] = array(
			'name' => __('Section ID', 'skt-cutsnstyle'),
			'desc'	=> __('Enter your section ID here. SECTION ID MUST BE IN SMALL LETTERS ONLY AND DO NOT ADD SPACE OR SYMBOL.', 'skt-cutsnstyle'),
			'id' => 'menutitle'.$n,
			'std' => ( ( isset($section_text[$n]['menutitle']) ) ? $section_text[$n]['menutitle'] : '' ),
			'type' => 'text');

		$options[] = array(
			'name' => __('Section Background Color', 'skt-cutsnstyle'),
			'desc' => __('Select background color for section', 'skt-cutsnstyle'),
			'id' => 'sectionbgcolor'.$n,
			'std' => ( ( isset($section_text[$n]['bgcolor']) ) ? $section_text[$n]['bgcolor'] : '' ),
			'type' => 'color');
			
		$options[] = array(
			'name' => __('Background Image', 'skt-cutsnstyle'),
			'id' => 'sectionbgimage'.$n,
			'class' => '',
			'std' => ( ( isset($section_text[$n]['bgimage']) ) ? $section_text[$n]['bgimage'] : '' ),
			'type' => 'upload');

		$options[] = array(
			'name' => __('Section CSS Class', 'skt-cutsnstyle'),
			'desc' => __('Set class for this section.', 'skt-cutsnstyle'),
			'id' => 'sectionclass'.$n,
			'std' => ( ( isset($section_text[$n]['class']) ) ? $section_text[$n]['class'] : '' ),
			'type' => 'text');
			
		$options[] = array(
			'name'	=> __('Hide Section', 'skt-cutsnstyle'),
			'desc'	=> __('Check to hide this section', 'skt-cutsnstyle'),
			'id'	=> 'hidesec'.$n,
			'type'	=> 'checkbox',
			'std'	=> '');

		$options[] = array(
			'name' => __('Section Content', 'skt-cutsnstyle'),
			'id' => 'sectioncontent'.$n,
			'std' => ( ( isset($section_text[$n]['content']) ) ? $section_text[$n]['content'] : '' ),
			'type' => 'editor');
	}


	//SLIDER SETTINGS
	$options[] = array(
		'name' => __('Homepage Slider', 'skt-cutsnstyle'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Inner Page Banner', 'skt-cutsnstyle'),
		'desc' => __('Upload your default inner page banner', 'skt-cutsnstyle'),
		'id' => 'innerpagebanner',
		'class' => '',
		'std'	=> get_template_directory_uri()."/images/default-banner.jpg",
		'type' => 'upload');
		
		
	$options[] = array(
		'name' => __('Custom Slider Shortcode Area For Home Page', 'skt-cutsnstyle'),
		'desc' => __('Enter here your slider shortcode without php tag', 'skt-cutsnstyle'),
		'id' => 'customslider',
		'std' => '',
		'type' => 'textarea');			
		
	$options[] = array(
		'name' => __('Slider Effects and Timing', 'skt-cutsnstyle'),
		'desc' => __('Select slider effect.','skt-cutsnstyle'),
		'id' => 'slideefect',
		'std' => 'fade',
		'type' => 'select',
		'options' => array('random'=>'Random', 'fade'=>'Fade', 'fold'=>'Fold', 'sliceDown'=>'Slide Down', 'sliceDownLeft'=>'Slide Down Left', 'sliceUp'=>'Slice Up', 'sliceUpLeft'=>'Slice Up Left', 'sliceUpDown'=>'Slice Up Down', 'sliceUpDownLeft'=>'Slice Up Down Left', 'slideInRight'=>'SlideIn Right', 'slideInLeft'=>'SlideIn Left', 'boxRandom'=>'Box Random', 'boxRain'=>'Box Rain', 'boxRainReverse'=>'Box Rain Reverse', 'boxRainGrow'=>'Box Rain Grow', 'boxRainGrowReverse'=>'Box Rain Grow Reverse' ));
		
	$options[] = array(
		'desc' => __('Animation speed should be multiple of 100.', 'skt-cutsnstyle'),
		'id' => 'slideanim',
		'std' => 500,
		'type' => 'text');
		
	$options[] = array(
		'desc' => __('Add slide pause time.', 'skt-cutsnstyle'),
		'id' => 'slidepause',
		'std' => 4000,
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slide Controllers', 'skt-cutsnstyle'),
		'desc' => __('Hide/Show Direction Naviagtion of slider.','skt-cutsnstyle'),
		'id' => 'slidenav',
		'std' => 'false',
		'type' => 'select',
		'options' => array('true'=>'Show', 'false'=>'Hide'));
		
	$options[] = array(
		'desc' => __('Hide/Show pager of slider.','skt-cutsnstyle'),
		'id' => 'slidepage',
		'std' => 'true',
		'type' => 'select',
		'options' => array('true'=>'Show', 'false'=>'Hide'));
		
	$options[] = array(
		'desc' => __('Pause Slide on Hover.','skt-cutsnstyle'),
		'id' => 'slidepausehover',
		'std' => 'false',
		'type' => 'select',
		'options' => array('true'=>'Yes', 'false'=>'No'));
		
		
	$options[] = array(
		'name' => __('Home Slider in Opening table', 'skt-cutsnstyle'),
		'desc' => __('Home slider for Slider in timing shortcode', 'skt-cutsnstyle'),
		'id' => 'openingtiming',
		'std' => '<h2>Opening Time Table</h2>
[timing day="Monday" hours="8:00 - 16:00 "][timing day="Tuesday" hours="8:00 - 16:00 "][timing day="Wednesday" hours="10:00 - 14:00 "][timing day="Thursday" hours="10:00 - 13:00"][timing day="Friday" hours="10:00 - 12:00"][timing day="Saturday" hours="Close"][timing day="Sunday" hours="Close"] ',
		'type' => 'textarea');
		
		
	$options[] = array(
		'name' => __('Slider Image 1', 'skt-cutsnstyle'),
		'desc' => __('First Slide', 'skt-cutsnstyle'),
		'id' => 'slide1',
		'class' => '',
		'std' => get_template_directory_uri()."/images/slides/slider1.jpg",
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 1', 'skt-cutsnstyle'),
		'id' => 'slidetitle1',
		'std' => 'Create Your <strong>Hair Style</strong> With Us',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'skt-cutsnstyle'),
		'id' => 'slidedesc1',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'skt-cutsnstyle'),
		'id' => 'slidebutton1',
		'std' => '',
		'type' => 'text');		

	$options[] = array(
		'desc' => __('Slide Url', 'skt-cutsnstyle'),
		'id' => 'slideurl1',
		'std' => '',
		'type' => 'text');		
		
	
	$options[] = array(
		'name' => __('Slider Image 2', 'skt-cutsnstyle'),
		'desc' => __('Second Slide', 'skt-cutsnstyle'),
		'class' => '',
		'id' => 'slide2',
		'std' => get_template_directory_uri()."/images/slides/slider2.jpg",
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 2', 'skt-cutsnstyle'),
		'id' => 'slidetitle2',
		'std' => 'Create Your <strong>Hair Style</strong> With Us',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'skt-cutsnstyle'),
		'id' => 'slidedesc2',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'skt-cutsnstyle'),
		'id' => 'slidebutton2',
		'std' => '',
		'type' => 'text');			
		
	$options[] = array(
		'desc' => __('Slide Url', 'skt-cutsnstyle'),
		'id' => 'slideurl2',
		'std' => '',
		'type' => 'text');	
	
	$options[] = array(
		'name' => __('Slider Image 3', 'skt-cutsnstyle'),
		'desc' => __('Third Slide', 'skt-cutsnstyle'),
		'id' => 'slide3',
		'class' => '',
		'std' => get_template_directory_uri()."/images/slides/slider3.jpg",
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 3', 'skt-cutsnstyle'),
		'id' => 'slidetitle3',
		'std' => 'Create Your <strong>Hair Style</strong> With Us',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'skt-cutsnstyle'),
		'id' => 'slidedesc3',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'skt-cutsnstyle'),
		'id' => 'slidebutton3',
		'std' => '',
		'type' => 'text');		
		
	$options[] = array(
		'desc' => __('Slide Url', 'skt-cutsnstyle'),
		'id' => 'slideurl3',
		'std' => '',
		'type' => 'text');	
	
	$options[] = array(
		'name' => __('Slider Image 4', 'skt-cutsnstyle'),
		'desc' => __('Fourth Slide', 'skt-cutsnstyle'),
		'id' => 'slide4',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 4', 'skt-cutsnstyle'),
		'id' => 'slidetitle4',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'skt-cutsnstyle'),
		'id' => 'slidedesc4',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'skt-cutsnstyle'),
		'id' => 'slidebutton4',
		'std' => '',
		'type' => 'text');			
		
	$options[] = array(
		'desc' => __('Slide Url', 'skt-cutsnstyle'),
		'id' => 'slideurl4',
		'std' => '',
		'type' => 'text');				
	
	$options[] = array(
		'name' => __('Slider Image 5', 'skt-cutsnstyle'),
		'desc' => __('Fifth Slide', 'skt-cutsnstyle'),
		'id' => 'slide5',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 5', 'skt-cutsnstyle'),
		'id' => 'slidetitle5',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'skt-cutsnstyle'),
		'id' => 'slidedesc5',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'skt-cutsnstyle'),
		'id' => 'slidebutton5',
		'std' => '',
		'type' => 'text');		
		
	$options[] = array(
		'desc' => __('Slide Url', 'skt-cutsnstyle'),
		'id' => 'slideurl5',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slider Image 6', 'skt-cutsnstyle'),
		'desc' => __('Sixth Slide', 'skt-cutsnstyle'),
		'id' => 'slide6',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 6', 'skt-cutsnstyle'),
		'id' => 'slidetitle6',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'skt-cutsnstyle'),
		'id' => 'slidedesc6',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'skt-cutsnstyle'),
		'id' => 'slidebutton6',
		'std' => '',
		'type' => 'text');	
		
	$options[] = array(
		'desc' => __('Slide Url', 'skt-cutsnstyle'),
		'id' => 'slideurl6',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slider Image 7', 'skt-cutsnstyle'),
		'desc' => __('Seventh Slide', 'skt-cutsnstyle'),
		'id' => 'slide7',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 7', 'skt-cutsnstyle'),
		'id' => 'slidetitle7',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'skt-cutsnstyle'),
		'id' => 'slidedesc7',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'skt-cutsnstyle'),
		'id' => 'slidebutton7',
		'std' => '',
		'type' => 'text');		
		
	$options[] = array(
		'desc' => __('Slide Url', 'skt-cutsnstyle'),
		'id' => 'slideurl7',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slider Image 8', 'skt-cutsnstyle'),
		'desc' => __('Eighth Slide', 'skt-cutsnstyle'),
		'id' => 'slide8',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 8', 'skt-cutsnstyle'),
		'id' => 'slidetitle8',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'skt-cutsnstyle'),
		'id' => 'slidedesc8',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'skt-cutsnstyle'),
		'id' => 'slidebutton8',
		'std' => '',
		'type' => 'text');	
		
	$options[] = array(
		'desc' => __('Slide Url', 'skt-cutsnstyle'),
		'id' => 'slideurl8',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slider Image 9', 'skt-cutsnstyle'),
		'desc' => __('Ninth Slide', 'skt-cutsnstyle'),
		'id' => 'slide9',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 9', 'skt-cutsnstyle'),
		'id' => 'slidetitle9',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'skt-cutsnstyle'),
		'id' => 'slidedesc9',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'skt-cutsnstyle'),
		'id' => 'slidebutton9',
		'std' => '',
		'type' => 'text');		
		
	$options[] = array(
		'desc' => __('Slide Url', 'skt-cutsnstyle'),
		'id' => 'slideurl9',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Slider Image 10', 'skt-cutsnstyle'),
		'desc' => __('Tenth Slide', 'skt-cutsnstyle'),
		'id' => 'slide10',
		'class' => '',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => __('Title 10', 'skt-cutsnstyle'),
		'id' => 'slidetitle10',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'skt-cutsnstyle'),
		'id' => 'slidedesc10',
		'std' => '',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Read More Button Text', 'skt-cutsnstyle'),
		'id' => 'slidebutton10',
		'std' => '',
		'type' => 'text');		
	
	$options[] = array(
		'desc' => __('Slide Url', 'skt-cutsnstyle'),
		'id' => 'slideurl10',
		'std' => '',
		'type' => 'text');

	//Footer SETTINGS
	$options[] = array(
		'name' => __('Footer', 'skt-cutsnstyle'),
		'type' => 'heading');
				
	$options[] = array(
		'name' => __('Footer About Hair Salone', 'skt-cutsnstyle'),
		'desc' => __('about Hair Salone text title for footer', 'skt-cutsnstyle'),
		'id' => 'aboutustitle',
		'std' => 'About Cuts n Style',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('About Hair Salone Description', 'skt-cutsnstyle'),
		'desc' => __('about Hair Salone text description for footer', 'skt-cutsnstyle'),
		'id' => 'aboutdescription',
		'std' => '<p>Donec ut ex ac nulla pellentesque mollis in a enim. Praesent placerat sapien mauris, vitae sodales tellus venenatis ac. Suspendisse suscipit velit id ultricies auctor. Duis turpis arcu, aliquet sed sollicitudin sed, porta quis urna. Quisque velit nibh, egestas et erat a, vehicula interdum augue. Morbi ut elementum justo. Sed eu nibh orci. Vivamus elementum erat orci. Curabitur consequat convallis dapibus.</p> ',
		'type' => 'textarea');
		
	$options[] = array(
		'name' => __('Recent Posts Title', 'skt-cutsnstyle'),
		'desc' => __('Footer Recent Posts links title.', 'skt-cutsnstyle'),
		'id' => 'recentpoststitle',
		'std' => 'Recent Posts',
		'type' => 'text');
		
	$options[] = array(		
		'desc' => __('Read more button text for footer recent posts', 'skt-cutsnstyle'),
		'id' => 'footerreadmoretext',
		'std' => 'Read more...',
		'type' => 'text');		
		
	$options[] = array(
		'name' => __(' Footer Cuts n Style Title', 'skt-cutsnstyle'),
		'desc' => __('Cuts n Style title for footer.', 'skt-cutsnstyle'),
		'id' => 'cutsstyletitle',
		'std' => 'Cuts n Style',
		'type' => 'text');	
		
		
	$options[] = array(
		'name' => __('contact page Address Title', 'skt-cutsnstyle'),
		'desc' => __('Add contact title here', 'skt-cutsnstyle'),
		'id' => 'contacttitle',
		'std' => 'Contact Info',
		'type' => 'text');	
		
	$options[] = array(	
		'desc' => __('Add company address1 here.', 'skt-cutsnstyle'),
		'id' => 'address',
		'std' => 'Street 238,52 tempor',
		'type' => 'text');
		
	$options[] = array(	
		'desc' => __('Add company address2 here.', 'skt-cutsnstyle'),
		'id' => 'address2',
		'std' => 'Donec ultricies mattis nulla, suscipit risus iru iru tritique ut.',
		'type' => 'text');	
		
	$options[] = array(		
		'desc' => __('Add phone number here.', 'skt-cutsnstyle'),
		'id' => 'phone',
		'std' => ' (012) 345 6789',
		'type' => 'text');
		
	$options[] = array(
		'desc' => __('Add email address here.', 'skt-cutsnstyle'),
		'id' => 'email',
		'std' => 'hello@example.com',
		'type' => 'text');
		
	$options[] = array(
		'desc' => __('Add company url here with http://.', 'skt-cutsnstyle'),
		'id' => 'weblink',
		'std' => 'http://demo.com',
		'type' => 'text');
		
		$options[] = array(
		'name' => __('Google Map', 'skt-cutsnstyle'),
		'desc' => __('Use iframe code url here. DO NOT APPLY IFRAME TAG', 'skt-exceptiona'),
		'id' => 'googlemap',
		'std' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d336003.6066860609!2d2.349634820486094!3d48.8576730786213!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x040b82c3688c9460!2sParis%2C+France!5e0!3m2!1sen!2sin!4v1433482358672',
		'type' => 'textarea');
		
	$options[] = array(
		'name' => __('Footer Copyright', 'skt-cutsnstyle'),
		'desc' => __('Copyright Text for your site.', 'skt-cutsnstyle'),
		'id' => 'copytext',
		'std' => '&copy; 2016 <a href="#">SKT Cutsnstyle. </a> All Rights Reserved',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => __('Footre Text Link', 'skt-cutsnstyle'),
		'id' => 'ftlink',
		'std' => 'Design by <a href="'.esc_url('http://www.sktthemes.net/').'" target="_blank">SKT Themes</a>',
		'type' => 'textarea',);

	//Short codes
	$options[] = array(
		'name' => __('Short Codes', 'skt-cutsnstyle'),
		'type' => 'heading');	
		
	
	$options[] = array(
		'name' => __('Photo Gallery', 'skt-cutsnstyle'),
		'desc' => __('[photogallery filter="false"]', 'skt-cutsnstyle'),
		'type' => 'info');			
			
		
	$options[] = array(
		'name' => __('Testimonials', 'skt-cutsnstyle'),
		'desc' => __('[testimonials] and all [testimonials show="2"]', 'skt-cutsnstyle'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Contact Form', 'skt-cutsnstyle'),
		'desc' => __('[contactform to_email="test@example.com" title="Contact Form"] 
', 'skt-cutsnstyle'),
		'type' => 'info');		

	$options[] = array(
		'name' => __('Team Member', 'skt-cutsnstyle'),
		'desc' => __('[ourteam show="4"] and all [ourteam]', 'skt-cutsnstyle'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Latest Post', 'skt-cutsnstyle'),
		'desc' => __('[latestposts show="4"] and all [latestposts]', 'skt-cutsnstyle'),
		'type' => 'info');	
		
		$options[] = array(
		'name' => __('Slider inner Opening Time Table ', 'skt-cutsnstyle'),
		'desc' => __('[timing day="Monday" hours="8:00 - 16:00 "][timing day="Tuesday" hours="8:00 - 16:00 "][timing day="Wednesday" hours="10:00 - 14:00 "][timing day="Thursday" hours="10:00 - 13:00"][timing day="Friday" hours="10:00 - 12:00"][timing day="Saturday" hours="Close"][timing day="Sunday" hours="Close"] ', 'skt-cutsnstyle'),
		'type' => 'info');		
		
		
	$options[] = array(
		'name' => __('All Days And Timing', 'skt-cutsnstyle'),
		'desc' => __('[stat_main][stat everyday="Mon" bgcolor="#fff" textcolor="#5b5a5a"]8:00 - 16:00[/stat] [stat everyday="Tue" bgcolor="#fff" textcolor="#5b5a5a"]8:00 - 16:00[/stat][stat everyday="Wed" bgcolor="#fff" textcolor="#5b5a5a"]8:00 - 16:00[/stat] [stat everyday="Thu" bgcolor="#fff" textcolor="#5b5a5a"]8:00 - 16:00[/stat] [stat everyday="Fri" bgcolor="#fff" textcolor="#5b5a5a"]8:00 - 16:00[/stat] [stat everyday="Sat" bgcolor="#000" textcolor="#5b5a5a"]CLOSED[/stat][stat everyday="Sun" bgcolor="#000" textcolor="#5b5a5a"]CLOSED[/stat][/stat_main]', 'skt-cutsnstyle'),
		'type' => 'info');			
		

	$options[] = array(
		'name' => __('Search Form', 'skt-cutsnstyle'),
		'desc' => __('[searchform]', 'skt-cutsnstyle'),
		'type' => 'info');
			
		
	$options[] = array(
		'name' => __('Headings', 'skt-cutsnstyle'),
		'desc' => __('[heading underline="yes" align="left"]Our Team[/heading]', 'skt-cutsnstyle'),
		'type' => 'info');					

	$options[] = array(
		'name' => __('View More Button', 'skt-cutsnstyle'),
		'desc' => __('[readmore-link align="left" button="Read More" links="#"]', 'skt-cutsnstyle'),
		'type' => 'info');	

		
	$options[] = array(
		'name' => __('Social Icons ( Note: More social icons can be found at: http://fortawesome.github.io/Font-Awesome/icons/)', 'skt-cutsnstyle'),
		'desc' => __('[social_area]
    [social icon="facebook" link="#"]
    [social icon="twitter" link="#"]
    [social icon="linkedin" link="#"]
    [social icon="pinterest" link="#"]
    [social icon="google-plus" link="#"]
	[social icon="youtube" link="#"]
	[social icon="wordpress" link="#"]
	[social icon="flickr" link="#"]
	[social icon="skype" link="#"]
[/social_area]', 'skt-cutsnstyle'),
		'type' => 'info');	
		
	$options[] = array(
		'name' => __('Animation Name list', 'skt-cutsnstyle'),
		'desc' => __('bounce, flash, pulse, shake, swing, tada, wobble, bounceIn, bounceInDown, bounceInLeft, bounceInRight, bounceInUp, bounceOut, bounceOutDown, bounceOutLeft, bounceOutRight, bounceOutUp, fadeIn, fadeInDown, fadeInDownBig, fadeInLeft, fadeInLeftBig, fadeInRight, fadeInRightBig, fadeInUp, fadeInUpBig, fadeOut, fadeOutDown, fadeOutDownBig, fadeOutLeft, fadeOutLeftBig, fadeOutRight, fadeOutRightBig, fadeOutUp, fadeOutUpBig, flip, flipInX, flipInY, flipOutX, flipOutY, lightSpeedIn, lightSpeedOut, rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight, rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight, slideInDown, slideInLeft, slideInRight, slideOutLeft, slideOutRight, slideOutUp, rollIn, rollOut, zoomIn, zoomInDown, zoomInLeft, zoomInRight, zoomInUp', 'skt-cutsnstyle'),
		'type' => 'info');	

	$options[] = array(
		'name' => __('2 Column Content', 'skt-cutsnstyle'),
		'desc' => __('<pre>
[column_content type="one_half" animation="name of animation"]
	Column 1 Content goes here...
[/column_content]

[column_content type="one_half_last" animation="name of animation"]
	Column 2 Content goes here...
[/column_content]
</pre>', 'skt-cutsnstyle'),
		'type' => 'info');	

	$options[] = array(
		'name' => __('3 Column Content', 'skt-cutsnstyle'),
		'desc' => __('<pre>
[column_content type="one_third" animation="name of animation"]
	Column 1 Content goes here...
[/column_content]

[column_content type="one_third" animation="name of animation"]
	Column 2 Content goes here...
[/column_content]

[column_content type="one_third_last" animation="name of animation"]
	Column 3 Content goes here...
[/column_content]
</pre>', 'skt-cutsnstyle'),
		'type' => 'info');	

	$options[] = array(
		'name' => __('4 Column Content', 'skt-cutsnstyle'),
		'desc' => __('<pre>
[column_content type="one_fourth" animation="name of animation"]
	Column 1 Content goes here...
[/column_content]

[column_content type="one_fourth" animation="name of animation"]
	Column 2 Content goes here...
[/column_content]

[column_content type="one_fourth" animation="name of animation"]
	Column 3 Content goes here...
[/column_content]

[column_content type="one_fourth_last" animation="name of animation"]
	Column 4 Content goes here...
[/column_content]
</pre>', 'skt-cutsnstyle'),
		'type' => 'info');	

	$options[] = array(
		'name' => __('5 Column Content', 'skt-cutsnstyle'),
		'desc' => __('<pre>
[column_content type="one_fifth" animation="name of animation"]
	Column 1 Content goes here...
[/column_content]

[column_content type="one_fifth" animation="name of animation"]
	Column 2 Content goes here...
[/column_content]

[column_content type="one_fifth" animation="name of animation"]
	Column 3 Content goes here...
[/column_content]

[column_content type="one_fifth" animation="name of animation"]
	Column 4 Content goes here...
[/column_content]

[column_content type="one_fifth_last" animation="name of animation"]
	Column 5 Content goes here...
[/column_content]
</pre>', 'skt-cutsnstyle'),
		'type' => 'info');	

	$options[] = array(
		'name' => __('Clear', 'skt-cutsnstyle'),
		'desc' => __('<pre>
[clear]
</pre>', 'skt-cutsnstyle'),
		'type' => 'info');	

	$options[] = array(
		'name' => __('HR / Horizontal separation line', 'skt-cutsnstyle'),
		'desc' => __('<pre>
[hr] or &lt;hr&gt;
</pre>', 'skt-cutsnstyle'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Separator / blank space', 'skt-cutsnstyle'),
		'desc' => __('<pre>
[separator height="20"]
</pre>', 'skt-cutsnstyle'),
		'type' => 'info');	
		
	$options[] = array(
		'name' => __('Blank space without image', 'skt-cutsnstyle'),
		'desc' => __('<pre>
[blankspace height="20"]
</pre>', 'skt-cutsnstyle'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Tabs', 'skt-cutsnstyle'),
		'desc' => __('<pre>
[tabs]
	[tab title="TAB TITLE 1"]
		TAB CONTENT 1
	[/tab]
	[tab title="TAB TITLE 2"]
		TAB CONTENT 2
	[/tab]
	[tab title="TAB TITLE 3"]
		TAB CONTENT 3
	[/tab]
[/tabs]
</pre>', 'skt-cutsnstyle'),
		'type' => 'info');


	$options[] = array(
		'name' => __('Toggle Content', 'skt-cutsnstyle'),
		'desc' => __('<pre>
[toggle_content title="Toggle Title 1"]
	Toggle content 1...
[/toggle_content]
[toggle_content title="Toggle Title 2"]
	Toggle content 2...
[/toggle_content]
[toggle_content title="Toggle Title 3"]
	Toggle content 3...
[/toggle_content]
</pre>', 'skt-cutsnstyle'),
		'type' => 'info');


	$options[] = array(
		'name' => __('Accordion Content', 'skt-cutsnstyle'),
		'desc' => __('<pre>
[accordion]
	[accordion_content title="ACCORDION TITLE 1"]
		ACCORDION CONTENT 1
	[/accordion_content]
	[accordion_content title="ACCORDION TITLE 2"]
		ACCORDION CONTENT 2
	[/accordion_content]
	[accordion_content title="ACCORDION TITLE 3"]
		ACCORDION CONTENT 3
	[/accordion_content]
[/accordion]
</pre>', 'skt-cutsnstyle'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Gradient Button - Small', 'skt-cutsnstyle'),
		'desc' => __('<pre>
[gradient_button size="small" bg_color="#e00" color="#fff" text="Medium Gradient Button" title="Medium Gradient Button" url="" position="left"]
</pre>', 'skt-cutsnstyle'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Gradient Button - Medium', 'skt-cutsnstyle'),
		'desc' => __('<pre>
[gradient_button size="medium" bg_color="#060" color="#fff" text="Medium Gradient Button" title="Medium Gradient Button" url="" position="left"]
</pre>', 'skt-cutsnstyle'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Gradient Button - Large', 'skt-cutsnstyle'),
		'desc' => __('<pre>
[gradient_button size="large" bg_color="#026" color="#fff" text="Large Gradient Button" title="Large Gradient Button" url="" position="left"]
</pre>', 'skt-cutsnstyle'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Gradient Button - Xtra Large', 'skt-cutsnstyle'),
		'desc' => __('<pre>
[gradient_button size="x-large" bg_color="#00ccff" color="#fff" text="Extra Large Simple Button" title="Extra Large Simple Button" url="" position="left"]
</pre>', 'skt-cutsnstyle'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Simple Button - Small', 'skt-cutsnstyle'),
		'desc' => __('<pre>
[simple_button size="small" bg_color="#c00" color="#fff" text="Small Simple Button" title="Small Simple Button" url="#" position="left"]
</pre>', 'skt-cutsnstyle'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Simple Button - Medium', 'skt-cutsnstyle'),
		'desc' => __('<pre>
[simple_button size="medium" bg_color="#060" color="#fff" text="Medium Simple Button" title="Medium Simple Button" url="" position="left"]
</pre>', 'skt-cutsnstyle'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Simple Button - Large', 'skt-cutsnstyle'),
		'desc' => __('<pre>
[simple_button size="large" bg_color="#026" color="#fff" text="Large Simple Button" title="Large Simple Button" url="" position="left"]
</pre>', 'skt-cutsnstyle'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Simple Button - Xtra Large', 'skt-cutsnstyle'),
		'desc' => __('<pre>
[simple_button size="x-large" bg_color="#00ccff" color="#fff" text="Extra Large Simple Button" title="Extra Large Simple Button" url="" position="left"]
</pre>', 'skt-cutsnstyle'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Round Button - Light', 'skt-cutsnstyle'),
		'desc' => __('<pre>
[round_button style="light" text="Round Button" title="Round Button" url="" position="left"]
</pre>', 'skt-cutsnstyle'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Round Button - Dark', 'skt-cutsnstyle'),
		'desc' => __('<pre>
[round_button style="dark" text="Round Button" title="Round Button" url="" position="left"]
</pre>', 'skt-cutsnstyle'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Message Box - Success', 'skt-cutsnstyle'),
		'desc' => __('<pre>
[message type="success"]This is a sample of the \'success\' style message box shortcode. To use this style use the following shortcode[/message]
</pre>', 'skt-cutsnstyle'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Message Box - Error', 'skt-cutsnstyle'),
		'desc' => __('<pre>
[message type="error"]This is a sample of the \'error\' style message box shortcode. To use this style use the following shortcode.[/message]
</pre>', 'skt-cutsnstyle'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Message Box - Warning', 'skt-cutsnstyle'),
		'desc' => __('<pre>
[message type="warning"]This is a sample of the \'warning\' style message box shortcode. To use this style use the following shortcode.[/message]
</pre>', 'skt-cutsnstyle'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Message Box - Info', 'skt-cutsnstyle'),
		'desc' => __('<pre>
[message type="info"]This is a sample of the \'info\' style message box shortcode. To use this style use the following shortcode.[/message]
</pre>', 'skt-cutsnstyle'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Message Box - About', 'skt-cutsnstyle'),
		'desc' => __('<pre>
[message type="about"]This is a sample of the \'about\' style message box shortcode. To use this style use the following shortcode.[/message]
</pre>', 'skt-cutsnstyle'),
		'type' => 'info');

	$options[] = array(
		'name' => __('List Styles', 'skt-cutsnstyle'),
		'desc' => __('<pre>
[unordered_list style="list-1"]&lt;li&gt;List style 1&lt;/li&gt;[/unordered_list]
</pre>
<br />You can use above shortcode OR simply add class to ul. You can choose from list-1 to list-10 styles.<br />
<pre>
&lt;ul class="list-1"&gt;&lt;li&gt;List style 1&lt;/li&gt;&lt;/ul&gt;
</pre>
', 'skt-cutsnstyle'),
		'type' => 'info');
		
	
	$options[] = array(
		'name' => __('Horizontal Separator', 'skt-cutsnstyle'),
		'desc' => __('[hr_top] 
', 'skt-cutsnstyle'),
		'type' => 'info');
	
		
	$options[] = array(
		'name' => __('Pricing', 'skt-cutsnstyle'),
		'desc' => __('<pre>[pricing_table bgcolor="#ffffff"]
		[price_row bdcolor="#c9c9c9" hairservice="Trim your Beard" hairprice="$ 15.99"]
		[price_row bdcolor="#c9c9c9" hairservice="Trim your Hair" hairprice="$ 15.99"]
		[price_row bdcolor="#c9c9c9" hairservice="Special Beard Treatment" hairprice="$ 15.99"]
		[price_row bdcolor="#c9c9c9" hairservice="Color your Beard" hairprice="$ 15.99"]
		[price_row bdcolor="#c9c9c9" hairservice="Wax your Beard" hairprice="$ 15.99"]
		[price_row hairservice="Complete Treatment" hairprice="$ 15.99"]
		
[/pricing_table]</pre>
', 'skt-cutsnstyle'),
		'type' => 'info');

	// Support					
	$options[] = array(
		'name' => __('Our Themes', 'skt-cutsnstyle'),
		'type' => 'heading');

	$options[] = array(
		'desc' => __('SKT Cutsnstyle WordPress theme has been Designed and Created by <a href="'.esc_url('http://sktthemes.net/').'" target="_blank">SKT Themes</a>', 'skt-cutsnstyle'),
		'type' => 'info');	

	 $options[] = array(
		'desc' => __('<a href="'.esc_url('http://sktthemes.net/').'" target="_blank"><img src="'.get_template_directory_uri().'/images/sktskill.jpg"></a>', 'skt-cutsnstyle'),
		'type' => 'info');	

	return $options;
}