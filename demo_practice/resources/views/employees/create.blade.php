<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Employee Form</h1>
        <br>
        <form action="{{url('/')}}/employees/store" method="post">
            @csrf
            @method('post')
            <div class="mb-3 row">
                <label for="inputName" class="col-sm-2 col-form-label">Employee Name :</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputEmployeeName" placeholder="Enter Your Name" name="employeeName">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputAddress" class="col-sm-2 col-form-label">Employee Address :</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputAddress" placeholder="Enter Address" name="employeeAddress">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Gender" class="col-sm-2 col-form-label">Employee Gender :</label>
                <div class="col-sm-6">
                    <select name="gender" id="employeeGender">
                        <option value="" disabled>-- Select Gender --</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputBirthDate" class="col-sm-2 col-form-label">Employee Birth Date :</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" id="inputBirthDate" placeholder="Select Date" name="employeeBirthDate">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="p-2 col-sm-12">
                    <input type="submit" class="btn btn-primary form-control" id="btnSubmit" name="Add Employee" value="Add Employee">
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
