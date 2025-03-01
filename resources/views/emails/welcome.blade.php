<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Our Community</title>
    <link href="https://bootswatch.com/5/sketchy/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px; background-color: #f9f9f9;">
        <div class="text-center">
            <h2 class="text-primary">Welcome to Our Community!</h2>
            <p class="lead">We are thrilled to have you on board.</p>
        </div>
        <hr>
        <p>Dear {{ $user->name }}},</p>
        <p>Thank you for joining our community! We are excited to have you with us. Our goal is to provide you with valuable content, support, and a welcoming environment where you can grow and engage with like-minded individuals.</p>
        <p>Here are some quick links to get you started:</p>
        <ul>
            <li><a href="#" class="text-primary">Explore our community</a></li>
            <li><a href="#" class="text-primary">Read our latest updates</a></li>
            <li><a href="#" class="text-primary">Connect with members</a></li>
        </ul>
        <p>If you have any questions, feel free to <a href="#" class="text-primary">reach out to us</a>. We’re always here to help.</p>
        <p>Best Regards,</p>
        <p><strong>Your Community Team</strong></p>
    </div>
</body>
</html>
