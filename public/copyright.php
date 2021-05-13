<php>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TaoHu</title>
        <link rel='stylesheet' href='css_uniqlo/test.css'>
        <link rel='stylesheet' href='css_uniqlo/css.css'>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link href="homepage_2.css" type="text/css" rel="stylesheet">
        <link href="homepage_2_2.css" type="text/css" rel="stylesheet">
        <link href="css.css" type="text/css" rel="stylesheet">
        <link href="css2.css" type="text/css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
        <script src="https://kit.fontawesome.com/e1571d95d8.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="header">
            <div class="header-container">
                <div class="navbar">
                    <div class="logo">
                        <img src="assets/tom's file extrawork-1.svg " alt="Black Lotus logo" width="70px">
                    </div>
                    <div class="taohu">
                        <svg width="168" height="28" viewBox="0 0 168 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.087 4.824L14.223 27.18L10.803 27.072L11.739 4.716L0.146953 4.32L0.290953 0.899999L27.003 1.872L26.931 5.22L15.087 4.824ZM51.1497 15.948L51.7617 19.332L41.4657 21.06L38.3697 27.864L35.2737 26.496L47.2617 0.287998L50.3577 0.251999L61.3017 23.256L58.2417 24.732L48.8097 5.004L43.1937 17.316L51.1497 15.948ZM75.3765 26.604L73.7205 24.768L75.3405 4.464L76.8885 2.952L92.8005 1.332L94.7085 2.988L95.4645 25.092L93.7365 26.82L75.3765 26.604ZM92.0445 23.4L91.3605 4.86L78.5805 6.192L77.2845 23.22L92.0445 23.4ZM128.139 10.08L128.211 1.656L131.595 1.728L131.379 26.46L127.995 26.424L128.103 13.5L112.911 14.796L112.335 26.496L108.951 26.316L110.175 1.584L113.559 1.764L113.055 11.412L128.139 10.08ZM147.248 25.452L145.664 23.76L145.268 2.232L148.652 2.124L149.048 22.14L162.368 23.148L164.276 1.512L167.624 1.8L165.608 25.092L163.772 26.64L147.248 25.452Z" fill="black"/>
                        </svg>
                            
                    </div>
                    <div class="search-box">
                        <input class="search-txt" type="text" name="search-text" placeholder="Type to search">
                        <a class="search-btn" href="#"></a> 
                        <i class="fas fa-search"></i>
                    </div> 
                    <div>
                        <a href="Login_box.php" id="logoutBtn" onclick="logout()"><i class="fas fa-sign-in-alt"></i></a>  
                        <span id="cicrle_logoutbtn"></span>
                    </div>
                    
                    <nav>
                        <div class="menu">
                            <button><i class="fa fa-bars"></i></button>
                            <ul>
                            <li>
                                <a href="index.php">
                                    <div class="icon">
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                    </div>
                                    <div class="name"><span data-text="Home">Home</span></div>
                                </a>
                            </li>
                            <li>
                                <a href="purchase.php" id="cartLink">
                                    <div class="icon">
                                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                    </div>
                                    <div class="name"><span data-text="Cart">Cart</span></div>
                                </a>
                            </li>
                            <li>
                                <a href="copyright.php">
                                    <div class="icon">
                                        <i class="fa fa-file-text" aria-hidden="true"></i>
                                        <i class="fa fa-file-text" aria-hidden="true"></i>
                                    </div>
                                    <div class="name"><span data-text="Policy">Policy</span></div>
                                </a>
                            </li>
                            <li>
                                <a href="faqs.php">
                                    <div class="icon">
                                        <i class="fa fa-question-circle" aria-hidden="true"></i>
                                        <i class="fa fa-question-circle" aria-hidden="true"></i>
                                    </div>
                                    <div class="name"><span data-text="FAQs">FAQs</span></div>
                                </a>
                            </li>
                            <li>
                                <a href="about_us.php">
                                    <div class="icon">
                                        <i class="fa fa-address-card" aria-hidden="true"></i>
                                        <i class="fa fa-address-card" aria-hidden="true"></i>
                                    </div>
                                    <div class="name"><span data-text="Team">Team</span></div>
                                </a>
                            </li>
                            <li>
                                <a href="contactform.php">
                                    <div class="icon">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </div>
                                    <div class="name"><span data-text="Contact">Contact</span></div>
                                </a>
                            </li>
                            <li>
                                <a href="my-account.php">
                                    <div class="icon">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </div>
                                    <div class="name"><span data-text="Sign In" id="Account_Signin">Sign In</span></div>
                                </a>
                            </li>
                            </ul>
                        </div>         
                    </nav>        
                        </div>
            </div>
        </div>
        <div class='smallcontainer'>
            <div class='rowwf'>
                <div class="col2">
                    <h1 class='hf'>Copyright, ToS and Privacy Policy</h3>
                </div>
                <div class="col2">
                    <img src='pics_nham/copyright.png' alt="Goods picture">
                </div>
            </div>
            <h1 class='hc'>
                Copyright
            </h1>
            <div class='box'>
                <p class='hf1'>All the materials, content and information on this website are protected by copyright. You may
                    download materials displayed on this website for non-commercial or personal use only, provided you do not 
                    remove or modify any copyright and other proprietary notices contained in these materials. You shall not 
                    distribute, modify, transmit, reuse, re-post, or use any trademarks, trade names, logos, images, graphics
                    or content from this website for public or commercial purposes without TaoHu prior written consent.</p>
                    

                <p class='hf1'> Save as otherwise provided, nothing contained in this website should be construed as Parkson granting a 
                    licence or right regarding the use of the materials, content and information on this website, including but limited 
                    to the materials in which third parties have proprietary rights and TaoHu disclaims any liability with regard to infringement
                    of such third parties rights.</p>
            </div>
            <h1 class='hc'>
                Terms of Service
            </h1>
            <div class='box'>
                <p class='hf1'>Please read these Terms of Service ('Terms', 'Terms of Service') carefully before using the https://www.pbsbfashion.store/
                     website (the 'Service') operated by TaoHu.</p>
                <p class='hf1'>Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms 
                    apply to all visitors, users and others who access or use the Service.</p>
                <p class='hf1'> By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the terms then 
                    you may not access the Service.
                    TaoHu reserves the rights to amend the terms and conditions at any time without notification.</p>
                <h2 class='hfee'>ACCOUNTS</h2>
                <p class='hf1'>When you create an account with us, you must provide us information that is accurate, complete, and current at all times. Failure to do 
                    so constitutes a breach of the Terms, which may result in immediate termination of your account on our Service.</p>
                <p class='hf1'>You are responsible for safeguarding the password that you use to access the Service and for any activities or actions under your password,
                     whether your password is with our Service or a third-party service. You agree not to disclose your password to any third party. You must notify us immediately
                      upon becoming aware of any breach of security or unauthorized use of your account.</p>
                <h2 class='hfee'>GENERAL</h2>
                <ol class='hf1'>
                    <li>Our working hours and deadline are everyday, 24 hours, exclude weekend and public holidays.</li>
                    <li>Sales enquiry related, kindly email us at taohu.service@rmit.edu.vn with your order number.</li>
                    <li>All transactions (emails and payment verifications) will be attended within 1000 working days.</li>
                </ol>
                <h2 class='hfee'>PURCHASE</h2>
                <ol class='hf1'>
                    <li>Please ensure you have select correct item(s) in term of color and size before check out. We don't allow any amendment on orders that been confirmed.</li>
                    <li>We accept payment via eGHL payment gateway.</li>
                    <li>All prices are final upon payment checkout. Strictly no refund after payment made.</li>
                    <li>
                        TaoHu reserves the right to reject any order(s) without prior notice for reasons such as:
                        <ul>Product ordered is out of stock.<br>
                        Incomplete payment/ Suspect in any fraudulent activity.
                        </ul>
                    </li>
                </ol>
                <h2 class='hfee'>DELIVERY</h2>
                <ol class='hf1'>
                    <li>Kindly ensure address filled up is correct together your contact number. Orders with incomplete/incorrect information may result in delayed delivery. 
                        <br>Arrangement on re-delivery fee will apply on returned parcel. Orders will be shipped out within 1-2 working days. </li>
                    <li>Orders shipped out according to order number, we do not allow customer to request combine orders.</li>
                    <li>Charges vary for apparels and bulky items such as "Bags" and "Accessories".</li>
                    <li>For international orders, custom & import duties charged bear by customer(If any).</li>
                    <li>For bounced back parcel, cost for re-delivery will be borne by the customer. We will bear the cost of re-delivery if it is deemed as an error on our part. 
                        <br>Details regarding the re-delivery will be provided in the email sent to the customer.</li>
                    <li>For more information on shipping fee, please email us at taohu.service@rmit.edu.vn or call (+84)22222222.</li>
                </ol>
                <h2 class='hfee'>DISCOUNT CODES/ VOUCHERS</h2>
                <ol class='hf1'>
                    <li>Please ensure to apply your discount code before check out. No refunds and amendment will be made for completed orders.</li>
                    <li>Discount codes or vouchers come with an expiry date.</li>
                    <li>Discount codes or vouchers are non-extendable.</li>
                    <li>Orders with discount codes or vouchers are not exchangeable and returnable.</li>
                </ol>
                <h2 class='hfee'>STORE CREDITS</h2>
                <ol class='hf1'>
                    <li>Store credits issued by <span>TAOHU</span> can use on any purchase.</li>
                    <li>To redeem credits, please login your account. Select payment type "Store Credits" during check out.</li>
                    <li>Store credits do not have an expiry date.</li>
                    <li>Store credits are non-transferable and non-refundable.</li>
                </ol>
                <h2 class='hfee'>RETURNS OR EXCHANGE</h2>
                <ol class='hf1'>
                    <li>All defect / wrong size orders return allowed within 3 working days from date of parcel received as per "Order Tracking Apps". Requests 
                        for exchanges and returns thereafter will not be entertained.</li>
                    <li>All return items must be in their original condition with tag intact. Items which do not fulfill these criteria will be rejected duly. 
                        Customers need to pay for returns parcel.
                    <br> Re-delivery on wrong/defect item, cost will be bare by TaoHu.
                    <br>Re-delivery on exchange, cost will be bare by customer.</li>
                </ol>    
            </div>
            <h1 class='hc'>
                Privacy Policy
            </h1>
            <div class='box'>
                <p class ='hf1'>
                    By purchasing with TaoHu, you agree to receive marketing communications from us on our promotions & launches. We recognize the individual 
                    rights to protect your personal data, including the rights of access and correction, and the needs of the company to collect, use or disclose personal
                     data for only legitimate and reasonable purposes. For more information, contact:
                     <ol class ='hf1'>
                         <li>Email: taohu.service@rmit.edu.vn</li>
                         <li>Tel: (+84)22222222</li>
                     </ol>
                </p>
            </div>
        </div>
        <button id="up-arrow" onclick="topfunction()" title="Go to top"><i class="fa fa-arrow-circle-up"></i></button>
        <script type="text/javascript" src="shared.js"></script>
    </body>
    <footer class="simple-footer">
        <div class="containerf">
            <div class="content">
                <ul class="footer-nav">
                    <li><a href="index.php#search-box">Search</a></li>
                    <li><a href="about_us.php">About Us</a></li>
                    <li><a href="contactform.php">Contact</a></li>
                    <li><a href="fees.php">Fees</a></li>
                    <li><a href="copyright.php">Term of Service</a></li>
                    <li><a href="faqs.php">FAQs</a></li>
                </ul>
                
            
                <ul class="socials">
                    <li><a href="https://github.com/lacnham/php-CSS-Assignment"><i class="fab fa-github"></i></a></li>
                    <li><a href="mailto:s3864120@rmit.edu.vn"><i class="fa fa-envelope"></i></a></li>
                    <li><a href="https://www.facebook.com/linh.vu.790/"><i class="fab fa-facebook"></i></a></li>
                </ul>
        </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2021 <span>taohu</span>. All Rights Reserved | s3878533@rmit.edu.vn </p>
        </div>
        
    </footer>
</php>