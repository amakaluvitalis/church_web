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


    const floatingButton = document.getElementById("floatingButton");
    const toggleButton = document.getElementById("toggleButton");
    const closeFloatingButton = document.getElementById("closeFloatingButton");
    const notificationPanel = document.getElementById("notificationPanel");
    const closePanel = document.getElementById("closePanel");

    let isOpen = false;
    let isManuallyClosed = false; 
    let manualCloseTime = null; 

    // Function to make the button shake periodically
    function startShaking() {
        setInterval(() => {
            if (!isOpen && !isManuallyClosed) {
                floatingButton.classList.add("shake");
                setTimeout(() => floatingButton.classList.remove("shake"), 400);
            }
        }, 5000); 
    }

    // Function to show and hide button every 1 min (visible for 30s)
    function toggleVisibility() {
        if (!isManuallyClosed) {
            floatingButton.classList.remove("hidden"); 
            setTimeout(() => {
                if (!isManuallyClosed) {
                    floatingButton.classList.add("hidden"); 
                }
            }, 30000); 
        }
        setTimeout(toggleVisibility, 60000);
    }

    // Open Panel
    toggleButton.addEventListener("click", () => {
        notificationPanel.classList.remove("right-[-320px]");
        notificationPanel.classList.add("right-4");
        isOpen = true;
    });

    // Close Panel
    closePanel.addEventListener("click", () => {
        notificationPanel.classList.remove("right-4");
        notificationPanel.classList.add("right-[-320px]");
        isOpen = false;
    });

    // Close Floating Button & Prevent it from Showing for 10 Minutes
    closeFloatingButton.addEventListener("click", () => {
        floatingButton.classList.add("hidden");
        isManuallyClosed = true; 
        manualCloseTime = Date.now();

        setTimeout(() => {
            isManuallyClosed = false;
            toggleVisibility();
        }, 600000); 
    });

    // Start shaking animation & visibility toggle on load
    startShaking();
    toggleVisibility();


    const notices = [
        "🔥 Worship Night on March 15, 7:00 PM",
        "🙏 Join the Saturday Fellowship at 5:00 PM",
        "🎉 Youth Meeting this Friday at 6:00 PM",
        "📢 Sunday Service starts at 10:00 AM",
        "🎶 Choir Rehearsal on Saturday at 4:00 PM",
        "🛐 Intercessory Prayers on Tuesday at 5:00 PM",
        "📖 Bible Study every Wednesday at 6:00 PM"
    ];

    const marquee = document.getElementById("marquee");

    function populateNotices() {
        marquee.innerHTML = ""; // Clear previous notices
        notices.forEach((text) => {
            const span = document.createElement("span");
            span.classList.add("notice");
            span.textContent = text;
            marquee.appendChild(span);
        });

        // Duplicate notices for smooth looping
        notices.forEach((text) => {
            const span = document.createElement("span");
            span.classList.add("notice");
            span.textContent = text;
            marquee.appendChild(span);
        });
    }

    populateNotices();
});
