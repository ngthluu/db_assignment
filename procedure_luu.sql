use db_ass;

/* (ii.7). Xem danh sách sách theo năm xuất bản. */
delimiter $$
drop procedure if exists ListBooksByPublishedYear $$
create procedure ListBooksByPublishedYear(
    in _year int
)
begin
    select 
        book.isbn,
        book.bookname,
        ANY_VALUE(author.author_name) AS author_name,
        ANY_VALUE(written.date_release) AS date_release,
        GROUP_CONCAT(category.cate separator ', ') as category
    from book
    join written on written.isbn = book.isbn
    join category on category.isbn = book.isbn
    join author on author.author_id = written.author_id
    where year(written.date_release) = _year
    group by book.isbn;
end $$
delimiter ;

/* (ii.8).  Xem danh sách sách mà mình đã mua trong một tháng. */
delimiter $$
drop procedure if exists ListBooksBuyInMonth $$
create procedure ListBooksBuyInMonth(
    in _customerid int, 
    in _month int,
    in _year int
)
begin
    select
        book.isbn,
        book.bookname,
        ANY_VALUE(author.author_name) AS author_name,
        ANY_VALUE(written.date_release) AS date_release,
        GROUP_CONCAT(category.cate separator ', ') as category
    from book
    join written on written.isbn = book.isbn
    join category on category.isbn = book.isbn
    join author on author.author_id = written.author_id
    where book.isbn in (
        select book.isbn
        from book
        join order_detail on order_detail.isbn = book.isbn
        join s_order on s_order.order_id = order_detail.order_id
        where s_order.customer_id = _customerid 
            and month(s_order.created_date) = _month
            and year(s_order.created_date) = _year
    )
    group by book.isbn;
end $$
delimiter ;

/* (ii.9). Xem danh sách các giao dịch mà mình đã thực hiện trong một tháng */
delimiter $$
drop procedure if exists ListOrderInMonth $$
create procedure ListOrderInMonth(
    in _customerid int, 
    in _month int,
    in _year int
)
begin
    select 
        s_order.*, 
        count(order_detail.isbn) as book_count
    from s_order
    join order_detail on order_detail.order_id = s_order.order_id
    where s_order.customer_id = _customerid 
        and month(s_order.created_date) = _month
        and year(s_order.created_date) = _year
    group by s_order.order_id;
end $$
delimiter ;

/* (ii.10). Xem danh sách các giao dịch gặp sự cố mà mình đã thực hiện trong một tháng */
delimiter $$
drop procedure if exists ListErrorOrderInMonth $$
create procedure ListErrorOrderInMonth(
    in _customerid int, 
    in _month int,
    in _year int
)
begin
    select 
        s_order.*,
        count(order_detail.isbn) as book_count
    from s_order
    join order_detail on order_detail.order_id = s_order.order_id
    where s_order.customer_id = _customerid 
        and month(s_order.created_date) = _month 
        and year(s_order.created_date) = _year 
        and s_order.error_state = "Sự cố"
    group by s_order.order_id;
end $$
delimiter ;

/* (ii.11). Xem danh sách các giao dịch mà mình đã thực hiện nhưng chưa hoàn tất */
delimiter $$
drop procedure if exists ListNotFinishedOrder $$
create procedure ListNotFinishedOrder(
    in _customerid int,
    in _month int,
    in _year int
)
begin
    select 
        s_order.*,
        count(order_detail.isbn) as book_count
    from s_order
    join order_detail on order_detail.order_id = s_order.order_id
    where s_order.customer_id = _customerid 
        and month(s_order.created_date) = _month 
        and year(s_order.created_date) = _year
        and s_order.order_state = "Đã hủy"
    group by s_order.order_id;
end $$
delimiter ;

/* (ii.12). Xem danh sách tác giả của cùng một thể loại. */
delimiter $$
drop procedure if exists ListAuthorByCategory $$
create procedure ListAuthorByCategory(
    in _category varchar(255)
)
begin
    select author.*
    from author
    join written on written.author_id = author.author_id
    join category on category.isbn = written.isbn
    where category.cate = _category;
end $$
delimiter ;

/* (ii.13). Xem danh sách tác giả của cùng một số từ khóa. */
delimiter $$
drop procedure if exists ListAuthorByKeyword $$
create procedure ListAuthorByKeyword(
    in _keyword varchar(255)
)
begin
    select distinct author.*
    from author
    join written on written.author_id = author.author_id
    join book on book.isbn = written.isbn
    where book.bookname like CONCAT('%', _keyword, '%') 
        OR author.author_name like CONCAT('%', _keyword, '%'); 
end $$
delimiter ;

/* (ii.14). Xem tổng số sách theo từng thể loại mà mình đã mua trong một tháng. */
delimiter $$
drop procedure if exists ListBookByCategoryBuyInMonth $$
create procedure ListBookByCategoryBuyInMonth(
    in _customerid int,
    in _category varchar(255),
    in _month int,
    in _year int
)
begin
    select
        book.isbn,
        book.bookname,
        ANY_VALUE(author.author_name) AS author_name,
        ANY_VALUE(written.date_release) AS date_release,
        GROUP_CONCAT(category.cate separator ', ') as category
    from book
    join written on written.isbn = book.isbn
    join category on category.isbn = book.isbn
    join author on author.author_id = written.author_id
    where book.isbn in (
        select book.isbn
        from book
        join order_detail on order_detail.isbn = book.isbn
        join s_order on s_order.order_id = order_detail.order_id
        join category on category.isbn = book.isbn
        where s_order.customer_id = _customerid 
            and month(s_order.created_date) = _month
            and year(s_order.created_date) = _year
            and category.cate = _category
    )
    group by book.isbn;
