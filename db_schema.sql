create database db_ass;
use db_ass;

create table systemuser (
	user_id		varchar(12),
	cmnd		varchar(12)		not null	unique,
    lname		varchar(255),
    fname		varchar(255),
    email		varchar(255)	not null	unique,
    username 	varchar(255)	not null	unique,
    pass		varchar(64)		not null,
    
    primary key (user_id)
);

create table customer (
	customer_id		varchar(12),
    
    primary key (customer_id),
    foreign key (customer_id) references systemuser (user_id) on update cascade on delete cascade
);

create table staff (
	staff_id		varchar(12),
    staff_role		varchar(255)	not null,
    
    check (staff_role = 'normal' or staff_role = 'manager' or staff_role = 'storage_manager'),
    
    primary key (staff_id),
    foreign key (staff_id) references systemuser (user_id)  on update cascade on delete cascade
);

create table credit_card (
	card_id			varchar(255),
    bank_name		varchar(255),
    bank_branch		varchar(255),
    expired_day		date,
	customer_id		varchar(12)		not null,
    
    primary key (card_id),
    foreign key (customer_id) references customer(customer_id)  on update cascade on delete cascade
);

create table s_order (
	order_id		varchar(12),
    created_date		date,
    order_state 	varchar(255) check (order_state = "Đã tiếp nhận" or order_state = "Đang vận chuyển" 
										or order_state = "Đã giao hàng"),
	error_state 	varchar(255) check (error_state = "Bình thường" or error_state = "Sự cố" or error_state = "Đã giải quyết"),
    method			varchar(255)	not null check (method = "Tiền mặt" or method = "Thẻ"),
    customer_id		varchar(12)		not null,
    
    
    primary key (order_id),
    foreign key (customer_id) references customer(customer_id)  on update cascade on delete cascade
);

create table payment (
	id				varchar(12),
    pay_date		date			not null,
    order_id		varchar(12)		not null,
    
	primary key (id),
    foreign key (order_id) references s_order (order_id)  on update cascade on delete cascade
);

create table book (
	isbn			char(13),
    bookname	    varchar(255)	not null,
    
    primary key (isbn)
);

create table order_detail (
	id				varchar(12),
    unit_price		int				not null,
    state			varchar(255) 	check (state = "Chờ mua" or state = "Xuất kho"),
    purpose			varchar(255) 	check (purpose = "Mua" or purpose = "Thuê"),
    rent_time		date,
	order_id		varchar(12)		not null,
    isbn			char(13)		not null,
    
    check ((purpose = "Thuê" and rent_time != null) or (purpose = "Mua" and rent_time = null)),
    
    primary key (id),
    foreign key (order_id) references s_order (order_id)  on update cascade on delete cascade,
    foreign key (isbn) references book (isbn)  on update cascade on delete cascade
);

create table elec_book (
    isbn		char(13),
    rent_link	text,
    buy_link	text,
    rent_price	int,
    buy_price	int,
    
    primary key (isbn),
    foreign key (isbn) references book(isbn)  on update cascade on delete cascade
);

create table s_storage (
	storage_id	varchar(12),
    location	text,
    staff_id	varchar(12)		not null,
    
    primary key (storage_id),
    foreign key (staff_id) references staff (staff_id)  on update cascade on delete cascade
);

create table trad_book (
	isbn			char(13),
	price			int,
    
    primary key (isbn),
    foreign key (isbn) references book(isbn)  on update cascade on delete cascade
);

create table book_stored (
	isbn			char(13)		not null,
    storage_id		varchar(12)		not null,
    remain_amount	int				not null,
    
    primary key (isbn, storage_id),
    foreign key (isbn) references trad_book(isbn) on update cascade on delete cascade,
    foreign key (storage_id) references s_storage(storage_id)  on update cascade on delete cascade
);

create table responsible (
	storage_id		varchar(12)		not null,
    detail_id		varchar(12)		not null,
    quantity		int				not null 	check (quantity > 0),
    
    primary key (storage_id, detail_id),
    foreign key (storage_id) references s_storage(storage_id) on update cascade on delete cascade,
    foreign key (detail_id) references order_detail(id) on update cascade on delete cascade
);

create table author (
	author_id		varchar(12),
    author_name		text,
    
    primary key (author_id)
);

create table written (
	isbn			char(13),
    author_id 		varchar(12),
    no_edit			int,
    date_release	date,
    publishing		text,
    
    primary key (isbn, author_id),
    foreign key (isbn) references book (isbn)  on update cascade on delete cascade,
    foreign key (author_id) references author (author_id)  on update cascade on delete cascade
);

create table feedback(
	customer_id		varchar(12),
    isbn			char(13),
    rating			int,
    comt			text,
    
    primary key (customer_id, isbn),
    foreign key (customer_id) references customer(customer_id)  on update cascade on delete cascade,
    foreign key (isbn) references book(isbn)  on update cascade on delete cascade
);

create table category (
	isbn	char(13),
    cate	varchar(255),
    
    primary key (isbn, cate),
    foreign key (isbn) references book (isbn)  on update cascade on delete cascade
);



