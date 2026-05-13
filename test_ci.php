<?php

require_once 'vendor/autoload.php';

// Initialize CodeIgniter
$request = \CodeIgniter\HTTP\Services::request();
$routes  = \CodeIgniter\Router\Services::routes();

require_once 'app/Config/Routes.php';

// Load config
$config = new \Config\Database();
\CodeIgniter\Database\BaseConnection::setConnectBuilder($config);

try {
    echo "🔌 Initialiser CodeIgniter...\n\n";
    
    // Get database connection
    $db = \Config\Database::connect();
    echo "✅ Connexion à la base de données réussie!\n";
    echo "   Driver: " . get_class($db) . "\n";
    echo "   Database: " . $db->getDatabase() . "\n\n";
    
    // Test la table employees
    echo "📋 Test de la table employees:\n";
    $result = $db->query("SELECT * FROM employees LIMIT 1");
    if ($result) {
        $row = $result->getRow();
        echo "   ✅ Requête réussie: " . json_encode($row) . "\n\n";
    }
    
    // Test EmployeeModel
    echo "🔑 Test EmployeeModel::login():\n";
    $model = new \App\Models\EmployeeModel();
    $user = $model->login('admin@techmada.mg', 'admin123');
    
    if ($user) {
        echo "   ✅ Login réussi!\n";
        echo "   User ID: {$user['id_employee']}\n";
        echo "   Email: {$user['email']}\n";
        echo "   Name: {$user['nom']} {$user['prenom']}\n";
        echo "   Role: {$user['role']}\n";
    } else {
        echo "   ❌ Login échoué\n";
    }
    
} catch (Exception $e) {
    echo "❌ Erreur: " . $e->getMessage() . "\n";
    echo "\nStack trace:\n";
    echo $e->getTraceAsString() . "\n";
}
