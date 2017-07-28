
CREATE TABLE `banks` (
  `bank_no` int(4) primary key AUTO_INCREMENT,
  `bank_name` varchar(40) NOT NULL,
  `place` varchar(30) NOT NULL
);

CREATE TABLE `students` (
  `sid` int(8) primary key AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  `mother_name` varchar(25),
  `gender` char(1) NOT NULL,
  `birthdate` date NOT NULL,
  `cast` varchar(10) NOT NULL,
  `bank_no` varchar(5) references banks(bank_no),
  `bank_ac_no` varchar(20) DEFAULT NULL,
  `aadhar_no` varchar(12) DEFAULT NULL,
  `uid_no` varchar(18) DEFAULT NULL,
  `contact_no` varchar(15) DEFAULT NULL,
  `rashan_no` varchar(15) DEFAULT NULL,
  `apl_bpl` char(1) DEFAULT NULL
);

CREATE TABLE `gr_list` (
  `gr_no` int(10) primary key,
  sid int(8) references students(sid),
  `admission_date` date NOT NULL,
  `school_leaving_date` date DEFAULT NULL,
  std int(2) NOT NULL
)