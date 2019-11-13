Project Title : Airline Reservation System

Languages Used : mysql , php, html

Description : Here we will implement the front end using php, html, css and backend 
using mysql database

Expected Functions : 

	User will be able to sign up and login. User should sign up to avail entire functionality in website.
	User should log in before making bookings. User can view available flights while not being logged in, but cannot 
	book flights unless he/she is logged in.
	
	To make reservations , user will have to input source, destination, number of tickets needed, and select flights.
	User will make payments using credit or debit cards. After payment is successful, the database will store booking.
	
	User has a homepage where he/she can view the final booking that they have already made.
	
	There is also an admin account. The admin can :
		-Add another admin into database
		-View passengers on a particular flight
		-Cancel a particular flight
		-Add a flight
		-View number of passengers on a particular flight

	Admin must log in before he/she can do any of the things described above.
	
	Technical Details: 
		-We have used mysqli method for connection to database.
		-For implementing login/logout functions, we have stored hashed passwords in database instead of plain text
		passwords for security.
		-We have implemented sessions in php to properly remember actions the user has already performed on website.
		-We have validated and escaped input provided by user for proper functioning of database.
		
	
	
