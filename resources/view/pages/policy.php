<?php

/**
 * Framework Title: PhpStrike Framework
 * Creator: Celio natti
 * version: 1.0.0
 * Year: 2023
 * 
 * 
 * This view page start name{style,script,content} 
 * can be edited, base on what they are called in the layout view
 */

use PhpStrike\app\components\InfoComponent;
use PhpStrike\app\components\LogoComponent;
use celionatti\Bolt\Illuminate\Utils\StringUtils;

?>

<?php $this->start('content') ?>

<div class="hero overlay inner-page bg-primary py-5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center pt-3">
            <div class="col-lg-6">
                <?= renderComponent(LogoComponent::class) ?>
                <h2 class="heading text-white mb-3" data-aos="fade-up">Privacy Policy</h2>
                <h5 class="text-white">Effective Date: <span>08-January-2025</span></h5>
            </div>
        </div>
    </div>
</div>

<div class="section mt-3">
    <div class="container lh-lg">
        <p>
            At <strong><span class="text-danger"> Natti</span>Nation<span class="text-danger">.</span></strong>, your privacy is important to us. This Privacy Policy explains how we collect, use, and protect your information when you visit our website. By using our services, you agree to the practices described below.
        </p>
        <h5>1. Information We Collect</h5>
        <p>We may collect the following information from you:</p>
        <ul class="">
            <li><strong>Personal Information:</strong> Name, email address, phone number, and gender.</li>
            <li><strong>Cookies:</strong> To remember logged-in users for 30 days.</li>
        </ul>
        <p>We may also integrate third-party services (e.g., Google Analytics) in the future to enhance our services.</p>

        <h5>2. Purpose of Data Collection</h5>
        <p>We collect your information to:</p>
        <ul class="">
            <li>Improve our services and website functionality.</li>
            <li>Provide personalized content based on your preferences.</li>
        </ul>

        <h5>3. Data Sharing</h5>
        <p>We do not share your personal information with any third parties. Currently, we do not use third-party mail services or advertising networks.</p>

        <h5>4. User Rights</h5>
        <ul class="">
            <li><strong>Access and Deletion:</strong> You can request access to or deletion of certain personal data. However, content shared publicly on our website (e.g., comments or articles) may not be deleted as it becomes part of the website.</li>
            <li><strong>Cookies:</strong> You can opt out of cookie usage through your browser settings or preferences.</li>
        </ul>

        <h5>5. Security of Your Data</h5>
        <ul class="">
            <li>We use secure servers and encrypt sensitive user data to protect your information.</li>
            <li>Our practices comply with applicable data protection laws and regulations.</li>
        </ul>

        <h5>6. Children’s Privacy</h5>
        <p>We do not knowingly collect information from children. Parents or guardians are responsible for supervising their children’s use of our website.</p>

        <h5>7. Use of Cookies</h5>
        <p>We use cookies only to:</p>
        <ul class="">
            <li>Remember logged-in users for up to 30 days.</li>
            <li>Cookies do not store personal information directly and can be managed or disabled via your browser settings.</li>
        </ul>

        <h5>8. Contact Us</h5>
        <p>If you have questions about this Privacy Policy or your data, please contact us through: </p>
        <ul class="">
            <li>The email address provided on our contact page.</li>
            <li>The message box available on our website's contact section.</li>
        </ul>

        <h4>Changes to This Privacy Policy</h4>
        <p>We may update this Privacy Policy from time to time. Any changes will be reflected on this page with an updated effective date.</p>
    </div>
</div>

<?php $this->end() ?>