end $$
delimiter ;

/* (ii.15). Xem các giao dịch mà mình đã thực hiện có số lượng sách được mua nhiều nhất trong một tháng.  */
delimiter $$
drop procedure if exists ListMostBuyBookOrderInMonth $$
create procedure ListMostBuyBookOrderInMonth(
    in _customerid int,
    in _month int,
    in _year int
)
begin
    select
        s_order.*, 
        count(order_detail.isbn) as book_count
    from s_order
    join order_detail on order_detail.order_id = s_order.order_id
    where s_order.customer_id = _customerid 
        and month(s_order.created_date) = _month
        and year(s_order.created_date) = _year
    group by s_order.order_id
    having book_count = (
        select max(t.book_count)
        from (
            select
                s_order.*, 
                count(order_detail.isbn) as book_count
            from s_order
            join order_detail on order_detail.order_id = s_order.order_id
            where s_order.customer_id = _customerid 
                and month(s_order.created_date) = _month
                and year(s_order.created_date) = _year
            group by s_order.order_id
        ) as t
    );
end $$
delimiter ;

/* (ii.16). Xem các giao dịch vừa có sách truyền thống vừa có sách điện tử được mua hoặc thuê mà mình đã thực hiện trong một tháng. */
delimiter $$
drop procedure if exists ListBothTradAndElecOrderInMonth $$
create procedure ListBothTradAndElecOrderInMonth(
    in _customerid int,
    in _month int,
    in _year int
)
begin
    select 
        s_order.*,
        count(order_detail.isbn) as book_count
    from s_order
    join order_detail on order_detail.order_id = s_order.order_id
    where s_order.order_id in (
        (
            select order_detail.order_id
            from order_detail
            where order_detail.isbn in (select isbn from elec_book)
        )
        union
        (
            select order_detail.order_id
            from order_detail
            where order_detail.isbn in (select isbn from trad_book)
        )
    )
    group by s_order.order_id;
end $$
delimiter ;

/* Extra 1: Customer Login */
delimiter $$
drop procedure if exists CustomerLogin $$
create procedure CustomerLogin(
    in _email varchar(255),
    in _password varchar(255)
)
begin
    select systemuser.user_id
    from systemuser
    join customer ON customer.customer_id = systemuser.user_id
    where systemuser.email = _email AND systemuser.pass = _password;
end $$
delimiter ;

/* Extra 2: Customer Signup */
delimiter $$
drop procedure if exists CustomerSignup $$
create procedure CustomerSignup(
    in _cmnd varchar(12),
    in _lname varchar(255),
    in _fname varchar(255),
    in _email varchar(255),
    in _username varchar(255),
    in _password varchar(64)
)
begin

    insert into systemuser (cmnd, lname, fname, email, username, pass)
    values (
        _cmnd,
        _lname,
        _fname,
        _email,
        _username,
        _password
    );

    insert into customer (customer_id) values (LAST_INSERT_ID());
end $$
delimiter ;

/* Extra 3: List All Books (home) */
delimiter $$
drop procedure if exists ListAllBooks $$
create procedure ListAllBooks()
begin
    select 
        book.isbn,
        book.bookname,
        ANY_VALUE(author.author_name) AS author_name,
        ANY_VALUE(written.date_release) AS date_release,
        GROUP_CONCAT(category.cate separator ', ') as category
    from book
    join written on written.isbn = book.isbn
    join category on category.isbn = book.isbn
    join author on author.author_id = written.author_id
    group by book.isbn;
end $$
delimiter ;

/* Extra 4: List All Authors (home) */
delimiter $$
drop procedure if exists ListAllAuthors $$
create procedure ListAllAuthors()
begin
    select author.*
    from author;
end $$
delimiter ;

/* Extra 5: List All Category (home) */
delimiter $$
drop procedure if exists ListAllCategories $$
create procedure ListAllCategories()
begin
    select distinct(category.cate) as category
    from category;
end $$
delimiter ;

/* Extra 6: ListAllBuyBooks */
delimiter $$
drop procedure if exists ListAllBuyBooks $$
create procedure ListAllBuyBooks(
    in _customerid int
)
begin
    select
        book.isbn,
        book.bookname,
        ANY_VALUE(author.author_name) AS author_name,
        ANY_VALUE(written.date_release) AS date_release,
        GROUP_CONCAT(category.cate separator ', ') as category
    from book
    join written on written.isbn = book.isbn
    join category on category.isbn = book.isbn
    join author on author.author_id = written.author_id
    where book.isbn in (
        select book.isbn
        from book
        join order_detail on order_detail.isbn = book.isbn
        join s_order on s_order.order_id = order_detail.order_id
        where s_order.customer_id = _customerid
    )
    group by book.isbn;
end $$
delimiter ;

/* (ii.16). ListAllBuyOrders */
delimiter $$
drop procedure if exists ListAllBuyOrders $$
create procedure ListAllBuyOrders(
    in _customerid int
)
begin
    select 
        s_order.*,
        count(order_detail.isbn) as book_count
    from s_order
    join order_detail on order_detail.order_id = s_order.order_id
    where s_order.customer_id = _customerid
    group by s_order.order_id;
end $$
delimiter ;