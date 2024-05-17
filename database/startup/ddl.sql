USE richdjoe_barbershops_website;

-- Create the kapster table
CREATE TABLE IF NOT EXISTS kapster (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    photo MEDIUMBLOB,
    schedule VARCHAR(255)
);

-- Create the customer table
CREATE TABLE IF NOT EXISTS customer (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    registration_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Create the services table
CREATE TABLE IF NOT EXISTS services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(255),
    price DECIMAL(10, 2) NOT NULL
);

-- Create the transaction table
CREATE TABLE IF NOT EXISTS transaction (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    service_id INT NOT NULL,
    kapster_id INT NOT NULL,
    transaction_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    total_price DECIMAL(10, 2) NOT NULL,
    rating INT CHECK (rating BETWEEN 1 AND 5),
    comment VARCHAR(255),
    FOREIGN KEY (customer_id) REFERENCES customer(id),
    FOREIGN KEY (kapster_id) REFERENCES kapster(id)
);

-- Create the transaction_services pivot table
CREATE TABLE IF NOT EXISTS transaction_services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    transaction_id INT NOT NULL,
    service_id INT NOT NULL,
    FOREIGN KEY (transaction_id) REFERENCES transaction(id),
    FOREIGN KEY (service_id) REFERENCES services(id),
    CONSTRAINT unique_transaction_service UNIQUE (transaction_id, service_id)
);
