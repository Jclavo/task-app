<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Task;
use App\Level;
use App\User;

class TaskController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();

        
        return view('tasks.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if ($this->validate_auth()) {
            //$levels = Level::pluck('description', 'id')->toArray();
            $levels = Level::all(['id', 'description']);
            return view('tasks.create',compact('levels'));
        }
        else{
            return redirect('/');
        }

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'description' => 'required',
            'level_id'    => 'required',
            'start_date'  => 'required',
            'end_date'    => 'required'
        ]);

        // $fillable = array('make', 'model', 'produced_on');

        $task = new task([
            'description' => $request->get('description'),
            'level_id'    => $request->get('level_id'),
            'start_date'  => $request->get('start_date'),
            'end_date'    => $request->get('end_date'),
            'user_id'     => Auth::id()
        ]);
        
        $task->save();
        return redirect('/tasks')->with('success', 'task saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
        if ($this->validate_auth_id($task)) {
            $levels = Level::all(['id', 'description']);
            return view('tasks.edit', compact('task','levels'));
        }
        else{
            return redirect('/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if ($this->validate_auth($id)) {
            $request->validate([
                'description' => 'required',
                'level_id'    => 'required',
                'start_date'  => 'required',
                'end_date'    => 'required'
            ]);
            
            $task = Task::find($id);
            $task->description = $request->get('description');
            $task->level_id    = $request->get('level_id');
            $task->start_date  = $request->get('start_date');
            $task->end_date    = $request->get('end_date');
            $task->save();
            
            return redirect('/tasks')->with('success', 'task updated!');
        }
        else{
            return redirect('/');
        }
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {

        if ($this->validate_auth_id($task)) {
            
            $task->delete();
            return redirect('/tasks')->with('success', 'task deleted!');
        }
        else{
            return redirect('/');
        }
    }
    
    /*
     * 
     */
    
    public function report()
    {
        $tasks = Task::all();
        $users = User::all();
        return view('tasks.report', compact('tasks','users'));
        //return view('tasks.report');
    }

    private function validate_auth()
    {

        if (Auth::check()) {
            return TRUE;
        }
        return FALSE;
    }
    
    private function validate_auth_id(Task $task)
    {
        
         if (Auth::check() && Auth::user()->id == $task->user_id) {
             return TRUE;
         }
         return FALSE;
    }

}
