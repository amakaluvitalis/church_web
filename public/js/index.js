function openJoinModal(ministry) {
    document.getElementById("ministryName").value = ministry;
    document.getElementById("joinModal").classList.remove("hidden");
}

function closeJoinModal() {
    document.getElementById("joinModal").classList.add("hidden");
}

document.addEventListener('DOMContentLoaded', () => {
    // 📌 Mobile Menu Elements
    const menuToggle = document.getElementById("menu-toggle");
    const mobileMenu = document.getElementById("mobile-menu");
    const menuIcon = document.getElementById("menu-icon");
    const closeIcon = document.getElementById("close-icon");
    const aboutToggle = document.getElementById("about-toggle");
    const aboutDropdownMobile = document.getElementById("about-dropdown-mobile");
    const mobileLinks = document.querySelectorAll("#mobile-menu a");
    const contentDiv = document.getElementById("content");
    const body = document.body;

    // 📌 Desktop About Dropdown Elements
    const aboutButton = document.getElementById("about-btn");
    const aboutDropdown = document.getElementById("about-dropdown");

    // 📌 Restore Mobile Menu State
    if (sessionStorage.getItem("mobileMenuOpen") === "true") {
        mobileMenu.classList.remove("translate-x-full");
        closeIcon.classList.remove("hidden");
    } else {
        mobileMenu.classList.add("translate-x-full");
        closeIcon.classList.add("hidden");
    }

    // 📌 Mobile Menu Toggle
    function openMobileMenu() {
        mobileMenu.classList.remove("translate-x-full");
        closeIcon.classList.remove("hidden");
        sessionStorage.setItem("mobileMenuOpen", "true");
    }

    function closeMobileMenu() {
        mobileMenu.classList.add("translate-x-full");
        closeIcon.classList.add("hidden");
        sessionStorage.setItem("mobileMenuOpen", "false");
    }

    if (menuToggle) {
        menuToggle.addEventListener("click", (event) => {
            event.stopPropagation();
            openMobileMenu();
        });
    }

    if (closeIcon) {
        closeIcon.addEventListener("click", (event) => {
            event.stopPropagation();
            closeMobileMenu();
        });
    }

    // 📌 Close Mobile Menu When Clicking Outside
    document.addEventListener("click", (event) => {
        if (!mobileMenu.contains(event.target) && !menuToggle.contains(event.target)) {
            closeMobileMenu();
        }
    });

    // 📌 Mobile About Dropdown Toggle
    if (aboutToggle && aboutDropdownMobile) {
        aboutToggle.addEventListener("click", (event) => {
            event.stopPropagation();
            aboutDropdownMobile.classList.toggle("hidden");
        });

        mobileMenu.addEventListener("click", (event) => {
            if (!aboutToggle.contains(event.target) && !aboutDropdownMobile.contains(event.target)) {
                aboutDropdownMobile.classList.add("hidden");
            }
        });
    }

    // 📌 Ensure Mobile Menu Links are Clickable & Close Menu on Click
    mobileLinks.forEach(link => {
        link.addEventListener("click", (event) => {
            event.stopPropagation();
            closeMobileMenu();
        });
    });

    // 📌 Highlight Active Page in Mobile Menu
    const urlParams = new URLSearchParams(window.location.search);
    const currentPage = urlParams.get("page") || "home";

    mobileLinks.forEach(link => {
        const linkPage = new URL(link.href).searchParams.get("page") || "home";
        if (linkPage === currentPage) {
            link.classList.add("text-[#660000]", "font-bold");
        } else {
            link.classList.remove("text-[#660000]", "font-bold");
        }
    });

    // 📌 Desktop About Dropdown
    if (aboutButton && aboutDropdown) {
        aboutButton.addEventListener("click", (event) => {
            event.stopPropagation();
            aboutDropdown.classList.toggle("hidden");
        });

        document.addEventListener("click", (event) => {
            if (!aboutButton.contains(event.target) && !aboutDropdown.contains(event.target)) {
                aboutDropdown.classList.add("hidden");
            }
        });
    }

    // 📌 Handle Page Navigation Without Reloading
    mobileLinks.forEach(link => {
        link.addEventListener("click", (event) => {
            event.preventDefault();

            const pageUrl = link.getAttribute("href");

            fetch(pageUrl)
                .then(response => response.text())
                .then(data => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(data, "text/html");
                    const newContent = doc.getElementById("content");

                    if (newContent) {
                        contentDiv.innerHTML = newContent.innerHTML;
                        window.history.pushState(null, "", pageUrl);

                        // ✅ If Home Page is loaded, restart hero animation
                        if (pageUrl.includes("home")) {
                            startHeroAnimation();
                        }
                    } else {
                        console.error("Error: #content not found in the fetched page.");
                    }
                })
                .catch(error => console.error("Error loading page:", error));
        });
    });

    // 📌 Handle Browser Navigation (Back/Forward)
    window.addEventListener("popstate", () => {
        fetch(window.location.href)
            .then(response => response.text())
            .then(data => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(data, "text/html");
                const newContent = doc.getElementById("content");

                if (newContent) {
                    contentDiv.innerHTML = newContent.innerHTML;

                    // ✅ Restart hero animation if returning to home
                    if (window.location.href.includes("home")) {
                        startHeroAnimation();
                    }
                }
            })
            .catch(error => console.error("Error handling history state:", error));
    });

    // 📌 Restart Hero Section Animation After Page Load
    function startHeroAnimation() {
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
        }

        updateText();
        setInterval(() => {
            slides[currentSlide].classList.remove('active');
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].classList.add('active');
            updateText();
        }, 5000);
    }

    // ✅ Ensure Hero Animation Starts on Page Load
    startHeroAnimation();

    // 📌 Floating Button & Notifications
    const floatingButton = document.getElementById("floatingButton");
    const toggleButton = document.getElementById("toggleButton");
    const closeFloatingButton = document.getElementById("closeFloatingButton");
    const notificationPanel = document.getElementById("notificationPanel");
    const closePanel = document.getElementById("closePanel");

    let isOpen = false;
    let isManuallyClosed = false;

    function startShaking() {
        setInterval(() => {
            if (!isOpen && !isManuallyClosed) {
                floatingButton.classList.add("shake");
                setTimeout(() => floatingButton.classList.remove("shake"), 400);
            }
        }, 5000);
    }

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

    toggleButton.addEventListener("click", () => {
        notificationPanel.classList.remove("right-[-320px]");
        notificationPanel.classList.add("right-4");
        isOpen = true;
    });

    closePanel.addEventListener("click", () => {
        notificationPanel.classList.remove("right-4");
        notificationPanel.classList.add("right-[-320px]");
        isOpen = false;
    });

    closeFloatingButton.addEventListener("click", () => {
        floatingButton.classList.add("hidden");
        isManuallyClosed = true;
        setTimeout(() => {
            isManuallyClosed = false;
            toggleVisibility();
        }, 600000);
    });

    startShaking();
    toggleVisibility();

    // 📌 Notice Marquee Scrolling
    const notices = [
        "🔥 Worship Night on March 15, 7:00 PM",
        "🙏 Join the Saturday Fellowship at 5:00 PM",
        "🎉 Youth Meeting this Friday at 6:00 PM",
        "📢 Sunday Service starts at 10:00 AM",
        "🎶 Choir Rehearsal on Saturday at 4:00 PM",
        "🛐 Intercessory Prayers on Tuesday at 5:00 PM",
        "📖 Bible Study every Wednesday at 6:00 PM",
        "💰 Giving & Offerings: Support the ministry via Till Number: 654321",
        "📞 Need assistance? Call: +254 700 123 456"
    ];

    const marquee = document.getElementById("marquee");

    function populateNotices() {
        marquee.innerHTML = "";
        notices.forEach((text) => {
            const span = document.createElement("span");
            span.classList.add("notice");
            span.textContent = text;
            marquee.appendChild(span);
        });
    }

    populateNotices();
});
