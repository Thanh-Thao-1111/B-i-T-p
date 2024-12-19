<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Issue;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //    $issues = Issue::with('computer')->get();
    //    return view('issues.index', compact('issues'));
    // }
    public function index()
    {
        // Sử dụng paginate thay vì all()
        $issues = Issue::with('computer')->paginate(10); // Lấy 5 bản ghi mỗi trang
        return view('issues.index', compact('issues'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $issues = Issue::all();
        $computers = Computer::all();
        return view('issues.create', compact('issues','computers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'computer_id' => 'required',
            'reported_by' => 'nullable|max:50',
            'reported_date' => 'required|date',
            'description' => 'required',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);

        Issue::create($request->all());
        return redirect()->route('issues.index')->with('success', 'Sự cố đã được thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $issue = Issue::findOrFail($id);
        $computers = Computer::all();
        return view('issues.edit', compact('issue', 'computers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'computer_id' => 'required',
            'reported_by' => 'nullable|string|max:50',
            'reported_date' => 'required|date',
            'description' => 'required|string',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);

        $issue = Issue::findOrFail($id);
        $issue->update($request->all());

        return redirect()->route('issues.index')->with('success', 'Sự cố đã được cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $issue = Issue::findOrFail($id);
        $issue->delete();

        return redirect()->route('issues.index')->with('success', 'Sự cố đã được xóa thành công!');
    }
}
