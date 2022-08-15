create database bidspirit;

use bidspirit;

create table admin (
    adminId varchar(255) not null primary key,
    pass varchar(255) DEFAULT NULL,
    keypass varchar(255) DEFAULT NULL /* dùng để mã hóa password bằng md5*/
);

INSERT INTO `admin` (`adminId`, `pass`, `keypass`) VALUES
('admin', '7fe411063a262862bd99475511aceb1e', '321@tseT');

create table users (
	userId int(11) not null primary key AUTO_INCREMENT,
    username varchar(255) DEFAULT null,
    email varchar(255) DEFAULT null UNIQUE,
    phone varchar(255) DEFAULT null UNIQUE,
    pass varchar(255) DEFAULT null,
    keypass varchar(255) DEFAULT NULL,
    company varchar(255) default null,
    payment varchar(255) DEFAULT null,
    createDate timestamp not null default current_timestamp,
    updateDate varchar(255) default null
);

insert into `users`(`username`, `email`, `phone`, `pass`, `keypass`) VALUES (
    'trinhanh', 'phungbaokimanh@gmail.com', '0941147009', 'daafee6a917f8f52c16bca726d6ab541', '321@resU'
);

create table merchants (
	merchantId int(11) not null primary key AUTO_INCREMENT,
    merchantname varchar(255) DEFAULT null,
    email varchar(255) DEFAULT null UNIQUE,
    phone varchar(255) DEFAULT null UNIQUE,
    pass varchar(255) DEFAULT null,
    keypass varchar(255) DEFAULT NULL,
    type int(1) default null,
    createDate timestamp not null default current_timestamp,
    updateDate varchar(255) default null
);

insert into `merchants`(`merchantname`, `email`, `phone`, `pass`, `keypass`) VALUES(
    'trinhanh', 'phungbaokimanh@gmail.com', '0941147009', '521974bd639eae5548b42b567b5873c9', '321@tnahcreM'
);

create table address (
	addressId int(11) not null primary key AUTO_INCREMENT,
    zipcode int(11) DEFAULT null,
    province varchar(255) DEFAULT null,
    district varchar(255) DEFAULT null,
    commune varchar(255) DEFAULT null,
    address varchar(255) DEFAULT null,
    createDate timestamp not null default current_timestamp,
    updateDate varchar(255) default null
);

create table useraddress (
    userId int(11) DEFAULT null,
    addressId int(11) DEFAULT null
);

create table merchantaddress (
    merchantId int(11) DEFAULT null,
    addressId int(11) DEFAULT null
);

alter table useraddress 
add FOREIGN KEY (addressId) references address(addressId),
add FOREIGN KEY (userId) references users(userId);

alter table merchantaddress 
add FOREIGN KEY (addressId) references address(addressId),
add FOREIGN KEY (merchantId) references merchants(merchantId);


insert into address (zipcode, province, district, commune, address) VALUES
(420000, 'Nam Dinh', 'Xuan Truong', 'Xuan Kien', 'Xom 12a');
insert into useraddress(userId, addressId) VALUES (1,1);
INSERT INTO merchantaddress(merchantId, addressId) VALUES(1,1);



create table products (
	productId int(11) not null primary key AUTO_INCREMENT,
    merchantId int(11) DEFAULT null,
    categoryId int(11) DEFAULT null,
    productname varchar(255) DEFAULT null,
    description varchar(2500) default null,
    productImage1 varchar(255) default null,
    productImage2 varchar(255) default null,
    productImage3 varchar(255) default null,
    basePrice int(11) DEFAULT null,
    createDate timestamp not null default current_timestamp,
    updateDate varchar(255) default null,
    startDate varchar(255) default null,
    endDate varchar(255) default null,
    status int(1) default null /* -1:closed, 0:live, 1:upcoming */
);

