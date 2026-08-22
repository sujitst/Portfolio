/* ===================================================================================
    TEMPLATE      : Dynamic Portfolio Interface
    PROJECT       : Laravel SPA
    VERSION       : 1.0.0
    DEVELOPER     : Sujit Das
    DESCRIPTION   : Personal Portfolio using modern frontend & backend stack
    RELEASE DATE  : February 21, 2026
    LICENSE       : MIT
    WEBSITE       : https://ombyte.net
* ================================================================= © ombyte.net === */

document.addEventListener("DOMContentLoaded", function() {

    /* ===============|| 1. SIDEBAR LINKS: Smooth Scroll + Active Link ||=============== */
    const sectionIds = ["home", "about", "experience","gallery", "service", "work", "testimonial", "blog", "faq", "contact"];
    const navLinks = document.querySelectorAll(".sidebar_link");

    navLinks.forEach(link => {
        link.addEventListener("click", (e) => {
            e.preventDefault();
            const targetId = link.getAttribute("href").substring(1);
            const targetSection = document.getElementById(targetId);
            if(!targetSection) return;

            targetSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            navLinks.forEach(l => l.classList.remove("link_active"));
            link.classList.add("link_active");
        });
    });

    const observerOptions = {
        root: null,
        rootMargin: "0px",
        threshold: 0.6 
    };

    const observerCallback = (entries) => {
        entries.forEach(entry => {
            if(entry.isIntersecting){
                const id = entry.target.id;
                navLinks.forEach(link => {
                    link.classList.remove("link_active");
                    if(link.getAttribute("href") === "#" + id){
                        link.classList.add("link_active");
                    }
                });
            }
        });
    };

    const observer = new IntersectionObserver(observerCallback, observerOptions);
    sectionIds.forEach(id => {
        const section = document.getElementById(id);
        if(section) observer.observe(section);
    });



    
    /* ===============|| 2. SIDEBAR MENU TOGGLE ||=============== */
    const body = document.body;
    const toggleBtn = document.getElementById('menuToggle');
    const overlay = document.getElementById('overlay'); 
    const sidebar = document.getElementById('sidebar');
    const closeBtn = document.getElementById('closeBtn');
    let lastFocused = null;

    function openMenu() {
        lastFocused = document.activeElement;
        body.classList.add('menu-open');
        toggleBtn?.setAttribute('aria-expanded', 'true');
        if(overlay) overlay.style.display = 'block';
        (sidebar?.querySelector('a, button') || closeBtn)?.focus();
    }

    function closeMenu() {
        body.classList.remove('menu-open');
        toggleBtn?.setAttribute('aria-expanded', 'false');
        if(overlay) overlay.style.display = 'none';
        if (lastFocused && typeof lastFocused.focus === 'function') lastFocused.focus();
        else toggleBtn?.focus();
    }

    toggleBtn?.addEventListener('click', openMenu);
    closeBtn?.addEventListener('click', closeMenu);
    overlay?.addEventListener('click', closeMenu);
    document.addEventListener('keydown', (e) => { if(e.key === 'Escape') closeMenu(); });




    /* ===============|| 3. COLOR SETTINGS POPUP ||=============== */
    const settingsBtn = document.getElementById('settingsBtn');
    const colorPopup = document.getElementById('colorPopup');
    const popupClose = document.getElementById('popupClose');
    const bgTarget = document.getElementById('bgTarget');
    const textTarget = document.getElementById('textTarget');

    if (settingsBtn && colorPopup && popupClose && overlay) {

        const closePopup = () => {
            colorPopup.classList.remove('active');
            overlay.style.display = 'none';
        };

        settingsBtn.addEventListener('click', () => {
            colorPopup.classList.add('active');
            overlay.style.display = 'block';
        });

        popupClose.addEventListener('click', closePopup);
        overlay.addEventListener('click', closePopup);

        /* =====|| LOAD SESSION COLORS */
        const savedBg = sessionStorage.getItem('bgColor');
        const savedText = sessionStorage.getItem('textColor');

        if (savedBg && bgTarget) bgTarget.style.backgroundColor = savedBg;
        if (savedText && textTarget) textTarget.style.color = savedText;

        /* =====|| BACKGROUND COLOR CHANGE */
        document.querySelectorAll('#bgColors .color_dot_item').forEach(dot => {
            dot.addEventListener('click', e => {
                const color = e.target.dataset.color || "";
                if (bgTarget) bgTarget.style.backgroundColor = color;
                sessionStorage.setItem('bgColor', color);
            });
        });

        /* =====|| TEXT COLOR CHANGE */
        document.querySelectorAll('#textColors .color_dot_item').forEach(dot => {
            dot.addEventListener('click', e => {
                const color = e.target.dataset.color || "";
                if (textTarget) textTarget.style.color = color;
                sessionStorage.setItem('textColor', color);
            });
        });

        /* =====|| RESET COLORS */
        document.querySelector('.reset-bg')?.addEventListener('click', () => {
            if (bgTarget) bgTarget.style.backgroundColor = "";
            sessionStorage.removeItem('bgColor');
        });

        document.querySelector('.reset-text')?.addEventListener('click', () => {
            if (textTarget) textTarget.style.color = "";
            sessionStorage.removeItem('textColor');
        });
    }





    /* ===============|| 4. SCROLL TO TOP BUTTON ||=============== */
    const btnGoTop = document.getElementById("btnGoTop");
    const scrollContainer = document.querySelector('.layout_content') || window;

    const getScrollTop = () => scrollContainer === window ? window.scrollY : scrollContainer.scrollTop;
    const scrollToTop = () => { 
        if(scrollContainer === window) window.scrollTo({ top:0, behavior:'smooth' });
        else scrollContainer.scrollTo({ top:0, behavior:'smooth' });
    };

    if(btnGoTop){
        const toggleBtn = () => { getScrollTop() > 100 ? btnGoTop.style.display="block" : btnGoTop.style.display="none"; };
        scrollContainer.addEventListener("scroll", toggleBtn);
        toggleBtn();
        btnGoTop.addEventListener("click", scrollToTop);
    }




    /* ===============|| 5. ISOTOPE OR FANCYBOX ||=============== */
    var iso = new Isotope('.gallery', {
        itemSelector: '.gallery-item',
        layoutMode: 'fitRows'
    });
    var filterButtons = document.querySelectorAll('.filter-buttons button');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            var filterValue = this.getAttribute('data-filter');
            iso.arrange({ filter: filterValue });
        });
    });




    /* ===============|| 6. RIPPLE USE IN BACKGROUN ||=============== */
    const rippleArea = document.querySelector('.ripple_area');

    rippleArea.addEventListener('mousemove', function(e) {
        const ripple = document.createElement('span');
        ripple.classList.add('ripple');

        const rect = rippleArea.getBoundingClientRect();
        ripple.style.left = (e.clientX - rect.left - 10) + 'px';
        ripple.style.top = (e.clientY - rect.top - 10) + 'px';
        ripple.style.width = '20px';
        ripple.style.height = '20px';

        rippleArea.appendChild(ripple);

        ripple.addEventListener('animationend', () => ripple.remove());
    }); 
    
    


    /* ===============|| 7. OWL CAROUSEL JS ||=============== */
   $(document).ready(function(){

        //=====|| PROJECT CAROUSEL
        $("#projectCarousel").owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            autoplay: false,
            autoplayTimeout: 2000,
            responsive: {
                0: { items: 1 },
                600: { items: 2 },
                1000: { items: 2 },
                1026: { items: 3 }
            },
            navText: [
                '<i class="fa fa-arrow-circle-left" aria-hidden="true"></i>',
                '<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>'
            ]
        });


        //=====|| BLOG CAROUSEL
        $("#blogcarcual").owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            autoplay: false,
            autoplayTimeout: 2000,
            responsive: {
                0: { items: 1 },
                600: { items: 2 },
                1000: { items: 2 },
                1026: { items: 3 }
            },
            navText: [
                '<i class="fa fa-dot-circle-o" aria-hidden="true"></i>',
                '<i class="fa fa-dot-circle-o" aria-hidden="true"></i>'
            ]
        });
    });


    

    /* ===============|| 8. FRQUENTLY ASKED QUESTIONS ||=============== */
    document.querySelectorAll(".faq_item button").forEach(btn => {
        btn.addEventListener("click", () => {
            const item = btn.parentElement;

            document.querySelectorAll(".faq_item").forEach(i => {
                if (i !== item) i.classList.remove("active");
            });

            item.classList.toggle("active");

            document.querySelectorAll(".faq_item .icon i").forEach(icon => {
            const parentItem = icon.closest(".faq_item");
                if (parentItem.classList.contains("active")) {
                    icon.classList.remove("fa-plus");
                    icon.classList.add("fa-minus");
                } else {
                    icon.classList.remove("fa-minus");
                    icon.classList.add("fa-plus");
                }
            });
        });
    });  
});