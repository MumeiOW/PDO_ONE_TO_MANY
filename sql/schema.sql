create table network_admins ( 
    admin_id int auto_increment primary key,
    username varchar(50),
    first_name varchar(50),
    last_name varchar(50),
    date_of_birth varchar(50),
    position varchar(50),
    date_added timestamp default current_timestamp
);

create table tasks ( 
    task_id int auto_increment primary key,
    task_name varchar(50),
    technologies_used varchar(50),
    admin_id int
);