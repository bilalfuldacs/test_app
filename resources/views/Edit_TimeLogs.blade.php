<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      padding: 20px;
    }

    .form-container {
      max-width: 400px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-container label {
      display: block;
      margin-bottom: 8px;
    }

    .form-container input[type="text"],
    .form-container input[type="time"],
    .form-container input[type="date"],
    .form-container select {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    .form-container button[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      margin-top: 10px;
    }

    .form-container button[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Project Form</h2>
    @if(isset($data))
        @foreach($data as $dat)
 <form method="post" action="{{ route('update_time_logs', ['id' => $dat->id]) }}">

      <!-- Project Name Field -->
      @csrf
       @method('PATCH')
<input type="text" id="project-name-display" value="{{ $dat->project->name }}" readonly>
<input type="hidden" id="project-id" name="project_id" value="{{ $dat->Project_id }}">


      <!-- Start Time Field -->
      <label for="start-time">Start Time:</label>
      <input type="time" id="start-time" name="start_time" value="{{ $dat->Start_time}}" required>

      <!-- End Time Field -->
      <label for="end-time">End Time:</label>
      <input type="time" id="end-time" name="end_time" value="{{ $dat->End_time}}" required>

      <!-- Date Field -->
      <label for="date">Date:</label>
      <input type="date" id="date" name="date" value="{{ $dat->Date}}" required>

      <!-- Save Button -->
      <button type="submit">Save</button>
       @endforeach
        @endif
    </form>
</body>
</html>
