document.addEventListener('DOMContentLoaded', () => {
    // Elements for the mobile toggle
    const menuToggle = document.getElementById("menu-toggle"); 
    const mobileMenu = document.getElementById("mobile-menu"); 
    const menuIcon = document.getElementById("menu-icon"); 
    const closeIcon = document.getElementById("close-icon"); 

    // Dropdown buttons for mobile
    const dropdownButtons = document.querySelectorAll('[data-dropdown]');
    
    // Desktop About dropdown
    const aboutButton = document.getElementById("about-btn");
    const aboutDropdown = document.getElementById("about-dropdown");

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
            
            countries.sort((a, b) => a.name.common.localeCompare(b.name.common));

            countries.forEach(country => {
                const countryCode = country.idd ? `+${country.idd.suffixes[0]}` : ''; 
                const countryName = country.name.common; 
                const flagUrl = country.flags ? country.flags.png || country.flags.svg : ''; 

                if (countryCode && flagUrl && countryName) {
                    const option = document.createElement('option');
                    option.value = countryCode;
                    option.innerHTML = `<img src="${flagUrl}" alt="${countryName} Flag" class="inline-block w-6 h-6 mr-2"> ${countryCode} (${countryName})`;
                    selectElement.appendChild(option);
                }
            });

            selectElement.value = '+254'; 
        })
        .catch(error => {
            console.error('Error fetching country data:', error);
        });

    // Mobile menu toggle functionality
    if (menuToggle && mobileMenu && menuIcon && closeIcon) {
        menuToggle.addEventListener('click', () => {
            const isMenuHidden = mobileMenu.classList.contains('translate-x-full');
            
            mobileMenu.classList.toggle('translate-x-full', !isMenuHidden);

            if (isMenuHidden) {
                menuIcon.classList.add('hidden'); 
                closeIcon.classList.remove('hidden'); 
            } else {
                menuIcon.classList.remove('hidden'); 
                closeIcon.classList.add('hidden'); 
            }
        });
    } else {
        console.error("Menu toggle elements are missing or incorrectly referenced.");
    }

    // Mobile Dropdown Toggle
    dropdownButtons.forEach((button) => {
        const dropdownId = button.getAttribute('data-dropdown');
        const dropdownMenu = document.getElementById(dropdownId);

        button.addEventListener('click', () => {
            const isDropdownVisible = !dropdownMenu.classList.contains('hidden');
            dropdownMenu.classList.toggle('hidden', isDropdownVisible); 
        });
    });

    // Desktop About Dropdown Toggle
    if (aboutButton && aboutDropdown) {
        aboutButton.addEventListener("click", () => {
            aboutDropdown.classList.toggle("hidden");
        });

        // Close dropdown when clicking outside
        document.addEventListener("click", (event) => {
            if (!aboutButton.contains(event.target) && !aboutDropdown.contains(event.target)) {
                aboutDropdown.classList.add("hidden");
            }
        });
    }
});
