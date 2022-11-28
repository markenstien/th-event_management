drop table if exists payments;
create table payments(
	id int(10) not null primary key auto_increment,
	parent_id int(10) not null,
	meta_key varchar(100),
	reference varchar(100),
	amount decimal(10 ,2),
	status enum('pending', 'approved', 'declined') default 'pending',
	method enum('online','cash'),
	notes text,
	org varchar(100),
	external_reference varchar(100),
	acc_no	varchar(100),
	acc_name	varchar(100),
	bill_id	int(10),
	created_by int(10),
	created_at timestamp default now()
);

alter table payments
	add column status enum('pending', 'approved', 'declined') default 'pending';