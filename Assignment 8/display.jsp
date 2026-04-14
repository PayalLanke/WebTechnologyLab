<%@ page import="java.sql.*" %>

<html>
<head>
<title>Students</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="header">
<h1>Student Records</h1>
</div>

<div class="container">

<div class="search-box">
<input type="text" id="searchInput" placeholder="🔍 Search..." onkeyup="searchTable()">
</div>

<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Class</th>
<th>Division</th>
<th>City</th>
<th>Actions</th>
</tr>

<%
try {
Class.forName("com.mysql.cj.jdbc.Driver");

Connection con = DriverManager.getConnection(
"jdbc:mysql://127.0.0.1:3307/college","root",""
);

Statement st = con.createStatement();
ResultSet rs = st.executeQuery("SELECT * FROM students_info");

while(rs.next()) {
%>

<tr>
<td><%= rs.getInt(1) %></td>
<td><%= rs.getString(2) %></td>
<td><%= rs.getString(3) %></td>
<td><%= rs.getString(4) %></td>
<td><%= rs.getString(5) %></td>

<td>
<form action="edit.jsp" method="get" style="display:inline;">
<input type="hidden" name="id" value="<%=rs.getInt(1)%>">
<button class="edit-btn">Edit</button>
</form>

<form action="delete.jsp" method="post" style="display:inline;" onsubmit="return confirm('Delete this student?');">
<input type="hidden" name="id" value="<%=rs.getInt(1)%>">
<button class="delete-btn">Delete</button>
</form>
</td>

</tr>

<%
}
con.close();
} catch(Exception e) {
out.println(e);
}
%>

</table>

<br>
<a href="index.jsp"><button class="view-btn">Dashboard</button></a>

</div>

<script>
function searchTable() {
let input = document.getElementById("searchInput").value.toLowerCase();
let rows = document.querySelectorAll("table tr");

rows.forEach((row, i) => {
if(i===0) return;
row.style.display = row.innerText.toLowerCase().includes(input) ? "" : "none";
});
}
</script>

</body>
</html>
