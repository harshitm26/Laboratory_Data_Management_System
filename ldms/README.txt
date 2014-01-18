Laboratory Data Management System

Course Project in CS455: Introduction to Software Engineering (Prof.T.V.Prabhakar), 2013-14 I

File:       README
Authors:    Harshit Maheshwari and N.V.Subba Rao


DESCRIPTION
===========

This web application allows users to create a online account and store their laboratory data
on a secure server. The users are classified into two different categories: the experimenters/
researchers and the PI who are their supervisors. The reports are then verified by a PI and 
then finally added into central repository.
The application also supports the addition of comments on the reports and the reports can be
viewed by anyone on the same team(experimenters/researchers working in the same laboratory).
The special features that the application supports are speech to text conversion to allow for
voice inputs and text in a markup language to pdf (portable document format) conversion for
downloading a copy of the report.

Copyright:  (C) 2013 Harshit Maheshwari and N.V.Subba Rao
Licence:    FreeBSD

FILES IN DISTRIBUTION
=====================

   BASE DISTRIBUTION:

		README        			This file.
		addcomment.php     		To add user comments
		checkusername.php       Verify user credentials
		converttopdf.php		Convert text from markup language to pdf
		dblink.php				Set up the database connection
		getallreports.php		Get list of all reports from database
		getpi.php				Get the PI of the user
		getreports.php			Get list of user reports from database
		header.php				Contains the header information about the application
		index.php				Contains the main web-interface page
		login.php				Initial login page
		managereports.php		Manage and view reports (for PI)
		register.php			Register a new user
		savereport.php			Save the newly added report to database
		search.php				Search within the stored reports of the user
		searchall.php			Search withing all the stored reports
		verifyreport.php		Verify the reports added by researchers
		css/mystyles.css		Contains the css components for the application interface
		js/header.js			Contains the javascript/jQuery/ajax calls and functions

		--- Directories ---
		bootstrap-wysiwyg-master	Contains a rich What You See Is What You Get(WYISWYG) editor
		css 						Contains mainly the twitter bootstrap css files
		external					Contains prettify js files
		img							Contains the images used by the application
		js							Contains the bootstrap and JQuery js files
		temp						Temporary folder used during PDF conversion

BASIC INSTALLATION
==================

All the files and other folders should be copied on to a localhost folder. 
The application further requires a open source software: wkhtmltopdf 
which converts the markup text into a pdf file available for download. 

The application requires Google API's and uses chrome's webkit for speech
to text conversion, so it requires Google Chrome browser for speech-to-text 
functionality. Apart from these requirements the application is self sufficient.

wkhtmltopdf can be downloaded from the following site: 
https://code.google.com/p/wkhtmltopdf/downloads/list
