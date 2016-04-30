<?php namespace App\Http\Controllers;

use App\Project;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;

class StaticController extends BaseController {

    public function showHome()
    {
        $projects = Cache::rememberForever('projects', function()
        {
            return Project::all()->sortBy('created_at', null, TRUE);
        });

        return View::make('static.home', compact('projects'));
    }

    public function showProducts()
    {
        return View::make('static.products');
    }

    public function showAbout()
    {
        return View::make('static.about');
    }

    public function showTalks()
    {
        return View::make('static.talks');
    }
}