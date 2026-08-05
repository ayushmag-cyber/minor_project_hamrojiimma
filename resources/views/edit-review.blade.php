<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Review</title>

    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>

<div class="review-form">

    <h2>Edit Your Review</h2>

    <form action="{{ route('review.update', $review->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="input-group">
            <label>Service</label>

            <select name="service_id" required>

                @foreach($services as $service)

                    <option value="{{ $service->id }}"
                        {{ $review->service_id == $service->id ? 'selected' : '' }}>

                        {{ $service->service_name }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="input-group">

            <label>Your Review</label>

            <textarea name="review" required>{{ $review->review }}</textarea>

        </div>

        <div class="input-group">

            <label>Rating</label>

            <select name="rating">

                @for($i=5;$i>=1;$i--)

                    <option value="{{ $i }}"
                        {{ $review->rating == $i ? 'selected' : '' }}>

                        {{ str_repeat('★',$i) }}

                    </option>

                @endfor

            </select>

        </div>

        <button type="submit" class="btn">
            Update Review
        </button>

        <a href="{{ url('/reviews') }}" class="btn">
            Cancel
        </a>

    </form>

</div>

</body>
</html>