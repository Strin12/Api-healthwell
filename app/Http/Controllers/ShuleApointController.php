<?php

namespace App\Http\Controllers;

use App\Models\Schedule_appointment;
use App\Repositories\ScheduleAppointmentRepository;
use Illuminate\Http\Request;
use Uuid;
use Illuminate\Support\Facades\Validator;

use App\Shared\LogManage;
use Illuminate\Support\Facades\Log;

class ShuleApointController extends Controller
{
    protected $shedule_appointment_respository;

    public function __construct(ScheduleAppointmentRepository $repository)
    {
        $this->shedule_appointment_respository = $repository;
    }

    public function create(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'date' => 'required|date',
                'turn' => 'required|',
            ]);
            if ($validator->fails()) {
                Log::warning('ShuleApointController', 'create', 'Falta un campo por llenar');
                return response()->json($validator->errors()->toJson(), 400);
            }
        $uuid = Uuid::generate()->string;
        $date = $request->input('date');
        $turn = $request->input('turn');
        $confirmation = false;
        $patients_id = $request->input('patients_id');
        $doctors_id = $request->input('doctors_id');
        Log::info('ShuleApointController - create - Se creo una nueva cita');
        return response()->json($this->shedule_appointment_respository->create($uuid, $date, $turn,$confirmation, $patients_id,$doctors_id));
        } catch (\Exception $ex) {
        Log::emergency('ShuleApointController','create','Ocurrio un error al crear una nueva cita');
        return response()->json(['error' => $ex->getMessage()]);
        }
    }

    public function updated(Request $request, $uuid)
    {
        try{
        $date = $request->input('date');
        $turn = $request->input('turn');
        Log::info('ShuleApointController - updated - Se actualizo una cita con el uuid'.$this->hospitals_respository->find($uuid));
        return response()->json($this->shedule_appointment_respository->updated($uuid, $date, $turn));
        } catch(\Exception $ex){
        Log::emergency('ShuleApointController','updated','Ocurrio un error al actualizar la cita');
        return response()->json(['error' => $ex->getMessage()]);
        }
    }
    public function delete($uuid)
    {
        try{
            Log::info('ShuleApointController - delete - se ha eliminado una cita');
            return response()->json($this->shedule_appointment_respository->delete($uuid));
            } catch(\Exception $ex){
                Log::emergency('ShuleApointController','delete','Ocurrio un error al eliminar una cita');
                return response()->json(['error' => $ex->getMessage()]);
            }
    }
    function list() {
        $shedule = Schedule_appointment::where('confirmation', '=', true)->get();
        $datos = [];
        foreach ($shedule as $key => $value) {
            $datos[$key] = [
                'id' => $value['id'],
            'date' => $value['date'],
            'turn' => $value['turn'],
            'patients_id' => $value['patients_id'],

            ];
        }
        return response()->json($datos);
    }
    

    public function editar($uuid)
    {
        $otraVar = Schedule_appointment::where('uuid', '=', $uuid)->first();
        $masvar = [
            'id' => $otraVar['id'],
            'date' => $otraVar['date'],
            'turn' => $otraVar['turn'],
            'patients_id' => $otraVar['patients_id'],
        ];
        return response()->json($masvar);
    }
}
