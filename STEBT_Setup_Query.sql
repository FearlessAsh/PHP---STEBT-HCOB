Create Table UserAccount 
	(UserName VarChar(50) NOT NULL,
	Password VarChar(40) NOT NULL,
	UserType VarChar(1)
		Check(UserType IN('S', 'N')),
	UserEmailEmail VarChar(50),
	FirstName VarChar(50), 
	LastName VarChar(50),
	ZIP VarChar(5),
	RecoveryQuestion VarChar(50),
	RecoveryAnswer VarChar(40)

	CONSTRAINT UserAccount_PK PRIMARY KEY(UserName));
	
Create Table Verification
	(VerificationID INTEGER IDENTITY(1,1) NOT NULL,
	 VerificationCode VarChar(20),
	 CONSTRAINT Verification_PK PRIMARY KEY(VerificationID));	

Create Table StudentUserAccount
	(UserName VarChar(50) NOT NULL,
	SchoolEmail VarChar(50) NOT NULL,
	School VarChar(4)
		Check(School IN('WMU', 'CMU', 'MSU', 'UM', 
			'EMU', 'GVSU', 'OU', 'MTU', 'OCC', 'FSU', 
			'NMU', 'HC', 'MCC', 'KVCC', 'GRCC', 'SVSU',
			'HFCC', 'WCC', 'WCCC', 'CC', 'UDM', 'HC', 'DC',
			'DU', 'LCC', 'MC', 'LTU', 'KC', 'LSSU', 'AC', 'SAU')),
	CurrentlyEnrolled VarChar(1)
		Check(CurrentlyEnrolled IN('Y', 'N')),
	FeeStatus VarChar(1)
		Check(FeeStatus IN('P', 'N')),
	ExpGradDate VarChar(8),
	Major VarChar(50),
	VerificationID INTEGER IDENTITY(1,1) NOT NULL,
	Status VarChar(1)
		Check(Status IN ('V', 'N')),

	CONSTRAINT StudentUserAccount_PK PRIMARY KEY(SchoolEmail),
	CONSTRAINT StudentUserAccount_FK FOREIGN KEY(UserName) 
		REFERENCES UserAccount(UserName)
	CONSTRAINT Verification_FK FOREIGN KEY(VerificationID)
		REFERENCES Verification(VerificationID));
		

Create Table Fee
	(FeeID INTEGER IDENTITY(1,1) NOT NULL,
	UserName VarChar(50) NOT NULL,
	BillingPeriod VarChar(8) NOT NULL,
	FeePayment Decimal(6,2),
	FeePaymentDate DATE DEFAULT GETDATE(),
	FeeOwed Decimal(6,2),
	ItemCount Integer,

	CONSTRAINT Fee_PK PRIMARY KEY(FeeID),
	CONSTRAINT Fee_FK FOREIGN KEY(UserName)
		REFERENCES UserAccount(UserName));

Create Table SalesItems
	(ItemID INTEGER IDENTITY(1,1) NOT NULL,
	UserName VarChar(50) NOT NULL,
	ItemName VarChar(20),
	Category VarChar(20),
	ItemType VarChar(1) 
		Check(ItemType IN('I', 'S')),
	Description VarChar(100),
	ListDate DATE DEFAULT GETDATE(),
	Picture VarChar(4000),
	Price Decimal(6,2),
	SaleStatus VarChar(1)
		Check(SaleStatus IN('S', 'N')),

	CONSTRAINT SalesItems_PK PRIMARY KEY(ItemID),
	CONSTRAINT SalesItems_FK FOREIGN KEY(UserName)
		REFERENCES UserAccount(UserName));

Create Table SalesInvoice
	(RecieptNo INTEGER IDENTITY(1,1) NOT NULL,
	ItemID INTEGER NOT NULL,
	UserName VarChar(50) NOT NULL,
	SalesTax Decimal(6,2),
	SaleDate DATE DEFAULT GETDATE(),
	InvoiceType VarChar(1)
		Check(InvoiceType IN('I', 'S')),
	PaymentRecieved Decimal(6,2),
	PaymentDue Decimal(6,2),

	CONSTRAINT SalesInvoice_PK PRIMARY KEY(RecieptNo),
	CONSTRAINT SalesInvoice_FK1 FOREIGN KEY(ItemID)
		REFERENCES SalesItems(ItemID),
	CONSTRAINT SalesInvoice_FK2 FOREIGN KEY(UserName)
		REFERENCES UserAccount(UserName));
		

	 
		
Create VIEW PurchasedItems_View AS
SELECT n.RecieptNo, t.ItemName, n.SalesTax, n.PaymentRecieved, n.PaymentDue, n.UserName, n.SaleDate
FROM SalesInvoice n
INNER JOIN SalesItems t
ON t.ItemID = n.ItemID;

Create VIEW StudentVerification_View AS
SELECT s.SchoolEmail, s.UserName, v.VerificationCode
FROM StudentUserAccount s
INNER JOIN Verification v
ON s.VerificationID = v.VerificationID;



