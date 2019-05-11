<?php

namespace App\Http\Controllers;

use App\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PublicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['store', 'create']);
    }

    public function index()
    {
        $publications = Publication::orderBy('created_at', 'desc')->paginate(8);

        foreach ($publications as $publication) {
            $publication->content = $publication->partOfText(200);
        }

        return view('publications.index', compact('publications'));
    }

    public function show(Publication $publication)
    {
        return view('publications.show', compact('publication'));
    }

    public function create()
    {
        return view('publications.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:100|',
            'content' => 'required|max:5000'
        ]);

        $publication = Publication::create(
            [
                'user_id' => Auth::user()->id,
                'title' => request('title'),
                'content' => request('content')
            ]
        );

        return redirect($publication->path());
    }

    public function update(Publication $publication)
    {
        return view('publications.update', compact('publication'));
    }

    public function restore(Request $request, Publication $publication)
    {
        $this->validate($request,[
            'title' => 'required|max:100|',
            'content' => 'required|max:5000'
        ]);

        DB::table('publications')
            ->where('id', $publication->id)
            ->update(['title' => request('title'), 'content' => request('content')]);

        return redirect('/profile');
    }

    public function delete(Publication $publication)
    {
        DB::table('publications')
            ->where('id', $publication->id)
            ->delete();

        return redirect('/profile');
    }
}
