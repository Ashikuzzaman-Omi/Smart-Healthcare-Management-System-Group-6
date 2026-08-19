<html>

<head>

    <title>Smart Healthcare Management System</title>

    <link rel="stylesheet" type="text/css" href="design/adminDesign.css">


    <script>

        function addUser() {

            const username = document.getElementById("username").value;
            const fullName = document.getElementById("fullName").value;
            const nid = document.getElementById("nid").value;
            const email = document.getElementById("email").value;
            const phone = document.getElementById("phone").value;
            const address = document.getElementById("address").value;
            const password = document.getElementById("password").value;
            const role = document.getElementById("role").value;

            let hasError = false;


            if (!username) {

                document.getElementById("usernameError").innerHTML =
                    "Username is required";

                hasError = true;

            } else {

                document.getElementById("usernameError").innerHTML = "";

            }


            if (!fullName) {

                document.getElementById("fullNameError").innerHTML =
                    "Full Name is required";

                hasError = true;

            } else {

                document.getElementById("fullNameError").innerHTML = "";

            }


            if (!nid) {

                document.getElementById("nidError").innerHTML =
                    "NID is required";

                hasError = true;

            } else {

                document.getElementById("nidError").innerHTML = "";

            }


            if (!email) {

                document.getElementById("emailError").innerHTML =
                    "Email is required";

                hasError = true;

            } else {

                document.getElementById("emailError").innerHTML = "";

            }


            if (!phone) {

                document.getElementById("phoneError").innerHTML =
                    "Phone is required";

                hasError = true;

            } else {

                document.getElementById("phoneError").innerHTML = "";

            }


            if (!address) {

                document.getElementById("addressError").innerHTML =
                    "Address is required";

                hasError = true;

            } else {

                document.getElementById("addressError").innerHTML = "";

            }


            if (!password) {

                document.getElementById("passwordError").innerHTML =
                    "Password is required";

                hasError = true;

            } else {

                document.getElementById("passwordError").innerHTML = "";

            }


            if (!role) {

                document.getElementById("roleError").innerHTML =
                    "Role is required";

                hasError = true;

            } else {

                document.getElementById("roleError").innerHTML = "";

            }


            if (!hasError) {

                const table = document.getElementById("userTable");

                let row = table.insertRow(-1);

                row.insertCell(0).innerHTML = username;
                row.insertCell(1).innerHTML = fullName;
                row.insertCell(2).innerHTML = nid;
                row.insertCell(3).innerHTML = email;
                row.insertCell(4).innerHTML = phone;
                row.insertCell(5).innerHTML = address;
                row.insertCell(6).innerHTML = role;

                document.forms[0].reset();

            }

            return false;

        }


        function addInventory() {

            const productName =
                document.getElementById("productName").value;

            const quantity =
                document.getElementById("quantity").value;

            const category =
                document.getElementById("category").value;

            const expireDate =
                document.getElementById("expireDate").value;

            const status =
                document.getElementById("status").value;

            let hasError = false;


            if (!productName) {

                document.getElementById("productNameError").innerHTML =
                    "Product Name is required";

                hasError = true;

            } else {

                document.getElementById("productNameError").innerHTML = "";

            }


            if (quantity == "") {

                document.getElementById("quantityError").innerHTML =
                    "Quantity is required";

                hasError = true;

            } else {

                document.getElementById("quantityError").innerHTML = "";

            }


            if (!category) {

                document.getElementById("categoryError").innerHTML =
                    "Category is required";

                hasError = true;

            } else {

                document.getElementById("categoryError").innerHTML = "";

            }


            if (!expireDate) {

                document.getElementById("expireDateError").innerHTML =
                    "Expiry Date is required";

                hasError = true;

            } else {

                document.getElementById("expireDateError").innerHTML = "";

            }


            if (!status) {

                document.getElementById("statusError").innerHTML =
                    "Status is required";

                hasError = true;

            } else {

                document.getElementById("statusError").innerHTML = "";

            }


            if (!hasError) {

                const table =
                    document.getElementById("inventoryTable");

                let row = table.insertRow(-1);

                row.insertCell(0).innerHTML = productName;
                row.insertCell(1).innerHTML = quantity;
                row.insertCell(2).innerHTML = category;
                row.insertCell(3).innerHTML = expireDate;
                row.insertCell(4).innerHTML = status;

                document.forms[1].reset();

            }

            return false;

        }


        function addPatient() {

            const patientName =
                document.getElementById("patientName").value;

            const phone =
                document.getElementById("patientPhone").value;

            const recordTask =
                document.getElementById("recordTask").value;

            let hasError = false;


            if (!patientName) {

                document.getElementById("patientNameError").innerHTML =
                    "Patient Name is required";

                hasError = true;

            } else {

                document.getElementById("patientNameError").innerHTML = "";

            }


            if (!phone) {

                document.getElementById("patientPhoneError").innerHTML =
                    "Phone is required";

                hasError = true;

            } else {

                document.getElementById("patientPhoneError").innerHTML = "";

            }


            if (!recordTask) {

                document.getElementById("recordTaskError").innerHTML =
                    "Record Task is required";

                hasError = true;

            } else {

                document.getElementById("recordTaskError").innerHTML = "";

            }


            if (!hasError) {

                const table =
                    document.getElementById("patientTable");

                let row = table.insertRow(-1);

                row.insertCell(0).innerHTML =
                    table.rows.length - 1;

                row.insertCell(1).innerHTML = patientName;
                row.insertCell(2).innerHTML = phone;
                row.insertCell(3).innerHTML = recordTask;

                document.forms[2].reset();

            }

            return false;

        }


        function addPayment() {

            const patientName =
                document.getElementById("paymentPatientName").value;

            const phone =
                document.getElementById("paymentPhone").value;

            const amount =
                document.getElementById("amount").value;

            const patientSerial =
                document.getElementById("patientSerial").value;

            let hasError = false;


            if (!patientName) {

                document.getElementById("paymentPatientNameError").innerHTML =
                    "Patient Name is required";

                hasError = true;

            } else {

                document.getElementById("paymentPatientNameError").innerHTML = "";

            }


            if (!phone) {

                document.getElementById("paymentPhoneError").innerHTML =
                    "Phone is required";

                hasError = true;

            } else {

                document.getElementById("paymentPhoneError").innerHTML = "";

            }


            if (amount == "") {

                document.getElementById("amountError").innerHTML =
                    "Amount is required";

                hasError = true;

            } else {

                document.getElementById("amountError").innerHTML = "";

            }


            if (!patientSerial) {

                document.getElementById("patientSerialError").innerHTML =
                    "Patient Serial is required";

                hasError = true;

            } else {

                document.getElementById("patientSerialError").innerHTML = "";

            }


            if (!hasError) {

                const table =
                    document.getElementById("paymentTable");

                let row = table.insertRow(-1);

                row.insertCell(0).innerHTML =
                    table.rows.length - 1;

                row.insertCell(1).innerHTML = patientName;
                row.insertCell(2).innerHTML = phone;
                row.insertCell(3).innerHTML = amount;
                row.insertCell(4).innerHTML = patientSerial;

                document.forms[3].reset();

            }

            return false;

        }

    </script>

