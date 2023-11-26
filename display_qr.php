<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Display</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: black;
        }

        video {
            position: fixed;
            right: 1;
            bottom: 10;
            width: 60%;
            height: 60%;
            z-index: -1;
        }

        div {
            margin-bottom: 20px;
        }

        img {
            max-width: 100%;
            height: auto;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

       /* Add these styles to your existing CSS */
nav {
    position: fixed;
    z-index: 10;
    left: 0;
    right: 0;
    top: 0;
    padding: 0 4%;
    height: 77px;
    width: 100%;
    display: flex;
}

.logo img {
    width: 55%;
    margin-left: -10%;
    margin-right: 270px;
    margin-top: 1px;
    display: block;
    border: none;
}

nav .links {
    float: right;
    padding: 0;
    margin: 0;
    width: 160%;
    height: 100%;
    display: flex;
    justify-content: space-around;
    align-items: center;
}

nav .links a:hover {
    color: white; /* Change text color to white on hover */
}

.neon-text {
    position: relative;
    display: inline-block;
    font-size: 24px;
    color: #03e9f4;
}

.neon-text::before {
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, #000, #000);
    border-radius: 5px;
    z-index: -1;
    opacity: 0.0; /* Adjust the opacity as needed */
    pointer-events: none; /* Ensure the pseudo-element does not interfere with clicks */
    box-shadow: 0 0 5px #03e9f4, 0 0 10px #03e9f4, 0 0 50px #03e9f4, 0 0 10px #03e9f4;
}

/* Add hover effect if needed */
.neon-text:hover::before {
    opacity: 1;
}

nav .links a:hover::before {
    display: block;
}

nav .links a {
    position: relative;
    display: inline-block;
}

nav .links a:hover::before {
    height: 100%;
}

nav .links li {
    list-style: none;
}

nav .links a {
    display: block;
    padding: 1em;
    font-size: 16px;
    font-weight: bold;
    color: #ffffff;
    text-decoration: none;
}

#nav-toggle {
    position: absolute;
    top: -100px;
}

nav .icon-burger {
    display: none;
    position: absolute;
    right: 5%;
    top: 50%;
    transform: translateY(-50%);
}

nav .icon-burger .line {
    width: 10px;
    height: 5px;
    background-color: #ffffff;
    margin: 5px;
    border-radius: 3px;
    transition: all .3s ease-in-out;
}

@media screen and (max-width: 768px) {
    nav {
        height: 10%;
        width: 100%;
    }

    .logo img {
        height: 150%;
        width: 50%;
        margin-top: 1px;
        margin-left: -50px;
    }

    nav .links {
        float: none;
        position: fixed;
        z-index: 0;
        left: 0;
        right: 0;
        top: 1px;
        bottom: 100%;
        width: auto;
        height: auto;
        flex-direction: column;
        justify-content: space-evenly;
        background-color: rgba(13, 12, 12, 5.8);
        overflow: hidden;
        box-sizing: border-box;
        transition: all .2s ease-in-out;
    }

    nav .links a {
        font-size: 25px;
        padding: 1em;
    }

    nav :checked ~ .links {
        bottom: 0;
    }

    nav .icon-burger {
        display: block;
        height: 10px;
        width: auto;
        top: 30%;
        left: 90%;
    }

    nav .icon-burger .line {
        width: 30px;
        height: 5px;
    }

    nav :checked ~ .icon-burger .line:nth-child(1) {
        transform: translateY(19px) rotate(225deg);
    }

    nav :checked ~ .icon-burger .line:nth-child(3) {
        transform: translateY(-1px) rotate(-225deg);
    }

    nav :checked ~ .icon-burger .line:nth-child(2) {
        opacity: 0;
    }
}

    </style>
</head>
<body>

<nav>
    <input id="nav-toggle" type="checkbox">
    <div class="logo">
        <a href="index.html" class="logo">
            <img src="Assests/logo.gif" alt="logo">
        </a>
    </div>
    <ul class="links">
        <li><a href="index.html" class="neon-text">HOME</a></li>
        <li><a href="all_events.html" class="neon-text">EVENTS</a></li>
        <li><a href="virtual.html" class="neon-text">VIRTUAL TOUR</a></li>
        <li><a href="index_gallery.html" class="neon-text">GALLERY</a></li>
        <li><a href="registration_page.html" class="neon-text">REGISTER</a></li>
    </ul>
    <label for="nav-toggle" class="icon-burger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </label>
</nav>

<video autoplay muted loop id="bg-video">
    <source src="neonbg.mp4" type="video/mp4">
</video>

<?php
if (isset($_GET['qrData'])) {
    $qrData = $_GET['qrData'];
    $url = "https://chart.googleapis.com/chart?cht=qr&chs=200x200&chl=" . urlencode($qrData);
    ?>
    <div>
        <img src="<?= $url ?>" alt="QR Code">
    </div>
    <div>
        <button onclick="downloadQR()">Download QR Code</button>
    </div>
    <script>
        function downloadQR() {
            fetch('<?= $url ?>')
                .then(response => response.blob())
                .then(blob => {
                    const url = window.URL.createObjectURL(new Blob([blob]));
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = 'qrcode.png';
                    document.body.appendChild(a);
                    a.click();
                    window.URL.revokeObjectURL(url);
                })
                .catch(error => console.error('Error downloading QR code:', error));
        }
    </script>
    <?php
} else {
    echo "QR Code data not provided.";
}
?>
</body>
</html>
