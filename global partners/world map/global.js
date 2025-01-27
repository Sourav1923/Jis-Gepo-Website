document.addEventListener("DOMContentLoaded", () => {
    const pins = document.querySelectorAll(".pin");
    const panels = document.querySelectorAll(".detail-panel");

    // Show a specific panel
    function showPanel(panelId) {
        panels.forEach(panel => panel.classList.remove("active"));
        const panel = document.getElementById(panelId);
        if (panel) panel.classList.add("active");
    }

    // Close all panels
    function closePanels() {
        panels.forEach(panel => panel.classList.remove("active"));
    }

    // Add click event to pins
    pins.forEach(pin => {
        pin.addEventListener("click", (event) => {
            event.stopPropagation(); // Prevent the event from bubbling up
            const name = pin.dataset.name;
            showPanel(`${name}-panel`);
        });
    });

    // Add close button functionality
    panels.forEach(panel => {
        const closeBtn = document.createElement("span");
        closeBtn.classList.add("close-btn");
        closeBtn.textContent = "×";
        closeBtn.addEventListener("click", (event) => {
            event.stopPropagation(); // Prevent the event from bubbling up
            closePanels();
        });
        panel.appendChild(closeBtn);

        // Add navigation to a specific website when clicking the detail panel
        panel.addEventListener("click", (event) => {
            if (panel.id === "diu-panel") {
                window.location.href = "https://diu.ac/";
            }
        });
        panel.addEventListener("click", (event) => {
            if (panel.id === "assocham-panel") {
                window.location.href = "https://www.assocham.org/";
            }
        });
        panel.addEventListener("click", (event) => {
            if (panel.id === "ait-panel") {
                window.location.href = "https://ait.ac.th/";
            }
        });
        panel.addEventListener("click", (event) => {
            if (panel.id === "esigelec-panel") {
                window.location.href = "https://en.esigelec.fr/";
            }
        });
        panel.addEventListener("click", (event) => {
            if (panel.id === "mcn-panel") {
                window.location.href = "https://www.mcny.edu/";
            }
        });
      
    });

    // Close panels on scroll
    window.addEventListener("scroll", closePanels);
});