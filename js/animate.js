const modules = document.querySelectorAll(".module");

const observer = new IntersectionObserver(
    entries => {
        entries.forEach(entry => {
            if(!entry.target.classList.contains("animate")) {
                entry.target.classList.toggle("animate", entry.isIntersecting);
                if(entry.isIntersecting) observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.4,
    }
);

modules.forEach(module => {
    observer.observe(module);
});
