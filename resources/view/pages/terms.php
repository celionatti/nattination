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
                <h2 class="heading text-white mb-3" data-aos="fade-up">Terms and Conditions</h2>
                <h5 class="text-white">Effective Date: <span>08-January-2025</span></h5>
            </div>
        </div>
    </div>
</div>

<div class="section mt-3">
    <div class="container lh-lg">
        <p>
            Welcome to <strong><span class="text-danger"> Natti</span>Nation<span class="text-danger">.</span></strong> By accessing or using our website, you agree to be bound by these Terms and Conditions. Please read them carefully before proceeding.
        </p>
        <h5>1. Website Purpose and Usage</h5>
        <p>The primary purpose of this website is for content sharing, blogging, and educational purposes. By using this platform, you agree to adhere to the following guidelines:</p>
        <p><span>*</span>Prohibited Activities</p>
        <ul class="">
            <li>No abusive, defamatory, or discriminatory language or behavior.</li>
            <li>No sharing of incriminating, illegal, or explicit content unless it is already publicized.</li>
            <li>No spamming, phishing, or engaging in fraudulent activities.</li>
            <li>No uploading of malicious files, including viruses, malware, or harmful scripts.</li>
            <li>No impersonation of individuals, organizations, or entities.</li>
            <li>No violation of intellectual property rights.</li>
        </ul>
        <p>Failure to adhere to these rules may result in restricted access or account termination.</p>

        <h5>2. User Accounts</h5>
        <ul class="">
            <li>Users can access the website without creating an account; however, certain features may require registration.</li>
            <li>Users may create multiple accounts, but each account must have a unique email address.</li>
            <li>There is no age restriction for using the website; parents are responsible for supervising children’s usage.</li>
        </ul>

        <h5>3. User-Generated Content</h5>
        <ul>
            <li>Users can publish or share content on the website and retain certain rights over their content.</li>
            <li>By posting content, you grant us a non-exclusive license to display, share, or remove the content if it violates our rules.</li>
            <li>We reserve the right to delete content that is abusive, offensive, or otherwise breaches these Terms and Conditions.</li>
        </ul>

        <h5>4. Liability Disclaimer</h5>
        <ul class="">
            <li>We make no guarantees about the accuracy, reliability, or completeness of the content shared on this website.</li>
            <li>We are not liable for any user-generated content or external links provided on the platform.</li>
            <li>We are not responsible for technical issues, data loss, or website unavailability.</li>
            <li>Any decision you make based on advertisements or third-party content is at your own risk.</li>
        </ul>

        <h5>5. Account Termination</h5>
        <p>We reserve the right to deny access or terminate user accounts under the following circumstances:</p>
        <ul class="">
            <li>Non-compliance with our rules and regulations.</li>
            <li>Repeated violations or disruptive behavior.</li>
            <li>User request for account deletion.</li>
        </ul>

        <h5>6. Payment and Advertisements</h5>
        <ul>
            <li>Currently, the platform does not offer paid services or products.</li>
            <li>Advertisements displayed on the platform are for informational purposes only. We are not responsible for transactions or disputes arising from third-party advertisements.</li>
            <li>Future services on the platform may require payment, and such features will be governed by additional terms.</li>
        </ul>

        <h5>7. Third-Party Links</h5>
        <p>Our website may include links to third-party websites to enhance our content and services. Please note:</p>
        <ul class="">
            <li>Third-party websites are governed by their own terms and conditions.</li>
            <li>We are not responsible for the information you share with them.</li>
            <li>Your interactions with third-party sites are at your own discretion and risk.</li>
        </ul>

        <h5>8. Governing Law</h5>
        <p>These Terms and Conditions are governed by the laws of Lagos, Nigeria. Any disputes arising from the use of this website will be resolved under the jurisdiction of Lagos courts.</p>

        <h5>9. Contact Us</h5>
        <p>If you have questions or concerns about these Terms and Conditions, you can contact us through:</p>
        <ul class="">
            <li>The email address provided on our contact page.</li>
            <li>The message box available on our website's contact section.</li>
        </ul>

        <h5>Changes to These Terms and Conditions</h5>
        <p>We may update these Terms and Conditions from time to time. Any changes will be reflected on this page with an updated effective date.</p>
    </div>
</div>

<?php $this->end() ?>