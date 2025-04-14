<?php
require_once 'config.php';
require_once 'includes/database.php';

try {
    $conn = connectDB();
    
    // Create tables
    createTables($conn);

    // Sample data insertion (optional)
    $stmt = $conn->prepare("INSERT OR IGNORE INTO users (email, password, first_name, last_name, role) VALUES 
        (:email1, :pass1, 'Admin', 'User', 'admin'),
        (:email2, :pass2, 'John', 'Doe', 'customer')");
    $stmt->execute([
        ':email1' => 'admin@example.com',
        ':pass1' => password_hash('admin123', PASSWORD_DEFAULT),
        ':email2' => 'customer@example.com',
        ':pass2' => password_hash('customer123', PASSWORD_DEFAULT)
    ]);

    $conn->exec("INSERT OR IGNORE INTO products (name, description, price, stock) VALUES
        ('Premium T-Shirt', 'High quality cotton t-shirt', 24.99, 100),
        ('Wireless Headphones', 'Noise cancelling wireless headphones', 199.99, 50)");

    echo "Database initialized successfully!";
} catch(PDOException $e) {
    die("Database initialization failed: " . $e->getMessage());
}
?>
