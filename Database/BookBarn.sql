-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 02, 2021 at 05:12 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BookBarn`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` varchar(10) NOT NULL,
  `book_count` varchar(300) DEFAULT NULL,
  `book_isbn` varchar(50) NOT NULL,
  `authors` varchar(50) NOT NULL,
  `original_publication_year` varchar(50) NOT NULL,
  `original_title` varchar(50) NOT NULL,
  `language_code` varchar(50) DEFAULT NULL,
  `average_rating` varchar(50) DEFAULT NULL,
  `image_url` varchar(3000) DEFAULT NULL,
  `cost` varchar(10) DEFAULT NULL,
  `description` varchar(3000) DEFAULT NULL,
  `book_details` varchar(3000) DEFAULT NULL,
  `genre` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_count`, `book_isbn`, `authors`, `original_publication_year`, `original_title`, `language_code`, `average_rating`, `image_url`, `cost`, `description`, `book_details`, `genre`) VALUES
('1', '272', '439023483', 'Suzanne Collins', '2008', 'The Hunger Games', 'eng', '4.34', 'https://rukminim1.flixcart.com/image/416/416/kjswia80/book/p/c/f/the-hunger-games-original-imafzanrfhufgcch.jpeg?q=70', '1277', 'Suzanne Collins?is the author of the bestselling Underland Chronicles series, which started with?Gregor the Overlander. Her groundbreaking young adult novels,?The Hunger Games,?Catching Fire, and?Mockingjay, were?New York Times?bestsellers, received wide praise, and were the basis for four popular films. She returned to the world of Panem with?The Ballad of Songbirds and Snakes.?Year of the Jungle, her picture book based on the year her father was deployed in Vietnam, was published in 2013 to great critical acclaim. To date, her books have been published in fifty-three languages around the world.', 'Author:Collins Suzanne,Language: English ,Binding: Paperback,Publisher: Scholastic US,Width:19 mm,Height:203 mm,Length:133 mm', 'fiction'),
('10', '3455', '679783261', 'Jane Austen', '1813', 'Pride and Prejudice', 'eng', '4.24', 'https://rukminim1.flixcart.com/image/416/416/book/9/5/1/pride-and-prejudice-original-imaejhxkzu2pakvg.jpeg?q=70', '203', 'Pride and Prejudice is a particularly interesting and comical read for fans of Jane Austen. The romantic comedy is one of the author?s best works and revolves around the growing relationship between Elizabeth Bennet and Fitzwilliam Darcy.\n\nSummary of the Book\n\nElizabeth is an intelligent and lively woman who has four beautiful sisters. Their mother?s only wish is for her daughters to be married off to wealthy and reputable men. Elizabeth meets the proud Darcy at a party that is taking place near her home. Her first thoughts about him are that he is snooty and so decides that she wants nothing to do with him. However, they get talking and, as time goes, realize that each of them has started to grow more and more tolerant to each other. The story reveals a lot about the society of the time in which the story is set.\n\nAbout Jane Austen\n\nJane Austen was an English novelist, best remembered for her works of romance literature. She has also written: Emma, Persuasion, Mansfield Park, and Sense and Sensibility.\n\nPride and Prejudice was adapted into several films, most notably in 1940 starring Greer Garson and Laurence Olivier, and in 2005 starring Keira Knightley and Matthew Macfadyen.', 'Author:Jane Austen,Language: English,Binding: Paperback,Publisher: Rupa', 'Fiction'),
('11', '283', '1594480001', 'Khaled Hosseini', '2003', 'The Kite Runner ', 'eng', '4.26', 'https://rukminim1.flixcart.com/image/416/416/kgzg8sw0/book/2/5/1/the-kite-runner-original-imafx33guam7nabs.jpeg?q=70', '499', 'The Kite Runner by Khaled Hosseini is your best bet in case you?re looking for the perfect emotional release. It tells you the story of Amir, a young boy from Kabul, and his close friend Hassan. Set against the backdrop of tumultuous events, this novel is sure you make you feel emotions that you never knew existed.\n\nAbout the Novel\n\nFrom the fall of Afghanistan?s monarchy through the Soviet military intervention, the exodus of refugees to Pakistan and the United States, and the rise of the Taliban regime, The Kite Runner will stun you with its simplicity and authenticity of the characters. Khaled Hosseini weaves the characters in this novel with such magical writing that you?ll feel as if Amir and Hassan were people that you knew a long time ago. A story of family, friendship, tragedy, and even sexual assault, The Kite Runner is the kind of novel that?s very difficult to put down.', 'Language: EnglishBinding: Paperback,Publisher: Little Brown Book Group,Genre: Juvenile Fiction,Edition: 2009,Pages: 464,Width34 mm,Height196 mm,Length124 mm,Weight320 gr', 'fiction'),
('12', '210', '62024035', 'Veronica Roth', '2011', 'Divergent', 'eng', '4.24', 'https://rukminim1.flixcart.com/image/416/416/k0plpjk0/book/7/2/6/divergent-original-imafkfqt3sneqmkg.jpeg?q=70', '450', 'Set in a post-apocalyptic Chicago, Divergent is the first in a series of science fiction novels about a group of children forced to choose between five factions of society which will forever shape who they become.About Veronica Roth\n\nVeronica Roth is an American novelist and writer. She continues her Divergent Trilogy in Insurgent and Allegiant.\n\nVeronica attended Carleton College for a year before transferring to Northwestern University, taking up its creative writing program. She won the Goodreads Favorite Book of 2011 award and was the 2012 winner for Best Young Adult Fantasy & Science Fiction.', 'Language: EnglishBinding: Paperback,Publisher: Little Brown Book Group,Genre: Fiction,Edition: 2009,Pages: 464,Width34 mm,Height196 mm,Length124 mm,Weight320 gr', 'Juvenile Fiction'),
('13', '995', '451524934', 'George Orwell, Erich Fromm, Celâl Üster', '1949', 'Nineteen Eighty-Four', 'eng', '4.14', 'https://rukminim1.flixcart.com/image/416/416/kufuikw0/book/e/h/s/nineteen-eighty-four-original-imag7jqfjg4qgs5j.jpeg?q=70', '874', 'Who controls the past controls the future: who controls the present controls the past.\' Hidden away in the Record Department of the sprawling Ministry of Truth, Winston Smith skilfully rewrites the past to suit the needs of the Party. Yet he inwardly rebels against the totalitarian world he lives in, which demands absolute obedience and controls him through the all-seeing telescreens and the watchful eye of Big Brother, symbolic head of the Party. In his longing for truth and liberty, Smith begins a secret love affair with a fellow-worker Julia, but soon discovers the true price of freedom is betrayal. The Penguin English Library - collectable general readers\' editions of the best fiction in English, from the eighteenth century to the end of the Second World War.', 'Language: EnglishBinding: Paperback,Publisher: Little Brown Book Group,Genre: Fiction,Edition: 2009,Pages: 464,Width34 mm,Height196 mm,Length124 mm,Weight320 gr', 'fiction'),
('14', '896', '452284244', 'George Orwell', '1945', 'Animal Farm: A Fairy Story', 'eng', '3.87', 'https://rukminim1.flixcart.com/image/416/416/kihqz680-0/book/c/q/w/animal-farm-original-imafy94annescmnz.jpeg?q=70', '2658', 'The book tells the story of?a group of farm animals who rebel against their human farmer, hoping to create a society where the animals can be equal, free, and happy. Ultimately, however, the rebellion is betrayed, and the farm ends up in a state as bad as it was before, under the dictatorship of a pig named Napoleon.', 'Language: EnglishBinding: Paperback,Publisher: Little Brown Book Group,Genre: Fiction,Edition: 2009,Pages: 464,Width34 mm,Height196 mm,Length124 mm,Weight320 gr', 'Novel'),
('15', '710', '553296981', 'Anne Frank, Eleanor Roosevelt, B.M. Mooyaart-Doubl', '1947', 'Het Achterhuis: Dagboekbrieven 14 juni 1942 - 1 au', 'eng', '4.1', 'https://images-na.ssl-images-amazon.com/images/I/41PGMhGeqfL._SX331_BO1,204,203,200_.jpg', '6217', 'null', 'null', 'null'),
('16', '274', '307269752', 'Stieg Larsson, Reg Keeland', '2005', 'Män som hatar kvinnor', 'eng', '4.11', 'https://images.gr-assets.com/books/1327868566m/2429135.jpg', '490', 'null', 'null', 'null'),
('17', '201', '439023491', 'Suzanne Collins', '2009', 'Catching Fire', 'eng', '4.3', 'https://rukminim1.flixcart.com/image/416/416/kjswia80/book/i/w/f/catching-fire-original-imafzascfzaerecc.jpeg?q=70', '490', 'null', 'null', 'null'),
('18', '376', '043965548X', 'J.K. Rowling, Mary GrandPré, Rufus Beck', '1999', 'Harry Potter and the Prisoner of Azkaban', 'eng', '4.53', 'https://rukminim1.flixcart.com/image/416/416/kqb8pzk0/book/l/f/d/harry-potter-and-the-prisoner-of-azkaban-ravenclaw-edition-original-imag4c5pdh29vhcv.jpeg?q=70', '499', 'null', 'null', 'null'),
('19', '566', '618346252', 'J.R.R. Tolkien', '1954', ' The Fellowship of the Ring', 'eng', '4.34', 'https://rukminim1.flixcart.com/image/416/416/kjd6nww0-0/book/a/q/s/the-lord-of-the-rings-book-1-original-imafyxkhgpqzyfbv.jpeg?q=70', '2499', 'null', 'null', 'null'),
('2', '491', '439554934', 'J.K. Rowling, Mary GrandPré', '1997', 'Harry Potter and the Philosopher\'s Stone', 'eng', '4.44', 'https://rukminim1.flixcart.com/image/416/416/kqb8pzk0/book/2/b/f/harry-potter-and-the-philosopher-s-stone-hufflepuff-edition-original-imag4cmdjwxznuhg.jpeg?q=70', '948', '\nGryffindor, Slytherin, Hufflepuff, Ravenclaw ... Twenty years ago these magical words and many more flowed from a young writer\'s pen, an orphan called Harry Potter was freed from the cupboard under the stairs - and a global phenomenon started. Harry Potter and the Philosopher\'s Stone has been read and loved by every new generation since. To mark the 20th anniversary of first publication, Bloomsbury has published four House Editions of J.K. Rowling\'s modern classic. These stunning editions each feature the individual house crest on the jacket and line illustrations exclusive to that house, by Kate Greenaway Medal winner Levi Pinfold. Exciting new extra content includes fact files and profiles of favourite characters, and each book has sprayed edges in the house colours. Available for a limited period only, these highly collectable editions are a must-have for all Harry Potter fans.', 'Author:Rowling J.K.,Language: English,Binding: PaperbackPublisher: Bloomsbury Publishing PLC, Genre: Juvenile Fiction,Height198mm,Length129mm,Weight301 gr', 'Juvenile Fiction'),
('20', '239', '439023513', 'Suzanne Collins', '2010', 'Mockingjay', 'eng', '4.03', 'https://rukminim1.flixcart.com/image/416/416/kh3qkcw0/book/2/5/3/mockingjay-classic-de-specced-special-sales-exclusive-original-imafx7y6ccezeutv.jpeg?q=70', '399', 'null', 'null', 'null'),
('21', '307', '439358078', 'J.K. Rowling, Mary GrandPré', '2003', 'Harry Potter and the Order of the Phoenix', 'eng', '4.46', 'https://rukminim1.flixcart.com/image/416/416/kq43iq80/book/w/i/1/harry-potter-and-the-order-of-the-phoenix-slytherin-edition-original-imag46tbx6ypzb4b.jpeg?q=70', '766', 'null', 'null', 'null'),
('22', '183', '316166685', 'Alice Sebold', '2002', 'The Lovely Bones', 'eng', '3.77', 'https://rukminim1.flixcart.com/image/416/416/kkoc70w0/book/z/3/q/the-lovely-bones-original-imafzz9gapwbcbuy.jpeg?q=70', '530', 'null', 'null', 'null'),
('23', '398', '439064864', 'J.K. Rowling, Mary GrandPré', '1998', 'Harry Potter and the Chamber of Secrets', 'eng', '4.37', 'https://rukminim1.flixcart.com/image/416/416/kq43iq80/book/b/f/q/harry-potter-and-the-chamber-of-secrets-gryffindor-edition-original-imag46hvq6xdfqhg.jpeg?q=70', '486', 'null', 'null', 'null'),
('24', '332', '439139600', 'J.K. Rowling, Mary GrandPré', '2000', 'Harry Potter and the Goblet of Fire', 'eng', '4.53', 'https://images.gr-assets.com/books/1361482611m/6.jpg', '752', 'null', 'null', 'null'),
('25', '263', '545010225', 'J.K. Rowling, Mary GrandPré', '2007', 'Harry Potter and the Deathly Hallows', 'eng', '4.61', 'https://rukminim1.flixcart.com/image/416/416/kq43iq80/book/w/i/1/harry-potter-and-the-deathly-hallows-slytherin-edition-original-imag46uxyguhy9f2.jpeg?q=70', '642', 'null', 'null', 'null'),
('26', '350', '307277674', 'Dan Brown', '2003', 'The Da Vinci Code', 'eng', '3.79', 'https://rukminim1.flixcart.com/image/416/416/jp2xoy80/book/0/1/7/the-da-vinci-code-original-imafbeey5dyjxu5h.jpeg?q=70', '154', 'null', 'null', 'null'),
('27', '275', '439785960', 'J.K. Rowling, Mary GrandPré', '2005', 'Harry Potter and the Half-Blood Prince', 'eng', '4.54', 'https://rukminim1.flixcart.com/image/416/416/ksgehzk0/book/p/v/w/harry-potter-and-the-half-blood-prince-hufflepuff-edition-original-imag6yfyrdzj4ghg.jpeg?q=70', '365', 'null', 'null', 'null'),
('28', '458', '140283331', 'William Golding', '1954', 'Lord of the Flies ', 'eng', '3.64', 'https://rukminim1.flixcart.com/image/416/416/kapoo7k0/book/3/1/0/lord-of-the-flies-original-imafs7qgahyqeyqv.jpeg?q=70', '456', 'null', 'null', 'null'),
('29', '1937', '743477111', 'William Shakespeare, Robert           Jackson', '1595', 'An Excellent conceited Tragedie of Romeo and Julie', 'eng', '3.73', 'https://images-na.ssl-images-amazon.com/images/I/41luIFoM3OL._SX319_BO1,204,203,200_.jpg', '287', 'null', 'null', 'null'),
('3', '226', '316015849', 'Stephenie Meyer', '2005', 'Twilight', 'en-US', '3.57', 'https://rukminim1.flixcart.com/image/416/416/k2dm7bk0/book/6/5/7/twilight-original-imafhqsdjgavjxfz.jpeg?q=70', '340', 'wilight, the first novel in the Twilight series, narrates the story of seventeen-year-old Bella Swan whose life takes a dangerous turn when she falls in love with a vampire named Edward Cullen.', 'Author:Meyer Stephenie,Language: EnglishBinding: Paperback,Publisher: Little Brown Book Group,Genre: Juvenile Fiction,Edition: 2009,Pages: 464,Width34 mm,Height196 mm,Length124 mm,Weight320 gr', 'Juvenile Fiction'),
('30', '196', '297859382', 'Gillian Flynn', '2012', 'Gone Girl', 'eng', '4.03', 'https://rukminim1.flixcart.com/image/416/416/ki3gknk0-0/book/9/f/i/gone-girl-original-imafxyvrcuhqhhvd.jpeg?q=70', '463', 'null', 'null', 'null'),
('31', '183', '399155341', 'Kathryn Stockett', '2009', 'The Help', 'eng', '4.45', 'https://rukminim1.flixcart.com/image/416/416/kufuikw0/book/s/z/y/the-help-original-imag7jkrpmp5cyts.jpeg?q=70', '562', 'null', 'null', 'null'),
('32', '373', '142000671', 'John Steinbeck', '1937', 'Of Mice and Men ', 'eng', '3.84', 'https://rukminim1.flixcart.com/image/416/416/kqmo8sw0/book/k/m/f/of-mice-and-men-original-imag4hfvrpuzvysa.jpeg?q=70', '399', 'null', 'null', 'null'),
('33', '220', '739326228', 'Arthur Golden', '1997', 'Memoirs of a Geisha', 'eng', '4.08', 'https://rukminim1.flixcart.com/image/416/416/kuef2q80/book/2/k/h/memoirs-of-a-geisha-original-imag7jf6tv9qbkeu.jpeg?q=70', '755', 'null', 'null', 'null'),
('34', '169', '1612130291', 'E.L. James', '2011', 'Fifty Shades of Grey', 'eng', '3.67', 'https://rukminim1.flixcart.com/image/416/416/kingqkw0-0/book/o/x/f/fifty-shades-of-grey-original-imafyegftvhrwdcu.jpeg?q=70', '650', 'null', 'null', 'null'),
('35', '458', '61122416', 'Paulo Coelho, Alan R. Clarke', '1988', 'O Alquimista', 'eng', '3.82', 'https://rukminim1.flixcart.com/image/416/416/jod7rm80/book/1/5/5/de-hesse-a-coelho-o-siddharta-en-los-tiempos-de-el-alquimista-original-imafats9mmky6u2k.jpeg?q=70', '482', 'null', 'null', 'null'),
('36', '192', '385732554', 'Lois Lowry', '1993', 'The Giver', 'eng', '4.12', 'https://rukminim1.flixcart.com/image/416/416/book/7/6/4/the-giver-original-imae7njktkhvmxvg.jpeg?q=70', '399', 'null', 'null', 'null'),
('37', '474', '60764899', 'C.S. Lewis', '1950', 'The Lion, the Witch and the Wardrobe', 'eng', '4.19', 'https://rukminim1.flixcart.com/image/612/612/book/6/6/7/the-chronicles-of-narnia-the-loin-the-witch-and-the-wardrobe-original-imadf2nsbtg2hfgh.jpeg?q=70', '433', 'null', 'null', 'null'),
('38', '167', '965818675', 'Audrey Niffenegger', '2003', 'The Time Traveler\'s Wife', 'eng', '3.95', 'https://rukminim1.flixcart.com/image/612/612/kuef2q80/book/7/u/j/the-time-traveler-s-wife-original-imag7jhk5bhym9zr.jpeg?q=70 ', '499', 'null', 'null', 'null'),
('39', '101', '553588486', 'George R.R. Martin', '1996', 'A Game of Thrones', 'eng', '4.45', 'https://rukminim1.flixcart.com/image/612/612/kikluvk0-0/book/a/o/8/a-game-of-thrones-original-imafybxeu8erhqge.jpeg?q=70', '599', 'null', 'null', 'null'),
('4', '487', '61120081', 'Harper Lee', '1960', 'To Kill a Mockingbird', 'eng', '4.25', 'https://rukminim1.flixcart.com/image/416/416/kkr72q80/regionalbooks/s/i/o/to-kill-a-mockingbird-original-imagyf9vuhjv4nwg.jpeg?q=70', '120', 'To Kill a Mockingbird is a novel by Harper Lee. ... Many residents of Maycomb are racists and during the novel Atticus is asked to defend Tom Robinson, a black man wrongly accused of raping a white woman. Atticus takes on the case even though everyone knows he has little hope of winning', 'Author:Harper Lee,320 Pages,Language: English,Publisher: Cornerstone', 'Novel'),
('40', '185', '143038419', 'Elizabeth Gilbert', '2006', 'Eat, pray, love: one woman\'s search for everything', 'eng', '3.51', 'https://rukminim1.flixcart.com/image/416/416/kmjhw280/book/c/j/k/eat-pray-love-one-woman-s-search-for-everything-across-italy-original-imagff5nrug7bhzr.jpeg?q=70', '751', 'null', 'null', 'null'),
('41', '159', '786838655', 'Rick Riordan', '2005', 'The Lightning Thief', 'eng', '4.23', 'https://rukminim1.flixcart.com/image/612/612/kufuikw0/book/z/f/8/percy-jackson-and-the-lightning-thief-book-1-original-imag7jnekngxpud6.jpeg?q=70', '209', 'null', 'null', 'null'),
('42', '1707', '451529308', 'Louisa May Alcott', '1868', 'Little Women', 'en-US', '4.04', 'https://rukminim1.flixcart.com/image/612/612/kqjtd3k0/book/n/c/s/little-women-original-imag4gu8gbxerg8n.jpeg?q=70', '346', 'null', 'null', 'null'),
('43', '2568', '142437204', 'Charlotte Brontë, Michael Mason', '1847', 'Jane Eyre', 'eng', '4.1', 'https://rukminim1.flixcart.com/image/612/612/kgqvlow0/book/6/1/0/jane-eyre-original-imafwwgwfcjxyxkc.jpeg?q=70', '530', 'null', 'null', 'null'),
('44', '190', '553816713', 'Nicholas Sparks', '1996', 'The Notebook', 'eng', '4.06', 'https://rukminim1.flixcart.com/image/612/612/jbtomfk0/book/9/1/5/notebook-original-imafyxzgjfrqe2ag.jpeg?q=70', '750', 'null', 'null', 'null'),
('45', '264', '770430074', 'Yann Martel', '2001', 'Life of Pi', 'eng', '3.88', 'https://rukminim1.flixcart.com/image/612/612/kiew3gw0-0/book/g/c/q/life-of-pi-original-imafy7zpytykhw46.jpeg?q=70', '652', 'null', 'null', 'null'),
('46', '128', '1565125606', 'Sara Gruen', '2006', 'Water for Elephants', 'eng', '4.07', 'https://rukminim1.flixcart.com/image/612/612/kq8dua80/book/x/a/o/a-study-guide-for-sarah-gruen-s-water-for-elephants-original-imag4a5fkjkfzkyq.jpeg?q=70', '420', 'null', 'null', 'null'),
('47', '251', '375831002', 'Markus Zusak', '2005', 'The Book Thief', 'eng', '4.36', 'https://rukminim1.flixcart.com/image/612/612/kufuikw0/book/1/a/v/the-book-thief-original-imag7kghymgdt2uf.jpeg?q=70', '488', 'null', 'null', 'null'),
('48', '507', '307347974', 'Ray Bradbury', '1953', 'Fahrenheit 451', 'spa', '3.97', 'https://rukminim1.flixcart.com/image/612/612/k33c4nk0/book/0/6/1/fahrenheit-451-original-imafmasxfhtyzajs.jpeg?q=70 ', '699', 'null', 'null', 'null'),
('49', '194', '316160199', 'Stephenie Meyer', '2006', 'New Moon (Twilight, #2)', 'eng', '3.52', 'https://rukminim1.flixcart.com/image/612/612/kql8sy80/book/u/t/y/the-twilight-saga-new-moon-original-imag4jubwfemy5ek.jpeg?q=70', '299', 'null', 'null', 'null'),
('5', '1356', '743273567', 'F. Scott Fitzgerald', '1925', 'The Great Gatsby', 'eng', '3.89', 'https://rukminim1.flixcart.com/image/416/416/kka1si80/book/k/a/r/the-great-gatsby-original-imafznamwzgepty4.jpeg?q=70', '141', 'The Great Gatsby is a classic novel of the young and mysterious millionaire Jay Gatsby and his quixotic love for Daisy Buchanan by F. Scott Fitzgerald. About F. Scott Fitzgerald\n\nFrancis Scott Key Fitzgerald was an American writer best remembered for his short stories and novels. He coined the term the Jazz Age and is considered one of the most important writers of the 20th century. He has also written: This Side of Paradise, The Love of the Last Tycoon, The Beautiful and Damned, and Tender Is The Night.', 'Author:Fitzgerald F. Scott,Language: English,Binding: Paperback,Publisher: Rupa & Co,Genre: Literary Criticism', 'Literary Criticism'),
('6', '226', '525478817', 'John Green', '2012', 'The Fault in Our Stars', 'eng', '4.26', 'https://rukminim1.flixcart.com/image/416/416/jph83gw0/book/3/3/6/the-fault-in-our-stars-original-imafbzwupkk2dzxe.jpeg?q=70', '399', 'One of the most popular young adult fiction books to read is?The Fault in Our Stars?by John Green. It is a poignant story that deals with the lives of two cancer-stricken teenagers. Hazel is a 16-year-old girl who has been diagnosed with thyroid cancer. She is sent to a cancer support society to cope with her illness where she meets Augustus Waters, a fellow cancer survivor. They share a love that takes them through an unforgettable journey which forms the crux of the story. It is one of the best young adult fiction books which makes it a must-read for the young bibliophiles. Buy The Fault in Our Stars book online and connect with the protagonists in a very intense and emotional way.', 'Author:Green John,Language: English,Binding: Paperback,Publisher: Penguin Random House Children\'s UK,Width20 mm,Height198 mm,Length129 mm,Weight237 gr', 'Young Adult fiction'),
('7', '969', '618260307', 'J.R.R. Tolkien', '1937', 'The Hobbit or There and Back Again', 'en-US', '4.25', 'https://rukminim1.flixcart.com/image/416/416/jph83gw0/book/3/0/0/the-hobbit-or-there-and-back-again-original-imafbp5chvzjbafs.jpeg?q=70', '808', 'They have?launched a plot to raid the treasure hoard guarded?by Smaug the Magnificent, a large and very dangerous dragon. Bilbo reluctantly joins their quest, unaware that on his journey to the Lonely Mountain he will encounter both a magic ring and a frightening creature known as Gollum.', 'Author:Tolkien J R R,Language: English,Binding: Paperback,Publisher: Houghton Mifflin,Width28 mm,Height196 mm,Length130 mm,Weight272 gr', 'Children\'s Fiction, Fantasy Fiction'),
('8', '360', '316769177', 'J.D. Salinger', '1951', 'The Catcher in the Rye', 'eng', '3.79', 'https://rukminim1.flixcart.com/image/416/416/kufuikw0/book/p/a/q/the-catcher-in-the-rye-original-imag7jttju9vfuxa.jpeg?q=70', '399', 'The Catcher In The Rye by J. D. Salinger is a coming-of-age novel that explores the themes of rebellion, independence, and identity, through the adventures of a teenage boy.Jerome David Salinger was a celebrated American writer, who hailed from New York City. He authored other books such as Nine Stories, Franny And Zooey, and Go See Eddie. Salinger completed his education at Valley Forge Military Academy. He also completed a writing course at Columbia University. During the Second World War, Salinger worked for the counterintelligence division, where his role was to interrogate POWs. After the war, Salinger continued to publish his stories in various magazines and newspapers. The Catcher In The Rye was Salinger?s first published novel. In his personal life, Salinger was somewhat of a recluse. He had married three times and fathered two children. He was also an avid practitioner of Zen Buddhism and he later began practising Vedantic Yoga. Salinger passed away in 2010, of natural causes.', 'Author:Salinger J. D.,Language: English,Binding: Paperback,Publisher: Penguin Books Ltd,Width:15 mm,Height:181 mm,Length:111 mm,Weight:134 gr', 'Fiction'),
('9', '311', '1416524797', 'Dan Brown', '2000', 'Angels & Demons ', 'en-CA', '3.85', 'https://rukminim1.flixcart.com/image/416/416/kufuikw0/book/o/v/k/angels-and-demons-original-imag7js6gfcz8xn6.jpeg?q=70', '420', 'When a CERN scientist is found murdered, the investigators decide to contact Robert Langdon for assistance. A Professor of Symbology at Harvard, Langdon can?t understand why the police need his help. When he arrives, he discovers a series of strange symbols which link the murder to the Vatican, where the College of Cardinals has assembled for one purpose: the election of the new Pope. The entire world is watching as the ballot boxes are collected, but unless Langdon can help solve the clues in time, a deadly bomb waits beneath the city, waiting to go off.', 'Author:Brown Dan,Language: English,Binding: Paperback,Publisher: Transworld Publishers Ltd,Width37 mm,Height178 mm,Length110 mm,Weight327 gr', 'Fiction'),
('book_id', 'books_count', 'book_isbn', 'authors', 'original_publication_year', 'original_title', 'language_code', 'average_rating', 'image_url', 'cost', 'description', 'book_details', 'genre');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `book_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `cust_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `username` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` int(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `email`, `password`, `phone`, `address`, `userid`) VALUES
('shardul birje', 'shardul@gmail.com', 'shardul', NULL, NULL, 8),
('Rohana Survase', 'rohanasurvase@gmail.com', 'rohana', NULL, NULL, 9),
('Sayali  Khamgaonkar', 'sayali@gmail.com', 'sayali', NULL, NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_id` int(11) NOT NULL,
  `Cust_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `address` varchar(300) NOT NULL,
  `quantity` int(11) NOT NULL,
  `Total_Amt` int(11) NOT NULL,
  `Order_Date` date NOT NULL,
  `Delivery_Date` date NOT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `Cust_id` varchar(10) NOT NULL,
  `book_isbn` varchar(10) NOT NULL,
  `book_id` int(10) NOT NULL,
  `rating` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `user_id` int(11) NOT NULL,
  `rent_book_id` int(11) NOT NULL,
  `pickup_date` varchar(100) NOT NULL,
  `period` varchar(100) NOT NULL,
  `rent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sell_books`
--

CREATE TABLE `sell_books` (
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
