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
    other_data VARCHAR(255)
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
    transaction_date DATE NOT NULL,
    total_price DECIMAL(10, 2) NOT NULL,
    other_data VARCHAR(255),
    FOREIGN KEY (customer_id) REFERENCES customer(id),
    FOREIGN KEY (service_id) REFERENCES services(id)
);