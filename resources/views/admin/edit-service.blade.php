<!DOCTYPE html>
<html>
<head>

<title>Edit Service</title>

<link rel="stylesheet" href="{{ asset('style.css') }}">

</head>

<body>

<div class="main-content">

    <h1>Edit Service</h1>


    @if(session('success'))

    <p style="color:green;">
        {{ session('success') }}
    </p>

    @endif


    @if($errors->any())

        @foreach($errors->all() as $error)

        <p style="color:red;">
            {{ $error }}
        </p>

        @endforeach

    @endif

    <form action="{{ route('admin.services.update',$service->id) }}" 
          method="POST" 
          enctype="multipart/form-data">

        @csrf

        @method('PUT')

        <label>Service Name</label>

        <input type="text"name="service_name"value="{{ $service->service_name }}"required>


        <label>Description</label>

        <textarea name="description" required>{{ $service->description }}</textarea>

        <label>Price</label>

        <input type="number"name="price"value="{{ $service->price }}"required>

        <label>Status</label>

        <select name="status">

            <option value="Available"
            @if($service->status == 'Available')
                selected
            @endif>
                Available
            </option>

            <option value="Unavailable"
            @if($service->status == 'Unavailable')
                selected
            @endif>
                Unavailable
            </option>


        </select>

        <label>Current Image</label>

        @if($service->image)

            <br>

            <img src="{{ asset($service->image) }}" 
                 width="150"
                 height="120">

            <br>

        @else

            <p>No image</p>

        @endif

        <label>Change Image</label>
        <input type="file" name="image">
        <button type="submit">
            Update Service
        </button>

    </form>

</div>

</body>
</html>