<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traffic Fine Payment</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f9fc;
            background-image: url('law 2.jpg'); /* Add your background image URL here */
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #FFFFFF;
        }

        .section {
            margin: 20px;
            padding: 20px;
            border: 1px solid #FF6347;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            color: #FFFFFF;
        }

        input[type="text"], input[type="password"], select {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #FF6347;
            border-radius: 5px;
            background-color: #333;
            color: #FFF;
            box-sizing: border-box;
        }

        button {
            background-color: #FF6347;
            color: white;
            padding: 12px 20px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
            display: block;
            width: 100%;
        }

        button:hover {
            background-color: #e5533b;
        }

        a {
            color: #FF6347;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            min-width: 600px;
        }

        table, th, td {
            border: 1px solid #FF6347;
        }

        th, td {
            padding: 12px;
            text-align: center;
            color: #FFFFFF; /* Updated text color */
        }

        th {
            background-color: #FF6347;
            color: #FFFFFF; /* Ensure header text is readable */
        }

        td button {
            background-color: #28a745;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: background-color 0.3s ease;
        }

        td button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <!-- User Authentication -->
    <div class="section" id="loginSection">
        <h2>User Login</h2>
        <form id="loginForm">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Login</button>
        </form>
        <p style="text-align: center;">Don't have an account? <a href="#" onclick="showSignUp()">Sign Up</a></p>
    </div>

    <!-- Sign Up Section -->
    <div class="section" id="signupSection" style="display: none;">
        <h2>User Sign Up</h2>
        <form id="signUpForm">
            <label for="newUsername">Username:</label>
            <input type="text" id="newUsername" name="newUsername" required>
            
            <label for="newPassword">Password:</label>
            <input type="password" id="newPassword" name="newPassword" required>
            
            <button type="submit">Sign Up</button>
        </form>
        <p style="text-align: center;">Already have an account? <a href="#" onclick="showLogin()">Login</a></p>
    </div>

    <!-- Fine Management Dashboard -->
    <div class="section" id="dashboardSection" style="display: none;">
        <h2>My Fines</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Fine ID</th>
                        <th>Date</th>
                        <th>Location</th>
                        <th>Reason</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="fineTableBody">
                    <!-- Fine records will be dynamically added here -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Payment Form -->
    <div class="section" id="paymentSection" style="display: none;">
        <h2>Pay Your Fine</h2>
        <form id="paymentForm">
            <label for="fineAmount">Fine Amount:</label>
            <input type="text" id="fineAmount" name="fineAmount" disabled>
            
            <label for="paymentMethod">Payment Method:</label>
            <select id="paymentMethod" name="paymentMethod" required>
                <option value="credit-card">Credit Card</option>
                <option value="debit-card">Debit Card</option>
                <option value="online-wallet">Online Wallet</option>
                <option value="bank-transfer">Bank Transfer</option>
            </select>
            
            <button type="submit">Pay Now</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginForm = document.getElementById('loginForm');
            const signUpForm = document.getElementById('signUpForm');
            const paymentForm = document.getElementById('paymentForm');
            const dashboardSection = document.getElementById('dashboardSection');
            const paymentSection = document.getElementById('paymentSection');

            loginForm.addEventListener('submit', function(e) {
                e.preventDefault();
                showDashboard();
            });

            signUpForm.addEventListener('submit', function(e) {
                e.preventDefault();
                showLogin();
            });

            paymentForm.addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Payment successful!');
                hidePaymentSection();
            });

            function showDashboard() {
                document.getElementById('loginSection').style.display = 'none';
                dashboardSection.style.display = 'block';
                populateFineTable();
            }

            function showSignUp() {
                document.getElementById('loginSection').style.display = 'none';
                document.getElementById('signupSection').style.display = 'block';
            }

            function showLogin() {
                document.getElementById('signupSection').style.display = 'none';
                document.getElementById('loginSection').style.display = 'block';
            }

            window.showPaymentSection = function(fineId, amount) {
                dashboardSection.style.display = 'none';
                paymentSection.style.display = 'block';
                document.getElementById('fineAmount').value = `$${amount}`;
            }

            function hidePaymentSection() {
                paymentSection.style.display = 'none';
                showDashboard();
            }

            function populateFineTable() {
                const fineTableBody = document.getElementById('fineTableBody');
                fineTableBody.innerHTML = ''; // Clear existing rows
                // Example fines data
                const fines = [
                    { id: '12345', date: '2024-11-24', location: 'Main Street', reason: 'Speeding', amount: 50, status: 'Unpaid' },
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
                        <td><button onclick="showPaymentSection('${fine.id}', '${fine.amount}')">Pay Now</button></td>
                    `;
                    fineTableBody.appendChild(row);
                });
            }
        });
    </script>
</body>
</html>
