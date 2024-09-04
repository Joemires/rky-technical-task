# Job Listings API and Frontend

This repository contains a simple Laravel 11 application that provides a job listings API endpoint and a basic frontend to interact with it. The application allows users to filter job listings based on criteria such as job title, location, and category.

## Features

- **API Endpoint**: `/api/jobs` - Retrieve job listings with optional filters (e.g., `?title=developer&location=lagos&category=it`).
- **Frontend**: `/` - A basic HTML form to interact with the API, allowing users to search and view job listings.

## Requirements

- PHP 8.1 or higher
- Composer
- SQLite (default database) or any laravel compatible database

## Installation

#### **Clone the Repository**

```bash
git clone https://github.com/joemires/rky-technical-task.git
cd rky-technical-task
```

#### **Install Dependencies**

```bash
composer update
```

#### **Configure Environment**

Let setup laravel Environment

- Copy Environment configuration

    ```bash
    cp .env.example .env
    ```

- Generate laravel encryption key

    ```bash
    php artisan key:generate
    ```

#### **Set Up the Database**

The application uses an SQLite database by default but you can setup something different, check from the document on how set that up https://laravel.com/docs/11.x/installation#databases-and-migrations.

- Create an empty SQLite database file:

    ```bash
    touch database/database.sqlite
    ```

- Run the migrations and seed the database:

    ```bash
    php artisan migrate --seed
    ```
    you can as well leverage on the factory method I created to utilize advance dataset seeding

    ```bash
    php artisan tinker
    ```

    ```php
    App\Models\JobListing::factory(100)->create()
    ```
    You can replace the 100 with any amount of data you want to generate

#### **Serve the Application**

You can serve the application using Laravel's built-in development server:

```bash
php artisan serve
```

The application should now be available at `http://localhost:8000`.

## API Endpoint

The API provides job listings with the following optional filters:

- `title`: Filter by job title
- `location`: Filter by job location
- `category`: Filter by job category

#### **Example Request**

```
GET /api/jobs?title=developer&location=lagos&category=it
```

#### **Example Response**

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "title": "PHP Developer",
            "description": "Looking for an experienced PHP Developer to join our dynamic team. Must have experience with Laravel and MySQL.",
            "location": "Lagos",
            "category": "IT",
            "company": "Tech Solutions",
            "salary": "50000",
            "currency": "NGN",
            "created_at": "2024-09-01T12:00:00.000000Z",
            "updated_at": "2024-09-01T12:00:00.000000Z"
        },
        ...
    ],
    "first_page_url": "http://localhost:8000/api/jobs?page=1",
    "from": 1,
    "last_page": 2,
    "last_page_url": "http://localhost:8000/api/jobs?page=2",
    "links": [
        {
            "url": null,
            "label": "&laquo; Previous",
            "active": false
        },
        ...
    ],
    "next_page_url": "http://localhost:8000/api/jobs?page=2",
    "path": "http://localhost:8000/api/jobs",
    "per_page": 15,
    "prev_page_url": null,
    "to": 15,
    "total": 20
}
```

## Frontend

The frontend is accessible at the root URL `/` and provides a simple HTML form where users can enter filter criteria and view the job listings returned by the API.

## Pagination

If there are too many job listings, the API supports pagination. You can control the number of items per page with the `?per_page=10` parameter and also move between pages using `?page=1` query parameter.

## Error Handling

The API provides appropriate HTTP status codes and error messages for invalid requests.

## License

This project is open-source and available under the [MIT License](LICENSE).
