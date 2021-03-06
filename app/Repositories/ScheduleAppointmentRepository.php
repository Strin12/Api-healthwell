<?php

namespace App\Repositories;

use App\Models\Schedule_appointment;

class ScheduleAppointmentRepository
{
    public function create($uuid, $date, $turn,$confirmation, $patients_id, $doctors_id)
    {
        $data['uuid'] = $uuid;
        $data['date'] = $date;
        $data['turn'] = $turn;
        $data['confirmation'] = $confirmation;
        $data['patients_id'] = $patients_id;
        $data['doctors_id'] = $doctors_id;

        return Schedule_appointment::create($data);

    }

    public function all()
    {
        return Schedule_appointment::all();
    }
    public function updated($uuid, $date, $turn)
    {
        $shedule = $this->find($uuid);
        $shedule->date = $date;
        $shedule->turn = $turn;
        $shedule->save();
        return $shedule;

    }

    public function delete($uuid)
    {
        $shedule = $this->find($uuid);
        return $shedule->delete();
    }
    function list() {
        return Schedule_appointment::all();
    }
    public function find($uuid)
    {
        return Schedule_appointment::where('uuid', '=', $uuid)->first();
    }

}
