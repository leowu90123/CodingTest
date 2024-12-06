<?php
    $method = "GET";
    $url = "https://api.csdi.gov.hk/apim/dataquery/api/?";
    $data_array = array("id" => "edb_rcd_1629267205213_58940", "layer" => "asfps", "limit" => "10", "offset" => "0");
    $data = json_encode($data_array);

    function callAPI($method, $url, $data){
        $curl = curl_init();
    
        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
    
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            default:
                if (is_array($data)) {
                    $url = sprintf("%s?%s", $url, http_build_query($data));
                }
        }
    
        // Optional Authentication:
        // curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // curl_setopt($curl, CURLOPT_USERPWD, "username:password");
    
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Accept: application/json'));
    
        $result = curl_exec($curl);
    
        curl_close($curl);
    
        return $result;
    }
    $result = callAPI($method, $url, $data);
    $response = json_decode($result, true);
    // echo $errors = $response['response']['errors'];
    // echo $data = $response['response']['data'][0];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+HK:wght@200..900&display=swap" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet" type="text/css">
    <style>
    </style>
</head>
<body>
    <header>
        <div class="header-first">
            <nav class="navbar">
                <a class="navbar-brand">
                <img src="/images/PNG/Logo.png" alt="" style="width: 265.94px; height: 60px; opacity: 0px;">
                </a>

                <form class="d-flex align-items-center">
                    <div class="dropdown">
                        <button type="button" class="lang-btn btn d-flex align-items-center dropdown-toggle" data-bs-toggle="dropdown"><span style="padding-right: 8px;"><i class="icon-lang d-flex align-items-center justify-content-center"></i></span> EN</button>
                        <ul class="dropdown-menu dropdown-menu-center">
                            <li><a class="dropdown-item" href="#">繁</a></li>
                            <li><a class="dropdown-item" href="#">简</a></li>
                        </ul>
                    </div>
                    <button class="left-icon-text-btn btn d-flex align-items-center" type="button">
                        <span><i class="icon-call d-flex align-items-center justify-content-center"></i></span>Contact Us
                    </button>
                    <button class="right-icon-filled-btn btn d-flex align-items-center" type="button">Login <span><i class="icon-login d-flex align-items-center justify-content-center"></i></span>
                    </button>
                </form>
            </nav>
        </div>
        <div class="menu-bar">
            <ul class="nav justify-content-center">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Schools</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Media Highlights</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
            </ul>
        </div>
    </header>

    <div class="hero-image">
        <div class="hero-text">
            <p class="welcome">Welcome to the AIO Study Platform</p>
            <h1 class="h1">All-in-One Platform for Self-Learners</h1>
            <p class="body1">Lorem ipsum dolor sit amet consectetur. Pellentesque velit id sodales et at fermentum. Sed id egestas nec odio sit.</p>
            <button class="right-icon-filled-btn btn d-flex align-items-center" type="button">Read More <span><i class="icon-right-arrow d-flex align-items-center justify-content-center"></i></span>
            </button>
        </div>
    </div>

    <div class="search position-relative">
        <div class="search-panel position-absolute top-0 start-50">
            <div class="position-absolute top-50 start-50 translate-middle align-items-center" style="width: 100%;">
                <form class="d-flex" style="margin-left:82px;">
                    <div class="input-group">
                        <i class="icon-search"></i>
                        <input class="form-control" placeholder="Search School Address" aria-label="Search">
                    </div>
                    <button class="no-icon-filled-btn btn d-flex align-items-center" type="button">Search</button>
                </form>
            </div>
        </div>
    </div>

    <div class="new-courses position-relative" >
        <div class="d-flex align-items-center justify-content-left">
            <h2 class="h2">Popular schools</h2>
            <i class="icon-info d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip"
            data-bs-title="Here is the tooltip for additional information explanation"></i>
        </div>

        <?php
            $numberOfCards = 4;
            for ($n = 1; $n <= $numberOfCards; $n++) {
                echo '<div class="cards-group" id="card_'.$n.'">
                    <div class="card position-relative">
                        <img src="../images/SVG/shortlist.svg" class="shortlist position-absolute top-0 end-0" alt="Shortlist">
                        <div class="card-body">
                            <p class="card-title subtitle">Facility Name</p>
                            <div class="dashed-line"></div>
                            <div class="card-content d-flex justify-content-left">
                                <div class="school-group d-flex">
                                    <img src="../images/PNG/address_image.png" alt="address" style="width: 66px; height: 66%; margin-right: 12px;">
                                    <p class="address-text caption1 d-flex align-items-center justify-content-center">Address Text Here</p>
                                </div>
                                <div class="last-update-group d-flex align-items-center justify-content-center">
                                    <img src="../images/SVG/done.svg" alt="" style="width: 24px; height: 24px;">
                                    <div class="d-flex align-content-stretch flex-wrap">
                                        <p class="last-update-title caption2">Last Updated Date</p>
                                        <p class="last-update-date label2">2023-07-24</p>
                                    </div>
                                </div>
                                <div class="cat-container d-flex align-items-center justify-content-center">
                                    <div class="cat-group d-flex align-items-center justify-content-center">
                                        <canvas class="myCanvas"></canvas>
                                        <p class="cat label2">Higher Education Institutions</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
            }
        ?>
        
        <div class="add-btn-container d-flex align-items-center justify-content-center position-absolute bottom-0 start-50 translate-middle-x">
            <button class="left-icon-outline-btn btn d-flex align-items-center label1" type="button"><span><i class="icon-add d-flex align-items-center justify-content-center"></i></span> More</button>
        </div>
    </div>

    <footer>
        <div class="images-group d-flex align-items-center justify-content-center">
            <img src="../images/PNG/wcag2_1AA.png" style="width: 171px; height: 60px; margin-right: 48px;">
            <img src="../images/PNG/footer_wfa.png" style="width: 111px; height: 60px;">
        </div>
        <div class="d-flex align-items-center justify-content-center">
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item label2">Important Legal Notices</li>
                <li class="list-group-item label2">Sitemap</li>
                <li class="list-group-item label2">Accessibility</li>
            </ul>
        </div>
        <div class="d-flex align-items-center justify-content-center">
            <p class="copyright caption2">Copyright © AIO Study Platform</p>
        </div>
    </footer>

    <div class="fab-content position-fixed bottom-0 end-0 align-items-center">
        <button class="btn d-flex align-items-center" type="button" style="padding: 12px 12px 12px 16px; pointer-events: none; ">
            <span><i class="icon-bookmark d-flex align-items-center justify-content-center"></i></span>
            <span class="label1">My List</span>
        </button>
    </div>

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    </script>
</body>
</html>