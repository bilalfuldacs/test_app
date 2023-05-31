@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <a href="{{ route('time_logs_form') }}">Create Time Log</a><br>
                    <a href="{{ route('time_logs_evaluation') }}">Create Evaluation</a><br>

                    <h3>Your Time Logs</h3>
                    {{ __('You are logged in!') }}
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Project Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($data))
                            @foreach($data as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->Start_time }}</td>
                                <td>{{ $item->End_time }}</td>
                                <td>{{ $item->project->name ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('Time_Logs_Edit', ['id' => $item->id]) }}"
                                        class="btn btn-primary">Edit</a>
                                    <button class="btn btn-danger"
                                        onclick="deleteTimeLog({{ $item->id }})">Delete</button>
                                    <form id="delete-form-{{ $item->id }}"
                                        action="{{ route('delete_time_log', ['id' => $item->id]) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function deleteTimeLog(id) {
    if (confirm('Are you sure you want to delete this time log?')) {
        var deleteForm = document.getElementById('delete-form-' + id);
        deleteForm.submit();
    }
}
</script>
@endsection