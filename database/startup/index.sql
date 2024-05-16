-- Add index on name column in kapster table
CREATE INDEX idx_kapster_name ON kapster(name);

-- Add index on email column in users table
CREATE INDEX idx_users_email ON users(email);

-- Add index on name column in services table
CREATE INDEX idx_services_name ON services(name);

-- Add index on customer_id and kapster_id columns in transactions table
CREATE INDEX idx_transactions_customer_kapster ON transactions(customer_id, kapster_id);
