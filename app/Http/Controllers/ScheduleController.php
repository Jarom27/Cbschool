<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FormatoDePagina;
class ScheduleController extends Controller
{
    public function getSchedule(){
        return \view("Schedule.schedule")->with("EstiloDePagina",FormatoDePagina::DEFAULT());
    }
}