insert into products(`merchantId`, `categoryId`, `productname`, `description`, `productImage1`, `productImage2`, `productImage3`, `basePrice`, `startDate`, `endDate`, status) VALUES
(1, 1, 'ANTIQUE MIRROR 1', 'Ref 7991 - Antique French Mirror - Large silver on black Louis Philippe antique mirror. Finished in original two tone silver worn through to black bole in places. Original glass. New plywood back. Circa 1880. Size (inches) - 71\"h x 43\"w. Price - £1500', 'antique_mirror1.jpg', 'antique_mirror1.jpg', 'antique_mirror1.jpg', 100, '2022-08-4 0:0:0', '2022-08-20 23:59:59', 0),
(1, 1, 'ANTIQUE MIRROR 2', 'Ref 7991 - Antique French Mirror - Large silver on black Louis Philippe antique mirror. Finished in original two tone silver worn through to black bole in places. Original glass. New plywood back. Circa 1880. Size (inches) - 71\"h x 43\"w. Price - £1500', 'antique_mirror2.jpg', 'antique_mirror2.jpg', 'antique_mirror2.jpg', 100, '2022-08-4 0:0:0', '2022-08-20 23:59:59', 0),
(1, 2, 'ART CHAIR 1', 'The Frida lounge chair is a real eye-catcher for any terrace, designed by Vincent Sheppard, this lounge chair is a statement piece in its own right.\nWith a choice of Natural Untreated Teak or Black Teak frame.\nThe natural teak frame used outdoors will turn into a soft, silvery grey which will contrast beautifully with the anthracite acrylic rope.', 'chair1.jpg', 'chair1.jpg', 'chair1.jpg', 100, '2022-08-20 0:0:0', '2022-08-30 23:59:59', 1),
(1, 2, 'ART CHAIR 2', 'The Frida lounge chair is a real eye-catcher for any terrace, designed by Vincent Sheppard, this lounge chair is a statement piece in its own right.\nWith a choice of Natural Untreated Teak or Black Teak frame.\nThe natural teak frame used outdoors will turn into a soft, silvery grey which will contrast beautifully with the anthracite acrylic rope.', 'chair2.jpg', 'chair2.jpg', 'chair2.jpg', 100, '2022-08-20 0:0:0', '2022-08-30 23:59:59', 1),
(1, 2, 'ART CHAIR 3', 'The Frida lounge chair is a real eye-catcher for any terrace, designed by Vincent Sheppard, this lounge chair is a statement piece in its own right.\nWith a choice of Natural Untreated Teak or Black Teak frame.\nThe natural teak frame used outdoors will turn into a soft, silvery grey which will contrast beautifully with the anthracite acrylic rope.', 'chair3.jpg', 'chair3.jpg', 'chair3.jpg', 100, '2022-08-1 0:0:0', '2022-08-3 23:59:59', -1),
(1, 3, 'CLASSIC SPEAKER 1', '-These gorgeous style gramophone record players are portable, require no electricity and make an impressive and memorable gift.\n-Full working order (sound quality sound) ready to play 78RPM recordings \n- Sturdy Seasonal wooden cabinet / base with authentic antique signs and Brass Horn', 'classicSpeakers1.jpg', 'classicSpeakers1.jpg', 'classicSpeakers1.jpg', 100, '2022-08-1 0:0:0', '2022-08-3 23:59:59', -1),
(1, 3, 'CLASSIC SPEAKER 2', '-These gorgeous style gramophone record players are portable, require no electricity and make an impressive and memorable gift.\n-Full working order (sound quality sound) ready to play 78RPM recordings \n- Sturdy Seasonal wooden cabinet / base with authentic antique signs and Brass Horn', 'classicSpeakers2.jpg', 'classicSpeakers2.jpg', 'classicSpeakers2.jpg', 100, '2022-08-1 0:0:0', '2022-08-3 23:59:59', -1),
(1, 3, 'CLASSIC SPEAKER 3', '-These gorgeous style gramophone record players are portable, require no electricity and make an impressive and memorable gift.\n-Full working order (sound quality sound) ready to play 78RPM recordings \n- Sturdy Seasonal wooden cabinet / base with authentic antique signs and Brass Horn', 'classicSpeakers3.jpg', 'classicSpeakers3.jpg', 'classicSpeakers3.jpg', 100, '2022-08-4 0:0:0', '2022-08-20 23:59:59', 0),
(1, 3, 'CLASSIC SPEAKER 4', '-These gorgeous style gramophone record players are portable, require no electricity and make an impressive and memorable gift.\n-Full working order (sound quality sound) ready to play 78RPM recordings \n- Sturdy Seasonal wooden cabinet / base with authentic antique signs and Brass Horn', 'classicSpeakers4.jpg', 'classicSpeakers4.jpg', 'classicSpeakers4.jpg', 100, '2022-08-20 0:0:0', '2022-08-30 23:59:59', 1),
(1, 4, 'OLD TELEPHONE 1', 'Product Name: Antique Style Wooden TelephoneModel\n Number: HS-801Place of Origin: ChinaFeatures:\n1) Real wood telephone with antique brass accent\n2) Wooden base and handset\n3) Push button dialing flat\n4) rotary way of last number redial\n5) Pulse/switchableInner packings tone: 1pc/color boxColor box dimensions: 20.0 x 18.0 x 23.0cm outer packing: 8pcs/ctnCarton dimensions: 73.5 x 23.5 x 40.5cmWeight: NW : 1.14kg/pcG.W.: 1.45kg/pcN . W.: 9.06kg/ctnG.W.: 11.60kg/ctn', 'oldtelephone1.jpg', 'oldtelephone1.jpg', 'oldtelephone1.jpg', 100, '2022-08-4 0:0:0', '2022-08-20 23:59:59', 0),
(1, 4, 'OLD TELEPHONE 2', 'Product Name: Antique Style Wooden TelephoneModel\n Number: HS-801Place of Origin: ChinaFeatures:\n1) Real wood telephone with antique brass accent\n2) Wooden base and handset\n3) Push button dialing flat\n4) rotary way of last number redial\n5) Pulse/switchableInner packings tone: 1pc/color boxColor box dimensions: 20.0 x 18.0 x 23.0cm outer packing: 8pcs/ctnCarton dimensions: 73.5 x 23.5 x 40.5cmWeight: NW : 1.14kg/pcG.W.: 1.45kg/pcN . W.: 9.06kg/ctnG.W.: 11.60kg/ctn', 'oldtelephone2.jpg', 'oldtelephone2.jpg', 'oldtelephone2.jpg', 100, '2022-08-20 0:0:0', '2022-08-30 23:59:59', 1),
(1, 4, 'OLD TELEPHONE 3', 'Product Name: Antique Style Wooden TelephoneModel\n Number: HS-801Place of Origin: ChinaFeatures:\n1) Real wood telephone with antique brass accent\n2) Wooden base and handset\n3) Push button dialing flat\n4) rotary way of last number redial\n5) Pulse/switchableInner packings tone: 1pc/color boxColor box dimensions: 20.0 x 18.0 x 23.0cm outer packing: 8pcs/ctnCarton dimensions: 73.5 x 23.5 x 40.5cmWeight: NW : 1.14kg/pcG.W.: 1.45kg/pcN . W.: 9.06kg/ctnG.W.: 11.60kg/ctn', 'oldtelephone3.jpg', 'oldtelephone3.jpg', 'oldtelephone3.jpg', 100, '2022-08-1 0:0:0', '2022-08-3 23:59:59', -1);


