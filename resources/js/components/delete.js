export function confirmDelete(deleteUrl) {
    const modal = new bootstrap.Modal(document.getElementById("deleteModal"));
    const form = document.getElementById("deleteForm");
    form.setAttribute("action", deleteUrl);
    modal.show();
}
