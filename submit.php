<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit-form</title>
</head>
<body>
    <h1>Simple PHP Form</h1>

    <?php
    // Initialize variables
    $name = $email = $error = "";

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["mobile_no"]) || empty($_POST["project"])) {
            $error = "All fields are required!";
        } else {
            $name = htmlspecialchars($_POST["name"]);
            $email = htmlspecialchars($_POST["email"]);
            $mobile_no = htmlspecialchars($_POST["mobile_no"]);
            $project = htmlspecialchars($_POST["project"]);

            // Validate email format
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "Invalid email format!";
            }
        }
    }
    ?>

    <!-- Display error if exists -->
    <?php if ($error): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <!-- Display the form -->
    <form method="POST" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>"><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>"><br><br>

        <label for="mobile_no">Mobile_no:</label>
        <input type="number_format" id="mobile" name="mobile_no" value="<?php echo $mobile_no; ?>"><br><br>

        <label for="your_message">Your Message :</label>
        <input type="text" id="your mesaage" name="message" value="<?php echo $name; ?>"><br><br>

        <button type="submit">Submit</button>
    </form>

    <!-- Display submitted data -->
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !$error): ?>
        <h2>Submitted Data:</h2>
        <p><strong>Name:</strong> <?php echo $name; ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <p><strong>Mobile_no:</strong> <?php echo $mobile_no; ?></p>
        <p><strong>Your Message:</strong> <?php echo $your_message; ?></p>
        
    <?php endif; ?>
</body>
</html>
