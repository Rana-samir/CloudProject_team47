# Use the official PHP image with Apache
FROM php:apache

# Install the mysqli extension
RUN docker-php-ext-install mysqli

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy the PHP files and CSS files from your local machine to the container
COPY . .

# Expose port 80 to allow access to the Apache web server
EXPOSE 80
