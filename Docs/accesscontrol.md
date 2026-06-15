# CoCoMS | Access Control

[Home](home.md) | [Usage](usage.md) | Access Control | [WBS](wbs.md)

## Overview
In order to properly manage the data in CoCoMS and avoid accidental deletions and system abuses users are given different access control via a role scheme. There are 4 types of users in CoCoMS: unregistered users (guests), users (i.e. registered users), editors and administrators.

### Unregistered Users (Guests)
Any user that is not registered in CoCoMS is considered to be an Unregistered User i.e. Guest User. Unregistred users cannot view, add edit or delete any data in CoCoMS. They can only see the general information (public) pages of the app.

### Users (Registered Users)
Once active, a registered user can only view all CoCoMS data except other users' profiles. A registered user cannot add edit or delete any data in CoCoMS; can modify his own profile data.

### Editors
Editors can be added only by an administrator. Once active, an editor can view, add edit or delete any data in CoCoMS except other users' profiles. An editor can only edit his own profile data.

### Administrators
Administrators have full access to all data in CoCoMS. They can view, add edit or delete any data in CoCoMS and can add, edit or delete new users.

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
