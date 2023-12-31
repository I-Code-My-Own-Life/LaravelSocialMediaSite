<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function search($name)
    {
        $users = User::where('name', 'LIKE', "%$name%")->with('profile')->get();
        
        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $profile = $user->profile;

        // Check if a profile already exists for the user
        if ($profile) {
            // return redirect()->route('profile.edit', $profile);
        }

        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // First, let's validate the data : 
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:profiles'],
            'bio' => ['required', 'string'],
            'avatar' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'] // Assuming you want to validate that the uploaded file is an image and has a maximum size of 2MB (2048 KB).
        ]);

        // Handle avatar file upload
        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        }

        // Storing the profile in the database : 
        Profile::create([
            'user_id' => auth()->user()->id,
            'username' => $request->username,
            'bio' => $request->bio,
            'avatar' => $avatarPath
        ]);

        return redirect("/dashboard");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        $posts = Post::latest()->get();

        return view('profile.show', [
            "profile" => $profile,
            "posts" => $posts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        $this->authorize('edit-profile', $profile);

        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
