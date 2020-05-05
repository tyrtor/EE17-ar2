<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Intro till php oop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>intro till php</h1>
        <?php
        class User {
            private $username;

            public function __construct($uname)
            {
                $this->email = $uname;
            }

            public function addEmail($mail){
                $this->email = $mail;
            }
        }

        $user1 = new User("Karim");
        $user1->addEmail("karim@gmail.com");

        $user2 = new User ("Emil");
        $user2->addEmail("emil@mail.com");
        ?>
    </div>
</body>
</html>