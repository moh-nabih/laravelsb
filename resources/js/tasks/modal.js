console.log("modal.js loaded");

export function openTaskModal(url) {
    fetch(url)
        .then((res) => res.text())
        .then((html) => {
            document.getElementById("taskModalBody").innerHTML = html;
            let taskModal = new bootstrap.Modal(
                document.getElementById("taskModal")
            );
            taskModal.show();
        });
}
