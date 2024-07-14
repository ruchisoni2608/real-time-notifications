@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Set Follow-Up Date and Time</h1>
        <form method="POST" action="{{ route('followup.store') }}">
            @csrf
            <div class="form-group">
                <label for="follow_up_at">Follow-Up Date and Time</label>
                <input type="datetime-local" class="form-control" id="follow_up_at" name="follow_up_at" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
@endsection
