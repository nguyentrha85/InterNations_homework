# User management system

* InterNations homework: A CRUD app for users and user groups.
* API to manage users & groups

# Requirements

PHP 7.1
Symfony 4.1

## Database structure:
* Table: Users (id, name, username, password)
* Table: Groups (id, name, description)
* Relation: Many to Many
* Look at documents/data_model.png for more details

## Web app features

* User has to login as an admin to use the app.
* Username/password are validated against table Users.
* Password is hashed with bcrypt.
* A demo user had been added to the migration script.
* Raw password is hidden in UI.
* Bootstrap 4 is used for building the form.
* Basic validation rules for the forms (username, password, name can't be blank)

* Demo user: admin/admin
* After logging in as an admin:
* You can add users — a user has a name. 
* You can delete users.
* You can assign users to a group they aren’t already part of.
* You can remove users from a group.
* You can create groups.
* You can delete groups when they no longer have members.

## REST API
* The API uses basic authentication with username/password from database (Users table)

* GET /api/users: Get all users
* POST /api/users: Create a new user
* DELETE /api/users/{id}: Delete an existing user

* GET /api/groups: Get all groups
* POST /api/groups: Create a new group
* DELETE /api/groups/{id}: Deleting an existing group

## Todo
* Make sure username is unique
* Adding validation rules to API, returns 400 if the request is invalid.
* Adding more APIs to update users, get info of a single user, assign users to groups ... 
