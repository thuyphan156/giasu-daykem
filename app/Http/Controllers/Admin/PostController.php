<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Classes;
use App\Models\Contact;
use App\Models\Subject;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.list', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($contactId)
    {
        $contact = Contact::find($contactId);
        $classes = Classes::all();
        $subjects = Subject::where('class_id', $contact->class_id)->get();

        return view('admin.posts.add', compact('contact', 'classes', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $contactId)
    {
        Post::create([
            'id' => mt_rand(100000, 999999),
            'class_id' => $request->class,
            'subject_id' => $request->subject,
            'number_sessions' => $request->number_sessions,
            'minutes' => $request->minutes,
            'days' => implode(', ', $request->days),
            'time' => $request->time,
            'address' => $request->address,
            'salary' => $request->salary,
            'fee' => $request->fee,
            'note' => $request->note,
            'contact_id' => $contactId,
            'students' => $request->students
        ]);
        toastr()->success('Thêm thành công');

        return redirect()->route('post.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $classes = Classes::all();
        $subjects = Subject::where('class_id', $post->class_id)->get();
        
        return view('admin.posts.edit', compact('post', 'classes', 'subjects'));
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
        $post = Post::find($id);
        $post->class_id = $request->class;
        $post->subject_id = $request->subject;
        $post->number_sessions = $request->number_sessions;
        $post->minutes = $request->minutes;
        $post->days = implode(', ', $request->days);
        $post->time = $request->time;
        $post->address = $request->address;
        $post->salary = $request->salary;
        $post->fee = $request->fee;
        $post->note = $request->note;
        $post->students = $request->students;
        $post->save();
        toastr()->success('Cập nhật thành công');

        return redirect()->route('post.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        toastr()->success('Xóa thành công');

        return redirect()->back();
    }
}
