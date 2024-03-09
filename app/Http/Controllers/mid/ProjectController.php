<?php

namespace App\Http\Controllers\mid;

use App\Http\Controllers\Controller;
use App\Models\AskPriceCategory;
use App\Models\Project;
use App\Models\ProjectCategory;

class ProjectController extends Controller
{
    public function index($id)
    {
        $projects = Project::where('project_category_id',$id)->paginate(9);
        $category = ProjectCategory::where('id',$id)->first();
        return view('mid.projects',compact('projects','category'));
    }
//    public function DuctWork()
//    {
//        $ask_categories = AskPriceCategory::get();
//        return view('mid.DuctWork',compact('ask_categories'));
//
//    }


}
