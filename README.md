# Project Setup

This project requires certain setup steps to run properly. Below are the instructions for setting up and launching the project, depending on whether you have Make installed or not.

## Make Installed

If you have Make installed, follow these steps:

1. Navigate to the directory Nginx/www and run the command:
    ```
    make run
    ```

2. Add the following lines to the .env file:
    ```
   DB_CONNECTION=mysql
   DB_HOST=db
   DB_PORT=3306
   DB_DATABASE=cv_docker
   DB_USERNAME=root
   DB_PASSWORD=root
   REDIS_CLIENT=predis
   REDIS_HOST=redis
   REDIS_PASSWORD=null
   REDIS_PORT=6379
    ```

3. Execute the following command:
    ```
    make exec
    ```

4. Run the migrations by executing:
    ```
    php artisan migrate
    ```

## Make Not Installed

If you do not have Make installed, follow these steps:

1. Add the following lines to the .env file:
    ```
    DB_CONNECTION=mysql
   DB_HOST=db
   DB_PORT=3306
   DB_DATABASE=cv_docker
   DB_USERNAME=root
   DB_PASSWORD=root
   REDIS_CLIENT=predis
   REDIS_HOST=redis
   REDIS_PASSWORD=null
   REDIS_PORT=6379
    ```

2. Run the project using Docker Compose:
    ```
    docker-compose up -d
    ```

3. Execute the following command to enter the Docker container:
    ```
    docker exec -it cv-app bash
    ```

4. Inside the container, run the migrations:
    ```
    php artisan migrate
    ```

## Accessing the Project

Once the project is set up and running, you can access it at [http://localhost:8000/contact](http://localhost:8000/contact).
