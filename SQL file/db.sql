create database bidspirit;

use bidspirit;
create table users (
	user_id int(11) not null primary key AUTO_INCREMENT,
    email varchar(255) not null UNIQUE,
    phone varchar(255) not null UNIQUE,
    address_id int(11) not null,
    user_name varchar(255) not null,
    pass varchar(255) not null,
    company varchar(255) default null,
    payment varchar(255) not null,
    createDate timestamp not null default current_timestamp,
    updateDate varchar(255) default null
);

create table merchants (
	merchant_id int(11) not null primary key AUTO_INCREMENT,
    email varchar(255) not null UNIQUE,
    address_id int(11) not null,
    merchant_name varchar(255) not null,
    pass varchar(255) not null,
    type int(1) default null,
    createDate timestamp not null default current_timestamp,
    updateDate varchar(255) default null
);

create table address (
	address_id int(11) not null primary key AUTO_INCREMENT,
    zip_code int(11) not null,
    province varchar(255) not null,
    district varchar(255) not null,
    commune varchar(255) not null,
    address varchar(255) not null,
    createDate timestamp not null default current_timestamp,
    updateDate varchar(255) default null
);

alter table users 
add FOREIGN KEY (address_id) references address(address_id);

alter table merchants 
add FOREIGN KEY (address_id) references address(address_id);

create table products (
	product_id int(11) not null primary key AUTO_INCREMENT,
    merchant_id int(11) not null,
    category_id int(11) not null,
    product_name varchar(255) not null,
    description varchar(2500) default null,
    productImage varchar(255) default null,
    basePrice int(11) not null,
    createDate timestamp not null default current_timestamp,
    updateDate varchar(255) default null,
    startDate varchar(255) default null,
    endDate varchar(255) default null
);

create table category (
	category_id int(11)  not null primary key AUTO_INCREMENT,
    category_name varchar(255) not null,
    createDate timestamp not null default current_timestamp,
    updateDate varchar(255) default null
);

alter table products 
add FOREIGN KEY (merchant_id) references merchants(merchant_id);
alter table products
add FOREIGN KEY (category_id) references category(category_id);

create table auction (
	auction_id int(11)  not null primary key AUTO_INCREMENT,
    user_id int(11) not null,
    product_id int(11) not null,
    price int(20) not null,
    status int(1) default null,
    auctionTime timestamp not null default current_timestamp
);

alter table auction
add FOREIGN KEY (user_id) references users(user_id),
add FOREIGN KEY (product_id) references products(product_id);



