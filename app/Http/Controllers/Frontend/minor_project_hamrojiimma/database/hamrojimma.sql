

CREATE DATABASE IF NOT EXISTS hamrojiimma;
USE hamrojiimma;

-- user table

CREATE TABLE users (

    id INT AUTO_INCREMENT PRIMARY KEY,

    name VARCHAR(100) NOT NULL,

    email VARCHAR(100) NOT NULL UNIQUE,

    phone VARCHAR(20) NOT NULL,

    password VARCHAR(255) NOT NULL,

    role ENUM('admin','user') DEFAULT 'user',

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

-- SERVICES TABLE

CREATE TABLE services (

    id INT AUTO_INCREMENT PRIMARY KEY,

    service_name VARCHAR(100) NOT NULL,

    description TEXT NOT NULL,

    price DECIMAL(10,2) NOT NULL,

    image VARCHAR(255),

    status ENUM('Available','Unavailable')
    DEFAULT 'Available',

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

-- BOOKINGS TABLE

CREATE TABLE bookings (

    id INT AUTO_INCREMENT PRIMARY KEY,

    user_id INT NOT NULL,

    service_id INT NOT NULL,

    booking_date DATE NOT NULL,

    booking_time TIME NOT NULL,

    address TEXT NOT NULL,

    status ENUM(
        'Pending',
        'Approved',
        'Completed',
        'Cancelled'
    ) DEFAULT 'Pending',

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY(user_id)
    REFERENCES users(id)
    ON DELETE CASCADE,

    FOREIGN KEY(service_id)
    REFERENCES services(id)
    ON DELETE CASCADE

);

-- CONTACT TABLE

CREATE TABLE contact_messages (

    id INT AUTO_INCREMENT PRIMARY KEY,

    name VARCHAR(100) NOT NULL,

    email VARCHAR(100) NOT NULL,

    message TEXT NOT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

-- REVIEW TABLE

CREATE TABLE reviews (

    id INT AUTO_INCREMENT PRIMARY KEY,

    user_id INT NOT NULL,

    rating INT NOT NULL,

    review TEXT NOT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY(user_id)
    REFERENCES users(id)
    ON DELETE CASCADE

);

-- INSERT DEFAULT SERVICES

INSERT INTO services
(service_name,description,price,image)

VALUES

('Elder Care',
'Professional care for elderly family members.',
2500,
'elder.jpeg'),

('Child Care',
'Professional childcare service.',
2200,
'child.png'),

('Motherhood Care',
'Support for expecting and new mothers.',
3000,
'mother.png'),

('House Monitoring',
'Home monitoring while you are away.',
1800,
'homemonitoring.png'),

('Event Assistance',
'Professional help during family events.',
3500,
'event.png');

-- DEFAULT ADMIN

INSERT INTO users
(name,email,phone,password,role)

VALUES(

'Administrator',

'admin@hamrojiimma.com',

'9800000000',

'admin123',

'admin'

);