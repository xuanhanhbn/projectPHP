    <!-- Additional CSS Files -->
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
	transform: translate(-50%,-50%);
}
.cart-button .fa-box {
	position: absolute;
	z-index: 3;
	top: -20%;
	left: 52%;
	font-size: 1.2em;
	transform: translate(-50%,-50%);
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
	transform: translate(-50%,-50%);
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
	40%, 60% {
		left: 50%;
	}
	100% {
		left: 115%;
	}
}
@keyframes box {
	0%, 40% {
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
	20%, 100% {
		opacity: 0;
	}
}
@keyframes txt2 {
	0%, 80% {
		opacity: 0;
	}
	100% {
		opacity: 1;
	}
}


</style>