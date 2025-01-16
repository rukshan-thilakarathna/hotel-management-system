<style>
    footer {
            padding: 75px 15px; /* Reduce overall padding */
            background-color: #f5e9dd; /* Keep the background consistent */
            font-size: 20px;
        }

        footer .container {
            display: flex;
            justify-content: space-between; /* Align sections horizontally */
            flex-wrap: wrap; /* Allow wrapping for smaller screens */
            gap: 20px; /* Add small gaps between sections */
            max-width: 1200px;
            margin: 0 auto; /* Center the footer content */
          
            
        }

        footer .column {
            flex: 1; /* Ensure columns take equal space */
            min-width: 200px; /* Prevent columns from shrinking too small */
        }

        footer h5 {
            font-weight: bold;
            margin-bottom: 10px; /* Reduce space below headers */
            color: #6b4226;
            
        }

        footer p,
        footer a {
            font-size: 1.1rem; /* Adjust font size for uniformity */
            line-height: 1.5;
            color: #555;
            margin: 5px 0; /* Reduce space between lines */
        }

        footer a:hover {
            color: #343a40;
            text-decoration: underline;
        }

        footer .form-control {
            width: 100%;
            margin: 10px 0; /* Reduce margin around the input field */
        }
        .footer-links {
            display: flex; /* Allows control over direction */
            flex-direction: column; /* Stack links vertically */
            gap: 0px; /* Add spacing between links */
            padding: 0; /* Remove padding */
            /* Remove margin */
            margin-left: 35px;
            font-size: 30px;
        }

        .footer-links a {
            text-decoration: none; /* Remove underline from links */
            color: #6b4226; /* Set link color */
            font-size: 1rem; /* Adjust font size */
            display: block; /* Ensure links take full width if needed */
        }

        .footer-links a:hover {
            color: #343a40; /* Change link color on hover */
            text-decoration: underline; /* Underline on hover */
        }
        .link{
            margin-left: 35px;
        }

        footer img{
            width: 100px;
            height: 100px;
            justify-content: center;
        }
        .bottom-footer {
            background-color: black;
            color: white;
            font-size: 18px;
        }
      .details-col{
       
       
      }

        /* Responsive Styles */
        @media (max-width: 768px) {
            footer .footer-section {
                margin-bottom: 30px; /* Add vertical spacing between sections */
            }

            footer .container {
                display: flex; /* Ensure flex layout */
                flex-direction: column; /* Stack sections vertically */
                align-items: center; /* Center-align sections horizontally */
                text-align: center; /* Center text for smaller screens */
                gap: 20px; /* Add spacing between sections */
                max-width: 1200px;

            }

            .footer-links {
                margin-right: 35px; /* Reset right margin for smaller screens */
                margin-bottom: 10px; /* Add spacing below links */

            }
            .link{
                margin-right: 35px;
            }

            .newsletter-form {
                flex-direction: column; /* Stack input and button vertically */
                gap: 10px; /* Add space between the input and button */
            }

            footer img {
                width: 100px;
                height: 100px;
                display: block;
                margin: 0 auto; /* Center the image horizontally */
            }

            .footer-social-icons {
                justify-content: center; /* Center-align social icons */
            }
    }

</style>

<footer>
    <div class="container font3">
        <div class="details-col row">
            <!-- Logo and Description -->
            <div class="col-lg-4 col-md-6 footer-section">
                <img src="{{ asset('images/Logo.png') }}" alt="Tranquil Trails Logo" class="footer-logo">
                <p><strong>Stay up to date with our latest news, receive exclusive deals and more</strong></p>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                <div class="footer-social-icons d-flex">
                    <a href="#" class="me-3"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="me-3"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-twitter"></i></a>
                </div>
            </div>

            <!-- Links -->
            <div class="col-lg-2 col-md-6 footer-section">
                <h5 class="link">Links</h5>
                <div class="footer-links">
                    <a href="#">Home</a>
                    <a href="#">About</a>
                    <a href="#">Rooms</a>
                    <a href="#">Dining</a>
                    <a href="#">Contact</a>
                </div>
            </div>

            <!-- Contacts -->
            <div class="col-lg-3 col-md-6 footer-section">
                <h5>Contacts</h5>
                <div class="footer-contacts">
                    <p>tranquiltrails@gmail.com</p>
                    <p>No. 101, Dambulla, Sri Lanka</p>
                    <p>(+94) 112 933 333</p>
                    <p>(+94) 112 933 222</p>
                </div>
            </div>

            <!-- Newsletter -->
            <div class="col-lg-3 col-md-6 footer-section">
                <h5>Newsletter</h5>
                <form class="newsletter-form d-flex flex-wrap">
                    <input type="email" class="form-control me-2" placeholder="Your email here">
                    <button class="btn btn-success new-btn-color">Join</button>
                </form>
                <p style="font-size: 0.85rem;">
                    We respect your privacy and will never share your info. <a href="#" class="text-muted">Privacy Policy</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- Bottom Footer -->
<div class="bottom-footer text-center">
    <small>Copyright © 2024 Tranquil Trails | Design by SATASME</small>
</div>



<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    // Initialize Date Range Picker
    $(function () {
        $('#dateRange').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD'
            }
        });
    });

    // JavaScript to handle adult and child count
    document.getElementById("adultPlus").onclick = (e) => handleClick(e, "adultCount", 1);
    document.getElementById("adultMinus").onclick = (e) => handleClick(e, "adultCount", -1);
    document.getElementById("childPlus").onclick = (e) => handleClick(e, "childCount", 1);
    document.getElementById("childMinus").onclick = (e) => handleClick(e, "childCount", -1);

    function handleClick(event, id, delta) {
        event.preventDefault(); // Prevent any default action, like form submission or page reload
        updateCount(id, delta);
    }

    function updateCount(id, delta) {
        let count = parseInt(document.getElementById(id).innerText);
        count = Math.max(0, count + delta); // Ensure count doesn't go below 0
        document.getElementById(id).innerText = count;

        // Update hidden input fields
        if (id === "adultCount") {
            document.getElementById("hiddenAdultCount").value = count;
        } else if (id === "childCount") {
            document.getElementById("hiddenChildCount").value = count;
        }

        // Update the button label dynamically
        const adultCount = parseInt(document.getElementById("adultCount").innerText);
        const childCount = parseInt(document.getElementById("childCount").innerText);
        document.getElementById("guestButton").innerText = `${adultCount} Adult${adultCount > 1 ? 's' : ''}, ${childCount} Child${childCount > 1 ? 'ren' : ''}`;
    }

    // Prevent dropdown from closing when clicking inside
    $('#guestDropdown').on('click', function (e) {
        e.stopPropagation();
    });
</script>



<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+CBYlZj1UcP7GILK5GSK7yZf5I6bL" crossorigin="anonymous"></script>