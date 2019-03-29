<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FormatoDePagina;
class CalendarController extends Controller
{
    public function getCalendar(){
        return \view("Calendar.calendar")->with("EstiloDePagina",FormatoDePagina::DEFAULT());
    }
}
