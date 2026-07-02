<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BOOTSTRAP MIN CSS  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap.min.css">

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- MEANMENU MIN CSS -->
    <link rel="stylesheet" href="meanmenu.min.css">

    <!-- NICE_SELECT MIN CSS  -->
    <link rel="stylesheet" href="nice-select.min.css">

    <!-- ODOMETER MIN CSS-->
    <link rel="stylesheet" href="odometer.min.css">

    <!-- STYLE CSS  -->
    <link rel="stylesheet" href="style.css">

    <!-- RESPONSIVE MIN CSS  -->
    <link rel="stylesheet" href="responsive.min.css">

    <title>Contact Us</title>
</head>

<body>
    <!-- START PAGE TITLE AREA  -->
    <div class="page-title-area">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light glass">
                <div class="container">
                    <a class="navbar-brand" href="../user_d/index1.php" style="color: #000;">Vaccinations</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
        
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="../user_p/patient.php">Patient list</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="ContactUs.php">Contact Us</a>
                            </li>
                            <li class="nav-item">
                                <!-- <a class="nav-link" href="../appointment/index.php">Login</a> -->
                            </li>
                        </ul>
        
                        <form class="form-inline my-3 my-lg-0">
                            <a href="../Login.php" class="btn btn-danger ml-lg-2" style="margin-left: 2rem;">login</a>
                        </form>
                    </div>
                </div>
            </nav>
            <div class="page-title-content" style="margin-right: 20em;">
                <h1>Contact Us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="index.html">Contact Us</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END PAGE TITLE AREA  -->

    <!-- START CONTACT AREA -->
    <section class="contact-form-area ptb-70">
        <div class="container">
            <div class="section-title" style="margin-bottom: 5rem; margin-right: 26em;">
                <h2>Get In Touch</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="get-in-touch">
                        <h3>Contact Us</h3>
                        <ul>
                            <li>
                                <div class="icon">
                                    <i class="bx bx-location-plus"></i>
                                </div>
                                <span>Address:</span>

                                124 Western Road, MacLeay Island QLD, Australia

                            </li>

                            <li>
                                <div class="icon">
                                    <i class="bx bx-envelope"></i>
                                </div>
                                <span>Email:</span>

                                hello@example.com

                            </li>

                            <li>
                                <div class="icon">
                                    <i class="bx bx-phone-call"></i>
                                </div>
                                <span>Phone:</span>

                                +1 (514) 312-6677

                            </li>
                        </ul>
                        <div class="contact-map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3535.02560011993!2d153.34829181506035!3d-27.623723782826637!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b916f83ff49ce55%3A0x974857d5f6dd6fcd!2s124%20Western%20Rd%2C%20MacLeay%20Island%20QLD%204184%2C%20Australia!5e0!3m2!1sen!2sbd!4v1645960528528!5m2!1sen!2sbd"
                                width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="contact-form">
                        <h3>Drop Us A Message</h3>
                        <form action="" method="post">
                            <div class="row">
                                <div class="contact-form-col col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Your Name</label>
                                        <input type="text" name="name" id="name" class="form-control" required
                                            data-error="Please enter your name" placeholder="Name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="contact-form-col col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Your Email</label>
                                        <input type="text" name="name" id="name" class="form-control" required
                                            data-error="Please enter your name" placeholder="Email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="contact-form-col col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Your Subject</label>
                                        <input type="text" name="name" id="name" class="form-control" required
                                            data-error="Please enter your name" placeholder="Subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="contact-form-col col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Your Message</label>
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="8"
                                            required data-error="Write Your Message" placeholder="Message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="contact-form-col col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn">
                                        Send Message
                                    </button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix">

                                    </div>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
</body>

</html>