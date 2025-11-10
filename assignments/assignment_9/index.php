<?php
$errorMessage = "               ";
$submitMessage = "No records to display.";

require_once 'classes/StickyForm.php';

require_once 'classes/Pdo_methods.php';
$pdo = new PdoMethods();

// grabbed this stuff from the book
// Initialize StickyForm
$stickyForm = new StickyForm();

// Create form configuration
$formConfig = [
    // First name field configuration
    'first_name' => [
        'type' => 'text',
        'regex' => 'name',
        'label' => '*First Name',
        'name' => 'first_name',
        'id' => 'first_name',
        'errorMsg' => null,//if this is set to null then the default error message will appear
        'error' => '',
        'required' => true,
        'value' => ''
    ],

    // Last name field configuration
    'last_name' => [
        'type' => 'text',
        'regex' => 'name',
        'label' => 'Last Name',
        'name' => 'last_name',
        'id' => 'last_name',
        'errorMsg' => 'You must enter a valid last name.',
        'error' => '',
        'required' => false,
        'value' => ''
    ],

    // email field configuration
    'email' => [
        'type' => 'text',
        'regex' => 'email',
        'label' => 'E-mail',
        'name' => 'email',
        'id' => 'email',
        'errorMsg' => 'You must enter a valid email address.',
        'error' => '',
        'required' => true,
        'value' => ''
    ],

    // password field configuration
    'password' => [
        'type' => 'password',
        'regex' => 'password',
        'label' => 'Password',
        'name' => 'password',
        'id' => 'password',
        'errorMsg' => 'You must enter a valid passowrd. Needs 8 characters with 1 letter, 1 number, and 1 special character.',
        'error' => '',
        'required' => true,
        'value' => ''
    ],

    // re-enter password field configuration
    'password2' => [
        'type' => 'password',
        'label' => 'Re-enter Password',
        'name' => 'password2',
        'id' => 'password2',
        'errorMsg' => null,
        'error' => '',
        'required' => true,
        'value' => ''
    ]
];

if (!isset($formConfig['masterStatus'])) {
    $formConfig['masterStatus'] = ['error' => false];
}


if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $formConfig = $stickyForm->validateForm($_POST, $formConfig);

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if (empty($formConfig['password']['error']) && empty($formConfig['password2']['error'])) 
    {

        if ($password !== $password2) 
        {
            $formConfig['password2']['error'] = "Passwords must match.";
            $stickyForm->errors['password2'] = "Passwords must match.";

            $formConfig['masterStatus']['error'] = true;
        }

    }

    if ($formConfig['masterStatus']['error'] === false) 
    { 
        $stickyForm->errors = [];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        

        $checkSql = "SELECT * FROM recordAssignment9 WHERE email_input = :email";
        $bindings = [ [':email', $email, 'str'] ];
        $existing = $pdo->selectBinded($checkSql, $bindings);

        if ($existing)
        {
            $errorMessage = "There is already a record with that email";

            $sql = "SELECT id, first_input, last_input, email_input, password_input FROM recordAssignment9 WHERE email_input = :email;";
            $bindings = [[":email", $email, "str"]];
            $records = $pdo->selectBinded($sql, $bindings);

            $record = $records[0];

            $submitMessage = '<table class="table table-bordered">';
            $submitMessage .= '<thead><tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Password</th></tr></thead><tbody>';

            $submitMessage .= '<td>' . htmlspecialchars($record['first_input']) . '</td>';
            $submitMessage .= '<td>' . htmlspecialchars($record['last_input']) . '</td>';
            $submitMessage .= '<td>' . htmlspecialchars($record['email_input']) . '</td>';
            $submitMessage .= '<td>' . htmlspecialchars($record['password_input']) . '</td>';

        }
        else 
        {
            $errorMessage = "You have been added to the database.";
            $submitMessage = "   ";
            $sql = 'INSERT INTO recordAssignment9 (first_input, last_input, email_input, password_input) VALUES (:firstN, :lastN, :email, :password)';
            $bindings = [[":firstN", $first_name, "str"], [":lastN", $last_name, "str"], [":email", $email, "str"], [":password", $hashed_password, "str"]];
            
            $pdo->otherBinded($sql, $bindings);
            
            $sql = "SELECT id, first_input, last_input, email_input, password_input FROM recordAssignment9 ORDER BY id ASC";
            $records = $pdo->selectBinded($sql, []);

            $submitMessage = '<table class="table table-bordered">';
            $submitMessage .= '<thead><tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Password</th></tr></thead><tbody>';

            foreach ($records as $row) 
            {
                $submitMessage .= '<tr>';
                $submitMessage .= '<td>' . htmlspecialchars($row['first_input']) . '</td>';
                $submitMessage .= '<td>' . htmlspecialchars($row['last_input']) . '</td>';
                $submitMessage .= '<td>' . htmlspecialchars($row['email_input']) . '</td>';
                $submitMessage .= '<td>' . htmlspecialchars($row['password_input']) . '</td>';
                $submitMessage .= '</tr>';
            }
                
            foreach ($formConfig as $key => $field) 
            {
                $formConfig[$key]['value'] = '';
                $formConfig[$key]['error'] = '';
            }
    }
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sticky Form Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
<div class="container mt-5">
<p class="mb-3" style="white-space: pre;"><?php echo htmlspecialchars($errorMessage); ?></p>

    <!-- Main form container -->
    <form method="post" action="index.php">
        
        <!-- Name fields row -->
            <div class="row">
                <!-- First name field -->
                <div class="col-md-6">
                    <?php echo $stickyForm->renderInput($formConfig['first_name'], 'mb-3'); ?>
                </div>
         
                <!-- Last name field -->
                <div class="col-md-6">
                    <?php echo $stickyForm->renderInput($formConfig['last_name'], 'mb-3'); ?>
                </div>
            </div>

            <!-- Email, password, confirm password row -->
            <div class="row">
                <!-- Email field -->
                 <div class="col-md-4">
                    <?php echo $stickyForm->renderInput($formConfig['email'], 'mb-3'); ?>
                </div>

                <!-- Password field -->
                 <div class="col-md-4">
                    <?php echo $stickyForm->renderInput($formConfig['password'], 'mb-3'); ?>
                </div>

                <!-- Re-enter password field -->
                 <div class="col-md-4">
                    <?php echo $stickyForm->renderInput($formConfig['password2'], 'mb-3'); ?>
                </div>

            </div>

            <input type="submit" name="submit" value="Register" class="btn btn-primary">
            </form>

            <p class="mb-3" style="white-space: pre;"><?php echo $submitMessage; ?></p>
            
        </div>
    </body>
</html>