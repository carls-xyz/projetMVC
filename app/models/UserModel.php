<?php
class UserModel extends Bdd
{
public function loguser(string $email, string $motdepasse): array
{
    $users = $this->co->prepare('SELECT * FROM Users WHERE email = :email AND motdepasse = :motdepasse');
    $users->execute([
        'email' => $email,
        'motdepasse' => $motdepasse
    ]);

    return $users->fetch();
}

public function createUser(array $data): bool
{
    if ($this->loguser($data['email'], $data['motdepasse'])) {
        return false;
    }
    $user = new User();
    $user->setNom($data['nom']);
    $user->setPrenom($data['prenom']);
    $user->setEmail($data['email']);
    $user->setMotdepasse($data['motdepasse']);
    $user->setRole($data['role']);
    $this->co->prepare('INSERT INTO Users (nom, prenom, email, motdepasse, role) VALUES (:nom, :prenom, :email, :motdepasse, :role)');
    $this->co->execute([
        'nom' => $user->getNom(),
        'prenom' => $user->getPrenom(),
        'email' => $user->getEmail(),
        'motdepasse' => $user->getMotdepasse(),
        'role' => $user->getRole()
    ]);
    return true;
}

public function getAllUsers(): array
{
    $users = $this->co->prepare('SELECT * FROM Users');
    $users->execute();

    $result = $users->fetchAll();

    return $result;
}   
}