<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {

        $announcements = Announcement::latest()->get();

        return view('pages.admin.announcements.index', compact('announcements'));
    }

    public function showEditForm(Announcement $announcement)
    {
        return view('pages.admin.announcements.edit', compact('announcement'));
    }

    public function update(Announcement $announcement, Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content'  => 'required'
        ]);

        $announcement->update($request->only('title', 'content'));

        return redirect('/admin/announcements');
    }

    public function showCreateForm()
    {
        return view('pages.admin.announcements.new');
    }

    public function show(Announcement $announcement)
    {
        return view('pages.admin.announcements.show', compact('announcement'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);

        Announcement::create($request->only('title', 'content'));

        return redirect('/admin/announcements');
    }
}
