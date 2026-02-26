/**
 * Initialize all accordions on page
 * @param {string} selector - CSS selector for accordion container
 */
function initAccordions(selector = ".sgd-accordion") {
    document.querySelectorAll(selector).forEach((group) => {
        const color = group.dataset.color ? group.dataset.color : "#d1d5db";

        const items = group.querySelectorAll(".sgd-accordion-item");
        const buttons = group.querySelectorAll(".sgd-accordion-btn");

        // Apply accordion item borders
        items.forEach((item) => {
            item.style.setProperty("border-color", color, "important");
        });

        buttons.forEach((btn) => {
            const item = btn.parentElement;

            // Default open
            if (btn.dataset.default === "true") {
                item.classList.add("open");
            }

            // Apply button background, border, and text color
            btn.style.setProperty("background-color", color, "important");
            btn.style.setProperty("border-color", color, "important");
            btn.style.setProperty(
                "color",
                getContrastColor(color),
                "important",
            );

            // Click toggle: single-open per group
            btn.addEventListener("click", () => {
                items.forEach((i) => {
                    if (i !== item) i.classList.remove("open");
                });
                item.classList.toggle("open");
            });
        });
    });
}

/**
 * Returns either black or white for best contrast
 * Accepts any valid CSS color (named, hex, rgb, hsl)
 * @param {string} color
 * @returns {string} "#000" or "#fff"
 */
function getContrastColor(color) {
    const div = document.createElement("div");
    div.style.color = color;
    document.body.appendChild(div);

    const rgb = getComputedStyle(div).color;
    document.body.removeChild(div);

    const match = rgb.match(/\d+/g);
    if (!match) return "#000";

    const r = parseInt(match[0], 10) / 255;
    const g = parseInt(match[1], 10) / 255;
    const b = parseInt(match[2], 10) / 255;

    const a = [r, g, b].map((v) =>
        v <= 0.03928 ? v / 12.92 : Math.pow((v + 0.055) / 1.055, 2.4),
    );
    const luminance = 0.2126 * a[0] + 0.7152 * a[1] + 0.0722 * a[2];

    return luminance > 0.5 ? "#000" : "#fff";
}

// Initialize on DOM ready
document.addEventListener("DOMContentLoaded", () => initAccordions());
