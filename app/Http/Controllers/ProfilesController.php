<?php

namespace App\Http\Controllers;

use App\Publication;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('show');
    }

    public function show()
    {
        $publications = Auth::user()->publications()->paginate(2);

        foreach ($publications as $publication) {
            $publication->content = $publication->partOfText(200);
        }

        return view('profiles.show', [
            'profileUser' => Auth::user(),
            'publications' => $publications
        ]);
    }
}
