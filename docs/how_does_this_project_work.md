# How Does This Project Work?
This API is a backend service developed with PHP (using the Laravel framework) that provides functionality for managing users, subscribers, and posts. Below is a detailed technical overview of how the system operates:

### 1. User Authentication
- The API implements authentication using Laravel's ```auth:api``` middleware.
- Users must log in to obtain a token (via the ```users/login``` route). This token is required to access protected resources and is sent with requests in the ```Authorization``` header as a Bearer token.
- Token-based authentication ensures that sensitive operations, such as creating posts or managing users, are secure and restricted to authorized users only.

### 2. Subscribers
- **Registration and Verification**: Subscribers can register via the ```subscribers``` endpoint. A verification email containing a unique token is sent to the subscriber’s email address. They must verify their subscription by providing the token in a PATCH request to a specific route.
- **Unsubscribe Process**: Subscribers can opt-out by making a DELETE request to the unsubscribe endpoint with their email and token. This ensures that the process is secure and intentional.
- **Data Flow**: Subscriber information is stored in the database, and only verified subscribers are eligible to receive posts.


### 3. Posts Management
- Posts can be created by authenticated users using the ```posts``` endpoint. Each post contains relevant data, such as title, content, and timestamps.
- The API provides routes to retrieve posts filtered by:
    - Today’s posts: Returns posts created within the last 24 hours.
    - Weekly posts: Retrieves posts from the last 7 days.
    - All posts: Returns the entire post collection from the database.
- The posts data model is designed for efficient querying, allowing time-based filtering with minimal performance overhead.

### 4. Sending Posts to Subscribers
- The system includes a custom Laravel command (```php artisan send:daily-emails```) to dispatch all posts to active and verified subscribers. This command likely performs the following steps:
    - Queries the database for all active subscribers.
    - Retrieves posts to be sent (based on business logic, e.g., daily digest).
    - Dispatches emails to subscribers with the relevant posts.
- The process is optimized for batch operations, ensuring efficient email dispatch without overloading the server.

### 5. Middleware and Security
Protected routes require authentication, ensuring sensitive actions like creating users or posts are secure.


This technical breakdown highlights the API's key components, the interactions between them, and how they collectively enable a robust content delivery platform.