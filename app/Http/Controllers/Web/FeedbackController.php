<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests;
use Illuminate\Http\Request;

class FeedbackController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        $to = "4everbut4er@gmail.com";                     // email to which messages from contact form will be delivered
        $subject = "Message from contact form";     // email subject

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // if you are going to add or remove some fields, just add them or remove them from definitions below
            $name = $this->check_input($_POST['name']);
            $email = $this->check_input($_POST['email']);
            $message = $this->check_input($_POST['message']);

            // simple spam prevention - human field must be empty (it's hidden for users) - but robots will fill this field
                $headers = "From: " . $to . "\r\n";
                $headers .= "Reply-To: ". $email . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

                $body = "<html><body>";
                $body .= "<h1>" . $subject . "</h1>";
                $body .= "<p><strong>Имя: </strong>" . $name . "</p>";
                $body .= "<p><strong>Телефон: </strong>" . $email . "</p>";
                $body .= "<p>" . strip_tags($message) . "</p>";
                $body .= "</body></html>";

                if (!empty($to) && !empty($subject) && !empty($name) && !empty($message)) {
                    mail($to, $subject, $body, $headers);
                    return ("success");
                }
        }
        return 'fail';
    }

    public function check_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = strip_tags($data);
        return $data;
    }
}
