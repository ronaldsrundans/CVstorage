<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$firstname = $lastname = $email = $phone = $school = $faculty = $edulevel = $statuss = $workplace = "";
$firstname_err = $lastname_err = $email_err = $phone_err = $school_err = $faculty_err = $edulevel_err = $statuss_err = $workplace_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_firstname = trim($_POST["firstname"]);
    if(empty($input_firstname)){
        $firstname_err = "Please enter a first name.";
    
    } else{
        $firstname = $input_firstname;
    }
     // Validate name
     $input_lastname = trim($_POST["lastname"]);
     if(empty($input_lastname)){
         $lastname_err = "Please enter a last name.";
      
     } else{
         $lastname = $input_lastname;
     }
    
    // Validate email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter an email.";     
    } else{
        $email = $input_email;
    }
    
    // Validate phone
    $input_phone = trim($_POST["phone"]);
    if(empty($input_phone)){
        $phone_err = "Please enter the phone number.";     
    } elseif(!ctype_digit($input_phone)){
        $phone_err = "Please enter a valid phone number.";
    } else{
        $phone = $input_phone;
    }
    
    // Check input errors before inserting in database
    if(empty($firstname_err) && empty($lastname_err) && empty($email_err) && empty($phone_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO persons (firstname, lastname, email, phone) VALUES (?,?,?,?)";
 
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssss", $param_firstname, $param_lastname, $param_email, $param_phone);
            
            // Set parameters
            $param_firstname = $firstname;
            $param_lastname = $lastname;
            $param_email = $email;
            $param_phone = $phone;
            $param_school = $school;
            $param_faculty = $faculty;
            $param_edulevel =  $edulevel;
            $param_statuss =  $statuss; 
            $param_workplace = $workplace;
         
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $conn->close();
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create CV Record</h2>
                    </div>
                    <p>Please fill this form and submit to add CV record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <h3>Personal information</h3>
                        <div class="form-group <?php echo (!empty($firstname_err)) ? 'has-error' : ''; ?>">
                            <label>First Name</label>
                            <input type="text" name="firstname" class="form-control" value="<?php echo $firstname; ?>">
                            <span class="help-block"><?php echo $firstname_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($lastname_err)) ? 'has-error' : ''; ?>">
                            <label>Last Name</label>
                            <input type="text" name="lastname" class="form-control" value="<?php echo $lastname; ?>">
                            <span class="help-block"><?php echo $lastname_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <textarea name="email" class="form-control"><?php echo $email; ?></textarea>
                            <span class="help-block"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>">
                            <span class="help-block"><?php echo $phone_err;?></span>
                        </div>
                        
                        <h3>Education</h3>

                        <div class="form-group <?php echo (!empty($school_err)) ? 'has-error' : ''; ?>">
                            <label>School</label>
                            <input type="text" name="school" class="form-control" value="<?php echo $school; ?>">
                            <span class="help-block"><?php echo $school_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($faculty_err)) ? 'has-error' : ''; ?>">
                            <label>Faculty</label>
                            <input type="text" name="faculty" class="form-control" value="<?php echo $faculty; ?>">
                            <span class="help-block"><?php echo $faculty_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($edulevel_err)) ? 'has-error' : ''; ?>">
                            <label>Education level</label>
                            <input type="text" name="edulevel" class="form-control" value="<?php echo $edulevel; ?>">
                            <span class="help-block"><?php echo $edulevel_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($statuss_err)) ? 'has-error' : ''; ?>">
                            <label>Statuss</label>
                            <input type="text" name="statuss" class="form-control" value="<?php echo $statuss; ?>">
                            <span class="help-block"><?php echo $statuss_err;?></span>
                        </div>
                        
                        <h3>Work experience</h3>

                        <div class="form-group <?php echo (!empty($workplace_err)) ? 'has-error' : ''; ?>">
                            <label>Workplace</label>
                            <input type="text" name="workplace" class="form-control" value="<?php echo $workplace; ?>">
                            <span class="help-block"><?php echo $workplace_err;?></span>
                        </div>




                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>