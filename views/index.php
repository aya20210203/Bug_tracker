<!DOCTYPE html>
<html lang="en">

<head>
    <title>main page</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="Admin/css/blank.css">
    <link rel="stylesheet" href="Admin/css/main.css">
</head> 

<body>

<!-- Hedear -->
<nav>
    <label class="logo">Bug Tracking</label>
    <ul>
        <li><a href="registeration/index.php" class="active">Login</a></li>
        <li><a href="#about" class="active">About us</a></li>
    </ul>
</nav>
<style>
    nav{
        background:var(--main-color);
        height: 80px;
        width: 100%;
    }
    label.logo{
        color: var(--secondary-color);
        font-size: 35px;
        line-height: 80px;
        padding: 0 100px;
        font-weight: bold;
    }
    nav ul{
        float: right;
        margin-right: 20px;
    }
    nav ul li{
        display: inline-block;
        line-height: 80px;
        margin: 0 5px;
    }
    nav ul li a{
        color: var(--main-color);
        font-size: 17px;
        text-transform: uppercase;
        padding: 7px 13px;
        border-radius: 3px;
        text-decoration: none;
    }
    a.active,
    a:hover{
        background-color: var(--secondary-color);
        transition: .5s;
        text-decoration:none;
    }
</style>
<!-- End of Hedear -->
    <div class="landing">
        <div class="intro-text">
            <h1>Hello There!</h1>
            <h4>Welcome to Bug Tracker - Super Creative bug tracking application</h4>
        </div>
    </div>
    <div class="features">
        <div class="container1">
            <div class="feat">
                <i class="fa-solid fa-share"></i>
                <h3>Email Notifications</h3>
                <p>Keep your team and clients updated with notifications on issue updates, resolution, or comments.</p>
            </div>
            <div class="feat">
                <i class="fa-sharp fa-solid fa-gears"></i>
                <h3>Access Control</h3>
                <p>Per project role based access control for users putting you in control of your business.</p>
            </div>
            <div class="feat">
                <i class="fa-solid fa-ruler-horizontal"></i>
                <h3>Customizable</h3>
                <p>Flexibility to customize your issue fields, notifications and workflow.</p>
            </div>
        </div>
    </div>
    <div class="services" id="services">
        <div class="container1">
            <h2 class="special-heading1">Best services, Best developers</h2>
            <div class="services-content">
                <div class="col1">
                    <div class="srv">
                        <i class="fa-solid fa-list-check"></i>
                        <div class="text">
                            <h3>Manage projects</h3>
                            <p>Project management is the process of leading the work of a team to achieve all project goals within the given constraints.</p>
                        </div>
                    </div>
                    <div class="srv">
                        <i class="fa-solid fa-bug-slash"></i>
                        <div class="text">
                            <h3>Quick bug fix</h3>
                            <p>A bug fix is simply the fix to a bug: the set of modifications to the software system that would correct the fault.</p>
                        </div>
                    </div>
                </div>
                <div class="col1">
                    <div class="srv">
                        <i class="fa-solid fa-lightbulb"></i>
                        <div class="text">
                            <h3>Smart developement</h3>
                            <p>Smart development means taking advantage of existing and future redevelopment opportunities</p>
                        </div>
                    </div>
                    <div class="srv">
                        <i class="fa-solid fa-regular fa-bars-progress"></i>
                        <div class="text">
                            <h3>Follow bug-case-flow</h3>
                            <p>way to capture your software issues, prioritize them, assign them to a team member, and track progress.</p>
                        </div>
                    </div>
                </div>
                <div class="col1">
                    <div class="image">
                        <img src="Admin/img/services.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about" id="about">
        <div class="container1">
            <h2 class="special-heading1">About Us</h2>
            <div class="about-content">
            <div class="image">
                <img src="Admin/img/bug_track.png" alt=""> 
            </div> 
            <div class="text">
                <p>A bug tracking system or is a software application that keeps track of reported software bugs in software development projects. 
                    It may be regarded as a type of issue tracking system.</p>
                <hr>
                <p>Many bug tracking systems, such as those used by most open-source software projects, allow end-users to enter bug reports directly. Other systems are used only internally in a company or organization doing software development. 
                    Typically bug tracking systems are integrated with other project management software.</p>
            </div>
        </div>
    </div>
</body>

</html>