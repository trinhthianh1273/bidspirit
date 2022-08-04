create database bidspirit;

use bidspirit;

create table admin (
    adminId varchar(255) not null primary key,
    pass varchar(255) DEFAULT NULL,
    keypass varchar(255) DEFAULT NULL
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
    'trinhanh', 'phungbaokimanh@gmail.com', '0941147009', 'cc0a37368f6299a050fcd66515310bcc', '321@resU'
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
    'trinhanh', 'phungbaokimanh@gmail.com', '0941147009', '3f7dcdf19a8e6d8556d11df5ced3c223', '321@tnahcreM'
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

create table products (
	productId int(11) not null primary key AUTO_INCREMENT,
    merchantId int(11) DEFAULT null,
    categoryId int(11) DEFAULT null,
    productname varchar(255) DEFAULT null,
    description varchar(2500) default null,
    productImage varchar(255) default null,
    basePrice int(11) DEFAULT null,
    createDate timestamp not null default current_timestamp,
    updateDate varchar(255) default null,
    startDate varchar(255) default null,
    endDate varchar(255) default null
);

create table category (
	categoryId int(11)  not null primary key AUTO_INCREMENT,
    categoryname varchar(255) DEFAULT null,
    createDate timestamp not null default current_timestamp,
    updateDate varchar(255) default null
);

alter table products 
add FOREIGN KEY (merchantId) references merchants(merchantId);
alter table products
add FOREIGN KEY (categoryId) references category(categoryId);

create table auction (
	auctionId int(11)  not null primary key AUTO_INCREMENT,
    userId int(11) DEFAULT null,
    productId int(11) DEFAULT null,
    price int(20) DEFAULT null,
    status int(1) default null,
    auctionTime timestamp not null default current_timestamp
);

alter table auction
add FOREIGN KEY (userId) references users(userId),
add FOREIGN KEY (productId) references products(productId);



