# CoCoMS | Home

Home | [Usage](usage.md) | [Access Control](accesscontrol.md) | [WBS](wbs.md)

## Introduction
CoCoMS is a simple Document Management System designed specifically for the management of correspondence generated during the execution of a construction project. CoCoMS is targeted at document controllers and key staff of a construction project. The system can be used by the staff of the Contractor, the Engineer and / or the Employer.

## Why CoCoMS was developed?
Scratching an itch! I wanted to create a simple yet powerful web-based document management system specifically for the management of correspondence generated during the execution of a construction project. I needed a system that can be used by the construction team and has the ability to control the access to the data based on the role of each user. Also wanted the system to be easily and readily accessible (i.e. using just a WEB browser) and have the ability to export data in Microsoft Excel format for further analysis and presentation.

## Features

### Core Functionality
- **Letter Management**: Create, read, update, delete correspondence letters
- **File Management**: Upload, download, and organize project files
- **Sender & Recipient Management**: Maintain contact databases
- **Work Packages**: Organize letters by project work packages
- **Tagging System**: Categorize and tag documents for easy retrieval
- **Full-Text Search**: Search across all resources (letters, senders, recipients, tags, packages)
- **Excel Export**: Export data to Excel for reporting

### Security Features
- **Role-Based Access Control**: Three roles (User, Editor, Admin)
- **Authentication**: Secure login with password hashing
- **Authorization**: Fine-grained permissions per resource
- **CSRF Protection**: Built-in Laravel CSRF tokens
- **SQL Injection Prevention**: Parameterized queries via Eloquent ORM

### User Roles
CoCoMS is easily accessible via a modern web browser. Access is secured via user authentication and [access control](https://en.wikipedia.org/wiki/Access_control_list).
- **User (Viewer)**: Can view letters, senders, recipients, work packages, and tags
- **Editor**: Can create and update letters, senders, recipients, work packages, and tags
- **Admin**: Can perform all operations including deletion


| Action | User | Editor | Admin |
|--------|------|--------|-------|
| View Letters | ✓ | ✓ | ✓ |
| Create Letter | ✗ | ✓ | ✓ |
| Update Letter | ✗ | ✓ | ✓ |
| Delete Letter | ✗ | ✗ | ✓ |
| Create Resources | ✗ | ✓ | ✓ |
| Update Resources | ✗ | ✓ | ✓ |
| Delete Resources | ✗ | ✗ | ✓ |
| Manage Users | ✗ | ✗ | ✓ |
