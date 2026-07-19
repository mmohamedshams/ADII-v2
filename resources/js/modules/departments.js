function appendDepartmentRow(department) {

    const tbody = document.getElementById('departmentsTableBody');

    const emptyRow = document.getElementById('emptyRow');

    if (emptyRow) {
        emptyRow.remove();
    }

    const row = `
        <tr id="department-${department.id}">

            <td>#</td>

            <td>${department.name}</td>

            <td>${department.code}</td>

            <td>${department.status ? 'Active' : 'Inactive'}</td>

            <td>

                <button
                    class="btn btn-warning btn-sm edit-btn"
                    data-id="${department.id}">
                    Edit
                </button>

                <button
                    class="btn btn-danger btn-sm delete-btn"
                    data-id="${department.id}">
                    Delete
                </button>

            </td>

        </tr>
    `;

    tbody.insertAdjacentHTML('afterbegin', row);

}
const form = document.getElementById('departmentForm');

if (form) {

    form.addEventListener('submit', async function (e) {

        e.preventDefault();

        const formData = new FormData(form);

        try {

            const response = await fetch('/departments', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json'
                },
                body: formData
            });

            const result = await response.json();

            if (result.status) {

                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: result.message,
                    timer: 1500,
                    showConfirmButton: false
                });

                form.reset();

                const modal = bootstrap.Modal.getInstance(
                    document.getElementById('addDepartmentModal')
                );

                modal.hide();

                setTimeout(() => {
                    location.reload();
                }, 1500);

            }

        } catch (error) {

            console.error(error);

            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Something went wrong.'
            });

        }

    });

}