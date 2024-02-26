# ABMS : MySQL database backup
#
# Generated: Sunday 30. April 2023
# Hostname: 
# Database: 
# --------------------------------------------------------


#
# Delete any existing table `schedule_list`
#

DROP TABLE IF EXISTS `schedule_list`;


#
# Table structure of table `schedule_list`
#



CREATE TABLE `schedule_list` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime DEFAULT NULL,
  `schid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO schedule_list VALUES("1","Sample 101","This is a sample schedule only.","2023-04-01 10:30:00","2022-01-11 18:00:00","8");
INSERT INTO schedule_list VALUES("2","Sample 102","Sample Description 102","2023-01-08 09:30:00","2022-01-08 11:30:00","0");
INSERT INTO schedule_list VALUES("4","Sample 102","Sample Description","2023-01-12 14:00:00","2022-01-12 17:00:00","0");
INSERT INTO schedule_list VALUES("5","TEST","TEST","2023-01-23 08:05:00","2023-01-23 08:05:00","0");
INSERT INTO schedule_list VALUES("6","TEST","TEST","2023-03-14 18:14:00","2023-03-14 18:15:00","0");
INSERT INTO schedule_list VALUES("7","yyy","dddd","2023-03-14 08:35:00","2023-03-14 08:35:00","0");
INSERT INTO schedule_list VALUES("8","ASSEMBLY MEETING","TO ALL SCHOOLARS, PLEASE BE INFORMED THAT WE HAVE URGENT MEETING THIS COMMING SATURDAY, APRIL 1, 2023 @2PM, CAMPUS 1 GYMNASIUM BAIS CAMPUS","2023-04-01 14:00:00","2023-04-01 17:00:00","1");



#
# Delete any existing table `tbl_college`
#

DROP TABLE IF EXISTS `tbl_college`;


#
# Table structure of table `tbl_college`
#



CREATE TABLE `tbl_college` (
  `CID` int(11) NOT NULL AUTO_INCREMENT,
  `COLLEGE` varchar(255) NOT NULL,
  `DESCRIP` varchar(255) NOT NULL,
  PRIMARY KEY (`CID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO tbl_college VALUES("1","CAS","COLLEGE OF ARTS AND SCIENCES");
INSERT INTO tbl_college VALUES("2","CBA","COLLEGE OF BUSINESS ADMINISTRATION");
INSERT INTO tbl_college VALUES("4","CCJE","COLLEGE OF CRIMINAL JUSTICE EDUCATION");
INSERT INTO tbl_college VALUES("5","CIT","COLLEGE OF INDUSTRIAL TECHNOLOGY");
INSERT INTO tbl_college VALUES("6","CTED","COLLEGE OF EDUCATION");



#
# Delete any existing table `tbl_course`
#

DROP TABLE IF EXISTS `tbl_course`;


#
# Table structure of table `tbl_course`
#



