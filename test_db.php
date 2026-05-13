<?php

require_once 'vendor/autoload.php';

$db_path = __DIR__ . '/db/tp_RH.db';

try {
    // Test de connexion PDO
    echo "🔌 Test de connexion SQLite...\n";
    $pdo = new PDO('sqlite:' . $db_path);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Connexion réussie!\n\n";

    // Test requête
    echo "📋 Récupération des employés:\n";
    $stmt = $pdo->prepare("SELECT id_employee, email, password, role, actif FROM employees");
    $stmt->execute();
    $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($employees as $emp) {
        echo "  ID: {$emp['id_employee']} | Email: {$emp['email']} | Role: {$emp['role']} | Actif: {$emp['actif']}\n";
    }
    echo "\n";

    // Test avec admin
    echo "🔑 Test du mot de passe admin:\n";
    $email = 'admin@techmada.mg';
    $password = 'admin123';
    
    $stmt = $pdo->prepare("SELECT * FROM employees WHERE email = ? AND actif = 1");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user) {
        echo "  ✅ Utilisateur trouvé: {$user['nom']} {$user['prenom']}\n";
        echo "  Mot de passe stocké: {$user['password']}\n";
        echo "  Mot de passe entré: {$password}\n";
        
        $isValid = password_verify($password, $user['password']) || hash_equals($user['password'], $password);
        if ($isValid) {
            echo "  ✅ Authentification réussie!\n";
        } else {
            echo "  ❌ Authentification échouée!\n";
        }
    } else {
        echo "  ❌ Utilisateur non trouvé\n";
    }
    
} catch (Exception $e) {
    echo "❌ Erreur: " . $e->getMessage() . "\n";
}
