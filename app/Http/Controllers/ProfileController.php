<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $profile;

    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
    }

    public function index(){
        $profile = $this->profile->get()->first();
        
        return view('profile.index', compact('profile'));
    }
}
