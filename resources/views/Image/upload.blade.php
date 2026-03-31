<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Image Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .upload-container {
            background: #fff;
            padding: 25px;
            width: 300px;
            text-align: center;
            border-radius: 8px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .upload-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .file-label {
            display: block;
            padding: 12px;
            background: #3498db;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 15px;
        }

        .file-label input {
            display: none;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            background: #2ecc71;
            color: white;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #27ae60;
        }
    </style>
</head>
<body>

<div class="upload-container">
    <h2>Upload Image</h2>

    <form method="post" action="{{route('store-image3')}}" enctype="multipart/form-data">
        @csrf
        <label class="file-label">
            Choose Image
            <input type="file" name="picture" accept="image/*" required>
        </label>
        <button type="submit">Upload</button>
    </form>
</div>

</body>
</html>
