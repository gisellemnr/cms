#!/bin/bash

echo "Starting apache..."
service httpd start

echo "Starting database..."
service mariadb start

