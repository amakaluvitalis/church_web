        document.addEventListener('DOMContentLoaded', () => {
            const slides = document.querySelectorAll('.hero-slide');
            const heroTitle = document.getElementById('hero-title');
            const heroSubtext = document.getElementById('hero-subtext');
            
            let currentSlide = 0;

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
        });
    