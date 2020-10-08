<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$Fname = $Lname = $Email =$Phone= "";
$Fname_err = $Lname_err = $Email_err =$Phone_err= "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_Fname = trim($_POST["Fname"]);
    if(empty($input_Fname)){
        $Fname_err = "Please enter a first name.";
    } elseif(!filter_var($input_Fname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $Fname_err = "Please enter a valid first name.";
    } else{
        $Fname = $input_Fname;
    }
     // Validate name
     $input_Lname = trim($_POST["Lname"]);
     if(empty($input_Lname)){
         $Lname_err = "Please enter a last name.";
     } elseif(!filter_var($input_Lname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
         $Lname_err = "Please enter a valid last name.";
     } else{
         $Lname = $input_Lname;
     }
    
    // Validate address
    $input_Email = trim($_POST["Email"]);
    if(empty($input_Email)){
        $Email_err = "Please enter an Email.";     
    } else{
        $Email = $input_Email;
    }
    
    // Validate salary
    $input_Phone = trim($_POST["Phone"]);
    if(empty($input_Phone)){
        $Phone_err = "Please enter the phone number.";     
    } elseif(!ctype_digit($input_Phone)){
        $Phone_err = "Please enter a valid phone number.";
    } else{
        $Phone = $input_Phone;
    }
    
    // Check input errors before inserting in database
    if(empty($Fname_err) && empty($Lname_err) && empty($Email_err) && empty($Phone_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO Persons (Fname, Lname, Email, Phone) VALUES (?,?,?,?)";
 
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssss", $param_Fname, $param_Lname, $param_Email, $param_Phone);
            
            // Set parameters
            $param_Fname = $Fname;
            $param_Lname = $Lname;
            $param_Email = $Email;
            $param_Phone = $Phone;
            
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
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($Fname_err)) ? 'has-error' : ''; ?>">
                            <label>First Name</label>
                            <input type="text" name="Fname" class="form-control" value="<?php echo $Fname; ?>">
                            <span class="help-block"><?php echo $Fname_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($Lname_err)) ? 'has-error' : ''; ?>">
                            <label>Last Name</label>
                            <input type="text" name="Lname" class="form-control" value="<?php echo $Lname; ?>">
                            <span class="help-block"><?php echo $Lname_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($Email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <textarea name="Email" class="form-control"><?php echo $Email; ?></textarea>
                            <span class="help-block"><?php echo $Email_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($Phone_err)) ? 'has-error' : ''; ?>">
                            <label>Phone</label>
                            <input type="text" name="Phone" class="form-control" value="<?php echo $Phone; ?>">
                            <span class="help-block"><?php echo $Phone_err;?></span>
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