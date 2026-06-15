# CoCoMS | Usage

[Home](home.md) | Usage | [Access Control](accesscontrol.md) | [WBS](wbs.md)

## Overview
![CoCoMS Home](https://raw.githubusercontent.com/chrmina/cocoms/main/Docs/Screenshots/home.png)

The system is consists of five integrated modules:
* Letters
* Companies
* Work Packages
* Tags
* Users.

The modules become available to a user after a successful login via a dropdown menu on the top of the system's UI. Depending on the user's role, different actions become available, (e.g. only administrators can add, delete and edit users).
![CoCoMS Login](https://raw.githubusercontent.com/chrmina/cocoms/main/Docs/Screenshots/login.png)

## Letters
This module deals with the management of the correspondence (letters). CoCoMS assumes that letters are issued related to a WP. As such, the letters are named and organized accordingly. Please refer to the section discussing letter naming below for details regarding the letter naming convention.

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

### Actions

#### List Letters
Here you can see data about all the letters stored in the database. You can also filter the letter data by sender, recipient and status. Alternatively you can search for specific keywords. Note that only users having Editor or Administrator privileges can edit or delete letters from the database.

![CoCoMS List Letters](https://raw.githubusercontent.com/chrmina/cocoms/main/Docs/Screenshots/letters-list.png)

The following action buttons will be available (depending on the user role) next to each listed letter:
* E: The Edit green button will enable you to edit a specific letter.
* D: The Delete red button will enable you to delete a specific letter.

Click on a letter name to see details about the company.

![CoCoMS Show Letter](https://raw.githubusercontent.com/chrmina/cocoms/main/Docs/Screenshots/letter-show.png)

#### Create (Add) Letter
Click on the blue "Create Letter" button and fill the form to add a letter in the database. Note that only users having Editor or Administrator privileges can add letters in the database.

![CoCoMS Create Letter](https://raw.githubusercontent.com/chrmina/cocoms/main/Docs/Screenshots/letter-add.png)

Form Fields:
* **Sender**: Select the sender of the letter from the drop-down menu.
* **Recipient**: Select the recipient of the letter from the drop-down menu.
* **Work Package**: Select the work package associated with the letter from the drop-down menu.
* **Subject**: Enter the subject / title of the letter.
* **Document Reference**: Enter the letter's reference number.
* **Document Date**: When you click on the input box a calendar dialog will appear that will enable you to select the letter's date. Alternatively you can input the date manually using the format mm-dd-yyyy, e.g. 06-15-2026.
* **Upload Document**: Click on the button to add and save the file (e.g. PDF) associated with the letter in the database. Refer to Letter Naming for details regarding the file naming convention.
* **Contents**: Enter the contents (main body) of the letter. This will allow you in the future to search the database for specific keywords contained in the letter body.
* **Confidential**: If the letter is confidential then click on the checkbox.
* **Reply Requeired**: If a reply is required for the letter then click on the checkbox.
* **Tags**: Select and add tags for the letter. Several tags can be added.
* **References**: Enter the letter's references to other letters. These are similar to tags.
* **Create Letter**: Click on the blue button to save the letter data in the database.

#### Export to Excel
Clicking on this green button will generate a Microsoft Excel file that contains all the letters' related data saved in the database.

## Companies
This module deals with the management of the senders and recipients of the letters. Depending on your user privileges, you can add, edit or delete companies in the database. You can also export the data of all the companies to an Excel file.

### Actions

#### List Companies
Here you can see data about all the companies stored in the database. Note that only users having Editor or Administrator privileges can edit or delete companies from the database.

![CoCoMS List Companies](https://raw.githubusercontent.com/chrmina/cocoms/main/Docs/Screenshots/companies-list.png)

The following action buttons will be available (depending on the user role) next to each listed sender:
* E: The Edit green button will enable you to edit a specific company.
* D: The Delete red button will enable you to delete a specific company.

Click on a company name to see details about the company.

![CoCoMS Show Company](https://raw.githubusercontent.com/chrmina/cocoms/main/Docs/Screenshots/company-show.png)

#### Create Company
Fill the form to add a company in the database. Note that only users having Editor or Administrator privileges can add companies in the database.

![CoCoMS Create Company](https://raw.githubusercontent.com/chrmina/cocoms/main/Docs/Screenshots/company-add.png)

Form Fields:
* **Name**: Enter the company name.
* **Address**: Enter the address of the company.
* **Representative**: Enter the name of the representative of the company.
* **Contact**: Enter the name of the contact person of the company's organization.
* **Telephone**: Enter the telephone number of the company.
* **Mobile**: Enter the mobile telephone number of the company.
* **Fax**: Enter the FAX number of the company.
* **E-mail**: Enter the email address of the company.
* **Remarks**: Enter any remarks, notes or additional info about the sender.
* **Create Company**: Click on the blue button to save the company data in the database.

#### Export to Excel
Clicking on this green button will generate a Microsoft Excel file that contains all the companies' related data saved in the database.

## Work Packages
This module deals with the management of the work packages (WP). Depending on your user privileges, you can add, edit or delete work packages in the database. You can also export the data of all the work packages to an Excel file.

### Actions

#### List Work Packages
Here you can see data about all the work packages stored in the database. Note that only users having Editor or Administrator privileges can edit or delete work packages from the database.

![CoCoMS List Work Packages](https://raw.githubusercontent.com/chrmina/cocoms/main/Docs/Screenshots/workpackages-list.png)

The following action buttons will be available (depending on the user role) next to each listed work package:
* E: The Edit green button will enable you to edit a specific work package.
* D: The Delete red button will enable you to delete a specific work package.

Click on a work package name to see details about the work package.

![CoCoMS Show Work Package](https://raw.githubusercontent.com/chrmina/cocoms/main/Docs/Screenshots/workpackage-show.png)

#### Create Package
Fill the form to add a work package in the database. Note that only users having Editor or Administrator privileges can add work packages in the database.

![CoCoMS Create Work Package](https://raw.githubusercontent.com/chrmina/cocoms/main/Docs/Screenshots/workpackage-add.png)

Form Fields:
* **Name**: Enter the name of the work package (e.g. 20000-Civil).
* **Number**: Enter the work package number (e.g. 20000).
* **Coordinator**: Enter the name of the person / manager in charge of the work package.
* **QS**: Enter the name of the QS (Quantity Surveyor) in charge of the work package.
* **Create Package**: Click on the blue button to save the work package data in the database.

#### Export to Excel
Clicking on this green button will generate a Microsoft Excel file that contains all the work packages' related data saved in the database.

## User Administration
This module deals with the management of all the registered users. Note that only users having Administrator privileges can use this module. Registered user and Editors can only view their own user profile data via the Profile menu item and edit some items there (e.g. changing their password).

### Actions

#### List Users
Here you can see data about all the users stored in the database. Note that only users having Administrator privileges can edit or delete users from the database.

![CoCoMS List Users](https://raw.githubusercontent.com/chrmina/cocoms/main/Docs/Screenshots/users-list.png)

The following action buttons will be available next to each listed user:
* E: The Edit green button will enable you to edit a specific user.
* D: The Delete red button will enable you to delete a specific user.

Click on a user name to see details about the user.

![CoCoMS Show User](https://raw.githubusercontent.com/chrmina/cocoms/main/Docs/Screenshots/user-show.png)

#### Add User
Fill the form to add a user in the database.

![CoCoMS Create User](https://raw.githubusercontent.com/chrmina/cocoms/main/Docs/Screenshots/user-add.png)

Form Fields:
* **Username**: Enter the user's username.
* **Email**: Enter the user's valid email address.
* **First Name**: Enter the user's first (given) name.
* **Last Name**: Enter the user's last (family) name.
* **Password**: Enter the user's password. This will be used by the user to login in CoCoMS. The user can change the password at a later time.
* **Confirm Password**: Reenter the passwword to confirm.
* **Role**: Select the user's role from the drop-down menu. Refer to the section discussing Access Control for details regarding user roles.
* **Active**: Click on the checkbox to make the user active, i.e. enable the user to login and use the system.
* **Create User**: Click on the blue button to save the user data in the database.

## Tags Administration
This module deals with the management of all tags. Note that only users having Editor or Administrator privileges can use this module. Registered user can only view the tags.

### Actions

#### List Tags
Here you can see data about all the tags stored in the database. Note that only users having Editor or Administrator privileges can edit or delete tags from the database.

![CoCoMS List Tags](https://raw.githubusercontent.com/chrmina/cocoms/main/Docs/Screenshots/tags-list.png)

The following action buttons will be available next to each listed tag:
* E: The Edit green button will enable you to edit a specific tag.
* D: The Delete red button will enable you to delete a specific tag.

Click on a tag name to see details about the tag.

![CoCoMS Show Tag](https://raw.githubusercontent.com/chrmina/cocoms/main/Docs/Screenshots/tag-show.png)

#### Create Tag
Fill the form to add a tag in the database.

![CoCoMS Create Tag](https://raw.githubusercontent.com/chrmina/cocoms/main/Docs/Screenshots/tag-add.png)

Form Fields:
* **Label**: Enter the tag's name.
* **Namespace**: Enter the tags's namespace. Used to group tags together.
* **Create Tag**: Click on the blue button to save the tag data in the database.

## Profile Administration
This module deals with the management of a user's profile.

![CoCoMS Edit Profile](https://raw.githubusercontent.com/chrmina/cocoms/main/Docs/Screenshots/profile-edit.png)
