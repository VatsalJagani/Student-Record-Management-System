
create table casts (
  cast_no int(4) primary key auto_increment,
  cast_name varchar(25) not null
);

create table banks(
  bank_no int(4) primary key auto_increment,
  bank_name varchar(40) not null,
  place varchar(30) not null
);

create table student (
	gr_no int(10) primary key auto_increment,
	name varchar(70) not null,
	mother_name varchar(25),
	gender int(1) not null,
	birthdate date not null,
	admission_date date not null,
	school_leaving_date date,
	cast_no int(4) not null references casts(cast_no),
	bank_no int(4) references banks(bank_no),
	bank_ac_no bigint(20),
	aadhar_no bigint(12),
	uid_no bigint(18),
	contact_no varchar(15),
	rashan_no bigint(15),
	apl_bpl int(1)
);