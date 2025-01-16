<style>
    footer {
    padding: 50px 15px;
    background-color: #f5e9dd;
    font-size: 25px;
    
}

footer .container {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    max-width: 1200px;
    margin: 0 auto;
    
}

footer .footer-section {
    padding: 10px;
    text-align: center;
}

footer h5 {
    font-weight: bold;
    margin-bottom: 20px;
    color: #6b4226;
}

footer p,
footer a {
    font-size: 1rem;
    color: #555;
    margin: 5px 0;
}

footer a:hover {
    color: #343a40;
    text-decoration: underline;
}

footer img {
    width: 100px;
    height: 100px;
    margin-bottom: 10px;
}

.footer-links a {
    text-decoration: none;
    color: #6b4226;
    display: block;
    margin: 5px 0;
    
}

.footer-links a:hover {
    color: #343a40;
    text-decoration: underline;
}

.footer-social-icons a {
    font-size: 20px;
    color: #6b4226;
}

.footer-social-icons a:hover {
    color: #343a40;
}

.newsletter-form .form-control {
    flex: 1;
    border: 1px solid #6b4226;
    border-radius: 5px;
}

.newsletter-form .btn-brown {
    background-color: #6b4226;
    color: white;
    border: none;
    padding: 5px 15px;
    border-radius: 5px;
}

.newsletter-form .btn-brown:hover {
    background-color: #343a40;
}

.bottom-footer {
    background-color: #343a40;
    color: white;
    padding: 10px 0;
    font-size: 14px;
}

.footer-links{
    margin-left: 100px;
}
.links{
    margin-left: 97px;
}
.footer-logo {
    margin-left: auto;
    margin-right: auto;
    display: block; /* Ensures the logo is treated as a block-level element */
}

@media (max-width: 768px) {
    footer .container {
        flex-direction: column;
        text-align: center;
    }

    footer .footer-section {
        margin-bottom: 20px;
    }
    .footer-logo {
        margin: 0 auto;
    }

    .footer-links{
    margin-right: 100px;
    }
    .links{
        margin-right: 97px;
    }
}


</style>

<footer>
    <div class="container font3">
        <div class="row">
            <!-- Logo and Description -->
            <div class="details-col col-lg-3 col-md-6 footer-section text-center">
                <img src="{{ asset('images/Logo.png') }}" alt="Tranquil Trails Logo" class="footer-logo">
                <p><strong>Stay up to date with our latest news, receive exclusive deals and more</strong></p>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.</p>
                <div class="footer-social-icons d-flex justify-content-center">
                    <a href="#" class="me-3"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="me-3"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-twitter"></i></a>
                </div>
            </div>

            <!-- Links -->
            <div class="col-lg-2 col-md-6 footer-section text-center">
                <h5 class="links">Links</h5>
                <div class="footer-links">
                    <a href="/">Home</a>
                    <a href="/about">About</a>
                    <a href="/rooms">Rooms</a>
                    <a href="/dining">Dining</a>
                    <a href="/contact">Contact</a>
                </div>
            </div>

            <!-- Contacts -->
            <div class="col-lg-4 col-md-6 footer-section text-center">
                <h5>Contacts</h5>
                <div class="footer-contacts">
                    <p>tranquiltrails@gmail.com</p>
                    <p>No. 101, Dambulla, Sri Lanka</p>
                    <p>(+94) 112 933 333</p>
                    <p>(+94) 112 933 222</p>
                </div>
            </div>

            <!-- Newsletter -->
            <div class="col-lg-3 col-md-6 footer-section text-center">
                <h5>Newsletter</h5>
                <form class="newsletter-form d-flex">
                    <input type="email" class="form-control me-2" placeholder="Your email here">
                    <button class="btn new-btn-color">Join</button>
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