# HNGX TASK 2
## _Laravel Crud API_



This documentation provides information on how to use the Person API to create, retrieve, update, and delete person records.

## Table of Contents

1. [Introduction](#introduction)
2. [API Endpoints](#api-endpoints)
   - [Create a New Person](#create-a-new-person)
   - [Fetch Details of a Person](#fetch-details-of-a-person)
   - [Update Details of an Existing Person](#update-details-of-an-existing-person)
   - [Remove a Person](#remove-a-person)
3. [Request and Response Formats](#request-and-response-formats)
4. [Sample Usage](#sample-usage)
5. [Known Limitations](#known-limitations)
6. [Local Setup](#local-setup)
7. [Deployment](#deployment)

## Introduction

The Person API allows you to manage person records. You can create, retrieve, update, and delete person details using this API.

## API Endpoints

### Create a New Person

- **URL**: `/api`
- **HTTP Method**: POST
- **Description**: Create a new person record.
- **Request Format**:

```json
{
  "name": "John Doe"
}
```

- **Response Format**:
```json
{
  "id": 1,
  "name": "John Doe",
  "created_at": "2023-09-09T12:00:00.000000Z",
  "updated_at": "2023-09-09T12:00:00.000000Z"
}
```
- **Status Codes**:
    - 201 Created: Person record created successfully.
    - 422 Unprocessable Entity: Validation error.


### Fetch Details of a Person
- **URL**: `/api/{id}`
- **HTTP Method**: GET
- **Description**: Retrieve details of a person by their ID.
- **Response Format**:
```json
{
  "id": 1,
  "name": "John Doe",
  "created_at": "2023-09-09T12:00:00.000000Z",
  "updated_at": "2023-09-09T12:00:00.000000Z"
}
```
- **Status Codes**:
    - 200 OK: Person details retrieved successfully.
    - 404 Not Found: Person not found.


### Update Details of an Existing Person
- **URL**: `/api/{id}`
- **HTTP Method**: PUT
- **Description**: Update details of an existing person by their ID.
- **Request Format**:

```json
{
  "name": "Updated Name",
  "age": 30
}
```
- **Response Format**:
```json
{
 "id": 1,
  "name": "Updated Name",
  "age": 30,
  "created_at": "2023-09-09T12:00:00.000000Z",
  "updated_at": "2023-09-09T13:00:00.000000Z"
}
```
- **Status Codes**:
    - 200 OK: Person details updated successfully.
    - 404 Not Found: Person not found.
    - 422 Unprocessable Entity: Validation error.

### Remove a Person
- **URL**: `/api/{id}`
- **HTTP Method**: DELETE
- **Description**: Remove a person by their ID.
- **Response Format**:
```json
{
  "message": "Person deleted"
}
```
- **Status Codes**:
    - 200 OK: Person deleted successfully.
    - 404 Not Found: Person not found.


### Request and Response Formats
    - Request data should be in JSON format.
    - Response data is returned in JSON format.


### Sample Usage
### Create a New Person
- **Request**:
```http
POST /api/person
Content-Type: application/json

{
  "name": "Alice Johnson"
}
```

- **Response**:
``` http
HTTP/1.1 201 Created
Content-Type: application/json

{
  "id": 2,
  "name": "Alice Johnson",
  "created_at": "2023-09-09T14:00:00.000000Z",
  "updated_at": "2023-09-09T14:00:00.000000Z"
}
```

### Fetch Details of a Person
- **Request**:
```http
GET /api/person/2
```

- **Response**:
``` http
HTTP/1.1 200 OK
Content-Type: application/json

{
  "id": 2,
  "name": "Alice Johnson",
  "created_at": "2023-09-09T14:00:00.000000Z",
  "updated_at": "2023-09-09T14:00:00.000000Z"
}
```

### Update Details of an Existing Person
- **Request**:
```http
PUT /api/person/2
Content-Type: application/json

{
  "name": "Updated Name",
  "age": 25
}
```

- **Response**:
``` http
HTTP/1.1 200 OK
Content-Type: application/json

{
  "id": 2,
  "name": "Updated Name",
  "age": 25,
  "created_at": "2023-09-09T14:00:00.000000Z",
  "updated_at": "2023-09-09T15:00:00.000000Z"
}
```

### Remove a Person
- **Request**:
```http
DELETE /api/person/2
```

- **Response**:
``` http
HTTP/1.1 200 OK
Content-Type: application/json

{
  "message": "Person deleted"
}
```

### Known Limitations
- The API assumes that each person's name must be unique.
- Error messages may not provide detailed information about validation failures.

### Local Setup
To set up and run the API locally:

 1. Clone the project repository.
  2. Cnfigure your database connection in the .env file.
  3. Run migrations to create the necessary database tables.
  4. Start the Laravel development server.
  
### Deployment
    To deploy the API to a server:
    1.Configure your server environment. 
    2.Upload the project files.
    3.Configure your web server (e.g., Apache or Nginx) to serve the application.
    4.Configure the server environment variables. 
    5.Set up a production-ready database. 
    6.Run migrations on the server to create the necessary database tables.
    Start the web server and ensure it's accessible over the internet.
