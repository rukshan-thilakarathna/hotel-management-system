<x-app-layout>
  <!-- Hero Section -->
  <section class="hero-section position-relative text-white text-center d-flex font3" style="display: flex; height: 50vh; background: url('{{ asset('images/bg.jpg') }}') center/cover no-repeat;">
     <div class="container h-100 d-flex flex-column justify-content-center align-items-center">
         <!-- Hero Text -->
         <div class="hero-section d-flex justify-content-center align-items-center vh-100">
            <div class="hero-content text-center">
                <h1 class="display-4 fw-bold">Contact Us</h1>
                <p class="lead">Home/Contact Us</p>
            </div>
        </div>
     </div>
 </section>

 <section id="contact" class="py-5 bg-light font3" style="margin-top:-20px;">
  <div class="container">
      <div class="row align-items-center">
          <!-- Left Column: Text and Information -->
          <div class="col-lg-6">
              <h2 class="fw-bold text-dark" style="font-size:55px;">Get in Touch</h2>
              <p class="text-muted" style="margin-top:30px;">
                  We'd love to hear from you. Feel free to reach out for reservations, inquiries, or assistance. Our team is here to help!
              </p>
              <ul class="list-unstyled new-btn-colo" style="margin-top:30px;">
                <li class="mb-3">
                    <i class="bi bi-envelope-fill custom-color me-2"></i>
                    <strong>Email:</strong> tranquiltrails@gmail.com
                </li>
                <li class="mb-3">
                    <i class="bi bi-telephone-fill custom-color me-2"></i>
                    <strong>Phone:</strong> (+94) 112 933 333
                </li>
                <li class="mb-3">
                    <i class="bi bi-geo-alt-fill custom-color me-2"></i>
                    <strong>Address:</strong> No. 101, Dambulla, Sri Lanka
                </li>
              </ul>
              <h5 class="fw-bold mt-4" style="font-size:20px;">Follow Us</h5>
              <div style="margin-top:15px;">
                  <a href="#" class="text-dark me-3"><i class="bi bi-facebook fs-4"></i></a>
                  <a href="#" class="text-dark me-3"><i class="bi bi-instagram fs-4"></i></a>
                  <a href="#" class="text-dark"><i class="bi bi-twitter fs-4"></i></a>
              </div>
          </div>

          <!-- Right Column: Contact Form -->
          <div class="col-lg-6"style="margin-top:30px;">
              <div class="card shadow-lg p-4">
                  <h4 class="text-dark mb-4" style="font-size:35px;">Send Us a Message</h4>
                  <form>
                      <div class="mb-3">
                          <label for="name" class="form-label">Full Name</label>
                          <input type="text" id="name" class="form-control" placeholder="Enter your name" required>
                      </div>
                      <div class="mb-3">
                          <label for="email" class="form-label">Email Address</label>
                          <input type="email" id="email" class="form-control" placeholder="Enter your email" required>
                      </div>
                      <div class="mb-3">
                          <label for="message" class="form-label">Message</label>
                          <textarea id="message" class="form-control" rows="4" placeholder="Your message" required></textarea>
                      </div>
                      <button type="submit" class="btn btn-success w-100 new-btn-color">Send Message</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</section>
</x-app-layout>