# CoCoMS | System Modules

[Home](home.md) | System Modules | [Access Control](accesscontrol.md) | [WBS](wbs.md)

## Overview
The system is consists of five integrated modules:
* Letters
* Senders
* Recipients
* Work Packages
* User Administration.

The modules become available to a user after a successful login via a dropdown menu on the top of the system's UI. Depending on the user's role, different actions become available, (e.g. only administrators can add, delete and edit users).

## Letters
This module deals with the management of the correspondence (letters). CoCoMS assumes that letters are issued in relation to WP. As such, the letters are named and organized accordingly. Please refer to the section discussing letter naming below for details regarding the letter naming convention.

### Actions

#### List Letters
Here you can see data about all the letters stored in the database. You can also filter the letter data by sender, recipient and work package. Alternatively you can search for specific keywords. Note that only users having Editor or Administrator privileges can edit or delete letters from the database.

The following action buttons will be available (depending on the user role) next to each listed letter:
* The eye button will enable you to see detailed information about a specific letter.
* The pencil button will enable you to edit a specific letter.
* The trash button will enable you to delete a specific letter.

#### Add Letter
Fill the form to add a letter in the database. Note that only users having Editor or Administrator privileges can add letters in the database.

Form Fields:
* **Subject**: Enter the subject / title of the letter.
* **Data File**: Click on the button to add and save the file (e.g. PDF) associated with the letter in the database. Refer to Letter Naming for details regarding the file naming convention.
* **Sender**: Select the sender of the letter from the drop-down menu.
* **Recipient**: Select the recipient of the letter from the drop-down menu.
* **Work Package**: Select the work package associated with the letter from the drop-down menu.
* **Letter Ref. No. (Docref)**: Enter the letter's reference number.
* **Letter Date**: When you click on the input box a calendar dialog will appear that will enable you to select the letter's date. Alternatively you can input the date manually using the format YYYY-MM-DD, e.g. 2017-10-31.
* **Contents**: Enter the contents (main body) of the letter. This will allow you in the future to search the database for specific keywords contained in the letter body.
* **References**: Enter the letter's references. These are treated like tags. If a reference number is already in the database it will automatically appear in the list.
* **Confidential**: If the letter is confidential then click on the checkbox.
* **Reply Requested**: If a reply is required for the letter then click on the checkbox.
* **Add New Letter Button**: Click on the button to save the letter data in the database.

#### Create Excel File
Clicking on this menu item will generate a Microsoft Excel file that contains all the letters' related data saved in the database.

### Letter Naming
In order to keep things tidy and in order it is suggested that a letter naming convention is followed. It is assumed that the project is broken down in work packages (WP) and each WP is assigned a unique number.

#### Naming Convention
The naming convention for letters is **SENDER-RECIPIENT-WPNumber-TYPE-XXXXX** where:
* **SENDER**: The sender's name. For example if the sender is ACME Corporation then SENDER will be ACME.
* **RECIPIENT**: The recipient's name. For example if the recipient is Smith Corporation then RECIPIENT will be SMITH.
* **WPNumber**: The unique number of the work package. For example if the work package is 20000-Civil Works then WPNumber will be 20000. Note that letters not related to any WP shall be given the unique number 00000.
* **TYPE**: The correspondence type: Use L for Letters, RFI for Requests for Information, RFA for Requests for Approval, etc.
* **XXXXX**: A unique number identifying the letter, e.g. 000164.

#### Letter Name Examples
Assume that a letter was sent from ACME Corporation to Smith Corporation regarding WP 20000-Civil Works. The letter should be named: **ACME-SMITH-20000-L-00096**.

Assume that a letter was sent from Brown Corporation to Homer Corporation not related to any specific WP. The letter should be named: **BROWN-HOMER-00000-L-00243**.

## Senders
This module deals with the management of the senders of the letters. Depending on your user privileges, you can add, edit or delete senders in the database. You can also export the data of all the senders to an Excel file.

### Actions

#### List Senders
Here you can see data about all the senders stored in the database. Note that only users having Editor or Administrator privileges can edit or delete senders from the database.

The following action buttons will be available (depending on the user role) next to each listed sender:
* The eye button will enable you to see detailed information about a specific sender.
* The pencil button will enable you to edit a specific sender.
* The trash button will enable you to delete a specific sender.

