drop table if exists messages;
create table messages(
    id int(10) not null PRIMARY KEY AUTO_INCREMENT,
    parent_id int(10),
    sender_type enum('customer', 'vendor'),
    sender_id int(10),
    reciever_id int(10),
    content text,
    timesent datetime
);