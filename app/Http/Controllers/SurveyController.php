<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index(){
        $survey = Survey::all();
        return view('pages.survey.index', compact('survey'));
    }

    public function show($id){
        $survey = Survey::find($id);
        return view('pages.survey.show', compact('survey'));
    }
}
