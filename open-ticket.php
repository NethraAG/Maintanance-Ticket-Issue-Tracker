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
            align-items: flex-start;
            height: calc(100vh - 40px); /* Adjusted to fit within the viewport, considering padding */
            overflow-y: scroll; /* Enable vertical scrolling */
            -ms-overflow-style: none; /* Internet Explorer 10+ */
            scrollbar-width: none; /* Firefox */
        }

        .main-content::-webkit-scrollbar {
            display: none; /* Hides scrollbar for Webkit browsers */
        }

        /* Content box style */
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
            -ms-overflow-style: none; /* Internet Explorer 10+ */
            scrollbar-width: none; /* Firefox */
        }

        /* Custom scrollbar styles (for modern browsers) */
        .content-box::-webkit-scrollbar {
            display: none; /* Hide scrollbar */
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
    <a href="index.html">Home</a>
    <a href="open-ticket.html">Open New Ticket</a>
    <a href="check-status.html">Check Ticket Status</a>
    <a href="close-ticket.html">Closing Ticket</a>
</div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container mt-5">

            <!-- Ticket Form -->
            <div class="content-box">
                <h2 class="text-center">Create New Ticket</h2>

                <!-- Updated Form to POST to connect.php -->
                <form id="ticketForm" action="connect.php" method="POST">
                    <div class="form-group">
                        <label for="AssetID">Asset ID</label>
                        <input type="text" class="form-control" id="AssetID" placeholder="Enter Asset ID" name="AssetID" required>
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
                        <label for="Problem Description">Problem Description</label>
                        <textarea class="form-control" id="ProblemDescription" rows="4" placeholder="Enter any additional information or remarks" name="ProblemDescription"></textarea>
                    </div>

                    <!-- Department and Priority -->
                    <div class="form-group">
                        <label for="department">Department</label>
                        <select class="form-control" id="department" name="Department" required>
                            <option value="Mng">Management (Mng)</option>
                            <option value="IS">Information Science (IS)</option>
                            <option value="CS">Computer Science (CS)</option>
                            <option value="EE">Electrical Engineering (EE)</option>
                            <option value="EC">Electronics Engineering (EC)</option>
                            <option value="MC">Mechanical Engineering (MC)</option>
                            <option value="CV">Civil Engineering (CV)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="priority">Priority </label>
                        <select class="form-control" id="priority" name="Priority" required>
                            <option value="high">High</option>
                            <option value="medium">Medium</option>
                            <option value="low">Low</option>
                            <option value="emergency">Emergency</option>
                        </select>
                    </div>

                    <!-- Phone number input -->
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" placeholder="Enter your phone number" name="PhoneNumber" required>
                    </div>

                    <!-- Additional Phone Number -->
                    <div id="additionalPhoneContainer"></div>

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
        // Function to generate a random Ticket ID (6 characters: uppercase letters and numbers)
        function generateTicketId() {
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            let ticketId = '';
            for (let i = 0; i < 6; i++) {
                ticketId += characters.charAt(Math.floor(Math.random() * characters.length));
            }
            return ticketId;
        }

        // Function to display ticket ID and show an additional phone number input
        function submitTicket(event) {
            event.preventDefault(); // Prevent the form from submitting normally
            
            // Generate ticket ID
            const ticketId = generateTicketId();

            // Display ticket ID
            alert(`Ticket ID: ${ticketId}`);
            
            // Show additional phone number input
            const additionalPhoneContainer = document.getElementById('additionalPhoneContainer');
        }

        // Function to fetch asset details
        function fetchAssetDetails() {
            const assetId = document.getElementById('AssetID').value;

            if (assetId) {
                // Simulate fetching asset details
                document.getElementById('assetDetailsId').innerText = assetId;
                document.getElementById('assetDescription').innerText = 'Asset description will be here.';
                document.getElementById('assetDetailsBox').style.display = 'block';
            }
        }

        // Function to cancel the ticket creation
        function cancelTicket() {
            window.location.href = 'index.html'; // Redirect to home page
        }
    </script>

</body>

</html>
