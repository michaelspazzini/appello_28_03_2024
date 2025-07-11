<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\isEmpty;
use function Sodium\add;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexConsumer()
    {
        $files = Files::where('is_public', 1)->get();
        return view('components.consumer', compact('files'));
    }


    public function indexAdmin(){
        $id = Auth::id();
        $files = DB::table('files')
            ->join('users', 'users.id', '=', 'files.user_id')
            ->where('files.user_id', '=', $id)
            ->select('files.*', 'users.name')
            ->get();
        return view('components.admin', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'comment' => 'string|nullable',
            'file' => 'required|mimetypes:application/pdf|max:10000',
            'public' => 'boolean',
        ]);

        $path = $validated['file']->store('public/files');
        $filename = str_replace('public/', '', $path);

        Files::create([
            'title' => $validated['title'],
            'comment' => $validated['comment'],
            'file' => $filename,
            'is_public' => $validated['public'],
            'user_id' => Auth::id(),
        ]);



        return redirect()->route('admin.dashboard')->with('success', 'File ' . $request->public . '  successfully');
    }

    public function download($filename)
    {
        $filePath = 'public/files/' . $filename;

        if (!Storage::exists($filePath)) {
            dd("File non trovato: " . $filePath);
        }

        return Storage::download($filePath);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $userID = Auth::id();
        $ids = Files::where('user_id', $userID)->pluck('id');

        if ($ids->isEmpty()) {
            return redirect()->route('admin.dashboard')->withErrors('No file deleted');
        }

        Files::destroy($ids);
        return redirect()->route('admin.dashboard')->with('success', 'File deleted');
    }

}
