<%@ page import="java.sql.*" %>

<%
Class.forName("com.mysql.cj.jdbc.Driver");

Connection con = DriverManager.getConnection(
"jdbc:mysql://127.0.0.1:3307/college","root",""
);

PreparedStatement ps = con.prepareStatement(
"DELETE FROM students_info WHERE stud_id=?"
);

ps.setInt(1, Integer.parseInt(request.getParameter("id")));
ps.executeUpdate();

response.sendRedirect("display.jsp");
%>