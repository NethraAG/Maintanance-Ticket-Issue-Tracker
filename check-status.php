<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Status</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #4e73df;
            color: white;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar a {
            padding: 15px 25px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            margin: 10px 0;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background-color: #98c9d5;
            color: #003366;
        }

        /* Main Content Area */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-grow: 1;
            min-height: 100vh;
            padding-top: 40px;
        }

        .container {
            background-color: #a8e8de;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1200px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #a39898;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        button {
            padding: 5px 10px;
            margin: 2px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
        }

        .cancel-btn {
            background-color: #ff4d4d;
            color: white;
        }

        .edit-btn {
            background-color: #a8e8de;
            color: black;
        }

        .save-btn {
            background-color: #4CAF50;
            color: white;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main-content {
                margin-left: 0;
                padding: 10px;
            }
        }
    </style>
</head>

<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <h2 class="text-center">Maintenance</h2>
    <a href="index.html">Home</a> <!-- Corrected path for home page inside tracker folder -->
    <a href="open-ticket.html">Open New Ticket</a> <!-- Corrected path for open new ticket page inside tracker folder -->
    <a href="check-status.html">Check Ticket Status</a> <!-- Corrected path for check ticket status page inside tracker folder -->
    <a href="close-ticket.html">Closing Ticket</a> <!-- Corrected path for close ticket page inside tracker folder -->
