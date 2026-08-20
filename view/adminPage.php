<?php

$title = "Smart Healthcare Management System";

?>

<html>

<head>

    <title><?php echo $title; ?></title>

    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

    <div class="container">

        <h1><?php echo $title; ?></h1>

        <h2>Admin Dashboard</h2>

        <p class="welcome">Welcome to Admin Panel</p>


        <fieldset>

            <legend>User Management</legend>

            <form>

                <table>

                    <tr>
                        <td><b>Username:</b></td>

                        <td>
                            <input type="text" name="username">
                        </td>
                    </tr>

                    <tr>
                        <td><b>Full Name:</b></td>

                        <td>
                            <input type="text" name="fullname">
                        </td>
                    </tr>

                    <tr>
                        <td><b>Email:</b></td>

                        <td>
                            <input type="text" name="email">
                        </td>
                    </tr>

                    <tr>
                        <td><b>Phone:</b></td>

                        <td>
                            <input type="text" name="phone">
                        </td>
                    </tr>

                    <tr>

                        <td><b>Role:</b></td>

                        <td>

                            <select name="role">

                                <option value="">Select Role</option>

                                <option value="Admin">Admin</option>

                                <option value="Doctor">Doctor</option>

                                <option value="Patient">Patient</option>

                                <option value="Staff">Staff</option>

                            </select>

                        </td>

                    </tr>

                    <tr>

                        <td></td>

                        <td>

                            <button type="submit">Add User</button>

                        </td>

                    </tr>

                </table>

            </form>

        </fieldset>


        <br>


        <h2>User List</h2>

        <table border="1">

            <tr>

                <th>User ID</th>

                <th>Username</th>

                <th>Full Name</th>

                <th>Email</th>

                <th>Phone</th>

                <th>Role</th>

                <th>Action</th>

            </tr>

            <tr>

                <td>1</td>

                <td>admin</td>

                <td>Admin User</td>

                <td>admin@gmail.com</td>

                <td>01700000000</td>

                <td>Admin</td>

                <td>

                    <button>Edit</button>

                    <button>Remove</button>

                </td>

            </tr>

        </table>


        <br>
        <br>


        <fieldset>

            <legend>Patient Management</legend>

            <form>

                <table>

                    <tr>

                        <td><b>Patient Name:</b></td>

                        <td>
                            <input type="text" name="patientName">
                        </td>

                    </tr>

                    <tr>

                        <td><b>Email:</b></td>

                        <td>
                            <input type="text" name="patientEmail">
                        </td>

                    </tr>

                    <tr>

                        <td><b>Phone:</b></td>

                        <td>
                            <input type="text" name="patientPhone">
                        </td>

                    </tr>

                    <tr>

                        <td><b>Address:</b></td>

                        <td>
                            <input type="text" name="patientAddress">
                        </td>

                    </tr>

                    <tr>

                        <td></td>

                        <td>

                            <button type="submit">Add Patient</button>

                        </td>

                    </tr>

                </table>

            </form>

        </fieldset>


        <br>


        <h2>Patient List</h2>

        <table border="1">

            <tr>

                <th>Patient ID</th>

                <th>Name</th>

                <th>Email</th>

                <th>Phone</th>

                <th>Address</th>

                <th>Action</th>

            </tr>

            <tr>

                <td>1</td>

                <td>Patient Name</td>

                <td>patient@gmail.com</td>

                <td>01800000000</td>

                <td>Dhaka</td>

                <td>

                    <button>Edit</button>

                    <button>Remove</button>

                </td>

            </tr>

        </table>


        <br>
        <br>


        <fieldset>

            <legend>Doctor Management</legend>

            <form>

                <table>

                    <tr>

                        <td><b>Doctor Name:</b></td>

                        <td>
                            <input type="text" name="doctorName">
                        </td>

                    </tr>

                    <tr>

                        <td><b>Email:</b></td>

                        <td>
                            <input type="text" name="doctorEmail">
                        </td>

                    </tr>

                    <tr>

                        <td><b>Phone:</b></td>

                        <td>
                            <input type="text" name="doctorPhone">
                        </td>

                    </tr>

                    <tr>

                        <td><b>Specialization:</b></td>

                        <td>
                            <input type="text" name="specialization">
                        </td>

                    </tr>

                    <tr>

                        <td></td>

                        <td>

                            <button type="submit">Add Doctor</button>

                        </td>

                    </tr>

                </table>

            </form>

        </fieldset>


        <br>


        <h2>Doctor List</h2>

        <table border="1">

            <tr>

                <th>Doctor ID</th>

                <th>Name</th>

                <th>Email</th>

                <th>Phone</th>

                <th>Specialization</th>

                <th>Action</th>

            </tr>

            <tr>

                <td>1</td>

                <td>Dr. Rahman</td>

                <td>doctor@gmail.com</td>

                <td>01900000000</td>

                <td>Medicine</td>

                <td>

                    <button>Edit</button>

                    <button>Remove</button>

                </td>

            </tr>

        </table>


        <br>
        <br>


        <fieldset>

            <legend>Medicine Inventory</legend>

            <form>

                <table>

                    <tr>

                        <td><b>Medicine Name:</b></td>

                        <td>
                            <input type="text" name="medicineName">
                        </td>

                    </tr>

                    <tr>

                        <td><b>Quantity:</b></td>

                        <td>
                            <input type="number" name="quantity">
                        </td>

                    </tr>

                    <tr>

                        <td><b>Price:</b></td>

                        <td>
                            <input type="number" name="price">
                        </td>

                    </tr>

                    <tr>

                        <td><b>Expiry Date:</b></td>

                        <td>
                            <input type="date" name="expiryDate">
                        </td>

                    </tr>

                    <tr>

                        <td></td>

                        <td>

                            <button type="submit">Add Medicine</button>

                        </td>

                    </tr>

                </table>

            </form>

        </fieldset>


        <br>


        <h2>Medicine List</h2>

        <table border="1">

            <tr>

                <th>Medicine ID</th>

                <th>Medicine Name</th>

                <th>Quantity</th>

                <th>Price</th>

                <th>Expiry Date</th>

                <th>Action</th>

            </tr>

            <tr>

                <td>1</td>

                <td>Paracetamol</td>

                <td>100</td>

                <td>2</td>

                <td>2027-01-01</td>

                <td>

                    <button>Edit</button>

                    <button>Remove</button>

                </td>

            </tr>

        </table>


        <br>
        <br>


        <fieldset>

            <legend>Payment Management</legend>

            <form>

                <table>

                    <tr>

                        <td><b>Patient Name:</b></td>

                        <td>
                            <input type="text" name="patientName">
                        </td>

                    </tr>

                    <tr>

                        <td><b>Amount:</b></td>

                        <td>
                            <input type="number" name="amount">
                        </td>

                    </tr>

                    <tr>

                        <td><b>Payment Date:</b></td>

                        <td>
                            <input type="date" name="paymentDate">
                        </td>

                    </tr>

                    <tr>

                        <td><b>Payment Status:</b></td>

                        <td>

                            <select name="paymentStatus">

                                <option value="">Select Status</option>

                                <option value="Paid">Paid</option>

                                <option value="Pending">Pending</option>

                            </select>

                        </td>

                    </tr>

                    <tr>

                        <td></td>

                        <td>

                            <button type="submit">Add Payment</button>

                        </td>

                    </tr>

                </table>

            </form>

        </fieldset>


        <br>


        <h2>Payment List</h2>

        <table border="1">

            <tr>

                <th>Payment ID</th>

                <th>Patient Name</th>

                <th>Amount</th>

                <th>Payment Date</th>

                <th>Status</th>

                <th>Action</th>

            </tr>

            <tr>

                <td>1</td>

                <td>Patient Name</td>

                <td>500</td>

                <td>2026-08-20</td>

                <td>Paid</td>

                <td>

                    <button>Edit</button>

                    <button>Remove</button>

                </td>

            </tr>

        </table>

    </div>

</body>

</html>