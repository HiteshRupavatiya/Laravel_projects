<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Data</title>
</head>

<body>
    <h1 align="center">Employee Form</h1>
    <form action="" method="">
        @csrf
        <table border="2" align="center">
            <tr>
                <td>
                    <label for="employeeName">Employee Name :</label>
                </td>
                <td>
                    <input type="text" name="employeeName" id="">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="employeeEmail">Employee Email :</label>
                </td>
                <td>
                    <input type="email" name="employeeEmail" id="">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Add Employee">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>
