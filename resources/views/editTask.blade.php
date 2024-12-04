<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Task</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    @include('components.nav-bar', ['isLoggedIn' => $isLoggedIn])
    <section id="create-task">
      <h1>Edit Task</h1>
      <div class="create-container">
        <form action="{{ route("editTask", $task->id) }}", method="POST">
            @csrf

            <div>
              <label for="TaskName" class="form-label">Task Name</label><br>
              <input id="TaskName" type="text" name="TaskName" value="{{ $task->TaskName }}" class="form-control"><br>
              @error('TaskName')
                  <p style="color: red;">{{ $message }}</p>
              @enderror
            </div>
            
            <div>
              <label for="TaskDescription" class="form-label">Task Description</label><br>
              <input id="TaskDescription" type="text" name="TaskDescription" value="{{ $task->TaskDescription }}" class="form-control"><br>
              @error('TaskDescription')
                  <p style="color: red;">{{ $message }}</p>
              @enderror
            </div>

            <div>
              <label for="TaskImage" class="form-label">Task Image (url)</label><br>
              <input id="TaskImage" type="text" name="TaskImage" value="{{ $task->TaskImage }}" class="form-control"><br>
              @error('TaskImage')
                  <p style="color: red;">{{ $message }}</p>
              @enderror
            </div>

            <select name="CategoryId" id="CategoryId" class="form-select">
              <option value="{{ $task->CategoryId }}">{{ $task->category->CategoryName }}</option>
              @foreach ($categories as $category)
                @if ($category->id != $task->CategoryId)
                    <option value="{{$category->id}}">{{$category->CategoryName}}</option>
                @endif
              @endforeach
            </select><br>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>