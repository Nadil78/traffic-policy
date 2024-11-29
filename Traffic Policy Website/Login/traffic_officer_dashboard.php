<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traffic Officer Dashboard</title>
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
    </style>
</head>
<body>
    <div class="header">
        <h1>Staff Dashboard</h1>
    </div>

    <div class="container">
        <h2>Dashboard Overview</h2>
        <p>Quick overview of recent activities, pending tasks, and important notifications.</p>
    </div>

    <div class="container">
        <h2>Fine Management</h2>
        <p>View and manage fines, update statuses, and add notes.</p>
        <table>
            <thead>
                <tr>
                    <th>Fine ID</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Reason</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Notes</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="fineTableBody">
                <!-- Fine records will be dynamically added here -->
            </tbody>
        </table>
    </div>

    <div class="container">
        <h2>Payment Management</h2>
        <p>Track and confirm payments received.</p>
        <table>
            <thead>
                <tr>
                    <th>Payment ID</th>
                    <th>Fine ID</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="paymentTableBody">
                <!-- Payment records will be dynamically added here -->
            </tbody>
        </table>
    </div>

    <div class="container">
        <h2>User Management</h2>
        <p>View and manage user profiles, update user details, and address user queries.</p>
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="userTableBody">
                <!-- User records will be dynamically added here -->
            </tbody>
        </table>
    </div>

    <div class="container">
        <h2>Reports</h2>
        <p>Generate reports on fines, payments, and user activities.</p>
        <button class="button" onclick="generateReport()">Generate Report</button>
    </div>

    <script>
        // Function to dynamically populate fine records
        function populateFineTable() {
            const fineTableBody = document.getElementById('fineTableBody');
            fineTableBody.innerHTML = ''; // Clear existing rows
            // Example fines data
            const fines = [
                { id: '12345', date: '2024-11-24', location: 'Main Street', reason: 'Speeding', amount: 50, status: 'Unpaid', notes: 'First offense' },
                // Add more fines as needed
            ];

            fines.forEach(fine => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${fine.id}</td>
                    <td>${fine.date}</td>
                    <td>${fine.location}</td>
                    <td>${fine.reason}</td>
                    <td>$${fine.amount}</td>
                    <td>${fine.status}</td>
                    <td>${fine.notes}</td>
                    <td>
                        <button class="button" onclick="updateFine('${fine.id}')">Update</button>
                        <button class="button" onclick="editFine('${fine.id}')">Edit</button>
                    </td>
                `;
                fineTableBody.appendChild(row);
            });
        }

        // Function to dynamically populate payment records
        function populatePaymentTable() {
            const paymentTableBody = document.getElementById('paymentTableBody');
            paymentTableBody.innerHTML = ''; // Clear existing rows
            // Example payments data
            const payments = [
                { id: '67890', fineId: '12345', date: '2024-11-25', amount: 50, status: 'Confirmed' },
                // Add more payments as needed
            ];

            payments.forEach(payment => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${payment.id}</td>
                    <td>${payment.fineId}</td>
                    <td>${payment.date}</td>
                    <td>$${payment.amount}</td>
                    <td>${payment.status}</td>
                    <td>
                        <button class="button" onclick="confirmPayment('${payment.id}')">Confirm</button>
                        <button class="button" onclick="editPayment('${payment.id}')">Edit</button>
                    </td>
                `;
                paymentTableBody.appendChild(row);
            });
        }

        // Function to dynamically populate user records
        function populateUserTable() {
            const userTableBody = document.getElementById('userTableBody');
            userTableBody.innerHTML = ''; // Clear existing rows
            // Example users data
            const users = [
                { id: '1', name: 'John Doe', email: 'john@example.com', role: 'User' },
                // Add more users as needed
            ];

            users.forEach(user => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${user.id}</td>
                    <td>${user.name}</td>
                    <td>${user.email}</td>
                    <td>${user.role}</td>
                    <td>
                        <button class="button" onclick="updateUser('${user.id}')">Update</button>
                        <button class="button" onclick="editUser('${user.id}')">Edit</button>
                    </td>
                `;
                userTableBody.appendChild(row);
            });
        }

        // Placeholder functions for actions
        function updateFine(fineId) {
            alert('Update fine: ' + fineId);
        }

        function editFine(fineId) {
            alert('Edit fine: ' + fineId);
        }

        function confirmPayment(paymentId) {
            alert('Confirm payment: ' + paymentId);
        }

        function editPayment(paymentId) {
            alert('Edit payment: ' + paymentId);
        }

        function updateUser(userId) {
            alert('Update user: ' + userId);
        }

        function editUser(userId) {
            alert('Edit user: ' + userId);
        }

        function generateReport() {
            alert('Generating report...');
        }

        // Populate tables on page load
        document.addEventListener('DOMContentLoaded', function() {
            populateFineTable();
            populatePaymentTable();
            populateUserTable();
        });
    </script>
</body>
</html>