#### Add Sender
Fill the form to add a sender in the database. Note that only users having Editor or Administrator privileges can add senders in the database.

Form Fields:
* **Name**: Enter the name (e.g. company name) of the sender.
* **Representative**: Enter the name of the representative of the sender.
* **Contact**: Enter the name of the contact person of the sender's organization.
* **Telephone**: Enter the telephone number of the sender.
* **Mobile**: Enter the mobile telephone number of the sender.
* **Fax**: Enter the FAX number of the sender.
* **E-mail**: Enter the email address of the sender.
* **Address**: Enter the address of the sender.
* **Remarks**: Enter any remarks, notes or additional info about the sender.

#### Create Excel File
Clicking on this menu item will generate an Excel file that contains data about all the senders saved in the database.

## Recipients
This module deals with the management of the recipients of the letters. Depending on your user privileges, you can add, edit or delete recipients in the database. You can also export the data of all the recipients to an Excel file.

### Actions

#### List Recipients
Here you can see data about all the recipients stored in the database. Note that only users having Editor or Administrator privileges can edit or delete recipients from the database.

The following action buttons will be available (depending on the user role) next to each listed recipient:
* The eye button will enable you to see detailed information about a specific recipient.
* The pencil button will enable you to edit a specific recipient.
* The trash button will enable you to delete a specific recipient.

#### Add Recipient
Fill the form to add a recipient in the database. Note that only users having Editor or Administrator privileges can add recipients in the database.

Form Fields:
* **Name**: Enter the name (e.g. company name) of the recipient.
* **Representative**: Enter the name of the representative of the recipient.
* **Contact**: Enter the name of the contact person of the recipient's organization.
* **Telephone**: Enter the telephone number of the recipient.
* **Mobile**: Enter the mobile telephone number of the recipient.
* **Fax**: Enter the FAX number of the recipient.
* **E-mail**: Enter the email address of the recipient.
* **Address**: Enter the address of the recipient.
* **Remarks**: Enter any remarks, notes or additional info about the recipient.

#### Create Excel File
Clicking on this menu item will generate an Excel file that contains data about all the recipients saved in the database.

## Work Packages
This module deals with the management of the work packages (WP). Depending on your user privileges, you can add, edit or delete work packages in the database. You can also export the data of all the work packages to an Excel file.

### Actions

#### List Work Packages
Here you can see data about all the work packages stored in the database. Note that only users having Editor or Administrator privileges can edit or delete work packages from the database.

The following action buttons will be available (depending on the user role) next to each listed work package:
* The eye button will enable you to see detailed information about a specific work package.
* The pencil button will enable you to edit a specific work package.
* The trash button will enable you to delete a specific work package.

#### Add Work Package
Fill the form to add a work package in the database. Note that only users having Editor or Administrator privileges can add work packages in the database.

Form Fields:
* **WP Number**: Enter the work package number (e.g. 20000).
* **WP Name**: Enter the name of the work package (e.g. 20000-Civil).
* **WP Coordinator**: Enter the name of the person / manager in charge of the work package.
* **WP QS**: Enter the name of the QS (Quantity Surveyor) in charge of the work package.

#### Create Excel File
Clicking on this menu item will generate an Excel file that contains data about all the work packages saved in the database.

## User Administration
This module deals with the management of all the registered users. The menu associated with this module is called "Admin Menu". Note that only users having Administrator privileges can use this module. Registered user and Editors can only view their own user profile data via the Profile menu and edit some items there (e.g. changing their password).

### Actions

#### List Users
Here you can see data about all the users stored in the database. Note that only users having Administrator privileges can edit or delete users from the database.

The following action buttons will be available next to each listed user:
* The eye button will enable you to see detailed information about a specific user.
* The lock button can be use to edit a user's password.
* The pencil button will enable you to edit a specific user.
* The trash button will enable you to delete a specific user.

#### Add User
Fill the form to add a user in the database.

Form Fields:
* **Username**: Enter the user's username.
* **E-mail**: Enter the user's valid email address.
* **Password**: Enter the user's password. This will be used by the user to login in CoCoMS. The user can change the password at a later time.
* **First Name**: Enter the user's first (given) name.
* **Last Name**: Enter the user's last (family) name.
* **Role**: Select the user's role from the drop-down menu. Refer to the section discussing Access Control for details regarding user roles.
* **Active**: Click on the checkbox to make the user active, i.e. enable the user to login and use the system.
