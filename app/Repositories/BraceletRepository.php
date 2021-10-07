<?php

namespace App\Repositories;

use App\Models\Bracelet;
use DB;

class BraceletRepository
{
    public function create($uuid, $blood_oxygenation, $heart_rate, $persons_id)
    {

        $bracelet['uuid'] = $uuid;
        $bracelet['blood_oxygenation'] = $blood_oxygenation;
        $bracelet['heart_rate'] = $heart_rate;
        $bracelet['persons_id'] = $persons_id;
        return Bracelet::create($bracelet);

    }

    public function updated($uuid, $blood_oxygenation, $heart_rate, $persons_id)
    {
        $bracelet = $this->find($uuid);
        $bracelet->blood_oxygenation = $blood_oxygenation;
        $bracelet->heart_rate = $heart_rate;
        $bracelet->persons_id = $persons_id;
        $bracelet->save();
        return $bracelet;

    }

    public function delete($uuid)
    {
        $bracelet = $this->find($uuid);
        return $bracelet->delete();
    }
    function list() {
        return Bracelet::all();
    }
    public function find($uuid)
    {
        return Bracelet::where('uuid', '=', $uuid)->first();
    }

}
