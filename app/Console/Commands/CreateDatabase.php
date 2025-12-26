<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use PDO;
use PDOException;

class CreateDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the database defined in config/database.php if it does not exist';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $connection = Config::get('database.default');
        
        if ($connection !== 'mysql' && $connection !== 'mariadb') {
            $this->error("This command only supports MySQL/MariaDB connections. Current: $connection");
            return;
        }

        $host = Config::get("database.connections.$connection.host");
        $port = Config::get("database.connections.$connection.port");
        $username = Config::get("database.connections.$connection.username");
        $password = Config::get("database.connections.$connection.password");
        $database = Config::get("database.connections.$connection.database");
        $charset = Config::get("database.connections.$connection.charset", 'utf8mb4');
        $collation = Config::get("database.connections.$connection.collation", 'utf8mb4_unicode_ci');

        try {
            // Connect without selecting a database
            $pdo = new PDO("mysql:host=$host;port=$port", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Check if database exists
            $stmt = $pdo->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$database'");
            if ($stmt->fetch()) {
                $this->info("Database '$database' already exists.");
            } else {
                $query = "CREATE DATABASE IF NOT EXISTS `$database` CHARACTER SET $charset COLLATE $collation;";
                $pdo->exec($query);
                $this->info("Database '$database' created successfully.");
            }
        } catch (PDOException $e) {
            $this->error("Failed to connect to MySQL: " . $e->getMessage());
        }
    }
}
