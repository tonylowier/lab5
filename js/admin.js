document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('modal');
    const modalContent = document.getElementById('modalContent');
    const modalForm = document.getElementById('modalForm');
    const closeModal = document.getElementById('closeModal');
    const openAddModal = document.getElementById('openAddModal');
    const editButtons = document.querySelectorAll('.editBtn');
    const deleteButtons = document.querySelectorAll('.deleteBtn');
    
    closeModal.onclick = function() {
        modal.style.display = 'none';
    };
    
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    };
    
    openAddModal.onclick = function() {
        modal.style.display = 'block';
        modalForm.reset();
        modalForm.querySelector('#modalAction').value = 'add';
    };

    editButtons.forEach(button => {
        button.onclick = function() {
            const id = this.getAttribute('data-id');
            fetch(`fetch_record.php?table=${modalForm.table.value}&id=${id}`)
                .then(response => response.json())
                .then(data => {
                    Object.keys(data).forEach(key => {
                        if (modalForm.elements[`data[${key}]`]) {
                            modalForm.elements[`data[${key}]`].value = data[key];
                        }
                    });
                    modalForm.querySelector('#modalId').value = id;
                    modalForm.querySelector('#modalAction').value = 'edit';
                    modal.style.display = 'block';
                });
        };
    });
    
    deleteButtons.forEach(button => {
        button.onclick = function() {
            const id = this.getAttribute('data-id');
            if (confirm('Are you sure you want to delete this record?')) {
                fetch('admin.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: `action=delete&table=${modalForm.table.value}&id=${id}`
                })
                .then(() => location.reload());
            }
        };
    });
});
