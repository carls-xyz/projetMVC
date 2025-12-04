<?php
class ActivityController
{
    use Render;
    public function index()
    {
        $model = new ActivityModel();
$activities = $model->GetAllActivities();
        $this->renderView('activity/index', [
            'activities' => $activities
        ]);
    }

    public function show(int $id)
    {
        $activitie = ActivityModel::getActivitieById($id);
        $this->renderView('activity/show', [
            'activitie' => $activitie
        ]);
    }

    public function update(int $id, array $data)
    {
        $activitie = ActivityModel::getActivitieById($id);
        $activitie->update($data);
        $this->renderView('activity/show', [
            'activitie' => $activitie
        ]);
    }

    public function delete(int $id)
    {
        $activitie = ActivityModel::getActivitieById($id);
        $activitie->delete();
        $this->renderView('activity/index');
    }
}