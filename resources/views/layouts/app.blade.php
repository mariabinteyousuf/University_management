<!DOCTYPE html>
<html>
<head>
    <title>University Management System</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .navbar {
            background: #2c3e50;
            padding: 15px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
        }

        .navbar a:hover {
            color: yellow;
        }

        .content {
            padding: 20px;
        }

        .top-buttons {
           text-align: left;
            margin-bottom: 20px;
        }
      
        .btn {
            display: inline-block;
            padding: 10px 15px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            margin-left: 15px;
            border: none;
            cursor: pointer;
        }

        .create-btn {
            background-color: green;
        }
        
        .back-btn {
            background-color: blue;
        }
        
        .edit-btn {
            background-color: orange;
        }
 
        .show-btn {
             background-color: purple;
        }

        .delete-btn {
            background-color: red;
        }

        .inline-form {
            display: inline;
        }
        
        .btn:hover {
            opacity: 0.8;
         }

        



.form-container {
    width: 400px;
    margin: 40px auto;
    padding: 30px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background: #f9f9f9;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.form-container h2 {
    text-align: center;
    margin-bottom: 25px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

.form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 15px;
    box-sizing: border-box;
}

.form-buttons {
    margin-top: 20px;
}

.submit-btn {
    background: green;
    color: white;
    padding: 10px 18px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.cancel-btn {
    background: #555;
    color: white;
    padding: 10px 18px;
    text-decoration: none;
    border-radius: 5px;
    margin-left: 10px;
}

.submit-btn:hover,
.cancel-btn:hover {
    opacity: 0.9;
}

.error {
    color: red;
    font-size: 14px;
    margin-top: 5px;
}

    </style>

</head>

<body>

    <div class="navbar">
        <a href="/">Home</a>
        <a href="/departments">Departments</a>
        <a href="/teachers">Teachers</a>
        <a href="/students">Students</a>
        <a href="/courses">Courses</a>
        <a href="/registrations">Registrations</a>
        <a href="/events">Events</a>
    </div>

    <div class="content">
        @yield('content')
    </div>

</body>
</html>