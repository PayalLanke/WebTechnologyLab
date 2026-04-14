<%@ page import="java.sql.*" %>

<%
Class.forName("com.mysql.cj.jdbc.Driver");

Connection con = DriverManager.getConnection(
"jdbc:mysql://127.0.0.1:3307/college","root",""
);

PreparedStatement ps = con.prepareStatement(
"SELECT * FROM students_info WHERE stud_id=?"
);

ps.setInt(1, Integer.parseInt(request.getParameter("id")));
ResultSet rs = ps.executeQuery();
rs.next();
%>

<html>
<head>
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="header">
<h1>Edit Student</h1>
</div>

<div class="container">

<form action="update.jsp" method="post">

<label>ID:</label> <input type="text" name="id" value="<%=rs.getInt(1)%>" readonly><br>

<label>Name:</label> <input type="text" name="name" value="<%=rs.getString(2)%>"><br>

<label>Class:</label> <input type="text" name="class" value="<%=rs.getString(3)%>"><br>

<label>Division:</label> <input type="text" name="division" value="<%=rs.getString(4)%>"><br>

<label>City:</label> <input type="text" name="city" value="<%=rs.getString(5)%>"><br><br>

<button class="edit-btn">Update</button>

</form>

</div>

</body>
</html>
