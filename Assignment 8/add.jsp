<%@ page import="java.sql.*" %>

<%
try {
Class.forName("com.mysql.cj.jdbc.Driver");

Connection con = DriverManager.getConnection(
"jdbc:mysql://127.0.0.1:3307/college","root",""
);

PreparedStatement ps = con.prepareStatement(
"INSERT INTO students_info VALUES (?,?,?,?,?)"
);

ps.setInt(1, Integer.parseInt(request.getParameter("id")));
ps.setString(2, request.getParameter("name"));
ps.setString(3, request.getParameter("class"));
ps.setString(4, request.getParameter("division"));
ps.setString(5, request.getParameter("city"));

ps.executeUpdate();
con.close();

response.sendRedirect("display.jsp");

} catch(Exception e) {
out.println(e);
}
%>
