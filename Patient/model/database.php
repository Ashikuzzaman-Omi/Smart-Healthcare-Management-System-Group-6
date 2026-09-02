<?php 
$conn = mysqli_connect("localhost", "root", "", "smart_healthcare"); 
 
if (!$conn) { 
    die("Database connection failed."); 
} 
 
function checkEmail($email) { 
    global $conn; 
    $sql = "SELECT * FROM patients WHERE email='$email'"; 
    $result = mysqli_query($conn, $sql); 
 
    if (mysqli_num_rows($result) > 0) { 
        return true; 
    } else { 
        return false; 
    } 
} 
 
function registerPatient($name, $email, $password, $phone, $gender, $age) { 
    global $conn; 
    $sql = "INSERT INTO patients (name, email, password, phone, gender, age) 
            VALUES ('$name', '$email', '$password', '$phone', '$gender', '$age')"; 
    return mysqli_query($conn, $sql); 
} 
 
function loginPatient($email, $password) { 
    global $conn; 
    $sql = "SELECT * FROM patients WHERE email='$email' AND password='$password'"; 
    $result = mysqli_query($conn, $sql); 
 
    if (mysqli_num_rows($result) == 1) { 
        return mysqli_fetch_assoc($result); 
    } else { 
        return false; 
    } 
} 
 
function getPatient($id) { 
    global $conn; 
    $sql = "SELECT * FROM patients WHERE id='$id'"; 
    $result = mysqli_query($conn, $sql); 
    return mysqli_fetch_assoc($result); 
} 
 
function searchDoctors($search) { 
    global $conn; 
    $sql = "SELECT * FROM doctors 
            WHERE name LIKE '%$search%' 
            OR specialty LIKE '%$search%'"; 
    return mysqli_query($conn, $sql); 
} 
 
function getDoctor($id) { 
    global $conn; 
    $sql = "SELECT * FROM doctors WHERE id='$id'"; 
    $result = mysqli_query($conn, $sql); 
 
    if (mysqli_num_rows($result) == 1) { 
        return mysqli_fetch_assoc($result); 
    } else { 
        return false; 
    } 
} 
 
function checkDuplicateAppointment($patient_id, $doctor_id, $date, $time) { 
    global $conn; 
    $sql = "SELECT * FROM appointments 
            WHERE patient_id='$patient_id' 
            AND doctor_id='$doctor_id' 
            AND appointment_date='$date' 
            AND appointment_time='$time'"; 
    $result = mysqli_query($conn, $sql); 
 
    if (mysqli_num_rows($result) > 0) { 
        return true; 
    } else { 
        return false; 
    } 
} 
 
function bookAppointment($patient_id, $doctor_id, $date, $time, $reason) { 
    global $conn; 
    $sql = "INSERT INTO appointments 
            (patient_id, doctor_id, appointment_date, appointment_time, reason) 
            VALUES ('$patient_id', '$doctor_id', '$date', '$time', '$reason')"; 
    return mysqli_query($conn, $sql); 
} 
 
function getAppointments($patient_id) { 
    global $conn; 
    $sql = "SELECT appointments.*, doctors.name AS doctor_name, 
            doctors.specialty 
            FROM appointments 
            INNER JOIN doctors ON appointments.doctor_id = doctors.id 
            WHERE appointments.patient_id='$patient_id' 
            ORDER BY appointment_date DESC, appointment_time DESC"; 
    return mysqli_query($conn, $sql); 
} 
 

function getMedicalHistory($patient_id) { 
    global $conn; 
    $sql = "SELECT appointments.*, doctors.name AS doctor_name, 
            doctors.specialty 
            FROM appointments 
            INNER JOIN doctors ON appointments.doctor_id = doctors.id 
            WHERE appointments.patient_id='$patient_id' 
            ORDER BY appointment_date DESC"; 
    return mysqli_query($conn, $sql); 
} 

function updatePatient($id, $name, $phone, $gender, $age) {
    global $conn;

    $sql = "UPDATE patients
            SET name='$name',
                phone='$phone',
                gender='$gender',
                age='$age'
            WHERE id='$id'";

    return mysqli_query($conn, $sql);
}

?>


