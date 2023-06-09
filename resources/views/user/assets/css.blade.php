    <!-- Additional CSS Files -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://kit.fontawesome.com/495c8b4cb1.css" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="user/assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="user/assets/css/font-awesome.css">

    <link rel="stylesheet" href="user/assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="user/assets/css/owl-carousel.css">

    <link rel="stylesheet" href="user/assets/css/lightbox.css">

    <!-- Cart Styles -->
    <link rel="stylesheet" href="user/assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="user/assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="user/assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="user/assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="user/assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="user/assets/css/style.css" type="text/css">

    <style>
        .popups {
            border: 1px solid #efefef;
            background: #fff;
            margin: 0;
            padding: 30px 15px;
            box-shadow: 0 6px 12px 0 rgb(0 0 0 / 18%);
            border-radius: 15px;
        }

        .popups li a {
            border: 1px solid #4c4a4a;
            margin-bottom: 10px;
            border-radius: 30px;
            align-items: center;
            font-size: 13px;
            font-weight: 700;
            padding: 0 !important;
            display: flex !important;
            justify-content: center !important;

        }

        .nav .search {
            background-color: rgb(239 239 239);
            width: 300px;
            height: 34px;
            padding: 3px 16px;
            font-size: 16px;
            border-radius: 8px;
            box-sizing: border-box;
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            margin-right: 40px;
        }

        .nav .search input {
            flex: 1;
            color: rgb(38, 38, 38);
            border: none;
            background-color: transparent;
        }

        .nav .search i {
            margin-left: 12px;
        }

        .nav .search button {
            border: none;
        }
    </style>
    <!-- add to cart  -->
    <style>
        .cart-button {
            margin-left: 30px;
            position: relative;
            padding: 10px;
            width: 150px;
            height: 50px;
            border: 1px solid;
            border-radius: 10px;
            background-color: #fff;
            outline: none;
            cursor: pointer;
            color: black;
            transition: .3s ease-in-out;
            overflow: hidden;
        }

        .cart-button:active {
            transform: scale(.9);
        }

        .cart-button .fa-shopping-cart {
            position: absolute;
            z-index: 2;
            top: 50%;
            left: -15%;
            font-size: 2em;
            transform: translate(-50%, -50%);
        }

        .cart-button .fa-box {
            position: absolute;
            z-index: 3;
            top: -20%;
            left: 52%;
            font-size: 1.2em;
            transform: translate(-50%, -50%);
        }

        .add_to_cart,
        .added {
            margin-top: 0px !important;
            color: black !important;
        }

        .cart-button span {
            position: absolute;
            z-index: 3;
            left: 50%;
            top: 50%;
            font-size: 1.2em;
            color: #fff;
            transform: translate(-50%, -50%);
        }

        .cart-button span.add_to_cart {
            opacity: 1;
        }

        .cart-button span.added {
            opacity: 0;
        }

        .cart-button.clicked .fa-shopping-cart {
            animation: cart 1.5s ease-in-out forwards;
        }

        .cart-button.clicked .fa-box {
            animation: box 1.5s ease-in-out forwards;
        }

        .cart-button.clicked span.add_to_cart {
            animation: txt1 1.5s ease-in-out forwards;
        }

        .cart-button.clicked span.added {
            animation: txt2 1.5s ease-in-out forwards;
        }

        @keyframes cart {
            0% {
                left: -10%;
            }

            40%,
            60% {
                left: 50%;
            }

            100% {
                left: 115%;
            }
        }

        @keyframes box {

            0%,
            40% {
                top: -20%;
            }

            60% {
                top: 40%;
                left: 52%;
            }

            100% {
                top: 40%;
                left: 115%;
            }
        }

        @keyframes txt1 {
            0% {
                opacity: 1;
            }

            20%,
            100% {
                opacity: 0;
            }
        }

        @keyframes txt2 {

            0%,
            80% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }



        .main-banner .left-content .inner-content {
            top: 70%;
            left: 38%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>

    <!-- payment -->

    <style>
        .like span {
            margin-right: 15px;
        }

        .liked-icon {
            color: red;
            cursor: pointer;
        }

        .like-prd {
            cursor: pointer;
        }

        .liked-icon button {
            background-color: transparent;
            border: none;
        }


        .sub-body {
            background: #FFFFFF;
            border-radius: 20px;
            box-shadow: 0 10px 30px 5px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
            overflow: hidden;
            transition: all 0.2s;
            width: 540px;
        }

        .header-pay {
            background: #2B0F5D;
            color: #A27BE9;
            padding: 24px 0 21px;
            text-align: center;
        }

        .price {
            color: #FFFFFF;
            display: flex;
            margin: 0 0 12px;
            align-items: center;
            justify-content: center;
        }

        .price__dollar,
        .price__time {
            font-size: 16px;
            margin: 0 8px;
        }

        .desc {
            font-family: "Bitter", serif;
            margin: 0;
        }

        .pay-select {
            background: #F3F3F3;
            display: flex;
            font-size: 13px;
            padding: 24px 0;
            text-align: center;
            justify-content: space-around;
        }

        .pay-select .pay-select--card,
        .pay-select .pay-select--paypal {
            position: relative;
        }

        .pay-select .is-active:after {
            border-bottom: 10px solid #FFFFFF;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            bottom: -24px;
            content: " ";
            height: 0;
            left: 50%;
            margin-left: -5px;
            position: absolute;
            width: 0;
        }

        .pay-select p {
            margin: 0;
        }

        .pay-select__item {
            width: 48%;
        }

        .pay-select__item:hover {
            cursor: pointer;
        }

        .separator {
            background: #BABABA;
            height: 60px;
            width: 1px;
        }

        .select-body {
            padding: 32px;
            text-align: center;
        }

        .select-body--paypal {
            text-align: center;
        }

        label {
            display: block;
            font-family: "Bitter", serif;
            font-size: 12px;
            letter-spacing: 1px;
            margin-bottom: 4px;
            text-align: left;
            text-transform: uppercase;
        }

        .select-body__content {
            height: 0;
            opacity: 0;
            overflow: hidden;
            transform: translateY(30px);
            transition: visibility 0.3s, opacity 0.3s ease, height 0.3s ease 0.3s, transform 0.2s ease 0.2s;
            visibility: hidden;
            display: none;
        }

        .select-body__content.is-active {
            height: 380px;
            opacity: 1;
            transform: none;
            transition: visibility 0.3s, opacity 0.3s ease, height 0.3s ease 0.3s, transform 0.2s ease;
            visibility: visible;
            display: block;
        }

        .select-body__content.is-active.select-body--paypal {
            height: 80px;
        }

        .card-input {
            border: 1px solid #ECECEC;
            font-family: "Montserrat", sans-serif;
            height: 32px;
            margin-bottom: 18px;
            padding: 4px 8px;
        }

        .date__container {
            display: flex;
        }

        #expiration-month {
            border-right: none;
        }

        .braintree-hosted-fields-invalid {
            border-color: #EB5757;
        }

        #submit {
            background: #000000;
            border: none;
            border-radius: 30px;
            color: #FFFFFF;
            margin: px auto 0;
            padding: 18px;
            width: 315px;
        }
    </style>

    <!-- liked-products -->

    <style>
        .like-share {
            width: 100%;
            height: 24px;
            display: flex;
            justify-content: space-around;
        }

        .share {
            display: flex;
        }

        .share span {
            margin-right: 10px;
        }

        .share-icon i {
            margin: 0 5px;
        }

        .axc2 {
            width: 1px;
            height: 100%;
            background-color: grey;
        }

        #like-button:hover {
            cursor: pointer;
            color: #cd0928;
        }

        #like-button.not-liked {
            color: #000;
        }

        #like-button.not-liked:hover {
            color: #cd0928;
        }

        #like-button.liked {
            color: #cd0928;
        }

        #like-button.liked-shaked {
            -webkit-animation: shake 0.82s cubic-bezier(0.36, 0.07, 0.19, 0.97) both;
            animation: shake 0.82s cubic-bezier(0.36, 0.07, 0.19, 0.97) both;
            transform: translate3d(0, 0, 0) rotate(0deg);
            transform: rotate(0deg);
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            perspective: 1000px;
        }

        @-webkit-keyframes shake {

            10%,
            90% {
                transform: translate3d(0, 0px, 0) rotate(0deg);
            }

            20%,
            80% {
                transform: translate3d(0, -2px, 0) rotate(5deg);
            }

            30%,
            50%,
            70% {
                transform: translate3d(0, 0px, 0) rotate(0deg);
            }

            40%,
            60% {
                transform: translate3d(0, -2px, 0) rotate(-5deg);
            }
        }

        @keyframes shake {

            10%,
            90% {
                transform: translate3d(0, 0px, 0) rotate(0deg);
            }

            20%,
            80% {
                transform: translate3d(0, -2px, 0) rotate(5deg);
            }

            30%,
            50%,
            70% {
                transform: translate3d(0, 0px, 0) rotate(0deg);
            }

            40%,
            60% {
                transform: translate3d(0, -2px, 0) rotate(-5deg);
            }
        }

        .like {
            display: flex;
        }

        .right-content item-title,
        .down-content h4 {
            width: 70%;
        }

        .right-content stars,
        .down-content .stars {
            width: 30%;
        }
    </style>
