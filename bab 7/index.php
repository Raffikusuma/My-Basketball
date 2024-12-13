<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My BASKETBALL</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <h1>MY BASKETBALL</h1>
            </div>
            <div class="login-btn">
                <a href="login.php">
                    <button id="loginBtn" onclick="showtoast">
                        <img src="Generic avatar.png" alt="Login">
                    </button>
                </a>
            </div>
        </div>
    </header>
    
    <section class="hero">
        <div class="container hero-content">
            <img src="download.jpeg" width="800">
            <div class="hero-image">
            </div>
        </div>
    </section>
    
    <script src="bab3.js"></script>

    <div id="toastbox"></div>
    <script>

        let toastbox = document.getElementById('toasbox');

        function showtoast(){
            let toast = document.createElement('div');
            toast.classList.add('toast');
            toast.innerHTML = 'selamat login';
            toastbox.appendChild(toast);
        }
    </script>

</body>
</html>
