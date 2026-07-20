<div class="modal fade" id="addDepartmentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <form id="departmentForm">

                @csrf
                <input type="hidden" id="department_id" name="department_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="departmentModalTitle">
    Add Department
</h5>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal">
                    </button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label>Name</label>

                        <input type="text"
                        id="name"
                               name="name"
                               class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Code</label>

                        <input type="text"
                        id="code"
                               name="code"
                               class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Description</label>

                        <textarea name="description"
                        id="description"
                                  class="form-control"></textarea>
                    </div>

                </div>

                <div class="modal-footer">

                    <button class="btn btn-secondary"
                            data-bs-dismiss="modal"
                            type="button">
                        Close
                    </button>

                    <button type="submit" class="btn btn-primary" id="saveDepartmentBtn">
    Save
</button>

                </div>

            </form>

        </div>
    </div>
</div>
