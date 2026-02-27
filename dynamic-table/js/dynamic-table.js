document.addEventListener("DOMContentLoaded", () => {
    function reindexRows(table) {
        table.querySelectorAll(".cloneRow").forEach((row, i) => {
            row.querySelectorAll("[name]").forEach((el) => {
                el.name = el.name.replace(/\[\d+\]/g, `[${i}]`);
            });
            const counter = row.querySelector(".counter");
            if (counter) {
                counter.textContent = i + 1;
            }
        });
    }

    document.addEventListener("click", (e) => {
        /* ADD ROW */
        const addBtn = e.target.closest(".addRow");
        if (addBtn) {
            e.preventDefault();

            const table = addBtn.closest(".dynamicTable");
            const firstRow = table.querySelector(".cloneRow");
            const index = table.querySelector(".counter");
            const container = table.querySelector(".appendClone");
            if (!firstRow || !container) return;

            const clone = firstRow.cloneNode(true);

            /* reset inputs */
            clone.querySelectorAll("input, textarea").forEach((el) => {
                if (el.type === "checkbox" || el.type === "radio") {
                    el.checked = false;
                } else {
                    el.value = "";
                }
            });

            clone.querySelectorAll("select").forEach((el) => {
                el.selectedIndex = 0;
            });

            clone.querySelectorAll("[id]").forEach((el) => {
                el.removeAttribute("id");
            });

            clone.style.opacity = "0";
            clone.style.transition = "all .5s ease";
            clone.style.transform = "translateY(-10px)";

            container.prepend(clone);
            //container.appendChild(clone);

            requestAnimationFrame(() => {
                clone.style.opacity = "1";
                clone.style.transform = "translateY(0)";
            });
            reindexRows(table);
        }

        /* DELETE ROW */
        const delBtn = e.target.closest(".deleteRow");
        if (delBtn) {
            e.preventDefault();

            const table = delBtn.closest(".dynamicTable");
            const rows = table.querySelectorAll(".cloneRow");

            if (rows.length <= 1) {
                alert("At least one row must remain.");
                return;
            }

            const row = delBtn.closest(".cloneRow");

            /* delete animation */
            row.style.transition = "all .5s ease";
            row.style.transform = "translateY(-10px)";
            row.style.opacity = "0";

            setTimeout(() => {
                row.remove();
                reindexRows(table);
            }, 200);
        }
    });
});