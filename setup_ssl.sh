#!/bin/bash

# Function to generate SSL certificates
generate_ssl_certificates() {
    mkdir -p ssl
    cd ssl || exit
    openssl genrsa -out ca-key.pem 2048
    openssl req -new -x509 -nodes -days 365 -key ca-key.pem -out ca.pem -subj "/C=ID/ST=Jawa-Timur/L=Surabaya/O=Richdjoe Barbershop/OU=Main/CN=richdjoe-admin.fauzanghaza.com/emailAddress=contact@fauzanghaza.com"
    openssl req -newkey rsa:2048 -days 365 -nodes -keyout server-key.pem -out server-req.pem -subj "/C=ID/ST=Jawa-Timur/L=Surabaya/O=Richdjoe Barbershop/OU=Main/CN=richdjoe-admin.fauzanghaza.com/emailAddress=contact@fauzanghaza.com"
    openssl rsa -in server-key.pem -out server-key.pem
    openssl x509 -req -in server-req.pem -days 365 -CA ca.pem -CAkey ca-key.pem -set_serial 01 -out server-cert.pem
    openssl req -newkey rsa:2048 -days 365 -nodes -keyout client-key.pem -out client-req.pem -subj "/C=ID/ST=Jawa-Timur/L=Surabaya/O=Richdjoe Barbershop/OU=Main/CN=richdjoe-admin.fauzanghaza.com/emailAddress=contact@fauzanghaza.com"
    openssl rsa -in client-key.pem -out client-key.pem
    openssl x509 -req -in client-req.pem -days 365 -CA ca.pem -CAkey ca-key.pem -set_serial 01 -out client-cert.pem
    cd ..
}


# Function to restart services using Sail
restart_services() {
    sudo ./vendor/bin/sail down
    sudo ./vendor/bin/sail up -d
}

# Main script
generate_ssl_certificates
restart_services

echo "SSL setup completed successfully!"
