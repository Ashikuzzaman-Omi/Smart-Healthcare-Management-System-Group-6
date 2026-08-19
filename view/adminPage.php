<html>

<head>

    <title>Smart Healthcare Management System</title>

    <link rel="stylesheet" type="text/css" href="design/adminDesign.css">

    <script>

        function showUsers() {

            document.getElementById("users").style.display = "block";
            document.getElementById("inventory").style.display = "none";
            document.getElementById("patients").style.display = "none";
            document.getElementById("payments").style.display = "none";

        }


        function showInventory() {

            document.getElementById("users").style.display = "none";
            document.getElementById("inventory").style.display = "block";
            document.getElementById("patients").style.display = "none";
            document.getElementById("payments").style.display = "none";

        }


        function showPatients() {

            document.getElementById("users").style.display = "none";
            document.getElementById("inventory").style.display = "none";
            document.getElementById("patients").style.display = "block";
            document.getElementById("payments").style.display = "none";

        }


        function showPayments() {

            document.getElementById("users").style.display = "none";
            document.getElementById("inventory").style.display = "none";
            document.getElementById("patients").style.display = "none";
            document.getElementById("payments").style.display = "block";

        }


        function searchTable(tableId, inputId) {

            var input = document.getElementById(inputId);

            var filter = input.value.toLowerCase();

            var table = document.getElementById(tableId);

            var rows = table.getElementsByTagName("tr");


            for (var i = 1; i < rows.length; i++) {

                var text = rows[i].innerText.toLowerCase();

                if (text.indexOf(filter) > -1) {

                    rows[i].style.display = "";

                } else {

                    rows[i].style.display = "none";

                }

            }

        }


        function addUser() {

            alert("Add User form will be connected with Controller later.");

        }


        function editUser() {

            alert("Edit User will be connected with Controller later.");

        }


        function deleteUser() {

            alert("Delete User will be connected with Controller later.");

        }


        function addInventory() {

            alert("Add Inventory form will be connected with Controller later.");

        }


        function editInventory() {

            alert("Edit Inventory will be connected with Controller later.");

        }


        function deleteInventory() {

            alert("Delete Inventory will be connected with Controller later.");

        }


        function addPatient() {

            alert("Add Patient form will be connected with Controller later.");

        }


        function editPatient() {

            alert("Edit Patient will be connected with Controller later.");

        }


        function deletePatient() {

            alert("Delete Patient will be connected with Controller later.");

        }


        function addPayment() {

            alert("Add Payment form will be connected with Controller later.");

        }


        function editPayment() {

            alert("Edit Payment will be connected with Controller later.");

        }


        function deletePayment() {

            alert("Delete Payment will be connected with Controller later.");

        }

    </script>

</head>


<body>

    <div class="container">

        <h1>Smart Healthcare Management System</h1>

        <h2>Admin Dashboard</h2>


        <table border="1">

            <tr>

                <th>Admin Options</th>

            </tr>


            <tr>

                <td>

                    <button onclick="showUsers()">
                        Manage Users
                    </button>

                </td>

            </tr>


            <tr>

                <td>

                    <button onclick="showInventory()">
                        Inventory
                    </button>

                </td>

            </tr>


            <tr>

                <td>

                    <button onclick="showPatients()">
                        Patients
                    </button>

                </td>

            </tr>


            <tr>

                <td>

                    <button onclick="showPayments()">
                        Payments
                    </button>

                </td>

            </tr>

        </table>


        <br>


        <div id="users">

            <h2>Manage Users</h2>


            <button onclick="addUser()">
                Add User
            </button>


            <br>
            <br>


            <input type="text"
                id="userSearch"
                placeholder="Search User"
                onkeyup="searchTable('userTable', 'userSearch')">


            <br>
            <br>


            <table border="1" id="userTable">

                <tr>

                    <th>Username</th>

                    <th>Full Name</th>

                    <th>NID</th>

                    <th>Email</th>

                    <th>Phone</th>

                    <th>Address</th>

                    <th>Password</th>

                    <th>Role</th>

                    <th>Action</th>

                </tr>


                <tr>

                    <td>admin</td>

                    <td>Admin User</td>

                    <td>123456</td>

                    <td>admin@gmail.com</td>

                    <td>01700000000</td>

                    <td>Dhaka</td>

                    <td>1234</td>

                    <td>Admin</td>

                    <td>

                        <button onclick="editUser()">
                            Edit
                        </button>

                        <button onclick="deleteUser()">
                            Delete
                        </button>

                    </td>

                </tr>

            </table>

        </div>


        <div id="inventory" style="display:none">

            <h2>Inventory</h2>


            <button onclick="addInventory()">
                Add Item
            </button>


            <br>
            <br>


            <input type="text"
                id="inventorySearch"
                placeholder="Search Inventory"
                onkeyup="searchTable('inventoryTable', 'inventorySearch')">


            <br>
            <br>


            <table border="1" id="inventoryTable">

                <tr>

                    <th>Product</th>

                    <th>Quantity</th>

                    <th>Category</th>

                    <th>Expiry</th>

                    <th>Status</th>

                    <th>Action</th>

                </tr>


                <tr>

                    <td>Medicine</td>

                    <td>50</td>

                    <td>Tablet</td>

                    <td>2027-01-01</td>

                    <td>Valid</td>

                    <td>

                        <button onclick="editInventory()">
                            Edit
                        </button>

                        <button onclick="deleteInventory()">
                            Delete
                        </button>

                    </td>

                </tr>

            </table>

        </div>


        <div id="patients" style="display:none">

            <h2>Patients</h2>


            <button onclick="addPatient()">
                Add Patient
            </button>


            <br>
            <br>


            <input type="text"
                id="patientSearch"
                placeholder="Search Patient"
                onkeyup="searchTable('patientTable', 'patientSearch')">


            <br>
            <br>


            <table border="1" id="patientTable">

                <tr>

                    <th>Patient Serial</th>

                    <th>Patient Name</th>

                    <th>Phone</th>

                    <th>Task</th>

                    <th>Action</th>

                </tr>


                <tr>

                    <td>1001</td>

                    <td>Rahim</td>

                    <td>01700000000</td>

                    <td>General Checkup</td>

                    <td>

                        <button onclick="editPatient()">
                            Edit
                        </button>

                        <button onclick="deletePatient()">
                            Delete
                        </button>

                    </td>

                </tr>

            </table>

        </div>


        <div id="payments" style="display:none">

            <h2>Payments</h2>


            <button onclick="addPayment()">
                Add Payment
            </button>


            <br>
            <br>


            <input type="text"
                id="paymentSearch"
                placeholder="Search Payment"
                onkeyup="searchTable('paymentTable', 'paymentSearch')">


            <br>
            <br>


            <table border="1" id="paymentTable">

                <tr>

                    <th>Payment ID</th>

                    <th>Patient Name</th>

                    <th>Phone</th>

                    <th>Amount</th>

                    <th>Patient Serial</th>

                    <th>Action</th>

                </tr>


                <tr>

                    <td>1</td>

                    <td>Rahim</td>

                    <td>01700000000</td>

                    <td>500</td>

                    <td>1001</td>

                    <td>

                        <button onclick="editPayment()">
                            Edit
                        </button>

                        <button onclick="deletePayment()">
                            Delete
                        </button>

                    </td>

                </tr>

            </table>

        </div>


        <br>

        <button>
            Logout
        </button>

    </div>

</body>

</html>