<?php
session_start();

if(isset($_SESSION['email'])) {
    ?>
    <html>
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="styles/shards-dashboards.1.1.0.min.css">
        <link rel="stylesheet" href="styles/extras.1.1.0.min.css">
        <style>
            .success-message {
            text-align: center;
            max-width: 500px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            }

            .success-message__icon {
            max-width: 75px;
            }

            .success-message__title {
            color: #51bb7b;
            transform: translateY(25px);
            opacity: 0;
            transition: all 200ms ease;
            }
            .active .success-message__title {
            transform: translateY(0);
            opacity: 1;
            }

            .success-message__content {
            color: #B8BABB;
            transform: translateY(25px);
            opacity: 0;
            transition: all 200ms ease;
            transition-delay: 50ms;
            }
            .active .success-message__content {
            transform: translateY(0);
            opacity: 1;
            }

            .icon-checkmark circle {
            fill: #51bb7b;
            transform-origin: 50% 50%;
            transform: scale(0);
            transition: transform 200ms cubic-bezier(0.22, 0.96, 0.38, 0.98);
            }
            .icon-checkmark path {
            transition: stroke-dashoffset 350ms ease;
            transition-delay: 100ms;
            }
            .active .icon-checkmark circle {
            transform: scale(1);
            }

        </style>
        <body>
            
            <div class="success-message">
                <svg viewBox="0 0 76 76" class="success-message__icon icon-checkmark">
                    <circle cx="38" cy="38" r="36"/>
                    <path fill="none" stroke="#FFFFFF" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M17.7,40.9l10.9,10.9l28.7-28.7"/>
                </svg>
                <h1 class="success-message__title">Registration Successful!</h1>
                <div class="success-message__content">
                    <p>We have sent you a verification email. Please check your email</p>
                    <a class="btn btn-sm btn-primary" href="login.php">Click here to Login.</a>
                </div>
            </div>
            <script>
                function PathLoader(el) {
                this.el = el;
                this.strokeLength = el.getTotalLength();
                
                // set dash offset to 0
                this.el.style.strokeDasharray =
                this.el.style.strokeDashoffset = this.strokeLength;
            }

            PathLoader.prototype._draw = function (val) {
                this.el.style.strokeDashoffset = this.strokeLength * (1 - val);
            }

            PathLoader.prototype.setProgress = function (val, cb) {
                this._draw(val);
                if(cb && typeof cb === 'function') cb();
            }

            PathLoader.prototype.setProgressFn = function (fn) {
                if(typeof fn === 'function') fn(this);
            }

            var body = document.body,
                svg = document.querySelector('svg path');

            if(svg !== null) {
                svg = new PathLoader(svg);
                
                setTimeout(function () {
                    document.body.classList.add('active');
                    svg.setProgress(1);
                }, 200);
            }
            </script>
        </body>
    </html>
    <?php
} else {
    header("Location: register.php");
    exit();
}
?>

