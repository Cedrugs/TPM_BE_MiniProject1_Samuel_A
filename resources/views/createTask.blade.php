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

    <form action="{{ route("createTask") }}", method="POST">
        @csrf

        <label for="TaskName">Task Name</label><br>
        <input id="TaskName" type="text" name="TaskName" value="{{ old("TaskName") }}"><br>
        @error('ProductName')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <label for="TaskDescription">Task Description</label><br>
        <input id="TaskDescription" type="text" name="TaskDescription" value="{{ old("TaskDescription") }}"><br>
        @error('ProductPrice')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <select name="CategoryId" id="CategoryId">
          @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->CategoryName}}</option>
          @endforeach
        </select><br>

        <button type="submit">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>