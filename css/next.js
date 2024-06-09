document.addEventListener("DOMContentLoaded", function() {
    const nextButton = document.querySelector('.next-button');
    const backButton = document.querySelector('.back-button');
    const basicInfoSection = document.querySelector('.basic-info-section');
    const emailPasswordSection = document.querySelector('.email-password-section');
    const submitButton = document.querySelector('[name="register"]');

    // Show email and password section and hide basic information section
    nextButton.addEventListener('click', function() {
        basicInfoSection.classList.add('hidden');
        emailPasswordSection.classList.remove('hidden');
        backButton.classList.remove('hidden');
        nextButton.classList.add('hidden');
        submitButton.classList.remove('hidden');
    });

    // Show basic information section and hide email and password section
    backButton.addEventListener('click', function() {
        basicInfoSection.classList.remove('hidden');
        emailPasswordSection.classList.add('hidden');
        backButton.classList.add('hidden');
        nextButton.classList.remove('hidden');
        submitButton.classList.add('hidden');
    });
});
