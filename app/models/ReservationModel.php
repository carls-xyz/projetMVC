<?php

class ReservationModel extends Bdd
{
public function createReservation(int $userId, int $activityId): bool
{
    $reservation = new Reservation();
    $reservation->setUserId($userId);
    $reservation->setActivityId($activityId);
    $reservation->setDateReservation(date('Y-m-d H:i:s'));
    $reservation->setEtat(false);
    $this->co->prepare('INSERT INTO Reservations (user_id, activity_id, date_reservation, etat) VALUES (:user_id, :activity_id, :date_reservation, :etat)');
    $this->co->execute([
        'user_id' => $reservation->getUserId(),
        'activity_id' => $reservation->getActivityId(),
        'date_reservation' => $reservation->getDateReservation(),
        'etat' => $reservation->getEtat()
    ]);
    return true;
}
public function getReservationsByUserId(int $userId): array
{
    $reservations = $this->co->prepare('SELECT * FROM Reservations WHERE user_id = :user_id');
    $reservations->execute([
        'user_id' => $userId
    ]);
    return $reservations->fetchAll();
}

public function cancelReservation(int $reservationId): bool
{
    $reservation = $this->co->prepare('UPDATE Reservations SET etat = true WHERE id = :reservation_id');
    $reservation->execute([
        'reservation_id' => $reservationId
    ]);
    return true;
}
}