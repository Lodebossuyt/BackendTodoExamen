<div>
    <form wire:submit.prevent="create_todo">
        <div class="input-group mb-3">
            <input wire:model="name" type="text" class="form-control" placeholder="Todo..."
                   aria-describedby="button-addon2">
            <button class="btn btn-outline-primary" type="submit" id="button-addon2">Add Todo</button>
        </div>
        <div>@error('name')
            <div class="alert alert-danger p-2 my-2">{{$message}}</div> @enderror
        </div>
        @if(Session::has('login_first'))
            <div class="alert alert-danger p-2 my-2">{{session('login_first')}}</div>
        @endif
    </form>
    <table class="table-borderless w-100">
        <thead class="table-light">
        <tr>
            <th>Todo</th>
            <th>Creator</th>
            <th><div class="d-flex justify-content-end mx-3 my-1">Actions</div></th>
        </tr>
        </thead>
        <tbody>
        @foreach($todos as $todo)
            <tr>
                <td>{{$todo->name}}</td>
                <td>{{$todo->user->name}}</td>
                <td>
                    <div class="d-flex justify-content-end">
                        @can('delete_todo', $todo)
                            <button type="button" wire:click="delete_todo({{$todo->id}})" class="btn btn-danger m-1">Delete
                            </button>
                        @else
                            <button disabled class="btn btn-danger m-1">Delete</button>
                        @endcan
                    </div>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$todos->links()}}
</div>
