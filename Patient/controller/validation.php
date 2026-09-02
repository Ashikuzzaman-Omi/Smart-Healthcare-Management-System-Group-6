<?php
session_start();
include "../model/database.php";

/* Registration Validation */
if (isset($_POST['register'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];

    if ($name == "" || $email == "" || $password == "" || $phone == "" || $gender == "" || $age == "") {
        header("Location: ../view/registration.php?error=Please fill in all fields.");
        exit();
    }

    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../view/registration.php?error=Please enter a valid email.");
        exit();
    }

    else if (strlen($password) < 4) {
        header("Location: ../view/registration.php?error=Password must be at least 4 characters.");
        exit();
    }

    else if ($age < 1 || $age > 120) {
        header("Location: ../view/registration.php?error=Please enter a valid age.");
        exit();
    }

    else {
        $sql = "SELECT * FROM patients WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            header("Location: ../view/registration.php?error=This email is already registered.");
            exit();
        }
        else {
            $sql = "INSERT INTO patients (name, email, password, phone, gender, age)
                    VALUES ('$name', '$email', '$password', '$phone', '$gender', '$age')";

            if (mysqli_query($conn, $sql)) {
                header("Location: ../view/login.php?success=Registration successful. Please login.");
                exit();
            }
            else {
                header("Location: ../view/registration.php?error=Registration failed.");
                exit();
            }
        }
    }
}

/* Login Validation */
if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email == "" || $password == "") {
        header("Location: ../view/login.php?error=Please enter email and password.");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../view/login.php?error=Please enter a valid email.");
        exit();
    }
    else {
        $sql = "SELECT * FROM patients WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $patient = mysqli_fetch_assoc($result);

            $_SESSION['patient_id'] = $patient['id'];
            $_SESSION['patient_name'] = $patient['name'];

            header("Location: ../view/dashboard.php");
            exit();
        }
        else {
            header("Location: ../view/login.php?error=Invalid email or password.");
            exit();
        }
    }
}

/* Appointment Validation */
if (isset($_POST['book'])) {

    if (!isset($_SESSION['patient_id'])) {
        header("Location: ../view/login.php?error=Please login first.");
        exit();
    }

    $patient_id = $_SESSION['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $date = $_POST['appointment_date'];
    $time = $_POST['appointment_time'];
    $reason = $_POST['reason'];

    if ($doctor_id == "" || $date == "" || $time == "" || $reason == "") {
        header("Location: ../view/appointment_booking.php?doctor_id=$doctor_id&error=Please fill in all fields.");
        exit();
    }
    else {
        $sql = "SELECT * FROM doctors WHERE id='$doctor_id'";
        $doctor_result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($doctor_result) == 0) {
            header("Location: ../view/doctor_search.php?error=Invalid doctor selected.");
            exit();
        }
        else if ($date < date("Y-m-d")) {
            header("Location: ../view/appointment_booking.php?doctor_id=$doctor_id&error=Past date is not allowed.");
            exit();
        }
        else {
            $sql = "SELECT * FROM appointments
                    WHERE patient_id='$patient_id'
                    AND doctor_id='$doctor_id'
                    AND appointment_date='$date'
                    AND appointment_time='$time'";

            $appointment_result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($appointment_result) > 0) {
                header("Location: ../view/appointment_booking.php?doctor_id=$doctor_id&error=Duplicate appointment is not allowed.");
                exit();
            }
            else {
                $sql = "INSERT INTO appointments
                        (patient_id, doctor_id, appointment_date, appointment_time, reason)
                        VALUES ('$patient_id', '$doctor_id', '$date', '$time', '$reason')";

                if (mysqli_query($conn, $sql)) {
                    header("Location: ../view/appointment_history.php?success=Appointment booked successfully.");
                    exit();
                }
                else {
                    header("Location: ../view/appointment_booking.php?doctor_id=$doctor_id&error=Appointment booking failed.");
                    exit();
                }
            }
        }
    }
}


if (isset($_POST['update_profile'])) {

    if (!isset($_SESSION['patient_id'])) {

        header("Location: ../view/login.php?error=Please login first.");
        exit();

    }

    $patient_id = $_SESSION['patient_id'];

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];

    if ($name == "" || $phone == "" || $gender == "" || $age == "") {

        header("Location: ../view/edit_profile.php?error=Please fill in all fields.");
        exit();

    }
    else if ($age < 1 || $age > 120) {

        header("Location: ../view/edit_profile.php?error=Please enter a valid age.");
        exit();

    }
    else {

        if (updatePatient($patient_id, $name, $phone, $gender, $age)) {

            $_SESSION['patient_name'] = $name;

            header("Location: ../view/profile.php?success=Profile updated successfully.");
            exit();

        }
        else {

            header("Location: ../view/edit_profile.php?error=Profile update failed.");
            exit();

        }
    }


if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();

    header("Location: ../view/login.php");
    exit();
}
}

?>