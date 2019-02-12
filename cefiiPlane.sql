#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
 

#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        id       Int  Auto_increment  NOT NULL ,
        name     Varchar (50) NOT NULL ,
        email    Varchar (255) NOT NULL ,
        password Varchar (255) NOT NULL ,
        acces    Bool NOT NULL
	,CONSTRAINT user_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: score
#------------------------------------------------------------

CREATE TABLE score(
        id          Int  Auto_increment  NOT NULL ,
        flight_time Time NOT NULL ,
        distance    Float NOT NULL ,
        id_user     Int NOT NULL
	,CONSTRAINT score_PK PRIMARY KEY (id)

	,CONSTRAINT score_user_FK FOREIGN KEY (id_user) REFERENCES user(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: flight
#------------------------------------------------------------

CREATE TABLE flight(
        id      Int  Auto_increment  NOT NULL ,
        id_user Int NOT NULL
	,CONSTRAINT flight_PK PRIMARY KEY (id)

	,CONSTRAINT flight_user_FK FOREIGN KEY (id_user) REFERENCES user(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: black_box
#------------------------------------------------------------

CREATE TABLE black_box(
        id         Int  Auto_increment  NOT NULL ,
        time       Float NOT NULL ,
        on_off     Bool NOT NULL ,
        speed      Float NOT NULL ,
        take_off   Bool NOT NULL ,
        altitude   Float NOT NULL ,
        fuel_level Float NOT NULL ,
        crash      Bool NOT NULL ,
        id_user    Int NOT NULL ,
        id_flight  Int NOT NULL
	,CONSTRAINT black_box_PK PRIMARY KEY (id)

	,CONSTRAINT black_box_user_FK FOREIGN KEY (id_user) REFERENCES user(id)
	,CONSTRAINT black_box_flight0_FK FOREIGN KEY (id_flight) REFERENCES flight(id)
)ENGINE=InnoDB;

