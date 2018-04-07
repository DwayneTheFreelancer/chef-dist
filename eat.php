<?php 

$unfilled = "<h4>All fields required</h4>";

// Check for header injections
function has_header_injections($str) {
    return preg_match( "/[\r\n]/", $str );
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = trim(filter_input(INPUT_POST, "first_name", FILTER_SANITIZE_STRING));
    $lastName = trim(filter_input(INPUT_POST, "last_name", FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
    $msg = trim(filter_input(INPUT_POST, "message", FILTER_SANITIZE_SPECIAL_CHARS));

    // Check to see if $name, $email, $have header injections
    if(has_header_injections($name) || has_header_injections($email)) {
        die(); // If true, kill the script  
    }

    if($name == "" || $email == "" || $message == "") {
        echo "Please fille in all the required fields: Name, Email, Message";
        exit;
    }
}

include("inc/header.php"); ?>

        <div class="container info">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Get in touch.</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada ac ipsum dapibus porta. Praesent et posuere quam. In ullamcorper fringilla nisi faucibus varius. Mauris at risus varius, vulputate lectus in, sollicitudin massa. Donec at laoreet risus. Curabitur egestas imperdiet magna, a tristique massa iaculis quis. Curabitur ac sagittis lectus, quis interdum ante. Mauris volutpat condimentum pellentesque. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                </div>
                <div class="col-sm-6 form1">
                    <form action="eat.php" method="POST">
                        <table>
                            <tr>
                                <td>
                                    <th><label for="first_name">First Name:</label></th>
                                    <input type="text" name="first_name" id="first_name">
                                    <th><label for="last_name">Last Name:</label></th>
                                    <input type="text" name="last_name" id="last_name">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <th><label for="email">Email Address:</label></th>
                                    <input type="email" id="email">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <th><label for="message">Message*</label></th>
                                    <textarea name="message" id="message"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="submit" id="submit">Submit</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="container main-about">
                    <img src="img/pic3.jpg" alt="..." height="800px" width="100%">
                </div>
            </div>
        </div>

<?php include("inc/footer.php"); ?>