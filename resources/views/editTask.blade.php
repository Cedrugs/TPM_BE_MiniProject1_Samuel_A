<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <x-nav-bar />

    <form action="{{ route("editTask", $task->id) }}", method="POST">
        @csrf

        <label for="TaskName">Task Name</label><br>
        <input id="TaskName" type="text" name="TaskName" value="{{ $task->TaskName }}"><br>
        @error('TaskName')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <label for="TaskDescription">Task Description</label><br>
        <input id="TaskDescription" type="text" name="TaskDescription" value="{{ $task->TaskDescription }}"><br>
        @error('TaskDescription')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <label for="TaskImage">Task Image (url)</label><br>
        <input id="TaskImage" type="text" name="TaskImage" value="{{ $task->TaskImage }}"><br>
        @error('TaskImage')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <select name="CategoryId" id="CategoryId">
            <option value="{{ $task->CategoryId }}">{{ $task->category->CategoryName }}</option>
          @foreach ($categories as $category)
            @if ($category->id != $task->CategoryId)
                <option value="{{$category->id}}">{{$category->CategoryName}}</option>
            @endif
          @endforeach
        </select><br>

        <button type="submit">Save</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>