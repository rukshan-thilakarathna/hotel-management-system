<style>
    footer {
        padding-top: 90px; /* Increase top padding */
        padding-bottom: 30px; /* Optional bottom padding */
        background-color: #d3af9066; /* Background color */
    }

    .bottom-footer {
        margin-bottom: 0;
        padding: 15px 0; /* Padding for the bottom footer */
        background-color: #343a40; /* Dark background */
        color: white;
    }
</style>

<footer>
    <div class="container font3">
        <div class="row">
            <!-- Logo and Description -->
            <div class="col-lg-4 mb-4">
                <img src="{{ asset('images/Logo.png') }}" alt="Tranquil Trails Logo" class="mb-3" style="width: 90px;">
                <p><strong>Stay up to date with our latest news, receive exclusive deals and more</strong></p>
                <p class="text-muted">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.
                </p>
                <p class="fw-bold">Follow Us</p>
                <div class="d-flex">
                    <a href="#" class="text-dark me-3"><i class="bi bi-facebook fs-4"></i></a>
                    <a href="#" class="text-dark me-3"><i class="bi bi-instagram fs-4"></i></a>
                    <a href="#" class="text-dark"><i class="bi bi-twitter fs-4"></i></a>
                </div>
            </div>

            <!-- Links -->
            <div class="col-lg-2 mb-4">
                <h5 class="fw-bold">Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-muted text-decoration-none">Home</a></li>
                    <li><a href="#" class="text-muted text-decoration-none">About</a></li>
                    <li><a href="#" class="text-muted text-decoration-none">Rooms</a></li>
                    <li><a href="#" class="text-muted text-decoration-none">Dining</a></li>
                    <li><a href="#" class="text-muted text-decoration-none">Contact</a></li>
                </ul>
            </div>

            <!-- Contacts -->
            <div class="col-lg-3 mb-4">
                <h5 class="fw-bold">Contacts</h5>
                <p class="text-muted mb-1">tranquiltrails@gmail.com</p>
                <p class="text-muted mb-1">No. 101, Dambulla, Sri Lanka</p>
                <p class="text-muted mb-1">(+94) 112 933 333</p>
                <p class="text-muted">(+94) 112 933 222</p>
            </div>

            <!-- Newsletter -->
            <div class="col-lg-3">
                <h5 class="fw-bold">Newsletter</h5>
                <div class="d-flex flex-wrap">
                    <input type="email" class="form-control me-2 mb-2" placeholder="Your email here">
                    <button class="btn btn-success mb-2 new-btn-color">Join</button>
                </div>
                <p class="text-muted mt-2" style="font-size: 0.85rem;">
                    We respect your privacy and will never share your info. <a href="#" class="text-muted text-decoration-none">Privacy Policy</a>
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