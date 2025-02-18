
document.addEventListener('DOMContentLoaded', () => {
    // Elements for the mobile toggle
    const menuToggle = document.getElementById("menu-toggle"); // Button containing the icons
    const mobileMenu = document.getElementById("mobile-menu"); // The actual menu
    const menuIcon = document.getElementById("menu-icon"); // Menu icon (hamburger)
    const closeIcon = document.getElementById("close-icon"); // Close icon (X)
    const dropdownButtons = document.querySelectorAll('[data-dropdown]');

    
    // Hero section (slides and text update)
    const slides = document.querySelectorAll('.hero-slide');
    const heroTitle = document.getElementById('hero-title');
    const heroSubtext = document.getElementById('hero-subtext');
    
    let currentSlide = 0;

    // Ensure heroTitle and heroSubtext are available
    if (heroTitle && heroSubtext) {
        function updateText() {
            const activeSlide = slides[currentSlide];
            const text = activeSlide.getAttribute('data-text');
            const subtext = activeSlide.getAttribute('data-subtext');
            
            heroTitle.textContent = text;
            heroSubtext.textContent = subtext;

            heroTitle.classList.remove('opacity-0');
            heroTitle.classList.add('opacity-100');
            heroSubtext.classList.remove('opacity-0');
            heroSubtext.classList.add('opacity-100');
        }

        updateText();

        setInterval(() => {
            slides[currentSlide].classList.remove('active');
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].classList.add('active');
            
            updateText();
        }, 5000);
    }

    // Handle active class for navigation links
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll("nav ul li a");

    navLinks.forEach(link => {
        if (link.getAttribute("href") === "#") return;

        if (link.href.includes(currentPath)) {
            link.classList.add("active");
        }
    });

   // Fetch country data from the Restcountries API
   fetch('https://restcountries.com/v3.1/all')
        .then(response => response.json())
        .then(countries => {
            const selectElement = document.getElementById('country-code');
            
            // Sort countries by name alphabetically
            countries.sort((a, b) => a.name.common.localeCompare(b.name.common));

            // Loop through countries and add them to the dropdown
            countries.forEach(country => {
                const countryCode = country.idd ? `+${country.idd.suffixes[0]}` : ''; // Get country calling code
                const countryName = country.name.common; // Get country name
                const flagUrl = country.flags ? country.flags.png || country.flags.svg : ''; // Get flag URL (prefer PNG, fallback to SVG)

                // Ensure country code, flag, and name are available
                if (countryCode && flagUrl && countryName) {
                    const option = document.createElement('option');
                    option.value = countryCode;
                    option.innerHTML = `<img src="${flagUrl}" alt="${countryName} Flag" class="inline-block w-6 h-6 mr-2"> ${countryCode} (${countryName})`;
                    selectElement.appendChild(option);
                }
            });

            // Optional: Set a default country code (e.g., Kenya's country code)
            selectElement.value = '+254'; 
        })
        .catch(error => {
            console.error('Error fetching country data:', error);
        });

        if (menuToggle && mobileMenu && menuIcon && closeIcon) {
            menuToggle.addEventListener('click', () => {
                const isMenuHidden = mobileMenu.classList.contains('translate-x-full');
                
                // Toggle the mobile menu visibility
                mobileMenu.classList.toggle('translate-x-full', !isMenuHidden);
    
                // Smoothly toggle visibility of icons
                if (isMenuHidden) {
                    menuIcon.classList.add('hidden'); // Hide menu icon
                    closeIcon.classList.remove('hidden'); // Show close icon
                } else {
                    menuIcon.classList.remove('hidden'); // Show menu icon
                    closeIcon.classList.add('hidden'); // Hide close icon
                }
            });
        } else {
            console.error("Menu toggle elements are missing or incorrectly referenced.");
        }

        dropdownButtons.forEach((button) => {
            const dropdownId = button.getAttribute('data-dropdown');
            const dropdownMenu = document.getElementById(dropdownId);
    
            button.addEventListener('click', () => {
                const isDropdownVisible = !dropdownMenu.classList.contains('hidden');
                dropdownMenu.classList.toggle('hidden', isDropdownVisible); // Toggle visibility
            });
        });
});