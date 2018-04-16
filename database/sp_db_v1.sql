-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2018 at 05:44 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `dog_breeds`
--

CREATE TABLE `dog_breeds` (
  `breed_id` int(11) NOT NULL,
  `breed_name` varchar(32) NOT NULL,
  `breed_description` varchar(1000) NOT NULL,
  `breed_image` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dog_breeds`
--

INSERT INTO `dog_breeds` (`breed_id`, `breed_name`, `breed_description`, `breed_image`) VALUES
(0, 'Chihuahua', 'The Chihuahua dog breed‘s charms include his small size, outsize personality, and variety in coat types and colors. He’s all dog, fully capable of competing in dog sports such as agility and obedience, and is among the top 10 watchdogs recommended by experts. He loves nothing more than being with his people and requires a minimum of grooming and exercise.', 'Chihuahua.jpg'),
(1, 'Japanese Chin/Spaniel', 'The Japanese Chin dog breed hails from Asia, where he has been prized as a companion for more than a thousand years. He was a popular member of Chinese and Japanese imperial courts, and it was in Japan that his distinctive look was developed. This breed is elegant and dainty, mild-mannered and playful.', 'Japanese_Spaniel.jpg'),
(2, 'Maltese', 'A dog breed who’s gentle and fearless, the Maltese greets everyone as a friend. His glamorous white coat gives him a look of haughty nobility, but looks can be deceiving. This is a sprightly, vigorous dog who excels not only as a companion but also as a therapy dog and competitor in such dog sports as agility, obedience, rally, and tracking. But most of all, he loves to be with his people.', 'Maltese.jpg'),
(3, 'Pekinese', 'Pekinese were dogs bred for centuries to be the cherished companions of the imperial family of China. Today they are still cherished family companions and show dogs who greet everyone they meet with dignity and grace.', 'Pekinese.jpg'),
(4, 'Shih', 'His name means little lion, but thereâ€™s nothing fierce about this dog breed. The Shih Tzu is a lover, not a hunter. Bred solely to be a companion, the Shih Tzu is an affectionate, happy, outgoing housedog who loves nothing more than to follow his people from room to room. In recent years, however, owners have started taking the Shih Tzu off their laps and into dog sports, training him for obedience, rally, and agility competitions.\r', 'Shih.jpg'),
(5, 'Blenheim Spaniel', 'Although heâ€™s born to be a companion, the Blenheim Spaniel, also called Cavalier King Charles Spaniel dog breed, retains the sporty nature of his spaniel ancestors. If heâ€™s not sitting on a lap or getting a belly rub, nothing makes him happier than to flush a bird and then attempt to retrieve it. One of the largest of the toy breeds, heâ€™s often as athletic as a true sporting breed and enjoys hiking, running on the beach, and dog sports such as agility, flyball and rally. Some have even shown their prowess as hunting dogs. The more restful members of the breed find success as family friends and therapy dogs.\r', 'Blenheim_Spaniel.jpg'),
(6, 'Papillon', 'The Papillon dog breed descends from the toy spaniels that are frequently portrayed in paintings by the Old Masters, from as far back as the 16th century. Heâ€™s highly active and is a wonderful competitor in agility and obedience. His sparkling personality makes him a favorite of all who meet him.\r', 'Papillon.jpg'),
(7, 'Toy Terrier', 'Originally created as smaller versions of their larger Smooth Fox Terrier dog breed ancestors, Toy Fox Terriers have been used for a variety of tasks, serving as ratters on farms and as hunters of small game such as squirrel. They have been successful circus dogs and performers and their intelligence helps them to do well in obedience and agility competitions. Their most important purpose, however, is to be a loyal, loving, and devoted companion that amuses and entertains their families\r', 'Toy_Terrier.jpg'),
(8, 'Rhodesian Ridgeback', 'This handsome dog breed was created in Africa to be a versatile hunter and home guardian. Heâ€™s smart but sometimes stubborn, with a moderate energy level and an easy-care coat. These days, heâ€™s less likely to hunt lions and more likely to hunt a soft spot on the sofa after going jogging with you.\r', 'Rhodesian_Ridgeback.jpg'),
(9, 'Afghan Hound', 'The Afghan Hound is elegance personified. This unique, ancient dog breed has an appearance quite unlike any other: dramatic silky coat, exotic face, and thin, fashion-model build. Looks aside, Afghan enthusiasts describe this hound as both aloof and comical. Hailing from Afghanistan, where the original name for the breed was Tazi, the Afghan is thought to date back to the pre-Christian era and is considered one of oldest breeds.\r', 'Afghan_Hound.jpg'),
(10, 'Basset', 'The Afghan Hound is elegance personified. This unique, ancient dog breed has an appearance quite unlike any other: dramatic silky coat, exotic face, and thin, fashion-model build. Looks aside, Afghan enthusiasts describe this hound as both aloof and comical. Hailing from Afghanistan, where the original name for the breed was Tazi, the Afghan is thought to date back to the pre-Christian era and is considered one of oldest breeds.\r', 'Basset.jpg'),
(11, 'Beagle', 'The Afghan Hound is elegance personified. This unique, ancient dog breed has an appearance quite unlike any other: dramatic silky coat, exotic face, and thin, fashion-model build. Looks aside, Afghan enthusiasts describe this hound as both aloof and comical. Hailing from Afghanistan, where the original name for the breed was Tazi, the Afghan is thought to date back to the pre-Christian era and is considered one of oldest breeds.\r', 'Beagle.jpg'),
(12, 'Bloodhound', 'The Bloodhoundâ€™s ancestors were created in medieval France to trail deer and boar. Today, heâ€™s a highly active and intelligent dog breed whose keen sense of smell has found him a special place in law enforcement and search and rescue. His fans love him for his sweet nature and unique appearance.\r', 'Bloodhound.jpg'),
(13, 'Bluetick', 'Fast and muscular, the Bluetick dog breed stands out for his striking coat. He has a pleasantly pleading expression and a big bawl mouth â€” meaning he has a long, drawn out bark. Although heâ€™s a hunter first and foremost, the Bluetick can be a fine housedog and loves his people.\r', 'Bluetick.jpg'),
(14, 'Black', '', 'Black.jpg'),
(15, 'Walker Hound', '', 'Walker_Hound.jpg'),
(16, 'English Foxhound', '', 'English_Foxhound.jpg'),
(17, 'Redbone', '', 'Redbone.jpg'),
(18, 'Borzoi', '', 'Borzoi.jpg'),
(19, 'Irish Wolfhound', '', 'Irish_Wolfhound.jpg'),
(20, 'Italian Greyhound', '', 'Italian_Greyhound.jpg'),
(21, 'Whippet', '', 'Whippet.jpg'),
(22, 'Ibizan_Hound', '', 'Ibizan_Hound.jpg'),
(23, 'Norwegian Elkhound', '', 'Norwegian_Elkhound.jpg'),
(24, 'Otterhound', '', 'Otterhound.jpg'),
(25, 'Saluki', '', 'Saluki.jpg'),
(26, 'Scottish Deerhound', '', 'Scottish_Deerhound.jpg'),
(27, 'Weimaraner', '', 'Weimaraner.jpg'),
(28, 'Staffordshire Bullterrier', '', 'Staffordshire_Bullterier.jpg'),
(29, 'American Staffordshire Terrier', '', 'American_Staffordshire_Terrier.j'),
(30, 'Bedlington Terrier', '', 'Bedlington_Terrier.jpg'),
(31, 'Border Terrier', '', 'Border_Terrier.jpg'),
(32, 'Kerry Blue Terrier', '', 'Kerry_Blue_Terrier.jpg'),
(33, 'Irish Terrier', '', 'Irish_Terrier.jpg'),
(34, 'Norforlk Terrier', '', 'Norforlk_Terrier.jpg'),
(35, 'Norwich_Terrier', '', 'Norwich_Terrier.jpg'),
(36, 'Yorkshire_Terrier', '', 'Yorshire_Terrier.jpg'),
(37, 'Wire', '', 'Wire.jpg'),
(38, 'Lakeland Terrier', '', 'Lakeland_Terrier.jpg'),
(39, 'Sealyham Terrier', '', 'Sealyham_Terrier.jpg'),
(40, 'Airedale', '', 'Airedale.jpg'),
(41, 'Cairn', '', 'Cairn.jpg'),
(42, 'Austrialian Terrier', '', 'Austrialian_Terrier.jpg'),
(43, 'Dandie Dinmont', '', 'Dandie_Dinmont.jpg'),
(44, 'Boston Bull', '', 'Boston_Bull.jpg'),
(45, 'Miniature Schnauzer', '', 'Miniature_Schnauzer.jpg'),
(46, 'Giant Schnauzer', '', 'Giant_Schnauzer.jpg'),
(47, 'Standard Shnauzer', '', 'Standard Shnauzer.jpg'),
(48, 'Scotch Terrier', '', 'Scotch_Terrier.jpg'),
(49, 'Tibetan Terrier', '', 'Tibetan_Terrier.jpg'),
(50, 'Silky Terrier', '', 'Silky_Terrier.jpg'),
(51, 'Soft', '', 'Soft.jpg'),
(52, 'West Highland White Terrier', '', 'West_Highland_White_Terrier.jpg'),
(53, 'Lhasa', '', 'Lhasa.jpg'),
(54, 'Flat', '', 'Flat.jpg'),
(55, 'Curly', '', 'Curly.jpg'),
(56, 'Golden Retriever', '', 'Golden_Retriever.jpg'),
(57, 'Labrador Retriever', '', 'Labrador_Retriever.jpg'),
(58, 'Chesapeake Bay retriever', '', 'Chesapeake_Bay_Retriever.jpg'),
(59, 'German Short', '', 'German_Short.jpg'),
(60, 'Vizsla', '', 'Vizla.jpg'),
(61, 'English Setter', '', 'English_Setter.jpg'),
(62, 'Irish Setter', '', 'Irish_Setter.jpg'),
(63, 'Gordon Setter', '', 'Gorder_Setter.jpg'),
(64, 'Brittany Spaniel', '', 'Brittany_Spaniel'),
(65, 'Clumber', '', 'Clumber.jpg'),
(66, 'English Springer', '', 'English_Springer.jpg'),
(67, 'Welsh Springer Spaniel', '', 'Welsh_Springer_Spaniel.jpg'),
(68, 'Cocker Spaniel', '', 'Cocker_Spaniel.jpg'),
(69, 'Sussex Spaniel', '', 'Sussex_Spaniel.jpg'),
(70, 'Irish Water Spaniel', '', 'Irish_Water_Spaniel.jpg'),
(71, 'Kuvasz', '', 'Kuvasz.jpg'),
(72, 'Schipperke', '', 'Schipperke.jpg'),
(73, 'Groenendael', '', 'Groenendael.jpg'),
(74, 'Malinois', '', 'Malinois.jpg'),
(75, 'Briard', '', 'Briard.jpg'),
(76, 'Kelpie', '', 'kelpie.jpg'),
(77, 'Komondor', '', 'Komondor.jpg'),
(78, 'Old English Sheepdog', '', 'Old_English_Sheepdog'),
(79, 'Shetland Sheepdog', '', 'Shetland Sheepdog'),
(80, 'Collie', '', 'Collie.jpg'),
(81, 'Border Collie', '', 'Border_Collie.jpg'),
(82, 'Bouvier Des Flandres', '', 'Bouvier_Des_Flandres.jpg'),
(83, 'Rottweiler', '', 'Rottweiler.jpg'),
(84, 'German Shepherd', '', 'German_Shepherd.jpg'),
(85, 'Doberman', '', 'Doberman.jpg'),
(86, 'Miniature Pinscher', '', 'Miniature_Pinscher.jpg'),
(87, 'Greater Swiss Mountain Dog', '', 'Greater_Swiss_Mountain_Dog.jpg'),
(88, 'Bernese Mountain Dog', '', 'Bernese_Mountain_Dog.jpg'),
(89, 'Appenzeller', '', 'Appenzeller.jpg'),
(90, 'EntleBucher', '', 'EntleBucher.jpg'),
(91, 'Boxer', '', 'Boxer.jpg'),
(92, 'Bull Mastiff', '', 'Bull_Mastiff.jpg'),
(93, 'Tibetan Mastiff', '', 'Tibetan_Mastiff.jpg'),
(94, 'French Bulldog', '', 'French Bulldog.jpg'),
(95, 'Great Dane', '', 'Great_Dane.jpg'),
(96, 'Saint Bernard', '', 'Saint_Bernard.jpg'),
(97, 'Eskimo Dog', '', 'Eskimo_Dog.jpg'),
(98, 'Malamute', '', 'Malamute.jpg'),
(99, 'Siberian Husky', '', 'Siberian_Husky.jpg'),
(100, 'Affenpinscher', '', 'Affenpinscher.jpg'),
(101, 'Basenji', '', 'Basenji.jpg'),
(102, 'Pug', '', 'Pug.jpg'),
(103, 'Leonberg', '', 'Leonberg.jpg'),
(104, 'Newfoundland', '', 'Newfoundland.jpg'),
(105, 'Great Pyrenees', '', 'Great_Pyrenees.jpg'),
(106, 'Samoyed', '', 'Samoyed.jpg'),
(107, 'Pomeranian', '', 'Pomeranian.jpg'),
(108, 'Chow', '', 'Chow.jpg'),
(109, 'Keeshond', '', 'Keeshond.jpg'),
(110, 'Brabancon', '', 'Brabancon.jpg'),
(111, 'Pembroke', '', 'Pembroke.jpg'),
(112, 'Cardigan', '', 'Cardigan.jpg'),
(113, 'Toy Poodle', '', 'Toy_Poodle.jpg'),
(114, 'Miniature Poodle', '', 'Miniature_Poodle.jpg'),
(115, 'Standard Poodle', '', 'Standard_Poodle.jpg'),
(116, 'Mexican Hairless', '', 'Mexican_Hairless'),
(117, 'Dingo', '', 'Dingo.jpg'),
(118, 'Dhole', '', 'Dhole.jpg'),
(119, 'African Hunting Dog', '', 'African_Hunting_Dog.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dog_breeds`
--
ALTER TABLE `dog_breeds`
  ADD PRIMARY KEY (`breed_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
