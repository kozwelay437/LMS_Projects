        AOS.init({
            duration: 1000,
            once: true,
            easing: 'ease-in-out'
        });

        // Sidebar active links with smooth scrolling
        document.querySelectorAll('.sidebar-btn').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const target = document.querySelector(targetId);
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
                document.querySelectorAll('.sidebar-btn').forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Scroll animation
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                    obs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.animate-on-scroll').forEach(el => observer.observe(el));

        // Update sidebar active state on scroll
        window.addEventListener('scroll', function () {
            let current = '';
            const sections = document.querySelectorAll('section[id]');

            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (pageYOffset >= (sectionTop - 150)) {
                    current = section.getAttribute('id');
                }
            });

            document.querySelectorAll('.sidebar-btn').forEach(btn => {
                btn.classList.remove('active');
                if (btn.getAttribute('href') === '#' + current) {
                    btn.classList.add('active');
                }
            });
        });