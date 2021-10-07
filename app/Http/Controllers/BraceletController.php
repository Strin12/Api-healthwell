<?php

namespace App\Http\Controllers;
use App\Repositories\BraceletRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Uuid;

class BraceletController extends Controller
{
     protected $bracelet_respository;

    public function __construct(BraceletRepository $repository)
    {
        $this->bracelet_respository = $repository;
    }

    public function create(Request $request)
    {
        try {
            $uuid = Uuid::generate()->string;
            $blood_oxygenation = $request->input('blood_oxygenation');
            $heart_rate = $request->input('heart_rate');
            $persons_id = $request->input('persons_id');
            return response()->json($this->bracelet_respository->create($uuid, $blood_oxygenation, $heart_rate, $persons_id));
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()]);
        }
    }
    function list()
    {
        return response()->json($this->bracelet_respository->list());
    }
}
