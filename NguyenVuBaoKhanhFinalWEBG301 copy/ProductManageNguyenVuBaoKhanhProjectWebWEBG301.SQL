create database productShopManageLaravel;
-- drop database productShopManageLaravel;
use productShopManageLaravel;


create table categories( 
 categoryId int not null auto_increment primary key,
 categoryName varchar(100) not null unique,
 categoryDescription varchar(100) null
);
-- drop table categories;
insert into categories 
values
      (1,'Smart Phone','A phone that could be able to touch the screen and 120hz refresh rate'),
      (2, 'Smart TV', 'A Tivi that could be able to connect with the Internet with 16k resolution' ),
        (3, 'Smart Watch', 'A watch that could be able to connect with the Internet and health care'),
        (4, 'Laptop', 'A laptop that could be used for gaming and working'),
        (5, 'Smart Camera', 'A camera that could be able to video call with others with 8k resolution');

select*from categories;


create table products(
productId varchar(100) not null primary key,
productName varchar(300) not null,
productPrice varchar(300) not null,
productDetail varchar(300) null,
productImage varchar(300) null,
categoryId int not null,

constraint foreignKeyNamedCATEGORYID foreign key (categoryId)
references categories(categoryId)
);
-- drop table produts;

insert into products
values 
('pro1','Iphone 13','1000$','An Iphone 13 from 2022 from Apple','something.png',1),
('pro2','Sony Camera','400$','A Sony Camera with 8k video resolution','something.png',5),
('pro3','Laptop Nitro N5','800$','A Nitro laptop that has NVDIA chip','something.png',4),
('pro4','Xiaomi Black Shark 3','600$','A smart phone from Xiaomi with cheap price for gaming','something.png',1),
('pro5','Apple watch 03','100$','A Very cheap smart watch from Apple','something.png',3);

create table admins(
adminId varchar(200) not null primary key,
adminName varchar(300) not null,
adminPhoto varchar(200) null,
adminPassword varchar(300) not null
);
-- drop table admins;

insert into admins
values
('admin01','Tom','tom.jpg','Tom123'),
('admin02','Jerry','jerry.jpg','Jerry123'),
('admin03','Jack','jerry.jpg','Jerry123'),
('admin04','Michael','jerry.jpg','Jerry123'),
('admin05','Ashley','jerry.jpg','Jerry123');
select * from admins;