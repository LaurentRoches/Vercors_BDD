#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Vercors_User
#------------------------------------------------------------

CREATE TABLE Vercors_User(
        id_user        Int  Auto_increment  NOT NULL ,
        password_user  Varchar (250) NOT NULL ,
        lastName_user  Varchar (250) NOT NULL ,
        firstName_user Varchar (250) NOT NULL ,
        tel_user       Varchar (250) NOT NULL ,
        address_user   Varchar (250) NOT NULL ,
        role_user      Varchar (250) NOT NULL ,
        rgpd_user      Datetime NOT NULL ,
        email_user     Varchar (250) NOT NULL
	,CONSTRAINT Vercors_User_AK UNIQUE (email_user)
	,CONSTRAINT Vercors_User_PK PRIMARY KEY (id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Vercors_Resa
#------------------------------------------------------------

CREATE TABLE Vercors_Resa(
        id_resa      Int  Auto_increment  NOT NULL ,
        reduc_resa   Bool NOT NULL ,
        kids_resa    Bool NOT NULL ,
        headset_resa Int NOT NULL ,
        sled_resa    Int NOT NULL ,
        price_resa   Float NOT NULL ,
        id_user      Int NOT NULL
	,CONSTRAINT Vercors_Resa_PK PRIMARY KEY (id_resa)

	,CONSTRAINT Vercors_Resa_Vercors_User_FK FOREIGN KEY (id_user) REFERENCES Vercors_User(id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Vercors_Night
#------------------------------------------------------------

CREATE TABLE Vercors_Night(
        id_night    Int  Auto_increment  NOT NULL ,
        name_night  Varchar (255) NOT NULL ,
        price_night Float NOT NULL
	,CONSTRAINT Vercors_Night_PK PRIMARY KEY (id_night)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Vercors_Pass
#------------------------------------------------------------

CREATE TABLE Vercors_Pass(
        id_pass           Int  Auto_increment  NOT NULL ,
        name_pass         Varchar (100) NOT NULL ,
        price_pass        Float NOT NULL ,
        price_reduce_pass Float NOT NULL ,
        date_pass         Date NOT NULL
	,CONSTRAINT Vercors_Pass_PK PRIMARY KEY (id_pass)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Choice
#------------------------------------------------------------

CREATE TABLE Choice(
        id_night    Int NOT NULL ,
        id_resa     Int NOT NULL ,
        date_choice Datetime NOT NULL
	,CONSTRAINT Choice_PK PRIMARY KEY (id_night,id_resa)

	,CONSTRAINT Choice_Vercors_Night_FK FOREIGN KEY (id_night) REFERENCES Vercors_Night(id_night)
	,CONSTRAINT Choice_Vercors_Resa0_FK FOREIGN KEY (id_resa) REFERENCES Vercors_Resa(id_resa)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Come
#------------------------------------------------------------

CREATE TABLE Come(
        id_pass Int NOT NULL ,
        id_resa Int NOT NULL
	,CONSTRAINT Come_PK PRIMARY KEY (id_pass,id_resa)

	,CONSTRAINT Come_Vercors_Pass_FK FOREIGN KEY (id_pass) REFERENCES Vercors_Pass(id_pass)
	,CONSTRAINT Come_Vercors_Resa0_FK FOREIGN KEY (id_resa) REFERENCES Vercors_Resa(id_resa)
)ENGINE=InnoDB;

