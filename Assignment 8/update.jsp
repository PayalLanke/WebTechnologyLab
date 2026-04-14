<%@ page import="java.sql.*" %>

<%
Class.forName("com.mysql.cj.jdbc.Driver");

Connection con = DriverManager.getConnection(
"jdbc:mysql://127.0.0.1:3307/college","root",""
);

PreparedStatement ps = con.prepareStatement(
"UPDATE students_info SET stud_name=?, class=?, division=?, city=? WHERE stud_id=?"
);

ps.setString(1, request.getParameter("name"));
ps.setString(2, request.getParameter("class"));
ps.setString(3, request.getParameter("division"));
ps.setString(4, request.getParameter("city"));
ps.setInt(5, Integer.parseInt(request.getParameter("id")));

ps.executeUpdate();

response.sendRedirect("display.jsp");
%>