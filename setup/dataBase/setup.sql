#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        user_id Int  Auto_increment  NOT NULL ,
        name    Varchar (50) NOT NULL ,
        forname Varchar (50) ,
        adress  Varchar (50)
	,CONSTRAINT user_PK PRIMARY KEY (user_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: category
#------------------------------------------------------------

CREATE TABLE category(
        category_id Int  Auto_increment  NOT NULL ,
        name        Varchar (50) NOT NULL ,
        user_id     Int NOT NULL
	,CONSTRAINT category_PK PRIMARY KEY (category_id)

	,CONSTRAINT category_user_FK FOREIGN KEY (user_id) REFERENCES user(user_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: bank
#------------------------------------------------------------

CREATE TABLE bank(
        bank_id Int  Auto_increment  NOT NULL ,
        name    Varchar (50) NOT NULL
	,CONSTRAINT bank_PK PRIMARY KEY (bank_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: agency
#------------------------------------------------------------

CREATE TABLE agency(
        agency_id Int  Auto_increment  NOT NULL ,
        name      Varchar (50) NOT NULL ,
        adress    Varchar (50) NOT NULL ,
        bank_id   Int NOT NULL
	,CONSTRAINT agency_PK PRIMARY KEY (agency_id)

	,CONSTRAINT agency_bank_FK FOREIGN KEY (bank_id) REFERENCES bank(bank_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: account
#------------------------------------------------------------

CREATE TABLE account(
        account_id Int  Auto_increment  NOT NULL ,
        name       Varchar (50) NOT NULL ,
        balance    Int NOT NULL ,
        user_id    Int NOT NULL ,
        agency_id  Int NOT NULL
	,CONSTRAINT account_PK PRIMARY KEY (account_id)

	,CONSTRAINT account_user_FK FOREIGN KEY (user_id) REFERENCES user(user_id)
	,CONSTRAINT account_agency0_FK FOREIGN KEY (agency_id) REFERENCES agency(agency_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: type
#------------------------------------------------------------

CREATE TABLE type(
        type_id Int  Auto_increment  NOT NULL ,
        name    Varchar (50) NOT NULL ,
        bank_id Int NOT NULL
	,CONSTRAINT type_PK PRIMARY KEY (type_id)

	,CONSTRAINT type_bank_FK FOREIGN KEY (bank_id) REFERENCES bank(bank_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: operation
#------------------------------------------------------------

CREATE TABLE operation(
        operation_id Int  Auto_increment  NOT NULL ,
        date         Datetime NOT NULL ,
        name         Varchar (50) NOT NULL ,
        count        Int NOT NULL ,
        regular      Bool NOT NULL ,
        user_id      Int NOT NULL ,
        account_id   Int NOT NULL ,
        category_id  Int NOT NULL ,
        type_id      Int NOT NULL
	,CONSTRAINT operation_PK PRIMARY KEY (operation_id)

	,CONSTRAINT operation_user_FK FOREIGN KEY (user_id) REFERENCES user(user_id)
	,CONSTRAINT operation_account0_FK FOREIGN KEY (account_id) REFERENCES account(account_id)
	,CONSTRAINT operation_category1_FK FOREIGN KEY (category_id) REFERENCES category(category_id)
	,CONSTRAINT operation_type2_FK FOREIGN KEY (type_id) REFERENCES type(type_id)
)ENGINE=InnoDB;

