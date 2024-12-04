# API Endpoints Documentation

## Users API

| Method   | Endpoint         | Authentication Required | Description                       |
|----------|------------------|--------------------------|-----------------------------------|
| POST     | `/users/login`   | No                       | Allows a user to log in.         |
| POST     | `/users`         | Yes                      | Creates a new user account.      |

## Subscribers API

| Method   | Endpoint                                      | Authentication Required | Description                                               |
|----------|-----------------------------------------------|--------------------------|-----------------------------------------------------------|
| POST     | `/subscribers`                                | No                       | Allows a new subscriber to be added.                      |
| PATCH    | `/subscribers/{email}/verify/{token}`         | No                       | Verifies the subscriber’s email using a token.            |
| DELETE   | `/subscribers/{email}/unsubscribe/{token}`    | No                       | Unsubscribes the user using their email and a token.      |

## Posts API

| Method   | Endpoint         | Authentication Required | Description                                               |
|----------|------------------|--------------------------|-----------------------------------------------------------|
| POST     | `/posts`         | Yes                      | Creates a new post.                                        |
| GET      | `/posts/today`   | Yes                      | Fetches all posts created today.                           |
| GET      | `/posts/week`    | Yes                      | Fetches all posts created within the current week.         |
| GET      | `/posts/all`     | Yes                      | Fetches all posts ever created.                            |