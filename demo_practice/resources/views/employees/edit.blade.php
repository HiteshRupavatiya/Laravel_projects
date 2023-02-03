<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        select{
            background: #fff;
            padding: 9px;
            justify-content: center;
            border: 2px light dark(rgb(228, 224, 224));
            border-radius: 5px;
            margin: 0px;
            font-size: 1rem;
        }
        select:focus{
            border: green;
        }
        option{
            font-family: inherit;
            background: black;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Employee Form</h1>
        <br>
        <form action="{{route('employees.update',[$employee->id])}}" method="post">
            @csrf
            @method('put')
            <div class="mb-3 row">
                <label for="inputName" class="col-sm-2 col-form-label">Employee Name :</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputEmployeeName" placeholder="Enter Your Name" name="employeeName" value="{{$employee['employee_name']}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputAddress" class="col-sm-2 col-form-label">Employee Address :</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputAddress" placeholder="Enter Address" name="employeeAddress" value="{{$employee['employee_address']}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Gender" class="col-sm-2 col-form-label">Employee Gender :</label>
                <div class="col-sm-6">
                    <select name="gender" id="employeeGender">
                        <option value="" disabled>-- Select Gender --</option>
                        <option value="Male" {{$employee->gender == 'male' ? 'selected' : ''}} >Male</option>
                        <option value="Female" {{$employee->gender == 'female' ? 'selected' : ''}} >Female</option>
                        <option value="Other" {{$employee->gender == 'other' ? 'selected' : ''}} >Other</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputBirthDate" class="col-sm-2 col-form-label">Employee Birth Date :</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" id="inputBirthDate" placeholder="Select Date" name="employeeBirthDate" value="{{$employee['dob']}}">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="p-2 col-sm-12">
                    <input type="submit" class="btn btn-primary form-control" id="btnSubmit" name="Update Employee" value="Update Employee">
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
