<div class="container mt-5">
    <h1 class="mb-4 text-center">Admin Reports</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped" id="tableData">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Severity</th>
                <th>Date Submitted</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody id="tableList">


            </tbody>

        </table>
    </div>

</div>



<script>


    getList();


    async function getList() {

        showLoader();
        let res = await axios.get('/adminReports');
        hideLoader();

        let tableList = $("#tableList");
        let tableData = $("#tableData");

        // Destroy existing DataTable if it exists
        if ($.fn.DataTable.isDataTable('#tableData')) {
            tableData.DataTable().destroy();
        }

        // Clear table body
        tableList.empty();

        // Append all rows at once
        res.data.forEach(function (item, index) {

            // Truncate title to first 5-6 words
            let truncatedTitle = item['title'].split(' ').slice(0, 3).join(' ');
            if (item['title'].split(' ').length > 3) {
                truncatedTitle += '...';
            }

            // Truncate description to first 5-6 words
            let truncatedDesc = item['description'].split(' ').slice(0, 3).join(' ');
            if (item['description'].split(' ').length > 3) {
                truncatedDesc += '...';
            }

            // Determine badge color for severity
            let severityClass = '';
            if (item['severity'] === "1" || item['severity'] === "High") {
                severityClass = 'bg-danger';  // Red for High
            } else if (item['severity'] === "2" || item['severity'] === "Medium") {
                severityClass = 'bg-warning'; // Yellow for Medium
            } else {
                severityClass = 'bg-success'; // Green for Low
            }

            let row = `<tr id="row_${item['id']}">
            <td>${index + 1}</td>
            <td>${truncatedTitle}</td>
            <td>${truncatedDesc}</td>
            <td>
            <div class="status-selector">
    <select name="reportStatus_${item['id']}" id="reportStatus_${item['id']}"
            class="form-select form-select-sm status-dropdown ${item['status'] === 0 ? 'border-warning text-warning' : 'border-success text-success'}"
            style="background-color: ${item['status'] === 0 ? '#fff8e1' : '#e8f5e9'}; font-weight: 500;">
        <option value="0" data-badge="warning" ${item['status'] === 0 ? 'selected' : ''}>Under Review</option>
        <option value="1" data-badge="success" ${item['status'] === 1 ? 'selected' : ''}>Resolved</option>
    </select>
</div>
            </td>
             <td><span class="badge ${severityClass}">${item['severity']}</span></td>
            <td>${item['created_at']}</td>
            <td>
                <div class="d-flex">
                    <button data-id="${item['id']}"  class="btn detailBtn btn-primary btn-sm me-2" >Details</button>
                    <button data-id="${item['id']}" data-row-id="${item['id']}" class="btn updateBtn btn-success btn-sm update-btn">Update</button>
                </div>
            </td>
        </tr>`;

            tableList.append(row);
        });

        // Add this after you append all rows (before DataTable initialization)
        $('.status-dropdown').on('change', function() {
            const value = $(this).val();
            if (value === "0") {
                $(this).removeClass('border-success text-success').addClass('border-warning text-warning');
                $(this).css('background-color', '#fff8e1');
            } else {
                $(this).removeClass('border-warning text-warning').addClass('border-success text-success');
                $(this).css('background-color', '#e8f5e9');
            }
        });

        // Attach click event handlers to detail buttons
        $('.detailBtn').on('click', async function() {
            let id = $(this).data('id');
            await displayInfo(id);
            $("#reportDetailsModal").modal('show');
        });

        $('.updateBtn').on('click', async function(){
            let id = $(this).data('id');

            // Get the status value from the dropdown
            let statusValue = $(`#reportStatus_${id}`).val();

            // Update the hidden inputs in the modal
            $("#updateID").val(id);
            $("#updateStatus").val(statusValue);

            await FillUpUpdateForm(id, statusValue);
            $("#update-modal").modal('show');
        });

        // Initialize DataTable ONCE after appending all rows
        new DataTable('#tableData', {
            order: [[0, 'desc']],
            lengthMenu: [5, 10, 15, 20, 30]
        });
    }

</script>
