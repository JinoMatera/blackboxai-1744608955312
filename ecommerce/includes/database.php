<?php
function connectDB() {
    try {
        // Create database directory if it doesn't exist
        if (!file_exists(dirname(DB_PATH))) {
            mkdir(dirname(DB_PATH), 0777, true);
        }

        // Connect to SQLite database
        $conn = new PDO("sqlite:" . DB_PATH);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

function createTables($conn) {
    $sql = [
        "CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            email TEXT NOT NULL UNIQUE,
            password TEXT NOT NULL,
            first_name TEXT,
            last_name TEXT,
            role TEXT DEFAULT 'customer'
        )",
        "CREATE TABLE IF NOT EXISTS products (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            description TEXT,
            price REAL NOT NULL,
            stock INTEGER DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )",
        "CREATE TABLE IF NOT EXISTS orders (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            total REAL NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id)
        )"
    ];

    foreach ($sql as $query) {
        try {
            $conn->exec($query);
        } catch(PDOException $e) {
            echo "Error creating table: " . $e->getMessage();
        }
    }
}
?>
