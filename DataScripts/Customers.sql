-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2025 at 10:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datable`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CUSTOMER_ID` int(11) NOT NULL,
  `STORE_ID` int(11) DEFAULT NULL,
  `FIRST_NAME` varchar(50) DEFAULT NULL,
  `LAST_NAME` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `ADDRESS` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CUSTOMER_ID`, `STORE_ID`, `FIRST_NAME`, `LAST_NAME`, `EMAIL`, `ADDRESS`) VALUES
(1, 4, 'Louis', 'Drake', 'deborahandrews@mendez.com', '1964 Marcus Station, West Shariborough, TX 02677'),
(2, 2, 'Cody', 'Everett', 'jose35@yahoo.com', '3115 Hammond Stravenue Suite 319, Piercechester, RI 31943'),
(3, 5, 'Richard', 'Hebert', 'cjones@murphy.com', '9087 Joseph Lock, Port Antonio, RI 81196'),
(4, 6, 'John', 'Jones', 'salazarricky@hardy-davis.net', '6318 Nathan Trafficway Apt. 246, Shermanton, UT 54144'),
(5, 8, 'Theresa', 'Cruz', 'dfowler@boyer-sawyer.biz', '9624 Ashley Common, Perkinsview, NJ 04304'),
(6, 7, 'Francisco', 'Schmitt', 'ukelly@yahoo.com', '63285 Lawson Crest, Port Denise, ND 21086'),
(7, 8, 'Stephen', 'Roberts', 'weisstracy@gmail.com', '182 Baker Villages, East Johnchester, MO 86812'),
(8, 5, 'Jeffery', 'Long', 'johnsonshannon@gmail.com', 'USNV Mckinney, FPO AE 59254'),
(9, 5, 'Joshua', 'Hernandez', 'harperpatricia@gmail.com', '075 Pamela Way, Jameshaven, NC 63997'),
(10, 3, 'Scott', 'Wilson', 'estesfrancisco@yahoo.com', '5982 Cruz Camp Suite 909, Margaretstad, ND 81844'),
(11, 9, 'Tiffany', 'Brewer', 'ingrammichael@gmail.com', '73653 Justin Motorway, Wilsonview, ID 66839'),
(12, 8, 'Shane', 'Franklin', 'joseph63@howard.com', '4504 Thomas Springs, Norrisside, WI 35195'),
(13, 10, 'David', 'Ramirez', 'mikayla52@hotmail.com', '770 Jones Circles, Vasqueztown, MT 92168'),
(14, 4, 'Lisa', 'Hanson', 'rangelamber@cervantes.net', 'Unit 5239 Box 0727, DPO AP 28501'),
(15, 7, 'Michael', 'Baker', 'rosariodesiree@gmail.com', '3575 Nancy Cape, Dyerton, VA 72477'),
(16, 10, 'Denise', 'Herrera', 'munozdavid@conner-bauer.com', '261 Carl Pine Suite 344, Samanthastad, NE 55096'),
(17, 2, 'Alex', 'Collins', 'josephsanchez@gmail.com', '96263 Richard Course, Jonesfort, AZ 76305'),
(18, 9, 'Alex', 'Johnson', 'holtmary@jensen.biz', '01151 Scott Plaza, Scottstad, SC 09607'),
(19, 1, 'Derrick', 'Wright', 'martinthompson@taylor.info', '76362 Alexa Corner Apt. 173, Webstermouth, AR 37806'),
(20, 10, 'Susan', 'Mitchell', 'andersonshelley@anderson.com', 'PSC 9519, Box 0447, APO AP 46606'),
(21, 7, 'Cameron', 'Wilson', 'dianesmith@davis.biz', '092 Jennifer Villages, Michaelborough, MN 05521'),
(22, 6, 'Jillian', 'Lawson', 'nperry@gmail.com', '7472 Andrews Station Apt. 088, Lake Amyport, AR 64516'),
(23, 2, 'Steven', 'Vaughan', 'wendy61@ruiz.info', '859 Murphy Groves Suite 389, Yvonneshire, NM 79428'),
(24, 1, 'Misty', 'King', 'ilogan@wise.com', '8178 Aaron Mill, Jenniferberg, PA 24575'),
(25, 4, 'Jennifer', 'Davidson', 'adam28@green-ortega.com', '1861 Alexis Row Apt. 734, Port Michaelfurt, AL 50850'),
(26, 10, 'Caitlin', 'White', 'vbradford@gmail.com', '145 Jesse Ville Apt. 899, Villegasmouth, MO 87168'),
(27, 9, 'Robert', 'Whitaker', 'andreshepard@yahoo.com', '26273 Chad Locks, South Alexisland, WV 72429'),
(28, 3, 'Monique', 'Baker', 'meghansmith@holmes.com', '43166 Shawn Key, North Brandi, PA 49106'),
(29, 1, 'Lisa', 'Hill', 'codybrooks@gmail.com', '7271 Warner Views, Lake Christopher, OK 14949'),
(30, 2, 'Joel', 'Williams', 'emmawolf@turner.com', '45256 Catherine Plains, North Anthonyfurt, FL 87861'),
(31, 4, 'Danielle', 'Wilson', 'ashley32@gmail.com', '19612 Michael Stravenue Apt. 706, North Krystal, MS 22576'),
(32, 2, 'Jared', 'Hubbard', 'ygarcia@rivas.com', '272 Kevin Coves, Laurenhaven, PA 44551'),
(33, 9, 'Eric', 'Underwood', 'brittany12@huffman.info', '470 Joel Orchard, North Brian, MI 20212'),
(34, 6, 'Tina', 'Bauer', 'cathy81@hotmail.com', '286 Kelly Brook Suite 747, West Kristinton, IL 25279'),
(35, 1, 'Barbara', 'Hartman', 'fpreston@hotmail.com', '4136 Mark Curve, Lake Elizabethbury, MT 65378'),
(36, 8, 'Maria', 'Marsh', 'tracy24@hotmail.com', '33714 Roberts Ports Apt. 111, Zunigamouth, ND 59410'),
(37, 3, 'Mark', 'Lane', 'robertobryant@ward-rhodes.net', '23185 Dillon Stravenue Apt. 109, Blackberg, VA 21716'),
(38, 2, 'Ryan', 'Gonzalez', 'taylorderrick@yahoo.com', '834 Phyllis Ferry Suite 241, South Bonnieberg, HI 49450'),
(39, 3, 'Debra', 'Morrison', 'alexreynolds@hotmail.com', '347 Mason Circle, Port Danielborough, CT 91337'),
(40, 2, 'Lucas', 'Davis', 'shelleyortiz@cole-orozco.info', '47870 Andrew Island, Johnport, RI 43069'),
(41, 8, 'Jeremiah', 'Butler', 'cookallison@gmail.com', '84843 Haynes Villages, Caseyville, OK 43352'),
(42, 10, 'Paula', 'Lamb', 'nixonjessica@golden.com', '63191 Alan Prairie, Jamesshire, WV 80573'),
(43, 2, 'Tracey', 'Abbott', 'uroberts@davis.biz', '15821 Katrina Circle Apt. 373, Ronaldport, CA 77464'),
(44, 9, 'Melissa', 'Gaines', 'janet23@caldwell.com', '4345 Powell Way, Lamfurt, OK 10359'),
(45, 8, 'Jimmy', 'Chavez', 'darryl81@graham.com', '109 Bradley Parks Apt. 847, Jenniferhaven, MT 09167'),
(46, 2, 'Kathryn', 'Wade', 'brianna56@nelson.net', '399 Adam Isle, North Gina, WV 33581'),
(47, 2, 'Brittany', 'Morrison', 'susandavis@oconnell.com', '3264 Matthew Summit, Port Coreybury, ID 67276'),
(48, 8, 'Andre', 'Townsend', 'hinesmark@hill-suarez.net', '8922 Elizabeth Brook, North Natashashire, NJ 60509'),
(49, 7, 'Pamela', 'Schwartz', 'williamkrause@hotmail.com', '106 Hill Mountain, South Carolynland, SD 33441'),
(50, 9, 'Nicholas', 'Thomas', 'dominique27@gmail.com', '36868 Mary Burg Suite 670, Harrisonborough, FL 98331'),
(51, 3, 'Matthew', 'Cortez', 'derek92@yahoo.com', '1959 Diaz Skyway Apt. 969, Wendyport, MI 88534'),
(52, 9, 'Cristina', 'Hicks', 'fgriffin@yahoo.com', '315 Hunt Isle, Martinchester, CA 57481'),
(53, 7, 'James', 'Gomez', 'francis78@hotmail.com', '40718 Melissa Viaduct Apt. 390, Amybury, KY 92729'),
(54, 4, 'Terri', 'Murphy', 'bensonlori@hotmail.com', '160 Tanner Drives, East Jason, NV 14120'),
(55, 8, 'Alexandra', 'Alvarez', 'michele71@young.com', '98492 Baker Lodge, Port Andrewshire, UT 91071'),
(56, 3, 'William', 'Cunningham', 'regina64@bradley-webb.com', '26365 Flynn Crossroad, Port Tylerberg, NM 53039'),
(57, 1, 'Crystal', 'Armstrong', 'rbrown@randolph-velazquez.info', '2629 Rhonda Union, Acostaton, MT 74912'),
(58, 9, 'Cynthia', 'Torres', 'webbsusan@hotmail.com', '3074 John Trail, Port Christopher, IN 79920'),
(59, 9, 'Raymond', 'Haas', 'diana10@hotmail.com', '4946 Jeffery Grove, Lake Robertfort, MT 84767'),
(60, 5, 'Vicki', 'Payne', 'hsmith@gmail.com', '485 Miller Walk, New Oscarberg, OH 88033'),
(61, 8, 'Isabella', 'Smith', 'stevengibson@gmail.com', '47740 William Gardens Suite 667, Andradeside, AR 27344'),
(62, 4, 'James', 'Sims', 'john55@hotmail.com', '42639 Elizabeth Glen, Tonitown, OR 58742'),
(63, 8, 'Travis', 'Miller', 'wilkinsbrent@hess.biz', '866 Gonzalez Radial Suite 839, Loriberg, ID 91222'),
(64, 8, 'Anthony', 'Smith', 'kathleen24@little-patel.com', '948 George Ford, Robertmouth, ND 08539'),
(65, 5, 'James', 'Oconnor', 'blankenshipmark@gmail.com', '3702 Katherine Manors Suite 263, Georgefort, AR 02591'),
(66, 5, 'Nathaniel', 'Edwards', 'martinrussell@ray.com', '62414 Paul Place Apt. 951, North Stephen, ID 49527'),
(67, 6, 'Marilyn', 'Burke', 'jeffery19@hotmail.com', '3242 Lawson Islands, Port Michael, UT 99697'),
(68, 3, 'Todd', 'Mcbride', 'bryancarter@bennett.com', '01106 Ryan Pine, Snyderton, AK 51470'),
(69, 2, 'Jennifer', 'Riley', 'wball@pham-campbell.net', '508 Salas Station, Loganborough, MD 74301'),
(70, 7, 'Angela', 'Bender', 'jennaraymond@hotmail.com', '52521 Stephenson Pines Apt. 630, East Stephanie, GA 85270'),
(71, 5, 'Alejandro', 'Faulkner', 'mark91@jones.com', '36581 Scott Flat, Lake Matthew, MI 57849'),
(72, 3, 'Lisa', 'Martinez', 'dshields@kim-peters.com', '3621 Brendan Lodge Apt. 364, Port Darrentown, CO 19341'),
(73, 7, 'Earl', 'Anderson', 'chris58@yahoo.com', '62237 Justin Walk, Crosbyhaven, AK 38645'),
(74, 2, 'Shelly', 'Martinez', 'hayesmark@hotmail.com', '65102 Michael Forest, Jennifertown, AR 40444'),
(75, 2, 'Jamie', 'Hughes', 'johnayers@gmail.com', '05822 Kyle Plains Apt. 798, New Jodytown, VA 85889'),
(76, 5, 'Jeffrey', 'Moore', 'colleensoto@munoz.net', '44179 Malik Village, West Sara, LA 01935'),
(77, 5, 'Susan', 'Pena', 'anna61@jackson.com', 'Unit 2617 Box 6550, DPO AE 68883'),
(78, 9, 'Jerome', 'Copeland', 'zimmermandavid@gmail.com', '588 Stephens Row, Michaelborough, CA 08256'),
(79, 1, 'David', 'Gonzalez', 'byoung@douglas-meyer.org', '6896 Clark Coves Suite 359, New Sarah, MA 80726'),
(80, 1, 'Angela', 'Le', 'abailey@yahoo.com', '0593 Michael Manor Apt. 275, Berryfurt, ME 96013'),
(81, 3, 'Cody', 'Montes', 'fmartin@villegas-turner.com', '4093 Lisa Via, North Patricia, MI 28364'),
(82, 1, 'Laura', 'Munoz', 'gramirez@yahoo.com', '740 Kelly Ridge Suite 728, Lake Lauraside, MT 37859'),
(83, 6, 'Jason', 'Estrada', 'ysmith@vasquez.net', 'PSC 0520, Box 4486, APO AP 96582'),
(84, 2, 'Dylan', 'Trujillo', 'rubenstafford@flynn-blair.com', 'Unit 0826 Box 3368, DPO AA 86221'),
(85, 3, 'George', 'Palmer', 'wuthomas@yahoo.com', '744 Parker Place Apt. 580, Sherylport, NH 52546'),
(86, 8, 'Frank', 'Collins', 'uking@hotmail.com', 'Unit 5186 Box 9869, DPO AA 29701'),
(87, 10, 'Chad', 'Davis', 'vshea@massey.com', '390 Parker Pike, South Jason, AL 84141'),
(88, 3, 'James', 'Reid', 'jfrazier@hotmail.com', '9671 Susan Ford, Port Kimberlyton, DE 42462'),
(89, 2, 'Devon', 'Nguyen', 'jamie74@young.com', '6743 Kenneth Crescent, Webbfort, CO 91392'),
(90, 10, 'Jasmine', 'Booth', 'amiller@hotmail.com', '978 Austin Manor, East Natasha, VT 55781'),
(91, 5, 'Michael', 'Taylor', 'christopher31@yahoo.com', '329 Barrett Union, Kathleenmouth, NV 62508'),
(92, 6, 'Lisa', 'Middleton', 'fergusonnicole@gmail.com', '905 Curtis Fall Apt. 754, North Ruben, CO 02386'),
(93, 7, 'Barbara', 'Stewart', 'douglasjohnson@hotmail.com', '65708 Aguilar View, Chenborough, ND 27395'),
(94, 5, 'Marc', 'Hanson', 'melissa14@williams.com', '22955 Vaughn Circle Apt. 082, South Michelle, IA 88143'),
(95, 5, 'Diana', 'Turner', 'ricejohn@johnson-thomas.com', '04953 Gillespie Rapid Suite 758, Laurafurt, CT 96865'),
(96, 8, 'Joshua', 'Tyler', 'smithalice@vasquez-kelly.org', '907 Murillo Throughway, Port Jamie, LA 32171'),
(97, 10, 'Stephen', 'Thornton', 'ihammond@jimenez.com', '8123 Michelle Lake Suite 526, Davidshire, NM 80491'),
(98, 3, 'Timothy', 'King', 'laurabailey@valencia-reese.com', '830 Christopher Lane Suite 454, Michaelport, SC 17782'),
(99, 3, 'Anna', 'Perkins', 'pamelaholland@gmail.com', '260 Jennifer Mountains, Port Christinaburgh, WI 92336'),
(100, 1, 'Miguel', 'Oneill', 'smithkristine@hotmail.com', '2977 James Corner Suite 937, Spencermouth, SD 05800');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CUSTOMER_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