</head>


<body>

    <div class="container">

        <h1>Smart Healthcare Management System</h1>

        <h2>Admin Dashboard</h2>


        <fieldset>

            <legend>Manage Users</legend>


            <form onsubmit="return addUser();">

                <table>

                    <tr>

                        <td><b>Username:</b></td>

                        <td>
                            <input type="text" id="username">
                        </td>

                        <td>
                            <p id="usernameError"></p>
                        </td>

                    </tr>


                    <tr>

                        <td><b>Full Name:</b></td>

                        <td>
                            <input type="text" id="fullName">
                        </td>

                        <td>
                            <p id="fullNameError"></p>
                        </td>

                    </tr>


                    <tr>

                        <td><b>NID:</b></td>

                        <td>
                            <input type="text" id="nid">
                        </td>

                        <td>
                            <p id="nidError"></p>
                        </td>

                    </tr>


                    <tr>

                        <td><b>Email:</b></td>

                        <td>
                            <input type="text" id="email">
                        </td>

                        <td>
                            <p id="emailError"></p>
                        </td>

                    </tr>


                    <tr>

                        <td><b>Phone:</b></td>

                        <td>
                            <input type="text" id="phone">
                        </td>

                        <td>
                            <p id="phoneError"></p>
                        </td>

                    </tr>


                    <tr>

                        <td><b>Address:</b></td>

                        <td>
                            <input type="text" id="address">
                        </td>

                        <td>
                            <p id="addressError"></p>
                        </td>

                    </tr>


                    <tr>

                        <td><b>Password:</b></td>

                        <td>
                            <input type="password" id="password">
                        </td>

                        <td>
                            <p id="passwordError"></p>
                        </td>

                    </tr>


                    <tr>

                        <td><b>Role:</b></td>

                        <td>

                            <select id="role">

                                <option value="">
                                    Select Role
                                </option>

                                <option value="Admin">
                                    Admin
                                </option>

                                <option value="Moderator">
                                    Moderator
                                </option>

                                <option value="Staff">
                                    Staff
                                </option>

                            </select>

                        </td>

                        <td>
                            <p id="roleError"></p>
                        </td>

                    </tr>


                    <tr>

                        <td></td>

                        <td align="center">

                            <button type="submit">
                                Add User
                            </button>

                        </td>

                    </tr>

                </table>

            </form>

        </fieldset>


        <br>


        <h2>Registered User List</h2>


        <table border="1" id="userTable">

            <tr>

                <th>Username</th>

                <th>Full Name</th>

                <th>NID</th>

                <th>Email</th>

                <th>Phone</th>

                <th>Address</th>

                <th>Role</th>

            </tr>

        </table>


        <br>
        <br>


        <fieldset>

            <legend>Inventory</legend>


            <form onsubmit="return addInventory();">

                <table>

                    <tr>

                        <td><b>Product Name:</b></td>

                        <td>
                            <input type="text" id="productName">
                        </td>

                        <td>
                            <p id="productNameError"></p>
                        </td>

                    </tr>


                    <tr>

                        <td><b>Quantity:</b></td>

                        <td>
                            <input type="number" id="quantity">
                        </td>

                        <td>
                            <p id="quantityError"></p>
                        </td>

                    </tr>


                    <tr>

                        <td><b>Category:</b></td>

                        <td>

                            <select id="category">

                                <option value="">
                                    Select Category
                                </option>

                                <option value="Medicine">
                                    Medicine
                                </option>

                                <option value="Equipment">
                                    Equipment
                                </option>

                                <option value="Other">
                                    Other
                                </option>

                            </select>

                        </td>

                        <td>
                            <p id="categoryError"></p>
                        </td>

                    </tr>


                    <tr>

                        <td><b>Expiry Date:</b></td>

                        <td>
                            <input type="date" id="expireDate">
                        </td>

                        <td>
                            <p id="expireDateError"></p>
                        </td>

                    </tr>


                    <tr>

                        <td><b>Status:</b></td>

                        <td>

                            <select id="status">

                                <option value="">
                                    Select Status
                                </option>

                                <option value="Available">
                                    Available
                                </option>

                                <option value="Low">
                                    Low
                                </option>

                                <option value="Expired">
                                    Expired
                                </option>

                            </select>

                        </td>

                        <td>
                            <p id="statusError"></p>
                        </td>

                    </tr>


                    <tr>

                        <td></td>

                        <td align="center">

                            <button type="submit">
                                Add Inventory
                            </button>

                        </td>

                    </tr>

                </table>

            </form>

        </fieldset>


        <br>


        <h2>Inventory List</h2>


        <table border="1" id="inventoryTable">

            <tr>

                <th>Product Name</th>

                <th>Quantity</th>

                <th>Category</th>

                <th>Expiry Date</th>

                <th>Status</th>

            </tr>

        </table>


        <br>
        <br>


        <fieldset>

            <legend>Patient</legend>


            <form onsubmit="return addPatient();">

                <table>

                    <tr>

                        <td><b>Patient Name:</b></td>

                        <td>
                            <input type="text" id="patientName">
                        </td>

                        <td>
                            <p id="patientNameError"></p>
                        </td>

                    </tr>


                    <tr>

                        <td><b>Phone:</b></td>

                        <td>
                            <input type="text" id="patientPhone">
                        </td>

                        <td>
                            <p id="patientPhoneError"></p>
                        </td>

                    </tr>


                    <tr>

                        <td><b>Record Task:</b></td>

                        <td>

                            <select id="recordTask">

                                <option value="">
                                    Select Task
                                </option>

                                <option value="Checkup">
                                    Checkup
                                </option>

                                <option value="Medicine">
                                    Medicine
                                </option>

                                <option value="Report">
                                    Report
                                </option>

                            </select>

                        </td>

                        <td>
                            <p id="recordTaskError"></p>
                        </td>

                    </tr>


                    <tr>

                        <td></td>

                        <td align="center">

                            <button type="submit">
                                Add Patient
                            </button>

                        </td>

                    </tr>

                </table>

            </form>

        </fieldset>


        <br>


        <h2>Patient List</h2>


        <table border="1" id="patientTable">

            <tr>

                <th>Patient Serial</th>

                <th>Patient Name</th>

                <th>Phone</th>

                <th>Record Task</th>

            </tr>

        </table>


        <br>
        <br>


        <fieldset>

            <legend>Payment</legend>


            <form onsubmit="return addPayment();">

                <table>

                    <tr>

                        <td><b>Patient Name:</b></td>

                        <td>
                            <input type="text" id="paymentPatientName">
                        </td>

                        <td>
                            <p id="paymentPatientNameError"></p>
                        </td>

                    </tr>


                    <tr>

                        <td><b>Phone:</b></td>

                        <td>
                            <input type="text" id="paymentPhone">
                        </td>

                        <td>
                            <p id="paymentPhoneError"></p>
                        </td>

                    </tr>


                    <tr>

                        <td><b>Amount:</b></td>

                        <td>
                            <input type="number" id="amount">
                        </td>

                        <td>
                            <p id="amountError"></p>
                        </td>

                    </tr>


                    <tr>

                        <td><b>Patient Serial:</b></td>

                        <td>
                            <input type="text" id="patientSerial">
                        </td>

                        <td>
                            <p id="patientSerialError"></p>
                        </td>

                    </tr>


                    <tr>

                        <td></td>

                        <td align="center">

                            <button type="submit">
                                Add Payment
                            </button>

                        </td>

                    </tr>

                </table>

            </form>

        </fieldset>


        <br>


        <h2>Payment List</h2>


        <table border="1" id="paymentTable">

            <tr>

                <th>Payment ID</th>

                <th>Patient Name</th>

                <th>Phone</th>

                <th>Amount</th>

                <th>Patient Serial</th>

            </tr>

        </table>


    </div>

</body>

</html>