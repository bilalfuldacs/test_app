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

    .heading {
        text-align: center;
        margin: 20px 0;
    }

    .time-logs-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .time-logs-table th,
    .time-logs-table td {
        padding: 8px;
        border: 1px solid #ccc;
    }

    .time-logs-table th {
        background-color: #f2f2f2;
    }

    .total-hours {
        text-align: center;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Project Form</h2>
        <form method="POST" action="{{ route('Time_logs_evaluation_fetch') }}">
            <!-- Month and Year Selection -->
            @csrf
            @if(isset($Month))
            {{$Month}}
            @endif
            <label for="month">Month:</label>
            <input type="month" id="month" name="month" required>

            <button type="submit">Save</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>date</th>
                    <th>project name</th>
                    <th>start time</th>
                    <th>end time</th>
                    <th>total time</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($timeLogs))
                @foreach($timeLogs as $item)
                <tr>
                    <td>{{ $item->Date }}</td>
                    <td>{{ $item->Project->name }}</td>
                    <td>{{ $item->Start_time }}</td>
                    <td>{{ $item->End_time }}</td>
                    <td>
                        {{ $total_day_time[$item->id]['hours'] }}:{{ $total_day_time[$item->id]['minutes'] }}



                    </td>

                </tr>

                @endforeach
                @endif
            </tbody>
        </table><br><br>
        <h3> Total Hours Worked </h3>
        @if(isset($total_month_time))

        {{ $total_month_time['hours'] }} hours: {{ $total_month_time['minutes'] }} minutes
        @endif