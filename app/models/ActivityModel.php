<?php

class ActivityModel extends Bdd

{ 
    public function GetAllActivities(): array
    {
        $activities = $this->co->prepare('SELECT * FROM Activities');
        $activities->execute();

        $result = $activities->fetchAll();

        return $result;
    }

    public function GetActivityById(int $id): array
    {
        $activities = $this->co->prepare('SELECT * FROM Activities WHERE id = :id');
        $activities->execute([
            'id' => $id
        ]);

        return $activities->fetch();
    }

    public function GetPlacesLeft(): int
    {
        $activities = $this->co->prepare('SELECT * FROM Activities WHERE id = :id');
        $activities->execute([
            'id' => $id
        ]);

        return $activities->fetch();
    }
}