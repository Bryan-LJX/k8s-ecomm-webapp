# Web App Deployment in Kubernetes (K8s) Cluster

A Project to simulate a deployment of a E-Commerce Website on a Kubernetes Cluster.

# Goals

To test my proficiency in Kubernetes and containerization, demonstrating the ability to deploy, scale, and manage web applications efficiently in a K8s environment, underscoring cloud-native deployment skills.

#  Process

The overall flow into implementing my project is as follows:

## 1. Containerize my E-Commerce Website and Database

To get started, I firstly prepared the source code for the e-commerce website application using PHP. It’s simplified to demonstrate how PHP works with MySQL to manage products, a cart, and orders.

The project structure will be:

Dockerfile

|

src/

├── index.php

├── config.php

├── db.php

├── cart.php

└── style.css

I then created a Dockerfile with the following instructions:
   - Use `php:7.4-apache` as the base image.
   - Install `mysqli` extension for PHP.
   - Copy the application source code to `/var/www/html/`.
   - Update database connection strings to point to a Kubernetes service named `mysql-service`.
   - Expose port `80` to allow traffic to the web server.

I then created a new Docker image using the Dockerfile by running the command:

> $ docker build -t bryanlieu/ecomm-web .

I then pushed the newly created Docker image onto my Docker Hub repository:

> $ docker push bryanlieu/ecomm-web

If pushing the image fails with the error `denied: requested access to the resource is denied` , remember to login to the Docker Hub registry with the account credentials first:

> $ docker login docker.io -u bryanlieu -p ******

## 2. Set Up a Kubernetes Cluster

## 3. Deploy my Website to Kubernetes

## 4. Expose my Website


# Resources

- [Cloud Resume Challenge GitHub documentation](https://github.com/cloudresumechallenge/projects/blob/main/projects/kubernetes/cloud-resume-challenge.md)
