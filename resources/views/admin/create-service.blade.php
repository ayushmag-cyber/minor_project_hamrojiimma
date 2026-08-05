<!DOCTYPE html>
<html>
<head>

<title>Add Service</title>

<link rel="stylesheet" href="{{ asset('style.css') }}">

</head>

<body>


<div class="main-content">

    <h1>Add New Service</h1>


    <form action="{{ route('admin.services.store') }}" 
          method="POST" 
          enctype="multipart/form-data">

        @csrf


        <label>Service Name</label>
        <input type="text" 
               name="service_name" 
               placeholder="Enter service name"
               required>


        <label>Description</label>
        <textarea name="description" 
                  placeholder="Enter service description"
                  required></textarea>


        <label>Price</label>
        <input type="number" 
               name="price" 
               placeholder="Enter price"
               required>


        <label>Status</label>
        <select name="status">

            <option value="Available">
                Available
            </option>

            <option value="Unavailable">
                Unavailable
            </option>

        </select>


        <label>Service Image</label>
        <input type="file" 
               name="image"
               required>


        <button type="submit">
            Add Service
        </button>


    </form>

</div>


</body>
</html>