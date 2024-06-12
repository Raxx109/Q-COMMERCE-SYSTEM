ITO MUNA:

CREATE DATABASE IF NOT EXISTS angsarapq;

TAS SELECT DATABASE AT EXECUTE SQL COMMAND ITO LAHAT SA BABA:

CREATE TABLE `item` 
(
  itemID int PRIMARY KEY AUTO_INCREMENT,
  name varchar(50),
  price int,
  img varchar(50)
);

INSERT INTO `item`( `name`, `price`, `img`) VALUES ('Bibingka','100','R.jpg');
INSERT INTO `item`( `name`, `price`, `img`) VALUES ('Sinugno','300','sinugno.jpg');
INSERT INTO `item`( `name`, `price`, `img`) VALUES ('Buko Pie','300','bukopie.jpg');
INSERT INTO `item`( `name`, `price`, `img`) VALUES ('Fresh Seafood','500','seafoods.jpg');
INSERT INTO `item`( `name`, `price`, `img`) VALUES ('Lambanog','350','lambaG.jpg');
INSERT INTO `item`( `name`, `price`, `img`) VALUES ('Budin','80','budin.jpg');
INSERT INTO `item`( `name`, `price`, `img`) VALUES ('Yema Cake','350','yema.jpg');
INSERT INTO `item`( `name`, `price`, `img`) VALUES ('Nilupak','100','nilupak.jpg');
INSERT INTO `item`( `name`, `price`, `img`) VALUES ('Tamales','20','tamales.jpg');
INSERT INTO `item`( `name`, `price`, `img`) VALUES ('Pinagong','60','pinagong.jpg');
INSERT INTO `item`( `name`, `price`, `img`) VALUES ('Apas','270','apas.jpg');
INSERT INTO `item`( `name`, `price`, `img`) VALUES ('Longganisa','250','longga.jpg');
INSERT INTO `item`( `name`, `price`, `img`) VALUES ('Pancit Habhab','15','habhab.jpg');
INSERT INTO `item`( `name`, `price`, `img`) VALUES ('Hardinera','135','hard.jpg');
INSERT INTO `item`( `name`, `price`, `img`) VALUES ('Kiping','135','kiping.jpg');
INSERT INTO `item`( `name`, `price`, `img`) VALUES ('Broas','150','broas.jpg');
INSERT INTO `item`( `name`, `price`, `img`) VALUES ('Puto Bao','20','putobao.jpg');
INSERT INTO `item`( `name`, `price`, `img`) VALUES ('Pinais na Hipon','757','pinais.jpg');
INSERT INTO `item`( `name`, `price`, `img`) VALUES ('Minanok','150','minanok.jpg');
INSERT INTO `item`( `name`, `price`, `img`) VALUES ('Agar-agar','30','agar.jpg');
INSERT INTO `item`( `name`, `price`, `img`) VALUES ('Binalay','150','binalay.jpg');
INSERT INTO `item`( `name`, `price`, `img`) VALUES ('Kesong Puti','15','kes.jpg');
INSERT INTO `item`( `name`, `price`, `img`) VALUES ('Tilapia Dishes','150','tilap.jpg');
INSERT INTO `item`( `name`, `price`, `img`) VALUES ('Sinantulan','150','sinantol.jpg');
INSERT INTO `item`( `name`, `price`, `img`) VALUES ('Kinilaw','150','kinilaw.jpg');
INSERT INTO `item`( `name`, `price`, `img`) VALUES ('Lato','80','lato.jpg');
INSERT INTO `item`( `name`, `price`, `img`) VALUES ('Camote Cue','15','Camote.jpg');
INSERT INTO `item`( `name`, `price`, `img`) VALUES ('Tinapa','150','Tinapa.jpg');
INSERT INTO `item`( `name`, `price`, `img`) VALUES ('Suman sa Lihiya','150','sumanlihiya.jpg');
INSERT INTO `item`( `name`, `price`, `img`) VALUES ('Sumang Infanta','150','suman.jpg');
INSERT INTO `item`( `name`, `price`, `img`) VALUES ('Minatamis na Saging','160','saging.jpg');
INSERT INTO `item`( `name`, `price`, `img`) VALUES ('Bilo - Bilo','30','Bilo-bilo.jpg');

CREATE TABLE `cart`
(
	cartitemID int PRIMARY KEY AUTO_INCREMENT,
	cartID int,
	itemID int UNIQUE,
	quantity int
);