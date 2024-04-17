# PHP CRUD API

This project is a simple CRUD (Create, Read, Update, Delete) API implemented in PHP. It provides endpoints to interact with a database to perform CRUD operations on a resource.

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/haweil/PHP-REST-API
2. Import the database schema from database.sql into your MySQL database.
3. Update the database configuration in config.php with your database credentials.
## Usage
1. Start the PHP development server:
   ```bash
   php -S localhost:8000
2. Use an API testing tool like Postman or cURL to make requests to the API endpoints.
-  **Create:** POST /api/resource
-  **Read:** GET /api/resource
-  **Update:** PUT /api/resource/{id}
-  **Delete:** DELETE /api/resource/{id}
## API Endpoints

- **Create**: `POST /api/resource`
  - Request body: JSON object representing the resource to be created.
  - Response: JSON object with a message indicating success or failure.
    
- **Read**: `GET /api/resource`
  - Returns a JSON array of all resources.

- **Update**: `PUT /api/resource`
  - Request body: JSON object with updated resource data.
  - Response: JSON object with a message indicating success or failure.


- **Delete**: `DELETE /api/resource`
  - Request body: JSON object with the ID of the resource to delete.
  - Response: JSON object with a message indicating success or failure.

