
function removeDepartmentRow(id) {

    const row = document.getElementById(`department-${id}`);

    if (row) {
        row.remove();
    }

    const tbody = document.getElementById('departmentsTableBody');

    if (tbody.children.length === 0) {

        tbody.innerHTML = `
            <tr id="emptyRow">
                <td colspan="5" class="text-center">
                    No Departments Found
                </td>
            </tr>
        `;
    }

}
function updateDepartmentRow(department) {

    const row = document.getElementById(`department-${department.id}`);

    if (!row) return;

    row.innerHTML = `
        <td>${row.cells[0].innerText}</td>

        <td>${department.name}</td>

        <td>${department.code}</td>

        <td>${department.status ? 'Active' : 'Inactive'}</td>

        <td>

            <button
                type="button"
                class="btn btn-warning btn-sm editDepartmentBtn"
                data-id="${department.id}">
                Edit
            </button>

            <button
                type="button"
                class="btn btn-danger btn-sm deleteDepartmentBtn"
                data-id="${department.id}">
                Delete
            </button>

        </td>
    `;

}
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
                    type="button"
                    class="btn btn-warning btn-sm editDepartmentBtn"
                    data-id="${department.id}">
                    Edit
                </button>

                <button
                    type="button"
                    class="btn btn-danger btn-sm deleteDepartmentBtn"
                    data-id="${department.id}">
                    Delete
                </button>

            </td>

        </tr>
    `;

    tbody.insertAdjacentHTML('afterbegin', row);
}

// =========================
// CREATE / UPDATE
// =========================
function initCreateDepartment() {
const form = document.getElementById('departmentForm');

if (form) {

    form.addEventListener('submit', async function (e) {

        e.preventDefault();

        const departmentId = document.getElementById('department_id').value;

        const formData = new FormData(form);

        if (departmentId) {
            formData.append('_method', 'PUT');
        }

        const url = departmentId
            ? `/departments/${departmentId}`
            : '/departments';

        try {

            const response = await fetch(url, {
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

                if (departmentId) {

                    updateDepartmentRow(result.department);

                } else {

                    appendDepartmentRow(result.department);

                }

                form.reset();

                document.getElementById('department_id').value = '';

                document.getElementById('departmentModalTitle').innerText = 'Add Department';

                document.getElementById('saveDepartmentBtn').innerText = 'Save';

                const modal = bootstrap.Modal.getInstance(
                    document.getElementById('addDepartmentModal')
                );

                modal.hide();

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
}
// =========================
// EDIT
// =========================
function initEditDepartment() {
document.addEventListener('click', async function (e) {

    if (!e.target.classList.contains('editDepartmentBtn')) {
        return;
    }

    const id = e.target.dataset.id;

    const response = await fetch(`/departments/${id}`);

    const result = await response.json();

    const department = result.department;

    document.getElementById('department_id').value = department.id;

    document.getElementById('name').value = department.name;

    document.getElementById('code').value = department.code;

    document.getElementById('description').value = department.description ?? '';

    document.getElementById('departmentModalTitle').innerText = 'Edit Department';

    document.getElementById('saveDepartmentBtn').innerText = 'Update';

    const modal = new bootstrap.Modal(
        document.getElementById('addDepartmentModal')
    );

    modal.show();

});
}
// =========================
// DELETE
// =========================
function initDeleteDepartment() {
document.addEventListener('click', async function (e) {

    if (!e.target.classList.contains('deleteDepartmentBtn')) {
        return;
    }

    const id = e.target.dataset.id;

    const confirm = await Swal.fire({
        title: 'Are you sure?',
        text: 'This department will be deleted.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    });

    if (!confirm.isConfirmed) {
        return;
    }
 console.log('Confirmed');
    try {

        const formData = new FormData();
        formData.append('_method', 'DELETE');

        const response = await fetch(`/departments/${id}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                'Accept': 'application/json'
            },
            body: formData
        });

        const result = await response.json();

        if (result.status) {

            removeDepartmentRow(result.id);

            Swal.fire({
                icon: 'success',
                title: 'Deleted',
                text: result.message,
                timer: 1500,
                showConfirmButton: false
            });

        }

    } catch (error) {

        console.error(error);

        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Something went wrong.'
        });

    }

});}
initCreateDepartment();
initEditDepartment();
initDeleteDepartment();
