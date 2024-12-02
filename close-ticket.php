<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Maintenance Ticket Issue Tracker</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        /* Body and overall layout */
        html, body {
            height: 100%; /* Ensures full height of the viewport */
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            flex-direction: column;
            overflow: hidden; /* Prevent scrolling */
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
            padding-top: 20px;
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
            background-color: #ffd700;
            color: #003366;
        }

        /* Main content area */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 40px); /* Adjusted to fit within the viewport, considering padding */
        }

        /* Content box style */
        /* Container for centering content */
        .container {
            display: flex;
            justify-content: center; /* Horizontally center the content */
            align-items: center; /* Vertically center the content */
            height: 100%; /* Ensure the container takes full height */
            width: 100%; /* Ensure the container takes full width */
            padding-top: 30px; /* Adjust this if needed for header space */
            padding-bottom: 30px; /* Adjust this if needed for footer space */
        }

        /* Content box styling */
        .content-box {
            background-color: #a8e8de;
            padding: 20px; /* Equal padding on all sides */
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px; /* Limit the maximum width */
            box-sizing: border-box;
            margin-top: 0; /* Remove margin-top to position it near the header */
            max-height: 90vh; /* Allow content box to take up maximum 80% of the viewport height */
            overflow-y: auto; /* Enable vertical scrolling */
        }

        /* Custom scrollbar styles (for modern browsers) */
        .content-box::-webkit-scrollbar {
            display: none; /* Hide scrollbar */
        }

        /* Hide scrollbar in WebKit browsers */
        .main-content::-webkit-scrollbar,
        .content-box::-webkit-scrollbar {
            display: none; /* Hides the scrollbar */
        }

        .asset-details-box {
            background-color: #e3f2fd;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .btn-custom {
            font-size: 1rem;
            padding: 10px 25px;
            border-radius: 5px;
            text-transform: uppercase;
            font-weight: 500;
            border: 1px solid #000000;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #f467cc;
            color: white;
        }

        .btn-primary:hover {
            background: #4e73df;
        }

        /* For mobile responsiveness */
        @media (max-width: 768px) {
            .content-box {
                padding: 25px;
                width: 100%;
                margin: 0 15px;
            }

            .btn-custom {
                font-size: 1rem;
                padding: 10px 20px;
            }

            .container {
                max-width: 100%;
            }

            /* Sidebar collapse in smaller screens */
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main-content {
                margin-left: 0;
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
        <div class="container mt-5">

            <!-- Ticket Form -->
            <div class="content-box">
                <h2 class="text-center"> Close Ticket</h2>

                <form id="ticketForm" onsubmit="return submitTicket(event)">
                    <div class="form-group">
                        <label for="assetId">Ticket No</label>
                        <input type="text" class="form-control" id="assetId" placeholder="Enter Asset ID" required>
                    </div>

                    <button type="button" class="btn btn-primary btn-custom" onclick="fetchAssetDetails()">Fetch</button>

                    <!-- Asset Details Box -->
                    <div id="assetDetailsBox" class="asset-details-box" style="display: none;">
                        <h5>Asset Details</h5>
                        <p><strong>Asset ID:</strong> <span id="assetDetailsId"></span></p>
                        <p><strong>Description:</strong> <span id="assetDescription"></span></p>
                    </div>

                    <!-- Problem Description Box -->
                    <div class="form-group mt-3">
                        <label for="Problem Description">Closing Description</label>
                        <textarea class="form-control" id="Problem Description" rows="4" placeholder="Enter any additional information or remarks"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="priority">Status</label>
                        <select class="form-control" id="Completed" required>
                            <option value="Pending">Pending</option>
                            <option value="On Prossing">On Prossing</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>

                    <div class="form-group d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary btn-custom">Submit</button>
                        <button type="reset" class="btn btn-secondary btn-custom">Reset</button>
                        <button type="button" class="btn btn-danger btn-custom" onclick="cancelTicket()">Cancel</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
        // Function to simulate fetching asset details
        function fetchAssetDetails() {
            // Get the asset ID value
            const assetId = document.getElementById('assetId').value;

            if (assetId === "") {
                alert("Please enter an Asset ID.");
                return;
            }

            // Simulate generating an issue description based on the asset ID
            const dummyDescription = "The asset with ID " + assetId + " is experiencing technical issues, please investigate.";

            // Display asset details in a separate box
            document.getElementById('assetDetailsId').textContent = assetId;
            document.getElementById('assetDescription').textContent = dummyDescription;

            // Show the Asset Details Box
            document.getElementById('assetDetailsBox').style.display = 'block';

            // Automatically populate the problem description field with the generated issue
            document.getElementById('Problem Description').value = dummyDescription;
        }

        // Function to handle ticket submission
        function submitTicket(event) {
            event.preventDefault();

            const assetId = document.getElementById('assetId').value;
            const description = document.getElementById('Problem Description').value;
            const department = document.getElementById('department').value;
            const priority = document.getElementById('priority').value;

            console.log("Ticket Submitted:");
            console.log("Asset ID: " + assetId);
            console.log("Problem Description: " + description);
            console.log("Department: " + department);
            console.log("Priority: " + priority);
        }

        // Function to handle ticket cancellation
        function cancelTicket() {
            // Reset the form and hide the asset details box
            document.getElementById('ticketForm').reset();
            document.getElementById('assetDetailsBox').style.display = 'none';
        }
    </script>
</body>

</html>
