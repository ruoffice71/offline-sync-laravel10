@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tasks</h1>

        <form id="task-form" action="{{route('tasks.store')}}" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Task Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Details</label>
                <textarea class="form-control" id="details" name="details" rows="3"></textarea>
            </div>
            <!-- Add other form fields as needed -->

            <button type="submit" class="btn btn-primary">Add Task</button>
        </form>

        <!-- Display the list of tasks here -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/offline-sync.js') }}"></script>
@endsection
