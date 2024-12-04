<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home - Tasker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    @include('components.nav-bar', ['isLoggedIn' => $isLoggedIn])

    @if ($isLoggedIn)
      <section id="tasks">
        <div class="tasks-container">
          @forelse ($tasks as $task)
            <div class="card" style="width: 18rem;">
              <img src="{{ $task->TaskImage }}" alt="{{ $task->TaskImage }}">
              <div class="card-body">
                <h5 class="card-title">{{ $task->TaskName }}</h5>
                <h6 class="card-title">Category: {{ $task->category->CategoryName }}</h6>
                <p class="card-text">{{ $task->TaskDescription }}</p>
                @if ($isLoggedIn)
                  <div class="card-action">
                    <a href="{{ route('getEditTaskPage', $task->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('deleteTask', $task->id) }}" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </div>
                @endif
              </div>
            </div>
          @empty
            <div class="tasks-empty-container">
              <h8>Congratulations! You've done all your tasks.</h8>
              <a href="{{ route('getCreateTaskPage') }}" class="btn btn-primary">Create New Task</a>
            </div>
          @endforelse
        </div>
      
        {{ $tasks->links() }}
      </section>
    @else
      <section id="landing">
        <div>
          <h1>Welcome to Tasker!</h1>
          <h3>Register now to start creating task list!</h3>
        </div>
          <a href="{{ route('getRegisterPage') }}" class="btn btn-primary">Register</a>
      </section>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>