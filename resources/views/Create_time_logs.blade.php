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
    <form method="POST" action="{{ route('save_time_logs') }}">
      <!-- Project Name Field -->
      @csrf
      <label for="project-name">Project Name:</label>
      <select id="project-name" name="project_id" >
        
        @if(isset($data))
        @foreach($data as $dat)
          <option value="{{ $dat['id'] }}">{{ $dat['name'] }}</option>
        @endforeach
        @endif
      </select>

      <!-- Start Time Field -->
      <label for="start-time">Start Time:</label>
      <input type="time" id="start-time" name="start_time" >

      <!-- End Time Field -->
      <label for="end-time">End Time:</label>
      <input type="time" id="end-time" name="end_time" >

      <!-- Date Field -->
      <label for="date">Date:</label>
      <input type="date" id="date" name="date" >

      <!-- Save Button -->
      <button type="submit">Save</button>
    </form>
</body>
</html>