create table category (
	categoryId int(11)  not null primary key AUTO_INCREMENT,
    categoryname varchar(255) DEFAULT null,
    description varchar(255) DEFAULT null,
    createDate timestamp not null default current_timestamp,
    updateDate varchar(255) default null
);

insert into `category` (`categoryname`) VALUES
 ('mirror'),
 ('chair'),
 ('speaker'),
 ('telephone');


alter table products 
add FOREIGN KEY (merchantId) references merchants(merchantId);
alter table products
add FOREIGN KEY (categoryId) references category(categoryId);

create table auction (
	auctionId int(11)  not null primary key AUTO_INCREMENT,
    userId int(11) DEFAULT null,
    productId int(11) DEFAULT null,
    price int(20) DEFAULT null,
    status int(1) default null, /* 0:false, 1:success */
    auctionTime timestamp not null default current_timestamp
);

alter table auction
add FOREIGN KEY (userId) references users(userId),
add FOREIGN KEY (productId) references products(productId);

insert into auction (`userId`, `productId`, `price`, `status`) VALUES
(1, 5, 200, 1),
(1, 6, 500, 1),
(1, 7, 250, 1),
(1, 12, 300, 1);



create TABLE orderauction (
    orderId int(11) NOT NULL primary key auto_increment,
    userId int(11) DEFAULT null,
    productId int(11) DEFAULT null,
    status int(2) DEFAULT null,
    payment varchar(255) DEFAULT null,
    price int(11) DEFAULT null,
    createDate timestamp not null default current_timestamp
);

alter TABLE orderauction
add FOREIGN KEY (userId) references users(userId),
add FOREIGN KEY (productId) references products(productId);

CREATE TABLE tracking(
    trackingId int(11) NOT NULL primary key auto_increment,
    orderId int(11) DEFAULT null,
    tracking varchar(255) not null,
    remark varchar(255) not null,
    createDate timestamp not null default current_timestamp
);
alter TABLE tracking
add FOREIGN KEY (orderId) references orderauction(orderId);

insert into orderauction(userId,productId,price, status) VALUES
(1, 5, 200, 1),
(1, 6, 500, 1),
(1, 7, 250, 1),
(1, 12, 300, 1);

insert into tracking(orderId, tracking, remark) VALUES
(1,'in Process','Order has been Shipped'),
(2,'Delivered','Order Has been delivered'),
(3,'Delivered','Product delivered successfully'),
(4,'in Process','Product ready for Shipping');