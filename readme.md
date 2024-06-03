# Sales Management System

## Introduction

This project is a web-based sales management system built on the Laravel framework. It is developed to facilitate sales operations management in a web-accessible manner. The system provides functionalities for managing products, customers, orders, and sales representatives.

## Installation

To install and run the project locally, follow these steps:

1. Clone the repository: 

2. Navigate to the project directory:

3. Create a `.env` file by copying `.env.example`:

4. Configure the necessary environment variables in the `.env` file.

5. Run the Docker Compose command to build and start the containers:

6. Run migrations within the container:

7. Access the application in your browser at `http://localhost:8000`.

## API Routes

### Place Order
Endpoint to place a new order.

- **URL:** `/orders`
- **Method:** `POST`
- **Parameters:**
    - `employee_id` (integer, required): The ID of the employee placing the order.
    - `product_id` (integer, required): The ID of the product being ordered.
    - `quantity` (integer, required): The quantity of the product being ordered.
    - `total_price` (decimal, required): The total price of the order.
    - `is_approved` (boolean, optional): Whether the order is approved. Default is `false`.
    - `phone_number` (string, optional): The phone number of the customer.
    - `email_address` (string, optional): The email address of the customer.

#### Example Request:
```bash
curl -X POST http://localhost:8000/orders \
-H "Content-Type: application/json" \
-d '{
    "employee_id": 1,
    "product_id": 101,
    "quantity": 2,
    "total_price": 300.50,
    "is_approved": false,
    "phone_number": "09121234567",
    "email_address": "customer@example.com"
}'
```
```
curl -X GET http://localhost:8000/employees/1/commission
```

## Evaluation Notes

- For each order, the customer must submit a form containing sales details.
- Please complete the form if incomplete information is submitted.
- Document submission is essential within specified timeframes.

## Recommendations

- Adhere to SOLID principles when developing code.
- Utilize an appropriate Dockerfile for development environments.
- Writing tests for the project is suggested as part of the development process.
