
@vite('resources/css/FrontEnd/Front_Pages/contact.css')
@extends('layout.app')

@section('title', 'Contact Us')

@section('content')
<div class="contact-container">
 <div class="contact-header">
    <h1>تواصل معنا</h1>
    <p>نحن سعداء بسماعكم! يرجى ملء النموذج أدناه وسيتواصل معكم فريقنا في أقرب وقت.</p>
</div>


    <div class="contact-content">
        <!-- Contact Form -->
        <form action="{{ route('layout.contact') }}" method="POST" class="contact-form">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your full name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
            </div>

            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" placeholder="Subject of your message" required>
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="6" placeholder="Type your message here..." required></textarea>
            </div>

            <button type="submit" class="submit-btn">Send Message</button>
        </form>

        <!-- Contact Information -->
        <div class="contact-info">
            <div class="info-card">
                <h3>Email</h3>
                <p>support@company.com</p>
            </div>
            <div class="info-card">
                <h3>Phone</h3>
                <p>+966 5 1234 5678</p>
            </div>
            <div class="info-card">
                <h3>Social Media</h3>
              <div class="social-links-inline">
    <a href="https://www.facebook.com/share/1KaLM2diQb/" target="_blank" class="social facebook">
        <i class="fab fa-facebook-f"></i>
    </a>
    <a href="#" target="_blank" class="social twitter">
        <i class="fab fa-twitter"></i>
    </a>
    <a href="https://www.instagram.com/anas_abdalhai?igsh=MTh6OTEwcnRieTZvNg==" target="_blank" class="social instagram">
        <i class="fab fa-instagram"></i>
    </a>
</div>

            </div>
        </div>
    </div>
</div>
@endsection

