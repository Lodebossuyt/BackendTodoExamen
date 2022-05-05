<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;
use Livewire\Component;
use Livewire\WithPagination;

class TodoLivewire extends Component
{
    use WithPagination;

    use AuthorizesRequests;

    protected $todos;

    public $name;

    protected $rules = [
        'name' => 'required',
    ];

    public function create_todo(){
        if(Auth::check()){
            $this->validate();
            $todo = new Todo();
            $todo->name = $this->name;
            $todo->user_id = Auth::id();
            $todo->save();
        }else{
            Session::flash('login_first','Please register and login first before submitting a todo-item!');
        }
        $this->name = '';
    }

    public function delete_todo($id){
        $todo = Todo::findOrFail($id);
        $this->authorize('delete_todo', $todo);
        $todo->delete();
    }

    public function render()
    {
        $this->todos = Todo::paginate(10);
        return view('livewire.todo-livewire', ['todos'=>$this->todos]);
    }
}
