<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f7f9fc;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #FF6347;
            color: #FFFFFF;
            padding: 20px;
            width: 100%;
            text-align: center;
        }

        .container {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 1200px;
        }

        h2 {
            color: #FF6347;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .button {
            background-color: #FF6347;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #e5533b;
        }

        .form-field {
            margin-bottom: 20px;
        }

        .form-field label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-field input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            background-color: #f9f9f9;
        }

        .nav {
            width: 100%;
            background-color: #FF6347;
            overflow: hidden;
        }

        .nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        .nav a:hover {
            background-color: #e5533b;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Admin Dashboard</h1>
    </div>

    <div class="nav">
        <a href="#overview">Overview</a>
        <a href="#staffManagement">Staff Management</a>
        <a href="#systemSettings">System Settings</a>
        <a href="#auditLogs">Audit Logs</a>
        <a href="#advancedReports">Advanced Reports</a>
    </div>

    <div class="container" id="overview">
        <h2>Admin Dashboard Overview</h2>
        <p>Comprehensive overview of website activities, statistics, and notifications.</p>
        <!-- Add content for the overview section -->
    </div>

    <div class="container" id="staffManagement">
        <h2>Staff Management</h2>
        <p>Add, edit, and remove staff members; assign roles and permissions.</p>
        <table>
            <thead>
                <tr>
                    <th>Staff ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="staffTableBody">
                <!-- Staff records will be dynamically added here -->
            </tbody>
        </table>
        <button class="button" onclick="addStaff()">Add Staff</button>
    </div>

    <div class="container" id="systemSettings">
        <h2>System Settings</h2>
        <p>Configure website settings, manage content, and adjust privacy policies.</p>
        <!-- Add content for system settings -->
    </div>

    <div class="container" id="auditLogs">
        <h2>Audit Logs</h2>
        <p>View logs of all activities performed by staff and admin users.</p>
        <table>
            <thead>
                <tr>
                    <th>Log ID</th>
                    <th>Action</th>
                    <th>User</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody id="auditLogTableBody">
                <!-- Audit logs will be dynamically added here -->
            </tbody>
        </table>
    </div>

    <div class="container" id="advancedReports">
        <h2>Advanced Reports</h2>
        <p>Generate detailed reports on all aspects of the website, including fines, payments, user activities, and system performance.</p>
        <button class="button" onclick="generateAdvancedReport()">Generate Report</button>
    </div>

    <script>
        // Function to dynamically populate staff records
        function populateStaffTable() {
            const staffTableBody = document.getElementById('staffTableBody');
            staffTableBody.innerHTML = ''; // Clear existing rows
            // Example staff data
            const staff = [
                { id: '1', name: 'Jane Doe', email: 'jane@example.com', role: 'Supervisor' },
                // Add more staff as needed
            ];

            staff.forEach(member => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${member.id}</td>
                    <td>${member.name}</td>
                    <td>${member.email}</td>
                    <td>${member.role}</td>
                    <td>
                        <button class="button" onclick="editStaff('${member.id}')">Edit</button>
                        <button class="button" onclick="removeStaff('${member.id}')">Remove</button>
                    </td>
                `;
                staffTableBody.appendChild(row);
            });
        }

        // Function to dynamically populate audit logs
        function populateAuditLogTable() {
            const auditLogTableBody = document.getElementById('auditLogTableBody');
            auditLogTableBody.innerHTML = ''; // Clear existing rows
            // Example audit logs data
            const auditLogs = [
                { id: '1', action: 'Login', user: 'Jane Doe', date: '2024-11-24' },
                // Add more audit logs as needed
            ];

            auditLogs.forEach(log => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${log.id}</td>
                    <td>${log.action}</td>
                    <td>${log.user}</td>
                    <td>${log.date}</td>
                `;
                auditLogTableBody.appendChild(row);
            });
        }

        // Placeholder functions for actions
        function addStaff() {
            alert('Add new staff member');
        }

        function editStaff(staffId) {
            alert('Edit staff member: ' + staffId);
        }

        function removeStaff(staffId) {
            alert('Remove staff member: ' + staffId);
        }

        function generateAdvancedReport() {
            alert('Generating advanced report...');
        }

        // Populate tables on page load
        document.addEventListener('DOMContentLoaded', function() {
            populateStaffTable();
            populateAuditLogTable();
        });
    </script>
</body>
</html>