</div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <h2>View Status</h2>
            <table>
                <thead>
                    <tr>
                        <th>Ticket ID</th>
                        <th>Department</th>
                        <th>User</th>
                        <th>Solver</th>
                        <th>Status</th>
                        <th>Asset ID</th>
                        <th>Issue Description</th>
                        <th>Status Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="ticket-001">
                        <td>001</td>
                        <td>IS</td>
                        <td>John Doe</td>
                        <td>Jane Smith</td>
                        <td>Pending</td>
                        <td>
                            <span id="asset-id-001">A001</span>
                            <input type="text" id="input-asset-id-001" style="display:none;" value="A001" />
                        </td>
                        <td>
                            <span id="issue-description-001">The system is down for maintenance.</span>
                            <input type="text" id="input-issue-description-001" style="display:none;" value="The system is down for maintenance." />
                        </td>
                        <td>
                            <span id="status-description-001">The asset is awaiting approval.</span>
                            <input type="text" id="input-status-description-001" style="display:none;" value="The asset is awaiting approval." />
                        </td>
                        <td>
                            <button class="edit-btn" onclick="editAssetId('001')">Edit Asset ID</button>
                            <button class="edit-btn" onclick="editIssueDescription('001')">Edit Issue Description</button>
                            <button class="edit-btn" onclick="editStatusDescription('001')">Edit Status</button>
                            <button class="save-btn" style="display:none;" onclick="saveAllChanges('001')">Save</button>
                            <button class="cancel-btn" style="display:none;" onclick="cancelEdit('001')">Cancel</button>
                        </td>
                    </tr>
                    <tr id="ticket-002">
                        <td>002</td>
                        <td>CS</td>
                        <td>Mark Lee</td>
                        <td>Anna Bell</td>
                        <td>In Progress</td>
                        <td>
                            <span id="asset-id-002">A002</span>
                            <input type="text" id="input-asset-id-002" style="display:none;" value="A002" />
                        </td>
                        <td>
                            <span id="issue-description-002">Investigating the cause.</span>
                            <input type="text" id="input-issue-description-002" style="display:none;" value="Investigating the cause." />
                        </td>
                        <td>
                            <span id="status-description-002">The issue is being worked on.</span>
                            <input type="text" id="input-status-description-002" style="display:none;" value="The issue is being worked on." />
                        </td>
                        <td>
                            <button class="edit-btn" onclick="editAssetId('002')">Edit Asset ID</button>
                            <button class="edit-btn" onclick="editIssueDescription('002')">Edit Issue Description</button>
                            <button class="edit-btn" onclick="editStatusDescription('002')">Edit Status</button>
                            <button class="save-btn" style="display:none;" onclick="saveAllChanges('002')">Save</button>
                            <button class="cancel-btn" style="display:none;" onclick="cancelEdit('002')">Cancel</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Edit Asset ID
        function editAssetId(ticketId) {
            const assetId = document.getElementById(`asset-id-${ticketId}`);
            const inputField = document.getElementById(`input-asset-id-${ticketId}`);
            const saveButton = document.querySelector(`#ticket-${ticketId} .save-btn`);
            const cancelButton = document.querySelector(`#ticket-${ticketId} .cancel-btn`);
            const editButton = document.querySelector(`#ticket-${ticketId} .edit-btn`);

            assetId.style.display = 'none';
            inputField.style.display = 'inline';
            saveButton.style.display = 'inline';
            cancelButton.style.display = 'inline';
            editButton.style.display = 'none';
        }

        // Edit Issue Description
        function editIssueDescription(ticketId) {
            const issueDescription = document.getElementById(`issue-description-${ticketId}`);
            const inputField = document.getElementById(`input-issue-description-${ticketId}`);
            const saveButton = document.querySelector(`#ticket-${ticketId} .save-btn`);
            const cancelButton = document.querySelector(`#ticket-${ticketId} .cancel-btn`);
            const editButton = document.querySelector(`#ticket-${ticketId} .edit-btn`);

            issueDescription.style.display = 'none';
            inputField.style.display = 'inline';
            saveButton.style.display = 'inline';
            cancelButton.style.display = 'inline';
            editButton.style.display = 'none';
        }

        // Edit Status Description
        function editStatusDescription(ticketId) {
            const statusDescription = document.getElementById(`status-description-${ticketId}`);
            const inputField = document.getElementById(`input-status-description-${ticketId}`);
            const saveButton = document.querySelector(`#ticket-${ticketId} .save-btn`);
            const cancelButton = document.querySelector(`#ticket-${ticketId} .cancel-btn`);
            const editButton = document.querySelector(`#ticket-${ticketId} .edit-btn`);

            statusDescription.style.display = 'none';
            inputField.style.display = 'inline';
            saveButton.style.display = 'inline';
            cancelButton.style.display = 'inline';
            editButton.style.display = 'none';
        }

        // Save all changes
        function saveAllChanges(ticketId) {
            const inputFields = document.querySelectorAll(`#ticket-${ticketId} input[type='text']`);
            const textSpans = document.querySelectorAll(`#ticket-${ticketId} span`);

            inputFields.forEach((input, index) => {
                textSpans[index].textContent = input.value;
                input.style.display = 'none';
                textSpans[index].style.display = 'inline';
            });

            const saveButton = document.querySelector(`#ticket-${ticketId} .save-btn`);
            const cancelButton = document.querySelector(`#ticket-${ticketId} .cancel-btn`);
            const editButton = document.querySelector(`#ticket-${ticketId} .edit-btn`);

            saveButton.style.display = 'none';
            cancelButton.style.display = 'none';
            editButton.style.display = 'inline';
        }

        // Cancel editing
        function cancelEdit(ticketId) {
            const inputFields = document.querySelectorAll(`#ticket-${ticketId} input[type='text']`);
            const textSpans = document.querySelectorAll(`#ticket-${ticketId} span`);

            inputFields.forEach((input, index) => {
                input.style.display = 'none';
                textSpans[index].style.display = 'inline';
            });

            const saveButton = document.querySelector(`#ticket-${ticketId} .save-btn`);
            const cancelButton = document.querySelector(`#ticket-${ticketId} .cancel-btn`);
            const editButton = document.querySelector(`#ticket-${ticketId} .edit-btn`);

            saveButton.style.display = 'none';
            cancelButton.style.display = 'none';
            editButton.style.display = 'inline';
        }
    </script>

</body>

</html>
