<%@ page import="java.sql.*" %>

<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="header">
<h1>Student Dashboard</h1>
</div>

<div class="container">

<h3>Welcome to Student Management System</h3>

<%
int count = 0;
try {
Class.forName("com.mysql.cj.jdbc.Driver");
Connection con = DriverManager.getConnection(
"jdbc:mysql://127.0.0.1:3307/college","root",""
);
Statement st = con.createStatement();
ResultSet rs = st.executeQuery("SELECT COUNT(*) FROM students_info");
if(rs.next()) count = rs.getInt(1);
con.close();
} catch(Exception e) { out.println(e); }
%>

<div class="card">Total Students: <%= count %></div>

<h2>Add Student</h2>

<form action="add.jsp" method="post">
<label>ID:</label>
<input type="text" name="id" required><br>

<label>Name:</label> <input type="text" name="name" required><br>

<label>Class:</label> <input type="text" name="class" required><br>

<label>Division:</label> <input type="text" name="division" required><br>

<label>City:</label> <input type="text" name="city" required><br><br>

<button class="add-btn">Add Student</button>

</form>

<br>

<a href="display.jsp">
<button class="view-btn">View Students</button>
</a>

</div>
</body>
</html>
