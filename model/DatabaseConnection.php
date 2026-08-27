<?php

class DatabaseConnection
{

    function openConnection()
    {
        $db_host = "localhost";
        $db_user = "root";
        $db_password = "";
        $db_name = "smart_healthcare";

        $connection = new mysqli(
            $db_host,
            $db_user,
            $db_password,
            $db_name
        );

        if ($connection->connect_error) {
            die("Database connection failed: " . $connection->connect_error);
        }

        return $connection;
    }


    /* ================= USER ================= */

    function addUser($connection, $username, $full_name, $email, $phone_no, $role)
    {
        $nid = $username;
        $address = "";
        $password = $username;

        $sql = "INSERT INTO users
        (username, full_name, nid, email, address, password, phone_no, role)
        VALUES
        ('$username', '$full_name', '$nid', '$email',
        '$address', '$password', '$phone_no', '$role')";

        return $connection->query($sql);
    }


    function updateUser($connection, $username, $full_name, $email, $phone_no, $role)
    {
        $sql = "UPDATE users SET
        full_name='$full_name',
        email='$email',
        phone_no='$phone_no',
        role='$role'
        WHERE username='$username'";

        return $connection->query($sql);
    }


    function deleteUser($connection, $username)
    {
        $sql = "DELETE FROM users
        WHERE username='$username'";

        return $connection->query($sql);
    }


    /* ================= DOCTOR ================= */

    function addDoctor($connection, $doctor_name, $email, $phone_no, $specialization)
    {
        $sql = "INSERT INTO doctors
        (doctor_name, email, phone_no, specialization)
        VALUES
        ('$doctor_name', '$email', '$phone_no', '$specialization')";

        return $connection->query($sql);
    }


    function updateDoctor($connection, $doctor_id, $doctor_name, $email, $phone_no, $specialization)
    {
        $sql = "UPDATE doctors SET
        doctor_name='$doctor_name',
        email='$email',
        phone_no='$phone_no',
        specialization='$specialization'
        WHERE doctor_id='$doctor_id'";

        return $connection->query($sql);
    }


    function deleteDoctor($connection, $doctor_id)
    {
        $sql = "DELETE FROM doctors
        WHERE doctor_id='$doctor_id'";

        return $connection->query($sql);
    }


    /* ================= MEDICINE ================= */

    function addMedicine($connection, $medicine_name, $quantity, $price, $expiry_date)
    {
        $purchase_date = date("Y-m-d");
        $category = "General";
        $status = "Available";

        $sql = "INSERT INTO inventory
        (product_name, purchase_date, quantity, category, expire_date, status, price)
        VALUES
        ('$medicine_name', '$purchase_date', '$quantity',
        '$category', '$expiry_date', '$status', '$price')";

        return $connection->query($sql);
    }


    function updateMedicine($connection, $id, $medicine_name, $quantity, $price, $expiry_date)
    {
        $sql = "UPDATE inventory SET
        product_name='$medicine_name',
        quantity='$quantity',
        price='$price',
        expire_date='$expiry_date'
        WHERE id='$id'";

        return $connection->query($sql);
    }


    function deleteMedicine($connection, $id)
    {
        $sql = "DELETE FROM inventory
        WHERE id='$id'";

        return $connection->query($sql);
    }


    /* ================= PATIENT ================= */

    function addPatient($connection, $patient_name, $email, $phone_no, $address)
    {
        $record_task_type = "Registration";

        $sql = "INSERT INTO patients
        (patient_name, email, phone_no, address, record_task_type)
        VALUES
        ('$patient_name', '$email', '$phone_no',
        '$address', '$record_task_type')";

        return $connection->query($sql);
    }


    function updatePatient($connection, $patient_serial, $patient_name, $email, $phone_no, $address)
    {
        $sql = "UPDATE patients SET
        patient_name='$patient_name',
        email='$email',
        phone_no='$phone_no',
        address='$address'
        WHERE patient_serial='$patient_serial'";

        return $connection->query($sql);
    }


    function deletePatient($connection, $patient_serial)
    {
        $sql = "DELETE FROM patients
        WHERE patient_serial='$patient_serial'";

        return $connection->query($sql);
    }


    /* ================= PAYMENT ================= */

    function addPayment($connection, $patient_name, $amount, $payment_date, $status)
    {
        $sql = "INSERT INTO payments
        (patient_name, amount, payment_date, status)
        VALUES
        ('$patient_name', '$amount', '$payment_date', '$status')";

        return $connection->query($sql);
    }


    function updatePayment($connection, $payment_id, $patient_name, $amount, $payment_date, $status)
    {
        $sql = "UPDATE payments SET
        patient_name='$patient_name',
        amount='$amount',
        payment_date='$payment_date',
        status='$status'
        WHERE payment_id='$payment_id'";

        return $connection->query($sql);
    }


    function deletePayment($connection, $payment_id)
    {
        $sql = "DELETE FROM payments
        WHERE payment_id='$payment_id'";

        return $connection->query($sql);
    }

}

?>