CREATE TABLE `tbl_course` (
  `COID` int(11) NOT NULL AUTO_INCREMENT,
  `COURSE` varchar(255) NOT NULL,
  `COURSE_DESC` varchar(255) NOT NULL,
  PRIMARY KEY (`COID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO tbl_course VALUES("1","BSCS","BS IN COMPUTER SCIENCE");
INSERT INTO tbl_course VALUES("2","BSIT","BS IN INFORMATION TECHNOLOGY");
INSERT INTO tbl_course VALUES("3","BEED","BACHELOR OF ELEMENTARY EDUCATION");
INSERT INTO tbl_course VALUES("4","BSED","BACHELOR OF SECONDARY EDUCATION");
INSERT INTO tbl_course VALUES("5","BSinIT","BS IN INDUSTRIAL TECHNOLOGY");
INSERT INTO tbl_course VALUES("6","ABGen","AB IN GENERAL CURRICULUM");
INSERT INTO tbl_course VALUES("7","BSC","BS IN CRIMINOLOGY");
INSERT INTO tbl_course VALUES("8","BSBA","BS IN BUSINESS ADMINISTRATION");
INSERT INTO tbl_course VALUES("9","BSHM","BS IN HOSPITALITY MANAGEMENT");



#
# Delete any existing table `tbl_enroll`
#

DROP TABLE IF EXISTS `tbl_enroll`;


#
# Table structure of table `tbl_enroll`
#



CREATE TABLE `tbl_enroll` (
  `EID` int(11) NOT NULL AUTO_INCREMENT,
  `ENROLL_STATUS` int(11) NOT NULL,
  `SCHOOL_YEAR` varchar(250) NOT NULL,
  `STUD_ID` int(11) NOT NULL,
  `LOAD_SLIP` longblob NOT NULL,
  `EN_STATUS` int(11) NOT NULL,
  PRIMARY KEY (`EID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO tbl_enroll VALUES("1","1","2023-2024","358","","0");
INSERT INTO tbl_enroll VALUES("5","1","2023-2024","365","","0");
INSERT INTO tbl_enroll VALUES("6","1","2023-2024","140","","0");
INSERT INTO tbl_enroll VALUES("8","1","2023-2024","298","","0");
INSERT INTO tbl_enroll VALUES("9","1","2023-2024","18","","0");
INSERT INTO tbl_enroll VALUES("10","1","2023-2024","83","","0");
INSERT INTO tbl_enroll VALUES("11","1","2022-2023","43","","0");
INSERT INTO tbl_enroll VALUES("13","1","2021-2022","1","","0");
INSERT INTO tbl_enroll VALUES("14","1","2022-2023","1","","0");



#
# Delete any existing table `tbl_schoolar`
#

DROP TABLE IF EXISTS `tbl_schoolar`;


#
# Table structure of table `tbl_schoolar`
#



CREATE TABLE `tbl_schoolar` (
  `BID` int(11) NOT NULL,
  `SCHOOLAR_NAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tbl_schoolar VALUES("1","SCHOOLARSHIP I");
INSERT INTO tbl_schoolar VALUES("2","SCHOOLARSHIP II");
INSERT INTO tbl_schoolar VALUES("3","SCHOOLARSHIP III");
INSERT INTO tbl_schoolar VALUES("4","SCHOOLARSHIP IV");
INSERT INTO tbl_schoolar VALUES("5","SCHOOLARSHIP V");
INSERT INTO tbl_schoolar VALUES("6","SCHOOLARSHIP VI");
INSERT INTO tbl_schoolar VALUES("7","SCHOOLARSHIP VII");
INSERT INTO tbl_schoolar VALUES("8","SCHOOLARSHIP VIII");
INSERT INTO tbl_schoolar VALUES("9","SCHOOLARSHIP IX");
INSERT INTO tbl_schoolar VALUES("10","SCHOOLARSHIP X");



#
# Delete any existing table `tbl_student`
#

DROP TABLE IF EXISTS `tbl_student`;


#
# Table structure of table `tbl_student`
#



CREATE TABLE `tbl_student` (
  `ID` int(11) NOT NULL,
  `IDNUMBER` varchar(255) NOT NULL,
  `FIRSTNAME` varchar(255) NOT NULL,
  `MI` varchar(255) NOT NULL,
  `LASTNAME` varchar(255) NOT NULL,
  `GENDER` varchar(50) NOT NULL,
  `AGE` varchar(11) NOT NULL,
  `DATE_OF_BIRTH` varchar(255) NOT NULL,
  `ADDRESS` longtext NOT NULL,
  `CONTACT` varchar(255) NOT NULL,
  `COURSE` varchar(255) NOT NULL,
  `COLLEGE` varchar(255) NOT NULL,
  `SCHOOLARSHIP` int(11) NOT NULL,
  `PROFILE` longblob NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `DATE_CREATED` date NOT NULL DEFAULT current_timestamp(),
  `ROLE` varchar(100) NOT NULL,
  `ACC_STATUS` int(11) NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO tbl_student VALUES("1","107048180402","ANDRES","P","JARIO","MALE","33","2023-03-25","PANTAO MABINAY NEGROS ORIENAL","9268033114","BEED","CCJE","8","","andresjario26@gmail.com","andresjario26@gmail.com","2023-03-24","STUDENT","1","1");
INSERT INTO tbl_student VALUES("2","107048180349","HALARIE CHLOE","P","BOADO","FEMALE","8","03-12-12","","9105642146","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("3","107048180087","RUSSIANA","P","CABIGTING","FEMALE","8","29/07/2013","","9383328312","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("4","107048180077","SHELVYN","P","CAPULONG","FEMALE","9","30/09/2012","","9750690412","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("5","107048180476","SOFIA COLEEN","P","CORONEL","FEMALE","8","17/11/2012","","9610042881","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("6","107048170199","BRIGIET","P","DAYRIT","FEMALE","9","23/11/2011","","9657203186","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("7","107048170342","JOMAICA","P","MIANO","FEMALE","9","24/11/2011","","9091782362","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("8","107048170470","MARJAYLIN","P","EGNEO","FEMALE","10","20/10/2011","","9630814901","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("9","107048160396","CARRIANE","P","GARCIA","FEMALE","9","07-06-10","","9260925650","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("10","107048180137","ANGELMY","P","JINGCO","FEMALE","8","24/01/2013","","9074174654","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("11","107048180306","PRINCESS JOY","P","NAGUIT","FEMALE","8","23/12/2013","","9263482518","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("12","109320170409","PRINCESS XHYRIL","P","BARING","FEMALE","10","31/10/2011","","9268033114","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("13","106321180032","KATHLYN","P","REYES","FEMALE","8","15/12/2012","","9217965461","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("14","107061180100","DIOSAMAE SIERYL","P","TERIA","FEMALE","8","27/01/2013","","9101411241","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("15","107048180092","MARGARET SAAB","P","YAMBAO","FEMALE","8","01-07-13","","9078915882","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("16","107048170489","MARICAR","P","MALONZO","FEMALE","10","19/09/2012","","9923656732","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("17","107048180110","PRINCESS SHANELL","P","NARCISO","FEMALE","8","13/01/2013","","9488527623","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("18","107048180159","RAFAEL","P","ABELLO","MALE","9","21/01/2013","","9051636885","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("19","107048180329","ENZO","P","ANG","MALE","9","24/05/2013","","9914953511","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("20","421008180008","JOEL JAMES","P","GRAGEDA","MALE","9","09-11-12","","9166672551","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("21","107048170109","RAYNIER","P","LUSTERIO","MALE","10","12-06-12","","9072332082","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("22","107048180132","ZYAN ELIJHO","P","PUNZAL","MALE","9","12/282012","","9380457556","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("23","107048170030","EMIL JHAY","P","ROGANDO","MALE","12","11-03-10","","9304428544","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("24","112254150146","JAMES IVAN","P","URSULA","MALE","12","31/05/2010","","9772308155","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("25","107048170123","MIRHO","P","ACERDIN","MALE","11","20/05/2011","","9365740079","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("26","500131170171","RHIELJEN","P","ARRIESGADO","MALE","10","20/12/2011","","9669408228","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("27","107048180049","ETHAN BLAKE","P","BACAYO","MALE","8","03-09-13","","9666600411","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("28","107048170263","BELLY JAMES","P","BADAJOS","MALE","9","08-02-12","","9082180568","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("29","107048130427","CRISTOPHER","P","CASE","MALE","16","06-07-05","","999234203","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("30","107048180103","RODOLFO","P","COSME","MALE","11","14/07/2011","","9489764807","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("31","107055160017","JAMES","P","DE VERA","MALE","11","07-01-11","","9470028681","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("32","107048170513","JOHN LENARD","P","DIZON","MALE","9","18/08/2012","","9606006842","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("33","107048160445","ELMER","P","FLORES","MALE","12","15/06/2010","","9457596127","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("34","107048180168","ANDREW JAMES","P","GEABROSO","MALE","9","24/11/2012","","9655807126","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("35","107048140295","ALLAN JOSEPH","P","JIMENEZ","MALE","13","29/12/2007","","9461390980","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("36","107048180522","JOHN MICHAEL","P","MIRASOL","MALE","10","02-11-11","","9068968093","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("37","104519170044","JANDEIVEN","P","OLIVAR","MALE","10","07-01-12","","9057225682","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("38","107048150289","AARON","P","POLICARPIO","MALE","14","14/07/2008","","9755062265","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("39","107048180378","CHRISTOPHER JEREMIAH","P","QUITO","MALE","9","14/10/2012","","9452516152","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("40","136891170426","PHILIP","P","SARDEÃ‘A","MALE","10","18/01/2012","","9317267818","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("41","107048180071","MANUEL ATHAN","P","SUNGA","MALE","9","24/12/2012","","9563864989","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("42","107029170354","KENJIE","P","TIAMZON","MALE","10","05-03-12","","9656094267","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("43","107048170436","ALYZA MAE","P","ABARICO","FEMALE","10","2023-03-24","<P>NEGROS ORIENTAL</P>","9658091991","BEED","CAS","2","","alyzamae@gmail.com","alyzamae@gmail.com","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("44","107048180500","ARRIAN MAE","P","ATENDIDO","FEMALE","9","19/03/2013","","9473546605","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("45","107048170252","RIZA MAE","P","BOGNOT","FEMALE","10","16/05/2012","","9706305102","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("46","107048180336","ELAIJAH SABBRINAH","P","BONDOC","FEMALE","9","20/09/2012","","9269450367","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("47","107048180400","TRAZY ANN KIANA","P","BORJA","FEMALE","9","01-03-13","","9497435486","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("48","107048180477","TRISHA","P","CALMA","FEMALE","11","12-07-11","","9091209292","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("49","107048180403","CHENELLE ZYRIE ","P","CANGCO","FEMALE","9","30/01/2013","","9208136143","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("50","107048180074","MICAELLA","P","CAPELO","FEMALE","10","15/06/2012","","9308720393","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("51","107048180143","ANGELICA ELIZE","P","CASILLAN","FEMALE","8","05-11-12","","9976024564","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("52","107048170438","GRACE","P","CASUPANAN","FEMALE","10","03-04-12","","9519063661","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("53","107048180151","JULIENCE","P","CLAVO","FEMALE","12","16/04/2010","","9282240728","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("54","107048180231","PRINCESS NICOLE","P","DE GUZMAN","FEMALE","8","25/12/2012","","9480839501","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("55","421009180004","KARIZH","P","DIZON","FEMALE","9","01-07-13","","9305315300","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("56","107048180147","PRINCESS ALEXA","P","GUINTO","FEMALE","10","16/06/2012","","9565077493","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("57","107048180205","LEANA GRACE","P","LEE","FEMALE","9","28/01/2013","","9288727846","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("58","401296180092","LEANNE","P","LEE","FEMALE","9","08-03-13","","9175409137","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("59","107034180102","SOFHIA KATE","P","MEÃ‘ULAS","FEMALE","8","06-09-13","","9091245942","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("60","107048180084","JEKEIRAH NIAMH","P","OCTAVIO","FEMALE","8","05-07-13","","9756171934","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("61","107048170209","KATE","P","QUIAMBAO","FEMALE","9","07-03-12","","9161455979","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("62","107048180246","TRESHIA MAE","P","RABULAN","FEMALE","9","08-04-13","","9654688497","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("63","107048180338","KEIRA","P","TORRES","FEMALE","9","10-03-13","","9494837876","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("64","107048180301","KYLE SOPHIA","P","YUMUL","FEMALE","8","07-12-13","","9053651015","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("65","107048180025","ADRIAN","P","AGUILLON","MALE","9","21/09/2012","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("66","107048180235","DEXTER","P","AQUINO","MALE","8","20/01/2013","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("67","107048170286","KOBE DWAYNE","P","BALILO","MALE","9","20/05/2012","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("68","107048180206","ANGELO","P","BETASOLO","MALE","12","17/09/2009","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("69","107048160132","WIN GEL","P","CASTRO","MALE","10","29/06/2011","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("70","107059170004","FER JUSTINE","P","CUNANAN","MALE","11","13/07/2010","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("71","107048160200","NHIGEL JAZ","P","DE LEON","MALE","10","04-01-11","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("72","107048180337","MARVIN KYLE","P","GARCIA","MALE","9","09-09-12","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("73","107048180113","GIAN BRENT","P","IGNAS","MALE","8","22/08/2013","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("74","107048180316","JUSTINE","P","LENON","MALE","8","04-12-12","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("75","107048140413","JEFFREY","P","LUMIBAO","MALE","13","04-05-08","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("76","107048180116","JAEMAR","P","MONTERO","MALE","8","23/11/2012","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("77","106152180184","JONEL","P","PALAO","MALE","8","04-04-13","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("78","107048150375","JAKE","P","PEREZ","MALE","14","03-05-07","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("79","107048170307","KHENJO","P","RAMOS","MALE","9","11-01-12","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("80","107048160432","KURT JOSH","P","RONQUILLO","MALE","11","03-12-09","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("81","107048180204","JUZZ","P","TALAMAYAN","MALE","10","15/10/2011","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("82","107048170147","DAVID MICHAEL","P","TANGLAO","MALE","9","27/03/2012","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("83","500631170172","BENDETA","P","ABDULLA","FEMALE","10","12-04-11","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("84","107048150378","ANGIE","P","ARCILLA","FEMALE","13","17/09/2008","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("85","107048180407","ANGELA RHINA MAE","P","BADIANA","FEMALE","9","14/07/2012","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("86","107048170312","DESSERIE KIM","P","BALBOA","FEMALE","9","13/11/2011","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("87","107048180548","KATHRYN LEIGH","P","BALINGIT","FEMALE","7","31/03/2014","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("88","159533160117","JISIKA","P","BARANI","FEMALE","10","31/05/2011","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("89","107058130363","MARIAN","P","CUNANAN","FEMALE","13","11-06-08","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("90","107048180016","MICHELLE","P","DIAZ","FEMALE","8","16/12/2012","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("91","106314180049","RYZA MAE","P","FLORES","FEMALE","9","15/10/2012","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("92","107048180281","MICHAELA","P","GIDAYAO","FEMALE","8","31/05/2013","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("93","107048180369","GIAN COLLYTHA","P","HUBILLA","FEMALE","8","07-06-13","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("94","107048180163","ASHLY MHAY","P","LABORDO","FEMALE","8","10-03-13","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("95","107048180343","LOUIE MAY","P","MADRIGALEJO","FEMALE","8","03-12-12","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("96","107048170083","RYZA","P","MANANSALA","FEMALE","11","23/06/2010","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("97","107048180542","RONALYN","P","MANDOCDOC","FEMALE","9","31/10/2012","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("98","107048180022","DHANLYN","P","PANGILINAN","FEMALE","8","25/12/2012","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("99","107048180385","RUBY JANE","P","PARANAS","FEMALE","9","30/09/2012","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("100","107059160143","RICHARD","P","DEANG","MALE","11","20/08/2010","","9198603227","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("101","107040160386","RYAN JAMES ","P","DEL ROSARIO","MALE","13","29/09/2007","","9295440199","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("102","107048170077","JIMUEL ","P","ESPINEDA","MALE","10","30/09/2011","","9639247327","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("103","107048170408","MICO ","P","ESPINEDA","MALE","11","08-02-10","","9639247327","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("104","107048160219","A JAY ","P","FLORES","MALE","10","07-02-11","","9306398885","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("105","107048160065","MARLON JR ","P","GERONIMO","MALE","10","13/02/2011","","9488879501","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("106","421039170018","ALBERT ANN DANIEL ","P","GUNDAYAO","MALE","9","29/04/2012","","9366671300","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("107","107048170396","ELMER JOHN ","P","GUTIERREZ","MALE","9","12-04-12","","9614046968","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("108","107048160282","RAFAEL ","P","IBAÃ‘EZ","MALE","10","19/05/2011","","9182096727","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("109","107048170006","MHARK ANGELO ","P","MEMIJE","MALE","10","","","9655601478","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("110","107048170145","KYLE WINSLEY ","P","PAMINTUAN","MALE","9","15/08/2012","","9360546686","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("111","107048160108","MARK RAINIEL ","P","PASCUAL","MALE","10","20/10/2011","","9169759257","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("112","107048150159","JOSH ALEXIES ","P","QUIAZON","MALE","11","17/07/2010","","9053020076","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("113","121845170031","LANCE JASPER ","P","RICABURDA","MALE","10","11-03-11","","9300620018","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("114","107048170309","SUNG SU ","P","RYU","MALE","9","17/03/2012","","9652669696","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("115","107048160317","ANGELO ","P","SAMSON","MALE","10","21/03/2011","","9501940449","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("116","106189170104","KURT VINCENT ","P","SANCHEZ","MALE","9","14/07/2012","","9498146550","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("117","107048170350","KING SAM","P","TALARA","MALE","9","","","9169359892","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("118","107048170499","NURHAYDI ","P","TAMMANG ","MALE","10","01-09-11","","9496383190","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("119","107048170013","CATHALEA ","P","BARABICHO ","FEMALE","9","05-03-12","","9388750938","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("120","107048160198","ROSIELYN ","P","CAÃ‘ETE ","FEMALE","11","22/07/2010","","9753130827","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("121","107057150348","ASHLEY ","P","DIZON ","FEMALE","12","19/12/2009","","9704738873","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("122","107048160051","JENNILYN ","P","GABRIEL ","FEMALE","10","22/10/2010","","9510959149","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("123","107048160043","JASMINE ","P","GARCIA ","FEMALE","10","","","9265602311","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("124","107048170172","KEISHA JULIANNE ","P","NAPAROTA ","FEMALE","9","07-04-12","","9069797593","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("125","107048170370","DANICA JOY","P","NARAJA ","FEMALE","9","17/06/2012","","9696421624","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("126","500136170017","CRISSA ","P","PECSON ","FEMALE","9","04-01-12","","9058883548","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("127","107048170349","JILLIAN ","P","PUNO ","FEMALE","9","09-02-12","","9106138460","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("128","107048170385","JAMIE ","P","QUILATES","FEMALE","10","","","9389888206","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("129","107048170174","LHIEIAN ISABELLA ","P","RAMOS","FEMALE","9","02-11-11","","9757238707","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("130","107048170355","ZHAIRA ","P","RODRIGUEZ ","FEMALE","10","","","9069797593","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("131","136773170924","LINDSEY ","P","ROXAS ","FEMALE","9","19/04/2012","","9498682273","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("132","107048170479","QUEENIE YSABELLA ","P","SANCHEZ ","FEMALE","9","30/08/2012","","9303732718","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("133","107048170175","ASHIE LUJAIN ","P","SANTOS","FEMALE","9","15/07/2012","","9518670259","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("134","107048170321","JANILLA ","P","SANTOS","FEMALE","10","19/10/2011","","9677681917","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("135","107048170392","MAY ANGEL ","P","TRAPAL ","FEMALE","9","23/02/2012","","9292790671","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("136","107041170522","ZYRINE VENICE","P","TORRES ","FEMALE","11","09-07-10","","9914953556","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("137","124579170127","JEANICA ","P","TUMAGNA ","FEMALE","10","15/11/2011","","9453323865","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("138","107048170495","HAILEY LOUISE ","P","VINO ","FEMALE","9","23/12/2012","","9287375351","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("139","107048170391","JHAY-EM","P","ADRIANO","MALE","","12-09-11","","9062209367","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("140","107048170277","GOD FREI","P","ALEJANDRO","MALE","","08-09-11","","9982371694","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("141","107048170084","CRAVEN","P","ALIPIO","MALE","","08-11-11","","9365738112","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("142","107059170164","GIANE CKEIZER","P","BERNARDO,","MALE","","18/02/2012","","9658528759","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("143","107053170120","AARON SAIGE","P","CAGUNTAS ","MALE","","23/07/2012","","9981892236","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("144","107048170289",",Curt Xian","P","Dizon","MALE","","02-07-12","","9076398192","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("145","107048170078","XIAN EZEKIEL","P","GRUEZO","MALE","","24/06/2012","","9276258226","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("146","107048170226","HERL PATRICK ","P","NAGUIT","MALE","","26/03/2012","","9069060012","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("147","107048170344","ANELOV ","P","PANGILINAN","MALE","","28/02/2012","","9051310396","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("148","107048170009","JOHNMELVIN","P","TABURADA","MALE","","23/05/2012","","9495679318","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("149","107048170520","JASMINE ","P","AGUSTIN ","FEMALE","","09-05-12","","9501126217","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("150","107048170045","RIYANNA LOUISE ","P","AGUSTIN","FEMALE","","23/08/2012","","9053191931","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("151","107053170040","SHAMIYA KHAY","P","ARTATES ","FEMALE","","19/06/2012","","9053191931","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("152","107048170420","GOLDYLHEIN AKIA ","P","BERNARDINO ","FEMALE","","28/04/2012","","9975107641","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("153","107048170314","ELYZA RICH ","P","CABRILLAS ","FEMALE","","01-03-12","","9258163198","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("154","106222170098","BRIANA KATE ","P","CALIZO ","FEMALE","","12-12-11","","9206257261","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("155","107048170468","ALLYSA EUNICE ","P","CALO ","FEMALE","","25/12/2011","","9971801182","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("156","107048170227","FRANCHESKA MAE ","P","CANGCO ","FEMALE","","27/04/2012","","9264694149","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("157","107048160204","SAMANTHA LEEANN ","P","DAVID ","FEMALE","","08-04-11","","9973708931","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("158","107048170168","CHLOE ","P","DELA PENA ","FEMALE","","13/05/2012","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("159","107048170487","PRINCESS RAISHA ","P","DEMETRIA ","FEMALE","","12-03-11","","9554839094","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("160","107048170219","AIYNNA YURICA, ","P","DULAY","FEMALE","","23/12/2011","","9999367463","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("161","107048170054","XYRIEL JOVBREY ","P","ENRIQUEZ","FEMALE","","27/10/2011","","9482567280","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("162","107048170316","LIZYONE MOIRAH, ","P","FALLORINA","FEMALE","","29/01/2012","","9355323640","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("163","107048170366","ARGIELIN MAE","P","MACARAYAN ","FEMALE","","25/04/2012","","9984981609","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("164","107048170018","CASSANDRA","P","MAGANA","FEMALE","","13/07/2012","","9128620726","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("165","107048170132","SHIENAME ","P","MALACA","FEMALE","","10-09-11","","9752802414","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("166","107051170044","MIKI ELAINE","P","MATSUMOTO","FEMALE","","15/08/2012","","9499162417","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("167","107048170206","DIANA ROSE","P","NONISA","FEMALE","","28/06/2012","","9635289430","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("168","107048170065","ARYANAH MITCH","P","ORBONG","FEMALE","","26/06/2012","","9974704790","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("169","401316170037","RICH KASHIECAH","P","PADILLA","FEMALE","","27/11/2011","","9272736476","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("170","107048170207","HERSCHELL KATE, ","P","PAMINTUAN","FEMALE","","25/01/2012","","9474236475","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("171","107048170248","ZANE JASMIL","P","PANCIPANE","FEMALE","","21/09/2011","","9550093106","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("172","107048170210","FRENCESSCA REECE","P","RAMOS","FEMALE","","12-08-11","","9506438384","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("173","401304160022","QVYXZ AIA","P","REYES","FEMALE","","09-04-12","","9757230130","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("174","107048170211","FRANCHESKA","P","ROSLIN","FEMALE","","22/11/2011","","9977545257","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("175","107048170477","ERIEL MAE","P","RUBIN","FEMALE","","09-07-12","","9218941118","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("176","107048160352","MONICA MAE","P","SALES","FEMALE","","02-11-10","","9068174294","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("177","421003170002","EUNICE","P","SERRANO","FEMALE","","22/06/2012","","9328570204","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("178","107048170177","SAMANTHA NICOLE","P","SUMAT","FEMALE","","31/01/2012","","9458609399","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("179","136431130853","DAVID JOHN","P","ALCANTARA","MALE","14","25/02/2007","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("180","401316150301","NIGEL MIGUEL","P","ALFONSO","MALE","10","07-06-11","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("181","107022170059","JOHN GABRIEL","P","ALUYOG","MALE","11","20/10/2010","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("182","107048170104","STEVE LORENCE","P","ARCEO","MALE","9","29/02/2012","","9661747625","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("183","107048170403","MARK GERRY","P","AZUPARDO","MALE","9","30/05/2012","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("184","107048170118","KLEIN NATHAN","P","BAHIL","MALE","10","29/10/2011","","9706631150","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("185","107048170125","NIEL JR","P","BULACAN","MALE","10","12-11-10","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("186","107048160174","JOHN CARLO","P","DEGUZMAN","MALE","10","16/02/2011","","9392684801","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("187","107048170369","CHARLSON","P","DELA CRUZ","MALE","9","02-04-12","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("188","107048170184","FREDDIE JR","P","DELOS SANTOS","MALE","9","04-11-11","","9676724554","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("189","107048150012","JOHN MICHAEL","P","ENFESTAN","MALE","11","10-05-10","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("190","500131160132","MARK CEDRAINE","P","IRAN","MALE","10","20/10/2011","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("191","107048160309","PATRICK KIAN","P","LACSON","MALE","10","03-10-11","","9067475239","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("192","107048170343","ELROD JAY","P","NUNAG","MALE","9","25/12/2011","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("193","107048160400","RAZEL","P","OSICO","MALE","10","09-07-11","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("194","123250160022","MATHEW","P","PAGHUBASAN","MALE","10","23/03/2011","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("195","107048160427","CHRIS TOFFY","P","PAGUIO","MALE","11","03-10-10","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("196","107048170117","MARK","P","PINEDA","MALE","9","08-01-12","","9357295830","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("197","107048170411","HARVEY","P","POQUITA","MALE","10","24/10/2011","","9460850556","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("198","107048170306","MARK JHARED","P","QUIAMBAO","MALE","9","30/03/2012","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("199","107048170008","SYDRICK","P","QUIMBA","MALE","9","26/02/2012","","9564616418","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("200","500131170273","PRINCE","P","SALUDE","MALE","9","01-03-12","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("201","107048160177","ROD EMZRICK","P","SAMPANG","MALE","10","07-09-11","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("202","107048170080","MIKE MARLOU","P","SANCHEZ","MALE","15","16/08/2006","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("203","107048170031","MARLON","P","SANTOS","MALE","11","09-08-10","","9155497829","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("204","107048170166","JAMES DAVID","P","TALAOGON","MALE","9","17/07/2012","","9659565511","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("205","107048170138","JEANNE REY","P","AGUILAR","FEMALE","9","20/08/2012","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("206","107048170157","RESHIE","P","AGUILLON","FEMALE","10","04-03-11","","9614046972","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("207","107048170012","JILLIAN","P","ALFONSO","FEMALE","9","25/02/2012","","9391717930","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("208","107048170335","ARIELLE ANNE","P","ALMOSERA","FEMALE","9","17/04/2012","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("209","106300170069","JAHNEYA JOYCE","P","ALONZO","FEMALE","9","15/02/2012","","9168891915","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("210","107048170158","KLISHINA","P","ARTATES","FEMALE","10","07-10-11","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("211","106174160024","VANESSA","P","BITICON","FEMALE","10","15/02/2011","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("212","107048170048","CHRISTINE","P","CARIN","FEMALE","9","28/04/2012","","9193299764","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("213","107059170149","RIAHNA JOYXE","P","DEL ROSARIO","FEMALE","9","22/06/2012","","9295440199","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("214","107048170472","IRISH LORRAINE","P","MARASIGAN","FEMALE","9","10-02-12","","9360713331","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("215","107048170223","JOBEL MAE","P","MATOL","FEMALE","9","25/03/2012","","9391685970","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("216","107048170069","YASSI","P","SAMBILE","FEMALE","9","27/11/2011","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("217","107048170322","IXARA VENICE","P","VELARDE","FEMALE","10","07-02-11","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("218","117440170038","MARYEN","P","VERDIDA","FEMALE","9","09-06-12","","9488270723","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("219","107048170323","YUHAN","P","VERUTIAO","FEMALE","9","16/03/2012","","9386627737","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("220","107048160098","JOANA MARIE","P","YANGA","FEMALE","10","12-12-10","","9633061435","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("221","406091160170","MUHAMMED","P","ABDULJABBAR","MALE","12","2023-03-24","DUMAGUETE CITY","9506039796","BSED","CBA","1","","MUHAMMED@gmail.com","MUHAMMED@gmail.com","2023-03-24","","0","1");
INSERT INTO tbl_student VALUES("222","107048160216","ROBNEY KLYDE","P","ADORNA","MALE","11","18/10/2010","","9988439110","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("223","500133160094","LEANDRO","P","BARBOSA","MALE","11","01-20-11","","9075475732","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("224","107050140064","NELJHON MAR","P","BASILIDES","MALE","16","08-26-06","","9265619385","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("225","107123160103","IKEDA","P","CEREZO","MALE","11","14/11/2010","","9121205992","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("226","421009160008","ALDRIX MYLES","P","DAVID","MALE","11","04-23-11","","9555647744","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("227","106080160051","PRINCE HURLEY","P","DE DIOS ","MALE","11","09-21-10","","9926202549","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("228","107048130504","JUSTIN","P","DELA TORRE ","MALE","13","18/09/2008","","9772792386","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("229","126076160017","JAY MART","P","EDONG","MALE","12","12-10-10","","9516292164","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("230","107048160006","JOHN ANDREW","P","GONZALES ","MALE","11","26/10/2010","","9668805416","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("231","106220160063","MONNICO","P","IBE","MALE","11","05-04-11","","9551436352","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("232","420065150027","AARON JHON ","P","IGNACIO","MALE","11","","","9163151915","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("233","107048160116","ABDUL HARIM","P","JALALODEN","MALE","10","","","9104988258","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("234","107051140065","CYRUZ ASHLEY","P","LOON","MALE","12","05-31-09","","9318709988","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("235","107048160293","ALEXANDER","P","MEDINA ","MALE","10","09-13-11","","9121433442","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("236","107048150410","ANGELITO","P","ORLAIN","MALE","15","07-11-07","","9065919989","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("237","107043160141","MARCUS LAWRENCE","P","QUIAZON","MALE","11","06-13-11","","9322115213","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("238","421009150022","KUTR NORMAN","P","SANCHEZ","MALE","11","08-28-10","","9367923754","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("239","107048140088","QRSTUV MYKEL","P","SANTOS","MALE","13","07-23-09","","9288013098","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("240","107048160063","SHANELLE","P","ACERDIN","FEMALE","11","03-10-10","","9461900341","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("241","107048160124","ANGEL QUIEL","P","AGALA","FEMALE","10","10-03-11","","9300065996","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("242","107048160103","SHANELLE JANE","P","ARCEO","FEMALE","11","","","9661747625","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("243","107048150481","PAULYN","P","BENTIVOGLIO","FEMALE","12","04-22-10","","9388492527","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("244","107048160361","ANNALYN","P","DIZON","FEMALE","10","04-12-12","","9303727003","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("245","117727160041","JESSA","P","ERAN","FEMALE","14","03-07-08","","9386023321","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("246","107048160324","JESSA LHANE ","P","GUINA","FEMALE","11","","","9355769599","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("247","107048170339","RAQUEL RHEIN","P","IGNACIO","FEMALE","11","02-27-11","","9052654974","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("248","107048160236","MARIA REAZ","P","MACAPAGAL","FEMALE","10","06-10-11","","9268549034","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("249","107048160468","QUINCE UNICE ","P","PANAGLIMA","FEMALE","12","","","9707559257","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("250","107048160239","SHARIAN MAE","P","PANGCOGA","FEMALE","11","07-11-10","","9482566631","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("251","107048160163","SOPHIA VIANCAH","P","PERALTA","FEMALE","11","05-11-11","","9612452137","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("252","107048160346","JAY ANN","P","PEREGRINO","FEMALE","11","08-06-11","","9187045394","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("253","107048160452","AICELL","P","SANTOS","FEMALE","","","","9066377831","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("254","107048140513","RHIAN","P","TOLENTINO","FEMALE","14","06-08-08","","9060266634","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("255","107048160213","EOWYN JEWEL","P","TULAWAN","FEMALE","10","19/10/2011","","9662501282","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("256","107048160187","JELLAN ROSE","P","TUMAGNA","FEMALE","11","17/11/2010","","9126815907","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("257","107048150429","RALPH KIRBY","P","BAGARES","MALE","12","07-04-10","","9973667858","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("258","159535160168","THOMAS RUSSELLE","P","BUSTOS","MALE","11","12-01-11","","9619031641","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("259","102164150058","JARELLE KENNETH","P","CALARA","MALE","12","16/04/2010","","9269053233","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("260","107048160125","RANCE JEYRO","P","CANLAS","MALE","11","11-07-11","","9976572370","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("261","401318160090","JOSEPH JR.","P","CAYANAN","MALE","11","18/11/2010","","9486973654","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("262","107048160126","JOSEPH JHUNE","P","GARCIA","MALE","11","04-10-10","","9550470775","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("263","107048160320","ADRIAN JAMES","P","IGNACIO","MALE","11","23/10/2010","","9999804282","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("264","107048160118","RONNIE JR.","P","LAVARIAS","MALE","10","20/09/2011","","9675009443","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("265","107048160386","JAY JR.","P","MANALO","MALE","11","11-11-10","","9677848374","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("266","107048160106","KHYLE JACOB","P","MANUIT","MALE","11","20/11/2010","","9092040271","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("267","107051160004","ZAKIYAH LEVI","P","MERCADO","MALE","11","02-03-11","","9510959799","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("268","107048160081","JOHNREY","P","PANLICAN ","MALE","11","16/06/2011","","9672788393","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("269","104455160010","MARK RILTHONY","P","REGOSO","MALE","11","28/11/2010","","9511564650","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("270","107048160244","JOHN ANGELO","P","SESE","MALE","11","27/05/2011","","9613307606","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("271","107048160257","JERAMIEL","P","SORIANO","MALE","11","30/11/2010","","9515445980","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("272","421009150009","MHARCDEAN ZHIELLO","P","TALAOGON","MALE","11","16/08/2011","","9291620013","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("273","107048160166","MIGUELLE XYRUS","P","TANHUECO","MALE","11","04-01-11","","9261819590","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("274","436009160028","HARVEY KAZIMIER","P","VELASQUEZ","MALE","11","08-06-11","","9997739890","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("275","107048160482","JOSHUA","P","WILLIAM","MALE","12","03-04-10","","9166227937","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("276","107048160202","MA. CEROMAE","P","BALBOA","FEMALE","11","18/10/2010","","9074905644","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("277","136725160120","KYLIE MAE","P","CALLANTA","FEMALE","11","17/05/2011","","9633929216","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("278","107048160422","ARJHEN","P","CASTRO","FEMALE","11","17/11/2010","","9750465524","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("279","107048160159","YUKI SHANIA","P","CEBALLOS","FEMALE","11","11-10-10","","9473529979","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("280","107048150478","LEEZET","P","DIZON ","FEMALE","12","30/12/2009","","9635266930","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("281","107048160209","JUWEL KEISHA","P","FLORES","FEMALE","11","18/05/2011","","9088969388","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("282","107048160242","MARIZ ","P","GUARINO","FEMALE","11","29/07/2011","","9270416696","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("283","107053160128","JUSMINE ","P","INOCENCIO","FEMALE","11","14/10/2011","","9923118534","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("284","107048160420","AKIA","P","LLEDO","FEMALE","11","22/06/2011","","9533552583","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("285","107048160369","REAN","P","MARIMLA","FEMALE","12","02-08-10","","9086681139","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("286","104519160023","TRIXIE","P","OLIVAR","FEMALE","12","28/05/2010","","9057225682","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("287","107048160057","MISHA JEWISH","P","PAMINTUAN","FEMALE","10","23/10/2012","","9273375789","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("288","107048160095","LOANNE","P","PANGILINAN","FEMALE","11","11-02-11","","9306449655","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("289","401296150872","CHIN MAE","P","PINEDA","FEMALE","11","11-07-11","","9061755571","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("290","107048160058","MAX ANGEL","P","RAMOS","FEMALE","11","06-09-10","","9461416119","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("291","107048160171","JAY ANN","P","SABALBORO","FEMALE","12","19/06/2010","","9925841751","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("292","500129160076","JAY ANN","P","SOLIMAN","FEMALE","11","08-01-11","","9551874551","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("293","107048160156","FAITH MOIRAH","P","SONGCO","FEMALE","11","10-08-11","","9420635797","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("294","116946170067","PATRICIA ANN","P","SURMIEDA","FEMALE","11","12-08-11","","9279387513","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("295","107048160250","ARCEM","P","TIMPUG","FEMALE","11","18/01/2011","","9368836703","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("296","107051150098","KRISTINE KEITH","P","TAYAG ","FEMALE","11","03-10-10","","9101573711","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("297","107048150504","MARISSA","P","MARTINEZ","FEMALE","13","19/12/2007","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("298","107041160111","ADRIENE","P","AGUARIN","MALE","11","02-18-11","","9493985261","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("299","107048160028","KYLE MIGUEL","P","ALLERA","MALE","11","04-13-11","","9269973352","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("300","107200130031","MARK JOHN","P","BALAJADIA","MALE","14","06-22-08","","9097845772","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("301","136438150001","KEADEN PAUL","P","BATUIGAS","MALE","12","08-03-10","","9086680082","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("302","107048160012","JHON JOHN","P","COSME","MALE","12","09-11-09","","9489764807","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("303","107039150278","JHUN JHUN","P","DACUBA","MALE","12","08-27-09","","9202510607","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("304","107048160030","RAINER","P","DANCIL","MALE","11","01-21-11","","9322152723","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("305","107048160455","ANDREI","P","DE GUZMAN","MALE","11","08-27-10","","9504858754","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("306","107048160226","JOHN MATTHEW","P","ENRIQUEZ","MALE","11","04-13-11","","9564179311","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("307","107048160308","JAYDEN PAUL","P","GARCIA","MALE","12","05-07-10","","9265602311","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("308","107048150433","MATT ANGELO","P","GARCIA","MALE","11","29/10/2010","","9205128255","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("309","107048160418","DMITRI NATHAN","P","GUARINO","MALE","11","02-15-11","","9706716757","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("310","107048160033","MARK JUSTIN","P","MARTINEZ","MALE","11","10-03-10","","9097196526","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("311","107048160107","SHAWN MARSHALL","P","ORTIZ","MALE","12","09-10-10","","9053464731","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("312","107048140335","DARELL","P","PANGILINAN","MALE","13","09-13-08","","9367356615","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("313","107048160196","NAIJEL","P","RAVILO","MALE","11","06-14-11","","9610045060","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("314","107048160294","MARC LEIVEN","P","REYES","MALE","10","19/01/2011","","9613536472","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("315","104631160114","JOHN DAVID","P","SEGOVIA","MALE","13","01-10-09","","9702133624","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("316","107048150469","JOSE","P","SIMBULAN","MALE","13","12-19-08","","9656092258","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("317","107048160123","JOHN LEANARD","P","SUAREZ","MALE","11","07-20-11","","9357789396","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("318","107061160360","ROSE ANN","P","ABELLO","FEMALE","11","08-31-11","","9500688624","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("319","107048160414","MAYRA","P","DAGPIN","FEMALE","11","08-29-10","","9363545589","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("320","107048160233","CRYSTAL LIU","P","DAVID","FEMALE","11","01-30-11","","9655807126","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("321","107048160169","REYNALYN","P","DIZON","FEMALE","11","12-03-10","","9751703514","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("322","136469120297","JOYCE ANN","P","FELLOSAS","FEMALE","15","07-19-06","","9303018292","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("323","107048160235","MARIALYN","P","GARFIL","FEMALE","11","02-06-11","","9610949773","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("324","107048160275","SENDA","P","JAKILANI","FEMALE","13","11-16-09","","9679708454","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("325","107048150487","JANA NICOLE","P","MANOLID","FEMALE","13","10-16-08","","9708088615","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("326","107048160342","ANGELIKA","P","MIRANDA","FEMALE","11","11-04-10","","9396592498","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("327","106152160020","ANNA MAE","P","PALAO","FEMALE","11","04-10-11","","9464366340","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("328","107048160377","KIMBERLY MAE","P","PALLAN","FEMALE","12","05-16-10","","9619824217","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("329","107048160440","PRISCILLA KATE","P","PASILAN","FEMALE","10","07-02-11","","9999565856","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("330","107048160170","MARIELYN","P","PINEDA","FEMALE","11","11-14-10","","9559131840","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("331","107048150260","JONALYN","P","POLICARPIO","FEMALE","13","07-14-09","","9815778418","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("332","107048160357","HEART ANGEL","P","RAMOS","FEMALE","12","10-18-10","","9319448379","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("333","107058160112","FRANCINE JOYCE","P","REPALDA","FEMALE","11","04-15-11","","9331594426","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("334","106066160110","SOFIA ANA","P","TIONGQUICO","FEMALE","11","11-27-10","","9566588375","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("335","401145160019","EDLYN GELTA ISALINE","P","URGEL","FEMALE","11","12-20-10","","9562288695","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("336","123679160030","KIM ROSES","P","YANGA","FEMALE","12","08-04-10","","9267980391","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("337","107048160345","SAMANTHA NICOLE","P","YOSORES","FEMALE","11","03-01-11","","9981797028","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("338","107048160446","JOHN PAUL","P","PAGLINAWAN","MALE","11","22/10/2010","","9659565378","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("339","107048140524","RAINER","P","SALAZAR ","MALE","15","30/07/2007","","9701685341","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("340","107048150060","KEVIN CLYDE","P","WHITNEY ","MALE","14","","","9157819447","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("341","107048160313","ANDRIC ","P","MANASAN ","MALE","11","","","9657143180","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("342","107048160138","CLINTON CLAINE","P","SINGIAN","MALE","10","09-30-11","","9355087461","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("343","107048160070","ANTHONY","P","PADERA ","MALE","12","05-05-10","","9071155299","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("344","10704815076","MARJON JR.","P","GIRAY","MALE","13","01-22-09","","9090369200","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("345","107048160046","PRINCE JUSTIN","P","GALANG","MALE","11","03-25-11","","9656637761","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("346","107048160112","PSALM NOAH ","P","BALUYUT","MALE","11","07-05-11","","9338138462","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("347","107048160489","MIGUEL","P","SANTOS","MALE","10","05-08-11","","","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("348","107048160078","JEFFREY","P","NACPIL","MALE","12","03-04-10","","9061204403","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("349","107048140218","JUSTINE","P","DE GUZMAN","MALE","13","09-30-08","","9392684801","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("350","107048160195","R-JAY","P","RAMIREZ","MALE","11","07-06-11","","9278506901","","","0","","","","2023-03-24","","0","0");
INSERT INTO tbl_student VALUES("351","107048160284","NICK CHRISTOPHER","P","MORATA","MALE","10","08-31-11","","9496070680","","","0","","","","2023-03-24","","0","0");



#
# Delete any existing table `tbl_userlog`
#

DROP TABLE IF EXISTS `tbl_userlog`;


#
# Table structure of table `tbl_userlog`
#



CREATE TABLE `tbl_userlog` (
  `ID` int(11) NOT NULL,
  `LOGTIME` datetime NOT NULL DEFAULT current_timestamp(),
  `LOGOUT` datetime NOT NULL,
  `STATUS` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `USERIP` varchar(255) NOT NULL,
  `USERNAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tbl_userlog VALUES("128","2023-03-11 09:00:36","0000-00-00 00:00:00","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("129","2023-03-11 11:43:13","0000-00-00 00:00:00","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("130","2023-03-12 05:55:40","2023-03-12 07:00:44","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("131","2023-03-12 07:00:53","2023-03-12 09:11:01","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("132","2023-03-12 09:23:53","0000-00-00 00:00:00","0","0","localhost","admin");
INSERT INTO tbl_userlog VALUES("133","2023-03-12 09:23:59","2023-03-12 09:28:33","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("134","2023-03-12 09:28:42","0000-00-00 00:00:00","1","3","localhost","registrar");
INSERT INTO tbl_userlog VALUES("135","2023-03-13 21:24:43","0000-00-00 00:00:00","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("136","2023-03-14 08:06:01","2023-03-14 08:06:14","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("137","2023-03-14 08:14:57","2023-03-14 09:44:10","1","3","localhost","registrar");
INSERT INTO tbl_userlog VALUES("138","2023-03-14 09:44:14","2023-03-14 09:50:37","1","4","localhost","CASHIER");
INSERT INTO tbl_userlog VALUES("139","2023-03-14 09:50:43","2023-03-14 09:59:03","1","3","localhost","registrar");
INSERT INTO tbl_userlog VALUES("140","2023-03-14 09:59:12","2023-03-14 10:24:58","1","4","localhost","CASHIER");
INSERT INTO tbl_userlog VALUES("141","2023-03-14 10:25:06","2023-03-14 10:57:51","1","3","localhost","registrar");
INSERT INTO tbl_userlog VALUES("142","2023-03-14 10:57:59","2023-03-14 10:58:05","1","3","localhost","registrar");
INSERT INTO tbl_userlog VALUES("143","2023-03-14 10:58:17","2023-03-14 11:03:32","1","4","localhost","CASHIER");
INSERT INTO tbl_userlog VALUES("144","2023-03-14 11:03:40","2023-03-14 11:24:20","1","3","localhost","registrar");
INSERT INTO tbl_userlog VALUES("145","2023-03-14 11:24:26","2023-03-14 12:17:10","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("146","2023-03-14 12:35:02","2023-03-14 12:43:35","1","3","localhost","registrar");
INSERT INTO tbl_userlog VALUES("147","2023-03-14 13:47:16","2023-03-14 06:11:00","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("148","2023-03-14 18:13:47","2023-03-14 06:26:01","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("149","2023-03-14 18:26:24","2023-03-14 06:28:18","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("150","2023-03-14 18:28:36","2023-03-14 06:39:15","1","7","localhost","salvacion@gmail.com");
INSERT INTO tbl_userlog VALUES("151","2023-03-14 18:39:25","0000-00-00 00:00:00","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("152","2023-03-16 19:43:33","2023-03-22 09:51:35","1","3","localhost","registrar");
INSERT INTO tbl_userlog VALUES("153","2023-03-16 20:00:11","0000-00-00 00:00:00","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("154","2023-03-16 23:08:37","2023-03-16 11:13:00","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("155","2023-03-17 08:31:22","0000-00-00 00:00:00","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("156","2023-03-17 08:31:39","2023-03-17 09:51:38","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("157","2023-03-17 09:52:36","2023-03-17 02:13:16","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("158","2023-03-17 15:22:09","2023-03-17 04:06:11","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("159","2023-03-17 16:08:26","0000-00-00 00:00:00","1","342","localhost","andresjario26@gmail.com");
INSERT INTO tbl_userlog VALUES("160","2023-03-17 16:09:57","0000-00-00 00:00:00","1","342","localhost","andresjario26@gmail.com");
INSERT INTO tbl_userlog VALUES("161","2023-03-17 16:10:46","0000-00-00 00:00:00","1","342","localhost","andresjario26@gmail.com");
INSERT INTO tbl_userlog VALUES("162","2023-03-17 16:12:31","0000-00-00 00:00:00","1","342","localhost","andresjario26@gmail.com");
INSERT INTO tbl_userlog VALUES("163","2023-03-17 16:12:39","0000-00-00 00:00:00","1","342","localhost","andresjario26@gmail.com");
INSERT INTO tbl_userlog VALUES("164","2023-03-17 16:20:17","2023-03-17 08:09:19","1","342","localhost","andresjario26@gmail.com");
INSERT INTO tbl_userlog VALUES("165","2023-03-17 20:14:48","2023-03-17 08:26:17","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("166","2023-03-17 20:26:30","0000-00-00 00:00:00","1","356","localhost","kiven@gmail.com");
INSERT INTO tbl_userlog VALUES("167","2023-03-18 21:26:31","2023-03-18 09:43:50","1","358","localhost","ANDRESJARIO26@GMAIL.COM");
INSERT INTO tbl_userlog VALUES("168","2023-03-18 21:45:43","0000-00-00 00:00:00","1","358","localhost","ANDRESJARIO26@GMAIL.COM");
INSERT INTO tbl_userlog VALUES("169","2023-03-20 22:19:35","0000-00-00 00:00:00","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("170","2023-03-20 22:25:44","2023-03-20 10:26:13","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("171","2023-03-20 22:27:12","0000-00-00 00:00:00","1","358","localhost","andresjario26@gmail.com");
INSERT INTO tbl_userlog VALUES("172","2023-03-21 16:21:24","2023-03-22 09:51:48","1","358","localhost","andresjario26@gmail.com");
INSERT INTO tbl_userlog VALUES("173","2023-03-21 18:36:58","0000-00-00 00:00:00","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("174","2023-03-22 09:09:05","2023-03-22 09:52:03","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("175","2023-03-22 21:54:03","0000-00-00 00:00:00","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("176","2023-03-23 08:32:21","2023-03-23 04:18:10","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("177","2023-03-23 16:18:15","2023-03-23 04:18:20","1","3","localhost","schoolar1@gmail.com");
INSERT INTO tbl_userlog VALUES("178","2023-03-23 16:18:35","2023-03-23 04:26:28","1","3","localhost","schoolar1@gmail.com");
INSERT INTO tbl_userlog VALUES("179","2023-03-23 16:26:40","0000-00-00 00:00:00","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("180","2023-03-23 21:32:55","0000-00-00 00:00:00","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("181","2023-03-24 09:34:17","0000-00-00 00:00:00","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("182","2023-03-25 18:43:25","2023-03-25 10:19:14","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("183","2023-03-25 22:27:29","2023-03-25 10:34:04","1","1","localhost","andresjario26@gmail.com");
INSERT INTO tbl_userlog VALUES("184","2023-03-26 12:17:51","2023-03-26 12:18:53","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("185","2023-03-26 12:19:00","2023-03-26 12:22:17","1","1","localhost","andresjario26@gmail.com");
INSERT INTO tbl_userlog VALUES("186","2023-03-26 12:22:36","2023-03-26 12:25:39","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("187","2023-03-26 12:25:44","0000-00-00 00:00:00","1","3","localhost","schoolar1@gmail.com");
INSERT INTO tbl_userlog VALUES("188","2023-03-26 12:33:43","0000-00-00 00:00:00","1","3","localhost","schoolar1@gmail.com");
INSERT INTO tbl_userlog VALUES("189","2023-03-29 08:36:58","0000-00-00 00:00:00","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("190","2023-03-29 09:22:31","0000-00-00 00:00:00","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("191","2023-03-31 23:43:00","2023-03-31 11:47:45","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("192","2023-03-31 23:48:30","2023-04-01 01:51:22","1","1","localhost","andresjario26@gmail.com");
INSERT INTO tbl_userlog VALUES("193","2023-04-01 01:52:05","2023-04-01 01:52:20","1","8","localhost","schoolar2@gmail.com");
INSERT INTO tbl_userlog VALUES("194","2023-04-01 01:52:31","2023-04-01 01:56:24","1","1","localhost","andresjario26@gmail.com");
INSERT INTO tbl_userlog VALUES("195","2023-04-01 01:56:47","2023-04-01 02:43:21","1","8","localhost","schoolar8@gmail.com");
INSERT INTO tbl_userlog VALUES("196","2023-04-01 02:43:34","2023-04-01 02:48:59","1","1","localhost","admin@admin.com");
INSERT INTO tbl_userlog VALUES("197","2023-04-01 02:49:05","2023-04-01 02:57:55","1","8","localhost","schoolar8@gmail.com");
INSERT INTO tbl_userlog VALUES("198","2023-04-01 02:58:09","0000-00-00 00:00:00","1","1","localhost","andresjario26@gmail.com");



#
# Delete any existing table `tbl_users`
#

DROP TABLE IF EXISTS `tbl_users`;


#
# Table structure of table `tbl_users`
#



CREATE TABLE `tbl_users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FIRSTNAME` varchar(255) NOT NULL,
  `MI` varchar(255) NOT NULL,
  `LASTNAME` varchar(255) NOT NULL,
  `DESIGNATION` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `ROLE` varchar(255) NOT NULL,
  `ACC_STATUS` int(11) NOT NULL,
  `CREATED_ON` datetime NOT NULL DEFAULT current_timestamp(),
  `PROFILE` longblob NOT NULL,
  `SCHOOLARID` int(11) NOT NULL,
  `CONTACT` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO tbl_users VALUES("1","ANDRES","P","JARIO","STAFF","admin@admin.com","admin","ADMIN","1","2022-12-29 13:37:02","","0","");
INSERT INTO tbl_users VALUES("2","AA","A","A","A","a@gmail.com","a","USER","1","2023-04-13 08:49:36","","1","1");

